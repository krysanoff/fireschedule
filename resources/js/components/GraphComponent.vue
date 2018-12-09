<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul>
                   <li v-for="name in list.drivers">{{ name }}</li>
                </ul>
                <ul>
                   <li v-for="name in list.firefighters">{{ name }}</li>
                </ul>
                <ul>
                   <li v-for="name in list.duties">{{ name }}</li>
                </ul>
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
