``<template>
<div class="product">
  <div class="card">
    <div class="card-image">
      <figure class="image is-1by1">
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
        <p class="subtitle is-6">Ціна: <b>{{select}}</b> грн
          <i v-if="currentPromo" class="promo-true">{{lastSelectedPrice}} грн</i>
          <i v-else class="promo-false"></i>
      </p>
      <ol>
        <li v-if="currentPromo" class="is-6"><b class="sale">Знижка!</b>
        <li v-else> <b class="is-6">Без знижки</b></li>
        <li v-if="checkHappyHours()"><b class="is-6 sale">{{superSale.description}} <br/> {{superSale.time_start}}:00 - {{superSale.time_end}}:00 <br/> при перевищенні {{superSale.price_over}} грн,<br/> {{superSale.sale}} % на одну<br/> за рандомом.</b></li>
      </ol>
      </div>
    </div>

    <div class="content"> <b>Ингридиенты: </b>
      {{product.description}}
      <br>
      <i>Дата та час: </i>
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
import brandOverlay from '../assets/overlay.png'
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
    },
    checkHappyHours () {
      const globalDate = new Date()
      const getDayOfWeek = globalDate.getDay()
      const getHours = globalDate.getHours()
      const destructionDoW = this.superSale.dayofweekpromo.split('')
      console.log(getDayOfWeek)
      console.log(getHours)
      console.log(parseInt(this.superSale.time_start))
      console.log(destructionDoW)
      if (getDayOfWeek >= parseInt(destructionDoW[0]) && getDayOfWeek <= parseInt(destructionDoW[1])) {
        if (getHours >= parseInt(this.superSale.time_start) && getHours <= parseInt(this.superSale.time_end)) {
          this.$store.commit('dailyPromo', true)
          return true
        } else {
          return false
        }
      }
    }
  },
  msg: {
    type: String,
    required: false
  },
  data: function () {
    return {
      brandOverlay: brandOverlay,
      select: this.product.currentprice.xl,
      lastSelectedPrice: this.product.lastprice.xl,
      currentPromo: this.product.promo.xl,
      superSale: this.$store.getters.sale[0],
      activeDailyPromo: this.$store.getters.dailypromo
    }
  }
}
</script>

<style scoped lang="scss">
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
  top:80%!important;
  left:60%!important;
  bottom: 0!important;
  height:40px!important;
  width: 120px!important;
  opacity: 0.6;
  filter: alpha(opacity=60);
  /* For IE8 and earlier */
    border-radius: 5 px;
}
.promo-true {
  text-decoration: line-through;
  color: #cc0000;
}
.promo-false{
  color: #ffffff;
}
.sale {
  color: #cc0000;
}
</style>
