<!-- Add Modal -->
<div class="myModal" v-if="showAddModal">
    <div class="modalContainer">
        <div class="modalHeader">
            <span class="headerTitle">Add New Member</span>
            <button class="closeBtn pull-right" @click="showAddModal = false">×</button>
        </div>
        <div class="modalBody">
            <div class="form-group">
                <label>Firstname:</label>
                <input type="text" class="form-control" v-model="newMember.FIRST_NAME">
            </div>
            <div class="form-group">
                <label>Lastname:</label>
                <input type="text" class="form-control" v-model="newMember.LAST_NAME">
            </div>
            <div class="form-group">
                <label>EMAIL:</label>
                <input type="text" class="form-control" v-model="newMember.EMAIL">
            </div>
            <div class="form-group">
                <label>PHONE NUMBER:</label>
                <input type="text" class="form-control" v-model="newMember.PHONE_NUMBER">
            </div>
            <div class="form-group">
                <label>JOB_ID:</label>
                <input type="text" class="form-control" v-model="newMember.JOB_ID">
            </div>
            <div class="form-group">
                <label>SALARY:</label>
                <input type="text" class="form-control" v-model="newMember.SALARY">
            </div>
            <div class="form-group">
                <label>DEPARTMENT_ID:</label>
                <input type="text" class="form-control" v-model="newMember.DEPARTMENT_ID">
            </div>
        </div>
        <hr>
        <div class="modalFooter">
            <div class="footerBtn pull-right">
                <button class="btn btn-default" @click="showAddModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-primary" @click="showAddModal = false; saveMember();"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="myModal" v-if="showEditModal">
    <div class="modalContainer">
        <div class="editHeader">
            <span class="headerTitle">Edit Member</span>
            <button class="closeEditBtn pull-right" @click="showEditModal = false">×</button>
        </div>
        <div class="modalBody">
            <div class="form-group">
                <label>Firstname:</label>
                <input type="text" class="form-control" v-model="newMember.FIRST_NAME">
            </div>
            <div class="form-group">
                <label>Lastname:</label>
                <input type="text" class="form-control" v-model="newMember.LAST_NAME">
            </div>
            <div class="form-group">
                <label>EMAIL:</label>
                <input type="text" class="form-control" v-model="newMember.EMAIL">
            </div>
            <div class="form-group">
                <label>PHONE NUMBER:</label>
                <input type="text" class="form-control" v-model="newMember.PHONE_NUMBER">
            </div>
            <div class="form-group">
                <label>JOB_ID:</label>
                <input type="text" class="form-control" v-model="newMember.JOB_ID">
            </div>
            <div class="form-group">
                <label>SALARY:</label>
                <input type="text" class="form-control" v-model="newMember.SALARY">
            </div>
            <div class="form-group">
                <label>DEPARTMENT_ID:</label>
                <input type="text" class="form-control" v-model="newMember.DEPARTMENT_ID">
            </div>
        </div>
        <hr>
        <div class="modalFooter">
            <div class="footerBtn pull-right">
                <button class="btn btn-default" @click="showEditModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-success" @click="showEditModal = false; updateMember();"><span class="glyphicon glyphicon-check"></span> Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="myModal" v-if="showDeleteModal">
    <div class="modalContainer">
        <div class="deleteHeader">
            <span class="headerTitle">Delete Member</span>
            <button class="closeDelBtn pull-right" @click="showDeleteModal = false">×</button>
        </div>
        <div class="modalBody">
            <h5 class="text-center">Are you sure you want to Delete</h5>
            <h2 class="text-center">{{clickMember.FIRST_NAME}} {{clickMember.LAST_NAME}} {{clickMember.EMAIL}} {{clickMember.PHONE_NUMBER}} {{clickMember.HIRE_DATE}} {{clickMember.JOB_ID}} {{clickMember.SALARY}} {{clickMember.COMMISSON}} {{clickMember.MANAGER_ID}} {{clickMember.DEPARTMENT_ID}} {{clickMember.BONUS}}</h2>
        </div>
        <hr>
        <div class="modalFooter">
            <div class="footerBtn pull-right">
                <button class="btn btn-default" @click="showDeleteModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-danger" @click="showDeleteModal = false; deleteMember(); "><span class="glyphicon glyphicon-trash"></span> Yes</button>
            </div>
        </div>
    </div>
</div>