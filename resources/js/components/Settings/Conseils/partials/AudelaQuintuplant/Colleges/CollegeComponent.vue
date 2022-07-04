<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a>   <span>Decision du conseil</span>
              </div>
          </div>
      </div>
      <div class="email-body">


        <div class="row" >
          <!-- ============================================================== -->
          <!-- campaign activities   -->
          <!-- ============================================================== -->
          <div class="col-lg-12">
            <div class="section-block"> <h3>Decisions par niveau</h3></div>
            
            <div class="row">
                <!-- ============================================================== -->
                <!-- four widgets   -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- total views   -->
                <!-- ============================================================== -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                  <router-link to="/settings/decisions/nouveaux/colleges">
                    <div class="card">
                      <div class="card-body">
                          <div class="d-inline-block">
                              <h5 class="text-muted">Collège</h5>
                              <h2 class="mb-0"> 0 </h2>
                          </div>
                          <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                              <i class="fa fa-home fa-fw fa-sm text-info"></i>
                          </div>
                      </div>
                    </div>
                  </router-link>

                </div>
                <!-- ============================================================== -->
                <!-- end total views   -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- total followers   -->
                <!-- ============================================================== -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                  <router-link to="/settings/decisions/nouveaux/lyceemoderne">
                    <div class="card">
                      <div class="card-body">
                          <div class="d-inline-block">
                              <h5 class="text-muted">Lycée Moderne</h5>
                              <h2 class="mb-0">0</h2>
                          </div>
                          <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                              <i class="fa fa-home fa-fw fa-sm text-primary"></i>
                          </div>
                      </div>
                    </div>
                  </router-link>
                </div>
                <!-- ============================================================== -->
                <!-- end total followers   -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- partnerships   -->
                <!-- ============================================================== -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                  <router-link to="/settings/decisions/nouveaux/lyceetechnique">
                    <div class="card">
                      <div class="card-body">
                          <div class="d-inline-block">
                              <h5 class="text-muted">Lycée Technique</h5>
                              <h2 class="mb-0">0</h2>
                          </div>
                          <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                              <i class="fa fa-home fa-fw fa-sm text-secondary"></i>
                          </div>
                      </div>
                    </div>
                  </router-link>
                </div>

            </div>

             <div class="row">
          <!-- ============================================================== -->
          <!-- bordered table -->
          <!-- ============================================================== -->
          <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="card">
                  <h5 class="card-header">Liste des decisions pour le collège</h5>
                  <div class="card-body" v-if="!empty">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Code</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Fin de cycle</th>
                                <th scope="col">Nbre Decsions</th>
                                <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                              <!-- <tr>
                                  <th scope="row">1</th>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                  <td>@mdo</td>
                              </tr> -->
                          </tbody>
                      </table>
                  </div>
                  <div class="card-body" v-else>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div style="position: relative; height: 400px;">
                                <img src="/assets/admin/images/empty.png" style="width: 150px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" alt="empty">
                            </div>
                            <h4 style="text-align: center; margin-top: -50px"> {{ message  }} </h4>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                  </div>
              </div>
          </div>
          <!-- ============================================================== -->
          <!-- end bordered table -->
          <!-- ============================================================== -->
        </div>

              
          </div>

        </div>
      </div>
      <div class="email-attachments">

      </div>
    </div>

  </div>

</template>
<script>
export default {

  data() {
      return {
        infos: {},
        empty : 1,
        message: "",
      }
  },
  
}
</script>
