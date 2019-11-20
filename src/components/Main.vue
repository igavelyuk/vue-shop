<template>
<div class="main collumns is-1-mobile is-0-tablet is-3-desktop is-8-widescreen is-2-fullhd">{{msg}}
  <div :key="product.id" v-for="product in products" class="products">
    <Product v-bind:product="product" />
  </div>
</div>
</template>

<script>
import Product from '../components/Products.vue'

export default {
  name: 'Main',
  components: {
    Product
  },
  props: {
    product: [],
    msg: {
      type: String,
      required: false
    }
  },
  computed: {
    products () {
      return this.$store.getters.products
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
@media (min-height: 815px), screen and (orientation: portrait) {
    .main {
        background: #ffffff;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-gap: 1em;
    }
    .main > div {
        background: #eeeeee;
        padding: 1em;
    }
    .main > div:nth-child(odd) {
        background: #dddddd;
        padding: 0.1em;
    }
}
@media (min-height: 815pxpx), screen and (orientation: landscape){
    .main {
        background: #ffffff;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 0.1em;
    }
    .main > div {
        background: #eeeeee;
        padding: 0.1em;
    }
    .main > div:nth-child(odd) {
        background: #dddddd;
        padding: 0.1em;
    }
}
</style>
