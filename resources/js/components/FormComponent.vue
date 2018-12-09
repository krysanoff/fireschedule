<template>
            <div class="col-6">
                <form class="form-group" action="" id="list">
                    <fieldset>
                        <li v-for="name in list.drivers">
                            <input type="text" :value="name">
                        </li>
                    </fieldset>
                    <fieldset>
                        <li v-for="(name, index) in list.firefighters">
                            <input type="text" v-model="list.firefighters[index]">
                        </li>
                    </fieldset>
                    <fieldset>
                        <li v-for="name in list.duties">
                            <label>{{ name }}</label>
                            <input type="text">
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
