export default ({
  state: {
    products: [
    ],
    backup: [
    ],
    productsChart: [
    ],
    sale: [
    ],
    activedailyPromo: false
  },
  mutations: {
    dailyPromo (state, payload) {
      state.activedailyPromo = payload
    },
    addToChart (state, payload) {
      state.productsChart.push(payload)
    },
    addToProducts (state, payload) {
      state.products.push(payload)
    },
    addToSale (state, payload) {
      state.sale.push(payload)
    },
    addToBackup (state, payload) {
      state.backup.push(payload)
    },
    restoreBackup (state) {
      state.products = state.backup
    },
    delete (state, ids) {
      state.productsChart = state.productsChart.filter(function (obj) {
        return obj.id !== ids
      })
    },
    filterProducts (state, payload) {
      // var array = []
      // for (var i = 0; i < state.products.length; i++) {
      //   return state.products[i].name.includes(payload)
      // }
      var filtered = state.products.filter((post) => {
        return post.name.includes(payload)
      })
      state.products = filtered
    }
  },
  actions: {
    Update ({ commit }, payload) { commit('Update', payload) }
  },
  getters: {
    products (state) {
      return state.products
    },
    sale (state) {
      return state.sale
    },
    dailypromo (state) {
      return state.activedailyPromo
    },
    productsChart (state) {
      return state.productsChart
    }
  }
})
