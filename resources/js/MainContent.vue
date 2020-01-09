<template>
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div id="content" class="col-md-12 col-sm-12">
                <router-view></router-view>
            </div>
          </div>
        </div>
      </section>
  </div>
</template>
<script>
export default {
    data(){
        return{

        }
    },
    components: {
        
    }
}
</script>
