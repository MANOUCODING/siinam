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
            <div class="section-block"> <h3>Decisions pour les doublants</h3></div>
            
            <div class="row">
                <!-- ============================================================== -->
                <!-- four widgets   -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- total views   -->
                <!-- ============================================================== -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                  <router-link to="/settings/decisions/doublants/colleges">
                    <div class="card">
                      <div class="card-body">
                          <div class="d-inline-block">
                              <h5 class="text-muted">Collège</h5>
                              <h2 class="mb-0"> {{ infos.infosCollegeCount  }} </h2>
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
                  <router-link to="/settings/decisions/doublants/lyceemoderne">
                    <div class="card">
                      <div class="card-body">
                          <div class="d-inline-block">
                              <h5 class="text-muted">Lycée Moderne</h5>
                              <h2 class="mb-0">{{ infos.infosLyceeModerneCount }}</h2>
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
                  <router-link to="/settings/decisions/doublants/lyceetechnique">
                    <div class="card">
                      <div class="card-body">
                          <div class="d-inline-block">
                              <h5 class="text-muted">Lycée Technique</h5>
                              <h2 class="mb-0">{{ infos.infosLyceeTechniqueCount  }}</h2>
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
                  <div class="card-body" v-if="empty == 0">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Code</th>
                                <th scope="col">Nom</th>
                                 <th scope="col">Fin Cycle</th>
                                <th scope="col">Nbre Decsions</th>
                                <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody v-for="info in infos.infosCollege" :key="info">
                              <tr>
                                  <th scope="row"> {{info.id}} </th>
                                  <td> {{info.code }} </td>
                                  <td> {{info.niveau }} </td>
                                  <td v-if="info.finDeCycle == 1">
                                    <button type="button" class="btn btn-xs btn-rounded btn-primary">
                                     OUI
                                    </button>
                                  </td>
                                  <td v-else>
                                    <button type="button" class="btn btn-xs btn-rounded  btn-dark">
                                     NON
                                    </button>
                                  </td>
                                  <td v-if="info.nbreDecision == 0">
                                    <router-link :to="{ name: 'settings.decisions.conseils.show.doublants', params: { id: info.id }}" class="btn btn-xs btn-rounded btn-primary">
                                     Pas décisions
                                    </router-link> 
                                  </td>
                                  <td v-else>
                                    <router-link :to="{ name: 'settings.decisions.conseils.show.doublants', params: { id: info.id }}" class="btn btn-xs btn-rounded btn-primary"> 
                                      {{ info.nbreDecision }} décision(s)
                                    </router-link> 
                                  </td>
                                  <td>
                                    <div class="row" style="max-width: 100%" >
                                      <div class="col-md-3">
                                        <router-link :to="{ name: 'settings.decisions.conseils.show.doublants', params: { id: info.id }}" class="btn btn-xs btn-rounded btn-primary">
                                          <i class="fa fa-eye"></i>
                                        </router-link>
                                      </div>
                                      <div class="col-md-1"></div>
                                      <div class="col-md-3">
                                        <button type="button" class="btn btn-xs btn-rounded  btn-danger" @click="deleteDecisionConseilAll(info.id)"> <i class="fa fa-trash"></i></button>
                                      </div>
                                    </div>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <div class="card-body" v-else-if="empty == 1">
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
        empty : null,
        message: "",
      }
  },

  methods:{
    getResults(){
      axios
        .get('/api/settings/decisions/conseils/doublants')
        .then(response => {
          if(response.status == 200){
            if (response.data.success == false) {
              if (response.data.message == 'Desolé nous ne trouvons aucune classe disponible') {
                this.empty = 1
                this.message = response.data.message
              } 
            }else{
               if (response.data.message == 'Desolé nous ne trouvons aucune classe disponible') {
                this.empty = 1
                this.message = response.data.message
              } else{
                this.empty = 0
                this.infos = response.data
              }
            }
          }
      });
    },

    
   deleteDecisionConseilAll(id) {
      this.$swal({
        title: "Etes-vous sûr?",
        text: "Vous ne pourrez plus récupérer ces données!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "blue",
        confirmButtonText: "Oui, supprimez!",
        cancelButtonText: "Non, annuler !",
        closeOnConfirm: true,
        closeOnCancel: true
      }).then((confirmed) => {
        if (confirmed.isConfirmed) {
          axios
          .delete(`/api/settings/decisions/conseils/${id}/destroyAll/doublants`)
          .then(response => {
              this.getResults();
                if (response.data.message == 'Toutes les décisions de cette classe ont été supprimée avec succès.') {
                  this.$swal({
                      title: "Succès!",
                      text: response.data.message,
                      icon: "success",
                      timer: 1000,
                      showConfirmButton: false
                  });
              } else {
                  this.$swal({
                      title: "Erreur",
                      text: response.data.message,
                      icon: "error",
                      timer: 1000
                  });
              }
          });
        }
      });
    },
  },

  mounted(){
    this.getResults();
  }
  
}
</script>
