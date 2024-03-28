<template>
    <div class="cursor-content margin-top-105">
        <section class="w-100 py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="w-100 p-3 shadow">
                            <div class="d-flex justify-content-center align-items-center">
                                <form>
                                    <div class="mb-3">
                                        <label for="upload-image" class="form-label hpx-175 wpx-175 border d-flex justify-content-center align-items-center rounded-circle cursor-pointer">
                                            <input id="upload-image" type="file" name="upload-image" class="form-control" required autocomplete="upload-image" accept="image/*" hidden="hidden">
                                            Click to "Upload Image"
                                        </label>
                                    </div>
                                </form>
                            </div>

                            <div class="fs-5 mb-2">Group of links</div>
                            <a href="javascript:void(0)" class="nav-link text-light-gray-hover mb-2"> profile </a>
                            <a href="javascript:void(0)" class="nav-link text-light-gray-hover mb-2"> professors </a>
                            <a href="javascript:void(0)" class="nav-link text-light-gray-hover mb-2"> Course list </a>
                            <a href="javascript:void(0)" class="nav-link text-light-gray-hover mb-2"> My course </a>
                            <a href="javascript:void(0)" class="nav-link text-light-gray-hover"> Fees </a>

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
        return {  }
    },
    mounted() {  },
    methods: {  }
}

</script>
