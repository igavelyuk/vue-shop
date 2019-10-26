<template>
  <div class="table">
      <table class="t-border">
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Gender</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="(customer,indx) in customers" :key="indx">
                  <td>
                      {{ customer.name }}
                  </td>
                  <td>
                      {{ customer.age }}
                  </td>
                  <td>
                      {{ customer.gender }}
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
        { name: 'sample1', age: '25', gender: 'single' },
        { name: 'sample2', age: '30', gender: 'married' },
        { name: 'sample3', age: '22', gender: 'single' }
      ],
      customers: []
    }
  },
  methods: {
    listOfCustomer () {
      this.customers = this.list
    }
  },
  mounted () {
    this.listOfCustomer()
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
