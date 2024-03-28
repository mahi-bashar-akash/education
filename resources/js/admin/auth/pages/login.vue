<template>

    <form>
        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" class="form-control" required autocomplete="new-email">
        </div>
        <div class="form-group mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="position-relative">
                <input id="password" :type="passwordFieldType" name="password" class="form-control" required autocomplete="new-password">
                <div class="me-3 border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y me-2 cursor-pointer" @click="passwordVisibility">
                    <i class="bi bi-eye" v-if="passwordFieldType === 'text'"></i>
                    <i class="bi bi-eye-slash" v-if="passwordFieldType === 'password'"></i>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-2">
                    <label for="remember-me" class="form-label">
                        <input id="remember-me" type="checkbox" class="form-checkbox">
                        Remember me
                    </label>
                </div>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="mb-2">
                    <router-link :to="{name: 'forget'}" class="text-decoration-none text-theme">
                        Forget password?
                    </router-link>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-theme rounded-0 wpx-90">
                Login
            </button>
        </div>
        <div class="text-light-gray">
            Don't have an account?
            <router-link :to="{name: 'register'}" class="text-light-gray-hover text-decoration-none"> Sign up </router-link>
        </div>
    </form>

</template>

<script>
export default {
    data() {
        return {
            APP_NAME: window.core.APP_NAME,
            password: '',
            passwordFieldType: 'password',
        }
    },
    mounted() {  },
    methods: {

        /* Function to password visibility */
        passwordVisibility() {
            this.passwordFieldType = this.passwordFieldType === "password" ? "text" : "password";
        },

    }
}
</script>
