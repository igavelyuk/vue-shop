<template>
<div class="">
  <b-steps class="" v-model="activeStep" :animated="isAnimated" :has-navigation="hasNavigation" :icon-prev="prevIcon" :icon-next="nextIcon">
    <b-step-item label="Перевірка продуктів" :clickable="isStepsClickable">
      <h1 class="title has-text-centered">Додано до кошика на сумму {{countTotalPrice}} грн</h1>
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

              <b-table-column field="name" label="Назва">
                {{ products.row.name }}
              </b-table-column>

              <b-table-column field="picture" label="Іконка">
                <img :src="products.row.picture" width="40px" height="40px" alt="Product picture" />
              </b-table-column>

              <b-table-column field="size" label="Розмір">
                {{ products.row.size }}
              </b-table-column>

              <b-table-column field="quantity" width="130px" label="Кількість">
                <b-field>
                  <b-numberinput v-if="chartCount.length > 1 && promoid===products.row.id" min="1" max="1" size="is-small" type="is-disabled" v-model="products.row.quantity"></b-numberinput>
                  <b-numberinput v-else min="0" max="10" size="is-small" type="is-success" v-model="products.row.quantity" v-on:input="changeOrderQuantity(products.row)"></b-numberinput>
                </b-field>
              </b-table-column>

              <b-table-column field="currentprice" label="Ціна">
                <b>{{ products.row.currentprice * products.row.quantity }}</b>
              </b-table-column>

              <b-table-column label="Акційний товар">
                <span>
                  <b-icon pack="fas" :icon="products.row.promo ? 'check-circle' : 'times-circle'">
                  </b-icon>
                </span>
              </b-table-column>

              <b-table-column field="lastprice" width="20" label="Попередня ціна">
                <i class="striked" v-if="products.row.promo"> {{ products.row.lastprice }} </i>
              </b-table-column>

            <b-table-column v-bind:label="superSaleDescription.description">
              <!-- v-if="promoid===products.row.id" -->
                <span v-if="chartCount.length > 1 && promoid===products.row.id">
                  <b-icon pack="fas" icon="check-circle">
                  </b-icon>
                  {{superSaleDescription.description}} <br/> {{superSaleDescription.time_start}}:00 - {{superSaleDescription.time_end}}:00,<br/> {{superSaleDescription.sale}} % на одну<br/> за рандомом.
                </span>
              </b-table-column>

              <b-table-column field="date" label="Дата" centered>
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
                  <p>Нічого не додано</p>
                </div>
              </section>
            </template>
          </b-table>
        </div>
      </div>
    </b-step-item>
    <b-step-item label="Доставка чи Самовинос" :clickable="isStepsClickable" :type="{'is-success': isProfileSuccess}">
      <h1 class="title has-text-centered">
        <div class="field">
           <b-switch v-model="isDelivery"
                true-value="Доставка"
                false-value="Самовинос">
                {{ isDelivery }}
           </b-switch>
       </div>
       <div>Загальна сума {{reCalculate()}}</div>
      </h1>

      <section v-if="isDelivery==='Доставка'">
        <b-field>
          <b-input placeholder="Біла Церква" value="Біла Церква">
          </b-input>
        </b-field>

        <b-field>
          <b-input v-model="address" :click = "ckeck4Fail()" placeholder="Адреса" type="text" validation-message="Обов'язкове поле"></b-input>
        </b-field>

        <b-field>
          <b-input v-model="housenum" :click = "ckeck4Fail()" placeholder="Номер Будинку" type="text">
          </b-input>
        </b-field>

        <b-field>
          <b-input v-model="yourname" :click = "ckeck4Fail()" placeholder="Ваше ім'я'" type="text" required validation-message="Обов'язкове поле">
          </b-input>
        </b-field>

        <b-field>
          <b-input v-model="yourtell" :click = "ckeck4Fail()" placeholder="0666540976" type="telephone" required validation-message="Обов'язкове поле"></b-input>
        </b-field>

        <b-field>
          <b-input v-model="additionalinfo" type="textarea" minlength="10" maxlength="100" placeholder="Додаткове повідомлення для Піцци Панди">
          </b-input>
        </b-field>
      </section>
      <section v-else>
        <b-field>
          <b-input v-model="yourname" :click = "ckeck4Fail()" placeholder="Ваше ім'я'" type="text" required validation-message="Обов'язкове поле">
          </b-input>
        </b-field>

        <b-field>
          <b-input v-model="yourtell" :click = "ckeck4Fail()" placeholder="0666540976" type="telephone" required validation-message="Обов'язкове поле"></b-input>
        </b-field>

        <b-field>
          <b-input v-model="additionalinfo" type="textarea" minlength="10" maxlength="100" placeholder="Додаткове повідомлення для Піцци Панди">
          </b-input>
        </b-field>
        <br/><br/><br/><br/><br/><br/>
      </section>
    </b-step-item>
    <b-step-item label="Купівля" :clickable="isStepsClickable" disabled>
      <h1 class="title has-text-centered">Купівля</h1>
      <br/><br/><br/><br/><br/><br/><br/>
      <b-button v-if="failtoproceed && !finishItModal" size="is-large" type="is-danger" icon-left="hand-point-up" @click="finishIt">Підтвердити</b-button>
      <b-button v-else size="is-large" disabled icon-left="hand-point-up">Підтвердити</b-button>
      <br/><br/><br/><br/><br/><br/><br/>
    </b-step-item>
    <template v-if="customNavigation" slot="navigation" slot-scope="{previous, next}">
      <b-button outlined type="is-danger" icon-pack="fas" icon-left="backward" :disabled="previous.disabled" @click.prevent="previous.action">
        Previous
      </b-button>
      <b-button outlined type="is-primary" icon-pack="fas" icon-right="forward" :disabled="next.disabled" @click.prevent="next.action">
        Next
      </b-button>
