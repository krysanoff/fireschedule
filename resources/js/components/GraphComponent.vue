<template>
            <div class="col-md-6">
                <ul>
                   <li v-for="driver, index in list.drivers" :key="index">
                       {{ driver.name }}
                       <span v-for="time in list.drivers[index].time">
                           {{ time }}
                       </span>
                   </li>
                </ul>
                <ul>
                   <li v-for="ff, index in list.firefighters" :key="index">
                       {{ ff.name }}
                       <span v-for="time in list.firefighters[index].time">
                           {{ time }}
                       </span>
                   </li>
                </ul>
                <ul>
                   <li v-for="name in list.duties">{{ name }}</li>
                </ul>
                <div>
                    <a href="" class="btn btn-success" v-on:click.prevent="save">{{ __('graph.print')}}</a>
                </div>
            </div>
</template>

<script>
    export default {
        props: [
          'list', 'shift'
        ],
        mounted() {
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
                        console.error('eerrrooorr')

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

                this.list.drivers.forEach((value, i) => {
                    let start = new Date(startDutyTime.getTime())
                    let end = new Date(startDutyTime.getTime() + driverSecondDutyTime)
                    this.list.drivers[i].time.push(start.getHours()+':'+("00" + start.getMinutes()).slice(-2) + ' - ' + end.getHours()+':'+("00" + end.getMinutes()).slice(-2))
                    startDutyTime.setTime(end)
                    usedDriversTime += driverSecondDutyTime
                })

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
            }
        }
    }
</script>
