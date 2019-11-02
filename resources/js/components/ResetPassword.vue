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
            />
        </div>
        <div class="text-center">
            <button
                class="btn btn-dark"
            >Reset Password</button>
        </div>
    </form>
</template>

<script>
    import errors from '../errors';
    import api from '../api';

    export default {
        name: 'ResetPassword',
        data() {
            return {
                email: null,
                email_error: null,
            };
        },
        methods: {
            ...errors,
            sendForm() {
                let data = {
                    email: this.email,
                    password: this.password,
                };
                api.send('post','/auth/reset-password',data)
                    .then((response) => {
                        EventBus.fire('set-alert', {
                            type: 'success',
                            message: response.data.message,
                        });

                        this.email = '';
                    })
                    .catch((error) => {
                        this.error_handler(error);
                    });
            }
        }
    }
</script>
