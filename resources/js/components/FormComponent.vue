<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <form action="" id="list">
                    <fieldset v-for="name in list.drivers">
                        <li>
                            <input type="text" :value="name">
                        </li>
                    </fieldset>
                    <fieldset v-for="(name, index) in list.firefighters">
                        <li>
                            <span>{{ name }}</span>
                            <input type="text" v-model="list.firefighters[index]">
                        </li>
                    </fieldset>
                    <fieldset v-for="name in list.duties">
                        <li>
                            <label>{{ name }}</label>
                            <input type="text">
                        </li>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
          'list'
        ],
        mounted() {
            console.log(this.list)
        },
        methods: {
            getGraph: function () {
                console.log(this.list)
            }
        }
    }
</script>
