<template>

    <form @submit.prevent="login()">
        <div class="alert alert-danger rounded-3 mb-3 text-center" v-if="error !== null && error.error !== undefined" v-text="error.error"></div>
        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" class="form-control" autocomplete="new-email" v-model="loginParam.email">
            <div class="error-report" v-if="error != null && error.email !== undefined"> {{error.email[0]}} </div>
        </div>
        <div class="form-group mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="position-relative">
                <input id="password" :type="passwordFieldType" name="password" class="form-control" autocomplete="new-password" v-model="loginParam.password">
                <div class="me-3 border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y me-2 cursor-pointer" @click="passwordVisibility">
                    <i class="bi bi-eye" v-if="passwordFieldType === 'text'"></i>
                    <i class="bi bi-eye-slash" v-if="passwordFieldType === 'password'"></i>
                </div>
            </div>
            <div class="error-report" v-if="error != null && error.password !== undefined"> {{error.password[0]}} </div>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-6">
                    <label for="remember-me" class="form-check-label">
                        <input type="checkbox" name="remember-me" id="remember-me" class="form-checkbox shadow-none border" @change="rememberCheck()" :checked="loginParam.remember === true">
                        Remember me
                    </label>
                </div>
                <div class="col-6 text-end">
                    <router-link :to="{name: 'forget'}" class="text-decoration-none text-danger">
                        Forget password?
                    </router-link>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-theme wpx-90" v-if="!loginLoading">
                Login
            </button>
            <button type="button" class="btn btn-theme wpx-90" v-if="loginLoading">
                <span class="spinner-border border-2 wpx-15 hpx-15"></span>
            </button>
        </div>
        <div class="text-light-gray">
            Don't have an account?
            <router-link :to="{name: 'register'}" class="text-light-gray-hover text-decoration-none">
                Sign up
            </router-link>
        </div>
    </form>

</template>

<script>
import apiServices from "../../../services/apiServices.js";
import apiRoutes from "../../../services/apiRoutes.js";

export default {
    data() {
        return {
            APP_NAME: window.core.APP_NAME,
            password: '',
            passwordFieldType: 'password',
            error: null,
            loginParam: {
                email: '',
                password: '',
            },
            loginLoading: false,
        }
    },
    mounted() {
    },
    methods: {

        /* Function to password visibility */
        passwordVisibility() {
            this.passwordFieldType = this.passwordFieldType === "password" ? "text" : "password";
        },

        /* Function to log in api */
        login() {
            this.loginLoading = true;
            this.error = null;
            apiServices.POST(apiRoutes.adminLogin, this.loginParam, (res) => {
                this.loginLoading = false
                if (res.message) {
                    this.$toast.success(res.message, { position: "top-right" } );
                    window.location.reload()
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to remember check */
        rememberCheck() {
            this.loginParam.remember = this.loginParam.remember !== true;
        },

    }
}
</script>
