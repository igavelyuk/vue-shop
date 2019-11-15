<template>

  <div id="app">
      <Menu msg="This is a footer component"/>
    <div class="container is-fullhd">
      <div class="notification">
        <router-view/>
        <Footer msg="This is a footer component" copyInfo="Opensource" />
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import Menu from '@/components/Menu.vue'
import Footer from '@/components/Footer.vue'

export default {
  name: 'home',
  methods: {
  },
  components: {
    Menu,
    Footer
  }
}

</script>

<style lang="scss">

  body {
    margin: 0;
  }
  #app {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
  }

  #nav {
    padding: 30px;

    a {
      font-weight: bold;
      color: #2c3e50;

      &.router-link-exact-active {
        color: #42b983;
      }
    }
  }

</style>
