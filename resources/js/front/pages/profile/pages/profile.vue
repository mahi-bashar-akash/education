<template>

    <!-- breadcrumb -->
    <div class="d-flex justify-content-between align-items-center bg-white shadow px-4 mb-3 rounded-3 hpx-60">
        <breadcrumb :items="BreadcrumbItems"/>
    </div>

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-5 col-xl-4 p-2">

                <div class="card rounded-3 border-0 shadow">

                    <div class="card-header bg-white rounded-3 border-0">

                        <!-- group of button -->
                        <div class="card-header bg-white rounded-3 border-0 d-flex justify-content-start align-items-center pt-3">

                            <button type="button" class="btn me-1" @click="setTab('edit-profile')" v-if="!loading" :class="{ 'btn-theme' : tab === 'edit-profile', 'btn-outline-theme' : tab !== 'edit-profile' }">
                                <i class="bi bi-pencil-square"></i>
                            </button>

                            <button type="button" class="btn me-1" @click="setTab('edit-password')" v-if="!loading" :class="{ 'btn-theme' : tab === 'edit-password', 'btn-outline-theme' : tab !== 'edit-password' }">
                                <i class="bi bi-shield"></i>
                            </button>

                            <button type="button" class="btn" @click="setTab('edit-payment')" v-if="!loading" :class="{ 'btn-theme' : tab === 'edit-payment', 'btn-outline-theme' : tab !== 'edit-payment' }">
                                <i class="bi bi-currency-dollar"></i>
                            </button>

                            <button type="button" class="btn btn-theme me-1 disabled placeholder wpx-42 hpx-38" v-if="loading"></button>

                            <button type="button" class="btn btn-theme me-1 disabled placeholder wpx-42 hpx-38" v-if="loading"></button>

                            <button type="button" class="btn btn-theme disabled placeholder wpx-42 hpx-38" v-if="loading"></button>

                        </div>

                        <div class="d-flex justify-content-center align-items-center">

                            <form class="pt-3">

                                <!-- avatar upload -->
                                <label for="upload-image" class="form-label wpx-175 hpx-175 border rounded-circle d-flex justify-content-center align-items-center cursor-pointer" v-if="!loading">
                                    <input id="upload-image" type="file" name="upload-image" class="form-control" hidden="hidden">
                                    <span class="d-block">
                                        <i class="bi bi-person-plus text-success text-opacity-75 fs-1"></i>
                                    </span>
                                </label>

                                <!-- avatar preloader -->
                                <div class="card-text placeholder-glow" v-if="loading">
                                    <div class="mb-2">
                                        <div class="placeholder wpx-175 hpx-175 rounded-circle"></div>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>

                    <div class="card-body">

                        <!-- profile information -->
                        <div class="mt-3 px-3">
                            <div v-if="!loading">
                                <div class="mb-2 text-light-gray fw-bold">
                                    Name:
                                </div>
                                <div class="mb-2 text-light-gray-hover">
                                    {{profile_data.name}}
                                </div>
                                <div class="mb-2 text-light-gray fw-bold">
                                    Email:
                                </div>
                                <div class="mb-2 text-light-gray-hover">
                                    {{profile_data.email}}
                                </div>
                                <div class="mb-2 text-light-gray fw-bold">
                                    Phone Number:
                                </div>
                                <div class="mb-2 text-light-gray-hover">
                                    {{profile_data.phone}}
                                </div>
                            </div>

                            <div class="card-text placeholder-glow" v-if="loading">
                                <div class="mb-2">
                                    <div class="placeholder wpx-45"></div>
                                </div>
                                <div class="mb-2">
                                    <div class="placeholder wpx-150"></div>
                                </div>
                                <div class="mb-2">
                                    <div class="placeholder wpx-45"></div>
                                </div>
                                <div class="mb-2">
                                    <div class="placeholder wpx-175"></div>
                                </div>
                                <div class="mb-2">
                                    <div class="placeholder wpx-45"></div>
                                </div>
                                <div class="placeholder wpx-150"></div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-7 col-xl-8 p-2">

                <div class="card rounded-3 border-0 px-3 pt-3 h-100 shadow">

                    <!-- update profile -->
                    <div class="card-body" v-if="tab === 'edit-profile'">
                        <div class="fs-5 mb-3"> Edit profile</div>
                        <form @submit.prevent="updateUserProfile()" autocomplete="off">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" type="text" name="name" class="form-control" v-model="profileParam.name" autocomplete="new-name" placeholder="Enter your full name">
                                <div class="error-report" v-if="error != null && error.email !== undefined"> {{error.name[0]}} </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" name="email" class="form-control" v-model="profileParam.email" autocomplete="new-email" placeholder="Enter your email address">
                                <div class="error-report" v-if="error != null && error.email !== undefined"> {{error.email[0]}} </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone" class="form-label">Phone number</label>
                                <input id="phone" type="text" name="phone" class="form-control" v-model="profileParam.phone" autocomplete="new-phone" placeholder="Enter your phone number">
                                <div class="error-report" v-if="error != null && error.email !== undefined"> {{error.phone[0]}} </div>
                            </div>
                            <div class="w-100">
                                <button type="submit" class="btn btn-theme wpx-200" v-if="!updateProfileLoading"> Update profile </button>
                                <button type="button" class="btn btn-theme wpx-200" v-if="updateProfileLoading">
                                    <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- update password -->
                    <div class="card-body" v-if="tab === 'edit-password'">
                        <div class="fs-5 mb-3"> Change password</div>
                        <form @submit.prevent="changeUserPassword()" autocomplete="off">
                            <div class="form-group mb-3">
                                <label for="current-password" class="form-label">Current password</label>
                                <div class="position-relative">
                                    <input id="current-password" :type="currentPasswordFieldType" name="current-password" v-model="passwordParam.current_password" class="form-control" autocomplete="current-password" placeholder="Enter your current password">
                                    <div class="me-3 border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y me-2 cursor-pointer" @click="currentPasswordVisibility">
                                        <i class="bi bi-eye" v-if="currentPasswordFieldType === 'text'"></i>
                                        <i class="bi bi-eye-slash" v-if="currentPasswordFieldType === 'password'"></i>
                                    </div>
                                </div>
                                <div class="error-report" v-if="error != null && error.current_password !== undefined"> {{error.current_password[0]}} </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="new-password" class="form-label">New password</label>
                                <div class="position-relative">
                                    <input id="password" :type="passwordFieldType" name="password" class="form-control" v-model="passwordParam.password" autocomplete="new-password" placeholder="Enter your new password">
                                    <div class="me-3 border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y me-2 cursor-pointer" @click="passwordVisibility">
                                        <i class="bi bi-eye" v-if="passwordFieldType === 'text'"></i>
                                        <i class="bi bi-eye-slash" v-if="passwordFieldType === 'password'"></i>
                                    </div>
                                </div>
                                <div class="error-report" v-if="error != null && error.password !== undefined"> {{error.password[0]}} </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="confirm-password" class="form-label">Confirm password</label>
                                <div class="position-relative">
                                    <input id="confirm-password" :type="passwordConfirmationFieldType" name="password-confirmation" class="form-control" v-model="passwordParam.password_confirmation" autocomplete="new-confirm-password" placeholder="Enter your new confirm password">
                                    <div class="me-3 border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y me-2 cursor-pointer" @click="passwordConfirmVisibility">
                                        <i class="bi bi-eye" v-if="passwordConfirmationFieldType === 'text'"></i>
                                        <i class="bi bi-eye-slash" v-if="passwordConfirmationFieldType === 'password'"></i>
                                    </div>
                                </div>
                                <div class="error-report" v-if="error != null && error.password_confirmation !== undefined"> {{error.password_confirmation[0]}} </div>
                            </div>
                            <div class="w-100">
                                <button type="submit" class="btn btn-theme wpx-200" v-if="!passwordChangeLoading">
                                    Update password
                                </button>
                                <button type="button" class="btn btn-theme wpx-200" v-if="passwordChangeLoading">
                                    <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- update payment -->
                    <div class="card-body" v-if="tab === 'edit-payment'">
                        <div class="fs-5 mb-3">Edit payment</div>
                        <form @submit.prevent="updateUserPayment()" autocomplete="off">
                            <div class="mb-3">
                                <label for="card-holder-full-name" class="form-label fw-bold"> Card holder full name </label>
                                <input id="card-holder-full-name" type="text" name="card_holder_name" class="form-control" v-model="paymentParam.card_holder_name" autocomplete="new-card-holder-full-name" placeholder="Enter your card holder full name">
                                <div class="error-report" v-if="error != null && error.card_holder_name !== undefined"> {{error.card_holder_name[0]}} </div>
                            </div>
                            <div class="mb-3">
                                <label for="card-name" class="form-label fw-bold"> Card name </label>
                                <input id="card-name" type="text" name="card_name" class="form-control" v-model="paymentParam.card_name" autocomplete="new-card-name" placeholder="Enter your card name">
                                <div class="error-report" v-if="error != null && error.card_name !== undefined"> {{error.card_name[0]}} </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="card-expire-date" class="form-label fw-bold"> Expire date </label>
                                    <input id="card-expire-date" type="text" name="card_expire_date" class="form-control" v-model="paymentParam.card_expire_date" autocomplete="new-expire-date" placeholder="Enter your card expire date">
                                    <div class="error-report" v-if="error != null && error.card_expire_date !== undefined"> {{error.card_expire_date[0]}} </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="card-cvv" class="form-label fw-bold"> CVV </label>
                                    <input id="card-cvv" type="text" name="card_cvv" class="form-control" v-model="paymentParam.card_cvv" autocomplete="new-cvv" placeholder="Enter your card cvv">
                                    <div class="error-report" v-if="error != null && error.card_cvv !== undefined"> {{error.card_cvv[0]}} </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-theme wpx-200" v-if="!paymentLoading">
                                    Update payment
                                </button>
                                <button type="button" class="btn btn-theme wpx-200" v-if="paymentLoading">
                                    <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</template>

