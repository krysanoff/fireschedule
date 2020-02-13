<template>
            <div class="col-6 card-group d-print-none">
                <form class="form-group form" id="list">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title text-center">
                                    <h5 class="text-uppercase">{{ __('graph.drivers')}}</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <fieldset>
                                    <li v-for="(name, index) in list.drivers" class="list-unstyled input-group mb-1">
                                        <input type="text" v-model="list.drivers[index].name" class="form__input form-control">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <a class="text-danger pointer"
                                                   v-if="list.drivers.length > 1"
                                                   v-on:click.prevent="remove(list.drivers, index)">
                                                    <font-awesome-icon :icon="['fas', 'times']" />
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </fieldset>
                            </div>

                            <div class="card-footer font-weight-bold">
                                <div class="row">
                                    <div class="col-8 text-left">
                                        <a class="text-primary pointer" v-on:click="up(list.drivers)">
                                            <font-awesome-icon :icon="['fas', 'arrow-up']" size="lg"/>
                                        </a>
                                        <a class="text-primary pointer" v-on:click="down(list.drivers)">
                                            <font-awesome-icon :icon="['fas', 'arrow-down']" size="lg"/>
                                        </a>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a class="text-success pointer" v-on:click="add(list.drivers)">
                                            <font-awesome-icon :icon="['fas', 'plus']" size="lg" />
                                        </a>
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
                                    <li v-for="(name, index) in list.firefighters" class="list-unstyled input-group mb-1">
                                        <input v-if="index === 0" type="text" v-model="list.firefighters[index].name" class="form__input form-control">
                                        <input v-else type="text" v-model="list.firefighters[index].name" class="form__input form-control">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <a class="text-danger pointer"
                                                   v-if="list.firefighters.length > 1"
                                                   v-on:click.prevent="remove(list.firefighters, index)">
                                                    <font-awesome-icon :icon="['fas', 'times']" />
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </fieldset>
                            </div>

                            <div class="card-footer font-weight-bold">
                                <div class="row">
                                    <div class="col-8 text-left">
                                        <a class="text-primary pointer" v-on:click="up(list.firefighters)">
                                            <font-awesome-icon :icon="['fas', 'arrow-up']" size="lg" />
                                        </a>
                                        <a class="text-primary pointer" v-on:click="down(list.firefighters)">
                                            <font-awesome-icon :icon="['fas', 'arrow-down']" size="lg" />
                                        </a>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a class="text-success pointer" v-on:click="add(list.firefighters)">
                                            <font-awesome-icon :icon="['fas', 'plus']" size="lg" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5 card border-0">
                        <fieldset>
                            <li v-for="(name, index) in list.duties" class="list-unstyled form-group row" v-if="index !== 'duty_man'">
                                <label :for="index" class="col-4 col-form-label text-right">{{ __('graph.' + index) }}</label>
                                <div class="col-8">
                                    <!--<input type="text"
                                           :id="index"
                                           v-model="list.firefighters[0].name"
                                           class="form__input form-control"
                                           v-if="index === 'duty_man'"
                                    >-->
                                    <input type="text"
                                           :id="index"
                                           v-model="list.duties[index]"
                                           class="form__input form-control"
                                    >
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
                console.log(first)
                return arr.push(first)
            },

            down: function (arr) {
                const last = arr.pop()
                console.log(last)
                return arr.unshift(last)
            },

            add: function (arr) {
                return arr.push({
                    name: '',
                    time: []
                })
            },

            remove: function (arr, index) {
                arr.splice(index, 1)
            }
        }
    }
</script>
