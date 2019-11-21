<template>
  <section>
    <div class="block">
     <b-radio class="extra-paddings" v-model="radio"
     name="name"
     type="is-danger"
     native-value="35cm">
     XL
    </b-radio>
    <b-radio class="extra-paddings" v-model="radio"
     name="name"
     type="is-success"
     native-value="30cm">
     M &nbsp;
     </b-radio>
     <b-radio class="extra-paddings" v-model="radio"
     name="name"
     native-value="24cm">
     S &nbsp;
     </b-radio>
       <b-button class="extra-paddings-button-chart" @click="addProduct(product)"><b-icon class="icon-button" label="Videos" icon="shopping-cart"></b-icon></b-button>
     </div>
     <p class="content">
       <b>Pizza size:</b>
     {{ radio }}
     </p>
  </section>
</template>

<script>
export default {
  name: 'SelectionOrder',
  methods: {
    snackbar () {
      this.$buefy.snackbar.open(`Default, positioned isbottom with a green 'OK' button`)
    },
    addProduct (ids) {
      this.$buefy.snackbar.open({
        message: 'Product added to chart',
        position: 'is-bottom',
        actionText: 'Go to Chart',
        onAction: () => {
          this.$buefy.toast.open({
            message: 'Action pressed',
            queue: false
          })
          this.$router.push({ path: 'chart' })
        }
      })
      // this.$store.state.chart = ''
      // this.$store.dispatch('deletex', 0)
      this.$store.commit('addToChart', ids)
      // -> 1addToChart
    }
  },
  props: ['product'],
  components: {},
  data: function () {
    return {
      radio: '35cm'
    }
  }
}
</script>

<style scoped lang="scss">
// *{
//   outline: 1px dotted red;
// }
.icon-button{
  margin:0px;
  padding:0px;
  height: 44px;
  width: 44px;
  // outline: 1px dotted red;
}
.extra-paddings{
  padding-top: 12px;
  padding-bottom: 4px;
}
.extra-paddings-button-chart{
  margin-left: 20px;
  height: 44px;
  width: 44px;
}
</style>
