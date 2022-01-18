window.Vue = require('vue');

import Vue from "vue";

// Vue.component('app', require('./components/views/App.vue').default);

import App from "./components/App.vue";

const app = new Vue({
    el: '#app',
    render: h => h(App)
});

// Quando uso la function render nel div padre metterà quello che ci sarà nella funzione render
// e cancellerà tutto quello che già c'è. In questo caso metterà h(App) in guest.home dove è importato vue e dove c'è il div #app,
// cancellando tutto quello che già c'è