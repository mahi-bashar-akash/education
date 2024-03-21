<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fs-5">
                <li class="breadcrumb-item">
                    <router-link :to="{name: 'events'}" class="text-decoration-none text-light-gray">
                        Event management
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
                        Event management
                    </router-link>
                </li>
            </ol>
        </nav>
    </div>

    <!-- event search and new -->
    <div class="row justify-content-between">
        <div class="col-sm-6 col-xl-3 mb-3">
            <div class="position-relative">
                <input type="text" name="keyword" class="form-control rounded-1 ps-5 shadow-none border-light" required autocomplete="new-search" placeholder="Search here">
                <div class="position-absolute top-50 start-0 translate-middle-y ps-3">
                    <i class="bi bi-search"></i>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 mb-3">
            <select name="event-type" class="form-select rounded-1 shadow-none border-light">
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
        <div class="col-12 col-xl-6 text-end mb-3">
            <button type="button" class="btn btn-light-gray rounded-1">
                New Event
            </button>
        </div>
    </div>

    <!-- event list -->
    <div class="card rounded-1 border-light">
        <div class="card-body card-list scrollbar">
            <div class="px-2">

                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-4">

                    <!-- card -->
                    <div class="p-2" v-for="each in [1,2,3,4,5,6,7,8,9,10]">
                        <div class="card p-0 border border">
                            <div class="card-header py-2 px-2 bg-secondary-subtle border-0">
                                <div class="p-1 text-theme fw-semibold">
                                    <div class="truncate-to-1-line">
                                        Title
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-0 p-0">
                                <div class="hpx-150 d-flex justify-content-center align-items-center text-light-gray border-bottom">
                                    Event image
                                </div>
                                <div class="mb-2 text-light-gray pt-2 px-3">
                                    Date
                                </div>
                                <div class="text-secondary text-opacity-75 pt-2 px-3">
                                    Time
                                </div>
                            </div>
                            <div class="card-footer py-2 px-3 border-0 bg-white">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-theme w-100">
                                            Edit
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-outline-theme w-100">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</template>

<script>

export default {
    data(){
        return{

        }
    },
    mounted() {  },
    methods: {  }
}

</script>
