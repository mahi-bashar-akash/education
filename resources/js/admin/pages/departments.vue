<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fs-5">
                <li class="breadcrumb-item">
                    <router-link :to="{name: 'departments'}" class="text-decoration-none text-light-gray">
                        Departments
                    </router-link>
                </li>
            </ol>
        </nav>
        <nav
            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <router-link :to="{name: 'dashboard'}" class="text-decoration-none text-light-gray">
                        Dashboard
                    </router-link>
                </li>
                <li class="breadcrumb-item">
                    <router-link :to="{name: 'departments'}" class="text-decoration-none text-light-gray">
                        Departments
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
                <option value="10"> 10</option>
                <option value="20"> 20</option>
                <option value="30"> 30</option>
                <option value="40"> 40</option>
                <option value="50"> 50</option>
            </select>
        </div>
        <div class="col-12 col-xl-6 mb-3 d-flex justify-content-end">
            <newBtn @click="manageDepartmentModalOpen"/>
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
                :editModalFunction="manageDepartmentModalOpen"
                :deleteModalFunction="deleteDepartmentModalOpen"
            />

        </div>
    </div>

    <!-- preloader -->
    <preloader v-if="loading"/>

    <!-- no data -->
    <noDataFounded v-if="!loading && tableRows.length === 0" :newModalFunction="manageDepartmentModalOpen"/>

    <!-- pagination -->
    <pagination v-if="!loading && tableRows.length > 0"/>

    <!-- manage department modal -->
    <div class="modal fade" id="manageDepartmentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Create department
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageDepartmentModalClose"></button>
                </div>
                <div class="modal-body border-0">

                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" v-model="formData.name" name="name" class="form-control" required
                               autocomplete="new-name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="head-of-department" class="form-label">Head Of Department</label>
                        <input id="head-of-department" type="text" v-model="formData.headOfDepartment"
                               name="head-of-department" class="form-control" required
                               autocomplete="new-head-of-department">
                    </div>

                    <div class="form-group mb-3">
                        <label for="start-date" class="form-label"> Start date </label>
                        <input id="start-date" type="text" name="start-date" v-model="formData.startDate"
                               class="form-control" required autocomplete="new-start-date">
                    </div>

                    <div class="form-group mb-3">
                        <label for="stuff-capacity" class="form-label"> Stuff capacity </label>
                        <input id="stuff-capacity" type="text" name="stuff-capacity" v-model="formData.stuffCapacity"
                               class="form-control" required autocomplete="new-stuff-capacity">
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label"> Email </label>
                        <input id="email" type="email" name="email" v-model="formData.email" class="form-control"
                               required autocomplete="new-email">
                    </div>

                    <div class="form-group mb-3">
                        <label for="phone-number" class="form-label"> Phone number </label>
                        <input id="phone-number" type="text" name="phone-number" v-model="formData.phoneNumber"
                               class="form-control" required autocomplete="new-phone-number">
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-textarea"
                                  v-model="formData.description" cols="30" rows="5" required
                                  autocomplete="new-description"></textarea>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110" @click="manageDepartmentModalClose">
                        Close
                    </button>
                    <button type="button" class="btn btn-theme wpx-110">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- delete department modal -->
    <div class="modal fade" id="deleteDepartmentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 border-0 py-2 px-3">
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
                        <button type="button" class="btn btn-theme w-100">
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
            tableHeaders: ['Checkbox', 'Name', 'Head of department', 'Phone', 'Email', 'Starting year', 'Stuff Capacity', 'Action'],
            tableRows: [
                {
                    id: '1',
                    name: 'Accounting',
                    headOfDepartment: 'Mahi Bashar Akash',
                    phoneNumber: '01400125289',
                    email: 'accounting@gmail.com',
                    startDate: '01, January, 2025',
                    stuffCapacity: '21'
                },
            ],
            formData: {
                name: '',
                email: '',
                startDate: '',
                stuffCapacity: '',
                phoneNumber: '',
                headOfDepartment: '',
                description: '',
            },
            departmentDateList: [
                {
                    id: '1',
                    name: 'Accounting',
                    email: 'accounting@gmail.com',
                    startDate: '01, January, 2025',
                    stuffCapacity: '21',
                    phoneNumber: '01400125289',
                    headOfDepartment: 'Mahi Bashar Akash',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias corporis ipsum iure laborum sunt veritatis?'
                },
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

        /* Function to manage department modal open */
        manageDepartmentModalOpen() {
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
        deleteDepartmentModalOpen() {
            const myModal = new bootstrap.Modal("#deleteDepartmentModal", {keyboard: false});
            myModal.show();
        },

        /* Function to delete department modal close */
        deleteDepartmentModalClose() {
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

    }
}

</script>
