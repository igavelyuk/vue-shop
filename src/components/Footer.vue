<template>
  <footer class="footer" :class="className">
    <h1 v-if="msg">{{msg}}</h1>
    <p v-if="copyInfo">Copyright &copy; {{copyInfo}}</p>
  </footer>
</template>

<script>
export default {
  name: 'Footer',
  props: {
    msg: {
      type: String,
      required: false
    },
    className: {
      type: String,
      required: false
    },
    copyInfo: {
      type: String,
      required: false
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
  .footer {
    background: #fac0c0;
    bottom: 0;
    left: 0;
    position: absolute;
    width: 100%;

    h1 {
      margin:0;
    }
  }
</style>
