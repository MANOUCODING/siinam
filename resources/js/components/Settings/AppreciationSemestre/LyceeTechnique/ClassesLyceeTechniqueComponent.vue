<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a>   <span>Appréciations par semestres</span>
              </div>
          </div>
      </div>
      <div class="email-body">


        <div class="row" >
          <!-- ============================================================== -->
          <!-- campaign activities   -->
          <!-- ============================================================== -->
          <div class="col-lg-12">
            <div class="section-block"> <h3>Lycée Technique</h3></div>
            
            <div class="row">
                <!-- ============================================================== -->
                <!-- four widgets   -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- total views   -->
                <!-- ============================================================== -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                  <router-link to="/settings/appreciations/semestres/colleges">
                    <div class="card">
                      <div class="card-body">
                          <div class="d-inline-block">
                              <h5 class="text-muted">Collège</h5>
                              <h2 class="mb-0"> {{ infos.appreciationSemestresCollegeCount }} </h2>
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
                  <router-link to="/settings/appreciations/semestres/lyceemoderne">
                    <div class="card">
                      <div class="card-body">
                          <div class="d-inline-block">
                              <h5 class="text-muted">Lycée Moderne</h5>
                              <h2 class="mb-0">{{ infos.appreciationSemestresLyceeModerneCount }}</h2>
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
                  <router-link to="/settings/appreciations/semestres/lyceetechnique">
                    <div class="card">
                      <div class="card-body">
                          <div class="d-inline-block">
                              <h5 class="text-muted">Lycée Technique</h5>
                              <h2 class="mb-0">{{ infos.appreciationSemestresLyceeTechniqueCount  }}</h2>
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
                  <h5 class="card-header">Liste des appreciations pour le lycée Technique</h5>
                  <div class="card-body" v-if="empty == 0">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Code</th>
                                <th scope="col">Classe</th>
                                <th scope="col">Nbre appréciations</th>
                                <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody v-for="info in infos.appreciationSemestres" :key="info">
                              <tr>
                                  <th scope="row"> {{info.id}} </th>
                                  <td> {{info.codeClasse }} </td>
                                  <td> {{info.nomClasse }} </td>
                                  <td v-if="info.nbre_appreciation_semestres == 0">
                                    <router-link :to="{ name: 'settings.appreciations.semestres.show', params: { id: info.id }}" class="btn btn-xs btn-rounded btn-primary">
                                     Pas d'appréciations
                                    </router-link> 
                                  </td>
                                  <td v-else>
                                    <router-link :to="{ name: 'settings.appreciations.semestres.show', params: { id: info.id }}" class="btn btn-xs btn-rounded btn-primary"> 
                                      {{ info.nbre_appreciation_semestres }} appréciation(s)
                                    </router-link> 
                                  </td>
                                  <td>
                                    <div class="row" style="max-width: 100%" >
                                      <div class="col-md-3">
                                        <router-link :to="{ name: 'settings.appreciations.semestres.show', params: { id: info.id }}" class="btn btn-xs btn-rounded btn-primary">
                                          <i class="fa fa-eye"></i>
                                        </router-link>
                                      </div>
                                      <div class="col-md-1"></div>
                                      <div class="col-md-3">
                                        <button type="button" class="btn btn-xs btn-rounded  btn-danger" @click="deleteAppreciationSemestreAll(info.id)"> <i class="fa fa-trash"></i></button>
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
        .get('/api/settings/appreciations/semestres/lyceetechnique')
        .then(response => {
          if(response.status == 200){
            console.log(response.data)
            if (response.data.success == false) {

              if (response.data.message == 'Aucune  Classe du lycée technique n\'est enregistrée') {
                this.empty = 1
                this.message = response.data.message
              } else if(response.data.message == 'Aucune  appréciation par semestre du lycée technique n\'est enregistrée'){
                this.empty = 1
                this.message = response.data.message
              }
            }else{
                this.empty = 0
                this.infos = response.data.data
            }
          }
      });
    },

    
   deleteAppreciationSemestreAll(id) {
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
          .delete(`/api/settings/appreciations/semestres/${id}/destroyAll`)
          .then(response => {
              this.getResults();
                if (response.data.message == 'Toutes les appréciations de cette classe ont été supprimée avec succès.') {
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
