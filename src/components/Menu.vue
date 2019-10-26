<template>
<div class="menu">{{msg}}</div>
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
