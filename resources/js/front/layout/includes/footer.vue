<template>

    <footer class="w-100 bg-light-subtle footer">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                <div class="px-3 pb-3 pt-3 pt-md-5">
                    <div class="fs-4 mb-3">
                        <div class="d-flex align-items-center justify-content-start fw-medium">
                            <img :src="`/images/logo.png`" class="img-fluid wpx-40 hpx-40" alt="logo">
                            {{ app_name }}
                        </div>
                    </div>
                    <div class="text-light-gray">
                        We’ve got the solution: world-class training and development programs developed by top universities.
                    </div>
                    <div class="d-flex align-items-center justify-content-start mt-3 gap-4">
                        <a href="javascript:void(0)" class="nav-link text-light-gray-hover">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="javascript:void(0)" class="nav-link text-light-gray-hover">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="javascript:void(0)" class="nav-link text-light-gray-hover">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="javascript:void(0)" class="nav-link text-light-gray-hover">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="px-3 pb-3 pt-3 pt-md-5">
                    <div class="fs-5 mb-3">
                        Browse Popular Topics
                    </div>
                    <a href="javascript:void(0)" class="nav-link text-light-gray-hover mb-3">
                        Human Resources
                    </a>
                    <a href="javascript:void(0)" class="nav-link text-light-gray-hover mb-3">
                        Data Science Free Courses
                    </a>
                    <a href="javascript:void(0)" class="nav-link text-light-gray-hover mb-3">
                        Speaking English
                    </a>
                    <a href="javascript:void(0)" class="nav-link text-light-gray-hover mb-3">
                        Artificial Intelligence
                    </a>
                    <a href="javascript:void(0)" class="nav-link text-light-gray-hover mb-3">
                        C Programming
                    </a>
                </div>
                <div class="px-3 pb-3 pt-3 pt-md-5">
                    <div class="fs-5 mb-3">
                        Resources
                    </div>
                    <a href="javascript:void(0)" class="nav-link text-light-gray-hover mb-3">
                        Documentation
                    </a>
                    <a href="javascript:void(0)" class="nav-link text-light-gray-hover mb-3">
                        Forums
                    </a>
                    <a href="javascript:void(0)" class="nav-link text-light-gray-hover mb-3">
                        Available Courses
                    </a>
                    <a href="javascript:void(0)" class="nav-link text-light-gray-hover mb-3">
                        Become An Instructor
                    </a>
                    <a href="javascript:void(0)" class="nav-link text-light-gray-hover mb-3">
                        Events
                    </a>
                </div>
            </div>
        </div>
        <hr class="border">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <a href="javascript:void(0)" class="text-decoration-none text-light-gray-hover mb-3 d-block">
                        © Copyrights 2025 theme development
                    </a>
                </div>
                <div class="col-sm-6 d-flex justify-content-sm-end">
                    <a href="https://www.redishketch.com" class="text-decoration-none text-light-gray mb-3 d-flex align-items-center">
                        All rights reserved by <span class="text-theme ms-2">Redishketch</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</template>

<script>

export default {
    data() {
        return {
            app_name: window.core.APP_NAME,
        }
    },
    mounted() {  },
    methods: {  },
}

</script>
