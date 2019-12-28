<template>
  <footer class="footer" :class="className">
    <div class="level">
    <div class="level-item has-text-centered">
    <div>
      <p class="heading">Задоволених кліентів</p>
      <p class="title">8 440+</p>
    </div>
  </div>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Працюемо з</p>
      <p class="title">2016</p>
    </div>
  </div>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Фоловерів у Інстаграмі (Бургер, Піцца, Суши)</p>
      <p class="title">14 000+</p>
    </div>
  </div>
  <div class="level-item has-text-centered">
    <div>
      <p class="heading">Щоденних лайків</p>
      <p class="title">421</p>
    </div>
  </div>
  </div>
  <hr/>
  <div class="columns">
  <div class="column has-text-left">
    <span><i class="fas fa-phone-square-alt"></i> Kiyvstar (096)960-14-14</span><br/>
    <i class="fab fa-internet-explorer"></i><a href="https://burgerpandabc.com.ua">Бургер Панда БЦ</a><br/>
    <i class="fab fa-internet-explorer"></i><a href="https://sushipandapandabc.com.ua">Суши Панда БЦ</a><br/>
    <i class="fab fa-internet-explorer"></i><a href="https://burgerpanda.com.ua">Бургер Панда Біла Церква</a><br/>
    <i class="fab fa-internet-explorer"></i><a href="https://pandabc.com.ua">Панда Біла Церква</a><br/>
  </div>
  <div class="column has-text-centered">
        <i class="fas fa-flag"></i> м. Біла Церква<br/>
        <i class="fas fa-home"></i> вул. Героев Чернобыля 5а<br/>
        <a title="Перейти на Гугл Мапу" href="https://www.google.com/maps/place/49%C2%B047'08.2%22N+30%C2%B005'36.7%22E/@49.7856025,30.0913241,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d49.7856025!4d30.0935128?hl=uk-ua">Google Maps</a>
  </div>
  <div class="column has-text-centered">
    <span class="float-right"><i class="fas fa-clock"></i> Робочий графік</span><br>
    <span class="float-right"><i class="fas fa-exclamation-triangle"></i> щодня </span><br>
    <span class="float-right"><i class="fas fa-user-friends"></i> 10:00 - 22:00 </span><br>
  </div>
  <div class="column has-text-left">
    <i class="fab fa-instagram"></i><a href="https://www.instagram.com/pandaburgerbc/">Бургер Панда БЦ</a><br/>
    <i class="fab fa-instagram"></i><a href="https://www.instagram.com/pandasushibc/">Суши Панда БЦ</a><br/>
    <i class="fab fa-instagram"></i><a href="https://www.instagram.com/pandaburgerbc/">Бургер Панда Біла Церква</a><br/>
    <i class="fab fa-instagram"></i><a href="https://www.instagram.com/pandabc.com.ua/">Панда Біла Церква</a><br/>
    <i class="fab fa-instagram"></i><a href="https://www.instagram.com/pandapizzabc/">Панда Піцца БЦ</a><br/>
  </div>
</div>
<hr/>
<div class="columns">
  <div class="column has-text-centered">
    <p v-if="msg">{{msg}}</p>
    <p v-if="copyInfo">Copyright &copy; <a href="https://gavelweb.site">{{copyInfo}}</a></p>
  </div>
</div>
</footer>
</template>

<script>
export default {
  name: 'Footer',
  props: {
    msg: {
      type: String,
      required: false
    },
    className: {
      type: String,
      required: false
    },
    copyInfo: {
      type: String,
      required: false
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
  .footer {
    margin-top: 20px;
    background: #f0f0f0;
    flex-shrink: 0;
    width: 100%;

    h1 {
      margin:0;
    }
  }
</style>
