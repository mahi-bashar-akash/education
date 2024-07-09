<template>

    <!-- Breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <breadcrumb :items="BreadcrumbItems" moduleName="Blogs"/>
    </div>

    <!-- Search and new -->
    <div class="row justify-content-between">
        <div class="col-sm-6 col-xl-3 mb-3">
            <div class="position-relative">
                <input type="text" name="keyword" class="form-control ps-5" autocomplete="new-search"
                       placeholder="Search here" v-model="listData.keyword" @keyup="SearchData()">
                <div class="position-absolute top-50 start-0 translate-middle-y ps-3">
                    <i class="bi bi-search"></i>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6 mb-3 d-flex justify-content-end align-items-center">
            <button type="button" class="btn btn-light border-0 mx-2" @click="deleteBlogModalOpen()" v-if="tableData.length > 0 && loading === false && selected.length > 0">
                <i class="bi bi-trash2 text-danger"></i>
            </button>
            <newBtn @click="manageBlogModalOpen(null)"/>
        </div>
    </div>

    <!-- Table data of event list -->
    <div class="card rounded-3 border-0 shadow" v-if="!loading  && tableData.length > 0">
        <div class="card-body card-list scrollbar">

            <table class="table">
                <thead>
                <tr>
                    <th class="checkbox">
                        <input type="checkbox" class="form-checkbox" :checked="tableData.length > 0 && tableData.length === selected.length" @change="toggleCheckAll($event)">
                    </th>
                    <th class="default-width">
                        Title
                    </th>
                    <th class="default-width">
                        Author name
                    </th>
                    <th class="default-width">
                        Description
                    </th>
                    <th class="action">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="each in tableData">
                    <td class="checkbox">
                        <input type="checkbox" class="form-checkbox" :checked="CheckIfChecked(each.id)" @change="toggleCheck($event,each.id)">
                    </td>
                    <td class="default-width">
                        {{each.title}}
                    </td>
                    <td class="default-width">
                        {{each.author_name}}
                    </td>
                    <td class="default-width">
                        <div class="truncate-to-1-line">
                            {{each.description}}
                        </div>
                    </td>
                    <td class="action">
                        <div class="dropdown">
                            <button type="button" class="btn border-0 p-0 btn-icon" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end p-2 mt-1 overflow-hidden rounded-3 border">
                                <li class="mb-2">
                                    <button type="button" class="dropdown-item rounded-3" @click="manageBlogModalOpen(each.id)">
                                        Edit
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item rounded-3" @click="deleteBlogModalOpen(each.id)">
                                        Delete
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

    <!-- Preloader of list data -->
    <preloader v-if="loading"/>

    <!-- No data found when list data is empty -->
    <noDataFounded :text="'blog'" :newModalFunction="manageBlogModalOpen" v-if="!loading  && tableData.length === 0"/>

    <!-- Pagination of list data -->
    <pagination :total_pages="total_pages" :current_page="current_page" :buttons="buttons"
                @page-change="handlePageChange" v-if="!loading && tableData.length > 0"/>

    <!-- Modal of manage blog -->
    <div class="modal fade" id="manageBlogModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="manageBlog()" class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        <span v-if="this.formData.id === undefined"> Create </span>
                        <span v-if="this.formData.id !== undefined"> Edit </span>
                        blog
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageBlogModalClose"></button>
                </div>
                <div class="modal-body border-0">

                    <div class="form-group mb-3">
                        <label for="upload-image" v-if="this.uploadedImage === null && !uploadLoading"
                               class="form-label hpx-150 d-flex justify-content-center align-items-center flex-column bg-white rounded-4 text-center cursor-pointer border">
                            <input id="upload-image" type="file" name="update-image" hidden="hidden" @change="uploadFile($event)">
                            <i class="bi bi-cloud-arrow-down-fill fs-1"></i>
                            Click to upload Image
                        </label>
                        <div class="position-relative" v-if="this.uploadedImage != null && !uploadLoading">
                            <img :src="uploadedImage" class="img-fluid object-fit-cover w-100 hpx-150 rounded-4" alt="uploaded image">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-danger wpx-35 hpx-35 d-flex justify-content-center align-items-center rounded-circle p-0" @click="deleteFile">
                                    <i class="bi bi-trash2"></i>
                                </button>
                            </div>
                        </div>
                        <div class="position-relative" v-if="uploadLoading">
                            <div class="w-100 hpx-150 rounded-4 bg-secondary-subtle"></div>
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                                <div class="spinner-border text-secondary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="title" class="form-label"> Title </label>
                        <input id="title" v-model="formData.title" type="text" name="title" class="form-control"
                               autocomplete="new-name">
                        <div class="error-report" v-if="error != null && error.title !== undefined"> {{error.title[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="author_name" class="form-label"> Author name </label>
                        <input id="author_name" v-model="formData.author_name" type="text" name="author_name" class="form-control"
                               autocomplete="new-name">
                        <div class="error-report" v-if="error != null && error.author_name !== undefined"> {{error.author_name[0]}} </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label"> Description </label>
                        <textarea id="description" class="form-textarea" name="description"
                                  v-model="formData.description" cols="30" rows="5"
                                  autocomplete="new-description"></textarea>
                        <div class="error-report" v-if="error != null && error.description !== undefined"> {{error.description[0]}} </div>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110" @click="manageBlogModalClose">
                        Close
                    </button>
                    <button type="submit" class="btn btn-theme wpx-110" v-if="!manageBlogLoading">
                        <span v-if="this.formData.id === undefined"> Save </span>
                        <span v-if="this.formData.id !== undefined"> Update </span>
                    </button>
                    <button type="button" class="btn btn-theme wpx-110" v-if="manageBlogLoading">
                        <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal of delete blog -->
    <div class="modal fade" id="deleteBlogModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="blogDelete()" class="modal-content rounded-3 border-0 py-2 px-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Delete blog
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="deleteBlogModalClose"></button>
                </div>
                <div class="modal-body border-0 text-center">

                    <div class="text-center">
                        <i class="bi bi-trash2 fs-1 text-danger"></i>
                    </div>

                    <div class="text-center">
                        Are you sure?
                    </div>

                </div>
                <div class="modal-footer border-0 d-flex justify-content-between align-items-center">
                    <div class="col-5">
                        <button type="button" class="btn btn-secondary rounded-3 w-100" @click="deleteBlogModalClose">
                            Close
                        </button>
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn btn-theme rounded-3 w-100" v-if="!deleteBlogLoading">
                            Confirm
                        </button>
                        <button type="button" class="btn btn-theme rounded-3 w-100" v-if="deleteBlogLoading">
                            <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</template>

<script>
import search from "../components/search.vue";
import preloader from "../components/preloader.vue";
import noDataFounded from "../components/no-data-founded.vue";
import pagination from "../components/pagination.vue";
import newBtn from "../components/new.vue";
import tableContent from "../components/table.vue";
import breadcrumb from '../components/breadcrumb.vue';
import apiServices from "../../services/apiServices.js";
import apiRoutes from "../../services/apiRoutes.js";

export default {
    components: {
        // Component properties
        search, preloader, noDataFounded, pagination, newBtn, tableContent, breadcrumb
    },
    data() {
        return {
            // Data properties
            BreadcrumbItems: [
                { title: 'Dashboard', route: 'dashboard' },
                { title: 'Blogs', route: 'blogs' },
            ],
            formData: {
                title: '',
                author_name: '',
                description: '',
            },
            professorDataList: [],
            loading: false,
            deleteProfessorParam: {
                ids: []
            },
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
            searchTimeOut: null,
            responseData: null,
            selected: [],
            manageBlogLoading: false,
            error: null,
            deleteBlogLoading: false,
            uploadLoading: false,
            uploadedImage: null,
            uploadedImageId: null,
        }
    },
    mounted() {
        this.blogList();
    },
    methods: {

        // Function of handle page change
        handlePageChange(page) {
            this.current_page = page;
            this.blogList();
        },

        // Function of toggle check all
        toggleCheckAll(e) {
            if (e.target.checked) {
                this.tableData.forEach((v) => {
                    this.selected.push(v.id);
                });
            } else {
                this.selected = [];
            }
        },

        // Function of toggle check
        toggleCheck(e, id) {
            if (e.target.checked) {
                this.selected.push(id);
            } else {
                let index = this.selected.indexOf(id);
                this.selected.splice(index, 1);
            }
        },

        // Function of check if checked
        CheckIfChecked(id) {
            return this.selected.map(function (id) {
                return id
            }).indexOf(id) > -1;
        },

        // Function of manage blog modal open
        manageBlogModalOpen(data = null) {
            apiServices.clearErrorHandler()
            if(data !== null) {
                this.blogSingle(data);
            }else {
                this.formData = {
                    title: '',
                    author_name: '',
                    description: '',
                }
            }
            const myModal = new bootstrap.Modal("#manageBlogModal", {keyboard: false});
            myModal.show();
        },

        // Function of manage blog modal close
        manageBlogModalClose() {
            let myModalEl = document.getElementById('manageBlogModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        // Function of delete blog modal open
        deleteBlogModalOpen(id) {
            this.deleteProfessorParam.ids.push(id)
            const myModal = new bootstrap.Modal("#deleteBlogModal", {keyboard: false});
            myModal.show();
        },

        // Function of delete blog modal close
        deleteBlogModalClose() {
            this.selected = [];
            this.current_page = 1;
            this.formData = {
                title: '',
                author_name: '',
                description: '',
            }
            let myModalEl = document.getElementById('deleteBlogModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        // Function of blog list api callback
        blogList() {
            this.loading = true;
            this.listData.page = this.current_page;
            apiServices.GET(apiRoutes.blogList, this.listData, (res) => {
                this.loading = false;
                if (res) {
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

        // Function of blog search data
        SearchData() {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => {
                this.blogList();
            }, 800);
        },

        // Function of blog manager of create and update api callback
        manageBlog() {
            if(this.formData.id === undefined) {
                this.blogCreate()
            }else {
                this.blogUpdate()
            }
        },

        // Function of blog create api callback
        blogCreate() {
            this.manageBlogLoading = true;
            apiServices.POST(apiRoutes.blogCreate, this.formData, (res) => {
                this.manageBlogLoading = false;
                if(res.message) {
                    this.formData = {
                        title: '',
                        author_name: '',
                        description: '',
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageBlogModalClose();
                    this.blogList();
                } else {
                    this.error = res.errors
                }
            })
        },

        // Function of blog update api callback
        blogUpdate() {
            this.manageBlogLoading = true;
            apiServices.PATCH(apiRoutes.blogUpdate, this.formData, (res) => {
                this.manageBlogLoading = false;
                if(res.message) {
                    this.formData = {
                        title: '',
                        author_name: '',
                        description: '',
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageBlogModalClose();
                    this.blogList();
                } else {
                    this.error = res.errors
                }
            })
        },

        // Function of blog single api callback
        blogSingle(data) {
            apiServices.PUT(apiRoutes.blogSingle, { id: data }, (res) => {
                if (res.message) {
                    this.formData = res.data;
                } else {
                    this.error = res.errors;
                }
            });
        },

        // Function of blog delete api callback
        blogDelete() {
            this.selected.forEach((v) => {
                this.deleteProfessorParam.ids.push(v);
            })
            this.deleteBlogLoading = true;
            apiServices.DELETE(apiRoutes.blogDelete, this.deleteProfessorParam, (res) => {
                this.deleteBlogLoading = false;
                if(res.message) {
                    this.deleteBlogModalClose();
                    this.blogList();
                    this.$toast.success(res.message, { position: "top-right" } );
                } else {
                    this.error = res.errors
                }
            })
        },

        // Function of upload file
        uploadFile(event) {
            this.uploadLoading = true;
            let file = event.target.files[0];
            let formData = new FormData();
            formData.append("file", file)
            formData.append("media_type", 1);
            apiServices.UPLOAD(apiRoutes.fileUpload, formData, (res) => {
                event.target.value = ''
                this.uploadLoading = false
                if (res) {
                    this.uploadedImageId = res?.data?.id
                    this.uploadedImage = res?.data?.full_file_path
                } else {
                    this.error = res.errors
                }
            })
        },

        // Function of delete file
        deleteFile() {
            this.uploadLoading = true;
            apiServices.DELETE(apiRoutes.fileDelete+`/${this.uploadedImageId}`, {}, (res) => {
                if(res) {
                    this.uploadLoading = false;
                    this.uploadedImage = null;
                } else {
                    this.error = res.errors
                }
            });
        },

    }
}

</script>
