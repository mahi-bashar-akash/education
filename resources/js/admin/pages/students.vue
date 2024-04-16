<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <breadcrumb :items="BreadcrumbItems" moduleName="Students"/>
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
        <div class="col-12 col-xl-6 mb-3 d-flex justify-content-end">
            <button type="button" class="btn btn-light border-0 mx-2" @click="deleteStudentModalOpen()" v-if="tableData.length > 0 && loading === false && selected.length > 0">
                <i class="bi bi-trash2 text-danger"></i>
            </button>
            <newBtn @click="manageStudentModalOpen(null)"/>
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
                        Admission date
                    </th>
                    <th class="default-width">
                        Name
                    </th>
                    <th class="default-width">
                        Roll or Id
                    </th>
                    <th class="default-width">
                        Phone
                    </th>
                    <th class="default-width">
                        Email
                    </th>
                    <th class="default-width">
                        Enroll Course
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
                        {{each.admission_date}}
                    </td>
                    <td class="default-width">
                        {{each.name}}
                    </td>
                    <td class="default-width">
                        {{each.roll_or_id}}
                    </td>
                    <td class="default-width">
                        {{each.phone}}
                    </td>
                    <td class="default-width">
                        {{each.email}}
                    </td>
                    <td class="default-width">
                        <span v-if="each.course_info != null">
                            {{ each.course_info.name }}
                        </span>
                    </td>
                    <td class="action">
                        <div class="dropdown">
                            <button type="button" class="btn border-0 p-0 btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end p-2 mt-1 overflow-hidden rounded-3 border">
                                <li class="mb-2">
                                    <button type="button" class="dropdown-item rounded-3" @click="manageStudentModalOpen(each.id)">
                                        Edit
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item rounded-3" @click="deleteStudentModalOpen(each.id)">
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
    <noDataFounded :text="'student'" :newModalFunction="manageStudentModalOpen" v-if="!loading  && tableData.length === 0"/>

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

    <!-- manage student modal -->
    <div class="modal fade" id="manageStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="manageStudent()" class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0 d-flex justify-content-between">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        <span v-if="this.formData.id === undefined"> Create </span>
                        <span v-if="this.formData.id !== undefined"> Edit </span>
                        student
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageStudentModalClose"></button>
                </div>
                <div class="modal-body border-0">

                    <div class="form-group">
                        <div class="d-flex justify-content-center align-items-center">
                            <label for="upload-image"
                                   class="form-label wpx-175 hpx-175 rounded-circle border d-flex justify-content-center align-items-center flex-column cursor-pointer">
                                <input id="upload-image" type="file" name="upload-image" class="form-control"
                                       hidden="hidden">
                                <span class="d-block">
                                    <i class="bi bi-cloud-arrow-down-fill fs-3"></i>
                                </span>
                                Click to upload image
                            </label>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="roll_or_id" class="form-label">Roll or Id</label>
                        <input id="roll_or_id" type="text" name="roll_or_id" class="form-control" v-model="formData.roll_or_id" autocomplete="new-roll-or-id">
                        <div class="error-report" v-if="error != null && error.roll_or_id !== undefined"> {{error.roll_or_id[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" v-model="formData.name" name="name" class="form-control"
                               autocomplete="new-name">
                        <div class="error-report" v-if="error != null && error.name !== undefined"> {{error.name[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" v-model="formData.email" name="email" class="form-control"
                               autocomplete="new-email">
                        <div class="error-report" v-if="error != null && error.email !== undefined"> {{error.email[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="courser_id" class="form-label">Select Enroll</label>
                        <select name="courser_id" id="courser_id" class="form-select" v-model="formData.course_id">
                            <option :value="0">Select Enroll Course</option>
                            <option v-for="each in courseDataList" :value="each.id"> {{ each.name }}</option>
                        </select>
                        <div class="error-report" v-if="error != null && error.course_id !== undefined"> {{error.course_id[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="phone-number" class="form-label">Phone number</label>
                        <input id="phone-number" type="text" v-model="formData.phone" name="phone"
                               class="form-control" autocomplete="new-phone-number">
                        <div class="error-report" v-if="error != null && error.phone !== undefined"> {{error.phone[0]}} </div>
                    </div>

                    <div class="form-group">
                        <label for="admission-date" class="form-label">Admission date</label>
                        <input id="admission-date" type="text" v-model="formData.admission_date" name="admission-date"
                               class="form-control" autocomplete="new-admission-date">
                        <div class="error-report" v-if="error != null && error.admission_date !== undefined"> {{error.admission_date[0]}} </div>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110 me-2" @click="manageStudentModalClose">
                        Close
                    </button>
                    <button type="submit" class="btn btn-theme wpx-110" v-if="!manageStudentLoading">
                        <span v-if="this.formData.id === undefined"> Save </span>
                        <span v-if="this.formData.id !== undefined"> Update </span>
                    </button>
                    <button type="button" class="btn btn-theme wpx-110" v-if="manageStudentLoading">
                        <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- delete student modal -->
    <div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="studentDelete()" class="modal-content rounded-3 border-0 py-2 px-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Delete student
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="deleteStudentModalClose"></button>
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
                                @click="deleteStudentModalClose">
                            Close
                        </button>
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn btn-theme rounded-3 w-100" v-if="!deleteStudentLoading">
                            Confirm
                        </button>
                        <button type="button" class="btn btn-theme rounded-3 w-100" v-if="deleteStudentLoading">
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
                { title: 'Students', route: 'students' },
            ],
            formData: {
                roll_or_id: '',
                name: '',
                email: '',
                course_id: '0',
                phone: '',
                admission_date: '',
            },
            courseDataList: [],
            loading: true,
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
            manageStudentLoading: false,
            error: null,
            deleteStudentLoading: false,
            buttons: [],
        }
    },
    mounted() {
        this.studentList();
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

        /* Function to student joining date */
        flatpickrConfigDate() {
            flatpickr("#admission-date", {
                altFormat: 'j M Y',
                altInput: true,
                minDate: "today",
                dateFormat: 'Y-m-d',
                disableMobile: true,
            })
        },

        /* Function to manage student modal open */
        manageStudentModalOpen(data = null) {
            this.getCourse();
            apiServices.clearErrorHandler()
            if(data !== null) {
                this.studentSingle(data);
            }else {
                this.formData = {
                    roll_or_id: '',
                    name: '',
                    email: '',
                    course_id: '0',
                    phone: '',
                    admission_date: '',
                }
            }
            const myModal = new bootstrap.Modal("#manageStudentModal", {keyboard: false});
            myModal.show();
        },

        /* Function to manage student modal close */
        manageStudentModalClose() {
            let myModalEl = document.getElementById('manageStudentModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to delete student modal open */
        deleteStudentModalOpen(id) {
            this.deleteProfessorParam.ids.push(id)
            const myModal = new bootstrap.Modal("#deleteStudentModal", {keyboard: false});
            myModal.show();
        },

        /* Function to delete student modal close */
        deleteStudentModalClose() {
            this.selected = [];
            this.current_page = 1;
            this.formData = {
                roll_or_id: '',
                name: '',
                email: '',
                course_id: '0',
                phone: '',
                admission_date: '',
            }
            let myModalEl = document.getElementById('deleteStudentModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to student list api */
        studentList() {
            this.loading = true;
            this.listData.page = this.current_page;
            apiServices.GET(apiRoutes.studentList, this.listData, (res) => {
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

        /* Function to student search data */
        SearchData() {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => {
                this.studentList();
            }, 800);
        },

        /* Function to student previous page */
        PrevPage() {
            if (this.current_page > 1) {
                this.current_page = this.current_page - 1;
                this.studentList()
            }
        },

        /* Function to student next page */
        NextPage() {
            if (this.current_page < this.total_pages) {
                this.current_page = this.current_page + 1;
                this.studentList()
            }
        },

        /* Function to student change page */
        pageChange(page) {
            this.current_page = page;
            this.studentList();
        },

        /* Function to student manage of create and update api */
        manageStudent() {
            if(this.formData.id === undefined) {
                this.studentCreate()
            }else {
                this.studentUpdate()
            }
        },

        /* Function to student create api */
        studentCreate() {
            this.manageStudentLoading = true;
            apiServices.POST(apiRoutes.studentCreate, this.formData, (res) => {
                this.manageStudentLoading = false;
                if(res.message) {
                    this.formData = {
                        roll_or_id: '',
                        name: '',
                        email: '',
                        course_id: '0',
                        phone: '',
                        admission_date: '',
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageStudentModalClose();
                    this.studentList();
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to student update api */
        studentUpdate() {
            this.manageStudentLoading = true;
            apiServices.PATCH(apiRoutes.studentUpdate, this.formData, (res) => {
                this.manageStudentLoading = false;
                if(res.message) {
                    this.formData = {
                        roll_or_id: '',
                        name: '',
                        email: '',
                        course_id: '0',
                        phone: '',
                        admission_date: '',
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageStudentModalClose();
                    this.studentList();
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to course single api */
        studentSingle(data) {
            apiServices.PUT(apiRoutes.studentSingle, { id: data }, (res) => {
                if (res.message) {
                    this.formData = res.data;
                } else {
                    this.error = res.errors;
                }
            });
        },

        /* Function to course delete api */
        studentDelete() {
            this.selected.forEach((v) => {
                this.deleteProfessorParam.ids.push(v);
            })
            this.deleteStudentLoading = true;
            apiServices.DELETE(apiRoutes.studentDelete, this.deleteProfessorParam, (res) => {
                this.deleteStudentLoading = false;
                if(res.message) {
                    this.deleteStudentModalClose();
                    this.studentList();
                    this.$toast.success(res.message, { position: "top-right" } );
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to get course api */
        getCourse(){
            apiServices.GET(apiRoutes.courseList, '', (res) => {
                if(res.message) {
                    this.courseDataList = res.data.data
                }else {
                    this.error = res.errors
                }
            })
        }

    }
}

</script>
