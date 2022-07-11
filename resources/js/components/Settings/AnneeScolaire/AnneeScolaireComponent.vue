<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a> <span>Les années scolaires</span>
                  <div class="icons"><router-link to="/settings/annee-scolaire/create" class="btn btn-lg btn-primary btn-block icon" style="color: #fff"><i class="fas fa-plus"></i> &nbsp; &nbsp; Ajouter</router-link></div>
              </div>
          </div>

      </div>
      <div class="email-body">
        <div class="row"  v-if="empty == 0">
          <!-- ============================================================== -->
          <!-- campaign activities   -->
          <!-- ============================================================== -->
          <div class="col-lg-12">
              <div class="section-block"> <h3> Liste des années scolaires</h3>
              </div>
              <div class="card">
                  <div class="campaign-table table-responsive">
                      <table class="table">
                          <thead>
                              <tr class="border-0">
                                  <th class="border-0">Année</th>
                                  <th class="border-0">Date Debut</th>
                                  <th class="border-0">Date Fin</th>
                                  <th class="border-0">Période</th>
                                  <th class="border-0">Etat</th>
                                  <th class="border-0">Actions</th>
                              </tr>
                          </thead>
                          <tbody v-for="info in infos.anneeScolaires" :key="info.id">
                              <tr>
                                  <td> {{ info.anneeScolaire  }} </td>
                                  <td> {{ info.dateDebut  }}</td>
                                  <td> {{ info.dateFin  }} </td>
                                  <td> {{ info.TypePeriode  }} </td>
                                  <td> 
                                  <button type="button" v-if="info.status == 'Inactif'" class="btn btn-xs btn-rounded btn-secondary" @click="activerRentree(info.id)">Inactif</button>
                                     <button type="submit" v-else-if="info.status == 'En Cours'" class="btn btn-xs btn-rounded btn-primary">En Cours ...</button> 
                                     <button type="submit" v-else class="btn btn-xs btn-rounded btn-success">Terminer</button> 
                                  </td>
                                  <td>
                                    <div class="row" style="max-width: 100%" >
                                        <div class="col-md-3">
                                          <router-link to="#" class="btn btn-xs btn-rounded btn-brand" title="voir le bilan de cette année scolaire">
                                            <i class="fa fa-eye"></i>
                                          </router-link>
                                        </div>
                                        <div class="col-md-3">
                                          <router-link to="#" class="btn btn-xs btn-rounded btn-primary">
                                            <i class="fa fa-edit"></i>
                                          </router-link>
                                        </div>
                                        <div class="col-md-3">
                                          <button type="button" class="btn btn-xs btn-rounded  btn-danger" @click="deleteRentree(info.id)"> <i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                  </td>
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
        empty : null,
        message: "",
      }
  },

  methods: {
    getResults(){
      axios
        .get('/api/settings/rentree/scolaire')
        .then(response => {
           console.log(response)
          if(response.status == 200){
            if (response.data.success == false) {

            }else{
              if (response.data.message == 'Aucune rentrée scolaire n\'est enregistrée') {
                this.empty = 1
                this.message = response.data.message
              } else {
                this.empty = 0
                this.infos = response.data
                console.log(response.data)
              }
            }
          }
      });
    },

    deleteRentree(id) {
        this.$swal({
            title: "Etes-vous sûr?",
            text: "Vous ne pourrez plus récupérer ces données !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "blue",
            confirmButtonText: "Oui, supprimez!",
            cancelButtonText: "Non, annuler !",
            closeOnConfirm: true,
            closeOnCancel: true
        }).then((confirmed) => {
            if (confirmed.isConfirmed) {
               axios
                .delete(`/api/settings/rentree/scolaire/${id}`)
                .then(response => {
                    console.log(response.data)
                    this.getResults();
                      if (response.data.message == "La Rentrée scolaire  a été supprimée avec succès.") {
                        this.$swal({
                            title: "Succès!",
                            text:  response.data.message,
                            icon: "success",
                            timer: 1000,
                            showConfirmButton: false
                        });
                    } else {
                        this.$swal({
                            title: "Erreur",
                            text: response.data.message,
                            icon: "error",
                            timer: 1000
                        });
                    }
                });
            }
        });
    },

     activerRentree(id) {
        this.$swal({
            title: "Etes-vous sûr?",
            text: "Voulez Vraiment Démarrer Une Nouvelle Rentrée !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "blue",
            confirmButtonText: "Oui, activer!",
            cancelButtonText: "Non, annuler !",
            closeOnConfirm: true,
            closeOnCancel: true
        }).then((confirmed) => {
            if (confirmed.isConfirmed) {
               axios
                .get(`/api/settings/rentree/scolaire/${id}/activate`)
                .then(response => {
                    console.log(response.data)
                    this.getResults();
                      if (response.data.message == "Une Nouvelle Rentrée Scoalire a été mise en cours.") {
                        this.$swal({
                            title: "Succès!",
                            text:  response.data.message,
                            icon: "success",
                            timer: 1000,
                            showConfirmButton: false
                        });
                    } else {
                        this.$swal({
                            title: "Erreur",
                            text: response.data.message,
                            icon: "error",
                            timer: 1000
                        });
                    }
                });
            }
        });
    },
  },

  mounted() {
      this.getResults();
    }

}
</script>
