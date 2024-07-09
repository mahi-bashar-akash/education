<template>

    <nav class="mt-3">
        <ul class="admin-pagination pagination justify-content-center">
            <li class="page-item" @click="prevPage">
                <a class="page-link" href="javascript:void(0)">
                    <i class="bi bi-chevron-left"></i>
                </a>
            </li>
            <li v-if="buttons.length <= 6" class="d-flex me-1">
                <div v-for="(page) in buttons" class="page-item"
                     :class="{'active': current_page === page}">
                    <a class="page-link" @click="pageChange(page)" href="javascript:void(0)"
                       v-text="page"></a>
                </div>
            </li>
            <ul v-if="buttons.length > 6" class="d-flex">
                <li class="page-item" :class="{'active': current_page === 1}">
                    <a class="page-link" @click="pageChange(1)" href="javascript:void(0)">1</a>
                </li>
                <li v-if="current_page > 3" class="page-item">
                    <a class="page-link" @click="pageChange(current_page - 2)"
                       href="javascript:void(0)">...</a>
                </li>
                <li v-if="current_page === buttons.length" class="page-item"
                    :class="{'active': current_page === (current_page - 2)}">
                    <a class="page-link" @click="pageChange(current_page - 2)" href="javascript:void(0)"
                       v-text="current_page - 2"></a>
                </li>
                <li v-if="current_page > 2" class="page-item"
                    :class="{'active': current_page === (current_page - 1)}">
                    <a class="page-link" @click="pageChange(current_page - 1)" href="javascript:void(0)"
                       v-text="current_page - 1"></a>
                </li>
                <li v-if="current_page !== 1 && current_page !== buttons.length"
                    class="page-item active">
                    <a class="page-link" @click="pageChange(current_page)" href="javascript:void(0)"
                       v-text="current_page"></a>
                </li>
                <li v-if="current_page < buttons.length - 1" class="page-item"
                    :class="{'active': current_page === (current_page + 1)}">
                    <a class="page-link" @click="pageChange(current_page + 1)" href="javascript:void(0)"
                       v-text="current_page + 1"></a>
                </li>
                <li v-if="current_page === 1" class="page-item"
                    :class="{'active': current_page === (current_page + 2)}">
                    <a class="page-link" @click="pageChange(current_page + 2)" href="javascript:void(0)"
                       v-text="current_page + 2"></a>
                </li>
                <li v-if="current_page < buttons.length - 2" class="page-item">
                    <a class="page-link" @click="pageChange(current_page + 2)"
                       href="javascript:void(0)">...</a>
                </li>
                <li class="page-item" :class="{'active': current_page === (current_page - buttons.length)}">
                    <a class="page-link" @click="pageChange(buttons.length)" href="javascript:void(0)"
                       v-text="buttons.length"></a>
                </li>
            </ul>
            <li class="page-item" @click="nextPage">
                <a class="page-link" href="javascript:void(0)">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </li>
        </ul>
    </nav>

</template>

<script>

export default {
    props: {
        total_pages: Number,
        current_page: Number,
        buttons: Array,
    },
    data() {
        return {
            currentPage: this.current_page,
        }
    },
    mounted() {
    },
    methods: {
        prevPage() {
            if (this.currentPage > 1) {
                this.currentPage = this.currentPage - 1;
                this.emitPageChange();
            }
        },
        nextPage() {
            if (this.currentPage > 1) {
                this.currentPage = this.currentPage + 1;
                this.emitPageChange();
            }
        },
        pageChange(page) {
            this.currentPage = page;
            this.emitPageChange();
        },
        emitPageChange() {
            this.$emit('page-change', this.currentPage);
        },
    }
}

</script>
