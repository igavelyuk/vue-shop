<template>
<div class="product">
  <h3>{{product.name}}</h3>
  <div class="image">
    <img class="image" :src="image" alt="">
    <img class="image-overlay" :src="imageChart" alt="">
    <img class="image-icon" :src="imageOverlay" alt="">
  </div>
  <div>
    <b>Price:{{product.currentprice}}</b>
    <b v-if="product.promo" class="promo-false" v-bind:class="{'promo-true':product.promo}">
      {{product.lastprice}}
    </b>
  </div>
  <div class="description">
    {{product.description}}
  </div>
</div>
</template>

<script>
import image from '../assets/logo.png'
import imageChart from '../assets/chart_shop512.png'
import imageOverlay from '../assets/chart_Overlay.png'

export default {
  name: 'Product',
  components: {},
  props: ['product'],
  data: function () {
    return {
      image: image,
      imageChart: imageChart,
      imageOverlay: imageOverlay
    }
  }
}
</script>

<style scoped lang="scss">
$promo-false: #ff0000;
$chart-icon-bg: #ff0000;
$chart-icon-border: #dddddd;
$chart-icon: #ff0000;
$image-bg: #ddeedd;
.product {
    display: block;
    margin: auto;
    position: relative;
    top: 0;
    left: 0;
}
.image {
    position: relative;
    top: 0;
    left: 0;
    height: 200px;
    width: auto;
    background-color: $image-bg;
}
.image-overlay {
    position: absolute;
    top: 0px;
    left: 0px;
    height: 200px;
    width: auto;
    border: 2px solid $chart-icon-border;
    border-radius: 5 px;
}
.image-icon {
    position: absolute;
    top: 10px;
    left: 150px;
    height: 50px;
    width: 50px;
    border: 2px solid $chart-icon-border;
    background: $chart-icon-bg;
    border-radius: 50%;
    color: $chart-icon;
}
.promo-true {
    text-decoration: line-through;
}
.promo-false {
    color: $promo-false;
}
</style>
