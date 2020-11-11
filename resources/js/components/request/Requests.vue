<template>
  <div id="addRequest" class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-header">Pending employee requests</div>

          <div class="card-body">
            <div class="row">
              <template v-if="requests.length" class="col-12">
                <div class="col-12">
                  <div class="row">
                    <div class="col-12 col-md-3 my-3">
                      <div class="form-group">
                        <select class="custom-select" v-model="filterName">
                          <option value="all" selected>All</option>
                          <option v-for="(name, i) in employees" :key="i" :value="name">{{name}}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <template v-for="(request) in requests">
                  <div v-if="(filterName === request.employee.name || filterName === 'all') && request.status == 0" class="col-12 col-md-4 py-2">
                    <div class="py-4 px-4 request-wrapper">
                      <h5>Name: {{request.employee.name}}</h5>
                      <p><b>Date:</b> {{request.date}}</p>
                      <p><b>Hours:</b> {{request.hours}}</p>
                      <p>
                        <b>Status:</b>
                        <span v-if="request.status == 0">Not yet approved</span>
                        <span v-else-if="request.status == 1">Approved</span>
                        <span v-else-if="request.status == 2">Denied</span>
                      </p>
                      <div class="row">
                        <div class="col">
                          <button @click="processRequest(request, true)" class="mt-3 btn btn-success">Accept</button>
                        </div>
                        <div class="col">
                          <button @click="processRequest(request, false)" class="mt-3 btn btn-danger">Decline</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </template>
                <div v-if="loading" class="loader-wrapper">
                  <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                </div>
              </template>
              <div v-else class="col-12 my-3">
                <h5>There are no employee requests</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Datepicker from 'vuejs-datepicker';

  export default {
    data() {
      return {
        requests: [],
        employees: [],
        filterName: "all",
        loading: false,
      }
    },
    mounted() {
      axios.get('/request/all_with_employee')
      .then((response) => {
        if (response.data.success) {
          this.requests = response.data.requests;

          // Reset employees array
          this.employees.splice(0, this.employees.length);

          // Add every employee to the employees array that hasn't been in it yet
          this.requests.forEach(request => {
            if (!this.employees.includes(request.employee.name)) {
              this.employees.push(request.employee.name);
            }
          });
        }
      }).catch(() => {
        this.$toastr.e('Couldn\'t fetch requests');
      });
    },
    methods: {
      processRequest(request, accept) {
        this.loading = true;
        var status = (accept) ? 1 : 2;  // 1 - approved, 2 - denied

        axios.post('/request/process', {
          id: request.id,
          user_id: request.employee.id,
          date: request.date,
          status : status
        }).then((response) => {
          if (response.data.success) {
            this.$toastr.s('Request processed');
            this.requests.splice(this.requests.indexOf(request), 1);
          } else {
            this.$toastr.e('There was an error when processing request');
          }
        }).finally(() => {
          this.loading = false;
        });
      }
    }
  }
</script>
