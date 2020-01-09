<template>
  <div v-if="showing">
    <transition name="modal">
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div class="modal-dialog" role="document">
            <form autocomplete="off" @submit.prevent="addRole" method="post">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Add User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" @click.prevent="close">&times;</span> 
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" v-model="name" placeholder="Name" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email Address</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" v-model="email_address" placeholder="Email Address" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" v-model="password" placeholder="Password" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                      <select v-model="role" class="form-control">
                          <option v-for="role in roles" :key="role.id" :value="role.id">{{ role.display_name }}</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" @click.prevent="close">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: null,
      email_address: null,
      role: null,
      password: null,
    }
  },
  props: {
    showing: {
      required: true,
      type: Boolean
    },
    roles: {
      required: true,
      type: Array
    }
  },
  methods:{
    close(){
      this.$emit('close')
    },
    addRole(){
      this.$http({
        url: `auth/add-user`,
        method: 'POST',
        params: {
          name: this.name,
          email: this.email_address,
          user_role_id: this.role,
          password: this.password,
        }
      })
      .then((res) => {
          location.reload(true)
      }, () => {
          this.has_error = true
      })
    }
  }
}
</script>
<style>
.modal-dialog{
  max-width: 600px;
}
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}
</style>