export default ({
  state: {
    products: [
    ],
    productsChart: [
    ]
  },
  mutations: {
    addToChart (state, payload) {
      state.productsChart.push(payload)
    },
    addToProducts (state, payload) {
      state.products.push(payload)
    },
    delete (state, ids) {
      state.productsChart = state.productsChart.filter(function (obj) {
        return obj.id !== ids
      })
    }
  },
  actions: {
    Update ({ commit }, payload) { commit('Update', payload) }
  },
  getters: {
    products (state) {
      return state.products
    },
    productsChart (state) {
      return state.productsChart
    }
  }
})
