<template>
            <div class="col-6 card-group d-print-none">
                <form class="form-group" id="list">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title text-center">
                                    <h5 class="text-uppercase">{{ __('graph.drivers')}}</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <fieldset>
                                    <li v-for="(driver, index) in list.drivers" class="list-unstyled input-group mb-1">
                                        <input type="text" v-model="driver.name" class="form-control">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <a class="text-danger pointer"
                                                   v-if="list.drivers.length > 1"
                                                   v-on:click.prevent="remove(list.drivers, index)">
                                                    <v-icon name="times" />
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </fieldset>
                            </div>

                            <div class="card-footer font-weight-bold">
                                <div class="row">
                                    <div class="col-8 text-left text-primary">
                                        <a class="pointer" v-on:click="up(list.drivers)">
                                            <v-icon name="arrow-up" scale="1.5" />
                                        </a>
                                        <a class="pointer" v-on:click="down(list.drivers)">
                                            <v-icon name="arrow-down" scale="1.5" />
                                        </a>
                                    </div>
                                    <div class="col-4 text-right text-success">
                                        <a class="pointer" v-on:click="add(list.drivers)"><v-icon name="plus" scale="1.5" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title text-center">
                                    <h5 class="text-uppercase">{{ __('graph.firefighters')}}</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <fieldset>
                                    <li v-for="(firefighter, index) in list.firefighters" class="list-unstyled input-group mb-1">
                                        <input type="text" v-model="firefighter.name" class="form-control">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <a class="text-danger pointer"
                                                   v-if="list.firefighters.length > 1"
                                                   v-on:click.prevent="remove(list.firefighters, index)">
                                                    <v-icon name="times" />
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </fieldset>
                            </div>

                            <div class="card-footer font-weight-bold">
                                <div class="row">
                                    <div class="col-8 text-left text-primary">
                                        <a class="pointer" v-on:click="up(list.firefighters)">
                                            <v-icon name="arrow-up" scale="1.5" />
                                        </a>
                                        <a class="pointer" v-on:click="down(list.firefighters)">
                                            <v-icon name="arrow-down" scale="1.5" />
                                        </a>
                                    </div>
                                    <div class="col-4 text-right text-success">
                                        <a class="pointer" v-on:click="add(list.firefighters)"><v-icon name="plus" scale="1.5" /></a>
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
                                    <input type="text" :id="index" v-model="list.duties[index]" class="form-control">
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
