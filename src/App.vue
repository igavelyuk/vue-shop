<template>
  <div id="app">
    <Menu/>
    <Main msg="This is a main component" />
    <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link>
      <router-view />
    <Footer msg="This is a footer component" />
  </div>
</template>

<script>
// @ is an alias to /src
import Menu from '@/components/Menu.vue'
import Main from '@/components/Main.vue'
import Footer from '@/components/Footer.vue'

export default {
  name: 'home',
  components: {
    Menu,
    Main,
    Footer
  },
  data () {
    return {
      products: [
        {
          id: 1,
          title: 'Pizza Ua',
          promo: true,
          price: 80,
          size: 6,
          description: 'Ukraine pizza'
        },
        {
          id: 1,
          title: 'Pizza It',
          promo: true,
          price: 80,
          size: 10,
          description: 'Napoli pizza'
        },
        {
          id: 1,
          title: 'Pizza Uk',
          promo: true,
          price: 80,
          size: 8,
          description: 'Uk pizza'
        },
        {
          id: 1,
          title: 'Pizza USA',
          promo: true,
          price: 80,
          size: 16,
          description: 'Made in USA pizza'
        }
      ]
    }
  }
}
</script>

<style lang="scss">
body {
  margin: 0;
}
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
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
