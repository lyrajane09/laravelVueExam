<template>
    <div class="container">
        <div class="row mt-5 mb-5">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
          </div>
        </div>
        <div class="card card-default">
            <div class="card-header">Users</div>
            <div>
                <div>
                    <table class="table">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Role</th>
                            <th scope="col">Created At</th>
                        </tr>
                        <tr v-for="user in users" v-bind:key="user.id" style="margin-bottom: 5px;">
                            <th scope="row">{{ user.name }}</th>
                            <td>{{ user.email }}</td>
                            <td>{{ user.user_role.display_name }}</td>
                            <td>{{ user.created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" @click="showModal=true">Add User</button>
        <create-user-modal :showing="showModal" :roles="roles" @close="showModal = false"></create-user-modal>
    </div>
</template>
<script>
export default {
    data() {
      return {
        has_error: false,
        users: null,
        showModal: false,
        roles:[],
      }
    },
    mounted() {
      this.getUsers()
    },
    methods: {
      getUsers() {
        this.$http({
          url: `auth/users`,
          method: 'GET'
        })
        .then((res) => {
            this.users = res.data.users
            this.roles = res.data.roles
        }, () => {
            this.has_error = true
        })
      }
    }
  }
</script>