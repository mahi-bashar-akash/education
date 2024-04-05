<template>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb fs-5">
            <li class="breadcrumb-item" >
                {{ moduleName }}
            </li>
        </ol>
    </nav>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" v-for="each in items">
                <router-link :to="{name: each.route}" class="text-decoration-none text-light-gray">
                    {{ each.title }}
                </router-link>
            </li>
        </ol>
    </nav>

</template>

<script>

export default {
    props: ['items', 'moduleName'],
    data() {
        return {  }
    },
    mounted() {  },
    methods: {  }
}

</script>
