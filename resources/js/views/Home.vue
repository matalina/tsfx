<template>
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <h1 class="display-4 text-center">
                The Search for X
            </h1>
            <p class="text-center lead">"Leaps and Bounds"</p>
            <p class="text-center">
                An interactive fiction story for NaNoWriMo and  Github Game Off 2019
            </p>
            <p>It is the 32nd century and technology is leaps and bounds ahead of your wildest imagination.  Immerse yourself in a world of mutants, technology and mystery as you, Phoenix "Nix", search for the super secret component codenamed "X".  The bounty is high, the search is far reaching.  Explore the vast new world, making friends and enemies along the way.</p>

            <Login
                v-if="is('login')"

            ></Login>
            <Register
                v-if="is('register')"
            ></Register>
            <ResetPassword
                v-if="is('reset')"
            ></ResetPassword>

            <div class="text-center mt-3 border border-gray rounded">
                <button
                    class="btn btn-link"
                    v-if="! is('login')"
                    @click="change('login')"
                >Login</button>
                <button
                    class="btn btn-link"
                    v-if="! is('register')"
                    @click="change('register')"
                >Register</button>
                <button
                    class="btn btn-link"
                    v-if="! is('reset')"
                    @click="change('reset')"
                >Reset Password</button>
            </div>
        </div>
    </div>
</template>

<script>
    import Login  from '../components/Login';
    import Register from '../components/Register';
    import ResetPassword from "../components/ResetPassword";
    import Indicator from "../components/Indicator";

    export default {
        components: { Indicator, Login, Register, ResetPassword },
        data() {
            return {
                tab: 'login',
            };
        },
        methods: {
            is(value) {
                return this.tab === value;
            },
            change(value) {
                this.tab = value;
            }
        }
    }
</script>
