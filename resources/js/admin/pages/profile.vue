<template>

    <!-- Breadcrumb -->
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

                                <!-- Group of button -->
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

                                        <div class="form-group">

                                            <!-- Avatar Upload -->
                                            <label for="upload-image" v-if="this.uploadedImage === null && !uploadLoading"
                                                   class="form-label wpx-200 hpx-200 rounded-circle d-flex justify-content-center align-items-center flex-column bg-white text-center cursor-pointer border">
                                                <input id="upload-image" type="file" name="update-image" hidden="hidden" @change="uploadFile($event)">
                                                <i class="bi bi-person-plus text-success text-opacity-75 fs-1"></i>
                                            </label>

                                            <!-- Avatar uploaded -->
                                            <div class="position-relative" v-if="this.uploadedImage != null && !uploadLoading">
                                                <img :src="uploadedImage" class="img-fluid object-fit-cover wpx-200 hpx-200 rounded-4" alt="uploaded image">
                                                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <button type="button" class="btn btn-danger wpx-35 hpx-35 d-flex justify-content-center align-items-center rounded-circle p-0" @click="deleteFile">
                                                        <i class="bi bi-trash2"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Avatar preloader -->
                                            <div class="position-relative" v-if="uploadLoading">
                                                <div class="wpx-200 hpx-200 rounded-4 bg-secondary-subtle"></div>
                                                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <div class="spinner-border text-secondary" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </form>
                                </div>

                            </div>
                            <div class="card-body">

                                <!-- Profile information -->
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

                                    <!-- Profile preloader -->
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

                            <!-- Update profile form -->
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
                                        <button type="submit" class="btn btn-theme wpx-200" v-if="!updateProfileLoading">
                                            Update profile
                                        </button>
                                        <button type="button" class="btn btn-theme wpx-200" v-if="updateProfileLoading">
                                            <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Update password form -->
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
                                        <button type="submit" class="btn btn-theme wpx-200" v-if="!passwordChangeLoading">
                                            Update password
                                        </button>
                                        <button type="button" class="btn btn-theme wpx-200" v-if="passwordChangeLoading">
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
        // Component properties
        breadcrumb
    },

    data() {
        return {
            // Data properties
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
            loading: false,
            profile_data: '',
            updateProfileLoading: false,
            passwordChangeLoading: false,
            error: null,
            uploadLoading: false,
            uploadedImage: null,
            uploadedImageId: null,
        }
    },

    mounted() {
        this.getAdminProfile()
    },

    methods: {

        // Function of get profile data api callback
        getAdminProfile() {
            this.loading = true;
            apiServices.GET(apiRoutes.adminProfile, null, (res) => {
                this.loading = false;
                if(res.message) {
                    this.profile_data = res?.data;
                    this.profileParam = JSON.parse(JSON.stringify(res?.data));
                } else {
                    this.$toast.error('Server Error', { position: "top-right" } );
                }
            })
        },

        // Function of update admin profile data api callback
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

        // Function of change password data api callback
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

        // Function of set tab
        setTab(tab) {
            this.tab = tab
        },

        // Function of password visibility
        passwordVisibility() {
            this.passwordFieldType = this.passwordFieldType === "password" ? "text" : "password";
        },

        // Function of password confirm visibility
        passwordConfirmVisibility() {
            this.passwordConfirmationFieldType = this.passwordConfirmationFieldType === "password" ? "text" : "password";
        },

        // Function of upload file
        uploadFile(event) {
            this.uploadLoading = true;
            let file = event.target.files[0];
            let formData = new FormData();
            formData.append("file", file)
            formData.append("media_type", 1);
            apiServices.UPLOAD(apiRoutes.fileUpload, formData, (res) => {
                event.target.value = ''
                this.uploadLoading = false
                if (res) {
                    this.uploadedImageId = res?.data?.id
                    this.uploadedImage = res?.data?.full_file_path
                } else {
                    this.error = res.errors
                }
            })
        },

        // Function of delete file
        deleteFile() {
            this.uploadLoading = true;
            apiServices.DELETE(apiRoutes.fileDelete+`/${this.uploadedImageId}`, {}, (res) => {
                if(res) {
                    this.uploadLoading = false;
                    this.uploadedImage = null;
                } else {
                    this.error = res.errors
                }
            });
        },

    }

}

</script>
