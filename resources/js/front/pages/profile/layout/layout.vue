<template>
    <div class="cursor-content margin-top-105 profile">
        <section class="w-100 py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="w-100 p-3 shadow rounded-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <form>
                                    <div class="mb-3">
                                        <label for="upload-image"
                                               class="form-label hpx-175 wpx-175 border d-flex justify-content-center align-items-center rounded-circle cursor-pointer d-none">
                                            <input id="upload-image" type="file" name="upload-image"
                                                   class="form-control" required autocomplete="upload-image"
                                                   accept="image/*" hidden="hidden">
                                            Click to "Upload Image"
                                        </label>
                                        <div class="hpx-175 wpx-175 rounded-circle overflow-hidden">
                                            <img :src="`/images/clients/face-1.png`" class="object-fit-cover img-fluid"
                                                 alt="avatar">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <router-link :to="{name: 'profile'}" class="nav-link mb-2">
                                Profile
                            </router-link>
                            <router-link :to="{name: 'myCourse'}" class="nav-link mb-2">
                                My course
                            </router-link>
                            <router-link :to="{name: 'myFees'}" class="nav-link mb-2">
                                My fees
                            </router-link>
                            <a href="javascript:void(0)" class="nav-link">
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
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
        return {}
    },
    mounted() {
    },
    methods: {}
}

</script>
