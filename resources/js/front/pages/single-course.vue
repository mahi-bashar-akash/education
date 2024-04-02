<template>

    <div class="cursor-content margin-top-105">

        <section class="w-100 img-fluid object-fit-cover py-5 background-before" :style="{ background: 'url(' + imageUrl + ')' }">
            <div class="container position-relative">
                <div class="col-lg-5 py-5">
                    <div class="d-flex align-items-center justify-content-start">
                        <i class="bi bi-star-fill me-1 text-warning"></i>
                        <i class="bi bi-star-fill me-1 text-warning"></i>
                        <i class="bi bi-star-fill me-1 text-warning"></i>
                        <i class="bi bi-star-fill me-1 text-warning"></i>
                        <i class="bi bi-star-fill me-1 text-warning"></i>
                        <span class="text-white"> ( 4 . 5 ) </span>
                    </div>
                    <div class="fs-2 text-white mt-2">
                        2021 Complete Python Bootcamp From Zero to Hero in Python
                    </div>
                    <div class="d-block text-white mt-3">
                        Learn Python like a Professional Start from the basics and go all the way to creating your own
                        applications and games
                    </div>
                </div>
            </div>
        </section>

        <section class="w-100 py-5">
            <div class="container">
                <div class="col-lg-5 py-5">
                    <div class="fs-2">
                        Course Overview
                    </div>
                    <div class="mt-3 text-dark text-opacity-75">
                        World-class training and development programs developed by top teachers. Build skills with
                        courses, certificates, and degrees online from world-class universities and companies.
                        from the National Research University Higher School of Economics (HSE University) is the
                        first fully online.
                    </div>
                </div>
            </div>
        </section>

        <section class="w-100 py-5">
            <div class="container">
                <div class="col-lg-5">
                    <div class="fs-2 mb-3">
                        What you will learn
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-check me-2"></i>
                        Become a UX designer.
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-check me-2"></i>
                    Become a UX designer.
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-check me-2"></i>
                    You will be able to add UX designer to your CV
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-check me-2"></i>
                    You will be able to add UX designer to your CV
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-check me-2"></i>
                    Build & test a full website design.
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-check me-2"></i>
                    Build & test a full website design.
                    </div>
                </div>
            </div>
        </section>

    </div>

</template>

<script>

export default {
    data() {
        return {
            imageUrl: '/images/banner-bg.jpg',
        }
    },
    mounted() {
    },
    methods: {}
}

</script>
