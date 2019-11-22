<template>
  <div id="app">
    <b-loading :is-full-page="isFullPage" :active.sync="isLoading" :can-cancel="true"></b-loading>
    <Menu />
    <div class="container is-fullhd">
      <div class="maincontainer notification">
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
      var databasedd = firebase.database()
      var dbRef = databasedd.ref()

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
