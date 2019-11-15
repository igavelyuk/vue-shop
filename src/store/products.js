export default ({
  state: {
    products: [
      {
        id: 1,
        name: 'Napoletano',
        promo: false,
        lastprice: 300,
        currentprice: 200,
        size: 'xl',
        description: 'Some description ipsum lorem',
        icon: '../assets/pic.jpg',
        picture: '../assets/pic.jpg',
        qty: '1'
      },
      {
        id: 2,
        name: 'Napoletano 2',
        promo: true,
        lastprice: 300,
        currentprice: 200,
        size: 'xl',
        description: 'Some description ipsum lorem',
        icon: '../assets/pic.jpg',
        picture: '../assets/pic.jpg',
        qty: '1'
      },
      {
        id: 3,
        name: 'Napoletano',
        promo: false,
        lastprice: 300,
        currentprice: 200,
        size: 'xl',
        description: 'Some description ipsum lorem',
        icon: '../assets/pic.jpg',
        picture: '../assets/pic.jpg',
        qty: '1'
      },
      {
        id: 4,
        name: 'NDDFDtano',
        promo: false,
        lastprice: 300,
        currentprice: 200,
        size: 'xl',
        description: 'Some description ipsum lorem',
        icon: '../assets/pic.jpg',
        picture: '../assets/pic.jpg',
        qty: '1'
      }
    ],
    productsChart: [
    ]
  },
  mutations: {
    addToChart (state, payload) {
      state.productsChart.push(payload)
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
