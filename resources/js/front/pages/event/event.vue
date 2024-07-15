<template>
    <div class="cursor-content margin-top-105">
        <section class="container py-5">

            <div class="px-3 py-2 bg-light border w-100 rounded-3">
                <div class="row align-items-center">
                    <div class="col-md-7 py-1">
                        <div class="text-light-gray-hover">
                            60 events
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
                class="course-content p-3 scrollbar d-flex justify-content-center align-items-center flex-column bg-light shadow-sm w-100 mt-3"
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

            <div class="mt-3 w-100 px-1"
                 v-if="!loading && tableData.length > 0">

                <!-- data list -->
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">

                    <div class="p-2" v-for="each in tableData">
                        <div class="bg-white border align-items-center rounded-3 overflow-hidden">
                            <div class="col-12 p-0">
                                <img :src="each.avatar" class="img-fluid object-fit-cover hpx-190 w-100" alt="bg-classroom-1.jpg">
                            </div>
                            <div class="col-12 mt-3 px-2">
                                <div class="row px-3">
                                    <div class="col-6 ps-3">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        {{ formatCreatedAt(each.date) }}
                                    </div>
                                    <div class="col-6 pe-3 text-end">
                                        <i class="bi bi-clock me-1"></i>
                                        {{each.start_time}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 px-3 pt-3">
                                <div class="row">
                                    <div class="fs-4 text-light-gray-hover px-4">
                                        <div class="truncate-to-2-line">
                                            {{each.name}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row px-2">
                                    <div class="px-3 pt-2 pb-4 d-flex justify-content-between">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <i class="bi bi-geo-alt me-1"></i>
                                            <div class="truncate-to-1-line">
                                                {{each.location}}
                                            </div>
                                        </div>
                                        <router-link :to="{name: 'singleEvent'}" class="btn btn-theme wpx-120 rounded-1 border-0">
                                            Get Ticket
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        this.getEvent();
    },
    methods: {

        // Function of handle page change
        handlePageChange(page) {
            this.current_page = page;
            this.getEvent();
        },

        // Function of get event api callback
        getEvent() {
            this.loading = true;
            this.listData.page = this.current_page;
            apiServices.GET(apiRoutes.getEvent, this.listData, (res) => {
                console.log(res)
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
