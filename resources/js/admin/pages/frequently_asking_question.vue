<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <breadcrumb :items="BreadcrumbItems" moduleName="Frequently Asking Question"/>
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
        <div class="col-12 col-xl-6 mb-3 d-flex justify-content-end align-items-center">
            <button type="button" class="btn btn-light border-0 mx-2" @click="deleteFrequentlyAskingQuestionModalOpen()" v-if="tableData.length > 0 && loading === false && selected.length > 0">
                <i class="bi bi-trash2 text-danger"></i>
            </button>
            <newBtn @click="manageFrequentlyAskingQuestionModalOpen(null)"/>
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
                        Question
                    </th>
                    <th class="default-width">
                        Answer
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
                        <div class="truncate-to-1-line">
                            {{each.question}}
                        </div>
                    </td>
                    <td class="default-width">
                        <div class="truncate-to-1-line">
                            {{each.answer}}
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
                                    <button type="button" class="dropdown-item rounded-3" @click="manageFrequentlyAskingQuestionModalOpen(each.id)">
                                        Edit
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item rounded-3" @click="deleteFrequentlyAskingQuestionModalOpen(each.id)">
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
    <noDataFounded :text="'Frequently Asking Question'" :newModalFunction="manageFrequentlyAskingQuestionModalOpen" v-if="!loading  && tableData.length === 0"/>

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

    <!-- manage frequently asking question modal -->
    <div class="modal fade" id="manageFrequentlyAskingQuestionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="manageFrequentlyAskingQuestion()" class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        <span v-if="this.formData.id === undefined"> Create </span>
                        <span v-if="this.formData.id !== undefined"> Edit </span>
                        FAQ.
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageFrequentlyAskingQuestionModalClose"></button>
                </div>
                <div class="modal-body border-0">

                    <div class="form-group mb-3">
                        <label for="question" class="form-label"> Question </label>
                        <input id="question" v-model="formData.question" type="text" name="question" class="form-control"
                               autocomplete="off">
                        <div class="error-report" v-if="error != null && error.question !== undefined"> {{error.question[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="answer" class="form-label"> Answer </label>
                        <textarea name="answer" id="answer" cols="30" rows="5" required autocomplete="off" class="form-textarea" v-model="formData.answer"></textarea>
                        <div class="error-report" v-if="error != null && error.answer !== undefined"> {{error.answer[0]}} </div>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110" @click="manageFrequentlyAskingQuestionModalClose">
                        Close
                    </button>
                    <button type="submit" class="btn btn-theme wpx-110" v-if="!manageFrequentlyAskingQuestionLoading">
                        <span v-if="this.formData.id === undefined"> Save </span>
                        <span v-if="this.formData.id !== undefined"> Update </span>
                    </button>
                    <button type="button" class="btn btn-theme wpx-110" v-if="manageFrequentlyAskingQuestionLoading">
                        <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- delete frequently asking question modal -->
    <div class="modal fade" id="deleteFrequentlyAskingQuestionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="FrequentlyAskingQuestionDelete()" class="modal-content rounded-3 border-0 py-2 px-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Delete Frequently Asking Question
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="deleteFrequentlyAskingQuestionModalClose"></button>
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
                        <button type="button" class="btn btn-secondary rounded-3 w-100" @click="deleteFrequentlyAskingQuestionModalClose">
                            Close
                        </button>
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn btn-theme rounded-3 w-100" v-if="!deleteFrequentlyAskingQuestionLoading">
                            Confirm
                        </button>
                        <button type="button" class="btn btn-theme rounded-3 w-100" v-if="deleteFrequentlyAskingQuestionLoading">
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
        search, preloader, noDataFounded, pagination, newBtn, tableContent, breadcrumb
    },
    data() {
        return {
            BreadcrumbItems: [
                { title: 'Dashboard', route: 'dashboard' },
                { title: 'Frequently Asking Questions', route: 'faq' },
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
            current_page: 1,
            searchTimeOut: null,
            responseData: null,
            selected: [],
            manageFrequentlyAskingQuestionLoading: false,
            error: null,
            deleteFrequentlyAskingQuestionLoading: false,
            buttons: [],
        }
    },
    mounted() {
        this.FrequentlyAskingQuestionList();
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

        /* Function to manage frequently asking question modal open */
        manageFrequentlyAskingQuestionModalOpen(data = null) {
            apiServices.clearErrorHandler()
            if(data !== null) {
                this.FrequentlyAskingQuestionSingle(data);
            }else {
                this.formData = {
                    title: '',
                    author_name: '',
                    description: '',
                }
            }
            const myModal = new bootstrap.Modal("#manageFrequentlyAskingQuestionModal", {keyboard: false});
            myModal.show();
        },

        /* Function to manage frequently asking question modal close */
        manageFrequentlyAskingQuestionModalClose() {
            let myModalEl = document.getElementById('manageFrequentlyAskingQuestionModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to delete Frequently asking question modal open */
        deleteFrequentlyAskingQuestionModalOpen(id) {
            this.deleteProfessorParam.ids.push(id)
            const myModal = new bootstrap.Modal("#deleteFrequentlyAskingQuestionModal", {keyboard: false});
            myModal.show();
        },

        /* Function to delete frequently asking question modal close */
        deleteFrequentlyAskingQuestionModalClose() {
            this.selected = [];
            this.current_page = 1;
            this.formData = {
                title: '',
                author_name: '',
                description: '',
            }
            let myModalEl = document.getElementById('deleteFrequentlyAskingQuestionModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to frequently asking question list api */
        FrequentlyAskingQuestionList() {
            this.loading = true;
            this.listData.page = this.current_page;
            apiServices.GET(apiRoutes.faqList, this.listData, (res) => {
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

        /* Function to frequently asking question search data */
        SearchData() {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => {
                this.FrequentlyAskingQuestionList();
            }, 800);
        },

        /* Function to frequently asking question previous page */
        PrevPage() {
            if (this.current_page > 1) {
                this.current_page = this.current_page - 1;
                this.FrequentlyAskingQuestionList()
            }
        },

        /* Function to frequently asking question next page */
        NextPage() {
            if (this.current_page < this.total_pages) {
                this.current_page = this.current_page + 1;
                this.FrequentlyAskingQuestionList()
            }
        },

        /* Function to frequently asking question change page */
        pageChange(page) {
            this.current_page = page;
            this.FrequentlyAskingQuestionList();
        },

        /* Function to frequently asking question manage of create and update api */
        manageFrequentlyAskingQuestion() {
            if(this.formData.id === undefined) {
                this.FrequentlyAskingQuestionCreate()
            }else {
                this.FrequentlyAskingQuestionUpdate()
            }
        },

        /* Function to frequently asking question create api */
        FrequentlyAskingQuestionCreate() {
            this.manageFrequentlyAskingQuestionLoading = true;
            apiServices.POST(apiRoutes.faqCreate, this.formData, (res) => {
                this.manageFrequentlyAskingQuestionLoading = false;
                if(res.message) {
                    this.formData = {
                        title: '',
                        author_name: '',
                        description: '',
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageFrequentlyAskingQuestionModalClose();
                    this.FrequentlyAskingQuestionList();
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to frequently asking question update api */
        FrequentlyAskingQuestionUpdate() {
            this.manageFrequentlyAskingQuestionLoading = true;
            apiServices.PATCH(apiRoutes.faqUpdate, this.formData, (res) => {
                this.manageFrequentlyAskingQuestionLoading = false;
                if(res.message) {
                    this.formData = {
                        title: '',
                        author_name: '',
                        description: '',
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageFrequentlyAskingQuestionModalClose();
                    this.FrequentlyAskingQuestionList();
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to frequently asking question single api */
        FrequentlyAskingQuestionSingle(data) {
            apiServices.PUT(apiRoutes.faqSingle, { id: data }, (res) => {
                if (res.message) {
                    this.formData = res.data;
                } else {
                    this.error = res.errors;
                }
            });
        },

        /* Function to frequently asking question delete api */
        FrequentlyAskingQuestionDelete() {
            this.selected.forEach((v) => {
                this.deleteProfessorParam.ids.push(v);
            })
            this.deleteFrequentlyAskingQuestionLoading = true;
            apiServices.DELETE(apiRoutes.faqDelete, this.deleteProfessorParam, (res) => {
                this.deleteFrequentlyAskingQuestionLoading = false;
                if(res.message) {
                    this.deleteFrequentlyAskingQuestionModalClose();
                    this.FrequentlyAskingQuestionList();
                    this.$toast.success(res.message, { position: "top-right" } );
                } else {
                    this.error = res.errors
                }
            })
        },

    }
}

</script>
