<template>
  <div class="dashboard-influence">
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
              <h3 class="mb-2">Les élèves par statut <span v-if="emptyC === 0">de la classe de {{ infos.classe.codeClasse }}</span></h3>
              <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Gestion des élèves</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Liste de toutes les élèves par statut</li>
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
                  <h5 class="card-header">Les éleves par statut <span v-if="emptyC === 0">de la classe de {{ infos.classe.codeClasse }}</span></h5>
                  <div class="card-body" v-if="empty === 0">
                      <div class="container"> <br>
                        <div class="row">
                          <div class="col-md-3">
                            <router-link to="#">
                              <i class="far fa-9x fa-folder"></i> <br>
                              <h6 style="font-size: 1.1rem; color: #000">Nouveau ( {{infos.infosNouveauCount}} )</h6> 
                            </router-link>
                            
                          </div>
                          <div class="col-md-3">
                            <router-link to="#">
                              <i class="far fa-9x fa-folder"></i> <br>
                              <h6 style="font-size: 1.1rem; color: #000">Doublant ( {{infos.infosDoublantCount}} )</h6> 
                            </router-link>
                          </div>
                          <div class="col-md-3">
                            <router-link to="#">
                              <i class="far fa-9x fa-folder"></i> <br>
                              <h6 style="font-size: 1.1rem; color: #000">Triplant ( {{infos.infosTriplantCount}} )</h6> 
                            </router-link>
                          </div>
                          <div class="col-md-3">
                            <router-link to="#">
                              <i class="far fa-9x fa-folder"></i> <br>
                              <h6 style="font-size: 1.1rem; color: #000">Quadruplant ( {{infos.infosQuadruplantCount}} )</h6> 
                            </router-link>
                          </div>
                        </div> <br>
                        <div class="row">
                          <div class="col-md-3">
                            <router-link to="#">
                              <i class="far fa-9x fa-folder"></i> <br>
                              <h6 style="font-size: 1.1rem; color: #000">Quintuplant ( {{infos.infosQuintuplantCount}} )</h6> 
                            </router-link>
                          </div>
                          <div class="col-md-3">
                            <router-link to="#">
                              <i class="far fa-9x fa-folder"></i> <br>
                              <h6 style="font-size: 1.1rem; color: #000">Au dela ( {{infos.infosAuDeLaCount}} )</h6> 
                            </router-link>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="card-body" v-else-if="empty === 1">
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

  data() {
      return {
        infos: {},
        empty : null,
        emptyC : null,
        message: "",
      }
  },

  methods: {
    getResults(){
      axios
        .get(`/api/eleves/classes/${this.$route.params.id}/status`)
        .then(response => {
           console.log(response)
          if(response.status == 200){
            if (response.data.success == false) {

            }else{
              if (response.data.message == 'Aucune classe Trouvée') {
                this.empty = 1
                this.emptyC = 1
                this.message = response.data.message
              }else if(response.data.message == 'Aucune rentrée Scolaire en cours n\'est enregistrée'){
                this.empty = 1
                this.emptyC = 0
                this.message = response.data.message
              } else {
                this.empty = 0
                this.emptyC = 0
                this.infos = response.data
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
