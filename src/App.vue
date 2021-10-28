<template>
  <div id="app">
    <b-loading :is-full-page="isFullPage" :active.sync="isLoading" :can-cancel="true"></b-loading>
    <Menu />
    <div class="container is-widescreen is-fullhd">
      <div class="maincontainer notification">
        <router-view/>
        <Footer msg="" copyInfo="gavelWeb 2019" />
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import Menu from '@/components/Menu.vue'
import Footer from '@/components/Footer.vue'
import store from './store'
import firebase from 'firebase'
export default {
  name: 'home',
  data () {
    return {
      status: false,
      isLoading: false,
      isFullPage: true
    }
  },
  created: function () {
    if (this.status === false) {
      this.loadData()
      this.status = true
      this.isLoading = true
      setTimeout(() => {
        this.isLoading = false
      }, 1 * 1000)
    }
  },
  methods: {
    loadData: function () {
      console.log('Pass Firebase')
      firebase.analytics()
      //var databasedd = firebase.database()
      //var dbRef = databasedd.ref()
      var dbRef = {
          "products": [
            {
              "currentprice": {
                "m": 129,
                "s": 79,
                "xl": 199
              },
              "description": "соус Бешамель, сир Моцарелла, масліни, гриби, ковбаса Пепероні",
              "icon": "https://firebasestorage.googleapis.com/v0/b/pizzapanda-cad4c.appspot.com/o/Pictures%2Fpaparazzi.jpg?alt=media&token=190bbb38-5d78-406f-8cb7-4d800f9d6196",
              "id": 1,
              "lastprice": {
                "m": 140,
                "s": 110,
                "xl": 210
              },
              "name": "Папарацци",
              "picture": "https://firebasestorage.googleapis.com/v0/b/pizzapanda-cad4c.appspot.com/o/Pictures%2Fpaparazzi.jpg?alt=media&token=190bbb38-5d78-406f-8cb7-4d800f9d6196",
              "promo": {
                "m": true,
                "s": false,
                "xl": true
              },
              "quantity": 1,
              "size": {
                "m": 74,
                "s": 79,
                "xl": 89
              }
            },
            {
              "currentprice": {
                "m": 135,
                "s": 0,
                "xl": 169
              },
              "description": "Котлета-бургер, Бекон, сир Моцарела, сир Чедер, огірок маринований, цибуля, соус вершковий, гірчиця (негостра)",
              "icon": "https://firebasestorage.googleapis.com/v0/b/pizzapanda-cad4c.appspot.com/o/Pictures%2Fpitsburg.jpeg?alt=media&token=41dfcb3e-d3f0-4f55-a2e1-9c7fa52f38df",
              "id": 2,
              "lastprice": {
                "m": 140,
                "s": 110,
                "xl": 170
              },
              "name": "Пицбург",
              "picture": "https://firebasestorage.googleapis.com/v0/b/pizzapanda-cad4c.appspot.com/o/Pictures%2Fpitsburg.jpeg?alt=media&token=41dfcb3e-d3f0-4f55-a2e1-9c7fa52f38df",
              "promo": {
                "m": true,
                "s": false,
                "xl": true
              },
              "quantity": 1,
              "size": {
                "m": 74,
                "s": 79,
                "xl": 89
              }
            }
          ],
          "productsChart": [
          ]
      }
      dbRef.on('value', function (datax) {
        var data = datax.val()
        console.log(data)
        // var fixedJson = JSON.parse(data)
        let nodes = JSON.parse(JSON.stringify(data.products))
        console.log(nodes)
        console.log(nodes.length)
        console.log(nodes[0])
        // console.log(fixedJson.products)
        nodes.forEach((node) => {
          store.commit('addToProducts', node)
          store.commit('addToBackup', node)
        })
        nodes = JSON.parse(JSON.stringify(data.sale))
        console.log(nodes)
        console.log(nodes.length)
        console.log(nodes[0])
        // console.log(fixedJson.products)
        nodes.forEach((node) => {
          store.commit('addToSale', node)
        })
      })
      // this.loadData()
      // this.status = true
      // this.isLoading = false
    }
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
  .maincontainer {
    background: #ffffff!important;
  }

</style>
