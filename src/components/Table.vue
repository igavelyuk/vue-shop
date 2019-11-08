<template>
  <div class="table">
      <table class="t-border">
          <thead>
              <tr>
                <th>Promo</th>
                <th>Product Name</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Last price</th>
                <th>Remove</th>
              </tr>
          </thead>
          <tbody>
            <tr v-for="(product,indx) in products" :key="indx">
              <td>
                {{ product.promo }}
              </td>
              <td>
                {{ product.name }}
              </td>
              <td>
                {{ product.size }}
              </td>
              <td>
                {{ product.qty }}
              </td>
              <td>
                {{ product.currentprice }}
              </td>
              <td>
                {{ product.lastprice }}
              </td>
              <td>
                <div class="buttons">
                  <b-button rounded type="is-danger" outlined>X</b-button>
                </div>
              </td>
              </tr>
          </tbody>
      </table>
  </div>
</template>

<script>
export default {
  data () {
    return {
      list: [
        {
          name: 'Napoly',
          promo: false,
          lastprice: 300,
          currentprice: 200,
          size: 'm',
          description: 'Some description ipsum lorem',
          icon: '../assets/pic.jpg',
          picture: '../assets/pic.jpg',
          qty: '1'
        },
        {
          name: 'Usa original',
          promo: false,
          lastprice: 300,
          currentprice: 200,
          size: 'xl',
          description: 'Some description ipsum lorem',
          icon: '../assets/pic.jpg',
          picture: '../assets/pic.jpg',
          qty: '1'
        },
        {
          name: 'Rebel',
          promo: false,
          lastprice: 300,
          currentprice: 200,
          size: 's',
          description: 'Some description ipsum lorem',
          icon: '../assets/pic.jpg',
          picture: '../assets/pic.jpg',
          qty: '1'
        }
      ],
      products: []
    }
  },
  methods: {
    listOfProducts () {
      this.products = this.list
    }
  },
  mounted () {
    this.listOfProducts()
  }
}
</script>

<style>
    .table{
       background: #e2e2e2;
       padding: 2px;
    }
    .t-border{
        border: 2px;
    }

</style>
