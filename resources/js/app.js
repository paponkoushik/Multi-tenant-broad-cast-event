
require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('blog', require('./components/Blog.vue').default);

const app = new Vue({
    el: '#app',
});
