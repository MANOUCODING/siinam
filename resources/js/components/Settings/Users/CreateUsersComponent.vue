<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a> <span>Gestion des Utilisateurs</span>
                  <div class="icons"><router-link to="/settings/users" class="btn btn-lg btn-primary btn-block icon" style="color: #fff"><i class="fas fa-bars"></i> &nbsp; Les Utilisateurs</router-link></div>
              </div>
          </div>
          
      </div>
      <div class="email-body">
        <!-- ============================================================== -->
        <!-- basic form  -->
        <!-- ============================================================== -->
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="section-block" id="basicform">
                  <h3 class="section-title">Ajouter  un utilisateur</h3>
              </div>
              <div class="card">
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
                        <div class="row"> <br>
                          <div class="col-md-12">
                              <div v-if="!errors.role_id">
                                  <h5>Choisir le role</h5>
                                  <div class="input-group mb-3">
                                      <select class="custom-select" name="role_id" v-model="data.role_id">
                                          <option  v-for="role in roles" :key="role.id" :value="role.id"><h1>{{ role.name }}</h1></option>
                                      </select>
                                  </div>
                              </div>
                              <div v-else>
                                  <h5>Choisir le role</h5>
                                  <div >
                                      <select class="custom-select" name="role_id" v-model="data.role_id">
                                          <option  v-for="role in roles" :key="role.id" :value="role.id"> <h5>{{ role.name }}</h5> </option>
                                      </select>
                                  </div>
                                  <div v-for=" error_role in errors.role_id" :key="error_role" style="color: red; font-size: 0.9em">
                                      {{ error_role }}
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
                                <button type="submit" class="btn btn-primary" @click.prevent="create" >Enregistrez</button>
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
        </div>
        <!-- ============================================================== -->
        <!-- end basic form  -->
        <!-- ============================================================== -->
      </div>
    </div>
   
  </div>

</template>
<script>
export default {

  data(){
      return{
          roles : {},
          data:{
              nom :  null,
              prenoms: null,
              email: null,
              telephone: null,
              sexe: null,
              adresse: null,
              role_id: null,
              password: null,
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
        .get('/api/settings/users/create')
        .then(response => {
          if(response.status == 200){
            if (response.data.success == false) {

            }else{
              if (response.data.message == "Aucun role n'est enregistré") {
                this.empty = 1
                this.message = response.data.message
              } else {
                this.empty = 0
                this.roles = response.data.roles
                
              }
            }
          }
      });
    },

    create(){
       this.loadingSave = true
        axios.post('/api/settings/users/store', this.data)
        .then(response => {
            if (response.data.success == true) {
                this.$swal({
                    title: "Succès!",
                    text: response.data.message,
                    icon: "success",
                    timer: 1000,
                    showConfirmButton: false
                });
                this.$router.push({name:"settings.users"})
            } else {
                this.errorcheck = false
                this.errors = response.data.errors
                this.loadingSave = false
                console.log(this.errors)
            }
        }).catch(error => console.log(error))
    }
  },

  mounted(){
    this.getResults();
  }
}
</script>