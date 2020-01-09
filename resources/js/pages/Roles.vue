<template>
    <div class="container">
        <div class="row mt-5 mb-5">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Roles</h1>
          </div>
        </div>
        <div class="card card-default">
            <div class="card-header">Roles</div>
            <div>
                <div>
                    <table class="table">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                        </tr>
                        <tr v-for="role in roles" v-bind:key="role.id" style="margin-bottom: 5px;">
                            <th scope="row">{{ role.id }}</th>
                            <td>{{ role.display_name }}</td>
                            <td>{{ role.description }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" @click="showModal=true">Add Role</button>
        <create-role-modal :showing="showModal" @close="showModal = false"></create-role-modal>
    </div>
</template>
<script>
export default {
    data() {
      return {
        has_error: false,
        roles: null,
        showModal: false,
      }
    },
    mounted() {
      this.getRoles()
    },
    methods: {
      getRoles() {
        this.$http({
          url: `auth/roles`,
          method: 'GET'
        })
        .then((res) => {
            this.roles = res.data.roles
        }, () => {
            this.has_error = true
        })
      }
    }
  }
</script>