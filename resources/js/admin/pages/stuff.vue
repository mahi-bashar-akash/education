<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <breadcrumb :items="BreadcrumbItems" moduleName="Stuffs"/>
    </div>

    <!-- search and new -->
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
            <button type="button" class="btn btn-light border-0 mx-2" @click="deleteStuffModalOpen()" v-if="tableData.length > 0 && loading === false && selected.length > 0">
                <i class="bi bi-trash2 text-danger"></i>
            </button>
            <newBtn @click="manageStuffModalOpen(null)"/>
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
                        Email
                    </th>
                    <th class="default-width">
                        Joining date
                    </th>
                    <th class="default-width">
                        Phone
                    </th>
                    <th class="default-width">
                        Department
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
                        {{each.email}}
                    </td>
                    <td class="default-width">
                        {{each.joining_date}}
                    </td>
                    <td class="default-width">
                        {{each.phone}}
                    </td>
                    <td class="default-width">
                        <span v-if="each.department_info != null">
                            {{ each.department_info.name }}
                        </span>
                    </td>
                    <td class="action">
                        <div class="dropdown">
                            <button type="button" class="btn border-0 p-0 btn-icon" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end p-2 mt-1 overflow-hidden rounded-3 border">
                                <li class="mb-2">
                                    <button type="button" class="dropdown-item rounded-3" @click="manageStuffModalOpen(each.id)">
                                        Edit
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item rounded-3" @click="deleteStuffModalOpen(each.id)">
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
    <noDataFounded :text="'stuff'" :newModalFunction="manageStuffModalOpen" v-if="!loading  && tableData.length === 0"/>

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

    <!-- manage stuff modal -->
    <div class="modal fade" id="manageStuffModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="manageStuff()" class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        <span v-if="this.formData.id === undefined"> Create </span>
                        <span v-if="this.formData.id !== undefined"> Edit </span>
                        stuff
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageStuffModalClose"></button>
                </div>
                <div class="modal-body border-0">

                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" v-model="formData.name" name="name" class="form-control"
                               autocomplete="new-name">
                        <div class="error-report" v-if="error != null && error.name !== undefined"> {{error.name[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label"> Email </label>
                        <input id="email" type="email" name="email" v-model="formData.email" class="form-control"
                               autocomplete="new-email">
                        <div class="error-report" v-if="error != null && error.email !== undefined"> {{error.email[0]}} </div>
                    </div>

                    <div class="form-group mb-3" v-if="this.formData.id === undefined">
                        <label for="joining-date" class="form-label">Joining Date</label>
                        <input id="joining-date" type="text" v-model="formData.joining_date" name="join-date"
                               class="form-control" autocomplete="new-joining-date">
                        <div class="error-report" v-if="error != null && error.joining_date !== undefined"> {{error.joining_date[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="department_id" class="form-label">Select department</label>
                        <select name="department_id" id="department_id" class="form-select" v-model="formData.department_id">
                            <option :value="0">Select department option</option>
                            <option v-for="each in departmentDataList" :value="each.id"> {{ each.name }}</option>
                        </select>
                        <div class="error-report" v-if="error != null && error.department_id !== undefined"> {{error.department_id[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="phone" class="form-label"> Phone number </label>
                        <input id="phone" type="text" name="phone" v-model="formData.phone"
                               class="form-control" autocomplete="new-phone-number">
                        <div class="error-report" v-if="error != null && error.phone !== undefined"> {{error.phone[0]}} </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-textarea"
                                  v-model="formData.description" cols="30" rows="5"
                                  autocomplete="new-description"></textarea>
                        <div class="error-report" v-if="error != null && error.description !== undefined"> {{error.description[0]}} </div>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110" @click="manageStuffModalClose">
                        Close
                    </button>
                    <button type="submit" class="btn btn-theme wpx-110" v-if="!manageStuffLoading">
                        <span v-if="this.formData.id === undefined"> Save </span>
                        <span v-if="this.formData.id !== undefined"> Update </span>
                    </button>
                    <button type="button" class="btn btn-theme wpx-110" v-if="manageStuffLoading">
                        <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- delete stuff modal -->
    <div class="modal fade" id="deleteStuffModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="stuffDelete()" class="modal-content rounded-3 border-0 py-2 px-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Delete stuff
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="deleteStuffModalClose"></button>
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
                        <button type="button" class="btn btn-secondary w-100" @click="deleteStuffModalClose">
                            Close
                        </button>
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn btn-theme rounded-3 w-100" v-if="!deleteStuffLoading">
                            Confirm
                        </button>
                        <button type="button" class="btn btn-theme rounded-3 w-100" v-if="deleteStuffLoading">
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
import breadcrumb from "../components/breadcrumb.vue";
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
                { title: 'Stuffs', route: 'stuff' },
            ],
            formData: {
                name: '',
                email: '',
                joining_date: '',
                department_id: '0',
                phone: '',
                description: '',
            },
            departmentDataList: [],
            loading: false,
            deleteStuffParam: {
                ids: []
            },
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
            manageStuffLoading: false,
            error: null,
            deleteStuffLoading: false,
            buttons: [],
        }
    },
    mounted() {
        this.stuffList();
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

        /* Function to manage stuff modal open */
        manageStuffModalOpen(data = null) {
            this.getDepartment();
            apiServices.clearErrorHandler()
            if(data !== null) {
                this.stuffSingle(data);
            }else {
                this.formData = {
                    name: '',
                    email: '',
                    joining_date: '',
                    department_id: '0',
                    phone: '',
                    description: '',
                }
            }
            const myModal = new bootstrap.Modal("#manageStuffModal", {keyboard: false});
            myModal.show();
        },

        /* Function to manage stuff modal close */
        manageStuffModalClose() {
            let myModalEl = document.getElementById('manageStuffModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to delete stuff modal open */
        deleteStuffModalOpen(id) {
            this.deleteStuffParam.ids.push(id)
            const myModal = new bootstrap.Modal("#deleteStuffModal", {keyboard: false});
            myModal.show();
        },

        /* Function to delete stuff modal close */
        deleteStuffModalClose() {
            this.selected = [];
            this.current_page = 1;
            this.formData = {
                name: '',
                email: '',
                joining_date: '',
                department_id: '0',
                phone: '',
                description: '',
            }
            let myModalEl = document.getElementById('deleteStuffModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to stuff joining date */
        flatpickrConfigDate() {
            flatpickr("#joining-date", {
                altFormat: 'j M Y',
                altInput: true,
                minDate: "today",
                dateFormat: 'Y-m-d',
                disableMobile: true,
            })
        },

        /* Function to stuff list api */
        stuffList() {
            this.loading = true;
            this.listData.page = this.current_page;
            apiServices.GET(apiRoutes.stuffList, this.listData, (res) => {
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

        /* Function to stuff search data */
        SearchData() {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => {
                this.stuffList();
            }, 800);
        },

        /* Function to stuff previous page */
        PrevPage() {
            if (this.current_page > 1) {
                this.current_page = this.current_page - 1;
                this.stuffList()
            }
        },

        /* Function to stuff next page */
        NextPage() {
            if (this.current_page < this.total_pages) {
                this.current_page = this.current_page + 1;
                this.stuffList()
            }
        },

        /* Function to stuff change page */
        pageChange(page) {
            this.current_page = page;
            this.stuffList();
        },

        /* Function to stuff manage of create and update api */
        manageStuff() {
            if(this.formData.id === undefined) {
                this.stuffCreate()
            }else {
                this.stuffUpdate()
            }
        },

        /* Function to stuff create api */
        stuffCreate() {
            this.manageStuffLoading = true;
            apiServices.POST(apiRoutes.stuffCreate, this.formData, (res) => {
                this.manageStuffLoading = false;
                if(res.message) {
                    this.formData = {
                        name: '',
                        email: '',
                        joining_date: '',
                        department_id: '0',
                        phone: '',
                        description: '',
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageStuffModalClose();
                    this.stuffList();
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to stuff update api */
        stuffUpdate() {
            this.manageStuffLoading = true;
            apiServices.PATCH(apiRoutes.stuffUpdate, this.formData, (res) => {
                this.manageStuffLoading = false;
                if(res.message) {
                    this.formData = {
                        name: '',
                        email: '',
                        joining_date: '',
                        department_id: '0',
                        phone: '',
                        description: '',
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageStuffModalClose();
                    this.stuffList();
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to stuff single api */
        stuffSingle(data) {
            apiServices.PUT(apiRoutes.stuffSingle, { id: data }, (res) => {
                if (res.message) {
                    this.formData = res.data;
                } else {
                    this.error = res.errors;
                }
            });
        },

        /* Function to stuff delete api */
        stuffDelete() {
            this.selected.forEach((v) => {
                this.deleteStuffParam.ids.push(v);
            })
            this.deleteStuffLoading = true;
            apiServices.DELETE(apiRoutes.stuffDelete, this.deleteStuffParam, (res) => {
                this.deleteStuffLoading = false;
                if(res.message) {
                    this.deleteStuffModalClose();
                    this.stuffList();
                    this.$toast.success(res.message, { position: "top-right" } );
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to get department api */
        getDepartment(){
            apiServices.GET(apiRoutes.departmentList, '', (res) => {
                if(res.message) {
                    this.departmentDataList = res.data.data
                }else {
                    this.error = res.errors
                }
            })
        }

    }
}

</script>
