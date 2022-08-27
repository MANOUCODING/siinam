<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a> <span>Gestion des rentrées scolaires</span>
                  <div class="icons"><router-link to="/settings/annee-scolaire" class="btn btn-lg btn-primary btn-block icon" style="color: #fff"><i class="fas fa-bars"></i> &nbsp; Les rentrées scolaires</router-link></div>
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
                  <h3 class="section-title">Ajouter  une rentrée</h3>
              </div>
              <div class="card">
                  <div class="card-body">
                    <div class="alert alert-danger" v-if="errorcheck" role="alert">
                      {{ errorsAlert  }}
                    </div>
                    <form>
                      <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group" v-if="!errors.dateDebut">
                              <label for="inputText3" class="col-form-label">Date Début</label>
                              <input id="inputText3" type="date" name="dateDebut" v-model="data.dateDebut" class="form-control">
                          </div>
                          <div class="form-group" v-else>
                              <label for="inputText3" class="col-form-label">Date Début</label>
                              <input id="inputText3" type="date" name="dateDebut" v-model="data.dateDebut" class="form-control is-invalid">
                              <div  v-for="error_dateDebut in errors.dateDebut" :key="error_dateDebut" class="invalid-feedback" style="color: red; font-size: 0.9em">
                                  {{ error_dateDebut }}
                              </div>
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group"  v-if="!errors.dateFin">
                              <label for="inputText3" class="col-form-label">Date Fin</label>
                              <input id="inputText3" type="date" name="dateFin"  v-model="data.dateFin" class="form-control">
                          </div>
                          <div class="form-group" v-else>
                              <label for="inputText3" class="col-form-label">Date Fin</label>
                              <input id="inputText3" type="date" name="dateFin"  v-model="data.dateFin" class="form-control is-invalid">
                              <div  v-for="error_dateFin in errors.dateFin" :key="error_dateFin" class="invalid-feedback" style="color: red; font-size: 0.9em">
                                  {{ error_dateFin }}
                              </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div v-if="data.typePeriodeBooleanCollege">
                              <h5> Definir une période pour le collège </h5>
                              <label class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" name="typePeriodeBooleanCollege" v-model="data.typePeriodeBooleanCollege" checked="" class="custom-control-input"><span class="custom-control-label">Trimestre</span>
                              </label>
                              <label class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" name="typePeriodeBooleanCollege" v-model="data.typePeriodeBooleanCollege"   @click="typePeriodeCollegeH()" class="custom-control-input"><span class="custom-control-label">Semestre</span>
                              </label>
                          </div>
                          <div v-else>
                              <h5>Definir une période pour le collège </h5>
                              <label class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" name="typePeriodeBooleanCollege" v-model="data.typePeriodeBooleanCollege" class="custom-control-input"><span class="custom-control-label">Trimestre</span>
                              </label>
                              <label class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" name="typePeriodeBooleanCollege" v-model="data.typePeriodeBooleanCollege"  checked="" class="custom-control-input"><span class="custom-control-label">Semestre</span>
                              </label>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div v-if="data.typePeriodeBooleanLyceeModerne">
                              <h5> Definir une période pour le lycée moderne </h5>
                              <label class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" name="typePeriodeBooleanLyceeModerne" v-model="data.typePeriodeBooleanLyceeModerne" checked="" class="custom-control-input"><span class="custom-control-label">Trimestre</span>
                              </label>
                              <label class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" name="typePeriodeBooleanLyceeModerne" v-model="data.typePeriodeBooleanLyceeModerne"   @click="typePeriodeLyceeModerneH()" class="custom-control-input"><span class="custom-control-label">Semestre</span>
                              </label>
                          </div>
                          <div v-else>
                              <h5> Definir une période pour le lycée moderne</h5>
                              <label class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" name="typePeriodeBooleanLyceeModerne" v-model="data.typePeriodeBooleanLyceeModerne" class="custom-control-input"><span class="custom-control-label">Trimestre</span>
                              </label>
                              <label class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" name="typePeriodeBooleanLyceeModerne" v-model="data.typePeriodeBooleanLyceeModerne"  checked="" class="custom-control-input"><span class="custom-control-label">Semestre</span>
                              </label>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div v-if="data.typePeriodeBooleanLyceeTechnique">
                              <h5> Definir une période pour le lycée technique </h5>
                              <label class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" name="typePeriodeBooleanLyceeTechnique" v-model="data.typePeriodeBooleanLyceeTechnique" checked="" class="custom-control-input"><span class="custom-control-label">Trimestre</span>
                              </label>
                              <label class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" name="typePeriodeBooleanLyceeTechnique" v-model="data.typePeriodeBooleanLyceeTechnique"   @click="typePeriodeLyceeTechniqueH()" class="custom-control-input"><span class="custom-control-label">Semestre</span>
                              </label>
                          </div>
                          <div v-else>
                              <h5> Definir une période pour le lycée technique</h5>
                              <label class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" name="typePeriodeBooleanLyceeTechnique" v-model="data.typePeriodeBooleanLyceeTechnique" class="custom-control-input"><span class="custom-control-label">Trimestre</span>
                              </label>
                              <label class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" name="typePeriodeBooleanLyceeTechnique" v-model="data.typePeriodeBooleanLyceeTechnique"  checked="" class="custom-control-input"><span class="custom-control-label">Semestre</span>
                              </label>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="form-group">
                         <div class="my-3" v-if="loadingSave">
														<button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="button">
																Enregistrement en cours ....
														</button>
												</div>
												<div v-else class="my-3">
														<button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="button" @click.prevent="create">Enregistrer</button>
												</div>
                      </div>
                    </form>
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
  data() {
      return {
        data: {
          TypePeriode: "Semestre",
          dateDebut: null,
          dateFin: null,
          typePeriodeBooleanCollege : 0,
          typePeriodeBooleanLyceeModerne : 0,
          typePeriodeBooleanLyceeTechnique : 0,
        },
        loadingSave: false,
        errors: {} ,
        errorsAlert: null,
        errorcheck: false
      }
  },

  methods: {
     create(){
      this.loadingSave = true
      axios
        .post('/api/settings/rentree/scolaire/strore',{
          dateDebut: this.data.dateDebut,
          dateFin: this.data.dateFin,
          TypePeriodeCollege: this.data.typePeriodeBooleanCollege ? "Trimestre" : "Semestre",
          TypePeriodeLyceeModerne: this.data.typePeriodeBooleanLyceeModerne ? "Trimestre" : "Semestre",
          TypePeriodeLyceeTechnique: this.data.typePeriodeBooleanLyceeTechnique ? "Trimestre" : "Semestre"
        })
        .then(response => {
          if(response.status == 200){
            this.loadingSave = false
            if (response.data.success == false) {
              if (response.data.message == "Erreur de validation") {
                this.errors = response.data.errors
              }else if(response.data.message == "Ooops Desolé. La date de fin est antérieure à la date du debut"){
                this.errorcheck = true
                this.errorsAlert = response.data.message
              }else if(response.data.message == "Ooops Desolé. Il ne peut pas avoir deux rentrées scolaires inactives"){
                this.errorcheck = true
                this.errorsAlert = response.data.message
              }
            }else{
              if (response.data.message == 'Une Nouvelle Rentrée Scolaire a été enregistrée avec succès.' ) {
                this.$swal({
                  title: "Succès!",
                  text:  response.data.message,
                  icon: "success",
                  timer: 1000,
                  showConfirmButton: false
                });
                this.$router.push({name:"settings.annee-scolaire"})
              }
            }
          }
      });
    },
    typePeriodeCollegeH(){
      this.data.typePeriodeBooleanCollege = 0
    },
    typePeriodeLyceeModerneH(){
      this.data.typePeriodeBooleanLyceeModerne = 0
    },
    typePeriodeLyceeTechniqueH(){
      this.data.typePeriodeBooleanLyceeTechnique = 0
    },

  }
}
</script>