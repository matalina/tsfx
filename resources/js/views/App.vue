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
        <Indicator
            style="position: absolute; top: 20px; right: 20px; z-index: 1000;"
        ></Indicator>
        <router-view></router-view>
    </div>
</template>

<script>
    import api from '../api';
    import Indicator from "../components/Indicator";

    const CHECK_ONLINE = 30 * 60 * 60;

    export default {
        components: {Indicator},
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
            });

            setInterval(() => {
                api.send('get','/am-i-online')
                    .then(() => {
                        EventBus.fire('online');
                    })
                    .catch(() => {
                        EventBus.fire('offline');
                    })
            }, CHECK_ONLINE);
        }
    }
</script>
