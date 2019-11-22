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
       <b-button class="extra-paddings-button-chart" @click="addProduct(product)" type="is-primary" outlined pack="fas" icon-left="shopping-cart"></b-button>
     </div>
     <p class="content">
       <b>Pizza size:</b>
     {{ radio }}
     </p>
  </section>
</template>

<script>
import uuid from 'uuid'
export default {
  name: 'SelectionOrder',
  methods: {
    snackbar () {
      this.$buefy.snackbar.open(`Default, positioned isbottom with a green 'OK' button`)
    },
    addProduct (product) {
      // console.log('-------------PRODUCT--------------')
      // console.log(product)
      // console.log('-------------PRODUCT--------------')
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
      const newProduct = {
        currentprice: product.currentprice,
        description: product.description,
        icon: product.icon,
        id: uuid(),
        name: product.name,
        picture: product.picture,
        promo: product.promo,
        quantity: product.quantity,
        size: this.radio
      }
      this.$store.commit('addToChart', newProduct)
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
