<template>
<div class="product">
  <div class="card">
    <div class="card-image">
      <figure class="image is-4by3">
        <img :src="image" alt="Placeholder image"/>
        <img class="brand-overlay" :src="brandOverlay" alt="Placeholder image"/>
      </figure>
    </div>
  <div class="card-content">
    <p class="title is-4">{{product.name}}</p>
    <div class="media">
      <div class="media-left">
        <SelectionOrder/>
      <div class="media-content">
      </div>
        <p class="subtitle is-6">Price: <b>{{product.currentprice}}</b>
          <i v-if="product.promo" class="promo-false" v-bind:class="{'promo-true':product.promo}">
          {{product.lastprice}}
        </i>
      </p>
      <b class="is-6 sale">Sale</b>
      </div>
    </div>

    <div class="content">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus nec iaculis mauris. <a>@bulmaio</a>.
      <a href="#">#css</a> <a href="#">#responsive</a>
      <br>
      <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
    </div>
  </div>
</div>

  <!-- <h3>{{product.name}}</h3>
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
  </div> -->
</div>
</template>

<script>
import image from '../assets/pic.jpg'
import brandOverlay from '../assets/overlay.png'
import chartIcon from '../assets/chart_Overlay.png'
import SelectionOrder from '../components/SelectionOrder.vue'

export default {
  name: 'Product',
  methods: {
  },
  components: {
    SelectionOrder
  },
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
*{
  outline: 1px dotted red;
}
.extra-paddings{
  padding-top: 9px;
  padding-bottom: 9px;
}
.extra-paddings-button-chart{
  margin-left: 20px;
}
.brand-overlay {
  position: absolute!important;
  top:70%!important;
  left:60%!important;
  bottom: 0!important;
  height:50px!important;
  width: 150px!important;
  opacity: 0.6;
  filter: alpha(opacity=60);
  /* For IE8 and earlier */
    border-radius: 5 px;
}
.promo-true {
  text-decoration: line-through;
}
.promo-false, .sale {
  color: #ff0000;
}
// $promo-false: #ff0000;
// $chart-icon-bg: #ff0000;
// $chart-icon-border: #000000;
// $chart-icon: #ff8888;
// $image-bg: #ddeedd;
// .product {
//     display: block;
//     margin: auto;
//     position: relative;
//     top: 0;
//     left: 0;
// }
//
// @media (min-height: 680px), screen and (orientation: portrait) {
//     .image {
//         position: relative;
//         top: 0;
//         left: 0;
//         height: 10rem;
//         width: auto;
//         background-color: $image-bg;
//     }
//     .brand-overlay {
//         position: absolute;
//         top: 30%;
//         left: 30%;
//         width: 50%;
//         opacity: 0.8;
//         filter: alpha(opacity=80);
//         /* For IE8 and earlier */
//         border-radius: 5 px;
//         z-index: 1;
//     }
//     .chart-icon {
//         position: absolute;
//         height: 20px;
//         width: 20px;
//         padding: 10px;
//         border: 2px solid $chart-icon-border;
//         background: $chart-icon-bg;
//         border-radius: 5px;
//         color: $chart-icon;
//         z-index: 2;
//     }
//     .promo-true {
//         text-decoration: line-through;
//     }
//     .promo-false {
//         color: $promo-false;
//     }
// }
// @media (min-height: 680px), screen and (orientation: landscape)  {
//     .image {
//         position: relative;
//         top: 0;
//         left: 0;
//         height: 100px;
//         width: auto;
//         background-color: $image-bg;
//     }
//     .brand-overlay {
//         position: absolute;
//         top: 40%;
//         left: 0;
//         width: 98%;
//         height: auto;
//         opacity: 0.8;
//         filter: alpha(opacity=80);
//         /* For IE8 and earlier */
//         border-radius: 5 px;
//     }
//     .chart-icon {
//         float: right;
//         position: absolute;
//         top: 5px;
//         left: 150px;
//         height: 20px;
//         width: 20px;
//         padding: 10px;
//         border: 2px solid $chart-icon-border;
//         background: magenta;
//         border-radius: 5px;
//         color: $chart-icon;
//     }
//     .promo-true {
//         text-decoration: line-through;
//     }
//     .promo-false {
//         color: $promo-false;
//     }
// }
</style>
