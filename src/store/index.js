import Vue from 'vue'
import Vuex from 'vuex'
import products from './products'
import chart from './chart'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    products,
    chart
  }
})
