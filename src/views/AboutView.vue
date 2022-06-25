<template>
  <div class="about">
    <div id="app">
      <div class="container-fluid">
        <div class="row bg-dark">
          <div class="col-lg-12">
            <p
              class="text-center text-light display-4 pt-2"
              style="font-size: 25px"
            >
              Semua Pekerjaan
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-bordered table-striped">
            <thead>
              <tr
                class="text-center bg-info text-light"
                style="font-size: 18px"
              >
                <th>Job Id</th>
                <th>Job Name</th>
                <th>Job Kategori</th>
                <th>Job Deskripsi</th>
                <th>Min Salary</th>
                <th>Max Salary</th>
              </tr>
            </thead>
            <tbody>
              <tr
                class="text-center"
                v-for="user in users"
                :key="user"
                style="font-size: 14px"
              >
                <td>{{ user.job_id }}</td>
                <td>{{ user.job_name }}</td>
                <td>{{ user.job_kategori }}</td>
                <td>{{ user.job_deskripsi }}</td>
                <td>{{ user.min_salary }}</td>
                <td>{{ user.max_salary }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  name: "AboutView",
  data: () => {
    return {
      users: [],
    };
  },
  mounted: function () {
    this.getAllUsers();
  },
  methods: {
    getAllUsers() {
      axios.get("http://localhost/UAS_PWEB/api.php?action=jobs").then((res) => {
        if (res.data.error) {
          this.errorMsg = res.data.message;
        } else {
          // console.warn(res.data.users);
          this.users = res.data.users;
        }
      });
    },
  },
};
</script>
