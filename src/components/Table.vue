<template>
  <div class="table">
      <table class="t-border">
          <thead>
              <tr>
                <th><b-icon pack="fas" icon="list-ol"></b-icon></th>
                <th>Promo</th>
                <th>Product Name</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Last price</th>
                <th>Remove</th>
              </tr>
          </thead>
          <tbody>
            <tr v-for="(product,indx) in products" :key="indx">
              <td>
                {{ indx+1 }}
                <!-- <b-icon pack="fas" icon="bullseye"></b-icon> -->
              </td>
              <td>
                <b-icon v-if="product.promo" pack="fas" icon="check-circle"></b-icon>
                <b-icon v-else pack="fas" icon="times-circle"></b-icon>
              </td>
              <td>
                {{ product.name }}
              </td>
              <td>
                {{ product.size }}
              </td>
              <td>
                {{ product.quantity }}
              </td>
              <td>
                {{ product.currentprice }}
              </td>
              <td v-if="product.promo" class = "striked">{{ product.lastprice }} </td>
              <td v-else > --- </td>
              <td>
                <div class="buttons">
                  <!-- <b-button @click="$emit('delProduct',product.id)" class="buttons" rounded type="is-danger" outlined>&#10060;</b-button> -->
                  <!-- <b-button @click="delProduct(product.id)" class="buttons" rounded type="is-danger" outlined>&#10026;</b-button> -->
                    <b-button @click="delProduct(product.id)" class="buttons" rounded type="is-danger" outlined><b-icon pack="fas" icon="times"></b-icon></b-button>
                </div>
              </td>
              </tr>
          </tbody>
      </table>
  </div>
</template>

<script>
export default {
  methods: {
    // deleteProduct (ids) {
    //   return this.$store.state.commit('deletex', 0)
    // },
    delProduct (ids) {
      // this.$store.state.chart = ''
      // this.$store.dispatch('deletex', 0)
      this.$store.commit('delete', ids)
      // -> 1
    }
  },
  computed: {
    products () {
      return this.$store.getters.productsChart
    }
  }
}
</script>

<style>
.buttons{
  /* margin: 0px!important; */
  /* padding: 0px 10px 0px 10px!important; */
}
.table{
  background: #e2e2e2;
  padding: 2px;
  font-size: 1em;
}
.t-border{
  border: 2px;
}
.striked {
  text-decoration: line-through;
  color: #ff0000;
}
</style>
