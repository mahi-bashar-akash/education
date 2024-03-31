<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fs-5">
                <li class="breadcrumb-item">
                    <router-link :to="{name: 'stuff'}" class="text-decoration-none text-light-gray">
                        Stuff
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
                    <router-link :to="{name: 'stuff'}" class="text-decoration-none text-light-gray">
                        Stuff
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
            <newBtn @click="manageStuffModalOpen" />
        </div>
    </div>

    <!-- desktop and laptop screen list -->
    <div class="card rounded-3 border-0 d-none d-xl-block shadow">
        <div class="card-body card-list scrollbar">

            <tableContent
                :headers="tableHeaders"
                :rows="tableRows"
                tableClass="table"
                :headerClasses="['checkbox', 'default-width', 'default-width', 'default-width', 'default-width', 'default-width', 'default-width', 'action']"
                :columnClasses="{ checkbox: 'checkbox', action: 'action' }"
                :checkboxColumnIndex="0"
                :editModalFunction="manageStuffModalOpen"
                :deleteModalFunction="deleteStuffModalOpen"
            />

        </div>
    </div>

    <!-- tablet and mobile screen list -->
    <div class="card rounded-3 border-0 d-xl-none shadow">
        <div class="card-body card-list scrollbar">
            <div class="px-2">

                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">

                    <!-- card -->
                    <div class="p-2" v-for="each in stuffDataList">
                        <div class="card p-0 rounded-0 border">
                            <div class="card-header rounded-0 py-2 px-2 bg-secondary-subtle border-0">
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
                                            <ul class="dropdown-menu dropdown-menu-end p-0 mt-1 overflow-hidden">
                                                <li>
                                                    <button type="button" class="dropdown-item" @click="manageStuffModalOpen(each.id)">
                                                        Edit
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item" @click="deleteStuffModalOpen(each.id)">
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
                                    Stuff Image {{each.id}}
                                </div>
                                <div class="mb-3 text-secondary text-opacity-75 pt-3 px-3">
                                    Designation: {{each.designation}}
                                </div>
                                <div class="text-light-gray pb-3 px-3">
                                    Phone Number: {{each.phoneNumber}}
                                </div>
                                <div class="text-secondary text-opacity-75 pb-3 px-3">
                                    Email: {{each.email}}
                                </div>
                                <div class="text-light-gray pb-3 px-3">
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
    <preloader/>

    <!-- no data -->
    <noDataFounded/>

    <!-- pagination -->
    <pagination/>

    <!-- manage stuff modal -->
    <div class="modal fade" id="manageStuffModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Create stuff
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageStuffModalClose"></button>
                </div>
                <div class="modal-body border-0">

                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" v-model="formData.name" name="name" class="form-control" required autocomplete="new-name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label"> Email </label>
                        <input id="email" type="email" name="email" v-model="formData.email" class="form-control" required autocomplete="new-email">
                    </div>

                    <div class="form-group mb-3">
                        <label for="joining-date" class="form-label">Joining Date</label>
                        <input id="joining-date" type="text" v-model="formData.joiningDate" name="join-date" class="form-control" required autocomplete="new-joining-date">
                    </div>

                    <div class="form-group mb-3">
                        <label for="department" class="form-label">department</label>
                        <select name="department" id="department" class="form-select" v-model="formData.department">
                            <option :value="0">Select department option</option>
                            <option v-for="each in departmentDataList" :value="each.id"> {{each.name}} </option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="phone-number" class="form-label"> Phone number </label>
                        <input id="phone-number" type="text" name="phone-number" v-model="formData.phoneNumber" class="form-control" required autocomplete="new-phone-number">
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-textarea" v-model="formData.description" cols="30" rows="5" required autocomplete="new-description"></textarea>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary rounded-3 wpx-110" @click="manageStuffModalClose">
                        Close
                    </button>
                    <button type="button" class="btn btn-theme rounded-3 wpx-110">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- delete stuff modal -->
    <div class="modal fade" id="deleteStuffModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 border-0 py-2 px-3">
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
                        <button type="button" class="btn btn-secondary rounded-3 w-100" @click="deleteStuffModalClose">
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
            tableHeaders: ['Checkbox', 'Name', 'Designation', 'Phone', 'Email', 'Joining Date', 'Action'],
            tableRows: [
                { id: '1', name: 'Bajirau Singham', description: 'Police Officer', phoneNumber: '01400125289', email: 'accounting@gmail.com', joiningDate: '01, January, 2025' },
            ],
            formData: {
                name: '',
                email: '',
                joiningDate: '',
                department: '',
                phoneNumber: '',
                description: '',
            },

            departmentDataList: [
                { id: '1', name: 'accounting' },
                { id: '2', name: 'finance' },
                { id: '3', name: 'marketing' },
                { id: '4', name: 'management' },
                { id: '5', name: 'economic' },
                { id: '6', name: 'statistic' },
                { id: '7', name: 'computer application' },
                { id: '8', name: 'Human resource management' },
            ],
            stuffDataList: [
                { id: '1', name: 'Bajirau Singham', designation: 'Police Officer', phoneNumber: '991', email: 'singham@gmail.com', joiningDate: '01, January, 2025' },
            ],
        }
    },
    mounted() {
        this.flatpickrConfigDate();
    },
    methods: {

        /* Function to manage stuff modal open */
        manageStuffModalOpen(){
            const myModal = new bootstrap.Modal("#manageStuffModal", { keyboard: false } );
            myModal.show();
        },

        /* Function to manage stuff modal close */
        manageStuffModalClose(){
            let myModalEl = document.getElementById('manageStuffModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to delete stuff modal open */
        deleteStuffModalOpen(){
            const myModal = new bootstrap.Modal("#deleteStuffModal", { keyboard: false } );
            myModal.show();
        },

        /* Function to delete stuff modal close */
        deleteStuffModalClose(){
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

    }
}

</script>
