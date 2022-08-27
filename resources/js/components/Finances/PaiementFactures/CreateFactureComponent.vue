<template>

  <div class="container-fluid">
    <financebar> </financebar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-dollar-sign"></i></span></a> <span>Payer une facture</span>
                  <div class="icons" ><router-link to="/finances/factures" class="btn btn-lg btn-primary btn-block icon" style="color: #fff"><i class="fas fa-plus"></i> &nbsp; &nbsp; Liste des factures</router-link></div>
              </div>
          </div>
      </div>
      <div class="email-body">
        <div class="row" >
          <!-- ============================================================== -->
          <!-- campaign activities   -->
          <!-- ============================================================== -->
          <div class="col-lg-12">
              <div class="section-block"> <h3> Ajouter un  paiement de facture</h3>
              </div>
              <div class="card">
                 <div class="alert alert-danger" v-if="errorcheck" role="alert">
                {{ errorsAlert  }}
              </div>
              <form class="container">
                <div class="row">
                  <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="form-group" v-if="!errors.numFacture">
                        <label for="inputText3" class="col-form-label">Numero de la Facture</label>
                        <input id="inputText3" type="number" v-model="data.numFacture" name="numFacture" class="form-control" placeholder="">
                      </div>
                      <div class="form-group" v-else>
                        <label for="inputText3" class="col-form-label">Numero de la Facture</label>
                        <input id="inputText3" type="number" v-model="data.numFacture" name="numFacture" class="form-control is-invalid">
                        <div  v-for="error_numFacture in errors.numFacture" :key="error_numFacture" class="invalid-feedback" style="color: red; font-size: 0.9em">
                            {{ error_numFacture }}
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
                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div v-if="!errors.typeFacture">
                        <h5>Choisir le type de facture</h5>
                        <div class="input-group mb-3">
                            <select class="custom-select " name="typeFacture" v-model="data.typeFacture">
                                <option value="Facture d'électricité">Facture d'électricité</option>
                                <option value="Facture d'eau">Facture d'eau</option>
                                <option value="Abonnement à la connexion">Abonnement à la connexion</option>
                            </select>
                        </div>
                    </div>
                    <div v-else>
                        <h5>Choisir le typeFacture</h5>
                        <div>
                            <select class="custom-select is-invalid" name="typeFacture" v-model="data.typeFacture">
                                <option value="Facture d'électricité">Facture d'électricité</option>
                                <option value="Facture d'eau">Facture d'eau</option>
                                <option value="Abonnement à la connexion">Abonnement à la connexion</option>
                            </select>
                        </div>
                        <div v-for="error_typeFactureH in errors.typeFacture" :key="error_typeFactureH" style="color: red; font-size: 0.9em">
                            {{ error_typeFactureH }}
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
