import Vue from 'vue'

import store from './store.js'
import App from './components/AppComponent.vue'
Vue.component('app-component', require('./components/AppComponent.vue').default)

const app = new Vue({
    el: '#app',
    components: { App },
    store,
    
});