import {createRouter, createWebHistory} from "vue-router";

/*
|
|--------------------------------------------------------------------------
| Home Pages
|--------------------------------------------------------------------------
|
*/

import layout from "../layout/layout.vue";
import home from "../pages/home.vue";
import about from "../pages/about.vue";
import courses from "../pages/courses.vue";
import blog from "../pages/blog.vue";
import contact from "../pages/contact.vue";
import login from "../pages/login.vue";
import register from "../pages/register.vue";
import forget from "../pages/forget.vue";

const TITLE = window.core.APP_NAME

const ROOT_URL = "/";

const routes = [

    {

        path: ROOT_URL, name: 'layout', component: layout,

        children: [

            { path: ROOT_URL + 'home', name: 'home', component: home, meta: { title: TITLE + ' - home' } },
            { path: ROOT_URL + 'about', name: 'about', component: about, meta: { title: TITLE + ' - about' } },
            { path: ROOT_URL + 'courses', name: 'courses', component: courses, meta: { title: TITLE + ' - courses' } },
            { path: ROOT_URL + 'blogs', name: 'blog', component: blog, meta: { title: TITLE + ' - blog' } },
            { path: ROOT_URL + 'contact', name: 'contact', component: contact, meta: { title: TITLE + ' - contact' } },
            { path: ROOT_URL + 'login', name: 'login', component: login, meta: { title: TITLE + ' - login' } },
            { path: ROOT_URL + 'register', name: 'register', component: register, meta: { title: TITLE + ' - register' } },
            { path: ROOT_URL + 'forget', name: 'forget', component: forget, meta: { title: TITLE + ' - forget' } },

        ]

    },

];

const router = createRouter({

    history: createWebHistory(),

    routes

})

export default router;
