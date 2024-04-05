<template>
    <div class="cursor-content margin-top-105">
        <section class="container">
            <div class="row py-3 align-items-start">
                <div class="col-lg-3 text-light-gray py-1 px-3">
                    <div class="bg-light shadow-sm rounded-3 p-3">
                        <form>

                            <div>
                                <div class="h5 mb-3 fw-bold">Type of courses</div>

                                <div class="mb-3">
                                    <label for="free" class="form-label d-block cursor-pointer text-light-gray-hover">
                                        <input id="free" type="checkbox" name="course" class="form-checkbox">
                                        Free ( 11 )
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <label for="paid" class="form-label d-block cursor-pointer text-light-gray-hover">
                                        <input id="paid" type="checkbox" name="course" class="form-checkbox">
                                        Paid ( 14 )
                                    </label>
                                </div>
                            </div>

                            <div>
                                <div class="h5 mb-3 fw-bold">Categories</div>

                                <div class="mb-3">
                                    <label for="technology"
                                           class="form-label d-block cursor-pointer text-light-gray-hover">
                                        <input id="technology" type="checkbox" name="category" class="form-checkbox">
                                        Technology ( 11 )
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <label for="business"
                                           class="form-label d-block cursor-pointer text-light-gray-hover">
                                        <input id="business" type="checkbox" name="category" class="form-checkbox">
                                        Business ( 07 )
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <label for="development"
                                           class="form-label d-block cursor-pointer text-light-gray-hover">
                                        <input id="development" type="checkbox" name="category" class="form-checkbox">
                                        Development ( 11 )
                                    </label>
                                </div>
                            </div>

                            <div>
                                <div class="h5 mb-3 fw-bold">Instructor</div>

                                <div class="mb-3">
                                    <label for="jimmy-jason"
                                           class="form-label d-block cursor-pointer text-light-gray-hover">
                                        <input id="jimmy-jason" type="checkbox" name="instructor" class="form-checkbox">
                                        Jimmy Jason ( 11 )
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <label for="harnold"
                                           class="form-label d-block cursor-pointer text-light-gray-hover">
                                        <input id="harnold" type="checkbox" name="instructor" class="form-checkbox">
                                        Harnold ( 07 )
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <label for="eric-madny"
                                           class="form-label d-block cursor-pointer text-light-gray-hover">
                                        <input id="eric-madny" type="checkbox" name="instructor" class="form-checkbox">
                                        Eric Madny ( 11 )
                                    </label>
                                </div>

                            </div>

                            <div>
                                <div class="h5 mb-3 fw-bold">Ratings</div>

                                <div class="mb-3">
                                    <label for="star-5" class="form-label d-flex align-items-center cursor-pointer">
                                        <input id="star-5" type="checkbox" name="rating" class="form-checkbox me-2">
                                        <span class="d-flex align-items-center">
                                        <i class="bi bi-star-fill text-warning me-1"></i>
                                        <i class="bi bi-star-fill text-warning me-1"></i>
                                        <i class="bi bi-star-fill text-warning me-1"></i>
                                        <i class="bi bi-star-fill text-warning me-1"></i>
                                        <i class="bi bi-star-fill text-warning me-1"></i>
                                    </span>
                                        <span>( 4.5 )</span>
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <label for="star-3" class="form-label d-flex align-items-center cursor-pointer">
                                        <input id="star-3" type="checkbox" name="rating" class="form-checkbox me-2">
                                        <span class="d-flex align-items-center">
                                        <i class="bi bi-star-fill text-warning me-1"></i>
                                        <i class="bi bi-star-fill text-warning me-1"></i>
                                        <i class="bi bi-star-fill text-warning me-1"></i>
                                        <i class="bi bi-star-fill text-secondary text-opacity-25 me-1"></i>
                                        <i class="bi bi-star-fill text-secondary text-opacity-25 me-1"></i>
                                    </span>
                                        <span>( 3.5 )</span>
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <label for="star-2" class="form-label d-flex align-items-center cursor-pointer">
                                        <input id="star-2" type="checkbox" name="rating" class="form-checkbox me-2">
                                        <span class="d-flex align-items-center">
                                        <i class="bi bi-star-fill text-warning me-1"></i>
                                        <i class="bi bi-star-fill text-warning me-1"></i>
                                        <i class="bi bi-star-fill text-secondary text-opacity-25 me-1"></i>
                                        <i class="bi bi-star-fill text-secondary text-opacity-25 me-1"></i>
                                        <i class="bi bi-star-fill text-secondary text-opacity-25 me-1"></i>
                                    </span>
                                        <span>( 2 )</span>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <div class="h5 mb-3 fw-bold">Level</div>

                                <div class="mb-3">
                                    <label for="beginner"
                                           class="form-label d-flex align-items-center cursor-pointer text-light-gray-hover">
                                        <input id="beginner" type="checkbox" name="level" class="form-checkbox me-2">
                                        Beginner
                                        <span class="ms-2">( 11 )</span>
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <label for="advanced"
                                           class="form-label d-flex align-items-center cursor-pointer text-light-gray-hover">
                                        <input id="advanced" type="checkbox" name="level" class="form-checkbox me-2">
                                        Advanced
                                        <span class="ms-2">( 07 )</span>
                                    </label>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-lg-9 py-1 px-3">

                    <div class="px-3 py-2 bg-light shadow-sm w-100 rounded-3">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                <div class="text-light-gray-hover">
                                    We found 78 courses for you
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="position-relative">
                                    <div class="position-absolute top-50 start-0 translate-middle-y ps-3">
                                        <i class="bi bi-search"></i>
                                    </div>
                                    <input type="text" name="keyword" class="form-control ps-5" required
                                           placeholder="Search Here" autocomplete="new-keyword">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- no data founded -->
                    <div
                        class="course-content p-3 scrollbar d-flex justify-content-center align-items-center flex-column bg-light shadow-sm w-100 mt-3"
                        v-if="!loading && courseDataList.length === 0">
                        <div class="text-center">
                            <div class="mb-2">
                                <i class="bi bi-database-exclamation fs-2 text-theme"></i>
                            </div>
                            <div class="text-center text-light-gray fs-5">
                                No data founded!
                            </div>
                        </div>
                    </div>

                    <div class="course-content p-3 scrollbar bg-light mt-3 shadow-sm w-100 rounded-3"
                         v-if="!loading && courseDataList.length > 0">

                        <!-- data list -->
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">

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
                                                <small class="d-block text-light-gray">
                                                    By {{ each.author }}
                                                </small>
                                                <div class="fs-4 mt-2 text-light-gray-hover">
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

                    <!-- pagination -->
                    <pagination v-if="!loading && courseDataList.length > 0"/>

                    <!-- loading -->
                    <div
                        class="course-content scrollbar mt-3 d-flex justify-content-center align-items-center flex-column bg-light shadow-sm w-100 rounded-3"
                        v-if="loading">
                        <span class="spinner-border spinner-border" aria-hidden="true"></span>
                    </div>

                </div>
            </div>
        </section>
    </div>

</template>

<script>
import pagination from "../components/pagination.vue";

export default {
    components: {
        pagination
    },
    data() {
        return {
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
            loading: true,
        }
    },
    mounted() {
        setTimeout(() => {
            this.loading = false
        }, 3000)
    },
    methods: {}
}

</script>
