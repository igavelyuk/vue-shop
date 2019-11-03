<template>
<div class="main">{{msg}}
  <div :key="product.id" v-for="product in products" class="products">
    <Product v-bind:product="product"/>
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
  props: ['products']
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.main {
    background: #ffffff;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 1em;
}
.main > div{
  background: #eeeeee;
  padding: 1em;
}
.main > div:nth-child(odd){
  background: #dddddd;
  padding: 1em;
}
</style>