</template>
<b-modal :active.sync="finishItModal" :width="640" scroll="keep">
            <div class="card">
                <p>Через декілька хвилин вам передзвонить оператор</p>
                <div class="card-content">
                    <div class="content">
                        Дякую за покупку, з вами зв'яжется наш оператор, відвідайте наш інстаграм та згадуйте нас в інстаграмі <a href="https://www.instagram.com/pandapizzabc/">@pizzapandabc</a>.
                        Також використовуйте хештеги <a>#pizzapandabc</a> <a>#pizzatime</a> <a>#піццабілацерква</a>
                        Таким чином ми можемо запропонувати вам додаткові можливості економії на наших продуктах.
                        <br>
                        <small>Можете закрити це вікно, все пройшло успішно</small>
                    </div>
                </div>
            </div>
        </b-modal>
</b-steps>
  </div>
</template>

<script>
import axios from 'axios'

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
      isStepsClickable: true,
      isProfileSuccess: false,
      totalPrice: 200,
      counterX: 1,
      isDelivery: 'Доставка',
      failtoproceed: false,
      finishItModal: false,
      activeDailyPromo: this.$store.getters.dailypromo,
      superSaleDescription: this.$store.getters.sale[0],
      address: '',
      housenum: '',
      yourname: '',
      yourtell: '',
      additionalinfo: '',
      runonce: false,
      promoid: '',
      chartCount: this.$store.getters.productsChart
    }
  },
  methods: {
    reCalculate () {
      if (this.superSaleDescription.price_over === 'undefine') {
        this.superSaleDescription.price_over = 300
      }
      if (this.isDelivery === 'Доставка') {
        if (this.countTotalPrice >= parseInt(this.superSaleDescription.price_over)) {
          return this.countTotalPrice
        }
        return this.countTotalPrice + 50
      } else {
        return this.countTotalPrice
      }
    },
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
        currentprice: currentOrder.currentprice,
        lastprice: currentOrder.lastprice,
        description: currentOrder.description,
        icon: currentOrder.icon,
        id: currentOrder.id,
        name: currentOrder.name,
        picture: currentOrder.picture,
        promo: currentOrder.promo,
        quantity: currentOrder.quantity,
        size: currentOrder.size,
        date: currentOrder.date,
        finalprice: currentOrder.currentprice * currentOrder.quantity,
        activedailypromo: ''
      }
      this.setSaleDaily()
      this.$store.commit('delete', currentOrder.id)
      this.$store.commit('addToChart', newProduct)
      // }
    },
    ckeck4Fail () {
      console.log('Working')
      if (this.yourname !== '' && this.yourtell !== '') {
        this.failtoproceed = true
      }
    },
    finishIt () {
      this.finishItModal = true
      const delivery = {
        pickup: this.isDelivery,
        address: this.address,
        housenum: this.housenum,
        yourname: this.yourname,
        yourtell: this.yourtell,
        additionalinfo: this.additionalinfo
      }
      axios.post('https://pizzapandabc.com.ua/a/message/a.php', {
        products: this.$store.getters.productsChart,
        '.': '.',
        delivery: delivery
      })
      this.yourname = ''
      this.yourtell = ''
      this.failtoproceed = false

      // .then(function (response) {
      //   console.log(response)
      // })
      // .catch(function (error) {
      //   console.log(error)
      // })
    },
    setSaleDaily () {
      // console.log('StartWorking SALE')
      var Chart = this.$store.getters.productsChart
      // var bPass = false
      if (this.activeDailyPromo === true) {
        // var iSumm = 0
        for (var i = 0; i < Chart.length; i++) {
          // iSumm += Chart[i].currentprice * Chart[i].quantity
          // var x = typeof iSumm
          // console.log('----------------------------------')
          // console.log(x)
          // if (iSumm >= 300) {   // important
          if (Chart.length > 1) {
            // bPass = true
            Chart.sort((a, b) => a.currentprice - b.currentprice)
            this.promoid = Chart[0].id
            const RecalcPrice = parseFloat(Chart[0].currentprice)
            const RecalcQ = parseFloat(Chart[0].quantity)
            const finalPriceCalculated = RecalcPrice / 2.0 * RecalcQ
            console.log('----------------------------------------------------')
            console.log(finalPriceCalculated)
            const newProduct = {
              currentprice: finalPriceCalculated, //  / 2
              lastprice: Chart[0].lastprice,
              description: Chart[0].description,
              icon: Chart[0].icon,
              id: Chart[0].id,
              name: Chart[0].name,
              picture: Chart[0].picture,
              promo: Chart[0].promo,
              quantity: Chart[0].quantity,
              size: Chart[0].size,
              date: Chart[0].date,
              finalprice: finalPriceCalculated,
              activedailypromo: this.$store.getters.sale[0].description
            }
            this.$store.commit('delete', Chart[0].id)
            this.$store.commit('addToChart', newProduct)
          }
        }
        this.runonce = true
      }
    }
  },
  computed: {
    countTotalPrice () {
      const Total = this.$store.getters.productsChart
      var result = 0

      // if (this.activeDailyPromo === true) {
      //   const TotalX = this.$store.getters.productsChart
      //   console.log(TotalX)
      //   var nProduct = TotalX.currentprice.sort()
      //   console.log(nProduct)
      // }
      //
      for (var i = 0; i < Total.length; i++) {
        result += Total[i].currentprice * Total[i].quantity
      }
      return result
    },
    products () {
      var bUCO = this.$store.getters.productsChart // baseUnsortedChartObj
      bUCO.sort(function (a, b) {
        var nameA = a.name.toUpperCase() // ignore upper and lowercase
        var nameB = b.name.toUpperCase() // ignore upper and lowercase
        if (nameA < nameB) {
          return -1
        }
        if (nameA > nameB) {
          return 1
        }
        return 0
      })
      return bUCO
    }
  },
  updated: function () {
    // this.$nextTick(function () {
    if (this.runonce === false) {
      this.setSaleDaily()
    }
    // Code that will run only after the
    // entire view has been re-rendered
    // })
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
