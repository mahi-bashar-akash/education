<template>

    <div class="cursor-content margin-top-105">
        <section class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">

                <!-- telephone -->
                <div class="p-3">
                    <div class="border w-100 bg-light-gray-hover text-center py-5 h-100">
                        <div class="mb-3">
                            <i class="bi bi-telephone fs-3"></i>
                        </div>
                        <div class="mb-2 fs-5">
                            Telephone
                        </div>
                        <div class="d-block">
                            +880 01400125289
                        </div>
                    </div>
                </div>

                <!-- email -->
                <div class="p-3">
                    <div class="border w-100 bg-theme-hover text-center py-5 h-100">
                        <div class="mb-3">
                            <i class="bi bi-envelope fs-3"></i>
                        </div>
                        <div class="mb-2 fs-5">
                            Email
                        </div>
                        <div class="d-block">
                            mahibashar2023@gmail.com
                        </div>
                    </div>
                </div>

                <!-- address -->
                <div class="p-3">
                    <div class="border w-100 bg-light-gray-hover text-center py-5 h-100">
                        <div class="mb-3">
                            <i class="bi bi-geo-alt fs-3"></i>
                        </div>
                        <div class="mb-2 fs-5">
                            Address
                        </div>
                        <div class="d-block px-3 px-md-5">
                            The Company Name Inc.8901 Marmora Road,Glasgow, D04 89GR.
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="w-100 py-5">
            <div class="container">
                <div class="mb-3 fs-1 text-light-gray text-center">
                    Drop Us Line
                </div>
                <form class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" name="name" class="form-control rounded-0 border-light py-3 ps-4 bg-light" required autocomplete="new-name" placeholder="Your name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="email" name="email" class="form-control rounded-0 border-light py-3 ps-4 bg-light" required autocomplete="new-email" placeholder="Your email">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="phone-number" class="form-control rounded-0 border-light py-3 ps-4 bg-light" required autocomplete="new-phone-number" placeholder="Your phone number">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="subject" class="form-control rounded-0 border-light py-3 ps-4 bg-light" required autocomplete="new-subject" placeholder="Subject">
                    </div>
                    <div class="col-12 mb-3">
                        <textarea name="message" cols="30" rows="10" class="form-textarea rounded-0 border-light py-3 ps-4 bg-light" required autocomplete="new-message" placeholder="Write a message"></textarea>
                    </div>
                    <div class="col-12 mb-3">
                        <button type="submit" class="btn btn-theme wpx-90">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <section class="w-100 py-5">
            <div class="mapouter w-100 border-0">
                <div class="gmap_canvas w-100 border-0">
                    <iframe class="gmap_iframe w-100 hpx-450 border-0"
                            src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=University of Oxford&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                </div>
            </div>
        </section>

    </div>

</template>

<script>

export default {
    data() {
        return {}
    },
    mounted() {
    },
    methods: {}
}

</script>
