<template>

    <div class="d-flex justify-content-between align-items-center bg-white shadow px-4 mb-3 rounded-3 hpx-60">
        <BreadcrumbContent :items="BreadcrumbItems"/>
    </div>

    <div class="profile-content bg-white shadow scrollbar p-3 rounded-3">

            <div class="rounded-3 overflow-hidden">
                <img :src="`/images/classroom-bg/bg-classroom-1.jpg`" class="img-fluid object-fit-cover hpx-250 w-100" alt="banner">
            </div>

        <div class="my-3">

            <button type="button" class="btn py-3 ps-3 border text-light-gray-hover w-100 text-start rounded-3" v-if="!formActivity" @click="formToggle">
                Announce something to your class
            </button>
            <form class="mb-3" v-if="formActivity">
                <QuillEditor class="hpx-190" contentType="html" theme="snow" toolbar="full"/>
                <div class="d-flex justify-content-end mt-3">
                    <button type="button" class="btn btn-secondary wpx-85 me-2" @click="formToggle">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-theme wpx-85">
                        Post
                    </button>
                </div>
            </form>

        </div>

        <div class="d-flex justify-content-between align-items-center border pe-3 rounded-3 mb-3">
            <div class="p-3">
                <a href="https://meet.google.com/jrp-zekq-upp" class="text-decoration-none truncate-to-1-line" target="_blank">
                    https://meet.google.com/jrp-zekq-upp
                </a>
            </div>
            <div class="dropdown">
                <button type="button" class="btn-icon rounded-circle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end mt-3 p-1 overflow-hidden rounded-3 border">
                    <li>
                        <a href="javascript:void(0)" class="dropdown-item px-3 py-2">
                            Copy link
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="dropdown-item px-3 py-2">
                            Report abuse
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center border ps-2 pe-3 rounded-3 mb-3">
            <div class="p-2 w-100">
                <a href="javascript:void(0)" class="text-decoration-none d-flex align-items-center justify-content-start truncate-to-1-line text-dark w-100">
                <span class="wpx-40 hpx-40 bg-theme text-white rounded-circle d-flex justify-content-center align-items-center me-2">
                    <i class="bi bi-card-text"></i>
                </span>
                    <span class="d-block">
                        <span class="d-block fw-bold"> Exam test </span>
                        <span class="d-block text-secondary text-opacity-75"> 30, February, 2025 </span>
                    </span>
                </a>
            </div>
            <div class="dropdown">
                <button type="button" class="btn-icon rounded-circle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end mt-3 p-1 overflow-hidden rounded-3 border">
                    <li>
                        <a href="javascript:void(0)" class="dropdown-item px-3 py-2">
                            Copy link
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="dropdown-item px-3 py-2">
                            Report abuse
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center border ps-2 pe-3 rounded-3 mb-3">
            <div class="p-2 w-100">
                <a href="javascript:void(0)" class="text-decoration-none d-flex align-items-center justify-content-start truncate-to-1-line text-dark w-100">
                <span class="wpx-40 hpx-40 bg-theme text-white rounded-circle d-flex justify-content-center align-items-center me-2">
                    <i class="bi bi-journal-bookmark-fill"></i>
                </span>
                    <span class="d-block">
                        <span class="d-block fw-bold"> New material as notes </span>
                        <span class="d-block text-secondary text-opacity-75"> 03, March, 2025 </span>
                    </span>
                </a>
            </div>
            <div class="dropdown">
                <button type="button" class="btn-icon rounded-circle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end mt-3 p-1 overflow-hidden rounded-3 border">
                    <li>
                        <a href="javascript:void(0)" class="dropdown-item px-3 py-2">
                            Copy link
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="dropdown-item px-3 py-2">
                            Report abuse
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center border ps-2 pe-3 rounded-3 mb-3">
            <div class="p-2 w-100">
                <a href="javascript:void(0)" class="text-decoration-none d-flex align-items-center justify-content-start truncate-to-1-line text-dark w-100">
                <span class="wpx-40 hpx-40 bg-theme text-white rounded-circle d-flex justify-content-center align-items-center me-2">
                    <i class="bi bi-journal-bookmark-fill"></i>
                </span>
                    <span class="d-block">
                        <span class="d-block fw-bold"> New material as assignment </span>
                        <span class="d-block text-secondary text-opacity-75"> 03, March, 2025 </span>
                    </span>
                </a>
            </div>
            <div class="dropdown">
                <button type="button" class="btn-icon rounded-circle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end mt-3 p-1 overflow-hidden rounded-3 border">
                    <li>
                        <a href="javascript:void(0)" class="dropdown-item px-3 py-2">
                            Copy link
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="dropdown-item px-3 py-2">
                            Report abuse
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

</template>

<script>
import noDataFound from "../components/no-data-found.vue";
import preloader from "../components/preloader.vue";
import BreadcrumbContent from "../components/breadcrumb.vue";
import pagination from "../components/pagination.vue";
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
export default {
    components: {
        BreadcrumbContent, noDataFound, preloader, pagination, QuillEditor
    },
    data() {
        return {
            courseId: null,
            BreadcrumbItems: [
                { title: 'Profile', route: 'profile' },
                { title: 'My class room', route: 'myClassRoom' },
                { title: 'Course details', route: 'myCourse' },
            ],
            loading: true,
            formActivity: false,
        }
    },
    mounted() {
        setTimeout(() => {
            this.loading = false
        }, 2000)
    },
    methods: {

        /* Function to form toggle */
        formToggle() {
            this.formActivity = !this.formActivity
        },

    }
}

</script>
