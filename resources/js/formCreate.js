window.Vue = require('vue');

Vue.component('form-address', require('./components/FormAddress.vue').default);

const app = new Vue({
    el: '#app',
    rendere: h=>h(App)
});