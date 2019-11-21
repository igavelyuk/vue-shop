export default ({
  state: {
    products: [
    ],
    backup: [

    ],
    productsChart: [
    ],
    promo: [
      {
        id: 1,
        time_start: 12,
        time_end: 15,
        q_start: 1,
        q_end: 99,
        discount: 50,
        discount_price: 100
      },
      {
        id: 0,
        time_start: 0,
        time_end: 0,
        q_start: 3,
        q_end: 99,
        discount: 50,
        discount_price: 0
      }
    ]
  },
  mutations: {
    addToChart (state, payload) {
      state.productsChart.push(payload)
    },
    addToProducts (state, payload) {
      state.products.push(payload)
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
      console.log('Hello!S')
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
    productsChart (state) {
      return state.productsChart
    }
  }
})
