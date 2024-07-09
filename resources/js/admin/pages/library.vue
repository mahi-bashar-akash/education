<template>

    <!-- Breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <breadcrumb :items="BreadcrumbItems" moduleName="Library Assets"/>
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
        <div class="col-12 col-xl-6 mb-3 d-flex justify-content-end">
            <button type="button" class="btn btn-light border-0 mx-2" @click="deleteLibraryAssetModalOpen()" v-if="tableData.length > 0 && loading === false && selected.length > 0">
                <i class="bi bi-trash2 text-danger"></i>
            </button>
            <newBtn @click="manageLibraryAssetModalOpen(null)"/>
        </div>
    </div>

    <!-- Table data list -->
    <div class="card rounded-3 border-0 shadow" v-if="!loading  && tableData.length > 0">
        <div class="card-body card-list scrollbar">
            <table class="table">
                <thead>
                    <tr>
                        <th class="checkbox">
                            <input type="checkbox" class="form-checkbox" :checked="tableData.length > 0 && tableData.length === selected.length" @change="toggleCheckAll($event)">
                        </th>
                        <th class="default-width">
                            name
                        </th>
                        <th class="default-width">
                            author
                        </th>
                        <th class="default-width">
                            subject
                        </th>
                        <th class="default-width">
                            price
                        </th>
                        <th class="default-width">
                            department
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
                            {{each.name}}
                        </td>
                        <td class="default-width">
                            {{each.author}}
                        </td>
                        <td class="default-width">
                            {{each.subject}}
                        </td>
                        <td class="default-width">
                            {{each.price}}
                        </td>
                        <td class="default-width">
                            <div v-if="each.status === 1"> In Stock </div>
                            <div v-if="each.status === 2"> Out of Stock </div>
                        </td>
                        <td class="default-width">
                            <div v-if="each.department_info != null">
                                {{ each.department_info.name }}
                            </div>
                        </td>
                        <td class="action">
                            <div class="dropdown">
                                <button type="button" class="btn border-0 p-0 btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end p-2 mt-1 overflow-hidden rounded-3 border">
                                    <li class="mb-2">
                                        <button type="button" class="dropdown-item rounded-3" @click="manageLibraryAssetModalOpen(each.id)">
                                            Edit
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item rounded-3" @click="deleteLibraryAssetModalOpen(each.id)">
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

    <!-- Preloader of table data list -->
    <preloader v-if="loading"/>

    <!-- No data founded of table list data -->
    <noDataFounded :text="'library asset'" :newModalFunction="manageLibraryAssetModalOpen" v-if="!loading  && tableData.length === 0"/>

    <!-- Pagination of table list data -->
    <div class="d-flex justify-content-center mt-3" v-if="!loading && tableData.length > 0">
        <div class="pagination admin-pagination">
            <div class="page-item" @click="PrevPage()">
                <a class="page-link" href="javascript:void(0)">
                    <i class="bi bi-chevron-left"></i>
                </a>
            </div>
            <div v-if="buttons.length <= 6">
                <div v-for="(page, index) in buttons" class="page-item"
                     :class="{'active': current_page === page}">
                    <a class="page-link" @click="pageChange(page)" href="javascript:void(0)"
                       v-text="page"></a>
                </div>
            </div>
            <div v-if="buttons.length > 6">
                <div class="page-item" :class="{'active': current_page === 1}">
                    <a class="page-link" @click="pageChange(1)"
                       href="javascript:void(0)">1</a>
                </div>

                <div v-if="current_page > 3" class="page-item">
                    <a class="page-link" @click="pageChange(current_page - 2)"
                       href="javascript:void(0)">...</a>
                </div>

                <div v-if="current_page === buttons.length" class="page-item"
                     :class="{'active': current_page === (current_page - 2)}">
                    <a class="page-link" @click="pageChange(current_page - 2)"
                       href="javascript:void(0)" v-text="current_page - 2"></a>
                </div>

                <div v-if="current_page > 2" class="page-item"
                     :class="{'active': current_page === (current_page - 1)}">
                    <a class="page-link" @click="pageChange(current_page - 1)"
                       href="javascript:void(0)" v-text="current_page - 1"></a>
                </div>

                <div v-if="current_page !== 1 && current_page !== buttons.length" class="page-item active">
                    <a class="page-link" @click="pageChange(current_page)" href="javascript:void(0)"
                       v-text="current_page"></a>
                </div>

                <div v-if="current_page < buttons.length - 1" class="page-item"
                     :class="{'active': current_page === (current_page + 1)}">
                    <a class="page-link" @click="pageChange(current_page + 1)"
                       href="javascript:void(0)" v-text="current_page + 1"></a>
                </div>

                <div v-if="current_page === 1" class="page-item"
                     :class="{'active': current_page === (current_page + 2)}">
                    <a class="page-link" @click="pageChange(current_page + 2)"
                       href="javascript:void(0)" v-text="current_page + 2"></a>
                </div>

                <div v-if="current_page < buttons.length - 2" class="page-item">
                    <a class="page-link" @click="pageChange(current_page + 2)"
                       href="javascript:void(0)">...</a>
                </div>

                <div class="page-item" :class="{'active': current_page === (current_page - buttons.length)}">
                    <a class="page-link" @click="pageChange(buttons.length)"
                       href="javascript:void(0)" v-text="buttons.length"></a>
                </div>
            </div>
            <div class="page-item" @click="NextPage()">
                <a class="page-link" href="javascript:void(0)">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>

        </div>
    </div>

    <!-- Modal of manage library asset -->
    <div class="modal fade" id="manageLibraryAssetModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="manageLibraryAsset()" class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        <span v-if="this.formData.id === undefined"> Create </span>
                        <span v-if="this.formData.id !== undefined"> Edit </span>
                        library asset
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageLibraryAssetModalClose"></button>
                </div>
                <div class="modal-body border-0">

                    <div class="form-group mb-3">
                        <label for="upload-image"
                               class="form-label hpx-150 d-flex justify-content-center align-items-center flex-column bg-white text-center cursor-pointer border">
                            <input id="upload-image" type="file" name="update-image" hidden="hidden">
                            <i class="bi bi-cloud-arrow-down-fill fs-1"></i>
                            Click to upload Image
                        </label>
                        <div class="error-report" v-if="error != null && error.name !== undefined"> {{error.name[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="name" class="form-label"> Name </label>
                        <input id="name" v-model="formData.name" type="text" name="name" class="form-control"
                               autocomplete="new-name">
                        <div class="error-report" v-if="error != null && error.name !== undefined"> {{error.name[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="subject" class="form-label"> Subject </label>
                        <input id="subject" v-model="formData.subject" type="text" name="subject" class="form-control"
                               autocomplete="new-subject">
                        <div class="error-report" v-if="error != null && error.subject !== undefined"> {{error.subject[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="author-name" class="form-label"> Author name </label>
                        <input id="author-name" v-model="formData.author" type="text" name="author"
                               class="form-control" autocomplete="new-author-name">
                        <div class="error-report" v-if="error != null && error.author !== undefined"> {{error.author[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="department" class="form-label">Select department</label>
                        <select name="department" id="department_id" class="form-select" v-model="formData.department_id">
                            <option :value="0">Select Department option</option>
                            <option v-for="each in departmentListData" :value="each.id"> {{ each.name }}</option>
                        </select>
                        <div class="error-report" v-if="error != null && error.department_id !== undefined"> {{error.department_id[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="price" class="form-label"> Price </label>
                        <input id="price" v-model="formData.price" type="text" name="price" class="form-control"
                               autocomplete="new-price">
                        <div class="error-report" v-if="error != null && error.price !== undefined"> {{error.price[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="status" class="form-label"> Status </label>
                        <select name="status" id="status" class="form-select" autocomplete="new-status" v-model="formData.status">
                            <option value="1">In Stock</option>
                            <option value="2">Out of Stock</option>
                        </select>
                        <div class="error-report" v-if="error != null && error.status !== undefined"> {{error.status[0]}} </div>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110" @click="manageLibraryAssetModalClose">
                        Close
                    </button>
                    <button type="submit" class="btn btn-theme wpx-110" v-if="!manageLibraryAssetLoading">
                        <span v-if="this.formData.id === undefined"> Save </span>
                        <span v-if="this.formData.id !== undefined"> Update </span>
                    </button>
                    <button type="button" class="btn btn-theme wpx-110" v-if="manageLibraryAssetLoading">
                        <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal of delete library asset -->
    <div class="modal fade" id="deleteLibraryAssetModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="libraryAssetDelete()" class="modal-content rounded-3 border-0 py-2 px-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Delete library asset
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="deleteLibraryAssetModalClose"></button>
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
                        <button type="button" class="btn btn-secondary rounded-3 w-100"
                                @click="deleteLibraryAssetModalClose">
                            Close
                        </button>
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn btn-theme rounded-3 w-100" v-if="!deleteLibraryAssetLoading">
                            Confirm
                        </button>
                        <button type="button" class="btn btn-theme rounded-3 w-100" v-if="deleteLibraryAssetLoading">
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
import breadcrumb from "../components/breadcrumb.vue";
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
                { title: 'Library', route: 'library' },
            ],
            formData: {
                name: '',
                subject: '',
                author: '',
                department_id: '0',
                price: '',
            },
            departmentListData: [],
            deleteLibraryAssetParam: {
                ids: []
            },
            loading: false,
            tableData: [],
            listData: {
                keyword: '',
                limit: 10,
                page: 1,
            },
            current_page: 1,
            searchTimeOut: null,
            responseData: null,
            selected: [],
            manageLibraryAssetLoading: false,
            error: null,
            deleteLibraryAssetLoading: false,
            buttons: [],
        }
    },
    mounted() {
        this.libraryAssetList();
    },
    methods: {

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

        // Function of manage library asset modal open
        manageLibraryAssetModalOpen(data = null) {
            this.getDepartment()
            apiServices.clearErrorHandler()
            if(data !== null) {
                this.libraryAssetSingle(data);
            }else {
                this.formData = {
                    name: '',
                    subject: '',
                    author: '',
                    department_id: '0',
                    price: '',
                }
            }
            const myModal = new bootstrap.Modal("#manageLibraryAssetModal", {keyboard: false});
            myModal.show();
        },

        // Function of manage library asset modal close
        manageLibraryAssetModalClose() {
            let myModalEl = document.getElementById('manageLibraryAssetModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        // Function of delete library asset modal open
        deleteLibraryAssetModalOpen(id) {
            this.deleteLibraryAssetParam.ids.push(id)
            const myModal = new bootstrap.Modal("#deleteLibraryAssetModal", {keyboard: false});
            myModal.show();
        },

        // Function of delete library asset modal close
        deleteLibraryAssetModalClose() {
            this.selected = [];
            this.current_page = 1;
            this.formData = {
                name: '',
                subject: '',
                author: '',
                department_id: '0',
                price: '',
            }
            let myModalEl = document.getElementById('deleteLibraryAssetModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        // Function of library asset list api callback
        libraryAssetList() {
            this.loading = true;
            this.listData.page = this.current_page;
            apiServices.GET(apiRoutes.libraryAssetList, this.listData, (res) => {
                this.loading = false;
                if (res.message) {
                    this.tableData = res.data.data;
                    this.responseData = res.data;
                    this.total_pages = res.data.total < res.data.per_page ? 1 : Math.ceil((res.data.total / res.data.per_page))
                    this.current_page = res.data.current_page;
                    this.buttons = [...Array(this.total_pages).keys()].map(i => i + 1);
                } else {
                    apiServices.clearErrorHandler(res.error)
                }
            })
        },

        // Function of library asset search data
        SearchData() {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => {
                this.libraryAssetList();
            }, 800);
        },

        // Function of library asset previous page
        PrevPage() {
            if (this.current_page > 1) {
                this.current_page = this.current_page - 1;
                this.libraryAssetList()
            }
        },

        // Function of library asset next page
        NextPage() {
            if (this.current_page < this.total_pages) {
                this.current_page = this.current_page + 1;
                this.libraryAssetList()
            }
        },

        // Function of library asset change page
        pageChange(page) {
            this.current_page = page;
            this.libraryAssetList();
        },

        // Function of library asset manage as create and update api callback
        manageLibraryAsset() {
            if(this.formData.id === undefined) {
                this.libraryAssetCreate()
            }else {
                this.libraryAssetUpdate()
            }
        },

        // Function of library asset create api callback
        libraryAssetCreate() {
            this.manageLibraryAssetLoading = true;
            apiServices.POST(apiRoutes.libraryAssetCreate, this.formData, (res) => {
                this.manageLibraryAssetLoading = false;
                if(res.message) {
                    this.formData = {
                        name: '',
                        subject: '',
                        author: '',
                        department_id: '0',
                        price: '',
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageLibraryAssetModalClose();
                    this.libraryAssetList();
                } else {
                    this.error = res.errors
                }
            })
        },

        // Function of library asset update api callback
        libraryAssetUpdate() {
            this.manageLibraryAssetLoading = true;
            apiServices.PATCH(apiRoutes.libraryAssetUpdate, this.formData, (res) => {
                this.manageLibraryAssetLoading = false;
                if(res.message) {
                    this.formData = {
                        name: '',
                        subject: '',
                        author: '',
                        department_id: '0',
                        price: '',
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageLibraryAssetModalClose();
                    this.libraryAssetList();
                } else {
                    this.error = res.errors
                }
            })
        },

        // Function of library asset single api callback
        libraryAssetSingle(data) {
            apiServices.PUT(apiRoutes.libraryAssetSingle, { id: data }, (res) => {
                if (res.message) {
                    this.formData = res.data;
                } else {
                    this.error = res.errors;
                }
            });
        },

        // Function of library asset delete api callback
        libraryAssetDelete() {
            this.selected.forEach((v) => {
                this.deleteLibraryAssetParam.ids.push(v);
            })
            this.deleteLibraryAssetLoading = true;
            apiServices.DELETE(apiRoutes.libraryAssetDelete, this.deleteLibraryAssetParam, (res) => {
                this.deleteLibraryAssetLoading = false;
                if(res.message) {
                    this.deleteLibraryAssetModalClose();
                    this.libraryAssetList();
                    this.$toast.success(res.message, { position: "top-right" } );
                } else {
                    this.error = res.errors
                }
            })
        },

        // Function of department list api callback
        getDepartment() {
            apiServices.GET(apiRoutes.departmentList, '', (res) => {
                if(res.message) {
                    this.departmentListData = res.data.data
                }else {
                    this.error = res.errors
                }
            })
        },

    }
}

</script>
