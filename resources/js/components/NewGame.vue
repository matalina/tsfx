<template>
    <div class="row">
        <div class="col">
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
                <div class="text-center">
                    <button
                            class="btn btn-dark"
                    >New Game</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import api from '../api';
    import errors from '../errors';
    export default {
        name: 'NewGame',
        data() {
            return {
                name: 'New Game',
                name_error: null,
            }
        },
        methods: {
            ...errors,
            sendForm() {
                let data = {
                    user_id: this.$store.state.user.id,
                    name: this.name,
                    state: JSON.stringify(this.$store.state),
                };
                api.send('post',`/saves/`,data)
                    .then((response) => {
                        EventBus.fire('close-dashboard-tab');
                        this.$store.dispatch('newSave', response.data);
                        this.name = 'New Game';
                        this.$router.push(`/game/${response.data.key}`)
                    })
                    .catch((error) => {
                        this.error_handler(error);
                        EventBus.fire('close-dashboard-tab');
                        this.name = "New Game";
                    });
            }
        }
    }
</script>