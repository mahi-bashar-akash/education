<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fs-5">
                <li class="breadcrumb-item">
                    <router-link :to="{name: 'library'}" class="text-decoration-none text-light-gray">
                        Library
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
                    <router-link :to="{name: 'library'}" class="text-decoration-none text-light-gray">
                        Library
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
            <newBtn @click="manageLibraryAssetModalOpen"/>
        </div>
    </div>

    <!-- desktop and laptop screen list -->
    <div class="card rounded-3 border-0 d-none d-xl-block shadow">
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

    <!-- tablet and mobile screen list -->
    <div class="card rounded-3 border-0 d-xl-none shadow">
        <div class="card-body card-list scrollbar">
            <div class="px-2">

                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">

                    <!-- card -->
                    <div class="p-2" v-for="each in libraryDataList">
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
                                                    <button type="button" class="dropdown-item" @click="manageLibraryAssetModalOpen(each.id)">
                                                        Edit
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item" @click="deleteLibraryAssetModalOpen(each.id)">
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
                                    library asset image {{each.id}}
                                </div>
                                <div class="mb-2 text-light-gray pt-3 px-3">
                                    Author: {{each.author}}
                                </div>
                                <div class="mb-2 text-secondary text-opacity-75 px-3">
                                    Subject: {{each.subject}}
                                </div>
                                <div class="mb-2 text-light-gray px-3">
                                    Department name: {{each.department}}
                                </div>
                                <div class="mb-2 text-secondary text-opacity-75 px-3">
                                    Price: {{each.price}} TK
                                </div>
                                <div class="mb-2 text-light-gray px-3">
                                    Status: <span v-if="each.status === 1"> In Stock </span> <span v-if="each.status === 2"> Out of Stock </span>
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

    <!-- manage library asset modal -->
    <div class="modal fade" id="manageLibraryAssetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="upload-image" class="form-label hpx-150 d-flex justify-content-center align-items-center flex-column bg-white text-center cursor-pointer border">
                            <input id="upload-image" type="file" name="update-image" hidden="hidden">
                            <i class="bi bi-cloud-arrow-down-fill fs-1"></i>
                            Click to upload Image
                        </label>
                    </div>

                    <div class="form-group mb-3">
                        <label for="name" class="form-label"> Name </label>
                        <input id="name" v-model="formData.name" type="text" name="name" class="form-control" required autocomplete="new-name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="subject" class="form-label"> Subject </label>
                        <input id="subject" v-model="formData.subject" type="text" name="subject" class="form-control" required autocomplete="new-subject">
                    </div>

                    <div class="form-group mb-3">
                        <label for="author-name" class="form-label"> Author name </label>
                        <input id="author-name" v-model="formData.authorName" type="text" name="author-name" class="form-control" required autocomplete="new-author-name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="department" class="form-label">Select department</label>
                        <select name="department" id="department" class="form-select" v-model="formData.department">
                            <option :value="0">Select Department option</option>
                            <option v-for="each in departmentListData" :value="each.id"> {{each.name}} </option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="price" class="form-label"> Price </label>
                        <input id="price" v-model="formData.price" type="text" name="price" class="form-control" required autocomplete="new-price">
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
                    <button type="button" class="btn btn-secondary rounded-3 wpx-110" @click="manageLibraryAssetModalClose">
                        Close
                    </button>
                    <button type="button" class="btn btn-theme rounded-3 wpx-110">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- delete library asset modal -->
    <div class="modal fade" id="deleteLibraryAssetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <button type="button" class="btn btn-secondary rounded-3 w-100" @click="deleteLibraryAssetModalClose">
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

export default {
    components: {
        search, preloader, noDataFounded, pagination, newBtn, tableContent
    },
    data() {
        return {
            tableHeaders: ['Checkbox', 'Name', 'Author', 'Subject', 'Price', 'Department', 'Status', 'Action'],
            tableRows: [
                { id: '1', name: 'Technical Author', author: 'Mahi Bashar Akash', subject: 'Designing', price: '1000', department: 'Creative Graphic Design', status: 'In Stock' },
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
                { id: '1', name: 'Accounting' },
                { id: '2', name: 'Finance' },
                { id: '3', name: 'Marketing' },
                { id: '4', name: 'Management' },
                { id: '5', name: 'Economic' },
            ],
            libraryDataList: [
                { id: '1', name: 'Technical Author', author: 'Mahi Bashar Akash', subject: 'Designing', price: '1000', department: 'Creative Graphic Design', status: 1 },
            ]
        }
    },
    mounted() {  },
    methods: {

        /* Function to manage library modal open */
        manageLibraryAssetModalOpen(){
            const myModal = new bootstrap.Modal("#manageLibraryAssetModal", { keyboard: false } );
            myModal.show();
        },

        /* Function to manage library modal close */
        manageLibraryAssetModalClose(){
            let myModalEl = document.getElementById('manageLibraryAssetModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to delete library modal open */
        deleteLibraryAssetModalOpen(){
            const myModal = new bootstrap.Modal("#deleteLibraryAssetModal", { keyboard: false } );
            myModal.show();
        },

        /* Function to delete library modal close */
        deleteLibraryAssetModalClose(){
            let myModalEl = document.getElementById('deleteLibraryAssetModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

    }
}

</script>
