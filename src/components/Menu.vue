
<template>
  <b-navbar>{{msg}}
      <template slot="brand">
          <b-navbar-item tag="router-link" :to="{ path: '/' }">
              <img class="is-rounded" src="../assets/logo.png">
              <span class="brand">{{brand_name}}</span>
          </b-navbar-item>
      </template>
      <template slot="start">
          <b-navbar-item tag="router-link" :to="{ path: '/' }">
            <b-icon class="icon" pack="fas" icon="home"></b-icon>Головна
          </b-navbar-item>
          <b-navbar-item tag="router-link" :to="{ path: '/about' }">
            <b-icon class="icon" pack="fas" icon="address-card"></b-icon>О компанії
          </b-navbar-item>
          <b-navbar-item tag="router-link" :to="{ path: '/chart' }">
            <b-icon class="icon" pack="fas" icon="shopping-cart"></b-icon>Кошик
          </b-navbar-item>
          <span class="search">
            <input class="input" v-model="searchWord" :click = "searchProduct" type="text" placeholder="Пошук продукту">
            <!-- <a :click = "searchProduct" class="button is-light"><b-icon class="icon" pack="fas" icon="sign-in-alt"></b-icon>Search</a> -->
          </span>
      </template>

      <template slot="end">
          <b-navbar-item tag="div">
              <div class="buttons">
                <b-button @click="SignUp" type="is-primary" pack="fas" icon-left="user-plus">Реєстрація </b-button>
                <b-button @click="LogIn" type="is-primary" outlined pack="fas" icon-left="sign-in-alt">Увійти</b-button>
              </div>
          </b-navbar-item>
      </template>
  </b-navbar>
</template>

<script>
import Vue from 'vue'
import Buefy from 'buefy'
import VueRouter from 'vue-router'
import store from '../store'

Vue.use(Buefy, {
  defaultIconComponent: 'vue-fontawesome',
  defaultIconPack: 'fas'
})
Vue.use(VueRouter)

export default {
  name: 'Menu',
  props: {
    msg: {
      type: String,
      required: false
    }
  },
  computed: {
    searchProduct () {
      if (this.searchWord.length <= 0) {
        store.commit('restoreBackup')
      }
      console.log('-----------------------')
      // console.log(this.searchWord)
      return store.commit('filterProducts', this.searchWord)
    }
  },
  data () {
    return {
      brand_name: 'Пицца Панда БС',
      searchWord: ''
    }
  },
  methods: {
    SignUp () {
      this.$router.push({ path: 'signup' })
    },
    LogIn () {
      this.$router.push({ path: 'login' })
    }
  }
}
</script>

<style scoped lang="scss">
.navbar {
  background: #f0f0f0;
}
.brand {
  margin-left: 20px;
}
.search {
  margin: 8px;
}
.icon {
  margin: 5px!important;
}
.is-rounded{
  border-radius: 50%;
}
// .link {
//   padding: 10px;
//   color: #ffffff;
// }
// .link:hover {
//   padding: 10px;
//   color: #333333;
// }
</style>
