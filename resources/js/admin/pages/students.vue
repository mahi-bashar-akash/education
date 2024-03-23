<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fs-5">
                <li class="breadcrumb-item">
                    <router-link :to="{name: 'students'}" class="text-decoration-none text-light-gray">
                        Students
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
                    <router-link :to="{name: 'students'}" class="text-decoration-none text-light-gray">
                        Students
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
            <div class="shadow">
                <select name="event-type" class="form-select rounded-0 shadow-none border-0">
                    <option value="select-option">Select visible data</option>
                    <option value="10"> 10 </option>
                    <option value="20"> 20 </option>
                    <option value="30"> 30 </option>
                    <option value="40"> 40 </option>
                    <option value="50"> 50 </option>
                </select>
            </div>
        </div>
        <div class="col-12 col-xl-6 mb-3 d-flex justify-content-end">
            <button type="button" class="btn btn-theme rounded-0 wpx-90 hpx-36 d-flex align-items-center justify-content-center border-0">
                New
            </button>
        </div>
    </div>

    <!-- desktop and laptop screen list -->
    <div class="card rounded-0 border-0 d-none d-xl-block shadow">
        <div class="card-body card-list scrollbar">
            <table class="table">
                <thead>
                    <tr>
                        <th class="checkbox">
                            <input type="checkbox" class="form-check-input">
                        </th>
                        <th class="default-width">
                            Name.
                        </th>
                        <th class="default-width">
                            Roll or Id.
                        </th>
                        <th class="default-width">
                            Phone.
                        </th>
                        <th class="default-width">
                            Email.
                        </th>
                        <th class="default-width">
                            Department.
                        </th>
                        <th class="action">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="each in [1,2,3,4,5,6,7,8,9,10]">
                        <td class="checkbox">
                            <input type="checkbox" class="form-check-input">
                        </td>
                        <td class="default-width">
                            <div class="truncate-to-1-line">
                                <div class="d-flex align-items-center">
                                    <img :src="`https://ui-avatars.com/api/?font-size=0.35&name=Student+Name`" class="face" alt="avatar"> <div class="ms-2"> Student name </div>
                                </div>
                            </div>
                        </td>
                        <td class="default-width">
                            18191101025
                        </td>
                        <td class="default-width">
                            0123456789
                        </td>
                        <td class="default-width">
                            student@gmail.com
                        </td>
                        <td class="default-width">
                            Accounting
                        </td>
                        <td class="action">
                            <div class="dropdown">
                                <button type="button" class="btn border-0 p-0 btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end p-0 mt-1 overflow-hidden">
                                    <li>
                                        <a href="javascript:void(0)" class="dropdown-item">
                                            Transfer certificate
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="dropdown-item">
                                            Health performance
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="dropdown-item">
                                            view schedule
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="dropdown-item">
                                            Edit
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- tablet and mobile screen list -->
    <div class="card rounded-0 border-0 d-xl-none shadow">
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
                                                Student name
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
                                                        Educational performance
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="dropdown-item">
                                                        Health performance
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="dropdown-item">
                                                        Transfer certificate
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="dropdown-item">
                                                        Admission cancel
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="dropdown-item">
                                                        Edit
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-0 p-0">
                                <div class="hpx-150 d-flex justify-content-center align-items-center text-light-gray border-bottom">
                                    Student image
                                </div>
                                <div class="text-light-gray pt-3 pb-2 px-3">
                                    Department name: Business Administration
                                </div>
                                <div class="text-secondary text-opacity-75 pb-2 px-3">
                                        ID: 18191101025
                                </div>
                                <div class="text-light-gray pb-2 px-3">
                                    Intake: 47th ( Section: 01 )
                                </div>
                                <div class="text-secondary text-opacity-75 pb-3 px-3">
                                    Program: Bachelor of Business Administration
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

</template>

<script>
import search from "../components/search.vue";
import preloader from "../components/preloader.vue";
import noDataFounded from "../components/no-data-founded.vue";
import pagination from "../components/pagination.vue";

export default {
    components: {
        search, preloader, noDataFounded, pagination
    },
    data() {
        return {  }
    },
    mounted() {  },
    methods: {  }
}

</script>
