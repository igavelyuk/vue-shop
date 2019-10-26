<template>
  <div class="home">
    <Menu msg="This is a menu component"/>
    <Main msg="This is a main component"/>
    <Table></Table>
    <Footer msg="This is a footer component"/>
  </div>
</template>

<script>
// @ is an alias to /src
import Menu from '@/components/Menu.vue'
import Main from '@/components/Main.vue'
import Footer from '@/components/Footer.vue'
import Table from '@/components/Table.vue'

export default {
  name: 'home',
  components: {
    Menu,
    Main,
    Footer,
    Table
  }
}
</script>
