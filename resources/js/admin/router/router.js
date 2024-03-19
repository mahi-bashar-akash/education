import {createRouter, createWebHistory} from "vue-router";

/*
|
|--------------------------------------------------------------------------
| Admin Pages
|--------------------------------------------------------------------------
|
*/

import layout from "../layout/layout.vue";

import dashboard from "../pages/dashboard.vue";

const TITLE = window.core.APP_NAME

const ROOT_URL = "/admin/";

const routes = [

    {

        path: ROOT_URL, name: 'layout', component: layout,

        children: [

            { path: ROOT_URL + 'dashboard', name: 'dashboard', component: dashboard, meta: { title: TITLE + ' - dashboard' } },

        ]

    },

];

const router = createRouter({

    history: createWebHistory(),

    routes

})

export default router;
