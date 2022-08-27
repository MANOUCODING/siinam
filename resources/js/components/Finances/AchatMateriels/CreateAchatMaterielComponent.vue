<template>

  <div class="container-fluid">
    <financebar> </financebar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-dollar-sign"></i></span></a> <span>Effectuer un achat de materiel</span>
                  <div class="icons" ><router-link to="/finances/materiels" class="btn btn-lg btn-primary btn-block icon" style="color: #fff"><i class="fas fa-plus"></i> &nbsp; &nbsp; Liste des materiels</router-link></div>
              </div>
          </div>
      </div>
      <div class="email-body">
        <div class="row" >
          <!-- ============================================================== -->
          <!-- campaign activities   -->
          <!-- ============================================================== -->
          <div class="col-lg-12">
              <div class="section-block"> <h3> Ajouter un achat de materiel</h3>
              </div>
              <div class="card">
                 <div class="alert alert-danger" v-if="errorcheck" role="alert">
                {{ errorsAlert  }}
              </div>
              <form class="container">
                <div class="row">
                  <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="form-group" v-if="!errors.nomMateriel">
                        <label for="inputText3" class="col-form-label">Materiel Payé</label>
                        <input id="inputText3" type="number" v-model="data.nomMateriel" name="nomMateriel" class="form-control" placeholder="">
                      </div>
                      <div class="form-group" v-else>
                        <label for="inputText3" class="col-form-label">Materiel Payé</label>
                        <input id="inputText3" type="number" v-model="data.nomMateriel" name="nomMateriel" class="form-control is-invalid">
                        <div  v-for="error_nomMateriel in errors.nomMateriel" :key="error_nomMateriel" class="invalid-feedback" style="color: red; font-size: 0.9em">
                            {{ error_nomMateriel }}
                        </div>
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group" v-if="!errors.datePaiement">
                        <label for="inputText3" class="col-form-label">Date de Paiement</label>
                        <input id="inputText3" type="date" v-model="data.datePaiement" name="datePaiement" class="form-control" placeholder="">
                    </div>
                    <div class="form-group" v-else>
                      <label for="inputText3" class="col-form-label">Date de Paiement</label>
                      <input id="inputText3" type="date" v-model="data.datePaiement" name="datePaiement" class="form-control is-invalid">
                        <div  v-for="error_datePaiement in errors.datePaiement" :key="error_datePaiement" class="invalid-feedback" style="color: red; font-size: 0.9em">
                            {{ error_datePaiement }}
                        </div>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group" v-if="!errors.montantTotal">
                      <label for="inputText3" class="col-form-label">Montant Total</label>
                      <input id="inputText3" type="number" v-model="data.montantTotal" name="montantTotal" class="form-control">
                    </div>
                    <div class="form-group" v-else>
                      <label for="inputText3" class="col-form-label">Montant Total</label>
                      <input id="inputText3" type="number" v-model="data.montantTotal" name="montantTotal" class="form-control is-invalid">
                      <div  v-for="error_montantTotal in errors.montantTotal" :key="error_montantTotal" class="invalid-feedback" style="color: red; font-size: 0.9em">
                            {{ error_montantTotal }}
                      </div>
                    </div>
                  </div>
                   <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group" v-if="!errors.montantRembourser">
                      <label for="inputText3" class="col-form-label">Montant Remboursé</label>
                      <input id="inputText3" type="number" v-model="data.montantRembourser" name="montantRembourser" class="form-control">
                    </div>
                    <div class="form-group" v-else>
                      <label for="inputText3" class="col-form-label">Montant Remboursé</label>
                      <input id="inputText3" type="number" v-model="data.montantRembourser" name="montantRembourser" class="form-control is-invalid">
                      <div  v-for="error_montantRembourser in errors.montantRembourser" :key="error_montantRembourser" class="invalid-feedback" style="color: red; font-size: 0.9em">
                            {{ error_montantRembourser }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <router-link to="#" class="btn btn-secondary" >Retour</router-link>
                    <button  v-if="loadingSave" class="btn  btn-primary"  type="button">
                        Enregistrement en cours ....
                    </button>
                    <button type="submit" v-if="!loadingSave" class="btn btn-primary" @click.prevent="create">
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
          nomMateriel : null,
          datePaiement: null,
          montantTotal: null,
          montantRembourser: null,
        },
        errors: {},
        errorcheck: false,
        errorsAlert: null,
        loadingSave: false,
        message: "",
      }
  },

  methods: {


  },

  mounted() {
      // this.getResults();
    }

}
</script>
