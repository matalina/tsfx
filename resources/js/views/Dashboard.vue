<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="display-4">
                    The Search for X
                </h1>
                <p class="lead">
                    An interactive fiction story for NaNoWriMo 2019 and Github Game Off 2019
                </p>
            </div>
            <div class="col-md-4 text-center">
                <div
                    class="mt-md-5 p-3 border border-gray"
                >{{ user.name }}</div>
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
                <EditProfile
                    v-if="is('profile')"
                ></EditProfile>
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
                        @click="editProfile()"
                    >Edit Profile</button>
                    <button
                        class="btn btn-outline-dark"
                        @click="logout()"
                    >Logout</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Indicator from "../components/Indicator";
    import EditProfile from "../components/EditProfile";
    export default {
        components: {EditProfile, Indicator},
        data() {
            return {
                user: this.$store.state.user,
                saved_games: this.$store.state.user.saves,
                tab: null,
            };
        },
        computed: {
            games() {
                return this.saved_games.reverse();
            }
        },
        methods: {
            is(value) {
                return this.tab === value;
            },
            logout() {
                this.$store.dispatch('logout');
                this.$router.push('/');
            },
            noSavedGames() {
                return this.saved_games.length === 0;
            },
            getSavedGame(key) {

            },
            editProfile() {
                this.tab = 'profile';
            }
        },
        mounted() {
            EventBus.listen('close-dashboard-tab', () => {
                this.tab = null;
            });
        }
    }
</script>
