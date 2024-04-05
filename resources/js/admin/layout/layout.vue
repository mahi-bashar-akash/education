<template>

    <div class="admin-wrapper">
        <aside class="admin-sidebar" :class="{ 'active' : sidebarActive }">
            <div class="admin-sidebar-header">
                <router-link :to="{name: 'dashboard'}" class="text-decoration-none text-light-gray fs-5"
                             @click="remove">
                    <span class="none-res-text">Education.io</span>
                    <span class="res-text">E</span>
                </router-link>
                <button type="button" class="btn-icon sidebar-close" @click="remove">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="admin-sidebar-body">
                <router-link :to="{name: 'dashboard'}" class="sidebar-link" @click="remove">
                    <i class="bi bi-speedometer"></i>
                    <span class="ms-2"> Dashboard </span>
                </router-link>
                <router-link :to="{name: 'events'}" class="sidebar-link" @click="remove">
                    <i class="bi bi-calendar4-event"></i>
                    <span class="ms-2"> Event management </span>
                </router-link>
                <router-link :to="{name: 'professors'}" class="sidebar-link" @click="remove">
                    <i class="bi bi-person"></i>
                    <span class="ms-2"> Professors </span>
                </router-link>
                <router-link :to="{name: 'students'}" class="sidebar-link" @click="remove">
                    <i class="bi bi-people"></i>
                    <span class="ms-2"> Students </span>
                </router-link>
                <router-link :to="{name: 'courses'}" class="sidebar-link" @click="remove">
                    <i class="bi bi-mortarboard"></i>
                    <span class="ms-2"> Courses </span>
                </router-link>
                <router-link :to="{name: 'library'}" class="sidebar-link" @click="remove">
                    <i class="bi bi-journal-bookmark"></i>
                    <span class="ms-2"> Library </span>
                </router-link>
                <router-link :to="{name: 'departments'}" class="sidebar-link" @click="remove">
                    <i class="bi bi-building"></i>
                    <span class="ms-2"> Departments </span>
                </router-link>
                <router-link :to="{name: 'stuff'}" class="sidebar-link" @click="remove">
                    <i class="bi bi-people"></i>
                    <span class="ms-2"> Stuff </span>
                </router-link>
                <router-link :to="{name: 'holiday'}" class="sidebar-link" @click="remove">
                    <i class="bi bi-gift"></i>
                    <span class="ms-2"> Holiday </span>
                </router-link>
                <router-link :to="{name: 'fees'}" class="sidebar-link" @click="remove">
                    <i class="bi bi-currency-dollar"></i>
                    <span class="ms-2"> Fees </span>
                </router-link>
            </div>
        </aside>
        <section class="admin-content">
            <div class="admin-content-header">
                <button type="button" class="btn border-0 p-0 btn-icon sidebar-toggle" @click="sidebarToggle">
                    <i class="bi bi-justify-left"></i>
                </button>
                <span class="d-flex align-items-center">
                    <button type="button" class="btn-icon me-2">
                        <i class="bi bi-envelope"></i>
                    </button>
                    <button type="button" class="btn-icon me-2">
                        <i class="bi bi-bell"></i>
                    </button>
                    <span class="dropdown">
                        <button type="button" class="user-avatar border-0 bg-transparent" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <img :src="`/images/clients/face-1.png`" class="img-fluid wpx-35 hpx-35 rounded-circle"
                                 alt="avatar">
                        </button>
                        <span class="dropdown-menu dropdown-menu-end mt-3 p-1 overflow-hidden rounded-3 border">
                            <span>
                                <router-link :to="{name: 'profile'}" class="dropdown-item">
                                    Profile
                                </router-link>
                            </span>
                            <span>
                                <button type="button" class="dropdown-item">
                                    Logout
                                </button>
                            </span>
                        </span>
                    </span>
                </span>
            </div>
            <section class="admin-content-body scrollbar">
                <router-view/>
            </section>
        </section>
    </div>

</template>

<script>

export default {

    data() {
        return {
            sidebarActive: false,
        }
    },

    mounted() {

    },

    methods: {

        sidebarToggle() {
            this.sidebarActive = !this.sidebarActive;
        },

        remove() {
            this.sidebarActive = false;
        },

    }

}

</script>
