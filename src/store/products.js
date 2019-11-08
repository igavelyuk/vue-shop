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
        picture: '../assets/pic.jpg'
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
        picture: '../assets/pic.jpg'
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
        picture: '../assets/pic.jpg'
      }
    ]
  },
  actions: {
    Update ({ commit }, payload) { commit('Update', payload) }
  },
  getters: {
    products (state) {
      return state.products
    }
  }
})
