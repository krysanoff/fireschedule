<template>
            <div class="col-md-6 graph">
                <div class="row mw-100 mb-2 text-center text-uppercase d-none d-print-block">
                    <div class="col">
                        <h5>{{ __('graph.title') }}{{ getDate() }}</h5>
                        <h6>{{ shift }} <span class="text-uppercase">{{ __('graph.shift')}}</span></h6>
                    </div>
                </div>
                    <ul v-if="list.drivers[0].name" class="graph__list graph__list_drivers">
                        <li class="graph__item" v-for="driver, index in list.drivers" :key="index">
                            <div class="graph__name">{{ driver.name }}</div>
                            <div class="graph__time" v-for="time in list.drivers[index].time">
                                {{ time }}
                            </div>
                        </li>
                    </ul>

                    <ul v-if="list.firefighters[0].name" class="graph__list">
                        <li class="graph__item" v-for="firefighter, index in list.firefighters" :key="index">
                            <div class="graph__name">{{ firefighter.name }}</div>
                            <div class="graph__time" v-for="time in list.firefighters[index].time">
                                {{ time }}
                            </div>
                        </li>
                    </ul>

                <ul>
                   <li v-if="name && index !== 'duty_man'" class="row list-unstyled" v-for="(name, index) in list.duties">
                       <div class="col mb-1 mr-1 text-nowrap text-right">{{ __('graph.' + index) }}</div>
                       <div class="graph__name col">{{ name }}</div>
                   </li>
                   <li v-if="list.firefighters[0].name" class="row list-unstyled" >
                       <div class="col mb-1 mr-1 text-nowrap text-right">{{ __('graph.duty_man') }}</div>
                       <div class="graph__name col">{{ list.firefighters[0].name }}</div>
                       <!--<div v-if="index === 'duty_man'" class="graph__name col">{{ list.firefighters[0].name }}</div>
                       <div v-else class="graph__name col">{{ name }}</div>-->
                   </li>
                </ul>
                <div v-if="list.drivers[0].name || list.firefighters[0].name" class="row d-print-none">
                    <div class="col text-center">
                        <a class="btn btn-lg btn-success text-light" v-on:click.prevent="save">{{ __('graph.print')}}</a>
                    </div>
                </div>
            </div>
</template>

