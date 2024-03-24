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

import events from "../pages/events.vue";

import professors from "../pages/professors.vue";

import students from "../pages/students.vue";

import courses from "../pages/courses.vue";

import library from "../pages/library.vue";

import departments from "../pages/departments.vue";

import stuff from "../pages/stuff.vue";

import holiday from "../pages/holiday.vue";

import fees from "../pages/fees.vue";

import profile from "../pages/profile.vue";

const TITLE = window.core.APP_NAME

const ROOT_URL = "/admin/";

const routes = [

    { path: ROOT_URL, name: 'layout', component: layout,

        children: [

            { path: ROOT_URL + 'dashboard', name: 'dashboard', component: dashboard, meta: { title: TITLE + ' - dashboard' } },

            { path: ROOT_URL + 'events', name: 'events', component: events, meta: { title: TITLE + ' - events' } },

            { path: ROOT_URL + 'professors', name: 'professors', component: professors, meta: { title: TITLE + ' - professors' } },

            { path: ROOT_URL + 'students', name: 'students', component: students, meta: { title: TITLE + ' - students' } },

            { path: ROOT_URL + 'courses', name: 'courses', component: courses, meta: { title: TITLE + ' - courses' } },

            { path: ROOT_URL + 'library', name: 'library', component: library, meta: { title: TITLE + ' - library' } },

            { path: ROOT_URL + 'departments', name: 'departments', component: departments, meta: { title: TITLE + ' - departments' } },

            { path: ROOT_URL + 'stuff', name: 'stuff', component: stuff, meta: { title: TITLE + ' - stuff' } },

            { path: ROOT_URL + 'holiday', name: 'holiday', component: holiday, meta: { title: TITLE + ' - holiday' } },

            { path: ROOT_URL + 'fees', name: 'fees', component: fees, meta: { title: TITLE + ' - fees' } },

            { path: ROOT_URL + 'profile', name: 'profile', component: profile, meta: { title: TITLE + ' - profile' } },

        ]

    },

];

const router = createRouter({

    history: createWebHistory(),

    routes

})

export default router;
