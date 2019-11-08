<template>
  <div class="home">
    <Main v-bind:products="products" />
  </div>
</template>

<script>
// @ is an alias to /src
import Main from '@/components/Main.vue'

export default {
  name: 'home',
  components: {
    Main
  }
}
</script>
