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
                        <li class="nav-item">
                            <router-link :to="{name: 'login'}" class="nav-link" @click="collapse">
                                Login
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

</template>

<script>

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
        }

    }

}

</script>
