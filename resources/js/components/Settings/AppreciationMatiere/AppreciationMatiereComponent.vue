<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a> <span>Appréciation par Matière</span>
                  <div class="icons"  v-if="emptyMatiere == 1"><router-link to="/settings/appreciations/matieres/create" class="btn btn-lg btn-primary btn-block icon" style="color: #fff"><i class="fas fa-plus"></i> &nbsp; &nbsp; Ajouter</router-link></div>
              </div>
          </div>
      </div>
      <div class="email-body">
        <div class="row" v-if="empty == 0">
          <!-- ============================================================== -->
          <!-- campaign activities   -->
          <!-- ============================================================== -->
          <div class="col-lg-12">
              <div class="section-block"> <h3> Liste des appréciations</h3>
              </div>
              <div class="card">
                  <div class="campaign-table table-responsive">
                      <table class="table">
                          <thead>
                              <tr class="border-0">
                                  <th class="border-0">id</th>
                                  <th class="border-0">Moy. Sup ou egal à</th>
                                  <th class="border-0">Moy. Inferieur à</th>
                                  <th class="border-0">Appréciation</th>
                                  <th class="border-0">Actions</th>
                              </tr>
                          </thead>
                          <tbody v-for="info in infos" :key="info.id">
                                <tr>
                                    <th scope="row">{{ info.id  }}</th>
                                    <th scope="row"> {{ info.moyFort  }} </th>
                                    <th scope="row">{{ info.moyFaible  }}</th>
                                    <th scope="row"> {{ info.appreciation  }} </th>
                                    <td>
                                      <div class="row" style="max-width: 100%" >
                                          
                                          <div class="col-md-3">
                                            <router-link :to="{ name: 'settings.appreciations.matieres.update', params: { id: info.id }}" class="btn btn-xs btn-rounded btn-primary">
                                              <i class="fa fa-edit"></i>
                                            </router-link>
                                          </div>
                                          <div class="col-md-1"></div>
                                          <div class="col-md-3">
                                            <button type="button" class="btn btn-xs btn-rounded  btn-danger" @click="deleteAppreciationMatiere(info.id)"> <i class="fa fa-trash"></i></button>
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
        emptyMatiere: null,
        message: "",
      }
  },

  methods: {
    getResults(){
      axios
        .get('/api/settings/appreciations/matieres')
        .then(response => {
          if(response.status == 200){
            if (response.data.success == false) {

            }else{
              if (response.data.message == 'Aucune matière n\'est enregistrée') {
                this.empty = 1
                this.message = response.data.message
              } else if(response.data.message == 'Aucune appréciation par matière n\'est enregistrée'){
                this.emptyMatiere = 1
                this.empty = 1
                this.message = response.data.message
              }else {
                this.empty = 0
                this.emptyMatiere = 1
                this.infos = response.data.data
              }
            }
          }
      });
    },

    deleteAppreciationMatiere(id) {
      this.$swal({
        title: "Etes-vous sûr?",
        text: "Vous ne pourrez plus récupérer ces données!",
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
          .delete(`/api/settings/appreciations/matieres/${id}`)
          .then(response => {
              this.getResults();
                if (response.data.message == 'L\' appréciation été supprimée avec succès.') {
                  this.$swal({
                      title: "Succès!",
                      text: response.data.message,
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
