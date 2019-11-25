<template>
<div class="">
  <b-steps class="" v-model="activeStep" :animated="isAnimated" :has-navigation="hasNavigation" :icon-prev="prevIcon" :icon-next="nextIcon">
    <b-step-item label="Check" :clickable="isStepsClickable">
      <h1 class="title has-text-centered">Check your shopping cart, Total {{countTotalPrice}} USD</h1>
      <div class="columns">
        <div class="column">
          <b-table :data="products">
            <template slot-scope="products">
              <!-- <b-table-column field="pid" label="ID" width="20" numeric>
          {{ counterX++ }}
      </b-table-column> -->

              <b-table-column field="id_" label="UID" numeric>
                <!-- {{ (counter++)+1 }} -->
                {{(products.row.id).toString().slice(0,4)}}
              </b-table-column>

              <b-table-column field="name" label="Name">
                {{ products.row.name }}
              </b-table-column>

              <b-table-column field="picture" label="Picture">
                <img :src="products.row.picture" width="40px" height="auto" alt="Product picture" />
              </b-table-column>

              <b-table-column field="size" label="Size">
                {{ products.row.size }}
              </b-table-column>

              <b-table-column field="quantity" width="130px" label="Quantity">
                <b-field>
                  <b-numberinput size="is-small" type="is-success" v-model="products.row.quantity" v-on:input="changeOrderQuantity(products.row)"></b-numberinput>
                </b-field>
              </b-table-column>

              <b-table-column field="currentprice" label="Price">
                <b>{{ products.row.currentprice}}</b>
              </b-table-column>

              <b-table-column label="Promo">
                <span>
                  <b-icon pack="fas" :icon="products.row.promo ? 'check-circle' : 'times-circle'">
                  </b-icon>
                </span>
              </b-table-column>

              <b-table-column field="lastprice" width="20" label="Lastprice">
                <i class="striked" v-if="products.row.promo"> {{ products.row.lastprice }} </i>
              </b-table-column>

              <b-table-column field="date" label="Date" centered>
                <span class="tag is-success">
                  {{ new Date(products.row.date).toLocaleDateString() }} {{new Date(products.row.date).toLocaleTimeString()}}
                </span>
              </b-table-column>

              <div class="buttons">
                <b-button @click="delProduct(products.row.id)" class="buttons" rounded type="is-danger" outlined>
                  <b-icon pack="fas" icon="times"></b-icon>
                </b-button>
              </div>
            </template>

            <template slot="empty">
              <section class="section">
                <div class="content has-text-grey has-text-centered">
                  <p>
                    <b-icon icon="luggage-cart" size="is-large">
                    </b-icon>
                  </p>
                  <p>Nothing here.</p>
                </div>
              </section>
            </template>
          </b-table>
        </div>
      </div>
    </b-step-item>
    <b-step-item label="Adress" :clickable="isStepsClickable" :type="{'is-success': isProfileSuccess}">
      <h1 class="title has-text-centered">Adress</h1>
      <section>
        <b-field>
          <b-input placeholder="Email" type="email"></b-input>
        </b-field>

        <b-field>
          <b-input placeholder="Number" type="number" min="10" max="20">
          </b-input>
        </b-field>

        <b-field>
          <b-input placeholder="User handle (custom validation for only lowercase)" type="text" required validation-message="Only lowercase is allowed" pattern="[a-z]*">
          </b-input>
        </b-field>

        <b-field>
          <b-input placeholder="URL" type="url"></b-input>
        </b-field>

        <b-field>
          <b-input type="textarea" minlength="10" maxlength="100" placeholder="Maxlength automatically counts characters">
          </b-input>
        </b-field>
      </section>
    </b-step-item>
    <b-step-item label="Finish" :clickable="isStepsClickable" disabled>
      <h1 class="title has-text-centered">Finish</h1>
      <b-button size="is-large" icon-left="hand-point-up">
        Ship It
      </b-button>
    </b-step-item>
    <template v-if="customNavigation" slot="navigation" slot-scope="{previous, next}">
      <b-button outlined type="is-danger" icon-pack="fas" icon-left="backward" :disabled="previous.disabled" @click.prevent="previous.action">
        Previous
      </b-button>
      <b-button outlined type="is-success" icon-pack="fas" icon-right="forward" :disabled="next.disabled" @click.prevent="next.action">
        Next
      </b-button>
</template>
</b-steps>
  </div>
</template>

<script>
// import uuid from 'uuid'

export default {
  data () {
    return {
      activeStep: 0,
      showSocial: false,
      isAnimated: true,
      hasNavigation: true,
      customNavigation: false,
      prevIcon: 'chevron-left',
      nextIcon: 'chevron-right',
      isStepsClickable: false,
      isProfileSuccess: false,
      totalPrice: 200,
      counterX: 1
    }
  },
  methods: {
    // deleteProduct (ids) {
    //   return this.$store.state.commit('deletex', 0)
    // },
    delProduct (ids) {
      // this.$store.state.chart = ''
      // this.$store.dispatch('deletex', 0)
      this.$store.commit('delete', ids)
      // -> 1
    },

    changeOrderQuantity (currentOrder) {
      // const uuidRecord = uuid()
      console.log(currentOrder)
      // if (currentOrder.quantity >= 0 && currentOrder.quantity >= 0) {
      const newProduct = {
        currentprice: currentOrder.currentprice * currentOrder.quantity,
        lastprice: currentOrder.lastprice,
        description: currentOrder.description,
        icon: currentOrder.icon,
        id: currentOrder.id,
        name: currentOrder.name,
        picture: currentOrder.picture,
        promo: currentOrder.promo,
        quantity: currentOrder.quantity,
        size: currentOrder.size,
        date: currentOrder.date
      }
      this.$store.commit('delete', currentOrder.id)
      this.$store.commit('addToChart', newProduct)
      // }
    }
  },
  computed: {
    countTotalPrice () {
      const Total = this.$store.getters.productsChart
      var result = 0
      for (var i = 0; i < Total.length; i++) {
        result += Total[i].currentprice
      }
      return result
    },
    products () {
      return this.$store.getters.productsChart
    }
  }
}
</script>

<style>
.buttons {
  /* margin: 0px!important; */
  /* padding: 0px 10px 0px 10px!important; */
}

.table {
  width: auto;
  background: #ffffff;
  padding: 2px;
  font-size: 1em;
}

.table-container {}

.t-border {
  border: 2px;
}

.striked {
  text-decoration: line-through;
  color: #ff0000;
}

.description {
  font-size: 8px;
}
</style>
