<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <breadcrumb :items="BreadcrumbItems" moduleName="Events"/>
    </div>

    <!-- search and new -->
    <div class="row justify-content-between">
        <div class="col-sm-6 col-xl-3 mb-3">
            <search/>
        </div>
        <div class="col-sm-6 col-xl-3 mb-3">
            <select name="event-type" class="form-select">
                <option value="select-option">Select event option</option>
                <option value="conferences">Conferences</option>
                <option value="trade-shows">Trade shows</option>
                <option value="networking-events">Networking events</option>
                <option value="workshops">Workshops</option>
                <option value="team-building-events">Team building events</option>
                <option value="product-launch-events">Product launch events</option>
                <option value="charity-events">Charity events</option>
                <option value="internal-corporate-events">Internal corporate events</option>
            </select>
        </div>
        <div class="col-12 col-xl-6 mb-3 d-flex justify-content-end align-items-center">
            <button type="button" class="btn btn-light border-0 mx-2" @click="deleteEventModalOpen()" v-if="tableData.length > 0 && loading === false && selected.length > 0">
                <i class="bi bi-trash2 text-danger"></i>
            </button>
            <newBtn @click="manageEventModalOpen(null)"/>
        </div>
    </div>

    <div class="card rounded-3 border-0 shadow" v-if="!loading && tableData.length > 0">
        <div class="card-body card-list scrollbar">

            <table class="table">
                <thead>
                    <tr>
                        <th class="checkbox">
                            <input type="checkbox" class="form-checkbox" :checked="tableData.length > 0 && tableData.length === selected.length" @change="toggleCheckAll($event)">
                        </th>
                        <th class="default-width">
                            Name.
                        </th>
                        <th class="default-width">
                            Date.
                        </th>
                        <th class="default-width">
                            Start time.
                        </th>
                        <th class="default-width">
                            End time.
                        </th>
                        <th class="default-width">
                            guest.
                        </th>
                        <th class="default-width">
                            location.
                        </th>
                        <th class="action">
                            Action.
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="each in tableData">
                        <td class="checkbox">
                            <input type="checkbox" class="form-checkbox" :checked="CheckIfChecked(each.id)" @change="toggleCheck($event,each.id)">
                        </td>
                        <td class="default-width">
                            {{each.name}}
                        </td>
                        <td class="default-width">
                            {{each.date}}
                        </td>
                        <td class="default-width">
                            {{each.start_time}}
                        </td>
                        <td class="default-width">
                            {{each.end_time}}
                        </td>
                        <td class="default-width">
                            {{each.guest}}
                        </td>
                        <td class="default-width">
                            {{each.location}}
                        </td>
                        <td class="action">
                            <div class="dropdown">
                                <button type="button" class="btn border-0 p-0 btn-icon" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end p-2 mt-1 overflow-hidden rounded-3 border">
                                    <li class="mb-2">
                                        <button type="button" class="dropdown-item rounded-3" @click="manageEventModalOpen(each.id)">
                                            Edit
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item rounded-3" @click="deleteEventModalOpen(each.id)">
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

    <!-- preloader -->
    <preloader v-if="loading"/>

    <!-- no data -->
    <noDataFounded :text="'course'" :newModalFunction="manageEventModalOpen" v-if="!loading  && tableData.length === 0"/>

    <!-- pagination -->
    <div class="d-flex justify-content-center mt-3" v-if="!loading && tableData.length > 0">
        <div class="pagination admin-pagination">
            <div class="page-item" @click="PrevPage()">
                <a class="page-link" href="javascript:void(0)">
                    <i class="bi bi-chevron-left"></i>
                </a>
            </div>
            <div v-if="buttons.length <= 6">
                <div v-for="(page, index) in buttons" class="page-item"
                     :class="{'active': current_page === page}">
                    <a class="page-link" @click="pageChange(page)" href="javascript:void(0)"
                       v-text="page"></a>
                </div>
            </div>
            <div v-if="buttons.length > 6">
                <div class="page-item" :class="{'active': current_page === 1}">
                    <a class="page-link" @click="pageChange(1)"
                       href="javascript:void(0)">1</a>
                </div>

                <div v-if="current_page > 3" class="page-item">
                    <a class="page-link" @click="pageChange(current_page - 2)"
                       href="javascript:void(0)">...</a>
                </div>

                <div v-if="current_page === buttons.length" class="page-item"
                     :class="{'active': current_page === (current_page - 2)}">
                    <a class="page-link" @click="pageChange(current_page - 2)"
                       href="javascript:void(0)" v-text="current_page - 2"></a>
                </div>

                <div v-if="current_page > 2" class="page-item"
                     :class="{'active': current_page === (current_page - 1)}">
                    <a class="page-link" @click="pageChange(current_page - 1)"
                       href="javascript:void(0)" v-text="current_page - 1"></a>
                </div>

                <div v-if="current_page !== 1 && current_page !== buttons.length" class="page-item active">
                    <a class="page-link" @click="pageChange(current_page)" href="javascript:void(0)"
                       v-text="current_page"></a>
                </div>

                <div v-if="current_page < buttons.length - 1" class="page-item"
                     :class="{'active': current_page === (current_page + 1)}">
                    <a class="page-link" @click="pageChange(current_page + 1)"
                       href="javascript:void(0)" v-text="current_page + 1"></a>
                </div>

                <div v-if="current_page === 1" class="page-item"
                     :class="{'active': current_page === (current_page + 2)}">
                    <a class="page-link" @click="pageChange(current_page + 2)"
                       href="javascript:void(0)" v-text="current_page + 2"></a>
                </div>

                <div v-if="current_page < buttons.length - 2" class="page-item">
                    <a class="page-link" @click="pageChange(current_page + 2)"
                       href="javascript:void(0)">...</a>
                </div>

                <div class="page-item" :class="{'active': current_page === (current_page - buttons.length)}">
                    <a class="page-link" @click="pageChange(buttons.length)"
                       href="javascript:void(0)" v-text="buttons.length"></a>
                </div>
            </div>
            <div class="page-item" @click="NextPage()">
                <a class="page-link" href="javascript:void(0)">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>

        </div>
    </div>

    <!-- manage event modal -->
    <div class="modal fade" id="manageEventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="manageEvent()" class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        <span v-if="this.formData.id === undefined"> Create </span>
                        <span v-if="this.formData.id !== undefined"> Edit </span>
                        event
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageEventModalClose"></button>
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
                        <label for="event-name" class="form-label"> Name </label>
                        <input id="event-name" v-model="formData.name" type="text" name="event-name"
                               class="form-control" required autocomplete="new-event-name">
                        <div class="error-report" v-if="error != null && error.student_enroll_capacity !== undefined"> {{error.name[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="event-date" class="form-label"> Date </label>
                        <input id="event-date" v-model="formData.date" type="text" name="event-date"
                               class="form-control" required autocomplete="new-event-date">
                        <div class="error-report" v-if="error != null && error.date !== undefined"> {{error.date[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="event-start-time" class="form-label"> Start time </label>
                        <input id="event-start-time" v-model="formData.start_time" type="text"
                               name="event-start-time" class="form-control" required
                               autocomplete="new-event-start-time">
                        <div class="error-report" v-if="error != null && error.start_time !== undefined"> {{error.start_time[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="event-end-time" class="form-label"> End time </label>
                        <input id="event-end-time" v-model="formData.end_time" type="text" name="event-end-time"
                               class="form-control" required autocomplete="new-event-end-time">
                        <div class="error-report" v-if="error != null && error.end_time !== undefined"> {{error.end_time[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="guest" class="form-label"> Guest name </label>
                        <input id="guest" type="text" name="guest" v-model="formData.guest" class="form-control" required autocomplete="new-event-guest-name">
                        <div class="error-report" v-if="error != null && error.guest !== undefined"> {{error.guest[0]}} </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="location" class="form-label"> Location </label>
                        <input id="location" type="text" name="location" v-model="formData.location" class="form-control" required autocomplete="new-event-location">
                        <div class="error-report" v-if="error != null && error.location !== undefined"> {{error.location[0]}} </div>
                    </div>

                    <div class="form-group">
                        <label for="event-description" class="form-label"> Description </label>
                        <textarea id="event-description" class="form-textarea" name="event-description"
                                  v-model="formData.description" cols="30" rows="5" required
                                  autocomplete="new-event-description"></textarea>
                        <div class="error-report" v-if="error != null && error.description !== undefined"> {{error.description[0]}} </div>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110" @click="manageEventModalClose">
                        Close
                    </button>
                    <button type="submit" class="btn btn-theme wpx-110" v-if="!manageEventLoading">
                        <span v-if="this.formData.id === undefined"> Save </span>
                        <span v-if="this.formData.id !== undefined"> Update </span>
                    </button>
                    <button type="button" class="btn btn-theme wpx-110" v-if="manageEventLoading">
                        <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- delete event modal -->
    <div class="modal fade" id="deleteEventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form @submit.prevent="eventDelete()" class="modal-content rounded-3 border-0 py-2 px-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Delete event
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="deleteEventModalClose"></button>
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
                        <button type="button" class="btn btn-secondary rounded-3 w-100" @click="deleteEventModalClose">
                            Close
                        </button>
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn btn-theme rounded-3 w-100" v-if="!deleteEventLoading">
                            Confirm
                        </button>
                        <button type="button" class="btn btn-theme rounded-3 w-100" v-if="deleteEventLoading">
                            <span class="spinner-border border-2 wpx-15 hpx-15"></span>
                        </button>
                    </div>
                </div>
            </form>
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
import breadcrumb from '../components/breadcrumb.vue';
import apiServices from "../../services/apiServices.js";
import apiRoutes from "../../services/apiRoutes.js";

export default {
    components: {
        search, preloader, noDataFounded, pagination, newBtn, tableContent, breadcrumb
    },
    data() {
        return {
            BreadcrumbItems: [
                { title: 'Dashboard', route: 'dashboard' },
                { title: 'Events', route: 'events' },
            ],
            formData: {
                name: '',
                date: '',
                start_time: '',
                end_time: '',
                description: '',
                guest: '',
                location: '',
            },
            loading: true,
            deleteEventParam: {
                ids: []
            },
            tableData: [],
            listData: {
                keyword: '',
                limit: 10,
                page: 1,
            },
            current_page: 1,
            searchTimeOut: null,
            responseData: null,
            selected: [],
            manageEventLoading: false,
            error: null,
            deleteEventLoading: false,
            buttons: [],
        }
    },
    mounted() {
        this.eventList();
        this.flatpickrConfigDate();
        this.flatpickrConfigStartTime();
        this.flatpickrConfigEndTime();
    },
    methods: {

        /* Function to toggle check all */
        toggleCheckAll(e) {
            if (e.target.checked) {
                this.tableData.forEach((v) => {
                    this.selected.push(v.id);
                });
            } else {
                this.selected = [];
            }
        },

        /* Function to toggle check */
        toggleCheck(e, id) {
            if (e.target.checked) {
                this.selected.push(id);
            } else {
                let index = this.selected.indexOf(id);
                this.selected.splice(index, 1);
            }
        },

        /* Function to check if checked */
        CheckIfChecked(id) {
            return this.selected.map(function (id) {
                return id
            }).indexOf(id) > -1;
        },

        /* Function to manage event modal open */
        manageEventModalOpen(data = null) {
            apiServices.clearErrorHandler()
            if(data !== null) {
                this.eventSingle(data);
            }else {
                this.formData = {
                    name: '',
                    date: '',
                    start_time: '',
                    end_time: '',
                    description: '',
                    guest: '',
                    location: '',
                }
            }
            const myModal = new bootstrap.Modal("#manageEventModal", {keyboard: false});
            myModal.show();
        },

        /* Function to manage event modal close */
        manageEventModalClose() {
            let myModalEl = document.getElementById('manageEventModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to delete event modal open */
        deleteEventModalOpen(id) {
            this.deleteEventParam.ids.push(id)
            const myModal = new bootstrap.Modal("#deleteEventModal", {keyboard: false});
            myModal.show();
        },

        /* Function to delete event modal close */
        deleteEventModalClose() {
            this.selected = [];
            this.current_page = 1;
            this.formData = {
                name: '',
                date: '',
                start_time: '',
                end_time: '',
                description: '',
                guest: '',
                location: '',
            }
            let myModalEl = document.getElementById('deleteEventModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to event-date */
        flatpickrConfigDate() {
            flatpickr("#event-date", {
                altFormat: 'j M Y',
                altInput: true,
                minDate: "today",
                dateFormat: 'Y-m-d',
                disableMobile: true,
            })
        },

        /* Function to event-start-time */
        flatpickrConfigStartTime() {
            flatpickr("#event-start-time", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                defaultDate: "",
                disableMobile: true,
            })
        },

        /* Function to event-end-time */
        flatpickrConfigEndTime() {
            flatpickr("#event-end-time", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                defaultDate: "",
                disableMobile: true,
            })
        },

        /* Function to event list api */
        eventList() {
            this.loading = true;
            this.listData.page = this.current_page;
            apiServices.GET(apiRoutes.eventList, this.listData, (res) => {
                this.loading = false;
                if (res.message) {
                    this.tableData = res.data.data;
                    this.responseData = res.data;
                    this.total_pages = res.data.total < res.data.per_page ? 1 : Math.ceil((res.data.total / res.data.per_page))
                    this.current_page = res.data.current_page;
                    this.buttons = [...Array(this.total_pages).keys()].map(i => i + 1);
                } else {
                    apiServices.clearErrorHandler(res.error)
                }
            })
        },

        /* Function to event search data */
        SearchData() {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => {
                this.eventList();
            }, 800);
        },

        /* Function to event previous page */
        PrevPage() {
            if (this.current_page > 1) {
                this.current_page = this.current_page - 1;
                this.eventList()
            }
        },

        /* Function to event next page */
        NextPage() {
            if (this.current_page < this.total_pages) {
                this.current_page = this.current_page + 1;
                this.eventList()
            }
        },

        /* Function to event change page */
        pageChange(page) {
            this.current_page = page;
            this.eventList();
        },

        /* Function to event manage of create and update api */
        manageEvent() {
            if(this.formData.id === undefined) {
                this.eventCreate()
            }else {
                this.eventUpdate()
            }
        },

        /* Function to event create api */
        eventCreate() {
            this.manageEventLoading = true;
            apiServices.POST(apiRoutes.eventCreate, this.formData, (res) => {
                this.manageEventLoading = false;
                if(res.message) {
                    this.formData = {
                        name: '',
                        date: '',
                        start_time: '',
                        end_time: '',
                        description: '',
                        guest: '',
                        location: '',
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageEventModalClose();
                    this.eventList();
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to event update api */
        eventUpdate() {
            this.manageEventLoading = true;
            apiServices.PATCH(apiRoutes.eventUpdate, this.formData, (res) => {
                this.manageEventLoading = false;
                if(res.message) {
                    this.formData = {
                        name: '',
                        date: '',
                        start_time: '',
                        end_time: '',
                        description: '',
                        guest: '',
                        location: '',
                    }
                    this.$toast.success(res.message, { position: "top-right" } );
                    this.manageEventModalClose();
                    this.eventList();
                } else {
                    this.error = res.errors
                }
            })
        },

        /* Function to event single api */
        eventSingle(data) {
            apiServices.PUT(apiRoutes.eventSingle, { id: data }, (res) => {
                if (res.message) {
                    this.formData = res.data;
                } else {
                    this.error = res.errors;
                }
            });
        },

        /* Function to event delete api */
        eventDelete() {
            this.selected.forEach((v) => {
                this.deleteEventParam.ids.push(v);
            })
            this.deleteEventLoading = true;
            apiServices.DELETE(apiRoutes.eventDelete, this.deleteEventParam, (res) => {
                this.deleteEventLoading = false;
                if(res.message) {
                    this.deleteEventModalClose();
                    this.eventList();
                    this.$toast.success(res.message, { position: "top-right" } );
                } else {
                    this.error = res.errors
                }
            })
        }

    }
}

</script>
