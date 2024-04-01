<template>

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <div class="breadcrumb bg-white shadow p-3">
            <div class="breadcrumb-item">
                <router-link :to="{name: 'profile'}" class="text-decoration-none text-light-gray-hover">
                    Profile
                </router-link>
            </div>
            <div class="breadcrumb-item">
                <router-link :to="{name: 'myFees'}" class="text-decoration-none text-light-gray-hover">
                    My fees
                </router-link>
            </div>
        </div>
    </nav>

    <div class="bg-white shadow p-3 profile-no-data-card">
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
                            {{each.date}}
                        </td>
                        <td class="default-width">
                            {{each.fees}}
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

</template>

<script>

export default {
    data() {
        return {
            feesListData: [
                { id: '1', date: '01, January, 2025', fees: '10,000 TK ( Annual )', status: 1 },
                { id: '2', date: '11, January, 2025', fees: '10,000 TK ( Annual )', status: 2 },
                { id: '3', date: '18, January, 2025', fees: '5,000 TK ( Tuition )', status: 1 },
                { id: '4', date: '23, January, 2025', fees: '5,000 TK ( Tution )', status: 2 },
                { id: '5', date: '18, January, 2025', fees: '1,500 TK ( Library )', status: 1 },
                { id: '6', date: '23, January, 2025', fees: '1,500 TK ( Library )', status: 2 },
            ],
        }
    },
    mounted() {  },
    methods: {  }
}

</script>
