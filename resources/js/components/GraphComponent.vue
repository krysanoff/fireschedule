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
                <div>
                    <a href="" class="btn btn-success" v-on:click.prevent="save">Печать</a>
                </div>
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
            save: function () {
                let headers = new Headers({
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                    "Accept": "text/plain",
                    "Content-Type": "application/json"
                })
                fetch('/graph/save', {
                    headers: headers,
                    method: 'POST',
                    body: JSON.stringify({
                        shift_id: 1,
                        list: this.list
                    })
                })
                    .then(response => {
                        //window.print()
                        console.log(response)

                        return response.json()
                    })
                    .then(response => {
                        this.flash = document.querySelector('.flash')

                        if (response.completed) {
                            this.fade = document.querySelector('.alert-success')
                        } else {
                            this.fade = document.querySelector('.alert-danger')
                        }

                        this.fade.classList.remove('invisible')
                        this.flash.classList.add('is-visible')

                        setTimeout(() => {
                            this.flash.classList.remove('is-visible')
                                .add('invisible')
                        }, 5000)
                    })
                    .catch(error => console.log(error))
            }
        }
    }
</script>
