<template>
    <Header/>
    <div class="front-portal">
        <router-view/>
    </div>
    <Footer/>
</template>

<script>
import Header from "./includes/header.vue";
import Footer from "./includes/footer.vue";

export default {
    components: {
        Header,Footer
    },
    data() {
        return {}
    },
    mounted() {

    },
    methods: {

    }
}

</script>
