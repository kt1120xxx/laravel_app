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

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// ページネーションcomponent追加
Vue.component('sample-component', require('./components/SampleComponent.vue').default);

// apiテストcomponent追加
Vue.component('api-component', require('./components/ApiComponent.vue').default);
Vue.component('Result', require('./components/serach/Result.vue').default);
Vue.component('Parent', require('./components/Parent.vue').default);
Vue.component('Child', require('./components/Child.vue').default);

// taskアプリ
Vue.component('week-parent', require('./components/routine/weekParent.vue').default);
Vue.component('week-child', require('./components/routine/weekChild.vue').default);
Vue.component('side-menu', require('./components/routine/sideMenu.vue').default);
Vue.component('english_quize', require('./components/english/Quize.vue').default);

const app = new Vue({
    el: '#app',
});
