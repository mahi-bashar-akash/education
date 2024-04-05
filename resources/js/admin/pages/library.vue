<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <breadcrumb :items="BreadcrumbItems" moduleName="Library Assets"/>
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
            <newBtn @click="manageLibraryAssetModalOpen"/>
        </div>
    </div>

    <div class="card rounded-3 border-0 shadow" v-if="!loading && tableRows.length > 0">
        <div class="card-body card-list scrollbar">

            <tableContent
                :headers="tableHeaders"
                :rows="tableRows"
                tableClass="table"
                :headerClasses="['checkbox', 'default-width', 'default-width', 'default-width', 'default-width', 'default-width', 'action']"
                :columnClasses="{ checkbox: 'checkbox', action: 'action' }"
                :checkboxColumnIndex="0"
                :editModalFunction="manageLibraryAssetModalOpen"
                :deleteModalFunction="deleteLibraryAssetModalOpen"
            />

        </div>
    </div>

    <!-- preloader -->
    <preloader v-if="loading"/>

    <!-- no data -->
    <noDataFounded v-if="!loading && tableRows.length === 0" :newModalFunction="manageLibraryAssetModalOpen"/>

    <!-- pagination -->
    <pagination v-if="!loading && tableRows.length > 0"/>

    <!-- manage library asset modal -->
    <div class="modal fade" id="manageLibraryAssetModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Create library asset
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageLibraryAssetModalClose"></button>
                </div>
                <div class="modal-body border-0">

                    <div class="form-group mb-3">
                        <label for="upload-image"
                               class="form-label hpx-150 d-flex justify-content-center align-items-center flex-column bg-white text-center cursor-pointer border">
                            <input id="upload-image" type="file" name="update-image" hidden="hidden">
                            <i class="bi bi-cloud-arrow-down-fill fs-1"></i>
                            Click to upload Image
                        </label>
                    </div>

                    <div class="form-group mb-3">
                        <label for="name" class="form-label"> Name </label>
                        <input id="name" v-model="formData.name" type="text" name="name" class="form-control" required
                               autocomplete="new-name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="subject" class="form-label"> Subject </label>
                        <input id="subject" v-model="formData.subject" type="text" name="subject" class="form-control"
                               required autocomplete="new-subject">
                    </div>

                    <div class="form-group mb-3">
                        <label for="author-name" class="form-label"> Author name </label>
                        <input id="author-name" v-model="formData.authorName" type="text" name="author-name"
                               class="form-control" required autocomplete="new-author-name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="department" class="form-label">Select department</label>
                        <select name="department" id="department" class="form-select" v-model="formData.department">
                            <option :value="0">Select Department option</option>
                            <option v-for="each in departmentListData" :value="each.id"> {{ each.name }}</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="price" class="form-label"> Price </label>
                        <input id="price" v-model="formData.price" type="text" name="price" class="form-control"
                               required autocomplete="new-price">
                    </div>

                    <div class="form-group mb-3">
                        <label for="status" class="form-label"> Status </label>
                        <select name="" id="" class="form-select" v-model="formData.status">
                            <option :value="0">Select status option</option>
                            <option :value="1">In Stock</option>
                            <option :value="2">Out of Stock</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110" @click="manageLibraryAssetModalClose">
                        Close
                    </button>
                    <button type="button" class="btn btn-theme wpx-110">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- delete library asset modal -->
    <div class="modal fade" id="deleteLibraryAssetModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 border-0 py-2 px-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Delete library asset
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="deleteLibraryAssetModalClose"></button>
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
                                @click="deleteLibraryAssetModalClose">
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
                { title: 'Library', route: 'library' },
            ],
            tableHeaders: ['Checkbox', 'Name', 'Author', 'Subject', 'Price', 'Department', 'Status', 'Action'],
            tableRows: [
                {
                    id: '1',
                    name: 'Technical Author',
                    author: 'Mahi Bashar Akash',
                    subject: 'Designing',
                    price: '1000',
                    department: 'Creative Graphic Design',
                    status: 'In Stock'
                },
            ],
            formData: {
                updateImage: '',
                subject: '',
                authorName: '',
                department: '0',
                price: '',
                status: '0',
            },
            departmentListData: [
                {id: '1', name: 'Accounting'},
                {id: '2', name: 'Finance'},
                {id: '3', name: 'Marketing'},
                {id: '4', name: 'Management'},
                {id: '5', name: 'Economic'},
            ],
            libraryDataList: [
                {
                    id: '1',
                    name: 'Technical Author',
                    author: 'Mahi Bashar Akash',
                    subject: 'Designing',
                    price: '1000',
                    department: 'Creative Graphic Design',
                    status: 1
                },
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

        /* Function to manage library modal open */
        manageLibraryAssetModalOpen() {
            const myModal = new bootstrap.Modal("#manageLibraryAssetModal", {keyboard: false});
            myModal.show();
        },

        /* Function to manage library modal close */
        manageLibraryAssetModalClose() {
            let myModalEl = document.getElementById('manageLibraryAssetModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to delete library modal open */
        deleteLibraryAssetModalOpen() {
            const myModal = new bootstrap.Modal("#deleteLibraryAssetModal", {keyboard: false});
            myModal.show();
        },

        /* Function to delete library modal close */
        deleteLibraryAssetModalClose() {
            let myModalEl = document.getElementById('deleteLibraryAssetModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

    }
}

</script>
