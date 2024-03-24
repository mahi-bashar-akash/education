<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fs-5">
                <li class="breadcrumb-item">
                    <router-link :to="{name: 'eventManagement'}" class="text-decoration-none text-light-gray">
                        New event
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
                <li class="breadcrumb-item">
                    <router-link :to="{name: 'eventManagement'}" class="text-decoration-none text-light-gray">
                        New
                    </router-link>
                </li>
            </ol>
        </nav>
    </div>

    <!-- form --- action -->
    <form class="row">

        <div class="col-xl-6">

            <div class="row">

                <div class="col-md-12 mb-3">
                    <label for="upload-image" class="shadow form-label hpx-150 d-flex justify-content-center align-items-center flex-column bg-white text-center cursor-pointer">
                        <input id="update-image" type="file" name="update-image" hidden="hidden">
                        <i class="bi bi-cloud-arrow-down-fill fs-1"></i>
                        Click to upload Image
                    </label>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="event-name" class="form-label"> Name </label>
                        <div class="shadow">
                            <input id="event-name" v-model="formData.eventName" type="text" name="event-name" class="form-control shadow-none rounded-0" required autocomplete="new-event-name">
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="event-date" class="form-label"> Date </label>
                        <div class="shadow">
                            <input id="event-date" v-model="formData.eventDate" type="text" name="event-date" class="form-control shadow-none rounded-0" required autocomplete="new-event-name">
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="event-start-time" class="form-label"> Start time </label>
                        <div class="d-flex align-items-center shadow">
                            <div class="col-8">
                                <select id="event-start-time" v-model="formData.eventStartTime" name="event-start-time" class="form-select shadow-none rounded-0">
                                    <option v-for="each in timeData" :value="each.time">
                                        {{each.time}}
                                    </option>
                                </select>
                            </div>
                            <div class="col-4">
                                <select id="event-start-time" v-model="formData.eventStartPeriod" name="event-start-period" class="form-select shadow-none rounded-0">
                                    <option v-for="each in periodData" :value="each.period">
                                        {{each.period}}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="event-end-time" class="form-label"> End time </label>
                        <div class="d-flex align-items-center shadow">
                            <div class="col-8">
                                <select id="event-end-time" v-model="formData.eventEndTime" name="event-end-time" class="form-select shadow-none rounded-0">
                                    <option v-for="each in timeData" :value="each.time">
                                        {{each.time}}
                                    </option>
                                </select>
                            </div>
                            <div class="col-4">
                                <select id="event-end-time" v-model="formData.eventEndPeriod" name="event-end-period" class="form-select shadow-none rounded-0">
                                    <option v-for="each in periodData" :value="each.period">
                                        {{each.period}}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </form>

</template>

<script>

export default {
    data() {
        return {
            formData: {
                updateImage: '',
                eventName: '',
                eventDate: '',
                eventStartTime: '01:00',
                eventStartPeriod: 'am',
                eventEndTime: '01:00',
                eventEndPeriod: 'pm',
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
            ]
        }
    },
    mounted() {
        setTimeout(() => {
            this.flatpickrConfig();
        }, 500);
    },
    methods: {

        flatpickrConfig() {
            flatpickr("#event-date", {
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