<script>
import breadcrumb from "../components/breadcrumb.vue";
import apiServices from "../../../../services/apiServices.js";
import apiRoutes from "../../../../services/apiRoutes.js";
import flatpickr from "flatpickr";

export default {
    components: {
        breadcrumb
    },

    data() {

        return {
            BreadcrumbItems: [
                {title: 'Profile', route: 'profile'},
            ],
            tab: 'edit-profile',
            password: '',
            currentPasswordFieldType: 'password',
            passwordFieldType: 'password',
            passwordConfirmationFieldType: 'password',
            passwordParam: {
                current_password: '',
                password: '',
                password_confirmation: '',
            },
            profileParam: {
                name: '',
                email: '',
                phoneNumber: '',
                presentAddress: '',
            },
            paymentParam: {
                card_holder_name: '',
                card_name: '',
                card_expire_date: '',
                card_cvv: '',
            },
            loading: true,
            userInfo: window.core.UserInfo,
            profile_data: '',
            error: null,
            paymentLoading: false,
            updateProfileLoading: false,
            passwordChangeLoading: false,
        }

    },

    mounted() {
        setTimeout(() => {
            this.loading = false
        }, 2000);
        if(this.userInfo !== null) {
            this.getUserProfile();
        }
    },

    methods: {

        /* Function to set tab */
        setTab(tab) {
            this.tab = tab
        },

        /* Function to current password visibility */
        currentPasswordVisibility() {
            this.currentPasswordFieldType = this.currentPasswordFieldType === "password" ? "text" : "password";
        },

        /* Function to password visibility */
        passwordVisibility() {
            this.passwordFieldType = this.passwordFieldType === "password" ? "text" : "password";
        },

        /* Function to password confirm visibility */
        passwordConfirmVisibility() {
            this.passwordConfirmationFieldType = this.passwordConfirmationFieldType === "password" ? "text" : "password";
        },

        /* Function to get user profile data api */
        getUserProfile() {
            this.loading = true;
            apiServices.GET(apiRoutes.userProfile, null, (res) => {
                this.loading = false;
                if (res.message) {
                    this.profile_data = res?.data
                    this.profileParam = JSON.parse(JSON.stringify(res?.data))
                    this.paymentParam = JSON.parse(JSON.stringify(res?.data))
                }else {
                    this.$toast.error('Server Error', { position: "top-right" } );
                }
            })
        },

        /* Function to update user profile data api */
        updateUserProfile() {
            this.updateProfileLoading = true;
            apiServices.PATCH(apiRoutes.userProfileUpdate, this.profileParam, (res) => {
                this.updateProfileLoading = false;
                if (res.message) {
                    this.$toast.success(res.message, { position: "top-right" } );
                    window.location.reload()
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to change user password data api */
        changeUserPassword() {
            this.passwordChangeLoading = true;
            apiServices.PATCH(apiRoutes.userChangePassword, this.passwordParam, (res) => {
                this.passwordChangeLoading = false;
                if(res.message) {
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.passwordParam = { current_password: '', password: '', password_confirmation: '' }
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to change user password data api */
        updateUserPayment() {
            this.paymentLoading = true;
            apiServices.PATCH(apiRoutes.userPaymentUpdate, this.paymentParam, (res) => {
                this.paymentLoading = false;
                if(res.message) {
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.paymentParam = { card_holder_name: '', card_name: '', card_expire_date: '', card_cvv: '' }
                } else {
                    this.error = res.errors
                }
            })
        },

    }

}

</script>
