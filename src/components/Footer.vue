<template>
<div class="footer">{{msg}}</div>
</template>

<script>
export default {
  name: 'Footer',
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

.footer {
  background:#fac0c0;
  bottom: 0;
  position: absolute;
  width: 100%;
}
</style>
