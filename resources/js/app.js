<<<<<<< HEAD

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
=======
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
>>>>>>> 8c3c0c98daefe2d2f28c07713a9a273cbcbad9cf
 */

require('./bootstrap');

<<<<<<< HEAD
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
=======
/**
 * Next, we will create a fresh React component instance and attach it to
>>>>>>> 8c3c0c98daefe2d2f28c07713a9a273cbcbad9cf
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

<<<<<<< HEAD
const app = new Vue({
    el: '#app'
});
=======
require('./components/Example');
>>>>>>> 8c3c0c98daefe2d2f28c07713a9a273cbcbad9cf
