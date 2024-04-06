import {createRouter, createWebHistory} from "vue-router";

/*
|
|--------------------------------------------------------------------------
| Front Pages
|--------------------------------------------------------------------------
|
*/

import layout from "../layout/layout.vue";
import home from "../pages/home.vue";
import about from "../pages/about.vue";
import courses from "../pages/course/courses.vue";
import singleCourse from "../pages/course/single-course.vue";
import blog from "../pages/blog/blog.vue";
import singleBlog from "../pages/blog/single-blog.vue";
import contact from "../pages/contact.vue";
import login from "../pages/login.vue";
import register from "../pages/register.vue";
import forget from "../pages/forget.vue";

/*
|
|--------------------------------------------------------------------------
| Profile Pages
|--------------------------------------------------------------------------
|
*/

import profileLayout from "../pages/profile/layout/layout.vue";
import profile from "../pages/profile/pages/profile.vue";
import myCourse from "../pages/profile/pages/my-course.vue";
import myClassRoom from "../pages/profile/pages/my-class.vue";
import myFees from "../pages/profile/pages/my-fees.vue";

const TITLE = window.core.APP_NAME

const ROOT_URL = "/";

const routes = [
    {
        path: ROOT_URL, name: 'layout', component: layout,
        children: [
            { path: ROOT_URL + 'home', name: 'home', component: home, meta: { title: TITLE + ' - home' } },
            { path: ROOT_URL + 'about', name: 'about', component: about, meta: { title: TITLE + ' - about' } },
            { path: ROOT_URL + 'courses', name: 'courses', component: courses, meta: { title: TITLE + ' - courses' } },
            { path: ROOT_URL + 'single-course', name: 'singleCourse', component: singleCourse, meta: { title: TITLE + ' - single course' } },
            { path: ROOT_URL + 'blogs', name: 'blog', component: blog, meta: { title: TITLE + ' - blog' } },
            { path: ROOT_URL + 'single-blogs', name: 'singleBlog', component: singleBlog, meta: { title: TITLE + ' - single blog' } },
            { path: ROOT_URL + 'contact', name: 'contact', component: contact, meta: { title: TITLE + ' - contact' } },
            { path: ROOT_URL + 'login', name: 'login', component: login, meta: { title: TITLE + ' - login' } },
            { path: ROOT_URL + 'register', name: 'register', component: register, meta: { title: TITLE + ' - register' } },
            { path: ROOT_URL + 'forget', name: 'forget', component: forget, meta: { title: TITLE + ' - forget' } },
            { path: ROOT_URL, name: 'profileLayout', component: profileLayout,
                children: [
                    { path: 'profile', name: 'profile', component: profile, meta: { title: TITLE + ' - profile' } },
                    { path: 'my-course', name: 'myCourse', component: myCourse, meta: { title: TITLE + ' - my course' } },
                    { path: 'my-class-room', name: 'myClassRoom', component: myClassRoom, meta: { title: TITLE + ' - my class room' } },
                    { path: 'my-fees', name: 'myFees', component: myFees, meta: { title: TITLE + ' - my fees' } },
                ]
            }
        ]
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to,from,savedPosition) {
        if(to.hash) {
            return {
                el: to.hash,
                behavior: 'smooth',
            };
        }else {
            return { top: 0, behavior: 'smooth' };
        }
    }
})

export default router;
