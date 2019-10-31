<template>
    <form>
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
    export default {
        data() {
            return {
                email: null,
                password: null,
            };
        }
    }
</script>
