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
            <newBtn @click="manageFeesModalOpen"/>
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
                :editModalFunction="manageFeesModalOpen"
                :deleteModalFunction="deleteFeesModalOpen"
            />

        </div>
    </div>

    <!-- preloader -->
    <preloader v-if="loading"/>

    <!-- no data -->
    <noDataFounded v-if="!loading && tableRows.length === 0" :newModalFunction="manageFeesModalOpen"/>

    <!-- pagination -->
    <pagination v-if="!loading && tableRows.length > 0"/>

    <!-- manage fees modal -->
    <div class="modal fade" id="manageFeesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Create fees
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageFeesModalClose"></button>
                </div>
                <div class="modal-body border-0">

                    <div class="form-group mb-3">
                        <label for="department" class="form-label">Select Student</label>
                        <select name="department" id="department" class="form-select" required
                                autocomplete="new-select-student" v-model="formData.department">
                            <option :value="0">Select student option</option>
                            <option v-for="each in studentDataList" :value="each.id"> {{ each.name }}</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="fees-type" class="form-label">Select Fees type</label>
                        <select name="fees-type" id="fees-type" class="form-select" required
                                autocomplete="new-select-fees-type" v-model="formData.feesType">
                            <option :value="0">Select fees type</option>
                            <option v-for="each in feesTypeDataList" :value="each.id"> {{ each.name }}</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="fees-amount" class="form-label">Fees amount</label>
                        <input id="fees-amount" type="text" name="fees-amount" class="form-control" required
                               autocomplete="new-fees-amount" v-model="formData.feesAmount">
                    </div>

                    <div class="form-group mb-3">
                        <label for="payment-type" class="form-label">Payment type</label>
                        <select name="payment-type" id="payment-type" class="form-select" required
                                autocomplete="new-payment-type" v-model="formData.paymentType">
                            <option :value="0">Select payment type</option>
                            <option v-for="each in paymentTypeList" :value="each.id"> {{ each.name }}</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="payment-status" class="form-label">Payment status</label>
                        <select name="payment-status" id="payment-status" class="form-select" required
                                autocomplete="new-payment-status" v-model="formData.paymentStatus">
                            <option :value="0">Select payment status</option>
                            <option v-for="each in paymentStatusList" :value="each.id"> {{ each.name }}</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110" @click="manageFeesModalClose">
                        Close
                    </button>
                    <button type="button" class="btn btn-theme wpx-110">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- delete fees modal -->
    <div class="modal fade" id="deleteFeesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 border-0 py-2 px-3">
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
import tableContent from "../components/table.vue";

export default {
    components: {
        search, preloader, noDataFounded, pagination, newBtn, tableContent
    },
    data() {
        return {
            tableHeaders: ['Checkbox', 'Name', 'Roll', 'Fees type', 'Fees Status', 'date', 'amount', 'Action'],
            tableRows: [
                {
                    id: '1',
                    name: 'Mahi Bashar Akash',
                    roll: '18191101025',
                    feesType: 'Annual',
                    feesStatus: 'Paid',
                    date: '01, January, 2025',
                    amount: '10000',
                }
            ],
            studentDataList: [
                {id: '1', name: 'John Smith', roll: '18191101025'},
                {id: '2', name: 'Denny Wilson', roll: '18191101026'},
                {id: '3', name: 'Denial Furies', roll: '18191101027'},
                {id: '4', name: 'Fas and Furious', roll: '18191101028'},
                {id: '5', name: 'Sansi Monsi', roll: '18191101029'},
            ],
            feesTypeDataList: [
                {id: '1', name: 'Annual'},
                {id: '2', name: 'Exam'},
                {id: '3', name: 'Other'},
            ],
            paymentTypeList: [
                {id: '1', name: 'Cash'},
                {id: '2', name: 'Cheque'},
                {id: '3', name: 'Other'},
            ],
            paymentStatusList: [
                {id: '1', name: 'Paid'},
                {id: '2', name: 'Unpaid'},
                {id: '3', name: 'Pending'},
            ],
            formData: {
                department: '0',
                feesType: '0',
                feesAmount: '',
                paymentType: '0',
                paymentStatus: '0',
            },
            feesDataList: [
                {
                    id: '1',
                    name: 'Mahi Bashar Akash',
                    roll: '18191101025',
                    feesType: 'Annual',
                    feesStatus: 'Paid',
                    date: '01, January, 2025',
                    amount: '10000',
                }
            ],
            loading: true,
        }
    },
    mounted() {
        setTimeout(() => {
            this.loading = false
        }, 2000)
    },
    methods: {

        /* Function to manage fees modal open */
        manageFeesModalOpen() {
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
        deleteFeesModalOpen() {
            const myModal = new bootstrap.Modal("#deleteFeesModal", {keyboard: false});
            myModal.show();
        },

        /* Function to delete fees modal close */
        deleteFeesModalClose() {
            let myModalEl = document.getElementById('deleteFeesModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

    }
}

</script>
