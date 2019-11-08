<template>
  <div>
    <nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="../assets/logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item">
        <router-link class="link" to="/">Home</router-link>
      </a>

      <a class="navbar-item">
        <router-link class="link" to="/about">About</router-link>
      </a>

      <p class="control navbar-item">
        <input class="input" type="text" placeholder="Find a product">
        <button class="button">
          Search
        </button>
      </p>

      <a class="navbar-item">
        <router-link class="link" to="/chart">Chart</router-link>
      </a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-light">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
  </div>
</template>

<script>
export default {
  name: 'Menu',
  props: {
    msg: {
      type: String,
      required: false
    }
  }
}
</script>

<style scoped lang="scss">
.navbar {
  background: #33dd33;
}
.link {
  padding: 10px;
  color: #ffffff;
}
.link:hover {
  padding: 10px;
  color: #333333;
}
</style>
