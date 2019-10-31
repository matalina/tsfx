<template>
    <div id="app">
        <b-alert
            v-model="show"
            class="position-fixed fixed-top m-0 rounded-0"
            style="z-index: 2000;"
            :variant='variant'
            dismissible
        >
            {{ message }}
        </b-alert>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                show: false,
                variant: 'error',
                message: null,
            }
        },
        methods: {

        },
        mounted() {
            EventBus.listen('set-alert', (data) => {
                this.show = true;
                this.variant = data.type;
                this.message = data.message;

                setTimeout(() => {
                    this.show = false;
                    this.message = null;
                }, 10000);
            })
        }
    }
</script>
