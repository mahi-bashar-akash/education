<template>

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <div class="breadcrumb mb-0">
            <div class="breadcrumb-item" v-for="each in items">
                <router-link :to="{name: each.route}" class="text-decoration-none text-light-gray">
                    {{ each.title }}
                </router-link>
            </div>
        </div>
    </nav>

</template>

<script>

export default {
    props: [ 'items' ],
    data() {
        return {  }
    },
    mounted() {  },
    methods: {  }
}

</script>
