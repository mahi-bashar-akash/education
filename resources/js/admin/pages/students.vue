<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fs-5">
                <li class="breadcrumb-item">
                    <router-link :to="{name: 'students'}" class="text-decoration-none text-light-gray">
                        Students
                    </router-link>
                </li>
            </ol>
        </nav>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <router-link :to="{name: 'dashboard'}" class="text-decoration-none text-light-gray">
                        Dashboard
                    </router-link>
                </li>
                <li class="breadcrumb-item">
                    <router-link :to="{name: 'students'}" class="text-decoration-none text-light-gray">
                        Students
                    </router-link>
                </li>
            </ol>
        </nav>
    </div>

    <!-- search and new -->
    <div class="row justify-content-between">
        <div class="col-sm-6 col-xl-3 mb-3">
            <search/>
        </div>
        <div class="col-sm-6 col-xl-3 mb-3">
            <select name="event-type" class="form-select">
                <option value="select-option">Select visible data</option>
                <option value="10"> 10 </option>
                <option value="20"> 20 </option>
                <option value="30"> 30 </option>
                <option value="40"> 40 </option>
                <option value="50"> 50 </option>
            </select>
        </div>
        <div class="col-12 col-xl-6 mb-3 d-flex justify-content-end">
            <newBtn @click="manageStudentModalOpen" />
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
                :editModalFunction="manageStudentModalOpen"
                :deleteModalFunction="deleteStudentModalOpen"
            />

        </div>
    </div>

    <!-- preloader -->
    <preloader v-if="loading"/>

    <!-- no data -->
    <noDataFounded v-if="!loading && tableRows.length === 0" :newModalFunction="manageStudentModalOpen"/>

    <!-- pagination -->
    <pagination v-if="!loading && tableRows.length > 0"/>

    <!-- manage student modal -->
    <div class="modal fade" id="manageStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0 d-flex justify-content-between">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Create student
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageStudentModalClose"></button>
                </div>
                <div class="modal-body border-0">

                    <div class="form-group">
                        <div class="d-flex justify-content-center align-items-center">
                            <label for="upload-image" class="form-label wpx-175 hpx-175 rounded-circle border d-flex justify-content-center align-items-center flex-column cursor-pointer">
                                <input id="upload-image" type="file" name="upload-image" class="form-control" hidden="hidden">
                                <span class="d-block">
                                    <i class="bi bi-cloud-arrow-down-fill fs-3"></i>
                                </span>
                                Click to upload image
                            </label>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" v-model="formData.name" name="name" class="form-control" required autocomplete="new-name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" v-model="formData.email" name="email" class="form-control" required autocomplete="new-email">
                    </div>

                    <div class="form-group mb-3">
                        <label for="department" class="form-label">Select Enroll</label>
                        <select name="department" id="department" class="form-select">
                            <option :value="0">Select Enroll Course</option>
                            <option v-for="each in enrollCourseDataList" :value="each.id"> {{each.name}} </option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="phone-number" class="form-label">Phone number</label>
                        <input id="phone-number" type="text" v-model="formData.phoneNumber" name="phone-number" class="form-control" required autocomplete="new-phone-number">
                    </div>

                    <div class="form-group">
                        <label for="admission-date" class="form-label">Admission date</label>
                        <input id="admission-date" type="text" v-model="formData.joiningDate" name="admission-date" class="form-control" required autocomplete="new-admission-date">
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110 me-2" @click="manageStudentModalClose">
                        Close
                    </button>
                    <button type="button" class="btn btn-theme wpx-110">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- delete student modal -->
    <div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 border-0 py-2 px-3">
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
                        <button type="button" class="btn btn-secondary rounded-3 w-100" @click="deleteStudentModalClose">
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

export default {
    components: {
        search, preloader, noDataFounded, pagination, newBtn, tableContent
    },
    data() {
        return {
            tableHeaders: ['Checkbox', 'Admission date', 'Name', 'Roll or Id', 'Phone', 'Email', 'Enroll Course', 'Action'],
            tableRows: [
                { id: '1', admissionDate: '01, February, 2025', name: 'Mahi Bashar Akash', roll: '18191101025', phoneNumber: '01645820007', email: 'mahibashar2023@gmail.com', enrollCourse: 'Bachelor of Business Administration' },
            ],
            formData: {
                name: '',
                email: '',
                phoneNumber: '',
            },
            enrollCourseDataList: [
                { id: '1', name: 'Creative Graphic Design' },
                { id: '2', name: 'Frontend Web Developer' },
                { id: '3', name: 'Backend Web Developer' },
                { id: '4', name: 'Full Stack Web Developer' },
                { id: '5', name: 'Cyber Security' },
                { id: '6', name: 'Business Administration' },
                { id: '7', name: 'Digital Marketing' },
            ],
            studentDataList: [
                { id: '1', admissionDate: '01, February, 2025', name: 'Mahi Bashar Akash', roll: '18191101025', phoneNumber: '01645820007', email: 'mahibashar2023@gmail.com', enrollCourse: 'Bachelor of Business Administration' },
            ],
            loading: true,
        }
    },
    mounted() {
        setTimeout( () => {
            this.loading = false
        }, 2000)
        this.flatpickrConfigDate();
    },
    methods: {

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
        manageStudentModalOpen(){
            const myModal = new bootstrap.Modal("#manageStudentModal", { keyboard: false } );
            myModal.show();
        },

        /* Function to manage student modal close */
        manageStudentModalClose(){
            let myModalEl = document.getElementById('manageStudentModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to delete student modal open */
        deleteStudentModalOpen(){
            const myModal = new bootstrap.Modal("#deleteStudentModal", { keyboard: false } );
            myModal.show();
        },

        /* Function to delete student modal close */
        deleteStudentModalClose(){
            let myModalEl = document.getElementById('deleteStudentModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

    }
}

</script>
