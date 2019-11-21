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
    margin-top: 20px;
    background: #f0f0f0;
    flex-shrink: 0;

    h1 {
      margin:0;
    }
  }
</style>
