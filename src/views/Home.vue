<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.png">
    <Menu msg="This is a menu component"/>
    <Main msg="This is a main component"/>
    <Footer msg="This is a footer component"/>
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
