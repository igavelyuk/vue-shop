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
                <img :src="products.row.picture" width="40px" height="auto" alt="Product picture" />
              </b-table-column>

              <b-table-column field="size" label="Розмір">
                {{ products.row.size }}
              </b-table-column>

              <b-table-column field="quantity" width="130px" label="Кількість">
                <b-field>
                  <b-numberinput min="0" max="10" size="is-small" type="is-success" v-model="products.row.quantity" v-on:input="changeOrderQuantity(products.row)"></b-numberinput>
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
                true-value="Доставка +50 грн"
                false-value="Самовинос">
                {{ isDelivery }}
           </b-switch>
       </div>
      </h1>

      <section v-if="isDelivery==='Доставка +50 грн'">
        <b-field>
          <b-input placeholder="Біла Церква" value="Біла Церква">
          </b-input>
        </b-field>

        <b-field>
          <b-input placeholder="Адреса" type="text" validation-message="Обов'язкове поле"></b-input>
        </b-field>

        <b-field>
          <b-input placeholder="Номер Будинку" type="number" min="10" max="20">
          </b-input>
        </b-field>

        <b-field>
          <b-input placeholder="Ваше ім'я'" type="text" required validation-message="Обов'язкове поле">
          </b-input>
        </b-field>

        <b-field>
          <b-input placeholder="0666540976" type="telephone" required validation-message="Обов'язкове поле"></b-input>
        </b-field>

        <b-field>
          <b-input type="textarea" minlength="10" maxlength="100" placeholder="Додаткове повідомлення для Піцци Панди">
          </b-input>
        </b-field>
      </section>
      <section v-else>
        <b-field>
          <b-input placeholder="Ваше ім'я'" type="text" required validation-message="Обов'язкове поле">
          </b-input>
        </b-field>

        <b-field>
          <b-input placeholder="0666540976" type="telephone" required validation-message="Обов'язкове поле"></b-input>
        </b-field>

        <b-field>
          <b-input type="textarea" minlength="10" maxlength="100" placeholder="Додаткове повідомлення для Піцци Панди">
          </b-input>
        </b-field>
      </section>
    </b-step-item>
    <b-step-item label="Купівля" :clickable="isStepsClickable" disabled>
      <h1 class="title has-text-centered">Купівля</h1>
      <b-button size="is-large" type="is-danger" icon-left="hand-point-up" @click="finishItModal=true">
        Підтвердити
      </b-button>
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
      isStepsClickable: true,
      isProfileSuccess: false,
      totalPrice: 200,
      counterX: 1,
      isDelivery: 'Доставка +50 грн',
      finishItModal: false
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
        finalprice: currentOrder.currentprice * currentOrder.quantity
      }
      this.$store.commit('delete', currentOrder.id)
      this.$store.commit('addToChart', newProduct)
      // }
    },
    finishIt () {
    }
  },
  computed: {
    countTotalPrice () {
      const Total = this.$store.getters.productsChart
      var result = 0
      for (var i = 0; i < Total.length; i++) {
        result += Total[i].currentprice * Total[i].quantity
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
