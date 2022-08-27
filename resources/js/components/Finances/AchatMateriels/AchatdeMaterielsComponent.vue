<template>

  <div class="container-fluid">
    <financebar> </financebar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-dollar-sign"></i></span></a> <span>Les achats de matérirels</span>
                  <div class="icons" ><router-link to="/finances/achat/materiels" class="btn btn-lg btn-primary btn-block icon" style="color: #fff"><i class="fas fa-plus"></i> &nbsp; &nbsp; Effectuer un achat</router-link></div>
              </div>
          </div>
      </div>
      <div class="email-body">
        <div class="row" v-if="empty == 0">
          <!-- ============================================================== -->
          <!-- campaign activities   -->
          <!-- ============================================================== -->
          <div class="col-lg-12">
              <div class="section-block"> <h3> Liste des materiels payés</h3>
              </div>
              <div class="card">
                  <div class="campaign-table table-responsive">
                      <table class="table">
                          <thead>
                              <tr class="border-0">
                                <th class="border-0">Materiel</th>
                                <th class="border-0">Montant Total</th>
                                <th class="border-0">Montant Remboursé</th>
                                <th class="border-0">Date de paiement</th>
                                <th class="border-0">Etat</th>
                                <th class="border-0">Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                                <tr>
                                    
                                </tr>
                            </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <!-- ============================================================== -->
          <!-- end campaign activities   -->
          <!-- ============================================================== -->
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
        infos: {},
        empty : 1,
        emptyMatiere: null,
        message: "Aucun achat de materiel payé",
      }
  },

  methods: {


  },

  mounted() {
      // this.getResults();
    }

}
</script>
