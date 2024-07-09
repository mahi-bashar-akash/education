<template>

    <div class="cursor-content margin-top-105">
        <div class="container py-5">
            <div class="row">
                <div class="col-xl-9 py-4">

                    <!-- single blog image -->
                    <img :src="`/images/blogs/blog-large-screen.jpg`" class="img-fluid w-100 object-fit-cover" alt="course">

                    <!-- single blog author date and counted comment -->
                    <div class="mt-4">
                        <div class="w-100 d-flex justify-content-start align-items-center">
                            <div class="bg-warning text-dark fw-medium px-3 py-1 rounded-3 me-3">
                                Admin
                            </div>
                            <div class="text-secondary text-opacity-75 me-3">
                                <i class="bi bi-calendar me-2"></i>
                                01, January, 2025
                            </div>
                            <div class="text-secondary text-opacity-75">
                                <i class="bi bi-chat-square-text me-2"></i>
                                0 COMMENTS
                            </div>
                        </div>
                    </div>

                    <!-- single blog title -->
                    <div class="mt-4">
                        <div class="fs-3 fw-bold">
                            Secret Tips & Tricks to Master Electricity
                        </div>
                    </div>

                    <!-- single blog description -->
                    <div class="mt-4 text-secondary text-opacity-75">
                        World-class training and development programs developed by top teachers. Build skills with
                        courses, certificates, and degrees online from world-class universities and companies.
                        from the National Research University Higher School of Economics (HSE University) is the
                        first fully online data science master’s program from a Russian university on Coursera.
                        Students can take courses in contemporary data analysis
                    </div>

                    <!-- single blog caption highlighted -->
                    <div class="mt-4 bg-secondary-subtle p-4 rounded-3">
                        <q>
                            As students across the globe continue to see their learning plans significantly disrupted,
                            our university partners are modifying admissions requirements to make it easier to apply
                            for degree programs on Coursera.
                        </q>
                    </div>

                    <!-- single blog description -->
                    <div class="mt-4 text-secondary text-opacity-75">
                        World-class training and development programs developed by top teachers. Build skills with
                        courses, certificates, and degrees online from world-class universities and companies.
                        from the National Research University Higher School of Economics (HSE University) is the
                        first fully online data science master’s program from a Russian university on Coursera.
                        Students can take courses in contemporary data analysis
                    </div>

                    <div class="d-flex justify-content-between align-items-center w-100 mt-4">

                        <div class="d-flex align-items-center justify-content-start flex-wrap mb-2">
                            Tags:
                            <a href="javascript:void(0)" class="btn btn-light ms-2 border-0"> LMS </a>
                            <a href="javascript:void(0)" class="btn btn-light ms-2 border-0"> Business </a>
                            <a href="javascript:void(0)" class="btn btn-light ms-2 border-0"> Courses </a>
                        </div>

                        <div class="d-flex align-items-center mb-2">
                            <a href="javascript:void(0)" class="btn-icon rounded-circle border me-2 text-light-gray-hover">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn-icon rounded-circle border me-2 text-light-gray-hover">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn-icon rounded-circle border text-light-gray-hover">
                                <i class="bi bi-pinterest"></i>
                            </a>
                        </div>

                    </div>

                    <div class="mt-4">
                        <div class="fs-4 fw-bold">Comment (03) </div>

                        <div class="my-4">
                            <div class="d-flex align-items-start justify-content-start">
                                <div>
                                    <img :src="`/images/faces/team-1.jpg`" class="wpx-80 hpx-80 rounded-circle" alt="face">
                                </div>
                                <div class="ms-3">
                                    <div class="fw-medium mb-1">Michel Holder</div>
                                    <div class="text-secondary text-opacity-75 mb-1">
                                        We're known for one thing every where we go excellent customer experiences purpose. consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2 me-sm-4 text-secondary text-opacity-50">
                                            Dec 28, 2020 at 1:47 am
                                        </div>
                                        <a href="javascript:void(0)" class="text-decoration-none text-light-gray-hover">
                                            <i class="bi bi-reply-all-fill me-2"></i> Reply
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="w-100 border">

                        <div class="my-4">
                            <div class="d-flex align-items-start justify-content-start">
                                <div>
                                    <img :src="`/images/faces/team-2.jpg`" class="wpx-80 hpx-80 rounded-circle" alt="face">
                                </div>
                                <div class="ms-3">
                                    <div class="fw-medium mb-1">Harnold Min</div>
                                    <div class="text-secondary text-opacity-75 mb-1">
                                        We're known for one thing every where we go excellent customer experiences purpose. consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2 me-sm-4 text-secondary text-opacity-50">
                                            Dec 28, 2020 at 1:47 am
                                        </div>
                                        <a href="javascript:void(0)" class="text-decoration-none text-light-gray-hover">
                                            <i class="bi bi-reply-all-fill me-2"></i> Reply
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-4">

                        <div class="fs-4 fw-bold mb-2"> Leave A Comment </div>
                        <div class="text-secondary text-opacity-75 mb-4"> Your email address will not be published. Required fields are marked * </div>

                        <form action="" autocomplete="off">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <input type="text" name="name" class="form-control rounded-0 border-light py-3 ps-4 bg-light" required autocomplete="new-name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <input type="email" name="email" class="form-control rounded-0 border-light py-3 ps-4 bg-light" required autocomplete="new-email" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <textarea name="message" class="form-textarea rounded-0 border-light py-3 ps-4 bg-light" cols="30" rows="5" required autocomplete="new-message" placeholder="Your Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-theme wpx-90">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
                <div class="col-xl-3 py-4">

                    <sideContent/>

                </div>
            </div>
        </div>
    </div>

</template>

<script>
import sideContent from "../../components/side-content.vue";

export default {
    components: {
        sideContent
    },

    data() {
        return {}
    },

    mounted() {  },

    methods: {  }

}

</script>
