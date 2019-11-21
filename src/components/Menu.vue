
<template>
  <b-navbar>{{msg}}
      <template slot="brand">
          <b-navbar-item tag="router-link" :to="{ path: '/' }">
              <img src="../assets/logo.png" width="30" height="50">
              <span class="brand">{{brand_name}}</span>
          </b-navbar-item>
      </template>
      <template slot="start">
          <b-navbar-item tag="router-link" :to="{ path: '/' }">
            <b-icon class="icon" pack="fas" icon="home"></b-icon>Home
          </b-navbar-item>
          <b-navbar-item tag="router-link" :to="{ path: '/about' }">
            <b-icon class="icon" pack="fas" icon="address-card"></b-icon>About
          </b-navbar-item>
          <b-navbar-item tag="router-link" :to="{ path: '/chart' }">
            <b-icon class="icon" pack="fas" icon="shopping-cart"></b-icon>Chart
          </b-navbar-item>
          <span class="search">
            <input class="input" v-model="searchWord" :click = "searchProduct" type="text" placeholder="Find a product">
            <!-- <a :click = "searchProduct" class="button is-light"><b-icon class="icon" pack="fas" icon="sign-in-alt"></b-icon>Search</a> -->
          </span>
      </template>

      <template slot="end">
          <b-navbar-item tag="div">
              <div class="buttons">
                  <a class="button is-primary">
                      <b-icon class="icon" pack="fas" icon="user-plus"></b-icon><strong>Sign up</strong>
                  </a>
                  <a class="button is-light">
                      <b-icon class="icon" pack="fas" icon="sign-in-alt"></b-icon>Search
                  </a>
              </div>
          </b-navbar-item>
      </template>
  </b-navbar>
</template>

<script>
import Vue from 'vue'
import Buefy from 'buefy'
import VueRouter from 'vue-router'

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
        this.$store.commit('restoreBackup')
      }
      console.log('-----------------------')
      // console.log(this.searchWord)
      return this.$store.commit('filterProducts', this.searchWord)
    }
  },
  data () {
    return {
      brand_name: 'Пицца Панда БС',
      searchWord: ''
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
// .link {
//   padding: 10px;
//   color: #ffffff;
// }
// .link:hover {
//   padding: 10px;
//   color: #333333;
// }
</style>
