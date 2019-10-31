<template>
    <form
        @submit="sendForm()"
    >
        <div class="form-group">
            <label>Name</label>
            <input
                type="text"
                v-model="name"
                class="form-control"
                :class="{ 'is-invalid': hasError('name') }"
                @keypress="clearError('name')"
            />
            <span
                v-if="hasError('name')"
                class="invalid-feedback"
            >
                <strong>{{ name_error }}</strong>
            </span>
        </div>
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
        <div class="form-group">
            <label>Confirm Password</label>
            <input
                type="password"
                class="form-control"
                v-model="password_confirmation"
            />
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
                name: null,
                name_error: null,
                email: null,
                email_error: null,
                password: null,
                password_error: null,
                password_confirmation: null,
            };
        },
        methods: {
            ...errors,
            sendForm() {
                let data = {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                };
                api.send('post','/auth/register',data)
                    .then((response) => {
                        this.$store.dispatch('login',response.data.data);
                        this.$router.push('/dashboard');
                    })
                    .catch((error) => {
                        this.error_handler(error);
                    });
            }
        }
    }
</script>
