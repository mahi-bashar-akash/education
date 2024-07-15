<template>

    <nav class="mt-3">
        <ul class="front-pagination pagination justify-content-center">
            <div class="page-item">
                <a class="page-link" href="javascript:void(0)" @click="PrevPage">
                    <i class="bi bi-caret-left-fill"></i>
                </a>
            </div>
            <div v-if="buttons.length <= 6" class="d-flex me-1">
                <div v-for="(page) in buttons" class="page-item"
                     :class="{'active': current_page === page}">
                    <a class="page-link" @click="pageChange(page)" href="javascript:void(0)"
                       v-text="page"></a>
                </div>
            </div>
            <div v-if="buttons.length > 6" class="d-flex">
                <div class="page-item" :class="{'active': current_page === 1}">
                    <a class="page-link" @click="pageChange(1)" href="javascript:void(0)">1</a>
                </div>
                <div v-if="current_page > 3" class="page-item">
                    <a class="page-link" @click="pageChange(current_page - 2)"
                       href="javascript:void(0)">...</a>
                </div>
                <div v-if="current_page === buttons.length" class="page-item"
                     :class="{'active': current_page === (current_page - 2)}">
                    <a class="page-link" @click="pageChange(current_page - 2)" href="javascript:void(0)"
                       v-text="current_page - 2"></a>
                </div>
                <div v-if="current_page > 2" class="page-item"
                     :class="{'active': current_page === (current_page - 1)}">
                    <a class="page-link" @click="pageChange(current_page - 1)" href="javascript:void(0)"
                       v-text="current_page - 1"></a>
                </div>
                <div v-if="current_page !== 1 && current_page !== buttons.length"
                     class="page-item active">
                    <a class="page-link" @click="pageChange(current_page)" href="javascript:void(0)"
                       v-text="current_page"></a>
                </div>
                <div v-if="current_page < buttons.length - 1" class="page-item"
                     :class="{'active': current_page === (current_page + 1)}">
                    <a class="page-link" @click="pageChange(current_page + 1)" href="javascript:void(0)"
                       v-text="current_page + 1"></a>
                </div>
                <div v-if="current_page === 1" class="page-item"
                     :class="{'active': current_page === (current_page + 2)}">
                    <a class="page-link" @click="pageChange(current_page + 2)" href="javascript:void(0)"
                       v-text="current_page + 2"></a>
                </div>
                <div v-if="current_page < buttons.length - 2" class="page-item">
                    <a class="page-link" @click="pageChange(current_page + 2)"
                       href="javascript:void(0)">...</a>
                </div>
                <div class="page-item"
                     :class="{'active': current_page === (current_page - buttons.length)}">
                    <a class="page-link" @click="pageChange(buttons.length)" href="javascript:void(0)"
                       v-text="buttons.length"></a>
                </div>
            </div>
            <div class="page-item">
                <a href="javascript:void(0)" class="page-link" @click="NextPage">
                    <i class="bi bi-caret-right-fill"></i>
                </a>
            </div>
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
    mounted() {  },
    methods: {

        // Function of previous page
        PrevPage() {
            if (this.currentPage > 1) {
                this.currentPage = this.currentPage - 1;
                this.emitPageChange();
            }
        },

        // Function of next page
        NextPage() {
            if(this.buttons.length === this.currentPage) {  }else {
                this.currentPage = this.currentPage + 1;
                this.emitPageChange();
            }
        },

        // Function of page change
        pageChange(page) {
            this.currentPage = page;
            this.emitPageChange();
        },

        // Emit page callback from another page
        emitPageChange() {
            this.$emit('page-change', this.currentPage);
        },

    }
}

</script>
