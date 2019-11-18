import Vue from 'vue'
import Buefy from 'buefy'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import store from './store'
import 'buefy/dist/buefy.css'

// Vue.use(Buefy)
import '../node_modules/@fortawesome/fontawesome-free/js/all.js'
import { library } from '@fortawesome/fontawesome-svg-core'
// internal icons
import { faCheck, faCheckCircle, faInfoCircle, faExclamationTriangle, faExclamationCircle, faArrowUp, faAngleRight, faAngleLeft, faAngleDown, faEye, faEyeSlash, faCaretDown, faCaretUp, faUpload } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faCheck, faCheckCircle, faInfoCircle, faExclamationTriangle, faExclamationCircle, faArrowUp, faAngleRight, faAngleLeft, faAngleDown, faEye, faEyeSlash, faCaretDown, faCaretUp, faUpload)
Vue.component('vue-fontawesome', FontAwesomeIcon)

// import Buefy from 'buefy'
Vue.use(Buefy, {
  defaultIconComponent: 'vue-fontawesome',
  defaultIconPack: 'fas'
})
// fonts

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
