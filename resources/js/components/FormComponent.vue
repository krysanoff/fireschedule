<template>
            <div class="col-6">
                <form class="form-group" id="list">
                    <div class="row">
                        <div class="col-6">
                            <fieldset>
                                <li v-for="(name, index) in list.drivers" class="list-unstyled input-group">
                                    <input type="text" v-model="list.drivers[index]" class="form-control">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <a href="#">
                                                <v-icon name="times" />
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </fieldset>
                        </div>
                        <div class="col-6">
                            <fieldset>
                                <li v-for="(name, index) in list.firefighters" class="list-unstyled input-group">
                                    <input type="text" v-model="list.firefighters[index]" class="form-control">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <a href="#">
                                                <v-icon name="times" />
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </fieldset>
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

        }
    }
</script>
