<template>
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <h1 class="display-4 text-center">
                The Search for X
            </h1>
            <p class="lead text-center">
                An interactive fiction story for NaNoWriMo 2019 and Github Game Off 2019
            </p>

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
