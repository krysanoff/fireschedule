<template>
    <div class="container">
        <div class="row">
            <form-component v-bind:list="list"></form-component>
            <graph-component v-bind:list="list"></graph-component>
        </div>
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

        }
    }
</script>
