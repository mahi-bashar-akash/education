<template>
    <div class="cursor-content margin-top-105 profile">
        <section class="w-100 py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-xl-2 d-none d-lg-inline">
                        <div class="bg-white shadow rounded-3 h-100">
                            <div class="p-3">
                                <router-link :to="{name: 'profile'}" class="nav-link py-2 px-3 mb-1">
                                    Profile
                                </router-link>
                                <router-link :to="{name: 'myClassRoom'}" class="nav-link py-2 px-3 mb-1">
                                    My class room
                                </router-link>
                                <router-link :to="{name: 'myFees'}" class="nav-link py-2 px-3 mb-1">
                                    My Fees
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-xl-10">
                        <router-view/>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>

export default {
    data() {
        return {
            userInfo: window.core.UserInfo,
        }
    },
    mounted() {
        if(this.userInfo === null) {
            this.$router.push( {name: 'login'} )
        }
    },
    methods: {}
}

</script>
