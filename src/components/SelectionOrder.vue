<template>
  <section>
    <div class="block">
     <b-radio @input="$emit('size-select',radio)" class="extra-paddings" v-bind:class="{'radio-active':radio==='35cm' }" v-model="radio"
     name="name"
     type="is-danger"
     native-value="35cm">
     XL
    </b-radio>
    <b-radio @input="$emit('size-select',radio)" class="extra-paddings" v-bind:class="{'radio-active':radio==='30cm' }" v-model="radio"
     name="name"
     type="is-success"
     native-value="30cm">
     M
     </b-radio>
     <b-radio @input="$emit('size-select',radio)" class="extra-paddings" v-bind:class="{'radio-active':radio==='24cm' }" v-model="radio"
     name="name"
     native-value="24cm">
     S
     </b-radio>
       <b-button v-if="orderprice>0" class="extra-paddings-button-chart" @click="addProduct(product)" type="is-primary" outlined pack="fas" icon-left="shopping-cart"></b-button>
       <b-button v-else disabled class="extra-paddings-button-chart" type="is-primary" outlined pack="fas" icon-left="shopping-cart"></b-button>
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
      var today = new Date()
      // var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate()
      // var time = today.getHours() + ':' + today.getMinutes() + ':' + today.getSeconds()
      // var dateTime = date + ' ' + time
      // Recreate new object, othervise we change original object
      const uuidRecord = uuid()

      const newProduct = {
        currentprice: this.orderprice,
        lastprice: this.orderpricelast,
        description: product.description,
        icon: product.icon,
        id: uuidRecord,
        name: product.name,
        picture: product.picture,
        promo: this.orderpromo,
        quantity: product.quantity,
        size: this.radio,
        date: today
      }
      this.$store.commit('addToChart', newProduct)
      // -> 1addToChart
    }
  },
  props: {
    product: {
      product: []
    },
    orderprice: {
      type: Number,
      required: false
    },
    orderpricelast: {
      type: Number,
      required: false
    },
    orderpromo: {
      type: Boolean,
      required: false
    }
  },
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
  padding-bottom: 12px;
  height: 45px;
  width: 60px;
}
.extra-paddings-button-chart{
  margin-left: 20px;
  height: 44px;
  width: 44px;
}
.radio-active{
  border: 1px solid #9400ff;
  border-radius: 5px;

}
</style>
