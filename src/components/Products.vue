<template>
<div class="product">
  <div v-bind:key="el.id" v-for = "el in products">
    <h3>{{el.title}}</h3>
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

</style>
