<template>
  <div class="dashboard-influence">
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h3 class="mb-2">Les enseignants</h3>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Gestion des enseignants</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Liste de tous les enseignants</li>
                            </ol>
                        </nav>
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
                  <h5 class="card-header">Modifier un enseignant</h5>
                   <div>
                        <router-link style="float: right; margin-top: -45px; margin-right: 17px" :to='{name:"EnseignantsComponent"}' class="btn btn-rounded btn-primary"><i class="fa fa-bars"></i>Liste des enseignants</router-link>
                    </div>
                  <div class="card-body" v-if="empty == 0">
                      <form>
                      <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h5>Choisir une photo</h5>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choisir une photo de profil</label>
                            </div>
                        </div>
                      </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" v-if="!errors.nom">
                                    <label>Nom</label> <br>
                                    <input type="text" name="nom"  v-model="data.nom" class="form-control"  required>
                                </div>
                                <div class="form-group" v-else>
                                    <label for="validationServer03">Nom</label> <br>
                                    <input type="text" name="nom"  v-model="data.nom" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                                    <div  v-for=" error_nom in errors.nom" :key="error_nom"  class="invalid-feedback" style="color: red; font-size: 0.9em">
                                        {{ error_nom }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" v-if="!errors.prenoms">
                                    <label>Prénoms</label> <br>
                                    <input type="text" name="prenoms"  v-model="data.prenoms" class="form-control"  required>
                                </div>
                                <div class="form-group" v-else>
                                    <label for="validationServer03">Prénoms</label> <br>
                                    <input type="text" name="prenoms"  v-model="data.prenoms" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                                    <div v-for=" error_prenoms in errors.prenoms" :key="error_prenoms" style="color: red; font-size: 0.9em" >
                                        {{ error_prenoms }}
                                    </div>
                                </div>
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" v-if="!errors.email">
                                    <label>Email</label> <br>
                                    <input  type="email" name="email"  v-model="data.email" class="form-control"  required>
                                </div>
                                <div class="form-group" v-else>
                                    <label for="validationServer03">Email</label> <br>
                                    <input type="email" name="email"  v-model="data.email" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                                    <div v-for=" error_email in errors.email" :key="error_email"  style="color: red; font-size: 0.9em">
                                        {{ error_email }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group" v-if="!errors.telephone">
                                    <label>Teléphone</label> <br>
                                    <input  type="text" name="telephone_1"  v-model="data.telephone" class="form-control"  required>
                                </div>
                                <div class="form-group" v-else>
                                    <label for="validationServer03">Teléphone</label> <br>
                                    <input type="text" name="telephone_1"  v-model="data.telephone" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                                    <div v-for=" error_telephone in errors.telephone" :key="error_telephone"  style="color: red; font-size: 0.9em">
                                        {{ error_telephone }}
                                    </div>
                                </div>
                            </div>
                        </div> <br>

                        <div class="row"> <br>
                            <div class="col-md-6">
                                <div v-if="!errors.sexe">
                                    <h5>Choisir le sexe</h5>
                                    <div class="input-group mb-3">
                                        <select class="custom-select " name="sexe" v-model="data.sexe">
                                            <option value="M">Masculin</option>
                                            <option value="F">Féminin</option>
                                            <option value="ND">Non Déterminé</option>
                                        </select>
                                    </div>
                                </div>
                                <div v-else>
                                    <h5>Choisir le sexe</h5>
                                    <div>
                                        <select class="custom-select is-invalid" name="sexe" v-model="data.sexe">
                                            <option value="M">Masculin</option>
                                            <option value="F">Féminin</option>
                                            <option value="ND">Non Déterminé</option>
                                        </select>
                                    </div>
                                    <div v-for="error_sexeH in errors.sexe" :key="error_sexeH" style="color: red; font-size: 0.9em">
                                        {{ error_sexeH }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" v-if="!errors.adresse"> <br>
                                    <label>Adresse</label>
                                    <input type="text" name="adresse"  v-model="data.adresse" class="form-control"  required>
                                </div>
                                <div class="form-group" v-else> <br>
                                    <label for="validationServer03">adresse</label>
                                    <input type="text" name="adresse"  v-model="data.adresse" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                                    <div  v-for=" error_adresse in errors.adresse" :key="error_adresse"  class="invalid-feedback" style="color: red; font-size: 0.9em">
                                        {{ error_adresse }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="float: right">
                            <div class="my-3" v-if="loadingSave">
                                <button class="btn  btn-primary"  type="button">
                                    Enregistrement en cours ....
                                </button>
                            </div>
                            <div class="my-3" v-if="!loadingSave">
                                <button type="submit" class="btn btn-primary" @click.prevent="update" >Enregistrez</button>
                            </div>
                        </div>
                    </form>
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

  data(){
      return{
          data:{
              nom :  null,
              prenoms: null,
              email: null,
              telephone: null,
              sexe: null,
              adresse: null,
          },
          errors: {},
          errorcheck: true,
          loadingSave: false,
          empty: null,
          message: null,
      }
  },

  methods: {

    getResults(){
      axios
        .get(`/api/enseignants/${this.$route.params.id}/edit`)
        .then(response => {
          if(response.status == 200){
            if (response.data.success == false) {

            }else{
              if (response.data.message == "Aucun role n'est enregistré") {
                this.empty = 1
                this.message = response.data.message
              } else if(response.data.message == "Aucune Information trouvée."){
                this.empty = 1
                this.message = response.data.message
              } else {
                this.empty = 0
                this.data = response.data.enseignant
              }
            }
          }
      });
    },

    update(){
       this.loadingSave = true
        axios.put(`/api/enseignants/${this.$route.params.id}/update`, this.data)
        .then(response => {
            if (response.data.success == true) {
                this.$swal({
                    title: "Succès!",
                    text: response.data.message,
                    icon: "success",
                    timer: 1000,
                    showConfirmButton: false
                });
                this.$router.push({name:"EnseignantsComponent"})
            } else {
                this.errorcheck = false
                this.errors = response.data.errors
                this.loadingSave = false
            }
        }).catch(error => console.log(error))
    }
  },

  mounted(){
    this.getResults();
  }
}
</script>
