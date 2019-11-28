<template>
<div class="product">
  <div class="card">
    <div class="card-image">
      <figure class="image is-4by3">
        <img class="image-proper" :src= "product.picture" alt="Placeholder image"/>
        <img class="brand-overlay" :src="brandOverlay" alt="Placeholder image"/>
      </figure>
    </div>
  <div class="card-content">
    <p class="title is-4">{{product.name}}</p>
    <div class="media">
      <div class="media-left">
        <SelectionOrder v-bind:product="product" v-on:size-select="selectPrice" v-bind:orderprice="select"  v-bind:orderpricelast="lastSelectedPrice" v-bind:orderpromo="currentPromo"/>
      <div class="media-content">
      </div>
        <p class="subtitle is-6">Price: <b>{{select}}</b>
          <i v-if="currentPromo" class="promo-true">{{lastSelectedPrice}}</i>
          <i v-else class="promo-false"></i>
      </p>
      <b v-if="currentPromo" class="is-6 sale">Зниждка!</b>
      <b v-else class="is-6">Без знижки</b>
      </div>
    </div>

    <div class="content"> <b>Ингридиенты: </b>
      {{product.description}}
      <br>
      <b>Дата и время: </b>
      <time datetime="product.time">{{product.time}}</time>
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
  components: {
    SelectionOrder
  },
  props: ['product'],
  methods: {
    selectPrice (size) {
      console.log(size)
      switch (size) {
        case '24cm':
          this.select = this.product.currentprice.s
          this.lastSelectedPrice = this.product.lastprice.s
          this.currentPromo = this.product.promo.s
          break
        case '30cm':
          this.select = this.product.currentprice.m
          this.lastSelectedPrice = this.product.lastprice.m
          this.currentPromo = this.product.promo.m
          break
        case '35cm':
          this.select = this.product.currentprice.xl
          this.lastSelectedPrice = this.product.lastprice.xl
          this.currentPromo = this.product.promo.xl
          break
        default:
          this.select = this.product.currentprice.xl
          this.lastSelectedPrice = this.product.lastprice.xl
          this.currentPromo = this.product.promo.xl
      }
    }
  },
  msg: {
    type: String,
    required: false
  },
  data: function () {
    return {
      image: image,
      brandOverlay: brandOverlay,
      chartIcon: chartIcon,
      select: this.product.currentprice.xl,
      lastSelectedPrice: this.product.lastprice.xl,
      currentPromo: this.product.promo.xl
    }
  }
}
</script>

<style scoped lang="scss">
// *{
//   outline: 1px dotted red;
// }
.image{
}
.image-proper{
}
.extra-paddings{
  padding-top: 3px;
  padding-bottom: 3px;
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
  color: #ff0000;
}
.promo-false{
  color: #ffffff;
}
.sale {
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
