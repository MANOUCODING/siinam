<template>
  <div class="dashboard-influence">
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h3 class="mb-2">Tous les élèves <span v-if="emptyC === 0">de la classe de {{ infos.classe.codeClasse }} </span></h3>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Gestion des élèves</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Liste de tous les élèves</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" v-if="emptyC === 0">
         <!-- ============================================================== -->
          <!-- four widgets   -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- total views   -->
          <!-- ============================================================== -->
          <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
            <router-link :to="{name:'eleves.classes.all', params:{classe_id: classe_id }}">
              <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Elèves</h5>
                        <h2 class="mb-0"> {{ infos.infosTotalCount}} </h2>
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
            <router-link :to="{name:'eleves.classes.nouveaux', params:{classe_id: classe_id }}" >
              <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Nouveaux</h5>
                        <h2 class="mb-0">{{ infos.infosInscritCount }} </h2>
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
            <router-link :to="{name:'eleves.classes.anciens', params:{classe_id: classe_id }}">
              <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Anciens</h5>
                        <h2 class="mb-0">{{ infos.infosAnciensCount }}</h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                        <i class="fa fa-home fa-fw fa-sm text-secondary"></i>
                    </div>
                </div>
              </div>
            </router-link>
          </div>

        </div>

        <!-- ============================================================== -->
        <!-- widgets   -->
        <!-- ============================================================== -->
        <div class="row">
          <!-- ============================================================== -->
          <!-- bordered table -->
          <!-- ============================================================== -->
          <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="card">
                  <h5 class="card-header">Tous les élèves <span v-if="emptyC === 0">de la classe de {{ infos.classe.codeClasse }}</span></h5>
                  <div v-if="emptyC === 0">
                    <router-link style="float: right; margin-top: -45px; margin-right: 17px" :to='{name:"CreateEnseignantComponent"}' class="btn btn-rounded btn-primary"><i class="fa fa-plus"></i>Inscrire un Elève</router-link>
                    </div>
                  <div class="card-body" v-if="empty === 0">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Code</th>
                              <th scope="col">Nom Complet</th>
                              <th scope="col">Telephone</th>
                              <th scope="col">Adresse</th>
                              <th scope="col">Sexe</th>
                              <th scope="col">Status</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody v-for="info in infos.infosTotal" :key="info">
                              
                          </tbody>
                      </table>
                  </div>
                  <div class="card-body" v-else-if="empty === 1">
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
        <!-- ============================================================== -->
        <!-- end widgets   -->
        <!-- ============================================================== -->

      </div>
  </div>
</template>
<script>
export default {

  data() {
      return {
        infos: {},
        empty : null,
        emptyC : null,
        message: null,
        classe_id: null
      }
  },

  methods: {
    getResults(){
      axios
        .get(`/api/eleves/classes/${this.$route.params.id}`)
        .then(response => {
          if(response.status == 200){
            if (response.data.success == false) {

            }else{
              if (response.data.message == 'Aucune classe Trouvée') {
                this.empty = 1
                this.emptyC = 1
                this.message = response.data.message
              }else if(response.data.message == 'Aucune rentrée Scolaire en cours n\'est enregistrée'){
                this.empty = 1
                this.emptyC = 0
                this.message = response.data.message
              } else if(response.data.message == "Ooops il n'y a aucun élève appartenant à cette classe"){
                this.empty = 1
                this.emptyC = 0
                this.message = response.data.message
                this.infos = response.data
                this.classe_id =  response.data.classe.id
                console.log( this.classe_id)
              } else {
                this.empty = 0
                this.emptyC = 0
                this.infos = response.data
                this.classe_id =  response.data.classe.id
              }
            }
          }
      });
    },

    deleteClasse(id) {
        this.$swal({
            title: "Etes-vous sûr?",
            text: "Vous ne pourrez plus récupérer cette classe !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "blue",
            confirmButtonText: "Oui, supprimez-la!",
            cancelButtonText: "Non, annuler !",
            closeOnConfirm: true,
            closeOnCancel: true
        }).then((confirmed) => {
              if (confirmed.isConfirmed) {
                axios
                .delete(`/api/classes/${id}`)
                .then(response => {
                    console.log(response.data)
                    this.getResults();
                      if (response.data.message == "la classe a été supprimée avec succès.") {
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

  mounted() {
      this.getResults();
    }

}
</script>
