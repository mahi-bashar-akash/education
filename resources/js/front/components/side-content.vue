<template>

    <!-- search -->
    <div class="position-relative">
        <input type="text" name="keyword" class="form-control ps-5" required autocomplete="new-search"
               placeholder="Write your keyword..">
        <div class="position-absolute top-50 start-0 translate-middle-y ps-3">
            <i class="bi bi-search"></i>
        </div>
    </div>

    <!-- recent posts -->
    <div class="my-4">

        <div class="fw-bold fs-5 mb-3">Recent Posts</div>

        <div class="mb-3">
            <a href="javascript:void(0)"
               class="text-decoration-none text-light-gray-hover d-flex align-items-start justify-content-start">
                <span>
                    <img :src="`/images/blogs/blog-1.jpg`" class="wpx-120 hpx-84 rounded-3 img-fluid object-fit-cover" alt="course">
                </span>
                <span class="ms-2">
                    <span class="d-block">
                        Cupidatat non proident sunt culpa officia deserunt
                    </span>
                    <span class="d-block text-warning">
                        Price $45
                    </span>
                </span>
            </a>
        </div>

        <div class="mb-3">
            <a href="javascript:void(0)" class="text-decoration-none text-light-gray-hover d-flex align-items-start justify-content-start">
                <span>
                    <img :src="`/images/blogs/blog-2.jpg`" class="wpx-120 hpx-84 rounded-3 img-fluid object-fit-cover" alt="course">
                </span>
                <span class="ms-2">
                    <span class="d-block">
                        Cupidatat non proident sunt culpa officia deserunt
                    </span>
                    <span class="d-block text-warning">
                        Price $45
                    </span>
                </span>
            </a>
        </div>

        <div class="mb-3">
            <a href="javascript:void(0)" class="text-decoration-none text-light-gray-hover d-flex align-items-start justify-content-start">
                <span>
                    <img :src="`/images/blogs/blog-3.jpg`"
                         class="wpx-120 hpx-84 rounded-3 img-fluid object-fit-cover" alt="course">
                </span>
                <span class="ms-2">
                    <span class="d-block">
                        Cupidatat non proident sunt culpa officia deserunt
                    </span>
                    <span class="d-block text-warning">
                        Price $45
                    </span>
                </span>
            </a>
        </div>

    </div>

    <!-- categories -->
    <div class="my-4">

        <div class="fw-bold fs-5 mb-3">Categories</div>

        <a href="javascript:void(0)" class="text-decoration-none text-light-gray-hover d-flex align-items-center justify-content-start py-1 mb-2">
            <i class="bi bi-chevron-right me-2"></i>
            Home teaching (1)
        </a>

        <a href="javascript:void(0)" class="text-decoration-none text-light-gray-hover d-flex align-items-center justify-content-start py-1 mb-2">
            <i class="bi bi-chevron-right me-2"></i>
            Education (1)
        </a>

        <a href="javascript:void(0)" class="text-decoration-none text-light-gray-hover d-flex align-items-center justify-content-start py-1 mb-2">
            <i class="bi bi-chevron-right me-2"></i>
            Learning (2)
        </a>

        <a href="javascript:void(0)" class="text-decoration-none text-light-gray-hover d-flex align-items-center justify-content-start py-1 mb-2">
            <i class="bi bi-chevron-right me-2"></i>
            Studentship (3)
        </a>

    </div>

    <!-- blog sidebar img -->
    <div class="my-4">
        <div class="card text-bg-dark border-0 rounded-0">
            <img :src="`/images/sidebar-img.jpg`" class="card-img hpx-350 object-fit-cover" alt="sidebar-img">
            <div class="card-img-overlay d-flex justify-content-start align-items-start flex-column">
                <div class="mb-4">
                    <div class="p-3 rounded-circle wpx-60 hpx-60 d-flex justify-content-center align-items-center bg-theme text-white fw-medium">
                        Free
                    </div>
                </div>
                <div class="p-3 fw-bold text-white fs-4 mb-4">
                    Fill Your Sketchbook & Build a Watercolor Habit
                </div>
                <button type="button" class="btn btn-warning w-100 rounded-pill fw-medium">
                    Get Started Today
                </button>
            </div>
        </div>
    </div>

</template>

<script>

export default {

    data() {
        return {}
    },

    mounted() {
    },

    methods: {}

}

</script>
