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
                    <div class="border w-100 bg-theme-hover text-center py-5 h-100">
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
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" name="name" class="form-control bg-secondary-subtle py-2 ps-3" required autocomplete="new-name" placeholder="Your name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="email" name="email" class="form-control bg-secondary-subtle py-2 ps-3" required autocomplete="new-email" placeholder="Your email">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="phone-number" class="form-control bg-secondary-subtle py-2 ps-3" required autocomplete="new-phone-number" placeholder="Your phone number">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="subject" class="form-control bg-secondary-subtle py-2 ps-3" required autocomplete="new-subject" placeholder="Subject">
                    </div>
                    <div class="col-12 mb-3">
                        <textarea name="message" cols="30" rows="5" class="form-textarea bg-secondary-subtle py-2 ps-3" required autocomplete="new-message" placeholder="Write a message"></textarea>
                    </div>
                </div>
            </div>
        </section>

    </div>



</template>

<script>

export default {
    data(){
        return{  }
    },
    mounted() {  },
    methods: {  }
}

</script>
