<template>

    <nav
        style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <div class="breadcrumb bg-white shadow p-3 rounded-3">
            <div class="breadcrumb-item">
                <router-link :to="{name: 'profile'}" class="text-decoration-none text-light-gray-hover">
                    Profile
                </router-link>
            </div>
            <div class="breadcrumb-item">
                <router-link :to="{name: 'myCourse'}" class="text-decoration-none text-light-gray-hover">
                    My course
                </router-link>
            </div>
        </div>
    </nav>

    <div class="profile-content bg-white shadow scrollbar p-3 rounded-3" v-if="!loading && courseSingleData.length > 0">  </div>

    <noDataFound v-if="!loading && courseSingleData.length === 0"/>

    <preloader v-if="loading"/>

</template>

<script>
import noDataFound from "../components/no-data-found.vue";
import preloader from "../components/preloader.vue";

export default {
    components: {
        noDataFound, preloader
    },
    data() {
        return {
            loading: true,
            courseSingleData: [  ],
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
