<template>
    <section class="content">
        <div class="loading" v-if="loading" :loading="loading">
            <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        </div>
        <div class="error" v-if="error" :error="error">{{ error }}</div>
        <router-view></router-view>
    </section>
</template>

<script>
    export default {
        name: "ContentComponent",
        data: function () {
            return {
                token: window.laravel_csrf,
                loading: null,
                error: null
            }
        },
        created() {
            this.fetchData()
        },
        watch: {
            '$route': 'fetchData'
        },
        methods: {
            fetchData() {
                this.loading = true

            }
        }
    }
</script>
