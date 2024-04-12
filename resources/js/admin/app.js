import 'bootstrap/dist/css/bootstrap.min.css'

import 'bootstrap-icons/font/bootstrap-icons.min.css'

import bootstrap from 'bootstrap/dist/js/bootstrap.bundle.min'

window.bootstrap = bootstrap

import axios from "axios";

import app from "./app.vue";

import Toaster from '@meforma/vue-toaster';

import { createApp } from "vue";

import router from "./router/router";

createApp( app ).use(router, axios).use(Toaster).mount('#app')
