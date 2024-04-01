<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fs-5">
                <li class="breadcrumb-item">
                    <router-link :to="{name: 'professors'}" class="text-decoration-none text-light-gray">
                        Professors
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
                    <router-link :to="{name: 'professors'}" class="text-decoration-none text-light-gray">
                        Professors
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
            <newBtn @click="manageProfessorModalOpen" />
        </div>
    </div>


    <div class="card rounded-3 border-0 shadow" v-if="!loading && tableRows.length > 0">
        <div class="card-body card-list scrollbar">

            <!-- desktop and laptop screen list -->
            <div class="d-none d-xl-block">
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

            <!-- tablet and mobile screen list -->
            <div class="px-2 d-xl-none">

                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">

                    <!-- card -->
                    <div class="p-2" v-for="each in professorDataList">
                        <div class="card p-0 rounded-3 border">
                            <div class="card-header rounded-3 py-2 px-2 bg-secondary-subtle border-0">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <div class="p-1 text-theme fw-semibold">
                                            <div class="truncate-to-1-line">
                                                {{each.name}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <div class="dropdown">
                                            <button type="button" class="btn border-0 p-0 btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end p-0 mt-1 overflow-hidden rounded-3 border">
                                                <li>
                                                    <button type="button" class="dropdown-item" @click="manageProfessorModalOpen">
                                                        Edit
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item" @click="deleteProfessorModalOpen">
                                                        Delete
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-0 p-0">
                                <div class="hpx-150 d-flex justify-content-center align-items-center text-light-gray border-bottom">
                                    Professor image {{each.id}}
                                </div>
                                <div class="mb-2 text-light-gray pt-2 px-3">
                                    Department name: {{each.department}}
                                </div>
                                <div class="mb-2 text-secondary text-opacity-75 pt-2 px-3">
                                    Education: {{each.education}}
                                </div>
                                <div class="mb-2 text-light-gray pt-2 px-3">
                                    Phone Number: {{each.phoneNumber}}
                                </div>
                                <div class="mb-2 text-secondary text-opacity-75 pt-2 px-3">
                                    Email: {{each.email}}
                                </div>
                                <div class="mb-2 text-light-gray pt-2 px-3">
                                    Joining Date: {{each.joiningDate}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- preloader -->
    <preloader v-if="loading"/>

    <!-- no data -->
    <noDataFounded v-if="!loading && tableRows.length === 0"/>

    <!-- pagination -->
    <pagination v-if="!loading && tableRows.length > 0"/>

    <!-- manage professor modal -->
    <div class="modal fade" id="manageProfessorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="education" class="form-label">Education</label>
                        <input id="education" type="text" v-model="formData.education" name="education" class="form-control" required autocomplete="new-education">
                    </div>

                    <div class="form-group mb-3">
                        <label for="department" class="form-label">Select Department</label>
                        <select name="department" id="department" class="form-select">
                            <option v-for="each in departmentListData" :value="each.id"> {{each.name}} </option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="phone-number" class="form-label">Phone number</label>
                        <input id="phone-number" type="text" v-model="formData.phoneNumber" name="phone-number" class="form-control" required autocomplete="new-phone-number">
                    </div>

                    <div class="form-group">
                        <label for="joining-date" class="form-label">Joining date</label>
                        <input id="joining-date" type="text" v-model="formData.joiningDate" name="joining-date" class="form-control" required autocomplete="new-joining-date">
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
    <div class="modal fade" id="deleteProfessorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <button type="button" class="btn btn-secondary rounded-3 w-100" @click="deleteProfessorModalClose">
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
            tableHeaders: ['Checkbox', 'Name', 'Department', 'Education', 'Email', 'Phone', 'Joining date', 'Action'],
            tableRows: [
                { id: '1', name: 'Alpha', education: 'BBA', department: 'Accounting', email: 'mahibashar2023@gmail.com', phoneNumber: '01400125289', joiningDate: '01, January, 2025' },
            ],
            formData: {
                name: '',
                email: '',
                phoneNumber: '',
                joiningDate: '',
                education: '',
            },
            departmentListData: [
                { id: '1', name: 'accounting' },
                { id: '2', name: 'finance' },
                { id: '3', name: 'marketing' },
                { id: '4', name: 'management' },
                { id: '5', name: 'economic' },
                { id: '6', name: 'statistic' },
                { id: '7', name: 'computer application' },
                { id: '8', name: 'Human resource management' },
            ],
            professorDataList: [
                { id: '1', name: 'Mahi Bashar Akash', education: 'BBA, MBA', department: 'Accounting', email: 'mahibashar2023@gmail.com', phoneNumber: '01400125289', joiningDate: '01, January, 2025' }
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

        /* Function to manage professor modal open */
        manageProfessorModalOpen(){
            const myModal = new bootstrap.Modal("#manageProfessorModal", { keyboard: false } );
            myModal.show();
        },

        /* Function to manage professor modal close */
        manageProfessorModalClose(){
            let myModalEl = document.getElementById('manageProfessorModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to delete professor modal open */
        deleteProfessorModalOpen(){
            const myModal = new bootstrap.Modal("#deleteProfessorModal", { keyboard: false } );
            myModal.show();
        },

        /* Function to delete professor modal close */
        deleteProfessorModalClose(){
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
