<template>
<div class="product">
  <div v-bind:key="products.id" v-for = "products in products">
    <h3>{{products.title}}</h3>
  </div>
</div>
</template>

<script>
export default {
  name: 'Product',
  props: ['products']
}
</script>

<style scoped lang="scss">
.product{
  background-color: ff8888;
  display: block;
  margin: auto;
}
</style>
