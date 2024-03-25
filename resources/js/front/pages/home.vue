<template>

    <div class="cursor-content">

        <!-- hero content -->
        <section class="w-100 hero-content d-flex align-items-center justify-content-center" :style="{ background: 'url(' + imageUrl + ')' }">
            <div class="svg-content">
                <svg id="svg" viewBox="0, 0, 400,27.708333333333336" fill="#fff">
                    <g id="svgg">
                        <path id="path0" d="M0.000 13.854 L 0.000 27.708 200.000 27.708 L 400.000 27.708 400.000 14.216 L 400.000 0.725 395.573 1.822 C 322.012 20.064,241.242 29.243,178.709 26.467 C 123.876 24.033,57.451 14.315,4.123 0.926 C 2.094 0.417,0.336 0.000,0.217 0.000 C 0.069 0.000,0.000 4.399,0.000 13.854"></path>
                    </g>
                </svg>
            </div>
            <div class="position-relative w-100">
                <div class="container">
                    <div class="text-center">
                        <div class="fs-1 mb-3 text-white">
                            Take good experience from our courses
                        </div>
                        <div class="fs-3 mb-3 text-white">
                            Apply as your dream
                        </div>
                        <a href="javascript:void(0)" class="btn btn-theme px-4 py-2 rounded-1 border-0">
                            Join for free now
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- category content -->
        <section class="w-100 py-5 d-flex justify-content-center align-items-center flex-column text-light-gray">
            <div class="fs-1 mb-3"> Popular Categories </div>
            <div class="fs-5 col-md-4 text-center line-height-2">
                Join 2,500+ companies and 80% of the Fortune 1000 who use our courses to upskill their teams.
            </div>
            <div class="container text-center">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mt-4">
                    <div class="p-3">
                        <div class="border py-5 text-center bg-light-gray-hover">
                            <i class="bi bi-buildings fs-1"></i>
                            <br>
                            <div class="fs-5">Business Administration</div>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="border py-5 text-center bg-light-gray-hover">
                            <i class="bi bi-laptop fs-1"></i>
                            <br>
                            <div class="fs-5">Computer Application</div>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="border py-5 text-center bg-light-gray-hover">
                            <i class="bi bi-chat-left-text fs-1"></i>
                            <br>
                            <div class="fs-5">Digital Marketing</div>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="border py-5 text-center bg-light-gray-hover">
                            <i class="bi bi-translate fs-1"></i>
                            <br>
                            <div class="fs-5">Language</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- certificate -->
        <section class="w-100 py-5">
            <div class="container">
                <div class="border p-5 w-100" :style="{ background: 'url(' + certificateWallpaper + ')' }">
                    <div class="row">
                        <div class="col-lg-5 py-lg-5">
                            <div class="bg-warning py-2 px-4 text-dark rounded-1 d-inline-block fw-medium fs-6">
                                Professional Certificate
                            </div>
                            <div class="fs-1 mt-3">
                                Software development fundamentals for new learner
                            </div>
                            <div class="mt-3">
                                <a href="javascript:void(0)" type="button" class="btn btn-warning px-4 rounded-pill">
                                    Get Started
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- testimonial -->
        <section class="w-100 py-5 bg-white">
            <div class="container">
                <div class="testimonial-carousel owl-carousel owl-theme text-light-gray">
                    <div class="item d-flex justify-content-center">
                        <div class="col-lg-7">
                            <div class="p-3 rounded-3">
                                <div class="bg-light p-3 text-light-gray text-center">
                                    <q>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor dolorem eligendi
                                        excepturi explicabo facere fugiat harum id impedit incidunt iste iusto laborum minima
                                        modi, natus nobis omnis quaerat quas repellat reprehenderit, sapiente sunt tempora
                                        tempore voluptatibus? Animi assumenda commodi dolore fugiat, ipsum nostrum, provident
                                        quo sit ullam ut voluptatum!
                                    </q>
                                </div>
                                <div class="my-3 d-flex justify-content-center">
                                    <img :src="`/images/clients/face-1.png`" class="wpx-65 hpx-65 rounded-circle object-fit-cover" alt="testimonial avatar">
                                </div>
                                <div class="fw-bold text-center">
                                    John Smith
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item d-flex justify-content-center">
                        <div class="col-lg-7">
                            <div class="p-3 rounded-3">
                                <div class="bg-light p-3 text-light-gray text-center">
                                    <q>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor dolorem eligendi
                                        excepturi explicabo facere fugiat harum id impedit incidunt iste iusto laborum minima
                                        modi, natus nobis omnis quaerat quas repellat reprehenderit, sapiente sunt tempora
                                        tempore voluptatibus? Animi assumenda commodi dolore fugiat, ipsum nostrum, provident
                                        quo sit ullam ut voluptatum!
                                    </q>
                                </div>
                                <div class="my-3 d-flex justify-content-center">
                                    <img :src="`/images/clients/face-2.png`" class="wpx-65 hpx-65 rounded-circle object-fit-cover" alt="testimonial avatar">
                                </div>
                                <div class="fw-bold text-center">
                                    John Smith
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item d-flex justify-content-center">
                        <div class="col-lg-7">
                            <div class="p-3 rounded-3">
                                <div class="bg-light p-3 text-light-gray text-center">
                                    <q>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor dolorem eligendi
                                        excepturi explicabo facere fugiat harum id impedit incidunt iste iusto laborum minima
                                        modi, natus nobis omnis quaerat quas repellat reprehenderit, sapiente sunt tempora
                                        tempore voluptatibus? Animi assumenda commodi dolore fugiat, ipsum nostrum, provident
                                        quo sit ullam ut voluptatum!
                                    </q>
                                </div>
                                <div class="my-3 d-flex justify-content-center">
                                    <img :src="`/images/clients/face-3.png`" class="wpx-65 hpx-65 rounded-circle object-fit-cover" alt="testimonial avatar">
                                </div>
                                <div class="fw-bold text-center">
                                    John Smith
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item d-flex justify-content-center">
                        <div class="col-lg-7 p-3">
                            <div class="p-3 rounded-3">
                                <div class="bg-light p-3 text-light-gray text-center">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor dolorem eligendi
                                    excepturi explicabo facere fugiat harum id impedit incidunt iste iusto laborum minima
                                    modi, natus nobis omnis quaerat quas repellat reprehenderit, sapiente sunt tempora
                                    tempore voluptatibus? Animi assumenda commodi dolore fugiat, ipsum nostrum, provident
                                    quo sit ullam ut voluptatum!
                                </div>
                                <div class="mb-2 d-flex justify-content-center">
                                    <img :src="`/images/clients/face-4.png`" class="wpx-65 hpx-65 rounded-circle object-fit-cover" alt="testimonial avatar">
                                </div>
                                <div class="fw-bold text-center">
                                    John Smith
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- get explore -->
        <section class="w-100 py-5 explore-content" :style="{ background: 'url(' + buildSkillsWallpaper + ')' }">
            <div class="container text-center text-white">
                <div class="d-flex justify-content-center align-items-center flex-column py-5 position-relative">
                    <div class="bg-theme mb-3 px-3 py-2 rounded-2">
                        Get Instant Access to the Free
                    </div>
                    <div class="fs-2 col-lg-5 mb-4">
                        Lets build skills with our professional 2500+ courses
                    </div>
                    <button type="button" class="btn btn-warning rounded-pill px-4">
                        Get Explore
                    </button>
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
                        <div class="item p-3">
                            <div class="border p-0">
                                <img :src="`/images/blogs/blog-1.jpg`" class="img-fluid object-fit-cover hpx-250 w-100" alt="brand 1">
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
                        <div class="item p-3">
                            <div class="border p-0">
                                <img :src="`/images/blogs/blog-2.jpg`" class="img-fluid object-fit-cover hpx-250 w-100" alt="brand 2">
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
                        <div class="item p-3">
                            <div class="border p-0">
                                <img :src="`/images/blogs/blog-3.jpg`" class="img-fluid object-fit-cover hpx-250 w-100" alt="brand 3">
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
                        <div class="item p-3">
                            <div class="border p-0">
                                <img :src="`/images/blogs/blog-4.jpg`" class="img-fluid object-fit-cover hpx-250 w-100" alt="brand 3">
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
                        <div class="item p-3">
                            <div class="border p-0">
                                <img :src="`/images/blogs/blog-5.jpg`" class="img-fluid object-fit-cover hpx-250 w-100" alt="brand 3">
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
                        <div class="item p-3">
                            <div class="border p-0">
                                <img :src="`/images/blogs/blog-6.jpg`" class="img-fluid object-fit-cover hpx-250 w-100" alt="brand 3">
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

    </div>

</template>

<script>

export default {

    data() {

        return {
            imageUrl: '/images/hero-background.jpg',
            certificateWallpaper: '/images/certificate-wallpaper.jpeg',
            buildSkillsWallpaper: '/images/build-skills-background.jpg',
        }

    },

    mounted() {
        this.testimonial();
        this.blogs();
        this.banners();
    },

    methods: {

        banners() {
            $('.banner-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            })
        },

        testimonial() {
            $('.testimonial-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
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
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                }
            })
        }

    }

}

</script>
