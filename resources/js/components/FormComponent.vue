<template>
    <div class="col-6 card-group d-print-none">
        <form class="form-group" id="list">
            <div class="row">
                <div class="card" v-for="(employees, index) in [list.drivers, list.firefighters]">
                    <div class="card-header">
                        <div class="card-title text-center">
                            <h5 class="text-uppercase" v-if="index">{{ __('graph.firefighters') }}</h5>
                            <h5 class="text-uppercase" v-else>{{ __('graph.drivers') }}</h5>
                        </div>
                    </div>
                    <ul class="card-body">
                        <fieldset>
                            <li v-for="(employee, index) in employees" class="list-unstyled input-group mb-1">
                                <input type="text" v-model="employee.name" class="form-control text-capitalize">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <a class="text-danger pointer"
                                           v-if="employees.length > 1"
                                           v-on:click.prevent="remove(employees, index)">
                                            <v-icon name="times" />
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </fieldset>
                    </ul>
                    <div class="card-footer font-weight-bold">
                        <div class="row">
                            <div class="col-8 text-left text-primary">
                                <a class="pointer" v-on:click="up(employees)">
                                    <v-icon name="arrow-up" scale="1.5" />
                                </a>
                                <a class="pointer" v-on:click="down(employees)">
                                    <v-icon name="arrow-down" scale="1.5" />
                                </a>
                            </div>
                            <div class="col-4 text-right text-success">
                                <a class="pointer" v-on:click="add(employees)"><v-icon name="plus" scale="1.5" /></a>
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
          'list'
        ],
        mounted() {

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
                this.$emit('changeList')
                return arr.push({
                    name: '',
                    time: []
                })
            },

            remove: function (arr, index) {
                arr.splice(index, 1)
                this.$emit('changeList')
            }
        }
    }
</script>
