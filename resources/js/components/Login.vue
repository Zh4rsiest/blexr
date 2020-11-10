<template>
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-6">
        <form id="loginForm">
          <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="text" class="form-control" name="email" placeholder="username@domain.com">
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control" name="password" placeholder="**********">
          </div>

          <button @click="login" type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      // user: Object
    },
    mounted() {
      // if (this.$store.state.user !== false) {
      //   this.$router.push('/');
      // }
    },
    methods: {
      login(e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById("loginForm"));

        axios.post('login', formData)
        .then((response) => {
          console.log(response);
          if (response.data.success) {
            this.$store.dispatch('fetchUser');
            window.location.href = "/";
          } else {
            console.error('Couldn\'t log in');
          }
        });
      }
    }
  }
</script>
