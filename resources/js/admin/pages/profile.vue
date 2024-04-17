<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <breadcrumb :items="BreadcrumbItems" moduleName="Profile"/>
    </div>

    <div class="row mt-3 mt-md-5">
        <div class="d-flex justify-content-center align-items-start">
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-xl-5 p-2">
                        <div class="card rounded-3 border-0">
                            <div class="card-header bg-white rounded-3 border-0">

                                <!-- group of button -->
                                <div
                                    class="card-header bg-white rounded-3 border-0 d-flex justify-content-start align-items-center pt-3">

                                    <button type="button" class="btn btn-theme me-1" @click="setTab(1)" v-if="!loading">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-theme me-1" @click="setTab(2)" v-if="!loading">
                                        <i class="bi bi-shield"></i>
                                    </button>

                                    <button type="button" class="btn btn-theme me-1 disabled placeholder wpx-42 hpx-38" v-if="loading"></button>
                                    <button type="button" class="btn btn-theme me-1 disabled placeholder wpx-42 hpx-38" v-if="loading"></button>

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
                    <div class="col-xl-7 p-2">
                        <div class="card rounded-3 border-0 p-3">

                            <!-- update profile -->
                            <div class="card-body" v-if="tab === 1">
                                <div class="fs-5 mb-3">Edit Profile</div>
                                <form @submit.prevent="updateAdminProfile()">
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input id="name" type="text" name="name" class="form-control"
                                               v-model="profileParam.name" autocomplete="new-name">
                                        <div class="error-report" v-if="error != null && error.name !== undefined"> {{error.name[0]}} </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" type="email" name="email" class="form-control"
                                               v-model="profileParam.email" autocomplete="new-email">
                                        <div class="error-report" v-if="error != null && error.email !== undefined"> {{error.email[0]}} </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="phone-number" class="form-label">Phone number</label>
                                        <input id="phone-number" type="text" name="phone-number" class="form-control"
                                               v-model="profileParam.phone" autocomplete="new-phone-number">
                                        <div class="error-report" v-if="error != null && error.phone !== undefined"> {{error.phone[0]}} </div>
                                    </div>
                                    <div class="w-100">
                                        <button type="submit" class="btn btn-theme wpx-150" v-if="!updateProfileLoading">
                                            Update profile
                                        </button>
                                        <button type="button" class="btn btn-theme wpx-150" v-if="updateProfileLoading">
                                            <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- update password -->
                            <div class="card-body" v-if="tab === 2">
                                <div class="fs-5 mb-3">Change password</div>
                                <form @submit.prevent="changeAdminPassword()">
                                    <div class="form-group mb-3">
                                        <label for="current-password" class="form-label">Current password</label>
                                        <input id="current-password" type="password" name="current-password"
                                               v-model="passwordParam.current_password" class="form-control"
                                               autocomplete="current-password">
                                        <div class="error-report" v-if="error != null && error.current_password !== undefined"> {{error.current_password[0]}} </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="new-password" class="form-label">New password</label>
                                        <div class="position-relative">
                                            <input id="password" :type="passwordFieldType" name="password"
                                                   class="form-control" v-model="passwordParam.password"
                                                   autocomplete="new-password">
                                            <div
                                                class="me-3 border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y me-2 cursor-pointer"
                                                @click="passwordVisibility">
                                                <i class="bi bi-eye" v-if="passwordFieldType === 'text'"></i>
                                                <i class="bi bi-eye-slash" v-if="passwordFieldType === 'password'"></i>
                                            </div>
                                        </div>
                                        <div class="error-report" v-if="error != null && error.password !== undefined"> {{error.password[0]}} </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="confirm-password" class="form-label">Confirm password</label>
                                        <div class="position-relative">
                                            <input id="password" :type="passwordConfirmationFieldType" name="password"
                                                   class="form-control" v-model="passwordParam.password_confirmation"
                                                   autocomplete="new-confirm-password">
                                            <div
                                                class="me-3 border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y me-2 cursor-pointer"
                                                @click="passwordConfirmVisibility">
                                                <i class="bi bi-eye"
                                                   v-if="passwordConfirmationFieldType === 'text'"></i>
                                                <i class="bi bi-eye-slash"
                                                   v-if="passwordConfirmationFieldType === 'password'"></i>
                                            </div>
                                        </div>
                                        <div class="error-report" v-if="error != null && error.password_confirmation !== undefined"> {{error.password_confirmation[0]}} </div>
                                    </div>
                                    <div class="w-100">
                                        <button type="submit" class="btn btn-theme wpx-150" v-if="!passwordChangeLoading">
                                            Update password
                                        </button>
                                        <button type="button" class="btn btn-theme wpx-150" v-if="passwordChangeLoading">
                                            <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import breadcrumb from "../components/breadcrumb.vue";
import apiServices from "../../services/apiServices.js";
import apiRoutes from "../../services/apiRoutes.js";

export default {
    components: {
        breadcrumb
    },

    data() {

        return {
            BreadcrumbItems: [
                {title: 'Dashboard', route: 'dashboard'},
                {title: 'profile', route: 'profile'},
            ],
            tab: 1,
            password: '',
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
                phone: '',
            },
            loading: true,
            profile_data: null,
            updateProfileLoading: false,
            passwordChangeLoading: false,
            error: null,
        }

    },

    mounted() {
        setTimeout(() => {
            this.loading = false
        }, 2000)
        this.getAdminProfile()
    },

    methods: {

        /* Function to get profile data api */
        getAdminProfile() {
            this.loading = true;
            apiServices.GET(apiRoutes.adminProfile, null, (res) => {
                this.loading = false;
                if(res.message) {
                    this.profile_data = res.data
                    this.profileParam = this.profile_data
                } else {
                    this.$toast.error('Server Error', { position: "top-right" } );
                }
            })
        },

        /* Function to update admin profile data api */
        updateAdminProfile() {
            this.updateProfileLoading = true;
            apiServices.PATCH(apiRoutes.adminProfileUpdate,this.profileParam, (res) => {
                this.updateProfileLoading = false;
                if (res.message) {
                    this.$toast.success(res.message, { position: "top-right" } );
                    window.location.reload()
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to change password data api */
        changeAdminPassword() {
            this.passwordChangeLoading = true;
            apiServices.PATCH(apiRoutes.adminChangePassword, this.passwordParam, (res) => {
                this.passwordChangeLoading = false;
                if(res.message) {
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.passwordParam = { current_password: '', password: '', password_confirmation: '' }
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to set tab */
        setTab(tab) {
            this.tab = tab
        },

        /* Function to password visibility */
        passwordVisibility() {
            this.passwordFieldType = this.passwordFieldType === "password" ? "text" : "password";
        },

        /* Function to password confirm visibility */
        passwordConfirmVisibility() {
            this.passwordConfirmationFieldType = this.passwordConfirmationFieldType === "password" ? "text" : "password";
        },

    }

}

</script>
