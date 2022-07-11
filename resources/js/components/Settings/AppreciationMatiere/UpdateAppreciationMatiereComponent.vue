<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a> <span>Appréciation par Matière</span>
                  <div class="icons" ><router-link to="/settings/appreciations/matieres" class="btn btn-lg btn-primary btn-block icon" style="color: #fff"><i class="fas fa-bars"></i> &nbsp; &nbsp;Liste des appréciations</router-link></div>
              </div>
          </div>
      </div>
      <div class="email-body">
        <div class="row" >
          <!-- ============================================================== -->
          <!-- campaign activities   -->
          <!-- ============================================================== -->
          <div class="col-lg-12">
              <div class="section-block"> <h3> Ajouter une  appréciation</h3>
              </div>
              <div class="card">
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
                    <div class="form-group" v-if="!errors.appreciation">
                      <label for="inputText3" class="col-form-label">Appréciation</label>
                      <input id="inputText3" type="text" v-model="data.appreciation" name="appreciation" class="form-control">
                    </div>
                    <div class="form-group" v-else>
                      <label for="inputText3" class="col-form-label">Appréciation</label>
                      <input id="inputText3" type="text" v-model="data.appreciation" name="appreciation" class="form-control is-invalid">
                      <div  v-for="error_appreciation in errors.appreciation" :key="error_appreciation" class="invalid-feedback" style="color: red; font-size: 0.9em">
                            {{ error_appreciation }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <router-link to="/settings/appreciations/matieres" class="btn btn-secondary" >Retour</router-link>
                    <button  v-if="loadingSave" class="btn  btn-primary"  type="button">
                        Enregistrement en cours ....
                    </button>
                    <button type="submit" v-if="!loadingSave" class="btn btn-primary" @click.prevent="update(data.id)">
                      Enregistrez
                    </button>
                    
                </div>
              </form>
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
          appreciation: null,
        },
        errors: {},
        errorcheck: false,
        errorsAlert: null,
        loadingSave: false,
        message: "",
      }
  },

  methods: {

    getResults(){
      axios
        .get(`/api/settings/appreciations/matieres/${this.$route.params.id}/edit`)
        .then(response => {
          if(response.status == 200){
            if (response.data.success == false) {
              if (response.data.message == 'Aucune Information trouvée.') {
                this.message = response.data.message
              }
            }else{
              this.data = response.data[0]
              this.data.moyFaible = parseInt(this.data.moyFaible, 10);
              this.data.moyFort = parseInt(this.data.moyFort, 10);
              console.log(this.data)
            }
        }
      });
    },
   
    update(id){
      this.loadingSave = true
      axios.put(`/api/settings/appreciations/matieres/${id}/update`, this.data)
      .then(response => {
          if (response.data.success == true) {
          this.loadingSave = false
          this.$swal({
            title: "Succès!",
            text: response.data.message,
            icon: "success",
            timer: 1000,
            showConfirmButton: false
          });
          this.$router.push({name:"settings.appreciations.matieres"})
          } else {
            if (response.data.message == 'Erreur de validation') {
              this.loadingSave = false
              this.errors = response.data.errors
              console.log(this.errors)
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
    }
  },

  mounted() {
    this.getResults()
  }

}
</script>
