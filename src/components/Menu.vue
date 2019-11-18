
<template>
    <b-navbar>
        <template slot="brand">
            <b-navbar-item tag="router-link" :to="{ path: '/' }">
                <img src="../assets/logo.png" width="150" height="40">
            </b-navbar-item>
        </template>
        <template slot="start">
            <b-navbar-item href="#">
              <router-link class="link" to="/">Home</router-link>
            </b-navbar-item>
            <b-navbar-item href="#">
              <router-link class="link" to="/about">About</router-link>
            </b-navbar-item>
            <span>
              <input class="input" type="text" placeholder="Find a product">
              <button class="button">
                Search
              </button>
            </span>
            <b-navbar-item>
              <router-link class="link" to="/chart">Chart</router-link>
            </b-navbar-item>
        </template>

        <template slot="end">
            <b-navbar-item tag="div">
                <div class="buttons">
                    <a class="button is-primary">
                        <strong>Sign up</strong>
                    </a>
                    <a class="button is-light">
                        Log in
                    </a>
                </div>
            </b-navbar-item>
        </template>
    </b-navbar>
</template>

<script>
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

export default {
  name: 'Menu',
  props: {
    msg: {
      type: String,
      required: false
    }
  }
}
</script>

<style scoped lang="scss">
.navbar {
  background: #33dd33;
}
.link {
  padding: 10px;
  color: #ffffff;
}
.link:hover {
  padding: 10px;
  color: #333333;
}
</style>
