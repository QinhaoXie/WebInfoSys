import Vue from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import router from './router'
import 'vuetify/dist/vuetify.min.css';
import VueCookies from "vue-cookies";
Vue.use(VueCookies);

import { LMap, LTileLayer, LMarker } from 'vue2-leaflet';
import 'leaflet/dist/leaflet.css';
import uploader from 'vue-simple-uploader'
Vue.use(uploader)
Vue.component('l-map', LMap);
Vue.component('l-tile-layer', LTileLayer);
Vue.component('l-marker', LMarker);

new Vue({
  vuetify,
  router,
  render: h => h(App)
}).$mount('#app')
