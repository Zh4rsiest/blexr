<template>
  <div id="users" class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-header">Add new employee</div>

          <div class="card-body">
            <form id="employeeForm">
              <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" placeholder="Josh Trixler">
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="text" class="form-control" name="email" placeholder="username@domain.com">
              </div>

              <div class="form-group">
                <label for="role">Role</label>

                <div class="form-check">
                  <input id="employee" type="radio" class="form-check-input" name="role" value="2" checked>
                  <label class="form-check-label" for="employee">Employee</label>
                </div>
                <div class="form-check">
                  <input id="admin" type="radio" class="form-check-input" name="role" value="1">
                  <label class="form-check-label" for="admin">Admin</label>
                </div>
              </div>

              <button @click="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div v-if="loading" class="loader-wrapper">
              <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        loading: false
      }
    },
    methods: {
      submit(e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById("employeeForm"));
        this.loading = true;

        axios.post('/employee/add', formData)
        .then((response) => {
          console.log(response);
          
          this.loading = false;

          if (response.data.success) {
            window.location.href = "/";
          } else {
            console.error('Couldn\'t log in');
          }
        });
      }
    }
  }
</script>
