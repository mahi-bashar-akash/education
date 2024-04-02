<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fs-5">
                <li class="breadcrumb-item">
                    <router-link :to="{name: 'events'}" class="text-decoration-none text-light-gray">
                        Events
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
                    <router-link :to="{name: 'events'}" class="text-decoration-none text-light-gray">
                        Events
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
        <div class="col-12 col-xl-6 mb-3 d-flex justify-content-end">
            <newBtn @click="manageEventModalOpen" />
        </div>
    </div>

    <div class="card rounded-3 border-0 shadow" v-if="!loading && tableRows.length > 0">
        <div class="card-body card-list scrollbar">

            <tableContent
                :headers="tableHeaders"
                :rows="tableRows"
                tableClass="table"
                :headerClasses="['checkbox', 'default-width', 'default-width', 'default-width', 'default-width', 'action']"
                :columnClasses="{ checkbox: 'checkbox', action: 'action' }"
                :checkboxColumnIndex="0"
                :editModalFunction="manageEventModalOpen"
                :deleteModalFunction="deleteEventModalOpen"
            />

        </div>
    </div>

    <!-- preloader -->
    <preloader v-if="loading"/>

    <!-- no data -->
    <!-- no data -->
    <noDataFounded v-if="!loading && tableRows.length === 0" :newModalFunction="manageEventModalOpen"/>

    <!-- pagination -->
    <pagination v-if="!loading && tableRows.length > 0"/>

    <!-- manage event modal -->
    <div class="modal fade" id="manageEventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content px-3 py-2 rounded-3 border-0">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                        Create event
                    </h1>
                    <button type="button" class="btn-close shadow-none" @click="manageEventModalClose"></button>
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
                        <label for="event-name" class="form-label"> Name </label>
                        <input id="event-name" v-model="formData.eventName" type="text" name="event-name" class="form-control" required autocomplete="new-event-name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="event-date" class="form-label"> Date </label>
                        <input id="event-date" v-model="formData.eventDate" type="text" name="event-date" class="form-control" required autocomplete="new-event-date">
                    </div>

                    <div class="form-group mb-3">
                        <label for="event-start-time" class="form-label"> Start time </label>
                        <input id="event-start-time" v-model="formData.eventStartTime" type="text" name="event-start-time" class="form-control" required autocomplete="new-event-start-time">
                    </div>

                    <div class="form-group mb-3">
                        <label for="event-end-time" class="form-label"> End time </label>
                        <input id="event-end-time" v-model="formData.eventEndTime" type="text" name="event-end-time" class="form-control" required autocomplete="new-event-end-time">
                    </div>

                    <div class="form-group">
                        <label for="event-description" class="form-label"> Description </label>
                        <textarea id="event-description" class="form-textarea" name="event-description" v-model="formData.description" cols="30" rows="5" required autocomplete="new-event-description"></textarea>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary wpx-110" @click="manageEventModalClose">
                        Close
                    </button>
                    <button type="button" class="btn btn-theme wpx-110">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- delete event modal -->
    <div class="modal fade" id="deleteEventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 border-0 py-2 px-3">
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
            tableHeaders: ['Checkbox', 'Name', 'Date', 'Start Time', 'End Time', 'Action'],
            tableRows: [
                { id: 1, name: 'John Doe', date: '2024-03-31', startTime: '09:00 pm', endTime: '12:00 pm' },
            ],
            formData: {
                updateImage: '',
                eventName: '',
                eventDate: '',
                eventStartTime: '',
                eventEndTime: '',
                eventDescription: '',
            },
            timeData: [
                { id: '1', time: '01:00' },
                { id: '2', time: '01:30' },
                { id: '3', time: '02:00' },
                { id: '4', time: '02:30' },
                { id: '5', time: '03:00' },
                { id: '6', time: '03:30' },
                { id: '7', time: '04:00' },
                { id: '8', time: '04:30' },
                { id: '9', time: '05:00' },
                { id: '10', time: '05:30' },
                { id: '11', time: '06:00' },
                { id: '12', time: '06:30' },
                { id: '13', time: '07:00' },
                { id: '14', time: '07:30' },
                { id: '15', time: '08:00' },
                { id: '16', time: '08:30' },
                { id: '17', time: '09:00' },
                { id: '18', time: '09:30' },
                { id: '19', time: '10:00' },
                { id: '20', time: '10:30' },
                { id: '21', time: '11:00' },
                { id: '22', time: '11:30' },
                { id: '23', time: '12:00' },
                { id: '24', time: '12:30' },
            ],
            periodData: [
                { id: '1', period: 'am' },
                { id: '2', period: 'pm' },
            ],
            eventDataList: [
                { id: '1', name: 'Celebrate convocation', date: '01, January, 2025', startTime: '01:00 pm', endTime: '03:00 pm' },
            ],
            loading: true,
        }
    },
    mounted() {
        setTimeout( () => {
            this.loading = false
        }, 2000)
        this.flatpickrConfigDate()
        this.flatpickrConfigStartTime();
        this.flatpickrConfigEndTime();
    },
    methods: {

        /* Function to manage event modal open */
        manageEventModalOpen(){
            const myModal = new bootstrap.Modal("#manageEventModal", { keyboard: false } );
            myModal.show();
        },

        /* Function to manage event modal close */
        manageEventModalClose(){
            let myModalEl = document.getElementById('manageEventModal');
            let modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        },

        /* Function to delete event modal open */
        deleteEventModalOpen(){
            const myModal = new bootstrap.Modal("#deleteEventModal", { keyboard: false } );
            myModal.show();
        },

        /* Function to delete event modal close */
        deleteEventModalClose(){
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

    }
}

</script>
