<template>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="display-4">The Search for X</h1>
                <p class="lead">
                    An interactive fiction story for NaNoWriMo 2019 and Github Game Off 2019
                </p>
            </div>
            <div class="col-md-2 text-right">
                <button
                    class="btn btn-dark mt-md-5"
                >{{ user.name }}</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h2>Saved Games</h2>
                <div
                    class="border border-gray rounded w-100 p-2"
                    v-show="noSavedGames()"
                >
                    There are no saved games.
                </div>
                <div
                    class="list-group list-group-flush"
                    v-for="save in games"
                >
                    <button
                        class="list-group-item list-group-item-action"
                        @click="getSavedGame(save.key)"
                    >{{ save.name }}</button>
                </div>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4 text-center">
                <div class="w-100 border border-gray rounded p-5 mb-3">
                    <button
                        class="btn btn-outline-dark"
                    >New Game</button>
                </div>
                <div class="w-100 border border-gray rounded p-5 mb-3">
                    <button
                        class="btn btn-outline-dark"
                    >Edit Profile</button>
                    <button
                        class="btn btn-outline-dark"
                    >Logout</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: this.$store.state.user,
                saved_games: [],
            };
        },
        computed: {
            games() {
                return this.saved_games.reverse();
            }
        },
        methods: {
            noSavedGames() {
                return this.saved_games.length === 0;
            },
            getSavedGame(key) {

            }
        }
    }
</script>
