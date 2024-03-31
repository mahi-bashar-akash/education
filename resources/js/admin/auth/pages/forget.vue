<template>

    <form v-if="tab === 'forget'">
        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" class="form-control" required autocomplete="new-email">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-theme wpx-150" @click="tab = 'reset'">
                Forget password
            </button>
        </div>
        <div class="text-light-gray">
            Already have an account?
            <router-link :to="{name: 'login'}" class="text-light-gray-hover text-decoration-none">
                Sign in
            </router-link>
        </div>
    </form>

    <form v-if="tab === 'reset'">
        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" class="form-control" required autocomplete="new-email">
        </div>
        <div class="form-group mb-3">
            <label for="code" class="form-label">Code</label>
            <input id="code" type="text" name="code" class="form-control" required autocomplete="new-code">
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
        <div class="mb-3">
            <button type="submit" class="btn btn-theme wpx-90">
                Reset
            </button>
        </div>
        <div class="text-light-gray">
            Already have an account?
            <router-link :to="{name: 'login'}" class="text-light-gray-hover text-decoration-none">
                Sign in
            </router-link>
        </div>
    </form>

</template>

<script>
export default {
    data() {
        return {
            password: '',
            passwordFieldType: 'password',
            passwordConfirmationFieldType: 'password',
            tab: 'forget',
        }
    },
    mounted() {  },
    methods: {

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
