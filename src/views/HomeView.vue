<template>
  <div class="home">
    <div class="container">
    <h1 class="page-header text-center">DATA KARYAWAN</h1>
    <div id="vuejscrudmembers">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-12">
                    <h2>Member List
                    <button class="btn btn-primary pull-right" @click="showAddModal = true"><span class="glyphicon glyphicon-plus"></span> Member</button>
                    </h2>
                </div>
            </div>
 
            <div class="alert alert-danger text-center" v-if="errorMessage">
                <button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">×</span></button>
                <span class="glyphicon glyphicon-alert"></span> {{ errorMessage }}
            </div>
             
            <div class="alert alert-success text-center" v-if="successMessage">
                <button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">×</span></button>
                <span class="glyphicon glyphicon-ok"></span> {{ successMessage }}
            </div>
 
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Employee id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Job Id</th>
                    <th>Salary</th>
                    <th>Department Id</th>

                    <th>Action</th>
                </thead>
                <tbody>
                    <tr v-for="member in members" :key="member.id">
                        <td>{{ member.employee_id }}</td>
                        <td>{{ member.firstname }}</td>
                        <td>{{ member.lastname }}</td>
                        <td>{{ member.email }}</td>
                        <td>{{ member.phonenumber }}</td>
                        <td>{{ member.jobid }}</td>
                        <td>{{ member.salary }}</td>
                        <td>{{ member.departmentid }}</td>
                        <td>
                            <button class="btn btn-success" @click="showEditModal = true; selectMember(member);"><span class="glyphicon glyphicon-edit"></span> Edit</button> 
                            <button class="btn btn-danger" @click="showDeleteModal = true; selectMember(member);"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
  </div>
</template>

<script>
// @ is an alias to /src
import axios from 'axios'
export default {
  name: 'HomeView',
    data:() =>{
        return{
        showAddModal: false,
        showEditModal: false,
        showDeleteModal: false,
        errorMessage: "",
        successMessage: "",
        members: [],
        newMember: {firstname: '', lastname: '',email:'',phonenumber:'',jobid:'',salary:'',departmentid:''},
        clickMember: {}
    }
    },
    mounted: function(){
        this.getAllMembers();
    },
 
    methods:{
        getAllMembers: function(){
            axios.get('http://localhost/UAS_PWEB/api.php')
                .then(function(response){
                    //console.log(response);
                    if(response.data.error){
                        this.errorMessage = response.data.message;
                    }
                    else{
                      console.warn(response.data.members);
                       this.members = response.data;
                    }
                });
        },
 
        saveMember: function(){
            //console.log(app.newMember);
            var memForm = this.toFormData(this.newMember);
            axios.post('http://localhost/UAS_PWEB/api.php?crud=create', memForm)
                .then(function(response){
                    //console.log(response);
                    this.newMember = {firstname: '', lastname: '',email:'',phonenumber:'',jobid:'',salary:'',departmentid:''};
                    if(response.data.error){
                        this.errorMessage = response.data.message;
                    }
                    else{
                        this.successMessage = response.data.message
                        this.getAllMembers();
                    }
                });
        },
 
        updateMember(){
            var memForm = this.toFormData(this.clickMember);
            axios.post('http://localhost/UAS_PWEB/api.php?crud=update', memForm)
                .then(function(response){
                    //console.log(response);
                    this.clickMember = {};
                    if(response.data.error){
                        this.errorMessage = response.data.message;
                    }
                    else{
                        this.successMessage = response.data.message
                        this.getAllMembers();
                    }
                });
        },
 
        deleteMember(){
            var memForm = this.toFormData(this.clickMember);
            axios.post('http://localhost/UAS_PWEB/api.php?crud=delete', memForm)
                .then(function(response){
                    //console.log(response);
                    this.clickMember = {};
                    if(response.data.error){
                        this.errorMessage = response.data.message;
                    }
                    else{
                        this.successMessage = response.data.message
                        this.getAllMembers();
                    }
                });
        },
 
        selectMember(member){
            this.clickMember = member;
        },
 
        toFormData: function(obj){
            var form_data = new FormData();
            for(var key in obj){
                form_data.append(key, obj[key]);
            }
            return form_data;
        },
 
        clearMessage: function(){
            this.errorMessage = '';
            this.successMessage = '';
        }
 
    }
}


</script>