<script>
    export default {
        props: [
          'list', 'shift'
        ],
        beforeMount() {
            this.getDutyTimes()
        },
        beforeUpdate() {
            this.getDutyTimes()
        },
        methods: {
            save: function () {
                let headers = new Headers({
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                    "Accept": "text/plain",
                    "Content-Type": "application/json"
                })
                fetch('/graph/save', {
                    headers: headers,
                    method: 'POST',
                    body: JSON.stringify({
                        shift_id: this.shift,
                        list: this.list
                    })
                })
                    .then(response => {
                        //window.print()
                        console.log(response)

                        return response.json()
                    })
                    .then(response => {
                        this.flashSelector = document.querySelector('.flash')

                        if (response.completed) {
                            this.alertSelector = document.querySelector('.alert-success')
                        } else {
                            this.alertSelector = document.querySelector('.alert-danger')
                        }

                        this.alertSelector.classList.remove('invisible')
                        this.flashSelector.classList.add('is-visible')

                        window.print()

                        setTimeout(() => {
                            this.flashSelector.classList.remove('is-visible')
                            this.alertSelector.classList.add('invisible')
                        }, 5000)
                    })
                    .catch(error => console.log(error))
            },

            getDutyTimes: function () {
                let startDutyTime = new Date()
                startDutyTime.setHours(8)
                startDutyTime.setMinutes(30)
                startDutyTime.setSeconds(0)
                //const endDutyTime = new Date(startDutyTime.getTime() + 1000*60*60*24)
                const dayTime = 1000*60*60*24;

                let oneEmployeeTime = dayTime/(this.list.drivers.length + this.list.firefighters.length)

                let allDriversTime = oneEmployeeTime*this.list.drivers.length
                let usedDriversTime = 0;
                let allFirefightersTime = oneEmployeeTime*this.list.firefighters.length

                // drivers
                // first half
                let driverFirstDutyTime = 1000*60*60*2
                console.log(this.list.drivers)
                this.list.drivers.forEach((value, i) => {
                    this.list.drivers[i].time = []
                    console.log(this.list.drivers[i])
                    let start = new Date(startDutyTime.getTime())
                    let end = new Date(startDutyTime.getTime() + driverFirstDutyTime)
                    this.list.drivers[i].time.push(start.getHours()+':'+("00" + start.getMinutes()).slice(-2) + ' - ' + end.getHours()+':'+("00" + end.getMinutes()).slice(-2))
                    startDutyTime.setTime(end)
                    usedDriversTime += driverFirstDutyTime
                })

                //second half
                let driversRemainingTime = allDriversTime - usedDriversTime
                let driverSecondDutyTime = driversRemainingTime/this.list.drivers.length

                if (driversRemainingTime > 0) {
                    this.list.drivers.forEach((value, i) => {
                        let start = new Date(startDutyTime.getTime())
                        let end = new Date(startDutyTime.getTime() + driverSecondDutyTime)
                        this.list.drivers[i].time.push(start.getHours()+':'+("00" + start.getMinutes()).slice(-2) + ' - ' + end.getHours()+':'+("00" + end.getMinutes()).slice(-2))
                        startDutyTime.setTime(end)
                        usedDriversTime += driverSecondDutyTime
                    })
                }

                // Firefighters
                // Evening
                const eveningEnd = new Date()
                eveningEnd.setHours(22)
                eveningEnd.setMinutes(0)
                eveningEnd.setSeconds(0)

                let ffAllEveningTime =eveningEnd.getTime() - startDutyTime.getTime()
                let ffLength = this.list.firefighters.length
                let ffEveningTime = ffAllEveningTime/ffLength

                this.list.firefighters.forEach((value, i) => {
                    this.list.firefighters[i].time = []
                    let start = new Date(startDutyTime.getTime())
                    let end = new Date(startDutyTime.getTime() + ffEveningTime)
                    this.list.firefighters[i].time.push(start.getHours()+':'+("00" + start.getMinutes()).slice(-2) + ' - ' + end.getHours()+':'+("00" + end.getMinutes()).slice(-2))
                    startDutyTime.setTime(end)
                    usedDriversTime += ffEveningTime
                })

                // Night
                let allNightTime = 8*60*60*1000
                let nightTime = allNightTime/ffLength

                this.list.firefighters.forEach((value, i) => {
                    let start = new Date(startDutyTime.getTime())
                    let end = new Date(startDutyTime.getTime() + nightTime)
                    this.list.firefighters[i].time.push(start.getHours()+':'+("00" + start.getMinutes()).slice(-2) + ' - ' + end.getHours()+':'+("00" + end.getMinutes()).slice(-2))
                    startDutyTime.setTime(end)
                    usedDriversTime += nightTime
                })

                // Morning
                let allMorningTime = 2.5*60*60*1000
                let morningTime = allMorningTime/ffLength

                this.list.firefighters.forEach((value, i) => {
                    let start = new Date(startDutyTime.getTime())
                    let end = new Date(startDutyTime.getTime() + morningTime)
                    this.list.firefighters[i].time.push(start.getHours()+':'+("00" + start.getMinutes()).slice(-2) + ' - ' + end.getHours()+':'+("00" + end.getMinutes()).slice(-2))
                    startDutyTime.setTime(end)
                    usedDriversTime += morningTime
                })
            },

            getDate: function () {
                let myDate = new Date();
                let month = ('0' + (myDate.getMonth() + 1)).slice(-2);
                let day = ('0' + myDate.getDate()).slice(-2);
                let year = myDate.getFullYear();
                return day + '.' + month + '.' + year;
            }
        }
    }
</script>
