<template>
  <div class="home">
    <h1 class="page-header text-center">DATA KARYAWAN</h1>
    
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
        newMember: {FIRST_NAME: '', LAST_NAME: '',EMAIL:'',PHONE_NUMBER:'',HIRE_DATE:'',JOB_ID:'',SALARY:'',COMMISSON:'',MANAGER_ID:'',DEPARTMENT_ID:'',BONUS:''},
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
                        this.members = response.data.members;
                    }
                });
        },
 
        saveMember: function(){
            //console.log(app.newMember);
            var memForm = this.toFormData(this.newMember);
            axios.post('http://localhost/UAS_PWEB/api.php?crud=create', memForm)
                .then(function(response){
                    //console.log(response);
                    this.newMember = {FIRST_NAME: '', LAST_NAME:'',EMAIL:'',PHONE_NUMBER:'',HIRE_DATE:'',JOB_ID:'',SALARY:'',COMMISSON:'',MANAGER_ID:'',DEPARTMENT_ID:'',BONUS:''};
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
