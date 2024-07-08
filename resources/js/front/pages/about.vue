<template>

    <div class="cursor-content margin-top-105">

        <section class="container">
            <div class="py-5">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">

                    <!-- Count enrolled learners -->
                    <div class="p-3 mt-0 mt-xl-5 order-0 order-md-1 order-xl-0">
                        <div class="py-5 border text-center bg-light-gray-hover">
                            <i class="bi bi-backpack4 fs-1"></i>
                            <div class="fs-2 fw-medium">
                                1790
                            </div>
                            <div class="mt-1">
                                Enrolled Learners
                            </div>
                        </div>
                    </div>

                    <!-- Count best awards -->
                    <div class="p-3 order-1 order-md-0 order-xl-1">
                        <div class="py-5 border text-center bg-theme-hover">
                            <i class="bi bi-award fs-1"></i>
                            <div class="fs-2 fw-medium">
                                16+
                            </div>
                            <div class="mt-1">
                                Best Awards
                            </div>
                        </div>
                    </div>

                    <!-- Count video tutorials -->
                    <div class="p-3 mt-0 mt-xl-5 order-2 order-xl-2">
                        <div class="py-5 border text-center bg-light-gray-hover">
                            <i class="bi bi-laptop fs-1"></i>
                            <div class="fs-2 fw-medium">
                                33k+
                            </div>
                            <div class="mt-1">
                                Video Tutorials
                            </div>
                        </div>
                    </div>

                    <!-- Count boost career -->
                    <div class="p-3 order-3 order-xl-3">
                        <div class="py-5 border text-center bg-theme-hover">
                            <i class="bi bi-graph-up-arrow fs-1"></i>
                            <div class="fs-2 fw-medium">
                                321
                            </div>
                            <div class="mt-1">
                                Boost Career
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- We connect people through knowledge -->
        <section class="w-100 py-5">
            <div class="container">
                <div class="bg-secondary-subtle">
                    <div class="row">
                        <div class="col-lg-6 p-5">
                            <div class="mb-3 fs-1">
                                We connect people through knowledge.
                            </div>
                            <div class="mb-3 text-light-gray line-height-2">
                                We help organizations of all types and sizes prepare for the path ahead — wherever it
                                leads. Our curated collection of business and technical courses.
                            </div>
                            <div class="text-light-gray">
                                <div class="line-height-2 d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-warning fs-4"></i>
                                    <span class="ms-2"> Get access to 4,000+ of our top courses </span>
                                </div>
                                <div class="line-height-2 d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-warning fs-4"></i>
                                    <span class="ms-2"> We help organizations of all types and sizes prepare </span>
                                </div>
                                <div class="line-height-2 d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-warning fs-4"></i>
                                    <span class="ms-2"> Find the right instructor for you </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 p-5 d-flex justify-content-center">
                            <img :src="`/images/about.jpg`" class="img-fluid object-fit-cover" alt="about">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Trusted by companies of all sizes -->
        <section class="w-100 py-5">
            <div class="container">
                <div class="py-5">
                    <div class="mb-3 fs-1 text-center">
                        Trusted by companies of all sizes
                    </div>
                    <div class="brand-carousel owl-carousel owl-theme text-light-gray">
                        <div class="item image-effect">
                            <div class="p-5">
                                <img :src="`/images/brands/brand-1.png`" class="img-fluid" alt="brand">
                            </div>
                        </div>
                        <div class="item image-effect">
                            <div class="p-5">
                                <img :src="`/images/brands/brand-2.png`" class="img-fluid" alt="brand">
                            </div>
                        </div>
                        <div class="item image-effect">
                            <div class="p-5">
                                <img :src="`/images/brands/brand-3.png`" class="img-fluid" alt="brand">
                            </div>
                        </div>
                        <div class="item image-effect">
                            <div class="p-5">
                                <img :src="`/images/brands/brand-4.png`" class="img-fluid" alt="brand">
                            </div>
                        </div>
                        <div class="item image-effect">
                            <div class="p-5">
                                <img :src="`/images/brands/brand-5.png`" class="img-fluid" alt="brand">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Latest blogs & news -->
        <section class="w-100 py-5">
            <div class="container">
                <div class="py-5">
                    <div class="mb-3 fs-1 text-center">
                        Latest blogs & news
                    </div>
                    <div class="blogs-carousel owl-carousel owl-theme">
                        <div class="item p-3 image-effect">
                            <div class="card rounded-3 overflow-hidden border p-0">
                                <div class="overflow-hidden">
                                    <img :src="`/images/blogs/blog-1.jpg`"
                                         class="img-fluid object-fit-cover hpx-250 w-100" alt="brand 1">
                                </div>
                                <div class="pt-3 px-3">
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <div class="badge bg-warning text-dark fw-medium px-3 py-2 rounded-pill">
                                            Admin
                                        </div>
                                        <div class="text-secondary text-opacity-75">
                                            17, march, 2025
                                        </div>
                                    </div>
                                </div>
                                <div class="fs-3 fw-medium truncate-to-2-line p-3">
                                    Secret Tips & Tricks to Master Electricity
                                </div>
                                <div class="pb-3 px-3">
                                    <a href="javascript:void(0)" class="text-decoration-none">
                                        <span class="text-secondary">
                                            Read more
                                        </span>
                                        <i class="bi bi-arrow-right ms-2 text-dark"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item p-3 image-effect">
                            <div class="card rounded-3 overflow-hidden border p-0">
                                <div class="overflow-hidden">
                                    <img :src="`/images/blogs/blog-2.jpg`"
                                         class="img-fluid object-fit-cover hpx-250 w-100" alt="brand 2">
                                </div>
                                <div class="pt-3 px-3">
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <div class="badge bg-warning text-dark fw-medium px-3 py-2 rounded-pill">
                                            Admin
                                        </div>
                                        <div class="text-secondary text-opacity-75">
                                            17, march, 2025
                                        </div>
                                    </div>
                                </div>
                                <div class="fs-3 fw-medium truncate-to-2-line p-3">
                                    Secret Tips & Tricks to Master Electricity
                                </div>
                                <div class="pb-3 px-3">
                                    <a href="javascript:void(0)" class="text-decoration-none">
                                        <span class="text-secondary">
                                            Read more
                                        </span>
                                        <i class="bi bi-arrow-right ms-2 text-dark"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item p-3 image-effect">
                            <div class="card rounded-3 overflow-hidden border p-0">
                                <div class="overflow-hidden">
                                    <img :src="`/images/blogs/blog-3.jpg`"
                                         class="img-fluid object-fit-cover hpx-250 w-100" alt="brand 2">
                                </div>
                                <div class="pt-3 px-3">
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <div class="badge bg-warning text-dark fw-medium px-3 py-2 rounded-pill">
                                            Admin
                                        </div>
                                        <div class="text-secondary text-opacity-75">
                                            17, march, 2025
                                        </div>
                                    </div>
                                </div>
                                <div class="fs-3 fw-medium truncate-to-2-line p-3">
                                    Secret Tips & Tricks to Master Electricity
                                </div>
                                <div class="pb-3 px-3">
                                    <a href="javascript:void(0)" class="text-decoration-none">
                                        <span class="text-secondary">
                                            Read more
                                        </span>
                                        <i class="bi bi-arrow-right ms-2 text-dark"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item p-3 image-effect">
                            <div class="card rounded-3 overflow-hidden border p-0">
                                <div class="overflow-hidden">
                                    <img :src="`/images/blogs/blog-4.jpg`"
                                         class="img-fluid object-fit-cover hpx-250 w-100" alt="brand 2">
                                </div>
                                <div class="pt-3 px-3">
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <div class="badge bg-warning text-dark fw-medium px-3 py-2 rounded-pill">
                                            Admin
                                        </div>
                                        <div class="text-secondary text-opacity-75">
                                            17, march, 2025
                                        </div>
                                    </div>
                                </div>
                                <div class="fs-3 fw-medium truncate-to-2-line p-3">
                                    Secret Tips & Tricks to Master Electricity
                                </div>
                                <div class="pb-3 px-3">
                                    <a href="javascript:void(0)" class="text-decoration-none">
                                        <span class="text-secondary">
                                            Read more
                                        </span>
                                        <i class="bi bi-arrow-right ms-2 text-dark"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item p-3 image-effect">
                            <div class="card rounded-3 overflow-hidden border p-0">
                                <div class="overflow-hidden">
                                    <img :src="`/images/blogs/blog-5.jpg`"
                                         class="img-fluid object-fit-cover hpx-250 w-100" alt="brand 2">
                                </div>
                                <div class="pt-3 px-3">
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <div class="badge bg-warning text-dark fw-medium px-3 py-2 rounded-pill">
                                            Admin
                                        </div>
                                        <div class="text-secondary text-opacity-75">
                                            17, march, 2025
                                        </div>
                                    </div>
                                </div>
                                <div class="fs-3 fw-medium truncate-to-2-line p-3">
                                    Secret Tips & Tricks to Master Electricity
                                </div>
                                <div class="pb-3 px-3">
                                    <a href="javascript:void(0)" class="text-decoration-none">
                                        <span class="text-secondary">
                                            Read more
                                        </span>
                                        <i class="bi bi-arrow-right ms-2 text-dark"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item p-3 image-effect">
                            <div class="card rounded-3 overflow-hidden border p-0">
                                <div class="overflow-hidden">
                                    <img :src="`/images/blogs/blog-6.jpg`"
                                         class="img-fluid object-fit-cover hpx-250 w-100" alt="brand 2">
                                </div>
                                <div class="pt-3 px-3">
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <div class="badge bg-warning text-dark fw-medium px-3 py-2 rounded-pill">
                                            Admin
                                        </div>
                                        <div class="text-secondary text-opacity-75">
                                            17, march, 2025
                                        </div>
                                    </div>
                                </div>
                                <div class="fs-3 fw-medium truncate-to-2-line p-3">
                                    Secret Tips & Tricks to Master Electricity
                                </div>
                                <div class="pb-3 px-3">
                                    <a href="javascript:void(0)" class="text-decoration-none">
                                        <span class="text-secondary">
                                            Read more
                                        </span>
                                        <i class="bi bi-arrow-right ms-2 text-dark"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our team -->
        <section class="w-100 py-5">
            <div class="container">
                <div class="py-5">
                    <div class="mb-3 fs-1 text-center">
                        Our teams
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">

                        <div class="p-3" v-for="each in teamDataList">
                            <div class="border p-0 image-effect">
                                <div class="overflow-hidden">
                                    <img :src="each.filePath" class="w-100 hpx-310 object-fit-cover" alt="face 1">
                                </div>
                                <div class="fs-4 pt-2 text-center">
                                    {{ each.name }}
                                </div>
                                <div class="text-center text-light-gray pb-3">
                                    Instructor, Math
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- Frequently Asked Questions -->
        <section class="w-100 py-5">
            <div class="container">
                <div class="py-5">
                    <div class="mb-3 fs-1 text-center">
                        Frequently asked questions
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item mb-3 border overflow-hidden shadow-none rounded-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What are the benefits of an Education.io
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    An Education.io is short for Learning Management System. It is a software that
                                    allows you to automate, manage, and capture the learning, or training, with your
                                    organization. An LMS, or learning management system, combines a wide range of
                                    features to present.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 border overflow-hidden shadow-none rounded-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    What are the fundamentals of Education.io
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Learning Management System (LMS) advantages include the ability to capture
                                    compliance training, reduce the amount of time and effort to managing organizational
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 border overflow-hidden shadow-none rounded-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                    Why Education.io has best language management system
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Learning Management System Education.io advantages include the ability to capture
                                    compliance training, reduce the amount of time and effort to managing organizational
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 border overflow-hidden shadow-none rounded-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                    Why is collaborative language is so important
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    An LMS is short for Learning Management System. It is a software that allows you to
                                    automate, manage, and capture the learning, or training, with your organization. An
                                    LMS, or learning management system, combines a wide range of features to present.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 border shadow-none overflow-hidden rounded-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                    Organize the content of Education.io
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    An Education.io is short for Learning Management System. It is a software that
                                    allows you to automate, manage, and capture the learning, or training, with your
                                    organization. An Education.io, or learning management system, combines a wide range
                                    of features to present.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 border overflow-hidden shadow-none rounded-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    What is the reason you need an Education.io
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Learning Management System (LMS) advantages include the ability to capture
                                    compliance training, reduce the amount of time and effort to managing organizational
                                </div>
                            </div>
                        </div>
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
            teamDataList: [
                {id: '1', filePath: '/images/faces/team-1.jpg', name: 'Arnold Barnerd'},
                {id: '2', filePath: '/images/faces/team-2.jpg', name: 'Mike Fermalin'},
                {id: '3', filePath: '/images/faces/team-3.jpg', name: 'Harnold Min'},
                {id: '4', filePath: '/images/faces/team-4.jpg', name: 'Andrew Inon'},
                {id: '5', filePath: '/images/faces/team-5.jpg', name: 'kin Joan'},
                {id: '6', filePath: '/images/faces/team-6.jpg', name: 'Kinda Mona'},
                {id: '7', filePath: '/images/faces/team-7.jpg', name: 'Aronic Kenan'},
                {id: '8', filePath: '/images/faces/team-8.jpg', name: 'Mike Fermalin'},
            ]
        }
    },
    mounted() {
        this.brands();
        this.blogs();
    },
    methods: {
        brands() {
            $('.brand-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: true,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        },

        blogs() {
            $('.blogs-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: true,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            })
        }
    }
}

</script>
