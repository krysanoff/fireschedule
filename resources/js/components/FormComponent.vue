<template>
    <div class="col-6 card-group d-print-none">
        <form class="form-group" id="list">
            <div class="row">
                <div class="card" v-for="(duties, postIndex) in [list.drivers, list.firefighters]">
                    <div class="card-header">
                        <div class="card-title text-center">
                            <h5 class="text-uppercase" v-if="postIndex">{{ __('graph.firefighters') }}</h5>
                            <h5 class="text-uppercase" v-else>{{ __('graph.drivers') }}</h5>
                        </div>
                    </div>
                    <ul class="card-body">
                        <fieldset>
                            <div v-for="(duty, index) in duties">
                                <li class="list-unstyled input-group mb-1 position-relative">
                                    <input type="text"
                                           :id="'input' + postIndex + '_' + index"
                                           v-if="postIndex"
                                           v-model="duty.name"
                                           v-on:input="inputHandler($event, employees, [Number(idFirefighter), Number(idSnFirefighter)], postIndex, index)"
                                           v-on:blur="blurHandler(postIndex, index)"
                                           class="form-control text-capitalize">
                                    <input type="text"
                                           :id="'input' + postIndex + '_' + index"
                                           v-else
                                           v-model="duty.name"
                                           v-on:input="inputHandler($event, employees, [Number(idDriver)], postIndex, index)"
                                           v-on:blur="blurHandler(postIndex, index)"
                                           class="form-control text-capitalize">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <a class="text-danger pointer"
                                               v-if="duties.length > 1"
                                               v-on:click.prevent="remove(duties, index)">
                                                <v-icon name="times" />
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <div class="position-relative">
                                    <div :id="'list' + postIndex + '_' + index"
                                         class="employees-list list-group position-absolute d-none w-100 border-top-0">
                                        <a class="list-group-item list-group-item-action pointer"
                                                v-for="employee in filteredEmployees"
                                                @mousedown="clickHandler(duty, employee, postIndex, index)">
                                            {{ employee.lastname }}
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </fieldset>
                    </ul>
                    <div class="card-footer font-weight-bold">
                        <div class="row">
                            <div class="col-8 text-left text-primary">
                                <a class="pointer" v-on:click="up(duties)">
                                    <v-icon name="arrow-up" scale="1.5" />
                                </a>
                                <a class="pointer" v-on:click="down(duties)">
                                    <v-icon name="arrow-down" scale="1.5" />
                                </a>
                            </div>
                            <div class="col-4 text-right text-success">
                                <a class="pointer" v-on:click="add(duties)"><v-icon name="plus" scale="1.5" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 card border-0">
                <fieldset>
                    <li v-for="(name, index) in list.duties" class="list-unstyled form-group row">
                        <label :for="index" class="col-4 col-form-label text-right">{{ __('graph.' + index) }}</label>
                        <div class="col-8">
                            <input type="text" :id="index" v-model="list.duties[index]" class="form-control text-capitalize">
                        </div>
                    </li>
                </fieldset>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: [
          'list', 'employees', 'shift'
        ],
        data: function () {
            return {
                filteredEmployees: [],
                idDriver: process.env.MIX_ID_DRIVER,
                idFirefighter: process.env.MIX_ID_FIREFIGHTER,
                idSnFirefighter: process.env.MIX_ID_SN_FIREFIGHTER,
                idLeadFirefighter: process.env.MIX_ID_LEAD_FIREFIGHTER,
                idBossAssistant: process.env.MIX_ID_BOSS_ASSISTANT,
                idBoss: process.env.MIX_ID_BOSS,
          }
        },
        methods: {
            up: function (arr) {
                const first = arr.shift()
                return arr.push(first)
            },

            down: function (arr) {
                const last = arr.pop()
                return arr.unshift(last)
            },

            add: function (arr) {
                return arr.push({
                    name: ''
                })
            },

            remove: function (arr, index) {
                arr.splice(index, 1)
            },

            inputHandler: function (event, employees, post, postIndex, loopIndex) {
                let employeesList = document.getElementById('list' + postIndex + '_' + loopIndex)

                let filteredEmployees = employees.filter(employee => post.includes(employee.post_id))
                let shiftEmployees = filteredEmployees.filter(employee => employee.shift_id === this.shift)
                let otherEmployees = filteredEmployees.filter(employee => employee.shift_id !== this.shift)
                let resultEmployees = [...shiftEmployees, ...otherEmployees].filter(employee => employee.lastname.substring(0, event.target.value.length).toLowerCase() === event.target.value.toLowerCase())

                this.filteredEmployees = resultEmployees

                if (employeesList.classList.contains('d-none')) {
                    employeesList.classList.remove('d-none')
                }
            },

            blurHandler: (postIndex, loopIndex) => {
                let employeesList = document.getElementById('list' + postIndex + '_' + loopIndex)
                employeesList.classList.add('d-none')

            },
            clickHandler: function(duty, employee, postIndex, index) {
                let fullName = employee.lastname + ' ' + employee.firstname[0] + '.' + employee.middlename[0] + '.'
                document.getElementById('input' + postIndex + '_' + index).value = fullName
                duty.name = fullName
            }
        }
    }
</script>
