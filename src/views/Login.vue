<template>
  <div class="columns is-centered">
    <div class="column is-three-fifths">
      <section>
        <b-checkbox v-model="hasError">Show errors remain for easy to remmember how it works</b-checkbox>
        <b-field label="Username"
        :type="{ 'is-danger': hasError }"
        :message="{ 'Username is not available': hasError }">
        <b-input value="johnsilver" maxlength="30"></b-input>
        </b-field>
        <b-field label="Password"
        :type="{ 'is-danger': hasError }"
        :message="[
        { 'Password is too short': hasError },
        { 'Password must have at least 8 characters': hasError }
        ]">
        <b-input value="123" type="password" maxlength="30"></b-input>
      </b-field>
      <b-button type="is-primary">Log In</b-button>
    </section>
  </div>
</div>
</template>
<script>
export default {
  name: 'login',
  props: {
    msg: {
      type: String,
      required: false
    }
  },
  data () {
    return {
      hasError: true
    }
  }
}
</script>

<style lang="css" scoped>
</style>
