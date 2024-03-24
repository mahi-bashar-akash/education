<template>
    <div class="auth-portal">
        <div class="vh-100 d-flex justify-content-center align-items-center flex-column">
            <div class="auth-content p-3">
                <div class="border p-4 p-md-5 bg-white">
                    <router-view/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {}
    },
    mounted() {  },
    methods: {  }
}

</script>
