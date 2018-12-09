<template>
            <div class="col-6">
                <form class="form-group" action="" id="list">
                    <fieldset>
                        <li v-for="(name, index) in list.drivers">
                            <input type="text" v-model="list.drivers[index]">
                        </li>
                    </fieldset>
                    <fieldset>
                        <li v-for="(name, index) in list.firefighters">
                            <input type="text" v-model="list.firefighters[index]">
                        </li>
                    </fieldset>
                    <fieldset>
                        <li v-for="(name, index) in list.duties">
                            <input type="text" v-model="list.duties[index]">
                        </li>
                    </fieldset>
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
