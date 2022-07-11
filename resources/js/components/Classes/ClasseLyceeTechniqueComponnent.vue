<template>
  <div class="dashboard-influence">
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h3 class="mb-2">Les Classes du lycée technique</h3>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Gestion des Classes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Liste de toutes les classes du lycée technique</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
          <!-- ============================================================== -->
          <!-- four widgets   -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- total views   -->
          <!-- ============================================================== -->
          <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
            <router-link to="/classes/college">
              <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Collège</h5>
                        <h2 class="mb-0"> {{ infos.classesCollegeCount }} </h2>
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
            <router-link to="/classes/lyceemoderne">
              <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Lycée Moderne</h5>
                        <h2 class="mb-0">{{ infos.classesLyceeModerneCount }} </h2>
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
            <router-link to="/classes/lyceetechnique">
              <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Lycée Technique</h5>
                        <h2 class="mb-0">{{ infos.classesLyceeTechniqueCount }}</h2>
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
                  <h5 class="card-header">Liste des classes du lycée technique</h5>
                  <div class="card-body" v-if="empty === 0">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Classe superieure</th>
                                <th scope="col">Effectif total</th>
                                <th scope="col">Capacité</th>
                                <th scope="col">Etat</th>
                                <th scope="col">Sous Classes</th>
                                <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody v-for="info in infos.classesLyceeTechnique" :key="info.id">
                              <tr>
                                  <td> {{ info.codeClasse  }} </td>
                                  <td> {{ info.nomClasse  }} </td>
                                  <td> {{ info.classeSuperieure }} </td>
                                  <td> {{ info.effectifTotal  }} </td>
                                  <td> {{ info.capacite  }} </td>
                                  <td> <button type="button" v-if="info.effectifTotal < info.capacite  " class="btn btn-xs btn-rounded btn-success">Disponible</button>
                                     <button type="submit" v-else class="btn btn-xs btn-rounded btn-secondary">Plus de places</button> 
                                    </td>
                                  <td>
                                     <button type="button" v-if="info.sousClasses" class="btn btn-xs btn-rounded btn-brand" @click="sousClasses(info.id)">Voir les sous classes</button>
                                     <button type="button" v-else class="btn btn-xs btn-rounded btn-dark">Pas de sous classes</button>
                                  </td>
                                  <td>
                                    <div class="row" style="max-width: 100%" >
                                        <div class="col-md-3">
                                          <router-link to="#" class="btn btn-xs btn-rounded btn-info">
                                            <i class="fa fa-eye"></i>
                                          </router-link>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3">
                                          <button type="button" class="btn btn-xs btn-rounded  btn-danger" @click="deleteClasse(info.id)"> <i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                  </td>
                              </tr>
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
        message: "",
      }
  },

  methods: {
    getResults(){
      axios
        .get('/api/classes/lyceetechnique')
        .then(response => {
           console.log(response)
          if(response.status == 200){
            if (response.data.success == false) {

            }else{
              if (response.data.message == 'Aucune classe du lycée technique n\'est enregistrée') {
                this.empty = 1
                this.message = response.data.message
                this.infos = response.data
              } else {
                this.empty = 0
                this.infos = response.data
                console.log(response.data)
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
