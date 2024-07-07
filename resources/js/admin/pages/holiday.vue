<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <breadcrumb :items="BreadcrumbItems" moduleName="Holidays"/>
    </div>

    <!-- holiday search and new -->
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
            <newBtn @click="manageHolidayModalOpen(null)"/>
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
                        Start date
                    </th>
                    <th class="default-width">
                        End date
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
                        {{each.start_date}}
                    </td>
                    <td class="default-width">
                        {{each.end_date}}
                    </td>
                    <td class="action">
                        <div class="dropdown">
                            <button type="button" class="btn border-0 p-0 btn-icon" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end p-2 mt-1 overflow-hidden rounded-3 border">
                                <li class="mb-2">
                                    <button type="button" class="dropdown-item rounded-3" @click="manageHolidayModalOpen(each.id)">
                                        Edit
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item rounded-3" @click="deleteHolidayModalOpen(each.id)">
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
    <noDataFounded :text="'holiday'" :newModalFunction="manageHolidayModalOpen" v-if="!loading && tableData.length === 0"/>

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

    <!-- manage holiday modal -->
    <div class="modal fade" id="manageHolidayModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="manageHoliday()" class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0 justify-content-between">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Create holiday
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageHolidayModalClose"></button>
                </div>
                <div class="modal-body border-0">

                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" v-model="formData.name" name="name" class="form-control" required
                               autocomplete="new-name">
                        <div class="error-report" v-if="error != null && error.name !== undefined"> {{error.name[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="start-date" class="form-label">Start Date</label>
                        <input id="start-date" type="text" v-model="formData.start_date" name="start-date"
                               class="form-control" required autocomplete="new-start-date">
                        <div class="error-report" v-if="error != null && error.start_date !== undefined"> {{error.start_date[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="end-date" class="form-label">End Date</label>
                        <input id="end-date" type="text" v-model="formData.end_date" name="end-date" class="form-control"
                               required autocomplete="new-end-date">
                        <div class="error-report" v-if="error != null && error.end_date !== undefined"> {{error.end_date[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-textarea"
                                  v-model="formData.description" cols="30" rows="5" required
                                  autocomplete="new-description"></textarea>
                        <div class="error-report" v-if="error != null && error.description !== undefined"> {{error.description[0]}} </div>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110" @click="manageHolidayModalClose">
                        Close
                    </button>
                    <button type="submit" class="btn btn-theme wpx-110" v-if="!manageHolidayLoading">
                        <span v-if="this.formData.id === undefined"> Save </span>
                        <span v-if="this.formData.id !== undefined"> Update </span>
                    </button>
                    <button type="button" class="btn btn-theme wpx-110" v-if="manageHolidayLoading">
                        <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- delete holiday modal -->
    <div class="modal fade" id="deleteHolidayModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <form @submit.prevent="holidayDelete()" class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 border-0 py-2 px-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Delete holiday
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="deleteHolidayModalClose"></button>
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
                        <button type="button" class="btn btn-secondary w-100" @click="deleteHolidayModalClose">
                            Close
                        </button>
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn btn-theme rounded-3 w-100" v-if="!deleteHolidayLoading">
                            Confirm
                        </button>
                        <button type="button" class="btn btn-theme rounded-3 w-100" v-if="deleteHolidayLoading">
                            <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
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
                { title: 'Holidays', route: 'holiday' },
            ],
            formData: {
                name: '',
                start_date: '',
                end_date: '',
                description: '',
            },
            loading: false,
            deleteHolidayParam: {
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
            manageHolidayLoading: false,
            error: null,
            deleteHolidayLoading: false,
            buttons: [],
            manageHolidayTypeLoading: false,
            holidayTypeParam: {
                name: '',
            }
        }
    },
    mounted() {
        this.holidayList();
        this.flatpickrConfigStartDate();
        this.flatpickrConfigEndDate();
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

        /* Function to manage holiday modal open */
        manageHolidayModalOpen(data = null) {
            apiServices.clearErrorHandler()
            if(data !== null) {
                this.holidaySingle(data);
            }else {
                this.formData = {
                    name: '',
                    start_date: '',
                    end_date: '',
                    description: '',
                }
            }
            const myModal = new bootstrap.Modal("#manageHolidayModal", {keyboard: false});
            myModal.show();
        },

        /* Function to manage holiday modal close */
        manageHolidayModalClose() {
            let myModalEl = document.getElementById('manageHolidayModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to delete holiday modal open */
        deleteHolidayModalOpen(id) {
            this.deleteHolidayParam.ids.push(id)
            const myModal = new bootstrap.Modal("#deleteHolidayModal", {keyboard: false});
            myModal.show();
        },

        /* Function to delete holiday modal close */
        deleteHolidayModalClose() {
            this.selected = [];
            this.current_page = 1;
            this.formData = {
                name: '',
                start_date: '',
                end_date: '',
                description: '',
            }
            let myModalEl = document.getElementById('deleteHolidayModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to holiday start date */
        flatpickrConfigStartDate() {
            flatpickr("#start-date", {
                altFormat: 'j M Y',
                altInput: true,
                minDate: "today",
                dateFormat: 'Y-m-d',
                disableMobile: true,
            })
        },

        /* Function to holiday end date */
        flatpickrConfigEndDate() {
            flatpickr("#end-date", {
                altFormat: 'j M Y',
                altInput: true,
                minDate: "today",
                dateFormat: 'Y-m-d',
                disableMobile: true,
            })
        },

        /* Function to holiday list api */
        holidayList() {
            this.loading = true;
            this.listData.page = this.current_page;
            apiServices.GET(apiRoutes.holidayList, this.listData, (res) => {
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

        /* Function to holiday search data */
        SearchData() {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => {
                this.holidayList();
            }, 800);
        },

        /* Function to holiday previous page */
        PrevPage() {
            if (this.current_page > 1) {
                this.current_page = this.current_page - 1;
                this.holidayList()
            }
        },

        /* Function to holiday next page */
        NextPage() {
            if (this.current_page < this.total_pages) {
                this.current_page = this.current_page + 1;
                this.holidayList()
            }
        },

        /* Function to holiday change page */
        pageChange(page) {
            this.current_page = page;
            this.holidayList();
        },

        /* Function to holiday manage of create and update api */
        manageHoliday() {
            if(this.formData.id === undefined) {
                this.holidayCreate()
            }else {
                this.holidayUpdate()
            }
        },

        /* Function to holiday create api */
        holidayCreate() {
            this.manageHolidayLoading = true;
            apiServices.POST(apiRoutes.holidayCreate, this.formData, (res) => {
                this.manageHolidayLoading = false;
                if(res.message) {
                    this.formData = {
                        name: '',
                        start_date: '',
                        end_date: '',
                        description: '',
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageHolidayModalClose();
                    this.holidayList();
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to holiday update api */
        holidayUpdate() {
            this.manageHolidayLoading = true;
            apiServices.PATCH(apiRoutes.holidayUpdate, this.formData, (res) => {
                this.manageHolidayLoading = false;
                if(res.message) {
                    this.formData = {
                        name: '',
                        start_date: '',
                        end_date: '',
                        description: '',
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageHolidayModalClose();
                    this.holidayList();
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to holiday single api */
        holidaySingle(data) {
            apiServices.PUT(apiRoutes.holidaySingle, { id: data }, (res) => {
                if (res.message) {
                    this.formData = res.data;
                } else {
                    this.error = res.errors;
                }
            });
        },

        /* Function to holiday delete api */
        holidayDelete() {
            this.selected.forEach((v) => {
                this.deleteHolidayParam.ids.push(v);
            })
            this.deleteHolidayLoading = true;
            apiServices.DELETE(apiRoutes.holidayDelete, this.deleteHolidayParam, (res) => {
                this.deleteHolidayLoading = false;
                if(res.message) {
                    this.deleteHolidayModalClose();
                    this.holidayList();
                    this.$toast.success(res.message, { position: "top-right" } );
                } else {
                    this.error = res.errors
                }
            })
        },

    }
}

</script>
