<template>
    <div id="app" class="h-full">
        <template v-if="! loading">
            <CommandLine></CommandLine>
            <Story></Story>
        </template>
        <div
            v-if="loading"
            class="text-center m-64"
        >
            <i class="fas fa-cog fa-spin fa-5x fa-fw"></i><br/>
            Loading...
        </div>

        <div
            v-if="error"
            class="text-center m-64"
        >
            There was a problem we cannot resolve.
        </div>
    </div>
</template>

<script>
    import Story from "../components/Story";
    import CommandLine from "../components/CommandLine";

    export default {
        components: { Story, CommandLine },
        data() {
            return {
                loading: false,
                error: false,
            };
        },
        methods: {
        },
        mounted() {
            if(this.$store.state.new_game) {
                this.load();
            }

        }

    }
</script>
