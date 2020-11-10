<template>
  <div id="addRequest" class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-header">Add new work from home request</div>

          <div class="card-body">
            <form id="requestForm">
              <p clsas="mt-3">A request must be made at least 4 hours before the end of the previous day!</p>

              <div class="form-group">
                <label for="date">Date</label>
                <datepicker
                  name="date"
                  :monday-first="true"
                  :format="'yyyy-MM-dd'"
                  :disabled-dates="disabledDates"
                  :value="firstAvailableDate"
                >
                </datepicker>
              </div>

              <div class="form-group">
                <label for="hours">Number of hours</label>
                <select class="form-control" name="hours">
                  <option v-for="hour in 8" :value="hour">{{hour}}</option>
                </select>
              </div>

              <button @click="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Datepicker from 'vuejs-datepicker';

  export default {
    components: {
      Datepicker
    },
    props: {
      // user: Object
    },
    data() {
      return {
        firstAvailableDate: Date,
        disabledDates: {},
      }
    },
    created() {
      var today = new Date();
      var firstAvailableDate = new Date();
      var disabledTo = new Date();

      // If it's already 20:00 or later then the employee can only make a request
      // for the day after tomorrow
      if (today.getHours() >= 20) {
        disabledTo.setDate(disabledTo.getDate() + 1);
        firstAvailableDate.setDate(firstAvailableDate.getDate() + 2);
      } else {
        firstAvailableDate.setDate(firstAvailableDate.getDate() + 1);
      }

      this.disabledDates.to = disabledTo;
      this.firstAvailableDate = firstAvailableDate;
    },
    methods: {
      submit(e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById("requestForm"));

        axios.post('/request/add', formData)
        .then((response) => {
          console.log(response.data);
          if (response.data.success) {
            window.location.href = "/";
          } else {
            console.error('There was an error when processing request');
          }
        });
      }
    }
  }
</script>
