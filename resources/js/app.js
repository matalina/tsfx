/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import VueRouter from 'vue-router';
import BootstrapVue from 'bootstrap-vue';

import routes from './routes';
import Event from './event';
import store from './store';

import App from './views/App';

const router = new VueRouter({
    routes
});

router.beforeEach((to, from, next) => {
    console.log(to.path);
    if(to.path === '/') {
        if (store.state.user !== undefined && store.state.user !== null && store.state.user !== {}) {
            return next('/dashboard');
        }
    }
    else {
        if (store.state.user === undefined || store.state.user === null || store.state.user === {}) {
            return next('/');
        }

        next();
    }
});

Vue.use(VueRouter);
Vue.use(BootstrapVue);
window.EventBus = Event;

let app = new Vue({
    el: '#app',
    components: { App },
    template: '<App/>',
    store,
    router,
});
