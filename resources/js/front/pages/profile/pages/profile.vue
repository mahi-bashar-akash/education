<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center bg-white shadow p-3">
        <breadcrumb :items="BreadcrumbItems"/>
    </div>

    <div class="row mt-3 mt-md-5">
        <div class="d-flex justify-content-center align-items-start">
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-xl-5 p-2">
                        <div class="card rounded-3 border">
                            <div class="card-header bg-white rounded-3 border-0">

                                <!-- group of button -->
                                <div
                                    class="card-header bg-white rounded-3 border-0 d-flex justify-content-start align-items-center pt-3">
                                    <button type="button" class="btn btn-theme me-1" @click="setTab('edit-profile')" v-if="!loading">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-theme me-1" @click="setTab('edit-password')" v-if="!loading">
                                        <i class="bi bi-shield"></i>
                                    </button>
                                    <button type="button" class="btn btn-theme" @click="setTab('edit-payment')" v-if="!loading">
                                        <i class="bi bi-currency-dollar"></i>
                                    </button>
                                    <button type="button" class="btn btn-theme me-1 disabled placeholder wpx-42 hpx-38" v-if="loading"></button>
                                    <button type="button" class="btn btn-theme me-1 disabled placeholder wpx-42 hpx-38" v-if="loading"></button>
                                    <button type="button" class="btn btn-theme disabled placeholder wpx-42 hpx-38" v-if="loading"></button>
                                </div>

                                <div class="d-flex justify-content-center align-items-center">
                                    <form class="pt-3">

                                        <!-- avatar upload -->
                                        <label for="upload-image"
                                               class="form-label wpx-175 hpx-175 border rounded-circle d-flex justify-content-center align-items-center cursor-pointer"
                                               v-if="!loading">
                                            <input id="upload-image" type="file" name="upload-image"
                                                   class="form-control" hidden="hidden">
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
                                            Mahi Bashar Akash
                                        </div>
                                        <div class="mb-2 text-light-gray fw-bold">
                                            Email:
                                        </div>
                                        <div class="mb-2 text-light-gray-hover">
                                            mahibashar2023@gmail.com
                                        </div>
                                        <div class="mb-2 text-light-gray fw-bold">
                                            Phone Number:
                                        </div>
                                        <div class="mb-2 text-light-gray-hover">
                                            01645820007
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
                        <div class="card rounded-3 border p-3">

                            <!-- update profile -->
                            <div class="card-body" v-if="tab === 'edit-profile'">
                                <div class="fs-5 mb-3"> Edit profile</div>
                                <form>
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input id="name" type="text" name="name" class="form-control"
                                               v-model="profileParam.name" required autocomplete="new-name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" type="email" name="email" class="form-control"
                                               v-model="profileParam.email" required autocomplete="new-email">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="phone-number" class="form-label">Phone number</label>
                                        <input id="phone-number" type="text" name="phone-number" class="form-control"
                                               v-model="profileParam.phoneNumber" required
                                               autocomplete="new-phone-number">
                                    </div>
                                    <div class="w-100">
                                        <button type="button" class="btn btn-theme wpx-150">
                                            Update profile
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- update password -->
                            <div class="card-body" v-if="tab === 'edit-password'">
                                <div class="fs-5 mb-3"> Edit password</div>
                                <form>
                                    <div class="form-group mb-3">
                                        <label for="current-password" class="form-label">Current password</label>
                                        <input id="current-password" type="password" name="current-password"
                                               v-model="passwordParam.currentPassword" class="form-control" required
                                               autocomplete="current-password">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="new-password" class="form-label">New password</label>
                                        <div class="position-relative">
                                            <input id="password" :type="passwordFieldType" name="password"
                                                   class="form-control" v-model="passwordParam.password" required
                                                   autocomplete="new-password">
                                            <div
                                                class="me-3 border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y me-2 cursor-pointer"
                                                @click="passwordVisibility">
                                                <i class="bi bi-eye" v-if="passwordFieldType === 'text'"></i>
                                                <i class="bi bi-eye-slash" v-if="passwordFieldType === 'password'"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="confirm-password" class="form-label">Confirm password</label>
                                        <div class="position-relative">
                                            <input id="password" :type="passwordConfirmationFieldType" name="password"
                                                   class="form-control" v-model="passwordParam.passwordConfirm" required
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
                                    </div>
                                    <div class="w-100">
                                        <button type="button" class="btn btn-theme wpx-150">
                                            Update password
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- update payment -->
                            <div class="card-body" v-if="tab === 'edit-payment'">
                                <div class="fs-5 mb-3">Edit payment</div>
                                <form>
                                    <div class="mb-3">
                                        <label for="card-holder-full-name" class="form-label fw-bold">
                                            Card holder full name
                                        </label>
                                        <input id="card-holder-full-name" type="text" name="card-holder-full-name"
                                               class="form-control" required v-model="paymentParam.cardHolderName"
                                               autocomplete="new-card-holder-full-name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="card-name" class="form-label fw-bold">Card name</label>
                                        <input id="card-name" type="text" name="card-name" class="form-control" required
                                               v-model="paymentParam.cardName"
                                               autocomplete="new-card-name">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="expire-date" class="form-label fw-bold">Expire date</label>
                                            <input id="expire-date" type="text" name="expire-date" class="form-control"
                                                   required v-model="paymentParam.expireDate"
                                                   autocomplete="new-expire-date">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="cvv" class="form-label fw-bold">CVV</label>
                                            <input id="cvv" type="text" name="cvv" class="form-control" required
                                                   v-model="paymentParam.cvv"
                                                   autocomplete="new-cvv">
                                        </div>
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
            passwordFieldType: 'password',
            passwordConfirmationFieldType: 'password',
            passwordParam: {
                currentPassword: '',
                password: '',
                passwordConfirm: '',
            },
            profileParam: {
                name: '',
                email: '',
                phoneNumber: '',
            },
            paymentParam: {
                cardHolderName: '',
                cardName: '',
                expireDate: '',
                cvv: '',
            },
            loading: true,
        }

    },

    mounted() {
        setTimeout(() => {
            this.loading = false
        }, 2000)
    },

    methods: {

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
