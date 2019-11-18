<template>
  <div id="app">{{status}}
      <Menu />
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
// Firebase App (the core Firebase SDK) is always required and must be listed first
import * as firebase from 'firebase/app'
// If you enabled Analytics in your project, add the Firebase SDK for Analytics
import 'firebase/analytics'

// import axios from 'axios'
// Add the Firebase products that you want to use
import 'firebase/auth'
import 'firebase/firestore'
const firebaseConfig = {
  apiKey: 'AIzaSyCfuNPEtK6zI23THVVKaS1D9fkUYTeWZaA',
  authDomain: 'pizzapanda-cad4c.firebaseapp.com',
  databaseURL: 'https://pizzapanda-cad4c.firebaseio.com',
  projectId: 'pizzapanda-cad4c',
  storageBucket: 'pizzapanda-cad4c.appspot.com',
  messagingSenderId: '13022259211',
  appId: '1:13022259211:web:0812d47f5b521e8603ff0e',
  measurementId: 'G-79D3KWHE21'
}
// Initialize Firebase
firebase.initializeApp(firebaseConfig)

export default {
  name: 'home',
  data () {
    return {
      status: ''
    }
  },
  beforeMount: function () {
    this.loadData()
  },
  methods: {
    loadData: function () {
      var dbRef = firebase.database().ref()
      dbRef.on('value', function (datax) {
        var da = datax.val()
        console.log(da)
      })
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

</style>
