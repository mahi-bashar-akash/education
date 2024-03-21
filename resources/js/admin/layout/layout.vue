<template>

    <div class="admin-wrapper">
        <div class="admin-sidebar" :class="{ 'active' : sidebarActive }">
            <div class="admin-sidebar-header">
                <a href="javascript:void(0)" class="text-decoration-none text-light-gray" @click="remove">
                    <span class="none-res-text fw-medium">Education.io</span>
                    <span class="res-text fw-medium">E</span>
                </a>
                <button type="button" class="btn-icon sidebar-close" @click="remove">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="admin-sidebar-body">
                <a href="javascript:void(0)" class="sidebar-link" @click="remove">
                    <i class="bi bi-speedometer"></i>
                    <span class="ms-2"> Dashboard </span>
                </a>
                <a href="javascript:void(0)" class="sidebar-link" @click="remove">
                    <i class="bi bi-person"></i>
                    <span class="ms-2"> Professors </span>
                </a>
                <a href="javascript:void(0)" class="sidebar-link" @click="remove">
                    <i class="bi bi-people"></i>
                    <span class="ms-2"> Students </span>
                </a>
                <a href="javascript:void(0)" class="sidebar-link" @click="remove">
                    <i class="bi bi-mortarboard"></i>
                    <span class="ms-2"> Courses </span>
                </a>
                <a href="javascript:void(0)" class="sidebar-link" @click="remove">
                    <i class="bi bi-journal-bookmark"></i>
                    <span class="ms-2"> Library </span>
                </a>
                <a href="javascript:void(0)" class="sidebar-link" @click="remove">
                    <i class="bi bi-building"></i>
                    <span class="ms-2"> Departments </span>
                </a>
                <a href="javascript:void(0)" class="sidebar-link" @click="remove">
                    <i class="bi bi-people"></i>
                    <span class="ms-2"> Stuffs </span>
                </a>
                <a href="javascript:void(0)" class="sidebar-link" @click="remove">
                    <i class="bi bi-gift"></i>
                    <span class="ms-2"> Holiday </span>
                </a>
                <a href="javascript:void(0)" class="sidebar-link" @click="remove">
                    <i class="bi bi-currency-dollar"></i>
                    <span class="ms-2"> Fees </span>
                </a>
            </div>
        </div>
        <div class="admin-content">
            <div class="admin-content-header">
                <button type="button" class="btn-icon sidebar-toggle" @click="sidebarToggle">
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
                        <button type="button" class="user-avatar border-0 bg-transparent" data-bs-toggle="dropdown" aria-expanded="false">
                            <img :src="`/images/clients/face-1.png`" class="img-fluid wpx-35 hpx-35 rounded-circle" alt="avatar">
                        </button>
                        <span class="dropdown-menu dropdown-menu-end mt-3 p-0 overflow-hidden">
                            <span>
                                <a href="javascript:void(0)" class="dropdown-item">
                                    Profile
                                </a>
                            </span>
                            <span>
                                <a href="javascript:void(0)" class="dropdown-item">
                                    Logout
                                </a>
                            </span>
                        </span>
                    </span>
                </span>
            </div>
            <div class="admin-content-body">
                <router-view/>
            </div>
        </div>
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
