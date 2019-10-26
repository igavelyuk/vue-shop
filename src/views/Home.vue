<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.png">
    <Menu msg="Welcome to Your Vue.js App"/>
    <Main msg="Welcome to Your Vue.js App"/>
    <Footer msg="Welcome to Your Vue.js App"/>
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
  }
}
</script>
