<template>

    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <router-link :to="{name: 'dashboard'}" class="text-decoration-none text-light-gray">
                    Dashboard
                </router-link>
            </li>
        </ol>
    </nav>

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
