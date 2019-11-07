<template>
<div class="product">
  <h3>{{product.name}}</h3>
  <div class="image">
    <img class="chart-icon" :src="chartIcon" alt="">
    <img class="image" :src="image" alt="">
    <img class="brand-overlay" :src="brandOverlay" alt="">

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
import image from '../assets/pic.jpg'
import brandOverlay from '../assets/overlay.png'
import chartIcon from '../assets/chart_Overlay.png'

export default {
  name: 'Product',
  components: {},
  props: ['product'],
  data: function () {
    return {
      image: image,
      brandOverlay: brandOverlay,
      chartIcon: chartIcon
    }
  }
}
</script>

<style scoped lang="scss">
$promo-false: #ff0000;
$chart-icon-bg: #ff0000;
$chart-icon-border: #000000;
$chart-icon: #ff8888;
$image-bg: #ddeedd;
.product {
    display: block;
    margin: auto;
    position: relative;
    top: 0;
    left: 0;
}

@media (min-height: 680px), screen and (orientation: portrait) {
    .image {
        position: relative;
        top: 0;
        left: 0;
        height: 10rem;
        width: auto;
        background-color: $image-bg;
    }
    .brand-overlay {
        position: absolute;
        top: 30%;
        left: 30%;
        width: 50%;
        opacity: 0.8;
        filter: alpha(opacity=80);
        /* For IE8 and earlier */
        border-radius: 5 px;
        z-index: 1;
    }
    .chart-icon {
        position: absolute;
        height: 20px;
        width: 20px;
        padding: 10px;
        border: 2px solid $chart-icon-border;
        background: $chart-icon-bg;
        border-radius: 5px;
        color: $chart-icon;
        z-index: 2;
    }
    .promo-true {
        text-decoration: line-through;
    }
    .promo-false {
        color: $promo-false;
    }
}
@media (min-height: 680px), screen and (orientation: landscape)  {
    .image {
        position: relative;
        top: 0;
        left: 0;
        height: 100px;
        width: auto;
        background-color: $image-bg;
    }
    .brand-overlay {
        position: absolute;
        top: 40%;
        left: 0;
        width: 98%;
        height: auto;
        opacity: 0.8;
        filter: alpha(opacity=80);
        /* For IE8 and earlier */
        border-radius: 5 px;
    }
    .chart-icon {
        float: right;
        position: absolute;
        top: 5px;
        left: 150px;
        height: 20px;
        width: 20px;
        padding: 10px;
        border: 2px solid $chart-icon-border;
        background: magenta;
        border-radius: 5px;
        color: $chart-icon;
    }
    .promo-true {
        text-decoration: line-through;
    }
    .promo-false {
        color: $promo-false;
    }
}
</style>
