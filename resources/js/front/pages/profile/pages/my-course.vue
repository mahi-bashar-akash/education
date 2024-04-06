<template>

    <div class="bg-white shadow px-3 py-3 mb-3 rounded-3">
        <BreadcrumbContent :items="BreadcrumbItems"/>
    </div>

    <div class="profile-content bg-white shadow scrollbar p-3 rounded-3" v-if="!loading && courseSingleData.length > 0">  </div>

    <pagination v-if="!loading && courseSingleData.length > 0"/>

    <noDataFound v-if="!loading && courseSingleData.length === 0"/>

    <preloader v-if="loading"/>

</template>

<script>
import noDataFound from "../components/no-data-found.vue";
import preloader from "../components/preloader.vue";
import BreadcrumbContent from "../components/breadcrumb.vue";
import pagination from "../components/pagination.vue";
export default {
    components: {
        BreadcrumbContent, noDataFound, preloader, pagination
    },
    data() {
        return {
            BreadcrumbItems: [
                { title: 'Profile', route: 'profile' },
                { title: 'My course', route: 'myCourse' },
            ],
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
