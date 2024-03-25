<template>

    <div class="cursor-content margin-top-105">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">

                <div class="p-3" v-for="each in [1,2,3,4,5,6,7,8,9,10]">
                    <a href="javascript:void(0)" class="text-decoration-none">
                        <div class="card shadow-sm rounded-3 overflow-hidden bg-light border-0 p-0">
                            <div class="card-body p-0 rounded-0">
                                <img :src="`/images/blogs/blog-1.jpg`" class="img-fluid object-fit-cover hpx-250 w-100" alt="brand 2">
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
                                <div class="fs-3 fw-medium truncate-to-2-line p-3 text-light-gray-hover">
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
                    </a>
                </div>

            </div>
        </div>
    </div>

</template>

<script>

export default {
    data(){
        return{  }
    },
    mounted() {  },
    methods: {  }
}

</script>
