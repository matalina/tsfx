<template>
    <form
        @submit="sendForm()"
    >
        <div class="form-group">
            <label>Email Address</label>
            <input
                type="email"
                v-model="email"
                class="form-control"
                :class="{ 'is-invalid': hasError('email') }"
                @keypress="clearError('email')"
            />
            <span
                v-if="hasError('email')"
                class="invalid-feedback"
            >
                <strong>{{ email_error }}</strong>
            </span>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input
                type="password"
                v-model="password"
                class="form-control"
                :class="{ 'is-invalid': hasError('password') }"
                @keypress="clearError('password')"
            />
            <span
                v-if="hasError('password')"
                class="invalid-feedback"
            >
                <strong>{{ password_error }}</strong>
            </span>
        </div>
        <div class="text-center">
            <button
                class="btn btn-dark"
            >Login</button>
        </div>
    </form>
</template>

<script>
    import api from '../api';
    import errors from '../errors';

    export default {
        data() {
            return {
                email: null,
                email_error: null,
                password: null,
                password_error: null,
            };
        },
        methods: {
            ...errors,
            sendForm() {
                let data = {
                    email: this.email,
                    password: this.password,
                };
                api.send('post','/auth/login',data)
                    .then((response) => {
                        this.$store.dispatch('login',response.data);
                        this.$router.push('/dashboard');
                    })
                    .catch((error) => {
                        this.error_handler(error);
                    });
            }
        }
    }
</script>
