<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a> <span>Modifier les Coordonnées</span>
                  <div class="icons"><router-link to="/settings/coordonnees" class="btn btn-lg btn-primary btn-block icon" style="color: #fff"><i class="fas fa-bars"></i> &nbsp; Voir les informations</router-link></div>
              </div>
          </div>
          
      </div>
      <div class="email-body">
        <!-- ============================================================== -->
        <!-- basic form  -->
        <!-- ============================================================== -->
        <div class="row" v-if="empty == 0">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="section-block" id="basicform">
                  <h3 class="section-title">Modifier les coordonnées de l'établissement</h3>
              </div>
              <div class="card">
                  <div class="card-body">
                    <form>
                      <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group" v-if="!errors.nomEtablissement">
                              <label for="inputText3" class="col-form-label">Nom de l'établissement</label>
                              <input id="inputText3" name="nomEtablissement" v-model="data.nomEtablissement" type="text" class="form-control">
                          </div>
                          <div class="form-group" v-else>
                              <label for="inputText3" class="col-form-label">Nom de l'établissement</label>
                              <input type="text" id="inputText3" name="nomEtablissement" v-model="data.nomEtablissement" class="form-control is-invalid" aria-describedby="validationServer03Feedback" required>
                              <div  v-for=" error_nomEtablissement in errors.nomEtablissement" :key="error_nomEtablissement"  class="invalid-feedback" style="color: red; font-size: 0.9em">
                                  {{ error_nomEtablissement }}
                              </div>
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group" v-if="!errors.addressLine1">
                              <label for="inputText3" class="col-form-label">Adresse ligne 1</label>
                              <input id="inputText3" name="addressLine1" v-model="data.addressLine1" type="text" class="form-control">
                          </div>
                          <div class="form-group" v-else>
                              <label for="inputText3" class="col-form-label">Adresse ligne 1</label>
                              <input id="inputText3" name="addressLine1" v-model="data.addressLine1" type="text" class="form-control is-invalid" aria-describedby="validationServer03Feedback" required>
                              <div  v-for=" error_addressLine1 in errors.addressLine1" :key="error_addressLine1"  class="invalid-feedback" style="color: red; font-size: 0.9em">
                                  {{ error_addressLine1 }}
                              </div>
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group" v-if="!errors.addressLine2">
                              <label for="inputText3" class="col-form-label">Adresse ligne 2</label>
                              <input id="inputText3" name="addressLine2" v-model="data.addressLine2" type="text" class="form-control">
                          </div>
                          <div class="form-group" v-else>
                              <label for="inputText3" class="col-form-label">Adresse ligne 2</label>
                              <input id="inputText3" name="addressLine2" v-model="data.addressLine2" type="text" class="form-control is-invalid" aria-describedby="validationServer03Feedback" required>
                              <div  v-for=" error_addressLine2 in errors.addressLine2" :key="error_addressLine2"  class="invalid-feedback" style="color: red; font-size: 0.9em">
                                  {{ error_addressLine2 }}
                              </div>
                          </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group"  v-if="!errors.nomDRE">
                              <label for="inputText3" class="col-form-label">Nom DRE</label>
                              <input id="inputText3" name="nomDRE" v-model="data.nomDRE" type="text" class="form-control">
                          </div>
                          <div  class="form-group" v-else >
                             <label for="inputText3" class="col-form-label">Nom DRE</label>
                             <input id="inputText3" name="nomDRE" v-model="data.nomDRE" type="text" class="form-control is-invalid" aria-describedby="validationServer03Feedback" required>
                              <div  v-for=" error_nomDRE in errors.nomDRE" :key="error_nomDRE"  class="invalid-feedback" style="color: red; font-size: 0.9em">
                                  {{ error_nomDRE }}
                              </div>
                          </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group" v-if="!errors.nomIESEG">
                              <label for="inputText3" class="col-form-label">Nom IESEG</label>
                              <input id="inputText3" name="nomIESEG" v-model="data.nomIESEG" type="text" class="form-control">
                          </div>
                           <div class="form-group" v-else>
                              <label for="inputText3" class="col-form-label">Nom IESEG</label>
                              <input id="inputText3" name="nomIESEG" v-model="data.nomIESEG" type="text"  class="form-control is-invalid" aria-describedby="validationServer03Feedback" required>
                              <div  v-for=" error_nomIESEG in errors.nomIESEG" :key="error_nomIESEG"  class="invalid-feedback"  style="color: red; font-size: 0.9em">
                                  {{ error_nomIESEG }}
                              </div>
                          </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group"  v-if="!errors.nomResponsable">
                              <label for="inputText3" class="col-form-label">Nom du Responsable</label>
                              <input id="inputText3" name="nomResponsable" v-model="data.nomResponsable" type="text" class="form-control">
                          </div>
                           <div class="form-group"  v-else>
                              <label for="inputText3" class="col-form-label">Nom du Responsable</label>
                              <input id="inputText3" name="nomResponsable" v-model="data.nomResponsable" type="text" class="form-control is-invalid" aria-describedby="validationServer03Feedback" required>
                              <div  v-for=" error_nomResponsable in errors.nomResponsable" :key="error_nomResponsable"  class="invalid-feedback"  style="color: red; font-size: 0.9em">
                                  {{ error_nomResponsable }}
                              </div>
                          </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group" v-if="!errors.denominationMinisterielTechnique">
                              <label for="inputText3" class="col-form-label">Denomination ministérielle de la technique</label>
                              <input id="inputText3" name="denominationMinisterielTechnique" v-model="data.denominationMinisterielTechnique" type="text" class="form-control">
                          </div>
                           <div class="form-group" v-else>
                              <label for="inputText3" class="col-form-label">Denomination ministérielle de la technique</label>
                              <input id="inputText3" name="denominationMinisterielTechnique" v-model="data.denominationMinisterielTechnique" type="text"  class="form-control is-invalid" aria-describedby="validationServer03Feedback" required>
                              <div  v-for=" error_denominationMinisterielTechnique in errors.denominationMinisterielTechnique" :key="error_denominationMinisterielTechnique"  class="invalid-feedback"  style="color: red; font-size: 0.9em">
                                  {{ error_denominationMinisterielTechnique }}
                              </div>
                          </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group" v-if="!errors.denominationMinisterielGenerale">
                              <label for="inputText3" class="col-form-label">Denomination ministérielle du Générale</label>
                              <input id="inputText3" name="denominationMinisterielGenerale" v-model="data.denominationMinisterielGenerale" type="text" class="form-control">
                          </div>
                           <div class="form-group" v-else>
                              <label for="inputText3" class="col-form-label">Denomination ministérielle du Générale</label>
                              <input id="inputText3" name="denominationMinisterielGenerale" v-model="data.denominationMinisterielGenerale" type="text"  class="form-control is-invalid" aria-describedby="validationServer03Feedback" required>
                              <div  v-for=" error_denominationMinisterielGenerale in errors.denominationMinisterielGenerale" :key="error_denominationMinisterielGenerale"  class="invalid-feedback"  style="color: red; font-size: 0.9em">
                                  {{ error_denominationMinisterielGenerale }}
                              </div>
                          </div>
                        </div>
                       
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div v-if="!errors.posteResponsable">
                                <h5>Choisir le poste Responsable</h5>
                                <div class="input-group mb-3">
                                    <select class="custom-select " name="posteResponsable" v-model="data.posteResponsable">
                                        <option value="Proviseur">Proviseur</option>
                                        <option value="Directeur">Directeur</option>
                                        <option value="Fondateur">Fondateur</option>
                                    </select>
                                </div>
                            </div>
                            <div v-else>
                                <h5>Choisir le poste Responsable</h5>
                                <div>
                                    <select class="custom-select is-invalid" name="posteResponsable" v-model="data.posteResponsable">
                                        <option value="Proviseur">Proviseur</option>
                                        <option value="Directeur">Directeur</option>
                                        <option value="Fondateur">Fondateur</option>
                                    </select>
                                </div>
                                <div v-for="error_posteResponsableH in errors.posteResponsable" :key="error_posteResponsableH" style="color: red; font-size: 0.9em">
                                    {{ error_posteResponsableH }}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <br> 
                          <div class="my-3" v-if="loadingSave">
                              <button class="btn  btn-primary"  type="button">
                                  Enregistrement en cours ....
                              </button>
                          </div>
                          <div class="my-3" v-if="!loadingSave">
                              <button type="submit" class="btn btn-primary" @click.prevent="update" >Enregistrez</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
              </div>
            </div>
        </div>
        <div class="row" v-else-if="empty == 1">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div style="position: relative; height: 500px;">
                  <img src="/assets/admin/images/empty.png" style="width: 150px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" alt="empty">
              </div>
              <h4 style="text-align: center; margin-top: -50px"> {{ message  }} </h4>
            </div>
            <div class="col-md-3"></div>
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
        data:{
          nomEtablissement :  null,
          addressLine1: null,
          addressLine2: null,
          nomDRE: null,
          nomIESEG: null,
          nomResponsable: null,
          posteResponsable: null,
          denominationMinisterielGenerale: null,
          denominationMinisterielTechnique: null
        },
      empty: null,
      errors: {},
      loadingSave: false,
    }
  },

  methods:{
     getResults(){
      axios
        .get('/api/settings/coordonnees/edit')
        .then(response => {
          if(response.status == 200){
            if (response.data.success == false) {
              if (response.data.message == 'Aucune Information trouvée.') {
                this.empty = 1
                this.message = response.data.message
              }
            }else{
              this.empty = 0
              this.data = response.data.data.school
            }
        }
      });
    },

    update(){
      this.loadingSave = true
      axios.put('/api/settings/coordonnees/update', this.data)
      .then(response => {
          if (response.data.success == true) {
              this.$swal({
                  title: "Succès!",
                  text: response.data.message,
                  icon: "success",
                  timer: 1000,
                  showConfirmButton: false
              });
              this.$router.push({name:"settings.coordonnees"})
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