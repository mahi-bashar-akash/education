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
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
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
            <div class="shadow">
                <select name="event-type" class="form-select">
                    <option value="select-option">Select visible data</option>
                    <option value="10"> 10 </option>
                    <option value="20"> 20 </option>
                    <option value="30"> 30 </option>
                    <option value="40"> 40 </option>
                    <option value="50"> 50 </option>
                </select>
            </div>
        </div>
        <div class="col-12 col-xl-6 mb-3 d-flex justify-content-end">
            <button type="button" class="btn btn-theme rounded-0 wpx-90 hpx-36 d-flex align-items-center justify-content-center border-0" @click="manageDepartmentModalOpen">
                New
            </button>
        </div>
    </div>

    <!-- desktop and laptop screen list -->
    <div class="card rounded-0 border-0 d-none d-xl-block shadow">
        <div class="card-body card-list scrollbar">
            <table class="table">
                <thead>
                <tr>
                    <th class="checkbox">
                        <input type="checkbox" class="form-check-input">
                    </th>
                    <th class="default-width">
                        Name.
                    </th>
                    <th class="default-width">
                        Head of department.
                    </th>
                    <th class="default-width">
                        Phone.
                    </th>
                    <th class="default-width">
                        Email.
                    </th>
                    <th class="default-width">
                        Starting year.
                    </th>
                    <th class="default-width">
                        Stuff Capacity
                    </th>
                    <th class="action">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="each in [1,2,3,4,5,6,7,8,9,10]">
                    <td class="checkbox">
                        <input type="checkbox" class="form-check-input">
                    </td>
                    <td class="default-width">
                        Accounting
                    </td>
                    <td class="default-width">
                        Head of accounting department.
                    </td>
                    <td class="default-width">
                        0123456789
                    </td>
                    <td class="default-width">
                        accounting@gmail.com
                    </td>
                    <td class="default-width">
                        2023
                    </td>
                    <td class="default-width">
                        21
                    </td>
                    <td class="action">
                        <div class="dropdown">
                            <button type="button" class="btn border-0 p-0 btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end p-0 mt-1 overflow-hidden">
                                <li>
                                    <a href="javascript:void(0)" class="dropdown-item" @click="manageDepartmentModalOpen">
                                        Edit
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="dropdown-item" @click="deleteDepartmentModalOpen">
                                        Delete
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- tablet and mobile screen list -->
    <div class="card rounded-0 border-0 d-xl-none shadow">
        <div class="card-body card-list scrollbar">
            <div class="px-2">

                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">

                    <!-- card -->
                    <div class="p-2" v-for="each in [1,2,3]">
                        <div class="card p-0 border border">
                            <div class="card-header py-2 px-2 bg-secondary-subtle border-0">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <div class="p-1 text-theme fw-semibold">
                                            <div class="truncate-to-1-line">
                                                Department Name
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
                                                    <a href="javascript:void(0)" class="dropdown-item" @click="manageDepartmentModalOpen">
                                                        Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="dropdown-item" @click="deleteDepartmentModalOpen">
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-0 p-0">
                                <div class="hpx-150 d-flex justify-content-center align-items-center text-light-gray border-bottom">
                                    Department Image
                                </div>
                                <div class="mb-2 text-light-gray pt-3 pb-2 px-3">
                                    Department Head
                                </div>
                                <div class="text-secondary text-opacity-75 pb-3 px-3">
                                    Phone Number: 01239823757
                                </div>
                                <div class="text-light-gray pb-3 px-3">
                                    Email: department@gmail.com
                                </div>
                                <div class="text-secondary text-opacity-75 pb-3 px-3">
                                    Starting year: 1999
                                </div>
                                <div class="text-light-gray pb-3 px-3">
                                    Stuff capacity: 21
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

    <!-- manage department modal -->
    <div class="modal fade" id="manageDepartmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content px-3 py-2 rounded-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Create department
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageDepartmentModalClose"></button>
                </div>
                <div class="modal-body border-0">

                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" v-model="formData.name" name="name" class="form-control" required autocomplete="new-name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="head-of-department" class="form-label">Head Of Department</label>
                        <input id="head-of-department" type="text" v-model="formData.headerOfDepartment" name="head-of-department" class="form-control" required autocomplete="new-head-of-department">
                    </div>

                    <div class="form-group mb-3">
                        <label for="start-date" class="form-label"> Start date </label>
                        <input id="start-date" type="text" name="start-date" v-model="formData.startDate" class="form-control" required autocomplete="new-start-date">
                    </div>

                    <div class="form-group mb-3">
                        <label for="stuff-capacity" class="form-label"> Stuff capacity </label>
                        <input id="stuff-capacity" type="text" name="stuff-capacity" v-model="formData.stuffCapacity" class="form-control" required autocomplete="new-stuff-capacity">
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label"> Email </label>
                        <input id="email" type="email" name="email" v-model="formData.email" class="form-control" required autocomplete="new-email">
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
                    <button type="button" class="btn btn-secondary rounded-0 wpx-110" @click="manageDepartmentModalClose">
                        Close
                    </button>
                    <button type="button" class="btn btn-theme rounded-0 wpx-110">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- delete department modal -->
    <div class="modal fade" id="deleteDepartmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0 py-2 px-3">
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
                        <button type="button" class="btn btn-secondary rounded-0 w-100" @click="deleteDepartmentModalClose">
                            Close
                        </button>
                    </div>
                    <div class="col-5">
                        <button type="button" class="btn btn-theme rounded-0 w-100">
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
import flatpickr from "flatpickr";

export default {
    components: {
        search, preloader, noDataFounded, pagination
    },
    data() {
        return {
            formData: {
                name: '',
                email: '',
                startDate: '',
                stuffCapacity: '',
                phoneNumber: '',
                headerOfDepartment: '',
                description: '',
            }
        }
    },
    mounted() {
        this.flatpickrConfigDate();
    },
    methods: {

        /* Function to manage department modal open */
        manageDepartmentModalOpen(){
            const myModal = new bootstrap.Modal("#manageDepartmentModal", { keyboard: false } );
            myModal.show();
        },

        /* Function to manage department modal close */
        manageDepartmentModalClose(){
            let myModalEl = document.getElementById('manageDepartmentModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to delete department modal open */
        deleteDepartmentModalOpen(){
            const myModal = new bootstrap.Modal("#deleteDepartmentModal", { keyboard: false } );
            myModal.show();
        },

        /* Function to delete department modal close */
        deleteDepartmentModalClose(){
            let myModalEl = document.getElementById('deleteDepartmentModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to event-date */
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
