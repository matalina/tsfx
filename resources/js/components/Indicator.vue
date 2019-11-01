<template>
    <div>
        <div
            class="bg-success text-white rounded-circle border border-dark"
            style="width: 38px; height: 38px; font-size: 20px; line-height: 20px; padding: 10px 6px 8px;"
            v-if="online"
        >
            <i class="fal fa-lightbulb-on fa-fw"></i>
        </div>
        <div
            class="bg-danger text-white rounded-circle border border-dark"
            style="width: 38px; height: 38px; font-size: 20px; line-height: 20px; padding: 10px 6px 8px;"
            v-else
        >
            <i class="fal fa-lightbulb-slash fa-fw"></i>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Indicator',
        data() {
            return {
                online: true,
            }
        },
        mounted() {
            EventBus.listen('online', () => {
                this.online = true;
            });
            EventBus.listen('offline', () => {
                this.online = false;
            });
        }
    }
</script>
