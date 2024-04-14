<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <breadcrumb :items="BreadcrumbItems" moduleName="Professors"/>
    </div>

    <!-- search and new -->
    <div class="row justify-content-between">
        <div class="col-sm-6 col-xl-3 mb-3">
            <search/>
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
            <newBtn @click="manageProfessorModalOpen"/>
        </div>
    </div>


    <div class="card rounded-3 border-0 shadow" v-if="!loading && tableRows.length > 0">
        <div class="card-body card-list scrollbar">

            <tableContent
                :headers="tableHeaders"
                :rows="tableRows"
                tableClass="table"
                :headerClasses="['checkbox', 'default-width', 'default-width', 'default-width', 'default-width', 'default-width', 'default-width', 'action']"
                :columnClasses="{ checkbox: 'checkbox', action: 'action' }"
                :checkboxColumnIndex="0"
                :editModalFunction="manageProfessorModalOpen"
                :deleteModalFunction="deleteProfessorModalOpen"
            />

        </div>
    </div>

    <!-- preloader -->
    <preloader v-if="loading"/>

    <!-- no data -->
    <noDataFounded :text="'professor'" :newModalFunction="manageProfessorModalOpen" v-if="!loading && tableRows.length === 0"/>

    <!-- pagination -->
    <pagination v-if="!loading && tableRows.length > 0"/>

    <!-- manage professor modal -->
    <div class="modal fade" id="manageProfessorModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0 d-flex justify-content-between">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Create Professor
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageProfessorModalClose"></button>
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
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" v-model="formData.name" name="name" class="form-control" required
                               autocomplete="new-name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" v-model="formData.email" name="email" class="form-control"
                               required autocomplete="new-email">
                    </div>

                    <div class="form-group mb-3">
                        <label for="education" class="form-label">Education</label>
                        <input id="education" type="text" v-model="formData.education" name="education"
                               class="form-control" required autocomplete="new-education">
                    </div>

                    <div class="form-group mb-3">
                        <label for="department" class="form-label">Select Department</label>
                        <select name="department" id="department" class="form-select">
                            <option v-for="each in departmentListData" :value="each.id"> {{ each.name }}</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="phone-number" class="form-label">Phone number</label>
                        <input id="phone-number" type="text" v-model="formData.phoneNumber" name="phone-number"
                               class="form-control" required autocomplete="new-phone-number">
                    </div>

                    <div class="form-group">
                        <label for="joining-date" class="form-label">Joining date</label>
                        <input id="joining-date" type="text" v-model="formData.joiningDate" name="joining-date"
                               class="form-control" required autocomplete="new-joining-date">
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110 me-2" @click="manageProfessorModalClose">
                        Close
                    </button>
                    <button type="button" class="btn btn-theme wpx-110">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- delete professor modal -->
    <div class="modal fade" id="deleteProfessorModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 border-0 py-2 px-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Delete professor
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="deleteProfessorModalClose"></button>
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
                                @click="deleteProfessorModalClose">
                            Close
                        </button>
                    </div>
                    <div class="col-5">
                        <button type="button" class="btn btn-theme rounded-3 w-100">
                            Confirm
                        </button>
                    </div>
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
import flatpickr from "flatpickr";
import tableContent from "../components/table.vue";
import breadcrumb from "../components/breadcrumb.vue";

export default {
    components: {
        search, preloader, noDataFounded, pagination, newBtn, tableContent, breadcrumb
    },
    data() {
        return {
            BreadcrumbItems: [
                { title: 'Dashboard', route: 'dashboard' },
                { title: 'Professors', route: 'professors' },
            ],
            tableHeaders: ['Checkbox', 'Name', 'Department', 'Education', 'Email', 'Phone', 'Joining date', 'Action'],
            tableRows: [
                {
                    id: '1',
                    name: 'Alpha',
                    education: 'BBA',
                    department: 'Accounting',
                    email: 'mahibashar2023@gmail.com',
                    phoneNumber: '01400125289',
                    joiningDate: '01, January, 2025'
                },
            ],
            formData: {
                name: '',
                email: '',
                phoneNumber: '',
                joiningDate: '',
                education: '',
            },
            departmentListData: [
                {id: '1', name: 'accounting'},
                {id: '2', name: 'finance'},
                {id: '3', name: 'marketing'},
                {id: '4', name: 'management'},
                {id: '5', name: 'economic'},
                {id: '6', name: 'statistic'},
                {id: '7', name: 'computer application'},
                {id: '8', name: 'Human resource management'},
            ],
            professorDataList: [
                {
                    id: '1',
                    name: 'Mahi Bashar Akash',
                    education: 'BBA, MBA',
                    department: 'Accounting',
                    email: 'mahibashar2023@gmail.com',
                    phoneNumber: '01400125289',
                    joiningDate: '01, January, 2025'
                }
            ],
            loading: true,
        }
    },
    mounted() {
        setTimeout(() => {
            this.loading = false
        }, 2000)
        this.flatpickrConfigDate();
    },
    methods: {

        /* Function to manage professor modal open */
        manageProfessorModalOpen() {
            const myModal = new bootstrap.Modal("#manageProfessorModal", {keyboard: false});
            myModal.show();
        },

        /* Function to manage professor modal close */
        manageProfessorModalClose() {
            let myModalEl = document.getElementById('manageProfessorModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to delete professor modal open */
        deleteProfessorModalOpen() {
            const myModal = new bootstrap.Modal("#deleteProfessorModal", {keyboard: false});
            myModal.show();
        },

        /* Function to delete professor modal close */
        deleteProfessorModalClose() {
            let myModalEl = document.getElementById('deleteProfessorModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to professor joining date */
        flatpickrConfigDate() {
            flatpickr("#joining-date", {
                altFormat: 'j M Y',
                altInput: true,
                minDate: "today",
                dateFormat: 'Y-m-d',
                disableMobile: true,
            })
        },

    }
}

</script>
