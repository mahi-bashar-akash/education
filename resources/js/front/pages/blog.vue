<template>

    <div class="cursor-content margin-top-105">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">

                <div class="p-3" v-for="each in blogDataList">
                    <div class="card shadow-sm rounded-3 overflow-hidden bg-light border-0 p-0">
                        <div class="card-body p-0 rounded-0">
                            <img :src="each.filePath" class="img-fluid object-fit-cover hpx-250 w-100" alt="brand 2">
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
                            <div class="fs-3 fw-medium truncate-to-2-line p-3 text-light-gray-hover">
                                {{each.title}}
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

        <!-- pagination -->
        <pagination/>

    </div>

</template>

<script>
import pagination from "../components/pagination.vue";

export default {
    components: {
        pagination
    },
    data(){
        return{
            blogDataList: [
                { id: '1', filePath: '/images/blogs/blog-1.jpg', title: 'Secret Tips & Tricks to Master Electricity', author: 'Admin', date: '01, January, 2025' },
                { id: '2', filePath: '/images/blogs/blog-2.jpg', title: 'Secret Tips & Tricks to Master Electricity', author: 'Admin', date: '01, february, 2026' },
                { id: '3', filePath: '/images/blogs/blog-3.jpg', title: 'Secret Tips & Tricks to Master Electricity', author: 'Admin', date: '01, march, 2027' },
                { id: '4', filePath: '/images/blogs/blog-4.jpg', title: 'Secret Tips & Tricks to Master Electricity', author: 'Admin', date: '01, april, 2028' },
                { id: '5', filePath: '/images/blogs/blog-5.jpg', title: 'Secret Tips & Tricks to Master Electricity', author: 'Admin', date: '01, may, 2029' },
                { id: '6', filePath: '/images/blogs/blog-6.jpg', title: 'Secret Tips & Tricks to Master Electricity', author: 'Admin', date: '01, may, 2030' },
            ]
        }
    },
    mounted() {  },
    methods: {  }
}

</script>
