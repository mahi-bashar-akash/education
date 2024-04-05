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

            <div
                class="bg-white shadow hpx-230 rounded-4 d-flex justify-content-center align-items-center cursor-loading"
                v-if="loading">
                <span class="spinner-border spinner-border" aria-hidden="true"></span>
            </div>

            <router-link :to="{name: 'events'}" class="text-decoration-none">
                <div
                    class="bg-white shadow text-center hpx-230 rounded-4 d-flex justify-content-center align-items-center flex-column"
                    v-if="!loading">
                    <div class="fw-bold fs-5 mb-3 text-light-gray">
                        {{ countParam.event_count }}
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

            <div
                class="bg-white shadow hpx-230 rounded-4 d-flex justify-content-center align-items-center cursor-loading"
                v-if="loading">
                <span class="spinner-border spinner-border" aria-hidden="true"></span>
            </div>

            <router-link :to="{name: 'professors'}" class="text-decoration-none">
                <div
                    class="bg-white shadow text-center hpx-230 rounded-4 d-flex justify-content-center align-items-center flex-column"
                    v-if="!loading">
                    <div class="fw-bold fs-5 mb-3 text-light-gray">
                        {{ countParam.professor_count }}
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

            <div
                class="bg-white shadow hpx-230 rounded-4 d-flex justify-content-center align-items-center cursor-loading"
                v-if="loading">
                <span class="spinner-border spinner-border" aria-hidden="true"></span>
            </div>

            <router-link :to="{name: 'students'}" class="text-decoration-none">
                <div
                    class="bg-white shadow text-center hpx-230 rounded-4 d-flex justify-content-center align-items-center flex-column"
                    v-if="!loading">
                    <div class="fw-bold fs-5 mb-3 text-light-gray">
                        {{ countParam.student_count }}
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

            <div
                class="bg-white shadow hpx-230 rounded-4 d-flex justify-content-center align-items-center cursor-loading"
                v-if="loading">
                <span class="spinner-border spinner-border" aria-hidden="true"></span>
            </div>

            <router-link :to="{name: 'courses'}" class="text-decoration-none">
                <div
                    class="bg-white shadow text-center hpx-230 rounded-4 d-flex justify-content-center align-items-center flex-column"
                    v-if="!loading">
                    <div class="fw-bold fs-5 mb-3 text-light-gray">
                        {{ countParam.course_count }}
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

            <div
                class="bg-white shadow hpx-230 rounded-4 d-flex justify-content-center align-items-center cursor-loading"
                v-if="loading">
                <span class="spinner-border spinner-border" aria-hidden="true"></span>
            </div>

            <router-link :to="{name: 'library'}" class="text-decoration-none">
                <div
                    class="bg-white shadow text-center hpx-230 rounded-4 d-flex justify-content-center align-items-center flex-column"
                    v-if="!loading">
                    <div class="fw-bold fs-5 mb-3 text-light-gray">
                        {{ countParam.library_count }}
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

            <div
                class="bg-white shadow hpx-230 rounded-4 d-flex justify-content-center align-items-center cursor-loading"
                v-if="loading">
                <span class="spinner-border spinner-border" aria-hidden="true"></span>
            </div>

            <router-link :to="{name: 'departments'}" class="text-decoration-none">
                <div
                    class="bg-white shadow text-center hpx-230 rounded-4 d-flex justify-content-center align-items-center flex-column"
                    v-if="!loading">
                    <div class="fw-bold fs-5 mb-3 text-light-gray">
                        {{ countParam.department_count }}
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

            <div
                class="bg-white shadow hpx-230 rounded-4 d-flex justify-content-center align-items-center cursor-loading"
                v-if="loading">
                <span class="spinner-border spinner-border" aria-hidden="true"></span>
            </div>

            <router-link :to="{name: 'stuff'}" class="text-decoration-none">
                <div
                    class="bg-white shadow text-center hpx-230 rounded-4 d-flex justify-content-center align-items-center flex-column"
                    v-if="!loading">
                    <div class="fw-bold fs-5 mb-3 text-light-gray">
                        {{ countParam.stuff_count }}
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

            <div
                class="bg-white shadow hpx-230 rounded-4 d-flex justify-content-center align-items-center cursor-loading"
                v-if="loading">
                <span class="spinner-border spinner-border" aria-hidden="true"></span>
            </div>

            <router-link :to="{name: 'holiday'}" class="text-decoration-none">
                <div
                    class="bg-white shadow text-center hpx-230 rounded-4 d-flex justify-content-center align-items-center flex-column"
                    v-if="!loading">
                    <div class="fw-bold fs-5 mb-3 text-light-gray">
                        {{ countParam.holiday_count }}
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

            <div
                class="bg-white shadow hpx-230 rounded-4 d-flex justify-content-center align-items-center cursor-loading"
                v-if="loading">
                <span class="spinner-border spinner-border" aria-hidden="true"></span>
            </div>

            <router-link :to="{name: 'fees'}" class="text-decoration-none">
                <div
                    class="bg-white shadow text-center hpx-230 rounded-4 d-flex justify-content-center align-items-center flex-column"
                    v-if="!loading">
                    <div class="fw-bold fs-5 mb-3 text-light-gray">
                        {{ countParam.fees_count }} tk
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

        return {
            countParam: {
                event_count: '1295',
                professor_count: '1209',
                student_count: '1114',
                course_count: '109',
                library_count: '97',
                department_count: '73',
                stuff_count: '123',
                holiday_count: '365',
                fees_count: '9,870,000',
            },
            loading: true,
        }

    },

    mounted() {
        setTimeout(() => {
            this.loading = false
        }, 2000)
    },

    methods: {}

}

</script>
