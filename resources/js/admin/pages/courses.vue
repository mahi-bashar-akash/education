<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fs-5">
                <li class="breadcrumb-item">
                    <router-link :to="{name: 'courses'}" class="text-decoration-none text-light-gray">
                        Courses
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
                    <router-link :to="{name: 'courses'}" class="text-decoration-none text-light-gray">
                        Courses
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
            <newBtn @click="manageCourseModalOpen"/>
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
                    :headerClasses="['checkbox', 'default-width', 'default-width', 'default-width', 'default-width', 'default-width', 'action']"
                    :columnClasses="{ checkbox: 'checkbox', action: 'action' }"
                    :checkboxColumnIndex="0"
                    :editModalFunction="manageCourseModalOpen"
                    :deleteModalFunction="deleteCourseModalOpen"
                />
            </div>

            <!-- tablet and mobile screen list -->
            <div class="px-2 d-xl-none">

                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">

                    <!-- card -->
                    <div class="p-2" v-for="each in CourseDataList">
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
                                                    <button type="button" class="dropdown-item" @click="manageCourseModalOpen(each.id)">
                                                        Edit
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item" @click="deleteCourseModalOpen(each.id)">
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
                                    Course image {{each.id}}
                                </div>
                                <div class="mb-2 text-light-gray pt-3 pb-2 px-3">
                                    Course Duration: {{each.duration}}
                                </div>
                                <div class="mb-2 text-secondary text-opacity-75 px-3">
                                    Course Duration: {{each.duration}}
                                </div>
                                <div class="mb-2 text-light-gray px-3">
                                    Professor: {{each.professor}}
                                </div>
                                <div class="text-secondary text-opacity-75 pb-2 px-3">
                                    Student Enroll capacity: {{each.enroll}}
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

    <!-- manage course modal -->
    <div class="modal fade" id="manageCourseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Create course
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageCourseModalClose"></button>
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
                        <label for="student-enroll-capacity" class="form-label"> Student enroll capacity </label>
                        <input id="student-enroll-capacity" v-model="formData.studentEnrollCapacity" type="text" name="student-enroll-capacity" class="form-control" required autocomplete="new-student-enroll-capacity">
                    </div>

                    <div class="form-group mb-3">
                        <label for="name" class="form-label"> Name </label>
                        <input id="name" v-model="formData.name" type="text" name="name" class="form-control" required autocomplete="new-name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="professor" class="form-label">Select professor</label>
                        <select name="professor" id="professor" class="form-select">
                            <option :value="0">Select professor option</option>
                            <option v-for="each in professorDataList" :value="each.id"> {{each.name}} </option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="price" class="form-label"> Price </label>
                        <input id="price" v-model="formData.price" type="text" name="price" class="form-control" required autocomplete="new-price">
                    </div>

                    <div class="form-group mb-3">
                        <label for="duration" class="form-label"> Duration </label>
                        <input id="duration" v-model="formData.duration" type="text" name="duration" class="form-control" required autocomplete="new-duration">
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label"> Description </label>
                        <textarea id="description" class="form-textarea" name="description" v-model="formData.description" cols="30" rows="5" required autocomplete="new-description"></textarea>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110" @click="manageCourseModalClose">
                        Close
                    </button>
                    <button type="button" class="btn btn-theme wpx-110">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- delete course modal -->
    <div class="modal fade" id="deleteCourseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 border-0 py-2 px-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Delete course
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="deleteCourseModalClose"></button>
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
                        <button type="button" class="btn btn-secondary rounded-3 w-100" @click="deleteCourseModalClose">
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
            tableHeaders: ['Checkbox', 'Name', 'Enroll', 'Price', 'Duration', 'Professor', 'Action'],
            tableRows: [
                { id: '1', name: 'Full Stack Web Developer', enroll: '+360', price: '12000', duration: '1 year 6 month', professor: 'Mahi Bashar Akash' },
            ],
            CourseDataList: [
                { id: '1', name: 'Full Stack Web Developer', enroll: '+360', price: '12000', duration: '1 year 6 month', professor: 'Mahi Bashar Akash' },
            ],
            formData: {
                studentEnrollCapacity: '',
                updateImage: '',
                name: '',
                description: '',
            },
            professorDataList: [
                { id: '1', name: 'John Smith' },
                { id: '2', name: 'Danial Wilson' },
                { id: '3', name: 'John Wilson' },
                { id: '4', name: 'Smith John' },
            ],
            loading: true,
        }
    },
    mounted() {
        setTimeout( () => {
            this.loading = false
        }, 2000)
    },
    methods: {

        /* Function to manage course modal open */
        manageCourseModalOpen(){
            const myModal = new bootstrap.Modal("#manageCourseModal", { keyboard: false } );
            myModal.show();
        },

        /* Function to manage course modal close */
        manageCourseModalClose(){
            let myModalEl = document.getElementById('manageCourseModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to delete course modal open */
        deleteCourseModalOpen(){
            const myModal = new bootstrap.Modal("#deleteCourseModal", { keyboard: false } );
            myModal.show();
        },

        /* Function to delete course modal close */
        deleteCourseModalClose(){
            let myModalEl = document.getElementById('deleteCourseModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

    }
}

</script>
