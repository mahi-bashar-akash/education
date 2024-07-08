<template>

    <div class="cursor-content">

        <!-- hero content -->
        <section class="w-100 hero-content img-fluid object-fit-cover figure-img d-flex align-items-center justify-content-center" :style="{ background: 'url(' + imageUrl + ')' }">
            <div class="svg-content">
                <svg id="svg" viewBox="0, 0, 400,27.708333333333336" fill="#fff">
                    <g id="svgg">
                        <path id="path0"
                              d="M0.000 13.854 L 0.000 27.708 200.000 27.708 L 400.000 27.708 400.000 14.216 L 400.000 0.725 395.573 1.822 C 322.012 20.064,241.242 29.243,178.709 26.467 C 123.876 24.033,57.451 14.315,4.123 0.926 C 2.094 0.417,0.336 0.000,0.217 0.000 C 0.069 0.000,0.000 4.399,0.000 13.854"></path>
                    </g>
                </svg>
            </div>
            <div class="position-relative w-100">
                <div class="container">
                    <div class="text-center">
                        <h1 class="fs-1 mb-3 text-white">
                            Take good experience from our courses
                        </h1>
                        <div class="fs-5 mb-3 text-white">
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
        <section class="w-100 py-5 d-flex justify-content-center align-items-center flex-column">
            <h1 class="fs-1"> Popular Categories</h1>
            <div class="col-md-4 text-center line-height-2">
                Join 2,500+ companies and 80% of the Fortune 1000 who use our courses to upskill their teams.
            </div>
            <div class="container text-center">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mt-4">
                    <div class="p-3">
                        <div class="border py-5 text-center bg-light-gray-hover">
                            <i class="bi bi-buildings fs-1"></i>
                            <br>
                            <div>Business Administration</div>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="border py-5 text-center bg-light-gray-hover">
                            <i class="bi bi-laptop fs-1"></i>
                            <br>
                            <div>Computer Application</div>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="border py-5 text-center bg-light-gray-hover">
                            <i class="bi bi-chat-left-text fs-1"></i>
                            <br>
                            <div>Digital Marketing</div>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="border py-5 text-center bg-light-gray-hover">
                            <i class="bi bi-translate fs-1"></i>
                            <br>
                            <div>Language</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- course -->
        <section class="w-100 py-5">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <h1 class="fs-1"> Explore Featured Courses </h1>
                        <div class="line-height-2"> You'll find something to spark your curiosity and enhance </div>
                    </div>
                    <div class="col-lg-6 mb-4 text-end">
                        <a href="javascript:void(0)" class="btn btn-theme rounded-1">
                            View more
                        </a>
                    </div>
                </div>
                <div class="courses-carousel owl-carousel owl-theme">
                    <div class="p-2" v-for="each in courseDataList">
                        <router-link :to="{name: 'singleCourse'}" href="javascript:void(0)"
                                     class="text-decoration-none image-effect">
                            <div class="card border-0 shadow-sm p-0 overflow-hidden">
                                <div class="card-body p-0">
                                    <div class="position-relative">
                                        <div class="overflow-hidden">
                                            <img :src="each.filePath" class="img-fluid object-fit-cover"
                                                 alt="course">
                                        </div>
                                        <div class="position-absolute top-0 start-0 p-3">
                                            <div class="rounded-3 bg-warning text-dark fw-medium py-1 px-3">
                                                {{ each.price }} TK
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <small class="d-block">
                                            By {{ each.author }}
                                        </small>
                                        <div class="fs-4 mt-2-hover">
                                            <div class="truncate-to-2-line">
                                                {{ each.name }}
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-star-fill text-warning me-1"></i>
                                                <i class="bi bi-star-fill text-warning me-1"></i>
                                                <i class="bi bi-star-fill text-warning me-1"></i>
                                                <i class="bi bi-star-fill text-warning me-1"></i>
                                                <i class="bi bi-star-fill text-warning me-1"></i>
                                                <span> ( 4.5 ) </span>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="text-opacity-50 text-secondary">
                                                    <i class="bi bi-clock me-2"></i>
                                                    {{ each.duration }}
                                                </div>
                                                <div class="text-opacity-50 text-secondary">
                                                    <i class="bi bi-person me-2"></i>
                                                    {{ each.enrollCount }} Students
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </router-link>
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
                            <h1 class="fs-1 mt-3">
                                Software development fundamentals for new learner
                            </h1>
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

        <!-- event -->
        <section class="w-100 py-5">
            <div class="container py-5">
                <h1 class="text-center fs-1">Upcoming Events</h1>
                <div class="px-4">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center line-height-2 mb-4"> You'll find something to spark your curiosity and enhance </div>
                    </div>
                    <div class="mb-4 row bg-light border align-items-center rounded-3 overflow-hidden scale-effect">
                        <div class="col-lg-6 p-0">
                            <img :src="`/images/classroom-bg/bg-classroom-1.jpg`" class="img-fluid object-fit-cover hpx-190 w-100" alt="bg-classroom-1.jpg">
                        </div>
                        <div class="col-lg-6 py-3 pb-lg-0">
                            <div class="d-flex justify-content-start align-items-center flex-wrap small fw-bold mb-3">
                                <div class="px-3">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    December 26, 2023
                                </div>
                                <div class="px-3">
                                    <i class="bi bi-clock me-1"></i>
                                    10:30 am
                                </div>
                                <div class="px-3">
                                    <i class="bi bi-geo-alt me-1"></i>
                                    Yarra Park, Melbourne
                                </div>
                            </div>
                            <h5 class="fs-5 fw-semibold px-3">EduFest 2023: Igniting Minds, Transforming Lives</h5>
                            <div class="px-3 mt-3">
                                <router-link :to="{name: 'singleEvent'}" class="btn btn-theme wpx-150 rounded-1 border-0">
                                    Get Ticket
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 row bg-light border align-items-center rounded-3 overflow-hidden scale-effect">
                        <div class="col-lg-6 p-0 order-0 order-lg-1">
                            <img :src="`/images/classroom-bg/bg-classroom-2.jpg`" class="img-fluid object-fit-cover hpx-190 w-100" alt="bg-classroom-2.jpg">
                        </div>
                        <div class="col-lg-6 order-1 order-lg-0 py-3 pb-lg-0">
                            <div class="d-flex justify-content-start align-items-center flex-wrap small fw-bold mb-3">
                                <div class="px-3">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    December 26, 2023
                                </div>
                                <div class="px-3">
                                    <i class="bi bi-clock me-1"></i>
                                    10:30 am
                                </div>
                                <div class="px-3">
                                    <i class="bi bi-geo-alt me-1"></i>
                                    Yarra Park, Melbourne
                                </div>
                            </div>
                            <h5 class="fs-5 fw-semibold px-3">EduFest 2023: Igniting Minds, Transforming Lives</h5>
                            <div class="px-3 mt-3">
                                <router-link :to="{name: 'singleEvent'}" class="btn btn-theme wpx-150 rounded-1 border-0">
                                    Get Ticket
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 row bg-light border align-items-center rounded-3 overflow-hidden scale-effect">
                        <div class="col-lg-6 p-0">
                            <img :src="`/images/classroom-bg/bg-classroom-3.jpg`" class="img-fluid object-fit-cover hpx-190 w-100" alt="bg-classroom-3.jpg">
                        </div>
                        <div class="col-lg-6 py-3 pb-lg-0">
                            <div class="d-flex justify-content-start align-items-center flex-wrap small fw-bold mb-3">
                                <div class="px-3">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    December 26, 2023
                                </div>
                                <div class="px-3">
                                    <i class="bi bi-clock me-1"></i>
                                    10:30 am
                                </div>
                                <div class="px-3">
                                    <i class="bi bi-geo-alt me-1"></i>
                                    Yarra Park, Melbourne
                                </div>
                            </div>
                            <h5 class="fs-5 fw-semibold px-3">EduFest 2023: Igniting Minds, Transforming Lives</h5>
                            <div class="px-3 mt-3">
                                <router-link :to="{name: 'singleEvent'}" class="btn btn-theme wpx-150 rounded-1 border-0">
                                    Get Ticket
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 row bg-light border align-items-center rounded-3 overflow-hidden scale-effect">
                        <div class="col-lg-6 p-0 order-0 order-lg-1">
                            <img :src="`/images/classroom-bg/bg-classroom-4.jpg`" class="img-fluid object-fit-cover hpx-190 w-100" alt="bg-classroom-4.jpg">
                        </div>
                        <div class="col-lg-6 order-1 order-lg-0 py-3 pb-lg-0">
                            <div class="d-flex justify-content-start align-items-center flex-wrap small fw-bold mb-3">
                                <div class="px-3">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    December 26, 2023
                                </div>
                                <div class="px-3">
                                    <i class="bi bi-clock me-1"></i>
                                    10:30 am
                                </div>
                                <div class="px-3">
                                    <i class="bi bi-geo-alt me-1"></i>
                                    Yarra Park, Melbourne
                                </div>
                            </div>
                            <h5 class="fs-5 fw-semibold px-3">EduFest 2023: Igniting Minds, Transforming Lives</h5>
                            <div class="px-3 mt-3">
                                <router-link :to="{name: 'singleEvent'}" class="btn btn-theme wpx-150 rounded-1 border-0">
                                    Get Ticket
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 row bg-light border align-items-center rounded-3 overflow-hidden scale-effect">
                        <div class="col-lg-6 p-0">
                            <img :src="`/images/classroom-bg/bg-classroom-5.jpg`" class="img-fluid object-fit-cover hpx-190 w-100" alt="bg-classroom-5.jpg">
                        </div>
                        <div class="col-lg-6 py-3 pb-lg-0">
                            <div class="d-flex justify-content-start align-items-center flex-wrap small fw-bold mb-3">
                                <div class="px-3">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    December 26, 2023
                                </div>
                                <div class="px-3">
                                    <i class="bi bi-clock me-1"></i>
                                    10:30 am
                                </div>
                                <div class="px-3">
                                    <i class="bi bi-geo-alt me-1"></i>
                                    Yarra Park, Melbourne
                                </div>
                            </div>
                            <h5 class="fs-5 fw-semibold px-3">EduFest 2023: Igniting Minds, Transforming Lives</h5>
                            <div class="px-3 mt-3">
                                <router-link :to="{name: 'singleEvent'}" class="btn btn-theme wpx-150 rounded-1 border-0">
                                    Get Ticket
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    <router-link :to="{name: 'events'}" class="btn btn-theme rounded-1 wpx-200">
                        View more
                    </router-link>
                </div>
            </div>
        </section>

        <!-- testimonial -->
        <section class="w-100 py-5 bg-white">
            <div class="container">
                <h1 class="text-center fs-1">Our Testimonial</h1>
                <div class="row  justify-content-center">
                    <h5 class="fs-5 col-md-6 text-center line-height-2 mb-4"> tutors with students feed </h5>
                </div>
                <div class="testimonial-carousel owl-carousel owl-theme">
                    <div class="item d-flex justify-content-center">
                        <div class="col-lg-7">
                            <div class="p-3 rounded-3">
                                <div class="bg-light p-3 text-center">
                                    <q>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor dolorem eligendi
                                        excepturi explicabo facere fugiat harum id impedit incidunt iste iusto laborum
                                        minima
                                        modi, natus nobis omnis quaerat quas repellat reprehenderit, sapiente sunt
                                        tempora
                                        tempore voluptatibus? Animi assumenda commodi dolore fugiat, ipsum nostrum,
                                        provident
                                        quo sit ullam ut voluptatum!
                                    </q>
                                </div>
                                <div class="my-3 d-flex justify-content-center">
                                    <img :src="`/images/clients/face-1.png`"
                                         class="wpx-65 hpx-65 rounded-circle object-fit-cover" alt="testimonial avatar">
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
                                <div class="bg-light p-3 text-center">
                                    <q>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor dolorem eligendi
                                        excepturi explicabo facere fugiat harum id impedit incidunt iste iusto laborum
                                        minima
                                        modi, natus nobis omnis quaerat quas repellat reprehenderit, sapiente sunt
                                        tempora
                                        tempore voluptatibus? Animi assumenda commodi dolore fugiat, ipsum nostrum,
                                        provident
                                        quo sit ullam ut voluptatum!
                                    </q>
                                </div>
                                <div class="my-3 d-flex justify-content-center">
                                    <img :src="`/images/clients/face-2.png`"
                                         class="wpx-65 hpx-65 rounded-circle object-fit-cover" alt="testimonial avatar">
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
                                <div class="bg-light p-3 text-center">
                                    <q>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor dolorem eligendi
                                        excepturi explicabo facere fugiat harum id impedit incidunt iste iusto laborum
                                        minima
                                        modi, natus nobis omnis quaerat quas repellat reprehenderit, sapiente sunt
                                        tempora
                                        tempore voluptatibus? Animi assumenda commodi dolore fugiat, ipsum nostrum,
                                        provident
                                        quo sit ullam ut voluptatum!
                                    </q>
                                </div>
                                <div class="my-3 d-flex justify-content-center">
                                    <img :src="`/images/clients/face-3.png`"
                                         class="wpx-65 hpx-65 rounded-circle object-fit-cover" alt="testimonial avatar">
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
                                <div class="bg-light p-3 text-center">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor dolorem eligendi
                                    excepturi explicabo facere fugiat harum id impedit incidunt iste iusto laborum
                                    minima
                                    modi, natus nobis omnis quaerat quas repellat reprehenderit, sapiente sunt tempora
                                    tempore voluptatibus? Animi assumenda commodi dolore fugiat, ipsum nostrum,
                                    provident
                                    quo sit ullam ut voluptatum!
                                </div>
                                <div class="mb-2 d-flex justify-content-center">
                                    <img :src="`/images/clients/face-4.png`"
                                         class="wpx-65 hpx-65 rounded-circle object-fit-cover" alt="testimonial avatar">
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
                    <h2 class="fs-2 col-lg-5 mb-4">
                        Lets build skills with our professional 2500+ courses
                    </h2>
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
                    <h1 class="fs-1 text-center">
                        Our Students Feedback
                    </h1>
                    <div class="row  justify-content-center">
                        <h5 class="fs-5 col-md-6 text-center line-height-2 mb-4">
                            You'll find something to spark your curiosity and enhance feedback
                        </h5>
                    </div>
                    <div class="blogs-carousel owl-carousel owl-theme">
                        <div class="item p-3 image-effect" v-for="each in blogDataList">
                            <div class="border p-0">
                                <div class="overflow-hidden">
                                    <img :src="each.filePath"
                                         class="img-fluid object-fit-cover hpx-250 w-100" alt="blog 1">
                                </div>
                                <div class="pt-3 px-3">
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <div class="badge bg-warning text-dark fw-medium px-3 py-2 rounded-pill">
                                            {{each.author}}
                                        </div>
                                        <div class="text-secondary text-opacity-75">
                                            {{each.date}}
                                        </div>
                                    </div>
                                </div>
                                <h4 class="fs-4 fw-medium p-3">
                                    <div class="truncate-to-2-line">
                                        {{each.title}}
                                    </div>
                                </h4>
                                <div class="pb-3 px-3">
                                    <router-link :to="{name: 'singleBlog'}" class="text-decoration-none">
                                        <span class="text-secondary">
                                            Read more
                                        </span>
                                        <i class="bi bi-arrow-right ms-2 text-dark"></i>
                                    </router-link>
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
            blogDataList: [
                {
                    id: '1',
                    filePath: '/images/blogs/blog-1.jpg',
                    title: 'Secret Tips & Tricks to Master Electricity',
                    author: 'Admin',
                    date: '01, January, 2025'
                },
                {
                    id: '2',
                    filePath: '/images/blogs/blog-2.jpg',
                    title: 'Secret Tips & Tricks to Master Electricity',
                    author: 'Admin',
                    date: '01, february, 2026'
                },
                {
                    id: '3',
                    filePath: '/images/blogs/blog-3.jpg',
                    title: 'Secret Tips & Tricks to Master Electricity',
                    author: 'Admin',
                    date: '01, march, 2027'
                },
                {
                    id: '4',
                    filePath: '/images/blogs/blog-4.jpg',
                    title: 'Secret Tips & Tricks to Master Electricity',
                    author: 'Admin',
                    date: '01, april, 2028'
                },
                {
                    id: '5',
                    filePath: '/images/blogs/blog-5.jpg',
                    title: 'Secret Tips & Tricks to Master Electricity',
                    author: 'Admin',
                    date: '01, may, 2029'
                },
                {
                    id: '6',
                    filePath: '/images/blogs/blog-6.jpg',
                    title: 'Secret Tips & Tricks to Master Electricity',
                    author: 'Admin',
                    date: '01, may, 2030'
                },
            ],
            courseDataList: [
                {
                    id: '1',
                    filePath: '/images/course/courses-1.jpg',
                    author: 'John Smith',
                    name: '2025 Complete Javascript Bootcamp From Zero to Hero in Javascript',
                    price: '100',
                    duration: '1 year 6 month',
                    enrollCount: '120'
                },
                {
                    id: '2',
                    filePath: '/images/course/courses-2.jpg',
                    author: 'Emily Johnson',
                    name: '2025 Complete responsive website design Bootcamp From Zero to Hero in responsive website design',
                    price: '200',
                    duration: '1 year 1 month',
                    enrollCount: '450'
                },
                {
                    id: '3',
                    filePath: '/images/course/courses-3.jpg',
                    author: 'Michael Williams',
                    name: '2025 Complete VueJs framework Bootcamp From Zero to Hero in VueJs framework',
                    price: '450',
                    duration: '8 month',
                    enrollCount: '670'
                },
                {
                    id: '4',
                    filePath: '/images/course/courses-4.jpg',
                    author: 'Sophia Jones',
                    name: '2025 Complete AngularJs framework Bootcamp From Zero to Hero in AngularJs',
                    price: '50',
                    duration: '4 month',
                    enrollCount: '90'
                },
                {
                    id: '5',
                    filePath: '/images/course/courses-5.jpg',
                    author: 'William Brown',
                    name: '2025 Complete Laravel Framework Bootcamp From Zero to Hero in Laravel Framework',
                    price: '120',
                    duration: '2 month',
                    enrollCount: '740'
                },
                {
                    id: '6',
                    filePath: '/images/course/courses-6.jpg',
                    author: 'Emma Miller',
                    name: '2025 Complete Vanilla Javascript Bootcamp From Zero to Hero in Vanilla Javascript',
                    price: '140',
                    duration: '7 month',
                    enrollCount: '340'
                },
            ],
        }

    },

    mounted() {
        this.testimonial();
        this.blogs();
        this.banners();
        this.courses();
    },

    methods: {

        banners() {
            $('.banner-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
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
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
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
        },

        courses() {
            $('.courses-carousel').owlCarousel({
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
