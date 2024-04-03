<template>
    <Preloader v-if="loading"/>
    <Header/>
    <router-view/>
    <Footer/>
</template>

<script>
import Header from "./includes/header.vue";
import Footer from "./includes/footer.vue";
import Preloader from "./includes/preloader.vue";

export default {
    components: {
        Header,Footer, Preloader
    },
    data() {
        return {
            loading: true,
        }
    },
    mounted() {
        setTimeout( () => {
            this.loading = false;
        },5000)
    },
    methods: {

    }
}

</script>
