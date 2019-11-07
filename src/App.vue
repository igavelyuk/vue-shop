<template>
<div id="app">
  <router-link to="/">Home</router-link> |
  <router-link to="/about">About</router-link>
  <router-view />
  <Menu />
  <Main v-bind:products="products" />
  <hr/>
  <Main v-bind:pizzas="pizzas" />
  <Footer msg="This is a footer component" copyInfo="Opensource" />
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
          name: 'Napoletano',
          promo: false,
          lastprice: 300,
          currentprice: 200,
          size: 2,
          description: 'Some description ipsum lorem',
          icon: '../assets/pic.jpg',
          picture: '../assets/pic.jpg'
        },
        {
          id: 2,
          name: 'Napoletano 2',
          promo: true,
          lastprice: 300,
          currentprice: 200,
          size: 2,
          description: 'Some description ipsum lorem',
          icon: '../assets/pic.jpg',
          picture: '../assets/pic.jpg'
        },
        {
          id: 3,
          name: 'Napoletano',
          promo: false,
          lastprice: 300,
          currentprice: 200,
          size: 2,
          description: 'Some description ipsum lorem',
          icon: '../assets/pic.jpg',
          picture: '../assets/pic.jpg'
        },
        {
          id: 4,
          name: 'Napoletano 2',
          promo: true,
          lastprice: 300,
          currentprice: 200,
          size: 2,
          description: 'Some description ipsum lorem',
          icon: '../assets/pic.jpg',
          picture: '../assets/pic.jpg'
        }
      ],
      pizzas: [
        {
          id: 5,
          name: 'dddddddno',
          promo: false,
          lastprice: 300,
          currentprice: 200,
          size: 2,
          description: 'Some description ipsum lorem',
          icon: '../assets/pic.jpg',
          picture: '../assets/pic.jpg'
        },
        {
          id: 6,
          name: 'Ndvdvdv 2',
          promo: true,
          lastprice: 300,
          currentprice: 200,
          size: 2,
          description: 'Some description ipsum lorem',
          icon: '../assets/pic.jpg',
          picture: '../assets/pic.jpg'
        },
        {
          id: 7,
          name: 'Navddvdvno',
          promo: false,
          lastprice: 300,
          currentprice: 200,
          size: 2,
          description: 'Some description ipsum lorem',
          icon: '../assets/pic.jpg',
          picture: '../assets/pic.jpg'
        },
        {
          id: 8,
          name: 'Navdvdvo 2',
          promo: true,
          lastprice: 300,
          currentprice: 200,
          size: 2,
          description: 'Some description ipsum lorem',
          icon: '../assets/pic.jpg',
          picture: '../assets/pic.jpg'
        },
        {
          id: 9,
          name: 'Navddvdvno',
          promo: false,
          lastprice: 300,
          currentprice: 200,
          size: 2,
          description: 'Some description ipsum lorem',
          icon: '../assets/pic.jpg',
          picture: '../assets/pic.jpg'
        },
        {
          id: 10,
          name: 'Navdvdvo 2',
          promo: true,
          lastprice: 300,
          currentprice: 200,
          size: 2,
          description: 'Some description ipsum lorem',
          icon: '../assets/pic.jpg',
          picture: '../assets/pic.jpg'
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
    display: flex;
    flex-direction: column;
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
