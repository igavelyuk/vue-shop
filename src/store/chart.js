export default ({
  state: {
    chart: []
  },
  actions: {
    Update ({ commit }, payload) { commit('Update', payload) }
  },
  getters: {
    chart (state) {
      return state.chart
    }
  }
})
