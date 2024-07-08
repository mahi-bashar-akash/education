<template>
    <div class="cursor-content margin-top-105">
        <section class="container py-5">

            <div class="px-3 py-2 bg-light shadow-sm w-100 rounded-3">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="text-light-gray-hover">
                            60 events
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
                v-if="!loading && eventDataList.length === 0">
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
                 v-if="!loading && eventDataList.length > 0">

                <!-- data list -->
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 px-3">

                    <div class="p-2" v-for="each in eventDataList">
                        <div class="bg-white border align-items-center rounded-3 overflow-hidden">
                            <div class="col-12 p-0">
                                <img :src="each.filePath" class="img-fluid object-fit-cover hpx-190 w-100" alt="bg-classroom-1.jpg">
                            </div>
                            <div class="col-12 mt-3">
                                <div class="row px-4">
                                    <div class="col-6 p-2">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        {{each.date}}
                                    </div>
                                    <div class="col-6 p-2">
                                        <i class="bi bi-clock me-1"></i>
                                        {{each.time}}
                                    </div>
                                    <div class="col-12 p-2">
                                        <i class="bi bi-geo-alt me-1"></i>
                                        {{each.location}}
                                    </div>
                                </div>
                                <div class="col-12 px-2">
                                    <div class="h6 fw-bold px-3 pt-2">
                                        <div class="truncate-to-1-line">
                                            {{each.name}}
                                        </div>
                                    </div>
                                    <div class="px-3 pt-2 pb-4">
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

            <!-- pagination -->
            <pagination v-if="!loading && eventDataList.length > 0"/>

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
import pagination from "../../components/pagination.vue";

export default {
    components: {
        pagination
    },
    data() {
        return {
            eventDataList: [
                {
                    id: '1',
                    filePath: '/images/classroom-bg/bg-classroom-1.jpg',
                    date: 'December 26, 2023',
                    time: '10:30 am',
                    location: 'Yarra Park, Melbourne',
                    name: '2025 Complete Javascript Bootcamp From Zero to Hero in Javascript',
                },
                {
                    id: '2',
                    filePath: '/images/classroom-bg/bg-classroom-2.jpg',
                    date: 'December 26, 2023',
                    time: '10:30 am',
                    location: 'Yarra Park, Melbourne',
                    name: '2025 Complete responsive website design Bootcamp From Zero to Hero in responsive website design',
                },
                {
                    id: '3',
                    filePath: '/images/classroom-bg/bg-classroom-3.jpg',
                    date: 'December 26, 2023',
                    time: '10:30 am',
                    location: 'Yarra Park, Melbourne',
                    name: '2025 Complete VueJs framework Bootcamp From Zero to Hero in VueJs framework',
                },
                {
                    id: '4',
                    filePath: '/images/classroom-bg/bg-classroom-4.jpg',
                    date: 'December 26, 2023',
                    time: '10:30 am',
                    location: 'Yarra Park, Melbourne',
                    name: '2025 Complete AngularJs framework Bootcamp From Zero to Hero in AngularJs',
                },
                {
                    id: '5',
                    filePath: '/images/classroom-bg/bg-classroom-5.jpg',
                    date: 'December 26, 2023',
                    time: '10:30 am',
                    location: 'Yarra Park, Melbourne',
                    name: '2025 Complete Laravel Framework Bootcamp From Zero to Hero in Laravel Framework',
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
