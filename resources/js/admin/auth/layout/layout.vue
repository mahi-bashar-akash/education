<template>
    <div class="auth-portal">
        <div class="vh-100 d-flex justify-content-center align-items-center flex-column">
            <div class="auth-content p-3">
                <div class="border p-4 p-md-5 bg-white rounded-3">
                    <div class="mb-2 fs-5 text-center">
                        <img :src="`/images/logo.png`" class="wpx-35 hpx-35" alt="favicon">
                        {{ APP_NAME }}
                    </div>
                    <router-view/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            APP_NAME: window.core.APP_NAME,
        }
    },
    mounted() {
    },
    methods: {}
}

</script>
