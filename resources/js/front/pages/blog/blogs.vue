<template>

    <div class="cursor-content margin-top-105">
        <div class="container py-5">
            <div class="row">
                <div class="col-xl-9">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">

                        <div class="p-3" v-for="each in tableData" v-if="!loading  && tableData.length > 0">
                            <div class="card shadow rounded-3 overflow-hidden bg-light border-0 p-0 image-effect">
                                <div class="card-body p-0 rounded-3">
                                    <div class="overflow-hidden">
                                        <img :src="each.avatar" class="img-fluid object-fit-cover w-100 hpx-200" alt="brand 2">
                                    </div>
                                    <div class="pt-3 px-3">
                                        <div class="w-100 d-flex justify-content-between align-items-center">
                                            <div class="badge bg-warning text-dark fw-medium px-3 py-2 rounded-pill">
                                                {{ each.author_name }}
                                            </div>
                                            <div class="text-secondary text-opacity-75">
                                                {{ formatCreatedAt(each.created_at) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fs-3 fw-medium truncate-to-2-line p-3 text-light-gray-hover">
                                        {{ each.title }}
                                    </div>
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

                    <!-- no data founded -->
                    <div
                        class="vh-100 p-3 d-flex justify-content-center align-items-center flex-column bg-light w-100 mt-3 border"
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

                    <!-- Pagination of list data -->
                    <pagination :total_pages="total_pages" :current_page="current_page" :buttons="buttons"
                                @page-change="handlePageChange" v-if="!loading && tableData.length > 0"/>

                    <!-- loading -->
                    <div class="vh-100 d-flex justify-content-center align-items-center flex-column bg-light shadow-sm w-100 rounded-3" v-if="loading">
                        <span class="spinner-border spinner-border" aria-hidden="true"></span>
                    </div>

                </div>
                <div class="col-xl-3 py-4">

                    <sideContent/>

                </div>
            </div>
        </div>

    </div>

</template>

<script>
import sideContent from "../../components/side-content.vue";
import pagination from "../../components/pagination.vue";
import apiServices from "../../../services/apiServices.js";
import apiRoutes from "../../../services/apiRoutes.js";

export default {
    components: {
        sideContent, pagination
    },
    data() {
        return {
            loading: false,
            tableData: [],
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
        this.getBlogs();
    },
    methods: {

        // Function of handle page change
        handlePageChange(page) {
            this.current_page = page;
            this.getBlogs();
        },

        // Function of get blogs api callback
        getBlogs() {
            this.loading = true;
            this.listData.page = this.current_page;
            apiServices.GET(apiRoutes.getBlog, this.listData, (res) => {
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

        // Function of format created at
        formatCreatedAt(datetime) {
            const date = new Date(datetime);
            const day = date.getDate();
            const month = date.toLocaleString('default', { month: 'long' });
            const year = date.getFullYear();
            return `${day}, ${month}, ${year}`;
        },

    }
}

</script>
