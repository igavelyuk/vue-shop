<template>
  <div class="home">
    <Table></Table>
    <Product></Product>
  </div>
</template>

<script>
// @ is an alias to /src
import Table from '@/components/Table.vue'
import Product from '@/components/Products.vue'

export default {
  name: 'home',
  components: {
    Table,
    Product
  },
  data () {
    return {
      products: [
        {
          id: 1,
          title: 'Pizza Ua',
          promo: true,
          price: 80,
          size: 6,
          description: 'Ukraine pizza'
        },
        {
          id: 1,
          title: 'Pizza It',
          promo: true,
          price: 80,
          size: 10,
          description: 'Napoli pizza'
        },
        {
          id: 1,
          title: 'Pizza Uk',
          promo: true,
          price: 80,
          size: 8,
          description: 'Uk pizza'
        },
        {
          id: 1,
          title: 'Pizza USA',
          promo: true,
          price: 80,
          size: 16,
          description: 'Made in USA pizza'
        }
      ]
    }
  }
}
</script>
