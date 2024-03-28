<template>

    <form class="mb-3 bg-white shadow p-3">
        <div class="mb-2 fs-5">Edit profile</div>
        <div class="mb-2">
            <label for="name" class="form-label">Name</label>
            <input id="name" type="text" name="name" class="form-control" required autocomplete="new-name" v-model="formData.name">
        </div>
        <div class="mb-2">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" class="form-control" required autocomplete="new-email" v-model="formData.email">
        </div>
        <div class="mb-2">
            <label for="phone-number" class="form-label">Phone number</label>
            <input id="phone-number" type="text" name="phone-number" class="form-control" required autocomplete="new-phone-number" v-model="formData.phoneNumber">
        </div>
        <div class="mb-2">
            <label for="address" class="form-label">Address</label>
            <input id="address" type="text" name="address" class="form-control" required autocomplete="new-address" v-model="formData.address">
        </div>
        <button type="submit" class="btn btn-theme rounded-0">
            Update profile
        </button>
    </form>

    <form class="mb-3 bg-white shadow p-3">
        <div class="mb-2 fs-5">Edit password</div>
        <div class="mb-2">
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
        <button type="submit" class="btn btn-theme rounded-0">
            Update password
        </button>
    </form>

    <form class="mb-3 bg-white shadow p-3">
        <div class="mb-2 fs-5">Add payment</div>
        <div class="mb-2">
            <label for="card-holder-name" class="form-label">Card holder name</label>
            <input id="card-holder-name" type="text" name="card-holder-name" class="form-control" required autocomplete="new-card-holder-name">
        </div>
        <div class="mb-2">
            <label for="card-name" class="form-label">Card name</label>
            <input id="card-name" type="text" name="card-name" class="form-control" required autocomplete="new-card-name">
        </div>
        <div class="mb-2">
            <label for="expire-date" class="form-label">Expire date</label>
            <input id="expire-date" type="text" name="expire-date" class="form-control" required autocomplete="new-expire-date">
        </div>
        <div class="mb-2">
            <label for="cvv" class="form-label">CVV</label>
            <input id="cvv" type="text" name="cvv" class="form-control" required autocomplete="new-cvv">
        </div>
        <button type="submit" class="btn btn-theme rounded-0">
            Submit
        </button>
    </form>

</template>

<script>

export default {
    data() {
        return {
            formData: {
                name: 'Mahi Bashar Akash',
                email: 'mahibashar2023@gmail.com',
                phoneNumber: '01400125289',
                address: 'Dhanmondi, Dhaka - 1209, Bangladesh',
            },
            password: '',
            currentPasswordFieldType: 'password',
            passwordFieldType: 'password',
            passwordConfirmationFieldType: 'password',
        }
    },
    mounted() {  },
    methods: {

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

    }
}

</script>
