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
            <input id="current-password" type="password" name="current-password" class="form-control" required autocomplete="current-password">
        </div>
        <div class="mb-2">
            <label for="new-password" class="form-label">New password</label>
            <input id="new-password" type="password" name="new-password" class="form-control" required autocomplete="new-password">
        </div>
        <div class="mb-2">
            <label for="confirm-password" class="form-label">Confirm password</label>
            <input id="confirm-password" type="password" name="confirm-password" class="form-control" required autocomplete="confirm-password">
        </div>
        <button type="submit" class="btn btn-theme rounded-0">
            Update password
        </button>
    </form>

    <form class="mb-3 bg-white shadow p-3">
        <div class="mb-2 fs-5">Edit payment</div>
        <div class="mb-2">
            <label for="paymentMethod" class="form-label d-block">Payment methods</label>
            <div class="mb-2">
                <label for="cash-in-hand" class="form-check-label text-light-gray-hover d-flex align-items-center">
                    <input id="cash-in-hand" type="radio" class="form-radio" name="payment-method">
                    <span class="ms-2"> Cash in hand </span>
                </label>
            </div>
            <div class="mb-2">
                <label for="banking" class="form-check-label text-light-gray-hover d-flex align-items-center">
                    <input id="banking" type="radio" class="form-radio" name="payment-method">
                    <span class="ms-2"> Banking </span>
                </label>
            </div>
        </div>
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
            }
        }
    },
    mounted() {  },
    methods: {  }
}

</script>
