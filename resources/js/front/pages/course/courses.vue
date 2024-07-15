<template>
    <div class="cursor-content margin-top-105">
        <section class="container py-5">
            <div class="row py-3 align-items-start">
                <div class="col-xl-3">
                    <div class="bg-light border rounded-3 p-4">
                        <form>

                            <div class="mb-4">
                                <div class="h5 mb-3 fw-medium">Type of courses</div>

                                <div class="mb-1">
                                    <label for="free" class="form-label d-block cursor-pointer text-light-gray-hover">
                                        <input id="free" type="checkbox" name="course" class="form-checkbox">
                                        Free ( 11 )
                                    </label>
                                </div>

                                <div class="mb-1">
                                    <label for="paid" class="form-label d-block cursor-pointer text-light-gray-hover">
                                        <input id="paid" type="checkbox" name="course" class="form-checkbox">
                                        Paid ( 14 )
                                    </label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="h5 mb-3 fw-medium">Categories</div>

                                <div class="mb-1">
                                    <label for="technology"
                                           class="form-label d-block cursor-pointer text-light-gray-hover">
                                        <input id="technology" type="checkbox" name="category" class="form-checkbox">
                                        Technology ( 11 )
                                    </label>
                                </div>

                                <div class="mb-1">
                                    <label for="business"
                                           class="form-label d-block cursor-pointer text-light-gray-hover">
                                        <input id="business" type="checkbox" name="category" class="form-checkbox">
                                        Business ( 07 )
                                    </label>
                                </div>

                                <div class="mb-1">
                                    <label for="development"
                                           class="form-label d-block cursor-pointer text-light-gray-hover">
                                        <input id="development" type="checkbox" name="category" class="form-checkbox">
                                        Development ( 11 )
                                    </label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="h5 mb-3 fw-medium">Instructor</div>

                                <div class="mb-1">
                                    <label for="jimmy-jason"
                                           class="form-label d-block cursor-pointer text-light-gray-hover">
                                        <input id="jimmy-jason" type="checkbox" name="instructor" class="form-checkbox">
                                        Jimmy Jason ( 11 )
                                    </label>
                                </div>

                                <div class="mb-1">
                                    <label for="harnold"
                                           class="form-label d-block cursor-pointer text-light-gray-hover">
                                        <input id="harnold" type="checkbox" name="instructor" class="form-checkbox">
                                        Harnold ( 07 )
                                    </label>
                                </div>

                                <div class="mb-1">
                                    <label for="eric-madny"
                                           class="form-label d-block cursor-pointer text-light-gray-hover">
                                        <input id="eric-madny" type="checkbox" name="instructor" class="form-checkbox">
                                        Eric Madny ( 11 )
                                    </label>
                                </div>

                            </div>

                            <div class="mb-4">
                                <div class="h5 mb-3 fw-medium">Ratings</div>

                                <div class="mb-1">
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

                                <div class="mb-1">
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

                                <div class="mb-1">
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
                                <div class="h5 mb-3 fw-medium">Level</div>

                                <div class="mb-1">
                                    <label for="beginner"
                                           class="form-label d-flex align-items-center cursor-pointer text-light-gray-hover">
                                        <input id="beginner" type="checkbox" name="level" class="form-checkbox me-2">
                                        Beginner
                                        <span class="ms-2">( 11 )</span>
                                    </label>
                                </div>

                                <div>
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
                <div class="col-xl-9">

                    <div class="px-3 py-2 bg-light border w-100 rounded-3">
                        <div class="row align-items-center">
                            <div class="col-md-7 py-1">
                                <div class="text-light-gray-hover">
                                    We found 78 courses for you
                                </div>
                            </div>
                            <div class="col-md-5 py-1">
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
                        class="course-content p-3 scrollbar d-flex justify-content-center align-items-center flex-column bg-light w-100 mt-3 border"
                        v-if="!loading && tableData.length === 0">
                        <div class="text-center">
                            <div class="mb-2">
                                <i class="bi bi-database-exclamation fs-2 text-theme"></i>
                            </div>
                            <div class="text-center text-light-gray fs-5">
                                No data founded!
                            </div>
                        </div>
                    </div>

                    <div class="px-2 mt-3 w-100"
                         v-if="!loading && tableData.length > 0">

                        <!-- data list -->
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">

                            <div class="p-2" v-for="each in tableData">
                                <router-link :to="{name: 'singleCourse'}" href="javascript:void(0)"
                                             class="text-decoration-none image-effect">
                                    <div class="card border border-1 p-0 overflow-hidden">
                                        <div class="card-body p-0">
                                            <div class="position-relative">
                                                <div class="overflow-hidden">
                                                    <img :src="each.avatar" class="img-fluid object-fit-cover hpx-200"
                                                         alt="course">
                                                </div>
                                                <div class="position-absolute top-0 start-0 p-3">
                                                    <div class="rounded-3 bg-warning text-dark fw-medium py-1 px-3">
                                                        {{ each.price }} TK
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-3">
                                                <small class="badge bg-warning text-dark fw-semibold px-3 py-2 rounded-pill">
                                                    By {{ each.professor_info.name }}
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
                                                        <div class="text-secondary">
                                                            <i class="bi bi-clock me-2"></i>
                                                            {{ each.duration }}
                                                        </div>
                                                        <div class="text-secondary">
                                                            <i class="bi bi-person me-2"></i>
                                                            {{ each.student_enroll_capacity }} Students
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

                    <!-- Pagination of list data -->
                    <pagination :total_pages="total_pages" :current_page="current_page" :buttons="buttons"
                                @page-change="handlePageChange" v-if="!loading && tableData.length > 0"/>

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
import apiServices from "../../../services/apiServices.js";
import apiRoutes from "../../../services/apiRoutes.js";
import pagination from "../../components/pagination.vue";

export default {
    components: {
        pagination
    },
    data() {
        return {
            tableData: [],
            loading: true,
            listData: {
                keyword: '',
                limit: 10,
                page: 1,
            },
            total_pages: 0,
            current_page: 1,
            buttons: [],
            last_page: 0,
        }
    },
    mounted() {
        this.getCourses();
    },
    methods: {

        // Function of handle page change
        handlePageChange(page) {
            this.current_page = page;
            this.getCourses();
        },

        // Function of get courses api callback
        getCourses() {
            this.loading = true;
            this.listData.page = this.current_page;
            apiServices.GET(apiRoutes.getCourse, this.listData, (res) => {
                if (res) {
                    this.loading = false;
                    this.tableData = res?.data?.data;
                    this.last_page = res?.data?.last_page
                    this.total_pages = res?.data?.total < res?.data?.per_page ? 1 : Math.ceil((res?.data?.total / res?.data?.per_page));
                    this.current_page = res?.data?.current_page;
                    this.buttons = [...Array(this.total_pages).keys()].map((i) => i + 1);
                } else {
                    apiServices.clearErrorHandler(res.error)
                }
            })
        },

    }
}

</script>
