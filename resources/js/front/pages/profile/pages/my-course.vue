<template>

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <div class="breadcrumb bg-white shadow p-3">
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

    <section class="w-100">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item mb-3 shadow border-0 rounded-0">
                <h2 class="accordion-header">
                    <button class="accordion-button shadow-none rounded-0 fw-medium bg-theme-hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Business Administration
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        An Education.io is short for Learning Management System. It is a software that allows you to automate, manage, and capture the learning, or training, with your organization. An LMS, or learning management system, combines a wide range of features to present.
                    </div>
                </div>
            </div>
            <div class="accordion-item mb-3 shadow border-0 rounded-0">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed shadow-none rounded-0 fw-medium bg-theme-hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Creative Graphic Design
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Learning Management System (LMS) advantages include the ability to capture compliance training, reduce the amount of time and effort to managing organizational
                    </div>
                </div>
            </div>
            <div class="accordion-item mb-3 shadow border-0 rounded-0">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed shadow-none rounded-0 fw-medium bg-theme-hover" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Full Stack Web Development
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Learning Management System Education.io advantages include the ability to capture compliance training, reduce the amount of time and effort to managing organizational
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script>

export default {
    data() {
        return {}
    },
    mounted() {  },
    methods: {  }
}

</script>
