<template>

    <div class="bg-white shadow px-3 py-3 mb-3 rounded-3">
        <BreadcrumbContent :items="BreadcrumbItems"/>
    </div>

    <div class="bg-white shadow p-3 profile-content scrollbar rounded-3" v-if="!loading && feesListData.length > 0">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="default-width">
                            Date
                        </th>
                        <th class="default-width">
                            Fees ( Type )
                        </th>
                        <th class="default-width">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="each in feesListData">
                        <td class="default-width">
                            {{ each.date }}
                        </td>
                        <td class="default-width">
                            {{ each.fees }}
                        </td>
                        <td class="default-width">
                            <span class="badge bg-danger-subtle text-danger px-4 py-2" v-if="each.status === 1">
                                Unpaid
                            </span>
                            <span class="badge bg-success-subtle text-success px-4 py-2" v-if="each.status === 2">
                                Paid
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <pagination v-if="!loading && feesListData.length > 0"/>

    <noDataFound v-if="!loading && feesListData.length === 0"/>

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
                { title: 'My fees', route: 'myFees' },
            ],
            loading: true,
            feesListData: [
                {id: '1', date: '01, January, 2025', fees: '10,000 TK ( Annual )', status: 1},
                {id: '2', date: '11, January, 2025', fees: '10,000 TK ( Annual )', status: 2},
                {id: '3', date: '18, January, 2025', fees: '5,000 TK ( Tuition )', status: 1},
                {id: '4', date: '23, January, 2025', fees: '5,000 TK ( Tution )', status: 2},
                {id: '5', date: '18, January, 2025', fees: '1,500 TK ( Library )', status: 1},
                {id: '6', date: '23, January, 2025', fees: '1,500 TK ( Library )', status: 2},
            ],
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
