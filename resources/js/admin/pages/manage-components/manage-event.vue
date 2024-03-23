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

        <div class="col-lg-6">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="event-name" class="form-label"> Event name </label>
                        <input id="event-name" type="text" name="event-name" class="form-control shadow-none rounded-0" required autocomplete="new-event-name">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="event-date" class="form-label">	Event date </label>
                        <input id="event-date" type="text" name="event-date" class="form-control shadow-none rounded-0" required autocomplete="new-event-name">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="event-start-time" class="form-label"> Event start time </label>
                        <input id="event-name" type="text" name="event-start" class="form-control shadow-none rounded-0" required autocomplete="new-event-name">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="event-end-time" class="form-label">	Event end time </label>
                        <input id="event-name" type="text" name="event-end" class="form-control shadow-none rounded-0" required autocomplete="new-event-name">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="event-end-time" class="form-label">	Event end time </label>
                        <input id="event-name" type="text" name="event-end" class="form-control shadow-none rounded-0" required autocomplete="new-event-name">
                    </div>
                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <label for="" class="form-label hpx-150 d-flex justify-content-center align-items-center flex-column bg-white">
                <input type="file" name="" hidden="hidden">
                <span class="d-">
                    Click to upload Image
                </span>
            </label>

        </div>

    </form>

</template>

<script>

export default {
    data() {
        return {}
    },
    mounted() {  },
    methods: {  }
}

</script>
