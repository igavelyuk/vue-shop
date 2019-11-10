<template>
  <section>
    <div class="block">
     <b-radio class="extra-paddings" v-model="radio"
     name="name"
     type="is-danger"
     native-value="35cm">
     XL
    </b-radio>
    <b-radio class="extra-paddings" v-model="radio"
     name="name"
     type="is-success"
     native-value="30cm">
     M &nbsp;
     </b-radio>
     <b-radio class="extra-paddings" v-model="radio"
     name="name"
     native-value="24cm">
     S &nbsp;
     </b-radio>
       <b-button class="extra-paddings-button-chart" @click="clickMe">Add to Chart</b-button>
     </div>
     <p class="content">
       <b>Pizza size:</b>
     {{ radio }}
     </p>
  </section>
</template>

<script>
export default {
  name: 'SelectionOrder',
  methods: {
    clickMe () {
      this.$buefy.notification.open('Clicked!!')
    }
  },
  components: {},
  data: function () {
    return {
      radio: '35cm'
    }
  }
}
</script>

<style scoped lang="scss">
*{
  outline: 1px dotted red;
}
.extra-paddings{
  padding-top: 9px;
  padding-bottom: 9px;
}
.extra-paddings-button-chart{
  margin-left: 20px;
}
</style>
