<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <breadcrumb :items="BreadcrumbItems" moduleName="Fees"/>
    </div>

    <!-- fees search and new -->
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
            <button type="button" class="btn btn-light border-0 mx-2" @click="deleteFeesModalOpen()" v-if="tableData.length > 0 && loading === false && selected.length > 0">
                <i class="bi bi-trash2 text-danger"></i>
            </button>
            <div class="dropdown me-3">
                <button type="button" class="btn btn-theme wpx-90 hpx-36 d-flex align-items-center justify-content-center border-0" data-bs-toggle="dropdown" aria-expanded="false">
                    List
                </button>
                <ul class="dropdown-menu dropdown-menu-end p-2 m-0 overflow-hidden rounded-2">
                    <li>
                        <button type="button" class="dropdown-item rounded-2" @click="feesTypeModalListOpen()">
                            List of fees type
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item rounded-2" @click="paymentTypeListOpen()">
                            List of payment type
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item rounded-2" @click="paymentStatusListOpen()">
                            List of payment status
                        </button>
                    </li>
                </ul>
            </div>
            <div class="dropdown">
                <newBtn data-bs-toggle="dropdown" aria-expanded="false"/>
                <ul class="dropdown-menu dropdown-menu-end p-2 m-0 overflow-hidden rounded-2">
                    <li>
                        <button type="button" class="dropdown-item rounded-2" @click="manageFeesModalOpen(null)">
                            Manage fees
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item rounded-2" @click="manageFeesTypeModalOpen()">
                            Manage fees type
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item rounded-2" @click="managePaymentTypeModalOpen()">
                            Manage payment type
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item rounded-2" @click="managePaymentStatusModalOpen()">
                            Manage payment status
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card rounded-3 border-0 shadow" v-if="!loading && tableData.length > 0">
        <div class="card-body card-list scrollbar">

            <table class="table">
                <thead>
                    <tr>
                        <th class="checkbox">
                            <input type="checkbox" class="form-checkbox" :checked="tableData.length > 0 && tableData.length === selected.length" @change="toggleCheckAll($event)">
                        </th>
                        <th class="default-width">
                            Student
                        </th>
                        <th class="default-width">
                            Fees type
                        </th>
                        <th class="default-width">
                            Fees amount
                        </th>
                        <th class="default-width">
                            Payment type
                        </th>
                        <th class="default-width">
                            Payment status
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
                            <span v-if="each.student_info != null">
                                {{ each.student_info.name }}
                            </span>
                        </td>
                        <td class="default-width">
                            {{each.fees_type}}
                        </td>
                        <td class="default-width">
                            {{each.fees_amount}}
                        </td>
                        <td class="default-width">
                            {{each.payment_type}}
                        </td>
                        <td class="default-width">
                            {{each.payment_status}}
                        </td>
                        <td class="action">
                            <div class="dropdown">
                                <button type="button" class="btn border-0 p-0 btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end p-2 mt-1 overflow-hidden rounded-3 border">
                                    <li class="mb-2">
                                        <button type="button" class="dropdown-item rounded-3" @click="manageFeesModalOpen(each.id)">
                                            Edit
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item rounded-3" @click="deleteFeesModalOpen(each.id)">
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
    <noDataFounded :text="'fees'" :newModalFunction="manageFeesModalOpen" v-if="!loading  && tableData.length === 0"/>

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

    <!-- manage fees modal -->
    <div class="modal fade" id="manageFeesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="manageFees()" class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        <span v-if="this.formData.id === undefined"> Create </span>
                        <span v-if="this.formData.id !== undefined"> Edit </span>
                        fees
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageFeesModalClose"></button>
                </div>
                <div class="modal-body border-0">

                    <div class="form-group mb-3">
                        <label for="student_id" class="form-label">Select Student</label>
                        <select name="student_id" id="student_id" class="form-select"
                                autocomplete="new-select-student" v-model="formData.student_id">
                            <option :value="0">Select student option</option>
                            <option v-for="each in studentTableData" :value="each.id"> {{ each.name }}</option>
                        </select>
                        <div class="error-report" v-if="error != null && error.student_id !== undefined"> {{error.student_id[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="fees-type" class="form-label">Select Fees type</label>
                        <select name="fees_type" id="fees-type" class="form-select"
                                autocomplete="new-select-fees-type" v-model="formData.fees_type">
                            <option :value="0">Select fees type</option>
                            <option v-for="each in feesTypeTableData" :value="each.id"> {{ each.name }}</option>
                        </select>
                        <div class="error-report" v-if="error != null && error.fees_type !== undefined"> {{error.fees_type[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="fees-amount" class="form-label">Fees amount</label>
                        <input id="fees-amount" type="text" name="fees_amount" class="form-control"
                               autocomplete="new-fees-amount" v-model="formData.fees_amount">
                        <div class="error-report" v-if="error != null && error.fees_amount !== undefined"> {{error.fees_amount[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="payment-type" class="form-label">Payment type</label>
                        <select name="payment_type" id="payment-type" class="form-select"
                                autocomplete="new-payment-type" v-model="formData.payment_type">
                            <option :value="0">Select payment type</option>
                            <option v-for="each in paymentTypeTableData" :value="each.id"> {{ each.name }}</option>
                        </select>
                        <div class="error-report" v-if="error != null && error.payment_type !== undefined"> {{error.payment_type[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="payment-status" class="form-label">Payment status</label>
                        <select name="payment_status" id="payment-status" class="form-select"
                                autocomplete="new-payment-status" v-model="formData.payment_status">
                            <option :value="0">Select payment status</option>
                            <option v-for="each in paymentStatusTableData" :value="each.id"> {{ each.name }}</option>
                        </select>
                        <div class="error-report" v-if="error != null && error.payment_status !== undefined"> {{error.payment_status[0]}} </div>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110" @click="manageFeesModalClose">
                        Close
                    </button>
                    <button type="submit" class="btn btn-theme wpx-110" v-if="!manageFeesLoading">
                        <span v-if="this.formData.id === undefined"> Save </span>
                        <span v-if="this.formData.id !== undefined"> Update </span>
                    </button>
                    <button type="button" class="btn btn-theme wpx-110" v-if="manageFeesLoading">
                        <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- delete fees modal -->
    <div class="modal fade" id="deleteFeesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="feesDelete()" class="modal-content rounded-3 border-0 py-2 px-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Delete fees
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="deleteFeesModalClose"></button>
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
                        <button type="button" class="btn btn-secondary w-100" @click="deleteFeesModalClose">
                            Close
                        </button>
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn btn-theme rounded-3 w-100" v-if="!deleteFeesLoading">
                            Confirm
                        </button>
                        <button type="button" class="btn btn-theme rounded-3 w-100" v-if="deleteFeesLoading">
                            <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Manage fees type modal -->
    <div class="modal fade" id="manageFeesTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="manageFeesType()" class="modal-content border-0 px-3 py-2 rounded-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        <span v-if="this.feesTypeParam.id === undefined"> Create </span>
                        <span v-if="this.feesTypeParam.id !== undefined"> Edit </span>
                        Fees types
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageFeesTypeModalClose"></button>
                </div>
                <div class="modal-body border-0">
                    <div class="form-group">
                        <label for="fees-type-name" class="form-label">Name</label>
                        <input id="fees-type-name" type="text" name="name" v-model="feesTypeParam.name" class="form-control" autocomplete="new-fees-type-name">
                        <div class="error-report" v-if="feesTypeError != null && feesTypeError.name !== undefined"> {{feesTypeError.name[0]}} </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110" @click="manageFeesTypeModalClose">
                        Close
                    </button>
                    <button type="submit" class="btn btn-theme wpx-110" v-if="!manageFeesTypeLoading">
                        Save
                    </button>
                    <button type="button" class="btn btn-theme wpx-110" v-if="manageFeesTypeLoading">
                        <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Manage payment type modal -->
    <div class="modal fade" id="managePaymentTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="managePaymentType()" class="modal-content border-0 px-3 py-2 rounded-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        <span v-if="this.paymentTypeParam.id === undefined"> Create </span>
                        <span v-if="this.paymentTypeParam.id !== undefined"> Edit </span>
                        Payment types
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="managePaymentTypeModalClose"></button>
                </div>
                <div class="modal-body border-0">
                    <div class="form-group">
                        <label for="payment-type-name" class="form-label">Name</label>
                        <input id="payment-type-name" type="text" name="name" v-model="paymentTypeParam.name" class="form-control" autocomplete="new-payment-type-name">
                        <div class="error-report" v-if="paymentTypeError != null && paymentTypeError.name !== undefined"> {{paymentTypeError.name[0]}} </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110" @click="managePaymentTypeModalClose">
                        Close
                    </button>
                    <button type="submit" class="btn btn-theme wpx-110" v-if="!managePaymentTypeLoading">
                        Save
                    </button>
                    <button type="button" class="btn btn-theme wpx-110" v-if="managePaymentTypeLoading">
                        <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Manage payment status modal -->
    <div class="modal fade" id="managePaymentStatusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="managePaymentStatus()" class="modal-content border-0 px-3 py-2 rounded-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        <span v-if="this.paymentStatusParam.id === undefined"> Create </span>
                        <span v-if="this.paymentStatusParam.id !== undefined"> Edit </span>
                        Payment status
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="managePaymentStatusModalClose"></button>
                </div>
                <div class="modal-body border-0">
                    <div class="form-group">
                        <label for="payment-status-name" class="form-label">Name</label>
                        <input id="payment-status-name" type="text" name="name" v-model="paymentStatusParam.name" class="form-control" autocomplete="new-payment-type-name">
                        <div class="error-report" v-if="paymentStatusError != null && paymentStatusError.name !== undefined"> {{paymentStatusError.name[0]}} </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110" @click="managePaymentStatusModalClose">
                        Close
                    </button>
                    <button type="submit" class="btn btn-theme wpx-110" v-if="!managePaymentStatusLoading">
                        Save
                    </button>
                    <button type="button" class="btn btn-theme wpx-110" v-if="managePaymentStatusLoading">
                        <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- fees type list modal -->
    <div class="modal fade" id="feesTypeListModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Fees type</h1>
                    <button type="button" class="btn-close shadow-none" @click="feesTypeModalListClose()"></button>
                </div>
                <div class="modal-body border-0">

                </div>
            </div>
        </div>
    </div>

    <!-- payment type list modal -->
    <div class="modal fade" id="paymentTypeListModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Payment type</h1>
                    <button type="button" class="btn-close shadow-none" @click="paymentTypeListClose()"></button>
                </div>
                <div class="modal-body border-0">

                </div>
            </div>
        </div>
    </div>

    <!-- payment status list modal -->
    <div class="modal fade" id="paymentStatusListModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Payment status</h1>
                    <button type="button" class="btn-close shadow-none" @click="paymentStatusListClose()"></button>
                </div>
                <div class="modal-body border-0">

                </div>
            </div>
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
        search, preloader, noDataFounded, pagination, newBtn, tableContent, breadcrumb
    },
    data() {
        return {
            BreadcrumbItems: [
                { title: 'Dashboard', route: 'dashboard' },
                { title: 'Fees', route: 'fees' },
            ],
            studentTableData: [],
            formData: {
                student_id: '0',
                fees_type: '0',
                fees_amount: '',
                payment_type: '0',
                payment_status: '0',
            },
            feesTypeParam: {
                name: '',
            },
            paymentTypeParam: {
                name: '',
            },
            paymentStatusParam: {
                name: '',
            },
            loading: true,
            manageFeesTypeLoading: false,
            feesTypeListLoading: false,
            managePaymentTypeLoading: false,
            paymentTypeListLoading: false,
            managePaymentStatusLoading: false,
            paymentStatusListLoading: false,
            deleteFeesParam: {
                ids: []
            },
            tableData: [],
            feesTypeTableData: [],
            paymentTypeTableData: [],
            paymentStatusTableData: [],
            listData: {
                keyword: '',
                limit: 10,
                page: 1,
            },
            feesTypesListData: {
                keyword: '',
                limit: 10,
                page: 1,
            },
            paymentTypesListData: {
                keyword: '',
                limit: 10,
                page: 1,
            },
            paymentStatusListData: {
                keyword: '',
                limit: 10,
                page: 1,
            },
            current_page: 1,
            searchTimeOut: null,
            responseData: null,
            selected: [],
            manageFeesLoading: false,
            error: null,
            feesTypeError: null,
            paymentTypeError: null,
            paymentStatusError: null,
            deleteFeesLoading: false,
            buttons: [],
        }
    },
    mounted() {
        this.feesList();
        this.feesTypeList();
        this.paymentTypeList();
        this.paymentStatusList();
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

        /* Function to manage fees modal open */
        manageFeesModalOpen(data = null) {
            this.getStudent();
            apiServices.clearErrorHandler()
            if(data !== null) {
                this.feesSingle(data);
            }else {
                this.formData = {
                    student_id: '0',
                    fees_type: '0',
                    fees_amount: '',
                    payment_type: '0',
                    payment_status: '0',
                }
            }
            const myModal = new bootstrap.Modal("#manageFeesModal", {keyboard: false});
            myModal.show();
        },

        /* Function to manage fees modal close */
        manageFeesModalClose() {
            let myModalEl = document.getElementById('manageFeesModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to delete fees modal open */
        deleteFeesModalOpen(id) {
            this.deleteFeesParam.ids.push(id)
            const myModal = new bootstrap.Modal("#deleteFeesModal", {keyboard: false});
            myModal.show();
        },

        /* Function to delete fees modal close */
        deleteFeesModalClose() {
            this.selected = [];
            this.current_page = 1;
            this.formData = {
                student_id: '0',
                fees_type: '0',
                fees_amount: '',
                payment_type: '0',
                payment_status: '0',
            }
            let myModalEl = document.getElementById('deleteFeesModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to fees list api */
        feesList() {
            this.loading = true;
            this.listData.page = this.current_page;
            apiServices.GET(apiRoutes.feesList, this.listData, (res) => {
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

        /* Function to fees search data */
        SearchData() {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => {
                this.feesList();
            }, 800);
        },

        /* Function to fees previous page */
        PrevPage() {
            if (this.current_page > 1) {
                this.current_page = this.current_page - 1;
                this.feesList()
            }
        },

        /* Function to fees next page */
        NextPage() {
            if (this.current_page < this.total_pages) {
                this.current_page = this.current_page + 1;
                this.feesList()
            }
        },

        /* Function to fees change page */
        pageChange(page) {
            this.current_page = page;
            this.feesList();
        },

        /* Function to fees manage of create and update api */
        manageFees() {
            if(this.formData.id === undefined) {
                this.feesCreate()
            }else {
                this.feesUpdate()
            }
        },

        /* Function to fees create api */
        feesCreate() {
            this.manageFeesLoading = true;
            apiServices.POST(apiRoutes.feesCreate, this.formData, (res) => {
                this.manageFeesLoading = false;
                if(res.message) {
                    this.formData = {
                        student_enroll_capacity: '',
                        name: '',
                        professor_id: '0',
                        price: '',
                        duration: '',
                        description: '',
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageFeesModalClose();
                    this.feesList();
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to fees update api */
        feesUpdate() {
            this.manageFeesLoading = true;
            apiServices.PATCH(apiRoutes.feesUpdate, this.formData, (res) => {
                this.manageFeesLoading = false;
                if(res.message) {
                    this.formData = {
                        student_enroll_capacity: '',
                        name: '',
                        professor_id: '0',
                        price: '',
                        duration: '',
                        description: '',
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageFeesModalClose();
                    this.feesList();
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to fees single api */
        feesSingle(data) {
            apiServices.PUT(apiRoutes.feesSingle, { id: data }, (res) => {
                if (res.message) {
                    this.formData = res.data;
                } else {
                    this.error = res.errors;
                }
            });
        },

        /* Function to fees delete api */
        feesDelete() {
            this.selected.forEach((v) => {
                this.deleteFeesParam.ids.push(v);
            })
            this.deleteFeesLoading = true;
            apiServices.DELETE(apiRoutes.feesDelete, this.deleteFeesParam, (res) => {
                this.deleteFeesLoading = false;
                if(res.message) {
                    this.deleteFeesModalClose();
                    this.feesList();
                    this.$toast.success(res.message, { position: "top-right" } );
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to get professor api */
        getStudent(){
            apiServices.GET(apiRoutes.studentList, '', (res) => {
                if(res.message) {
                    this.studentTableData = res.data.data
                }else {
                    this.error = res.errors
                }
            })
        },

        /* Function to manage fees type modal open */
        manageFeesTypeModalOpen() {
            const myModal = new bootstrap.Modal("#manageFeesTypeModal", {keyboard: false});
            myModal.show();
        },

        /* Function to manage fees type modal close */
        manageFeesTypeModalClose() {
            let myModalEl = document.getElementById('manageFeesTypeModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to manage fees type */
        manageFeesType() {
            if(this.feesTypeParam.id === undefined) {
                this.createFeesType();
            }else {
                this.updateFeesType();
            }
        },

        /* Function to create fees type */
        createFeesType() {
            this.manageFeesTypeLoading = true;
            apiServices.POST(apiRoutes.feesTypesCreate, this.feesTypeParam, (res) => {
                this.manageFeesTypeLoading = false;
                if(res.message) {
                    this.feesTypeParam = {
                        name: ''
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageFeesTypeModalClose();
                    this.feesTypeList();
                } else {
                    this.feesTypeError = res.errors
                }
            })
        },

        /* Function to update fees type */
        updateFeesType() {
            this.manageFeesTypeLoading = true;
            apiServices.PATCH(apiRoutes.feesTypesUpdate, this.feesTypeParam, (res) => {
                this.manageFeesTypeLoading = false;
                if(res.message) {
                    this.feesTypeParam = {
                        name: ''
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageFeesTypeModalClose();
                    this.feesTypeList();
                } else {
                    this.feesTypeError = res.errors
                }
            })
        },

        /* Function to fees type list */
        feesTypeList() {
            this.feesTypeListLoading = true;
            apiServices.GET(apiRoutes.feesTypesList, this.feesTypesListData, (res) => {
                this.feesTypeListLoading = false;
                if (res.message) {
                    this.feesTypeTableData = res.data.data;
                    this.responseData = res.data;
                    this.total_pages = res.data.total < res.data.per_page ? 1 : Math.ceil((res.data.total / res.data.per_page))
                    this.current_page = res.data.current_page;
                    this.buttons = [...Array(this.total_pages).keys()].map(i => i + 1);
                } else {
                    apiServices.clearErrorHandler(res.error)
                }
            })
        },

        /* Function to manage payment type modal open */
        managePaymentTypeModalOpen() {
            const myModal = new bootstrap.Modal("#managePaymentTypeModal", {keyboard: false});
            myModal.show();
        },

        /* Function to manage payment type modal close */
        managePaymentTypeModalClose() {
            let myModalEl = document.getElementById('managePaymentTypeModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to manage payment type */
        managePaymentType() {
            if(this.paymentTypeParam.id === undefined) {
                this.createPaymentType();
            }else {
                this.updatePaymentType();
            }
        },

        /* Function to create payment type */
        createPaymentType() {
            this.managePaymentTypeLoading = true;
            apiServices.POST(apiRoutes.paymentTypesCreate, this.paymentTypeParam, (res) => {
                this.managePaymentTypeLoading = false;
                if(res.message) {
                    this.paymentTypeParam = {
                        name: ''
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.managePaymentTypeModalClose();
                    this.paymentTypeList();
                } else {
                    this.paymentTypeError = res.errors
                }
            })
        },

        /* Function to update payment type */
        updatePaymentType() {
            this.managePaymentTypeLoading = true;
            apiServices.PATCH(apiRoutes.paymentTypesUpdate, this.paymentTypeParam, (res) => {
                this.managePaymentTypeLoading = false;
                if(res.message) {
                    this.paymentTypeParam = {
                        name: ''
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.managePaymentTypeModalClose();
                    this.paymentTypeList();
                } else {
                    this.paymentTypeError = res.errors
                }
            })
        },

        /* Function to payment type list */
        paymentTypeList() {
            this.paymentTypeListLoading = true;
            apiServices.GET(apiRoutes.paymentTypesList, this.paymentTypesListData, (res) => {
                this.paymentTypeListLoading = false;
                if (res.message) {
                    this.paymentTypeTableData = res.data.data;
                    this.responseData = res.data;
                    this.total_pages = res.data.total < res.data.per_page ? 1 : Math.ceil((res.data.total / res.data.per_page))
                    this.current_page = res.data.current_page;
                    this.buttons = [...Array(this.total_pages).keys()].map(i => i + 1);
                } else {
                    apiServices.clearErrorHandler(res.error)
                }
            })
        },

        /* Function to manage payment status modal open */
        managePaymentStatusModalOpen() {
            const myModal = new bootstrap.Modal("#managePaymentStatusModal", {keyboard: false});
            myModal.show();
        },

        /* Function to manage payment status modal close */
        managePaymentStatusModalClose() {
            let myModalEl = document.getElementById('managePaymentStatusModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to manage payment status */
        managePaymentStatus() {
            if(this.paymentStatusParam.id === undefined) {
                this.createPaymentStatus();
            }else {
                this.updatePaymentStatus();
            }
        },

        /* Function to create payment status */
        createPaymentStatus() {
            this.managePaymentStatusLoading = true;
            apiServices.POST(apiRoutes.paymentStatusCreate, this.paymentStatusParam, (res) => {
                this.managePaymentStatusLoading = false;
                if(res.message) {
                    this.paymentStatusParam = {
                        name: ''
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.managePaymentStatusModalClose();
                    this.paymentStatusList();
                } else {
                    this.paymentStatusError = res.errors
                }
            })
        },

        /* Function to update payment status */
        updatePaymentStatus() {
            this.managePaymentStatusLoading = true;
            apiServices.POST(apiRoutes.paymentStatusUpdate, this.paymentStatusParam, (res) => {
                this.managePaymentStatusLoading = false;
                if(res.message) {
                    this.paymentStatusParam = {
                        name: ''
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.managePaymentStatusModalClose();
                    this.paymentStatusList();
                } else {
                    this.paymentStatusError = res.errors
                }
            })
        },

        /* Function to payment status list */
        paymentStatusList() {
            this.paymentStatusListLoading = true;
            apiServices.GET(apiRoutes.paymentStatusList, this.paymentStatusListData, (res) => {
                this.paymentStatusListLoading = false;
                if (res.message) {
                    this.paymentStatusTableData = res.data.data;
                    this.responseData = res.data;
                    this.total_pages = res.data.total < res.data.per_page ? 1 : Math.ceil((res.data.total / res.data.per_page))
                    this.current_page = res.data.current_page;
                    this.buttons = [...Array(this.total_pages).keys()].map(i => i + 1);
                } else {
                    apiServices.clearErrorHandler(res.error)
                }
            })
        },

        /* Function to fees type modal list open */
        feesTypeModalListOpen() {
            const myModal = new bootstrap.Modal("#feesTypeListModal", {keyboard: false});
            myModal.show();
        },

        /* Function to fees type modal list open */
        feesTypeModalListClose() {
            let myModalEl = document.getElementById('feesTypeListModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to payment type modal list open */
        paymentTypeListOpen() {
            const myModal = new bootstrap.Modal("#paymentTypeListModal", {keyboard: false});
            myModal.show();
        },

        /* Function to payment type modal list open */
        paymentTypeListClose() {
            let myModalEl = document.getElementById('paymentTypeListModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to payment status modal list open */
        paymentStatusListOpen() {
            const myModal = new bootstrap.Modal("#paymentStatusListModal", {keyboard: false});
            myModal.show();
        },

        /* Function to payment status modal list open */
        paymentStatusListClose() {
            let myModalEl = document.getElementById('paymentStatusListModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

    }
}

</script>
