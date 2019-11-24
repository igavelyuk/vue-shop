<template>
  <div class="table">
    <b-steps
    v-model="activeStep"
    :animated="isAnimated"
    :has-navigation="hasNavigation"
    :icon-prev="prevIcon"
    :icon-next="nextIcon">
    <b-step-item label="Check" :clickable="isStepsClickable">
      <h1 class="title has-text-centered">Check</h1>
      <div class="columns">
        <div class="column is-centered">
          <table class="t-border">
              <thead>
                  <tr>
                    <th><b-icon pack="fas" icon="list-ol"></b-icon></th>
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
                    {{ indx+1 }}
                    <!-- <b-icon pack="fas" icon="bullseye"></b-icon> -->
                  </td>
                  <td>
                    <b-icon v-if="product.promo" pack="fas" icon="check-circle"></b-icon>
                    <b-icon v-else pack="fas" icon="times-circle"></b-icon>
                  </td>
                  <td>
                    {{ product.name }}
                  </td>
                  <td>
                    {{ product.size }}
                  </td>
                  <td>
                    {{ product.quantity }}
                  </td>
                  <td>
                    {{ product.currentprice }}
                  </td>
                  <td v-if="product.promo" class = "striked">{{ product.lastprice }} </td>
                  <td v-else > --- </td>
                  <td>
                    <div class="buttons">
                      <!-- <b-button @click="$emit('delProduct',product.id)" class="buttons" rounded type="is-danger" outlined>&#10060;</b-button> -->
                      <!-- <b-button @click="delProduct(product.id)" class="buttons" rounded type="is-danger" outlined>&#10026;</b-button> -->
                        <b-button @click="delProduct(product.id)" class="buttons" rounded type="is-danger" outlined><b-icon pack="fas" icon="times"></b-icon></b-button>
                    </div>
                  </td>
                  </tr>
              </tbody>
          </table>
        </div>
      </div>
    </b-step-item>
    <b-step-item label="Profile" :clickable="isStepsClickable" :type="{'is-success': isProfileSuccess}">
      <h1 class="title has-text-centered">Adress</h1>
      <section>
        <b-field>
            <b-input placeholder="Email" type="email"></b-input>
        </b-field>

        <b-field>
            <b-input placeholder="Number"
                type="number"
                min="10"
                max="20">
            </b-input>
        </b-field>

        <b-field>
            <b-input placeholder="User handle (custom validation for only lowercase)"
              type="text"
              required
              validation-message="Only lowercase is allowed"
              pattern="[a-z]*">
            </b-input>
        </b-field>

        <b-field>
            <b-input placeholder="URL" type="url"></b-input>
        </b-field>

        <b-field>
            <b-input type="textarea"
                minlength="10"
                maxlength="100"
                placeholder="Maxlength automatically counts characters">
            </b-input>
        </b-field>
    </section>
    </b-step-item>
    <b-step-item label="Finish" :clickable="isStepsClickable" disabled>
      <h1 class="title has-text-centered">Finish</h1>
      <b-button size="is-large"
               icon-left="hand-point-up">
               Ship It
           </b-button>
    </b-step-item>
    <template
    v-if="customNavigation"
    slot="navigation"
    slot-scope="{previous, next}">
    <b-button
    outlined
    type="is-danger"
    icon-pack="fas"
    icon-left="backward"
    :disabled="previous.disabled"
    @click.prevent="previous.action">
    Previous
  </b-button>
  <b-button
  outlined
  type="is-success"
  icon-pack="fas"
  icon-right="forward"
  :disabled="next.disabled"
  @click.prevent="next.action">
  Next
</b-button>
</template>
</b-steps>
  </div>
</template>

<script>
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
      isProfileSuccess: false
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
    }
  },
  computed: {
    products () {
      return this.$store.getters.productsChart
    }
  }
}
</script>

<style>
.buttons{
  /* margin: 0px!important; */
  /* padding: 0px 10px 0px 10px!important; */
}
.table{
  width: auto;
  background: #ffffff;
  padding: 2px;
  font-size: 1em;
}
.t-border{
  border: 2px;
}
.striked {
  text-decoration: line-through;
  color: #ff0000;
}
</style>
