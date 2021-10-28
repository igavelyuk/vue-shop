import Vue from 'vue'
import Buefy from 'buefy'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import store from './store'
import 'buefy/dist/buefy.css'
// import keys from './security/keys.js'

// Vue.use(Buefy)
import '../node_modules/@fortawesome/fontawesome-free/js/all.js'
import { library } from '@fortawesome/fontawesome-svg-core'
// internal icons
import { faCheck, faCheckCircle, faInfoCircle, faExclamationTriangle, faExclamationCircle, faArrowUp, faAngleRight, faAngleLeft, faAngleDown, faEye, faEyeSlash, faCaretDown, faCaretUp, faUpload } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

// import firebase from 'firebase'
// // Firebase App (the core Firebase SDK) is always required and must be listed first
// import * as firebase from 'firebase/app'
// // If you enabled Analytics in your project, add the Firebase SDK for Analytics
// import 'firebase/analytics'
//
// // Add the Firebase products that you want to use
// import 'firebase/auth'
// import 'firebase/firestore'

library.add(faCheck, faCheckCircle, faInfoCircle, faExclamationTriangle, faExclamationCircle, faArrowUp, faAngleRight, faAngleLeft, faAngleDown, faEye, faEyeSlash, faCaretDown, faCaretUp, faUpload)
Vue.component('vue-fontawesome', FontAwesomeIcon)

// import Buefy from 'buefy'
Vue.use(Buefy, {
  defaultIconComponent: 'vue-fontawesome',
  defaultIconPack: 'fas'
})
// fonts

Vue.config.productionTip = true
// const firebaseConfig = {
//   apiKey: keys.apiKey,
//   authDomain: keys.authDomain,
//   databaseURL: keys.databaseURL,
//   projectId: keys.projectId,
//   storageBucket: keys.storageBucket,
//   messagingSenderId: keys.messagingSenderId,
//   appId: keys.appId,
//   measurementId: keys.measurementId
// }

// firebase.initializeApp(firebaseConfig)
// new Vue({
//   router,
//   store,
//   render: h => h(App)
// }).$mount('#app')
