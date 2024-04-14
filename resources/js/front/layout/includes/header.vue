<template>

    <header class="w-100 bg-white fixed-top header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <router-link :to="{name: 'home'}" class="navbar-brand fw-bold text-light-gray">
                    <div class="d-flex align-items-center justify-content-start">
                        <img :src="`/images/logo.png`" class="img-fluid wpx-40 hpx-40" alt="logo">
                        {{ app_name }}
                    </div>
                </router-link>
                <button class="navbar-toggler shadow-sm border-0" type="button" data-bs-toggle="collapse"
                        @click="collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item text-end d-inline-block d-lg-none">
                            <button type="button" class="btn btn-close border-0 p-3 icon-close"
                                    @click="collapse"></button>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{name: 'home'}" class="nav-link" @click="collapse">
                                Home
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{name: 'about'}" class="nav-link" @click="collapse">
                                About
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{name: 'courses'}" class="nav-link" @click="collapse" :class="{ 'router-link-active' : $route.name === 'singleCourse' }">
                                Courses
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{name: 'blog'}" class="nav-link" @click="collapse" :class="{ 'router-link-active' : $route.name === 'singleBlog' }">
                                Blogs
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{name: 'contact'}" class="nav-link" @click="collapse">
                                Contact
                            </router-link>
                        </li>
                        <li class="nav-item" v-if="this.userInfo === null">
                            <router-link :to="{name: 'login'}" class="nav-link" @click="collapse">
                                Login
                            </router-link>
                        </li>
                        <li class="nav-item dropdown" v-if="this.userInfo !== null">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end p-1 overflow-hidden rounded-3 border">
                                <li>
                                    <router-link :to="{name: 'profile'}" class="dropdown-item px-3 py-2 rounded-2 mb-1" @click="collapse">
                                        {{profile_data.name}}
                                    </router-link>
                                </li>
                                <li>
                                    <router-link :to="{name: 'myClassRoom'}" class="dropdown-item px-3 py-2 rounded-2 mb-1" @click="collapse">
                                        My class room
                                    </router-link>
                                </li>
                                <li>
                                    <router-link :to="{name: 'myFees'}" class="dropdown-item px-3 py-2 rounded-2 mb-1" @click="collapse">
                                        My Fees
                                    </router-link>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item px-3 py-2 rounded-2" @click="userLogout();collapse">
                                        Logout
                                    </button>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

</template>

<script>
import apiServices from "../../../services/apiServices.js";
import apiRoutes from "../../../services/apiRoutes.js";

export default {

    data() {

        return {
            app_name: window.core.APP_NAME,
            navbarToggle: {
                'data-bs-toggle': 'collapse',
                'data-bs-target': '#navbarSupportedContent',
                'aria-controls': 'navbarSupportedContent',
                'aria-expanded': 'false',
                'aria-label': 'Toggle navigation',
            },
            userInfo: window.core.UserInfo,
            profile_data: '',
        }

    },

    mounted() {

        window.addEventListener('scroll', (e) => {
            const nav = document.querySelector('.header');
            if (window.pageYOffset > 0) {
                nav.classList.add("animated-shadow");
            } else {
                nav.classList.remove("animated-shadow");
            }
        });

        if(this.userInfo !== null) {
            this.getUserProfile();
        }

    },

    methods: {

        /* Function to collapse in navbar responsive */
        collapse() {
            if (window.innerWidth < 991) {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    navbarCollapse.classList.remove('show');
                } else {
                    navbarCollapse.classList.add('show');
                }
            }
        },

        /* Function to get profile data api */
        getUserProfile() {
            this.getProfileLoading = true;
            apiServices.GET(apiRoutes.userProfile, (res) => {
                this.getProfileLoading = false;
                if (res.message) {
                    this.profile_data = res.data
                }else {
                    this.$toast.error('Server Error', { position: "top-right" } );
                }
            })
        },


        /* Function to logout api */
        userLogout() {
            this.logoutLoading = true
            apiServices.GET(apiRoutes.userLogout, (res) => {
                this.logoutLoading = false
                if (res.message) {
                    this.$toast.success(res.message, { position: "top-right" } );
                    window.location.reload()
                }
            })
        },

    }

}

</script>
