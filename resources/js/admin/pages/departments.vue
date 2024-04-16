<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <breadcrumb :items="BreadcrumbItems" moduleName="Departments"/>
    </div>

    <!-- search and new -->
    <div class="row justify-content-between">
        <div class="col-sm-6 col-xl-3 mb-3">
            <div class="position-relative">
                <input type="text" name="keyword" class="form-control ps-5" required autocomplete="new-search"
                       placeholder="Search here" v-model="listData.keyword" @keyup="SearchData()">
                <div class="position-absolute top-50 start-0 translate-middle-y ps-3">
                    <i class="bi bi-search"></i>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 mb-3">
            <select name="event-type" class="form-select">
                <option value="select-option">Select visible data</option>
                <option value="10"> 10</option>
                <option value="20"> 20</option>
                <option value="30"> 30</option>
                <option value="40"> 40</option>
                <option value="50"> 50</option>
            </select>
        </div>
        <div class="col-12 col-xl-6 mb-3 d-flex justify-content-end align-items-center">
            <button type="button" class="btn btn-light border-0 mx-2" @click="deleteDepartmentModalOpen()" v-if="tableData.length > 0 && loading === false && selected.length > 0">
                <i class="bi bi-trash2 text-danger"></i>
            </button>
            <newBtn @click="manageDepartmentModalOpen(null)"/>
        </div>
    </div>

    <div class="card rounded-3 border-0 shadow" v-if="!loading  && tableData.length > 0">
        <div class="card-body card-list scrollbar">

            <table class="table">
                <thead>
                    <tr>
                        <th class="checkbox">
                            <input type="checkbox" class="form-checkbox" :checked="tableData.length > 0 && tableData.length === selected.length" @change="toggleCheckAll($event)">
                        </th>
                        <th class="default-width">
                            Name
                        </th>
                        <th class="default-width">
                            Head of department
                        </th>
                        <th class="default-width">
                            Phone
                        </th>
                        <th class="default-width">
                            Email
                        </th>
                        <th class="default-width">
                            Starting year
                        </th>
                        <th class="default-width">
                            Stuff capacity
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
                            {{each.head_of_department}}
                        </td>
                        <td class="default-width">
                            {{each.phone}}
                        </td>
                        <td class="default-width">
                            {{each.email}}
                        </td>
                        <td class="default-width">
                            {{each.start_year}}
                        </td>
                        <td class="default-width">
                            {{each.stuff_capacity}}
                        </td>
                        <td class="action">
                            <div class="dropdown">
                                <button type="button" class="btn border-0 p-0 btn-icon" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end p-2 mt-1 overflow-hidden rounded-3 border">
                                    <li class="mb-2">
                                        <button type="button" class="dropdown-item rounded-3" @click="manageDepartmentModalOpen(each.id)">
                                            Edit
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item rounded-3" @click="deleteDepartmentModalOpen(each.id)">
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

    <!-- preloader -->
    <preloader v-if="loading"/>

    <!-- no data -->
    <noDataFounded :text="'department'" :newModalFunction="manageDepartmentModalOpen" v-if="!loading  && tableData.length === 0"/>

    <!-- pagination -->
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

    <!-- manage department modal -->
    <div class="modal fade" id="manageDepartmentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="manageDepartment()" class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        <span v-if="this.formData.id === undefined"> Create </span>
                        <span v-if="this.formData.id !== undefined"> Edit </span>
                        department
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageDepartmentModalClose"></button>
                </div>
                <div class="modal-body border-0">

                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" v-model="formData.name" name="name" class="form-control"
                               autocomplete="new-name">
                        <div class="error-report" v-if="error != null && error.name !== undefined"> {{error.name[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="head-of-department" class="form-label">Head Of Department</label>
                        <input id="head-of-department" type="text" v-model="formData.head_of_department"
                               name="head_of_department" class="form-control"
                               autocomplete="new-head-of-department">
                        <div class="error-report" v-if="error != null && error.head_of_department !== undefined"> {{error.head_of_department[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="phone-number" class="form-label"> Phone number </label>
                        <input id="phone-number" type="text" name="phone" v-model="formData.phone"
                               class="form-control" autocomplete="new-phone-number">
                        <div class="error-report" v-if="error != null && error.phone !== undefined"> {{error.phone[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label"> Email </label>
                        <input id="email" type="email" name="email" v-model="formData.email" class="form-control"
                               autocomplete="new-email">
                    </div>

                    <div class="form-group mb-3" v-if="this.formData.id === undefined">
                        <label for="start-date" class="form-label"> Start date </label>
                        <input id="start-date" type="text" name="start_year" v-model="formData.start_year"
                               class="form-control" autocomplete="new-start-year">
                        <div class="error-report" v-if="error != null && error.start_year !== undefined"> {{error.start_year[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="stuff-capacity" class="form-label"> Stuff capacity </label>
                        <input id="stuff-capacity" type="text" name="stuff_capacity" v-model="formData.stuff_capacity"
                               class="form-control" autocomplete="new-stuff-capacity">
                        <div class="error-report" v-if="error != null && error.stuff_capacity !== undefined"> {{error.stuff_capacity[0]}} </div>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110" @click="manageDepartmentModalClose">
                        Close
                    </button>
                    <button type="submit" class="btn btn-theme wpx-110" v-if="!manageDepartmentLoading">
                        <span v-if="this.formData.id === undefined"> Save </span>
                        <span v-if="this.formData.id !== undefined"> Update </span>
                    </button>
                    <button type="button" class="btn btn-theme wpx-110" v-if="manageDepartmentLoading">
                        <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- delete department modal -->
    <div class="modal fade" id="deleteDepartmentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="departmentDelete()" class="modal-content rounded-3 border-0 py-2 px-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Delete department
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="deleteDepartmentModalClose"></button>
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
                        <button type="button" class="btn btn-secondary w-100" @click="deleteDepartmentModalClose">
                            Close
                        </button>
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn btn-theme w-100" v-if="!deleteDepartmentLoading">
                            Confirm
                        </button>
                        <button type="button" class="btn btn-theme w-100" v-if="deleteDepartmentLoading">
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
import flatpickr from "flatpickr";
import tableContent from "../components/table.vue";
import breadcrumb from '../components/breadcrumb.vue';
import apiServices from "../../services/apiServices.js";
import apiRoutes from "../../services/apiRoutes.js";

export default {
    components: {
        search, preloader, noDataFounded, pagination, newBtn, tableContent, breadcrumb
    },
    data() {
        return {
            BreadcrumbItems: [
                { title: 'Dashboard', route: 'dashboard' },
                { title: 'Departments', route: 'departments' },
            ],
            formData: {
                name: '',
                head_of_department: '',
                start_year: '',
                stuff_capacity: '',
                email: '',
                phone: '',
            },
            deleteDepartmentParam: {
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
            manageDepartmentLoading: false,
            error: null,
            deleteDepartmentLoading: false,
            buttons: [],
        }
    },
    mounted() {
        this.departmentList();
        this.flatpickrConfigDate();
    },
    methods: {

        /* Function to toggle check all */
        toggleCheckAll(e) {
            if (e.target.checked) {
                this.tableData.forEach((v) => {
                    this.selected.push(v.id);
                });
            } else {
                this.selected = [];
            }
        },

        /* Function to toggle check */
        toggleCheck(e, id) {
            if (e.target.checked) {
                this.selected.push(id);
            } else {
                let index = this.selected.indexOf(id);
                this.selected.splice(index, 1);
            }
        },

        /* Function to check if checked */
        CheckIfChecked(id) {
            return this.selected.map(function (id) {
                return id
            }).indexOf(id) > -1;
        },

        /* Function to manage department modal open */
        manageDepartmentModalOpen(data = null) {
            apiServices.clearErrorHandler()
            if(data !== null) {
                this.departmentSingle(data);
            }else {
                this.formData = {
                    name: '',
                    head_of_department: '',
                    start_year: '',
                    stuff_capacity: '',
                    email: '',
                    phone: '',
                }
            }
            const myModal = new bootstrap.Modal("#manageDepartmentModal", {keyboard: false});
            myModal.show();
        },

        /* Function to manage department modal close */
        manageDepartmentModalClose() {
            let myModalEl = document.getElementById('manageDepartmentModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to delete department modal open */
        deleteDepartmentModalOpen(id) {
            this.deleteDepartmentParam.ids.push(id)
            const myModal = new bootstrap.Modal("#deleteDepartmentModal", {keyboard: false});
            myModal.show();
        },

        /* Function to delete department modal close */
        deleteDepartmentModalClose() {
            this.selected = [];
            this.current_page = 1;
            this.formData = {
                name: '',
                head_of_department: '',
                start_year: '',
                stuff_capacity: '',
                email: '',
                phone: '',
            }
            let myModalEl = document.getElementById('deleteDepartmentModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to department start-date */
        flatpickrConfigDate() {
            flatpickr("#start-date", {
                altFormat: 'j M Y',
                altInput: true,
                minDate: "today",
                dateFormat: 'Y-m-d',
                disableMobile: true,
            })
        },

        /* Function to department list api */
        departmentList() {
            this.loading = true;
            this.listData.page = this.current_page;
            apiServices.GET(apiRoutes.departmentList, this.listData, (res) => {
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

        /* Function to department search data */
        SearchData() {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => {
                this.departmentList();
            }, 800);
        },

        /* Function to department previous page */
        PrevPage() {
            if (this.current_page > 1) {
                this.current_page = this.current_page - 1;
                this.departmentList()
            }
        },

        /* Function to department next page */
        NextPage() {
            if (this.current_page < this.total_pages) {
                this.current_page = this.current_page + 1;
                this.departmentList()
            }
        },

        /* Function to department change page */
        pageChange(page) {
            this.current_page = page;
            this.departmentList();
        },

        /* Function to department manage of create and update api */
        manageDepartment() {
            if(this.formData.id === undefined) {
                this.departmentCreate()
            }else {
                this.departmentUpdate()
            }
        },

        /* Function to department create api */
        departmentCreate() {
            this.manageDepartmentLoading = true;
            apiServices.POST(apiRoutes.departmentCreate, this.formData, (res) => {
                this.manageDepartmentLoading = false;
                if(res.message) {
                    this.formData = {
                        name: '',
                        head_of_department: '',
                        start_year: '',
                        stuff_capacity: '',
                        email: '',
                        phone: '',
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageDepartmentModalClose();
                    this.departmentList();
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to department update api */
        departmentUpdate() {
            this.manageDepartmentLoading = true;
            apiServices.PATCH(apiRoutes.departmentUpdate, this.formData, (res) => {
                this.manageDepartmentLoading = false;
                if(res.message) {
                    this.formData = {
                        name: '',
                        head_of_department: '',
                        start_year: '',
                        stuff_capacity: '',
                        email: '',
                        phone: '',
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageDepartmentModalClose();
                    this.departmentList();
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to department single api */
        departmentSingle(data) {
            apiServices.PUT(apiRoutes.departmentSingle, { id: data }, (res) => {
                if (res.message) {
                    this.formData = res.data;
                } else {
                    this.error = res.errors;
                }
            });
        },

        /* Function to department delete api */
        departmentDelete() {
            this.selected.forEach((v) => {
                this.deleteDepartmentParam.ids.push(v);
            })
            this.deleteDepartmentLoading = true;
            apiServices.DELETE(apiRoutes.departmentDelete, this.deleteDepartmentParam, (res) => {
                this.deleteDepartmentLoading = false;
                if(res.message) {
                    this.deleteDepartmentModalClose();
                    this.departmentList();
                    this.$toast.success(res.message, { position: "top-right" } );
                } else {
                    this.error = res.errors
                }
            })
        }

    }
}

</script>
