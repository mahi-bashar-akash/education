<template>

    <nav
        style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <div class="breadcrumb bg-white shadow p-3 rounded-3">
            <div class="breadcrumb-item">
                <router-link :to="{name: 'profile'}" class="text-decoration-none text-light-gray-hover">
                    Profile
                </router-link>
            </div>
        </div>
    </nav>

    <div class="d-none d-sm-flex align-items-center justify-content-start mb-4">
        <button type="button" class="btn btn-theme px-3 me-2" @click="setTab('edit-profile')">
            Edit profile
        </button>
        <button type="button" class="btn btn-theme px-3 me-2" @click="setTab('edit-password')">
            Edit password
        </button>
        <button type="button" class="btn btn-theme px-3 me-2" @click="setTab('add-payment')">
            Add Payment
        </button>
    </div>

    <div class="dropdown dropdown-center d-sm-none">
        <button type="button" class="btn btn-theme w-100 mb-3" data-bs-toggle="dropdown" aria-expanded="false">
            {{inertDropdownText}}
        </button>
        <ul class="dropdown-menu dropdown-center w-100">
            <li>
                <button type="button" class="dropdown-item px-4 py-2" @click="setDropdownText($event); setTab('edit-profile')">
                    Edit Profile
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item px-4 py-2" @click="setDropdownText($event); setTab('edit-password')">
                    Edit Password
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item px-4 py-2" @click="setDropdownText($event); setTab('add-payment')">
                    Add Payment
                </button>
            </li>
        </ul>
    </div>

    <form class="mb-3 bg-white shadow p-4 rounded-3" v-if="tab === 'edit-profile'">

        <div class="mb-3 fs-5">
            Edit profile
        </div>

        <div class="form-group mb-2">
            <label for="name" class="form-label">Name</label>
            <input id="name" type="text" name="name" class="form-control" required autocomplete="new-name" v-model="formData.name">
        </div>

        <div class="form-group mb-2">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" class="form-control" required autocomplete="new-email" v-model="formData.email">
        </div>

        <div class="form-group mb-2">
            <label for="phone-number" class="form-label">Phone number</label>
            <input id="phone-number" type="text" name="phone-number" class="form-control" required autocomplete="new-phone-number" v-model="formData.phoneNumber">
        </div>

        <div class="form-group mb-2">
            <label for="address" class="form-label">Address</label>
            <input id="address" type="text" name="address" class="form-control" required autocomplete="new-address" v-model="formData.address">
        </div>

        <button type="submit" class="btn btn-theme wpx-150">
            Update profile
        </button>

    </form>

    <form class="mb-3 bg-white shadow p-4 rounded-3" v-if="tab === 'edit-password'">

        <div class="mb-3 fs-5">
            Edit password
        </div>

        <div class="form-group mb-2">
            <label for="current-password" class="form-label">Current password</label>
            <div class="position-relative">
                <input id="current-password" :type="currentPasswordFieldType" name="password" class="form-control" required autocomplete="new-current-password">
                <div class="me-3 border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y me-2 cursor-pointer" @click="currentPasswordVisibility">
                    <i class="bi bi-eye" v-if="currentPasswordFieldType === 'text'"></i>
                    <i class="bi bi-eye-slash" v-if="currentPasswordFieldType === 'password'"></i>
                </div>
            </div>
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

        <div class="form-group mb-3">
            <label for="confirm-password" class="form-label">Confirm Password</label>
            <div class="position-relative">
                <input id="confirm-password" :type="passwordConfirmationFieldType" name="confirm-password" class="form-control" required autocomplete="new-confirm-password">
                <div class="me-3 border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y me-2 cursor-pointer" @click="passwordConfirmVisibility">
                    <i class="bi bi-eye" v-if="passwordConfirmationFieldType === 'text'"></i>
                    <i class="bi bi-eye-slash" v-if="passwordConfirmationFieldType === 'password'"></i>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-theme wpx-150">
            Update password
        </button>

    </form>

    <form class="mb-3 bg-white shadow p-4 rounded-3" v-if="tab === 'add-payment'">

        <div class="mb-3 fs-5">
            Add payment
        </div>

        <div class="form-group mb-2">
            <label for="card-holder-name" class="form-label">Card holder name</label>
            <input id="card-holder-name" type="text" name="card-holder-name" class="form-control" required autocomplete="new-card-holder-name" v-model="paymentParam.cardHolderName">
        </div>

        <div class="form-group mb-2">
            <label for="card-name" class="form-label">Card name</label>
            <input id="card-name" type="text" name="card-name" class="form-control" required autocomplete="new-card-name" v-model="paymentParam.cardName">
        </div>

        <div class="form-group mb-2">
            <label for="expire-date" class="form-label">Expire date</label>
            <input id="expire-date" type="text" name="expire-date" class="form-control" required autocomplete="new-expire-date" v-model="paymentParam.ExpireDate">
        </div>

        <div class="form-group mb-2">
            <label for="cvv" class="form-label">CVV</label>
            <input id="cvv" type="text" name="cvv" class="form-control" required autocomplete="new-cvv" v-model="paymentParam.CVV">
        </div>

        <button type="submit" class="btn btn-theme wpx-150">
            Submit
        </button>

    </form>

</template>

<script>
import flatpickr from "flatpickr";

export default {
    data() {
        return {
            formData: {
                name: 'Mahi Bashar Akash',
                email: 'mahibashar2023@gmail.com',
                phoneNumber: '01400125289',
                address: 'Dhanmondi, Dhaka - 1209, Bangladesh',
            },
            paymentParam: {
                cardHolderName: '',
                cardName: '',
                ExpireDate: '',
                CVV: '',
            },
            password: '',
            currentPasswordFieldType: 'password',
            passwordFieldType: 'password',
            passwordConfirmationFieldType: 'password',
            tab: 'edit-profile',
            inertDropdownText: 'Edit Profile',
        }
    },
    mounted() {
        this.flatpickrConfigDate();
    },
    methods: {

        /* Function to change tab */
        setTab(tab) {
            this.tab = tab
        },

        /* Function inert dropdown text */
        setDropdownText(e) {
            this.inertDropdownText = e.target.innerText
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

        /* Function to expire date */
        flatpickrConfigDate() {
            flatpickr("#expire-date", {
                altFormat: 'j M Y',
                altInput: true,
                dateFormat: 'Y-m-d',
                disableMobile: true,
            })
        },

    }
}

</script>
