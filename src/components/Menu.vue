<template>
<div class="menu">
  <h2>Menu Text {{msg}}</h2>
</div>
</template>

<script>
export default {
  name: 'Menu',
  props: {
    msg: {
      type: String,
      required: false
    }
  }
}
</script>

<style scoped lang="scss">
.menu {
    background: #c0fac0;
}
</style>
