<template>

    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb fs-5">
            <li class="breadcrumb-item">
                <router-link :to="{name: 'dashboard'}" class="text-decoration-none text-light-gray">
                    Dashboard
                </router-link>
            </li>
        </ol>
    </nav>

    <!-- dashboard -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-3 row-cols-xxl-4">

        <!-- event -->
        <div class="mb-4">
            <router-link :to="{name: 'events'}" class="text-decoration-none">
                <div class="bg-white shadow text-center py-5">
                    <div class="fw-bold fs-5 mb-3 text-light-gray">
                        1295
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-calendar4-event fs-3 text-theme"></i>
                    </div>
                    <div class="text-light-gray">
                        Summary event
                    </div>
                </div>
            </router-link>
        </div>

        <!-- professor -->
        <div class="mb-4">
            <router-link :to="{name: 'professors'}" class="text-decoration-none">
                <div class="bg-white shadow text-center py-5">
                    <div class="fw-bold fs-5 mb-3 text-light-gray">
                        1209
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-person fs-3 text-theme"></i>
                    </div>
                    <div class="text-light-gray">
                        Summary professor
                    </div>
                </div>
            </router-link>
        </div>

        <!-- student -->
        <div class="mb-4">
            <router-link :to="{name: 'students'}" class="text-decoration-none">
                <div class="bg-white shadow text-center py-5">
                    <div class="fw-bold fs-5 mb-3 text-light-gray">
                        1114
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-people fs-3 text-theme"></i>
                    </div>
                    <div class="text-light-gray">
                        Summary student
                    </div>
                </div>
            </router-link>
        </div>

        <!-- course -->
        <div class="mb-4">
            <router-link :to="{name: 'courses'}" class="text-decoration-none">
                <div class="bg-white shadow text-center py-5">
                    <div class="fw-bold fs-5 mb-3 text-light-gray">
                        109
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-mortarboard fs-3 text-theme"></i>
                    </div>
                    <div class="text-light-gray">
                        Summary course
                    </div>
                </div>
            </router-link>
        </div>

        <!-- library -->
        <div class="mb-4">
            <router-link :to="{name: 'library'}" class="text-decoration-none">
                <div class="bg-white shadow text-center py-5">
                    <div class="fw-bold fs-5 mb-3 text-light-gray">
                        97
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-journal-bookmark fs-3 text-theme"></i>
                    </div>
                    <div class="text-light-gray">
                        Summary library
                    </div>
                </div>
            </router-link>
        </div>

        <!-- department -->
        <div class="mb-4">
            <router-link :to="{name: 'departments'}" class="text-decoration-none">
                <div class="bg-white shadow text-center py-5">
                    <div class="fw-bold fs-5 mb-3 text-light-gray">
                        73
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-building fs-3 text-theme"></i>
                    </div>
                    <div class="text-light-gray">
                        Summary department
                    </div>
                </div>
            </router-link>
        </div>

        <!-- stuff -->
        <div class="mb-4">
            <router-link :to="{name: 'stuff'}" class="text-decoration-none">
                <div class="bg-white shadow text-center py-5">
                    <div class="fw-bold fs-5 mb-3 text-light-gray">
                        123
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-people fs-3 text-theme"></i>
                    </div>
                    <div class="text-light-gray">
                        Summary stuff
                    </div>
                </div>
            </router-link>
        </div>

        <!-- holiday -->
        <div class="mb-4">
            <router-link :to="{name: 'holiday'}" class="text-decoration-none">
                <div class="bg-white shadow text-center py-5">
                    <div class="fw-bold fs-5 mb-3 text-light-gray">
                        365
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-gift fs-3 text-theme"></i>
                    </div>
                    <div class="text-light-gray">
                        Summary holiday
                    </div>
                </div>
            </router-link>
        </div>

        <!-- fees -->
        <div class="mb-4">
            <router-link :to="{name: 'fees'}" class="text-decoration-none">
                <div class="bg-white shadow text-center py-5">
                    <div class="fw-bold fs-5 mb-3 text-light-gray">
                        9,870,000 tk
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-currency-dollar fs-3 text-theme"></i>
                    </div>
                    <div class="text-light-gray">
                        Summary fees
                    </div>
                </div>
            </router-link>
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
