<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fs-5">
                <li class="breadcrumb-item">
                    <router-link :to="{name: 'fees'}" class="text-decoration-none text-light-gray">
                        Fees
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
                    <router-link :to="{name: 'fees'}" class="text-decoration-none text-light-gray">
                        Fees
                    </router-link>
                </li>
            </ol>
        </nav>
    </div>

    <!-- fees search and new -->
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
            <button type="button" class="btn btn-theme rounded-0 wpx-90 hpx-36 d-flex align-items-center justify-content-center border-0" @click="manageFeesModalOpen">
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
                        Roll or Id.
                    </th>
                    <th class="default-width">
                        Fees Type.
                    </th>
                    <th class="default-width">
                        Status.
                    </th>
                    <th class="default-width">
                        Date.
                    </th>
                    <th class="default-width">
                        Amount
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
                        <div class="truncate-to-1-line">
                            <div class="d-flex align-items-center">
                                <img :src="`https://ui-avatars.com/api/?font-size=0.35&name=Student+Name`" class="face" alt="avatar"> <div class="ms-2"> Student name </div>
                            </div>
                        </div>
                    </td>
                    <td class="default-width">
                        18191101025
                    </td>
                    <td class="default-width">
                        Annual
                    </td>
                    <td class="default-width">
                        Paid
                    </td>
                    <td class="default-width">
                        02, february, 2025
                    </td>
                    <td class="default-width">
                        5000 TK
                    </td>
                    <td class="action">
                        <div class="dropdown">
                            <button type="button" class="btn border-0 p-0 btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end p-0 mt-1 overflow-hidden">
                                <li>
                                    <button type="button" class="dropdown-item" @click="manageFeesModalOpen">
                                        Edit
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item" @click="deleteFeesModalOpen">
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

    <!-- tablet and mobile screen list -->
    <div class="card rounded-0 border-0 d-xl-none shadow">
        <div class="card-body card-list scrollbar">
            <div class="px-2">

                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">

                    <!-- card -->
                    <div class="p-2" v-for="each in [1,2,3]">
                        <div class="card p-0 rounded-0 border">
                            <div class="card-header rounded-0 py-2 px-2 bg-secondary-subtle border-0">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <div class="p-1 text-theme fw-semibold">
                                            <div class="truncate-to-1-line">
                                                Student Name
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
                                                    <button type="button" class="dropdown-item" @click="manageFeesModalOpen">
                                                        Edit
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item" @click="deleteFeesModalOpen">
                                                        Delete
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-0 p-0">
                                <div class="mb-2 text-light-gray pt-3 pb-2 px-3">
                                    Id: 18191101025
                                </div>
                                <div class="text-secondary text-opacity-75 pb-3 px-3">
                                    Fees type: Annual
                                </div>
                                <div class="text-light-gray pb-3 px-3">
                                    Payment Type: cash
                                </div>
                                <div class="text-secondary text-opacity-75 pb-3 px-3">
                                    Status: pending
                                </div>
                                <div class="text-light-gray pb-3 px-3">
                                    Date: 01, january, 2024
                                </div>
                                <div class="text-secondary text-opacity-75 pb-3 px-3">
                                    Amount: 12000 TK
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

    <!-- manage fees modal -->
    <div class="modal fade" id="manageFeesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content px-3 py-2 rounded-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Create fees
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageFeesModalClose"></button>
                </div>
                <div class="modal-body border-0">

                    <div class="form-group mb-3">
                        <label for="department" class="form-label">Select Student</label>
                        <select name="department" id="department" class="form-select" required autocomplete="new-select-student" v-model="formData.department">
                            <option :value="0">Select student option</option>
                            <option v-for="each in studentDataList" :value="each.id"> {{each.name}} </option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="fees-type" class="form-label">Select Fees type</label>
                        <select name="fees-type" id="fees-type" class="form-select" required autocomplete="new-select-fees-type" v-model="formData.feesType">
                            <option :value="0">Select fees type</option>
                            <option v-for="each in feesTypeDataList" :value="each.id"> {{each.name}} </option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="fees-amount" class="form-label">Fees amount</label>
                        <input id="fees-amount" type="text" name="fees-amount" class="form-control" required autocomplete="new-fees-amount" v-model="formData.feesAmount">
                    </div>

                    <div class="form-group mb-3">
                        <label for="payment-type" class="form-label">Payment type</label>
                        <select name="payment-type" id="payment-type" class="form-select" required autocomplete="new-payment-type" v-model="formData.paymentType">
                            <option :value="0">Select payment type</option>
                            <option v-for="each in paymentTypeList" :value="each.id"> {{each.name}} </option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="payment-status" class="form-label">Payment status</label>
                        <select name="payment-status" id="payment-status" class="form-select" required autocomplete="new-payment-status" v-model="formData.paymentStatus">
                            <option :value="0">Select payment status</option>
                            <option v-for="each in paymentStatusList" :value="each.id"> {{each.name}} </option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary rounded-0 wpx-110" @click="manageFeesModalClose">
                        Close
                    </button>
                    <button type="button" class="btn btn-theme rounded-0 wpx-110">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- delete fees modal -->
    <div class="modal fade" id="deleteFeesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0 py-2 px-3">
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
                        <button type="button" class="btn btn-secondary rounded-0 w-100" @click="deleteFeesModalClose">
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

export default {
    components: {
        search, preloader, noDataFounded, pagination
    },
    data() {
        return {
            studentDataList: [
                { id: '1', name: 'John Smith', roll: '18191101025' },
                { id: '2', name: 'Denny Wilson', roll: '18191101026' },
                { id: '3', name: 'Denial Furies', roll: '18191101027' },
                { id: '4', name: 'Fas and Furious', roll: '18191101028' },
                { id: '5', name: 'Sansi Monsi', roll: '18191101029' },
            ],
            feesTypeDataList: [
                { id: '1', name: 'Annual' },
                { id: '2', name: 'Exam' },
                { id: '3', name: 'Other' },
            ],
            paymentTypeList: [
                { id: '1', name: 'Cash' },
                { id: '2', name: 'Cheque' },
                { id: '3', name: 'Other' },
            ],
            paymentStatusList: [
                { id: '1', name: 'Paid' },
                { id: '2', name: 'Unpaid' },
                { id: '3', name: 'Pending' },
            ],
            formData: {
                department: '0',
                feesType: '0',
                feesAmount: '',
                paymentType: '0',
                paymentStatus: '0',
            }
        }
    },
    mounted() {  },
    methods: {

        /* Function to manage fees modal open */
        manageFeesModalOpen(){
            const myModal = new bootstrap.Modal("#manageFeesModal", { keyboard: false } );
            myModal.show();
        },

        /* Function to manage fees modal close */
        manageFeesModalClose(){
            let myModalEl = document.getElementById('manageFeesModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to delete fees modal open */
        deleteFeesModalOpen(){
            const myModal = new bootstrap.Modal("#deleteFeesModal", { keyboard: false } );
            myModal.show();
        },

        /* Function to delete fees modal close */
        deleteFeesModalClose(){
            let myModalEl = document.getElementById('deleteFeesModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

    }
}

</script>
