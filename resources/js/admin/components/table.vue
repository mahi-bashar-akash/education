<template>
    <table :class="tableClass">
        <thead>
            <tr>
                <th v-for="(header, index) in headers" :key="index" :class="headerClasses[index]">
                    <input v-if="index === checkboxColumnIndex" type="checkbox" class="form-checkbox" v-model="allChecked" @change="toggleCheckAll">
                    <span v-else-if="index === headers.length - 1 && header === 'Action'">
                        Action
                    </span>
                    <span v-else>
                        {{ header }}
                    </span>
                </th>
            </tr>
        </thead>
        <tbody>
        <tr v-for="row in rows" :key="row.id">
            <td v-for="(value, key, index) in row" :key="key" :class="columnClasses[key]">
                <input v-if="index === checkboxColumnIndex" type="checkbox" class="form-checkbox eachEventCheck" :checked="checkIfChecked(row.id)" @change="toggleCheck($event, row.id)">
                <span v-else>
                    {{ value }}
                </span>
            </td>
            <td class="action">
                <div class="dropdown">
                    <button type="button" class="btn border-0 p-0 btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end p-2 mt-1 overflow-hidden rounded-3 border">
                        <li class="mb-2">
                            <button type="button" class="dropdown-item rounded-3" @click="editModalFunction">
                                Edit
                            </button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item rounded-3" @click="deleteModalFunction">
                                Delete
                            </button>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    props: {
        headers: Array,
        rows: Array,
        tableClass: String,
        headerClasses: Array,
        columnClasses: Object,
        checkboxColumnIndex: Number,
        editModalFunction: Function,
        deleteModalFunction: Function,
    },
    data() {
        return {
            allChecked: false,
            selected: []
        };
    },
    methods: {

        /* Function to check as single that all are checked or not checked */
        isAllChecked() {
            let uncheck = 0;
            const eachEventCheck = document.querySelectorAll('.eachEventCheck');
            for (const elm of eachEventCheck) {
                if (elm.checked === false) {
                    uncheck++;
                }
            }
            if (uncheck > 0) {
                this.allChecked = false;
            } else {
                this.allChecked = true;
            }
        },

        /* Function to toggle check all */
        toggleCheckAll(e) {
            if (e.target.checked) {
                this.rows.forEach((v) => {
                    if (!this.selected.includes(v.id)) {
                        this.selected.push(v.id);
                    }
                });
            } else {
                this.selected = [];
            }
        },

        /* Function to toggle check */
        toggleCheck(e, id) {
            if (e.target.checked) {
                if (!this.selected.includes(id)) {
                    this.selected.push(id);
                }
            } else {
                let index = this.selected.indexOf(id);
                if (index !== -1) {
                    this.selected.splice(index, 1);
                }
            }
            this.isAllChecked();
        },

        /* Function to checkIfChecked */
        checkIfChecked(id) {
            return this.selected.includes(id);
        },
    }
}
</script>
