<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a>   <span>Decision du conseil</span>
                  <div class="icons">
                    <router-link to="/settings/decisions/conseils/create" class="btn btn-lg btn-primary btn-block icon" style="color: #fff">
                      <i class="fas fa-plus"></i> &nbsp; &nbsp; Ajouter
                    </router-link>
                  </div>
              </div>
          </div>
      </div>
      <div class="email-body">


        <div class="row" v-if="!empty">
          <!-- ============================================================== -->
          <!-- campaign activities   -->
          <!-- ============================================================== -->
          <div class="col-lg-12">
            <div class="section-block"> <h3> Liste des décisions</h3></div>
            <div class="card" >
                <div class="campaign-table table-responsive">
                    <table class="table">
                        <thead>
                        <tr class="border-0">
                        <th class="border-0">Cycle</th>
                        <th class="border-0">Fin de cycle</th>
                        <th class="border-0">Deja Redoublé</th>
                        <th class="border-0">Moy. Sup ou egal à</th>
                        <th class="border-0">Moy. Inferieur à</th>
                        <th class="border-0">Decision</th>
                        <th class="border-0">Details de la décision</th>
                        <th class="border-0">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
          </div>

        </div>

        <div class="row" v-else>
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
        coordonnes: {},
        empty : 1,
        message: "",
      }
  },

  methods: {
    getResults(){
      axios
        .get('/api/settings/decisions/conseils')
        .then(response => {
           console.log(response)
          if(response.status == 200){
            if (response.data.success == false) {

            }else{
              if (response.data.message == 'Desolé nous ne trouvons aucune classe disponible') {
                this.message = response.data.message
              } else {
                this.empty = 0
                this.coordonnes = response.data
                console.log(response.data)
              }
            }
          }
      });
    },
  },

  mounted() {
      this.getResults();
    }

}
</script>
