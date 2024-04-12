<template>

    <div class="cursor-content margin-top-105">
        <section class="w-100">
            <div class="container">
                <div class="row justify-content-center align-items-center vh-100">
                    <div class="col-12 col-md-7 col-xl-5 bg-white p-3">
                        <div class="border p-4">
                            <div class="mb-3 fs-5 text-center">
                                <img :src="`/images/logo.png`" class="wpx-35 hpx-35" alt="favicon">
                                {{ APP_NAME }}
                            </div>
                            <form @submit.prevent="userLogin()">
                                <div class="alert alert-danger rounded-3 mb-3 text-center" v-if="error !== null && error.error !== undefined" v-text="error.error"></div>
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" name="email" class="form-control" required autocomplete="new-email" v-model="loginParam.email">
                                    <div class="error-report" v-if="error != null && error.email !== undefined"> {{error.email[0]}} </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="position-relative">
                                        <input id="password" :type="passwordFieldType" name="password" class="form-control" required autocomplete="new-password" v-model="loginParam.password">
                                        <div class="me-3 border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y me-2 cursor-pointer" @click="passwordVisibility">
                                            <i class="bi bi-eye" v-if="passwordFieldType === 'text'"></i>
                                            <i class="bi bi-eye-slash" v-if="passwordFieldType === 'password'"></i>
                                        </div>
                                    </div>
                                    <div class="error-report" v-if="error != null && error.password !== undefined"> {{error.password[0]}} </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <label for="remember-me" class="form-label">
                                            <input type="checkbox" name="remember-me" id="remember-me" class="form-checkbox shadow-none border" @change="rememberCheck()" :checked="loginParam.remember === true">
                                            Remember me
                                        </label>
                                    </div>
                                    <div class="col-6 text-end">
                                        <router-link :to="{name: 'forget'}" class="text-decoration-none text-theme">
                                            Forget password?
                                        </router-link>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-theme wpx-90" v-if="!loginLoading">
                                        Sign In
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</template>

<script>

import apiServices from "../../services/apiServices.js";
import apiRoutes from "../../services/apiRoutes.js";

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
            userInfo: window.core.UserInfo,
        }
    },
    mounted() {
        if(this.userInfo !== null) {
            this.$router.push( {name: 'profile'} )
        }
    },
    methods: {

        /* Function to password visibility */
        passwordVisibility() {
            this.passwordFieldType = this.passwordFieldType === "password" ? "text" : "password";
        },

        /* Function to remember check */
        rememberCheck() {
            this.loginParam.remember = this.loginParam.remember !== true;
        },

        /* Function to log in api */
        userLogin() {
            this.loginLoading = true;
            this.error = null;
            apiServices.POST(apiRoutes.userLogin, this.loginParam, (res) => {
                this.loginLoading = false
                if (res.status === 200) {
                    this.$toast.success('Login Successful', { position: "top-right" } );
                    window.location.reload()
                } else {
                    this.error = res.errors
                }
            })
        },

    }
}

</script>
