<template>

    <div class="card rounded-3 border-0 shadow">
        <div class="card-body card-list scrollbar d-flex justify-content-center align-items-center flex-column">
            <div class="mb-2">
                <i class="bi bi-database-exclamation fs-2 text-theme"></i>
            </div>
            <div class="mb-3">
                <div class="text-center text-light-gray fs-5">
                    No data founded!
                </div>
            </div>
            <div class="mb-3">
                <div class="text-center text-light-gray fs-6">
                    Click “New” to create new course.
                </div>
            </div>
            <button type="button"
                    class="btn btn-theme wpx-90 hpx-36 d-flex align-items-center justify-content-center border-0"
                    @click="newModalFunction">
                New
            </button>
        </div>
    </div>

</template>

<script>

export default {
    props: {
        newModalFunction: Function,
    },

    data() {
        return {}
    },

    mounted() {

    },

    methods: {}

}

</script>
