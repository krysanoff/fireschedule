<template>
            <div class="col-6">
                <form class="form-group" id="list">
                    <div class="row">
                        <div class="col-6">
                            {{ __('graph.drivers')}}
                            <fieldset>
                                <li v-for="(name, index) in list.drivers" class="list-unstyled input-group">
                                    <input type="text" v-model="list.drivers[index].name" class="form-control">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <a href="#"
                                               v-if="list.drivers.length > 1"
                                               v-on:click.prevent="remove(list.drivers, index)">
                                                <v-icon name="times" />
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </fieldset>
                            <div>
                                <a v-on:click="up(list.drivers)"><v-icon name="arrow-up" /></a>
                                <a v-on:click="down(list.drivers)"><v-icon name="arrow-down" /></a>
                                <a v-on:click="add(list.drivers)"><v-icon name="plus" /></a>
                            </div>
                        </div>
                        <div class="col-6">
                            {{ __('graph.firefighters')}}
                            <fieldset>
                                <li v-for="(name, index) in list.firefighters" class="list-unstyled input-group">
                                    <input type="text" v-model="list.firefighters[index].name" class="form-control">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <a href="#"
                                               v-if="list.firefighters.length > 1"
                                               v-on:click.prevent="remove(list.firefighters, index)">
                                                <v-icon name="times" />
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </fieldset>
                            <div>
                                <a v-on:click="up(list.firefighters)"><v-icon name="arrow-up" /></a>
                                <a v-on:click="down(list.firefighters)"><v-icon name="arrow-down" /></a>
                                <a v-on:click="add(list.firefighters)"><v-icon name="plus" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <fieldset>
                            <li v-for="(name, index) in list.duties" class="list-unstyled">
                                <input type="text" v-model="list.duties[index]" class="form-control">
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
