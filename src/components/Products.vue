<template>
<div class="product">
    <h3>{{product.name}}</h3>
    <div class="image">
    </div>
    <div>
      <b>Price:{{product.currentprice}}
        <b class = "promo-false" v-bind:class = "{'promo-true':product.promo}">{{product.lastprice}}</b>
      </b>
    </div>
</div>
</template>

<script>
export default {
  name: 'Product',
  props: ['product']
}
</script>

<style scoped lang="scss">
.product{
  display: block;
  margin: auto;
}
.image{
  height: 300px;
  width: 300px;
  background-color: #882222;
}
.promo-true{
  text-decoration: line-through;
  background: red;
}
.promo-false{
  color: white;
}
</style>
