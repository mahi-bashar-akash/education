<template>

    <!-- breadcrumb -->
    <div class="d-sm-flex justify-content-between align-items-center">
        <breadcrumb :items="BreadcrumbItems" moduleName="About"/>
    </div>

    <div class="card rounded-3 border-0 shadow" v-if="!loading">
        <div class="card-body card-list scrollbar">

            <form class="row px-3 py-3">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="why_we_are" class="form-label">Why we are?</label>
                        <textarea name="why_we_are" id="why_we_are" cols="30" rows="5" class="form-textarea" required autocomplete="off"></textarea>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="what_we_do" class="form-label">What we do?</label>
                        <textarea name="what_we_do" id="what_we_do" cols="30" rows="5" class="form-textarea" required autocomplete="off"></textarea>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="our_mission" class="form-label">Our mission?</label>
                        <textarea name="our_mission" id="our_mission" cols="30" rows="5" class="form-textarea" required autocomplete="off"></textarea>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="our_vision" class="form-label">Our vision?</label>
                        <textarea name="our_vision" id="our_vision" cols="30" rows="5" class="form-textarea" required autocomplete="off"></textarea>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="why_choose_education_io" class="form-label">Why choose education io?</label>
                        <textarea name="why_choose_education_io" id="why_choose_education_io" cols="30" rows="5" class="form-textarea" required autocomplete="off"></textarea>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="privacy_&_policy" class="form-label"> Privacy & Policy </label>
                        <input id="privacy_&_policy" type="text" name="privacy_&_policy" class="form-control" required autocomplete="off">
                    </div>
                    <button type="button" class="btn btn-theme px-4 mt-2">
                        Add new line
                    </button>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="terms_&_conditions" class="form-label"> Terms & Conditions </label>
                        <input id="terms_&_conditions" type="text" name="terms_&_conditions" class="form-control" required autocomplete="off">
                    </div>
                    <button type="button" class="btn btn-theme px-4 mt-2">
                        Add new line
                    </button>
                </div>
            </form>

        </div>
    </div>

    <!-- preloader -->
    <preloader v-if="loading"/>

</template>

<script>

import preloader from "../components/preloader.vue";
import breadcrumb from "../components/breadcrumb.vue";

export default {
    components: {
        preloader, breadcrumb
    },
    data(){
        return {
            BreadcrumbItems: [
                { title: 'Dashboard', route: 'dashboard' },
                { title: 'About', route: 'about' },
            ],
            loading: false,
        }
    },
    mounted() {
    },
    methods: {
    }
}

</script>
