<template>
  <div class="home">
    <Main v-bind:products="products" />
  </div>
</template>

<script>
// @ is an alias to /src
import Main from '@/components/Main.vue'

export default {
  name: 'Home',
  beforeCreate () {
    console.log('Nothing gets called before me!')
  },
  props: {
    msg: {
      type: String,
      required: false
    },
    products: []
  },
  components: {
    Main
  }
}
</script>
