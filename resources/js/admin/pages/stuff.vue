<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fs-5">
                <li class="breadcrumb-item">
                    <router-link :to="{name: 'stuff'}" class="text-decoration-none text-light-gray">
                        Stuff
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
                    <router-link :to="{name: 'stuff'}" class="text-decoration-none text-light-gray">
                        Stuff
                    </router-link>
                </li>
            </ol>
        </nav>
    </div>

    <!-- stuff search and new -->
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
                <option value="select-option">Select visible data</option>
                <option value="10"> 10 </option>
                <option value="20"> 20 </option>
                <option value="30"> 30 </option>
                <option value="40"> 40 </option>
                <option value="50"> 50 </option>
            </select>
        </div>
        <div class="col-12 col-xl-6 text-end mb-3">
            <button type="button" class="btn btn-light-gray rounded-1">
                New Stuff
            </button>
        </div>
    </div>

    <!-- stuff list -->
    <div class="card rounded-1 border-light">
        <div class="card-body card-list scrollbar">
            <div class="px-2">

                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">

                    <!-- card -->
                    <div class="p-2" v-for="each in [1,2,3]">
                        <div class="card p-0 border border">
                            <div class="card-header py-2 px-2 bg-secondary-subtle border-0">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <div class="p-1 text-theme fw-semibold">
                                            <div class="truncate-to-1-line">
                                                Stuff Name
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
                                                    <a href="javascript:void(0)" class="dropdown-item">
                                                        Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="dropdown-item">
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-0 p-0">
                                <div class="hpx-150 d-flex justify-content-center align-items-center text-light-gray border-bottom">
                                    Stuff Image
                                </div>
                                <div class="mb-3 text-secondary text-opacity-75 pt-3 px-3">
                                    Designation: Frontend Developer
                                </div>
                                <div class="text-light-gray pb-3 px-3">
                                    Phone Number: 01239823757
                                </div>
                                <div class="text-secondary text-opacity-75 pb-3 px-3">
                                    Email: department@gmail.com
                                </div>
                                <div class="text-light-gray pb-3 px-3">
                                    Starting year: 1999
                                </div>
                                <div class="text-secondary text-opacity-75 pb-3 px-3">
                                    Stuff capacity: 21
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

    data() {

        return {}

    },

    mounted() {  },

    methods: {  }

}

</script>
