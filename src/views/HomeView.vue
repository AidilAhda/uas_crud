<template>
  <div class="home">
    <div id="app">
      <div class="container-fluid">
        <div class="row bg-dark">
          <div class="col-lg-12">
            <p
              class="text-center text-light display-4 pt-2"
              style="font-size: 25px"
            >
              Data Karyawan
            </p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-3">
          <div class="col-lg-6">
            <h3 class="text-info">LIST KARYAWAN</h3>
          </div>
          <div class="col-lg-6">
            <button
              class="btn btn-info float-right"
              @click="showAddModal = true"
            >
              <i class="fas fa-users"></i>&nbsp;&nbsp;Add New Member
            </button>
          </div>
        </div>
        <hr class="bg-info" />
        <div class="alert alert-danger" v-if="errorMsg">{{ errorMsg }}</div>
        <div class="alert alert-success" v-if="successMsg">
          {{ successMsg }}
        </div>
        <!-- display data -->
        <div class="row">
          <div class="col-lg-12">
            <table class="table table-bordered table-striped">
              <thead>
                <tr
                  class="text-center bg-info text-light"
                  style="font-size: 18px"
                >
                  <th>Employee Id</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Job Id</th>
                  <th>Salary</th>
                  <th>Department Id</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  class="text-center"
                  v-for="user in users"
                  :key="user"
                  style="font-size: 14px"
                >
                  <td>{{ user.employee_id }}</td>
                  <td>{{ user.first_name }}</td>
                  <td>{{ user.last_name }}</td>
                  <td>{{ user.email }}</td>
                  <td>{{ user.phone_number }}</td>
                  <td>{{ user.job_id }}</td>
                  <td>{{ user.salary }}</td>
                  <td>{{ user.department_id }}</td>
                  <td>
                    <a
                      href="#"
                      class="btn btn-success"
                      @click="
                        showEditModal = true;
                        selectUser(user);
                      "
                      ><i class="glyphicon glyphicon-edit"></i
                    ></a>
                  </td>
                  <td>
                    <a
                      href="#"
                      class="btn btn-danger"
                      @click="
                        showDeleteModal = true;
                        selectUser(user);
                      "
                      ><i class="glyphicon glyphicon-trash"></i
                    ></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- add new member -->
      <div id="overlay" v-if="showAddModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add New Member</h5>
              <button type="button" class="close" @click="showAddModal = false">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-4">
              <form action="#" method="post">
                <div class="form-group">
                  <input
                    type="number"
                    name="employee_id"
                    class="form-control form-control-lg"
                    placeholder="Employee Id"
                    v-model="newUsers.employee_id"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="text"
                    name="first_name"
                    class="form-control form-control-lg"
                    placeholder="First Name"
                    v-model="newUsers.first_name"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="text"
                    name="last_name"
                    class="form-control form-control-lg"
                    placeholder="Last Name"
                    v-model="newUsers.last_name"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="email"
                    name="email"
                    class="form-control form-control-lg"
                    placeholder="Email"
                    v-model="newUsers.email"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="tel"
                    name="phone"
                    class="form-control form-control-lg"
                    placeholder="Phone"
                    v-model="newUsers.phone_number"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="text"
                    name="job_id"
                    class="form-control form-control-lg"
                    placeholder="Job id"
                    v-model="newUsers.job_id"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="number"
                    name="salary"
                    class="form-control form-control-lg"
                    placeholder="Salary"
                    v-model="newUsers.salary"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="text"
                    name="department_id"
                    class="form-control form-control-lg"
                    placeholder="Department id"
                    v-model="newUsers.department_id"
                  />
                </div>
                <div class="form-group">
                  <button
                    class="btn btn-info btn-block btn-lg"
                    style="color: white"
                    @click="
                      showAddModal = false;
                      addUsers();
                      clearMsg();
                    "
                  >
                    Add Member
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit member -->
      <div id="overlay" v-if="showEditModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Member</h5>
              <button
                type="button"
                class="close"
                @click="showEditModal = false"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-4">
              <form action="#" method="post">
                <div class="form-group">
                  <input
                    type="text"
                    name="employee_id"
                    class="form-control form-control-lg"
                    v-model="currentUser.employee_id"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="text"
                    name="first_name"
                    class="form-control form-control-lg"
                    v-model="currentUser.first_name"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="text"
                    name="last_name"
                    class="form-control form-control-lg"
                    v-model="currentUser.last_name"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="email"
                    name="email"
                    class="form-control form-control-lg"
                    v-model="currentUser.email"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="tel"
                    name="phone"
                    class="form-control form-control-lg"
                    v-model="currentUser.phone_number"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="text"
                    name="job_id"
                    class="form-control form-control-lg"
                    v-model="currentUser.job_id"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="number"
                    name="salary"
                    class="form-control form-control-lg"
                    v-model="currentUser.salary"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="text"
                    name="department_id"
                    class="form-control form-control-lg"
                    v-model="currentUser.department_id"
                  />
                </div>
                <div class="form-group">
                  <button
                    class="btn btn-info btn-block btn-lg"
                    style="color: white"
                    @click="
                      showEditModal = false;
                      updateUser();
                      clearMsg();
                    "
                  >
                    Update Member
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Delete member -->
      <div id="overlay" v-if="showDeleteModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Delete Member</h5>
              <button
                type="button"
                class="close"
                @click="showDeleteModal = false"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-4">
              <h4>Are you Sure to Delete this Member?</h4>
              <h5>You Are Deleting {{ currentUser.first_name }}</h5>
              <hr />
              <button
                class="btn btn-danger btn-lg"
                @click="
                  showDeleteModal = false;
                  deleteUser();
                  clearMsg();
                "
              >
                Yes
              </button>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <button
                class="btn btn-success btn-lg"
                @click="showDeleteModal = false"
              >
                No
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import axios from "axios";

