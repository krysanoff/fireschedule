<template>
    <div>
        <form-component v-bind:list="list"></form-component>
        <graph-component v-bind:list="list"></graph-component>
    </div>
</template>

<script>
    import FormComponent from "./FormComponent"
    import GraphComponent from "./GraphComponent"
    export default {
        components: {FormComponent, GraphComponent},
        props: [
            'graphList'
        ],
        data: function () {
            return {
                list: this.graphList
            }
        },
        mounted() {
            console.log('app component')
        }
    }
</script>
