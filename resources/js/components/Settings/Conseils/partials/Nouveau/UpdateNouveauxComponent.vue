<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a> <span>Décisions por le nouveaux</span>
                  <div class="icons" ><router-link v-if="emptyF == 0 " :to='{name:"settings.decisions.conseils.show.nouveaux", params: { id: infos.classe.id }}' class="btn btn-lg btn-primary btn-block icon" style="color: #fff"><i class="fas fa-bars"></i> &nbsp; &nbsp;Liste des décisions</router-link></div>
              </div>
          </div>
      </div>
      <div class="email-body">
        <div class="row" >
          <!-- ============================================================== -->
          <!-- campaign activities   -->
          <!-- ============================================================== -->
          <div class="col-lg-12">
              <div class="section-block"> <h3> Modifier une  décision</h3>
              </div>
              <div class="card">
                  <div class="card-body" v-if="empty == 0">
                    <div class="alert alert-danger" v-if="errorcheck" role="alert">
                    {{ errorsAlert  }}
                  </div>
                  <form class="container">
                    <div class="row">
                      <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group" v-if="!errors.moyFort">
                            <label for="inputText3" class="col-form-label">Moy. sup. ou egal à</label>
                            <input id="inputText3" type="number" v-model="data.moyFort" name="moyFort" class="form-control" placeholder="">
                          </div>
                          <div class="form-group" v-else>
                            <label for="inputText3" class="col-form-label">Moy. sup. ou egal à</label>
                            <input id="inputText3" type="number" v-model="data.moyFort" name="moyFort" class="form-control is-invalid">
                            <div  v-for="error_moyFort in errors.moyFort" :key="error_moyFort" class="invalid-feedback" style="color: red; font-size: 0.9em">
                                {{ error_moyFort }}
                            </div>
                          </div>
                      </div>
                      <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group" v-if="!errors.moyFaible">
                            <label for="inputText3" class="col-form-label">Moy. inferieure à</label>
                            <input id="inputText3" type="number" v-model="data.moyFaible" name="moyFaible" class="form-control" placeholder="">
                        </div>
                        <div class="form-group" v-else>
                          <label for="inputText3" class="col-form-label">Moy. inferieure à</label>
                          <input id="inputText3" type="number" v-model="data.moyFaible" name="moyFaible" class="form-control is-invalid">
                            <div  v-for="error_moyFaible in errors.moyFaible" :key="error_moyFaible" class="invalid-feedback" style="color: red; font-size: 0.9em">
                                {{ error_moyFaible }}
                            </div>
                        </div>
                      </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group" v-if="!errors.decision">
                          <label for="inputText3" class="col-form-label">Décision</label>
                          <input id="inputText3" type="text" v-model="data.decision" name="decision" class="form-control">
                        </div>
                        <div class="form-group" v-else>
                          <label for="inputText3" class="col-form-label">Décision</label>
                          <input id="inputText3" type="text" v-model="data.decision" name="decision" class="form-control is-invalid">
                          <div  v-for="error_decision in errors.decision" :key="error_decision" class="invalid-feedback" style="color: red; font-size: 0.9em">
                                {{ error_decision }}
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group" v-if="!errors.detailsDecision">
                          <label for="inputText3" class="col-form-label">detailsDecision</label>
                          <input id="inputText3" type="text" v-model="data.detailsDecision" name="detailsDecision" class="form-control">
                        </div>
                        <div class="form-group" v-else>
                          <label for="inputText3" class="col-form-label">detailsDecision</label>
                          <input id="inputText3" type="text" v-model="data.detailsDecision" name="detailsDecision" class="form-control is-invalid">
                          <div  v-for="error_detailsDecision in errors.detailsDecision" :key="error_detailsDecision" class="invalid-feedback" style="color: red; font-size: 0.9em">
                                {{ error_detailsDecision }}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer"  v-if="emptyF == 0 ">
                      <router-link :to='{name:"settings.appreciations.semestres.show", params: { id: infos.classe.id }}' class="btn btn-secondary">Retour</router-link>
                        <button  v-if="loadingSave" class="btn  btn-primary"  type="button">
                            Enregistrement en cours ....
                        </button>
                        <button type="submit" v-if="!loadingSave" class="btn btn-primary" @click.prevent="update">
                          Enregistrez
                        </button>
                        
                    </div>
                    <div class="modal-footer"  v-else-if="emptyF == 1 ">
                      <router-link :to='{name:"settings.appreciations.semestres.show", params: { id: infos.classe.id }}' class="btn btn-secondary" >Retour</router-link> 
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
          <!-- end campaign activities   -->
          <!-- ============================================================== -->
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
        data:{
          moyFaible : null,
          moyFort: null,
          decision: null,
          detailsDecision: null,
          status : "NOUVEAU"
        },
        errors: {},
        errorcheck: false,
        errorsAlert: null,
        loadingSave: false,
        message: "",
        infos: {},
        empty : null,
        emptyF : null,
      }
  },

  methods: {
    update(){
      this.loadingSave = true
      axios.put(`/api/settings/decisions/conseils/${this.$route.params.id}/show/${this.$route.params.decision_id}/update`, this.data)
      .then(response => {
          console.log(response.data)
          if (response.data.success == true) {
          this.loadingSave = false
          this.$swal({
            title: "Succès!",
            text: response.data.message,
            icon: "success",
            timer: 1000,
            showConfirmButton: false
          });
          this.$router.push({name:"settings.decisions.conseils.show.nouveaux", params: { id: this.infos.classe.id }})
          } else {
            if (response.data.message == 'Erreur de validation') {
              this.loadingSave = false
              this.errors = response.data.errors
            }else if(response.data.message == "Ooops ! Desolé, verifiez l'ecart de vos moyennes"){
              this.loadingSave = false
              this.errorcheck = true
              this.errorsAlert = response.data.message
            }else if(response.data.message == "Ooops ! Desolé, vos moyennes doivent être positive et compris entre 0 et 20"){
              this.loadingSave = false
              this.errorcheck = true
              this.errorsAlert = response.data.message
            }
          }
      }).catch(error => console.log(error))
    },

    edit(){

      axios
        .get(`/api/settings/decisions/conseils/nouveaux/${this.$route.params.id}/show/${this.$route.params.decision_id}/edit`)
        .then(response => {
          if(response.status == 200){
            if (response.data.success == false) {
              if (response.data.message == 'Aucune classe trouvée.') {
                this.empty = 1
                this.emptyF = 1
                this.message = response.data.message
              }
            }else{
              if (response.data.message == 'Aucune classe trouvée.') {
                this.empty = 1
                this.emptyF = 1
                this.message = response.data.message
                this.infos = response.data
              }else if(response.data.message == 'Aucune Information trouvée.'){
                this.empty = 1
                this.emptyF = 1
                this.message = response.data.message
                this.infos = response.data
              } else{
                this.emptyF = 0
                this.empty = 0
                this.infos = response.data
                this.data = response.data.decisionConseil
                this.data.moyFaible = parseInt(this.data.moyFaible, 10);
                this.data.moyFort = parseInt(this.data.moyFort, 10);
              }
            }
          }
        }
      );

    }
  },

  mounted() {

    this.edit();
      
  }

}
</script>
