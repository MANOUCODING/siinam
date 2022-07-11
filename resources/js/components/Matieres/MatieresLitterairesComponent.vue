<template>
  <div class="dashboard-influence">
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h3 class="mb-2">Les Matières littéraires</h3>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Gestion des matières</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Liste de toutes les matières littéraires</li>
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
            <router-link to="/matieres/litteraires">
              <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Littéraires</h5>
                        <h2 class="mb-0"> {{ infos.MatieresLitterairesCount  }} </h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                        <i class="fas fa-book fa-fw fa-sm text-info"></i>
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
            <router-link to="/matieres/scientifiques">
              <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Scientifiques</h5>
                        <h2 class="mb-0">{{ infos.MatieresScientifiquesCount  }}</h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                        <i class="fas fa-book fa-fw fa-sm text-primary"></i>
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
            <router-link to="/matieres/facultatifs">
              <div class="card">
                <div class="card-body">
                    <div class="d-inline-block">
                        <h5 class="text-muted">Facultatifs</h5>
                        <h2 class="mb-0">{{ infos.MatieresFacultativesCount  }}</h2>
                    </div>
                    <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                        <i class="fas fa-book fa-fw fa-sm text-secondary"></i>
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
                  <h5 class="card-header">Liste des matières littéraires</h5>
                  <div class="card-body" v-if="empty == 0">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Code Matière</th>
                                <th scope="col">Matière</th>
                                <th scope="col">Catégorie</th>
                                <th scope="col">Ordre Bulletin</th>
                                <th scope="col">Nombre Affectation</th>
                                <th scope="col">Actions</th>
                            </tr>
                          </thead>
                        <tbody v-for="info in infos.MatieresScientifiques" :key="info.id">
                              <tr>
                                  <th scope="row">{{ info.id  }}</th>
                                  <td> {{ info.codeMatiere  }} </td>
                                  <td> {{ info.nomMatiere  }}</td>
                                  <td> {{ info.Categorie  }} </td>
                                  <td> {{ info.OrdreBulletin  }} </td>
                                  <td> {{ info.nbreAffectation  }} </td>
                                  <td>
                                    <div class="row" style="max-width: 100%" >
                                        <div class="col-md-3">
                                          <router-link to="#" class="btn btn-xs btn-rounded btn-info">
                                            <i class="fa fa-eye"></i>
                                          </router-link>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3">
                                          <button type="button" class="btn btn-xs btn-rounded  btn-danger" @click="deleteMatiere(info.id)"> <i class="fa fa-trash"></i></button>
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
        .get('/api/matieres/litteraires')
        .then(response => {
          if(response.status == 200){
            if (response.data.success == false) {

            }else{
              if (response.data.message == 'Aucune matière littéraire n\'est enregistrée') {
                this.empty = 1
                this.message = response.data.message
                this.infos = response.data
                console.log(this.message)
              } else {
                this.empty = 0
                this.infos = response.data
                console.log(response.data)
              }
            }
          }
      });
    },
    deleteMatiere(id) {
        this.$swal({
            title: "Etes-vous sûr?",
            text: "Vous ne pourrez plus récupérer cette matière !",
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
                .delete(`/api/matieres/${id}`)
                .then(response => {
                    console.log(response.data)
                    this.getResults();
                      if (response.data.message == "La matière a été supprimée avec succès.") {
                        this.$swal({
                            title: "Succès!",
                            text:  response.data.message,
                            icon: "success",
                            timer: 1000,
                            showConfirmButton: false
                        });
                    } else {
                        this.$swal({
                            title: "Erreur",
                            text:  response.data.message,
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
