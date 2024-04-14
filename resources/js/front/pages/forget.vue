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
                            <form @submit.prevent="userForget()" v-if="tab === 'forget'">
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" name="email" class="form-control" autocomplete="new-email" v-model="forgetParam.email">
                                    <div class="error-report" v-if="error != null && error.email !== undefined"> {{error.email[0]}} </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-theme wpx-150" v-if="!forgetLoading">
                                        Forget password
                                    </button>
                                    <button type="button" class="btn btn-theme wpx-150" v-if="forgetLoading">
                                        <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                                    </button>
                                </div>
                                <div class="text-light-gray">
                                    Already have an account?
                                    <router-link :to="{name: 'login'}" class="text-light-gray-hover text-decoration-none">
                                        Sign in
                                    </router-link>
                                </div>
                            </form>

                            <form @submit.prevent="userReset()" v-if="tab === 'reset'">
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" name="email" class="form-control" autocomplete="new-email" v-model="resetParam.email">
                                    <div class="error-report" v-if="error != null && error.email !== undefined"> {{error.email[0]}} </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="code" class="form-label">Code</label>
                                    <input id="code" type="text" name="code" class="form-control" autocomplete="new-code" v-model="resetParam.code">
                                    <div class="error-report" v-if="error != null && error.code !== undefined"> {{error.code[0]}} </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="position-relative">
                                        <input id="password" :type="passwordFieldType" name="password" class="form-control" autocomplete="new-password" v-model="resetParam.password">
                                        <div class="me-3 border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y me-2 cursor-pointer" @click="passwordVisibility">
                                            <i class="bi bi-eye" v-if="passwordFieldType === 'text'"></i>
                                            <i class="bi bi-eye-slash" v-if="passwordFieldType === 'password'"></i>
                                        </div>
                                    </div>
                                    <div class="error-report" v-if="error != null && error.password !== undefined"> {{error.password[0]}} </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="confirm-password" class="form-label">Confirm Password</label>
                                    <div class="position-relative">
                                        <input id="confirm-password" :type="passwordConfirmationFieldType" name="confirm-password" class="form-control" autocomplete="new-confirm-password" v-model="resetParam.password_confirmation">
                                        <div class="me-3 border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y me-2 cursor-pointer" @click="passwordConfirmVisibility">
                                            <i class="bi bi-eye" v-if="passwordConfirmationFieldType === 'text'"></i>
                                            <i class="bi bi-eye-slash" v-if="passwordConfirmationFieldType === 'password'"></i>
                                        </div>
                                    </div>
                                    <div class="error-report" v-if="error != null && error.password_confirmation !== undefined"> {{error.password_confirmation[0]}} </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-theme wpx-90" v-if="!resetLoading">
                                        Reset
                                    </button>
                                    <button type="button" class="btn btn-theme wpx-90" v-if="resetLoading">
                                        <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                                    </button>
                                </div>
                                <div class="text-light-gray">
                                    Already have an account?
                                    <router-link :to="{name: 'login'}" class="text-light-gray-hover text-decoration-none">
                                        Sign in
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
            passwordConfirmationFieldType: 'password',
            tab: 'forget',
            forgetParam: {
                email: '',
            },
            forgetLoading: false,
            resetParam: {
                email: '',
                code: '',
                password: '',
                password_confirmation: '',
            },
            resetLoading: false,
            error: null,
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

        /* Function to password confirm visibility */
        passwordConfirmVisibility() {
            this.passwordConfirmationFieldType = this.passwordConfirmationFieldType === "password" ? "text" : "password";
        },

        /* Function to forget api */
        userForget() {
            this.forgetLoading = true;
            this.error = null;
            apiServices.POST(apiRoutes.userForget, this.forgetParam, (res) => {
                this.forgetLoading = false
                if (res.message) {
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.resetParam.email = this.forgetParam.email
                    this.tab = 'reset'
                } else {
                    this.error = res.error
                }
            })
        },

        /* Function to reset api */
        userReset() {
            this.resetLoading = true;
            this.error = null;
            apiServices.POST(apiRoutes.userReset, this.resetParam, (res) => {
                this.resetLoading = false
                if (res.message) {
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.$router.push( { name: 'login' } )
                } else {
                    this.error = res.error
                }
            })
        }

    }
}

</script>
