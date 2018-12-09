<template>
            <div class="col-md-6">
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
