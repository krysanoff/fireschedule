<template>
    <div class="container">
        <ul class="list-unstyled">
            <li v-for="shift in 4" :key="shift" class="row mt-5">
                <router-link :to="{name: 'shift', params: {shift_number: shift }}" class="btn btn-lg btn-light text-dark text-uppercase">
                    {{ shift }} караул
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {

    }
</script>
