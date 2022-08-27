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

        <div class="row" v-if="showFormUpdateMatiereScientifique">
           <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="card">
                <h5 class="card-header">Modifier une  matière littéraire</h5>
                <div class="card-body">
                   <div class="row">
                      <div class="col-md-3">
                          <div class="form-group" v-if="!errors.codeMatiere">
                              <label>Code Matière</label> <br>
                              <input type="text" name="codeMatiere"  v-model="data.codeMatiere" class="form-control"  required>
                          </div>
                          <div class="form-group" v-else>
                              <label for="validationServer03">Code Matière</label> <br>
                              <input type="text" name="codeMatiere"  v-model="data.codeMatiere" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                              <div  v-for=" error_codeMatiere in errors.codeMatiere" :key="error_codeMatiere"  class="invalid-feedback" style="color: red; font-size: 0.9em">
                                  {{ error_codeMatiere }}
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group" v-if="!errors.nomMatiere">
                              <label>Matière</label> <br>
                              <input type="text" name="nomMatiere"  v-model="data.nomMatiere" class="form-control"  required>
                          </div>
                          <div class="form-group" v-else>
                              <label for="validationServer03">Matière</label> <br>
                              <input type="text" name="nomMatiere"  v-model="data.nomMatiere" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                              <div v-for=" error_nomMatiere in errors.nomMatiere" :key="error_nomMatiere" style="color: red; font-size: 0.9em" >
                                  {{ error_nomMatiere }}
                              </div>
                          </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group" v-if="!errors.OrdreBulletin">
                          <label>Ordre Bulletin</label> <br>
                          <input type="number" name="OrdreBulletin"  v-model="data.OrdreBulletin" class="form-control"  required>
                        </div>
                        <div class="form-group" v-else>
                          <label for="validationServer03">Ordre Bulletin</label> <br>
                          <input type="number" name="OrdreBulletin"  v-model="data.OrdreBulletin" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                          <div v-for=" error_OrdreBulletin in errors.OrdreBulletin" :key="error_OrdreBulletin" style="color: red; font-size: 0.9em" >
                              {{ error_OrdreBulletin }}
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3"> <br>
                        <div  v-if="loadingSave">
                          <button class="btn  btn-primary"  type="button">
                              Modification en cours ....
                          </button>
                        </div>
                        <div  v-if="!loadingSave">
                          <button type="submit" class="btn btn-primary" @click.prevent="update(data.id)" >Modifier</button>
                          &nbsp; &nbsp; &nbsp; <button type="submit" class="btn btn-secondary" @click.prevent="cancelUpdate" >Fermez</button>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="row" v-if="showFormAddMatiereScientifique">
           <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="card">
                <h5 class="card-header">Ajouter une  matière littéraire</h5>
                <div class="card-body">
                   <div class="row">
                      <div class="col-md-3">
                          <div class="form-group" v-if="!errors.codeMatiere">
                              <label>Code Matière</label> <br>
                              <input type="text" name="codeMatiere"  v-model="data.codeMatiere" class="form-control"  required>
                          </div>
                          <div class="form-group" v-else>
                              <label for="validationServer03">Code Matière</label> <br>
                              <input type="text" name="codeMatiere"  v-model="data.codeMatiere" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                              <div  v-for=" error_codeMatiere in errors.codeMatiere" :key="error_codeMatiere"  class="invalid-feedback" style="color: red; font-size: 0.9em">
                                  {{ error_codeMatiere }}
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group" v-if="!errors.nomMatiere">
                              <label>Matière</label> <br>
                              <input type="text" name="nomMatiere"  v-model="data.nomMatiere" class="form-control"  required>
                          </div>
                          <div class="form-group" v-else>
                              <label for="validationServer03">Matière</label> <br>
                              <input type="text" name="nomMatiere"  v-model="data.nomMatiere" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                              <div v-for=" error_nomMatiere in errors.nomMatiere" :key="error_nomMatiere" style="color: red; font-size: 0.9em" >
                                  {{ error_nomMatiere }}
                              </div>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <div class="form-group" v-if="!errors.OrdreBulletin">
                            <label>Ordre Bulletin</label> <br>
                            <input type="number" name="OrdreBulletin"  v-model="data.OrdreBulletin" class="form-control"  required>
                          </div>
                          <div class="form-group" v-else>
                            <label for="validationServer03">Ordre Bulletin</label> <br>
                            <input type="number" name="OrdreBulletin"  v-model="data.OrdreBulletin" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                            <div v-for=" error_OrdreBulletin in errors.OrdreBulletin" :key="error_OrdreBulletin" style="color: red; font-size: 0.9em" >
                                {{ error_OrdreBulletin }}
                            </div>
                          </div>
                      </div>
                      <div class="col-md-3"> <br>
                        <div  v-if="loadingSave">
                          <button class="btn  btn-primary"  type="button">
                              Enregistrement en cours ....
                          </button>
                        </div>
                        <div  v-if="!loadingSave">
                          <button type="submit" class="btn btn-primary" @click.prevent="create" >Enregistrer</button>
                          &nbsp; &nbsp; &nbsp; <button type="submit" class="btn btn-secondary" @click.prevent="cancelCreate" >Fermer</button>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
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
                  <div v-if="showButtonAddMatiereScientifique">
                    <button type="button" @click="createMatiereScientifique" style="float: right; margin-top: -45px; margin-right: 17px" class="btn btn-rounded btn-primary"> <i class="fa fa-plus"></i> Ajouter une matière </button>
                  </div>
                  <div class="card-body" v-if="empty == 0">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Code Matière</th>
                              <th scope="col">Matière</th>
                              <th scope="col">Ordre Bulletin</th>
                              <th scope="col">Nombre Affectation</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody v-for="info in infos.MatieresScientifiques" :key="info.id">
                            <tr>
                              <th scope="row">{{ info.id }}</th>
                              <th scope="row"> {{ info.codeMatiere  }} </th>
                              <th scope="row">{{ info.nomMatiere  }}</th>
                              <th scope="row">  <button type="button" class="btn btn-rounded btn-primary">{{ info.OrdreBulletin  }} </button> </th>
                              <th scope="row"> 
                                <button type="button" class="btn btn-rounded btn-secondary" v-if="info.nbreAffectation === 0">Pas d'affectation</button>
                                <button type="button" class="btn btn-rounded btn-primary" v-else> {{ info.nbreAffectation  }}</button>
                              </th>
                              <td>
                                <div class="row" style="max-width: 100%" >
                                    <div class="col-md-4">
                                      <button type="button" class="btn  btn-rounded  btn-primary" @click="updateMatiereScientifiques(info.id)"> <i class="fa fa-edit"></i></button>
                                    </div>
                                    <div class="col-md-4">
                                      <router-link :to="{ name:'ShowMatiereComponent', params: { id: info.id }}" class="btn btn-rounded btn-info">
                                        <i class="fa fa-eye"></i>
                                      </router-link>
                                    </div>
                                    <div class="col-md-4">
                                      <button type="button" class="btn  btn-rounded  btn-danger" @click="deleteMatiere(info.id)"> <i class="fa fa-trash"></i></button>
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
         data:{
          id: null,
          codeMatiere : "",
          nomMatiere:"",
          OrdreBulletin:"",
          Categorie:"Matières Littéraires",
        },
        errors: {},
        errorcheck: true,
        loadingSave: false,
        message: "",
        showButtonAddMatiereScientifique: 1, 
        showFormAddMatiereScientifique: 0, 
        showFormUpdateMatiereScientifique: 0, 
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

    create(){
      this.loadingSave = true
      axios.post('/api/matieres/store', this.data)
      .then(response => {
         this.loadingSave = false
          if (response.data.success == true) {
              this.$swal({
                  title: "Succès!",
                  text: response.data.message,
                  icon: "success",
                  timer: 1000,
                  showConfirmButton: false
              });
               this.showFormUpdateMatiereScientifique = 0
              this.getResults();
          } else {
              this.errorcheck = false
              this.errors = response.data.errors
          }
      }).catch(error => console.log(error))
    },

    update(id){
      this.loadingSave = true
      axios.put(`/api/matieres/${id}/update`, this.data)
      .then(response => {
         this.loadingSave = false
          if (response.data.success == true) {
              this.$swal({
                  title: "Succès!",
                  text: response.data.message,
                  icon: "success",
                  timer: 1000,
                  showConfirmButton: false
              });
              this.showButtonAddMatiereScientifique = 1
              this.showFormAddMatiereScientifique = 0
              this.getResults();
          } else {
              this.errorcheck = false
              this.errors = response.data.errors
          }
      }).catch(error => console.log(error))
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
                            text: response.data.message,
                            icon: "error",
                            timer: 1000
                        });
                    }
                });
            }
        });
    },
    createMatiereScientifique(){
      this.showButtonAddMatiereScientifique = 0
      this.showFormAddMatiereScientifique = 1
      this.showFormUpdateMatiereScientifique = 0
    },
    cancelCreate(){
      this.showButtonAddMatiereScientifique = 1
      this.showFormAddMatiereScientifique = 0
    },

    updateMatiereScientifiques(id){
      this.showButtonAddMatiereScientifique = 1
      this.showFormAddMatiereScientifique = 0
      this.showFormUpdateMatiereScientifique = 1

       axios
        .get(`/api/matieres/${id}/edit`)
        .then(response => {
          if(response.status == 200){
            if (response.data.success == false) {

            }else{
              if (response.data.message == 'Aucune matiere trouvée.') {
                this.empty = 1
                this.message = response.data.message
              } else {
                this.empty = 0
                this.data = response.data.matiere
              }
            }
          }
      });
    },

    cancelUpdate(){
      this.showFormUpdateMatiereScientifique = 0
    }
  },

  mounted() {
      this.getResults();
    }

}
</script>