export default {
  name: "HomeView",

  data: () => {
    return {
      showAddModal: false,
      showEditModal: false,
      showDeleteModal: false,
      errorMsg: "",
      successMsg: "",
      users: [],
      newUsers: {
        employee_id: "",
        first_name: "",
        last_name: "",
        email: "",
        phone_number: "",
        job_id: "",
        salary: "",
        department_id: "",
      },
      currentUser: {},
    };
  },
  mounted: function () {
    this.getAllUsers();
  },
  methods: {
    getAllUsers() {
      axios.get("http://localhost/UAS_PWEB/api.php?action=read").then((res) => {
        if (res.data.error) {
          this.errorMsg = res.data.message;
        } else {
          // console.warn(res.data.users);
          this.users = res.data.users;
        }
      });
    },
    addUsers() {
      var formData = this.toFormData(this.newUsers);
      axios
        .post("http://localhost/UAS_PWEB/api.php?action=create", formData)
        .then((res) => {
          this.newUsers = {
            employee_id: "",
            first_name: "",
            last_name: "",
            email: "",
            phone_number: "",
            job_id: "",
            salary: "",
            department_id: "",
          };
          if (res.data.error) {
            this.errorMsg = res.data.message;
          } else {
            this.successMsg = res.data.message;
            this.getAllUsers();
          }
        });
    },
    updateUser() {
      var formData = this.toFormData(this.currentUser);
      axios
        .post("http://localhost/UAS_PWEB/api.php?action=update", formData)
        .then((res) => {
          this.currentUser = {};
          if (res.data.error) {
            this.errorMsg = res.data.message;
          } else {
            this.successMsg = res.data.message;
            this.getAllUsers();
          }
        });
    },
    deleteUser() {
      var formData = this.toFormData(this.currentUser);
      axios
        .post("http://localhost/UAS_PWEB/api.php?action=delete", formData)
        .then((res) => {
          this.currentUser = {};
          if (res.data.error) {
            this.errorMsg = res.data.message;
          } else {
            this.successMsg = res.data.message;
            this.getAllUsers();
          }
        });
    },
    toFormData(obj) {
      var fd = new FormData();
      for (var i in obj) {
        fd.append(i, obj[i]);
      }
      return fd;
    },
    selectUser(user) {
      this.currentUser = user;
    },
    clearMsg() {
      this.errorMsg = "";
      this.successMsg = "";
    },
  },
};
</script>
<style>
.container {
  text-align: center;
}
.container .btn-info {
  color: #ffff;
}
#overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgb(0, 0, 0, 0.6);
}
</style>
