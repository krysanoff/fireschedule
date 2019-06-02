<template>
    <div class="container-fluid px-5">
        <div class="row">
            <form-component :list="list"></form-component>
            <graph-component :list="list" :shift="shift"></graph-component>
        </div>
    </div>
</template>

<script>
    import FormComponent from "./FormComponent"
    import GraphComponent from "./GraphComponent"
    export default {
        components: {FormComponent, GraphComponent},
        props: [
            'graphList', 'shift'
        ],
        data: function () {
            return {
                list: this.graphList,
            }
        }
    }
</script>
