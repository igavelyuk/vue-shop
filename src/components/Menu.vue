<template>
<div class="menu">
  <router-link to="/">Home</router-link> |
  <router-link to="/about">About</router-link>
</div>
</template>

<script>
export default {
  name: 'Menu',
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

.menu {
background:#c0fac0;
}
</style>
