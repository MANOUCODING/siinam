<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a>   <span>Décision du conseil pour les nouveaux</span>
              </div>
          </div>
      </div>
      <div class="email-body">


        <div class="row" >
          <!-- ============================================================== -->
          <!-- campaign activities   -->
          <!-- ============================================================== -->
          <div class="col-lg-12">
            <div class="section-block" v-if="empty == 1"> <h3 v-if="emptyF == 0">les décisions sur  la classe de {{infos.classe.codeClasse}} </h3></div>

            <div class="section-block" v-if="empty == 0"> <h3>les décisions sur  la classe de {{infos.classe.codeClasse}} </h3></div>

             <div class="row">
              <!-- ============================================================== -->
              <!-- bordered table -->
              <!-- ============================================================== -->
              <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                  <div class="card">
                  <h5 class="card-header">Liste des decisions</h5>
                   <div>
                        <router-link style="float: right; margin-top: -45px; margin-right: 17px" v-if="emptyF == 0 " :to='{name:"settings.decisions.conseils.create.nouveaux", params: { id: infos.classe.id }}' class="btn btn-rounded btn-primary"><i class="fa fa-plus"></i>Ajouter une décision</router-link>
                    </div>
                  <div class="card-body" v-if="empty == 0">
                      <table class="table table-bordered">
                          <thead>
                             <tr class="border-0">
                                  <th class="border-0">id</th>
                                  <th class="border-0">Moy. Sup ou egal à</th>
                                  <th class="border-0">Moy. Inferieur à</th>
                                  <th class="border-0">Decision</th>
                                  <th class="border-0">Actions</th>
                              </tr>
                          </thead>
                          <tbody v-for="info in infos.decisionConseils" :key="info">
                              <tr>
                                  <th scope="row">{{ info.id  }}</th>
                                    <th scope="row"> {{ info.moyFort  }} </th>
                                    <th scope="row">{{ info.moyFaible  }}</th>
                                    <th scope="row"> {{ info.decision  }} </th>
                                    <td>
                                      <div class="row" style="max-width: 100%" >
                                          
                                          <div class="col-md-3">
                                            <router-link :to="{ name: 'settings.decisions.conseils.update.nouveaux', params: { id: info.classe_id, decision_id: info.id  }}" class="btn btn-xs btn-rounded btn-primary">
                                              <i class="fa fa-edit"></i>
                                            </router-link>
                                          </div>
                                          <div class="col-md-1"></div>
                                          <div class="col-md-3">
                                            <button type="button" class="btn btn-xs btn-rounded  btn-danger" @click="deleteDecisionConseil(info.id)"> <i class="fa fa-trash"></i></button>
                                          </div>
                                      </div>
                                    </td>
                              </tr>
                          </tbody>
                      </table>
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
          <!-- end bordered table -->
          <!-- ============================================================== -->
        </div>

              
          </div>

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
        emptyF : null,
        message: "",
      }
  },

  methods:{
     getResults(){
      axios
        .get(`/api/settings/decisions/conseils/nouveaux/${this.$route.params.id}/show`)
        .then(response => {
          if(response.status == 200){
            if (response.data.success == false) {
              if (response.data.message == 'Aucune décision trouvée.') {
                this.empty = 1
                this.emptyF = 1
                this.message = response.data.message
              }else if(response.data.message == 'Aucune classe trouvée.'){
                this.empty = 1
                this.emptyF = 1
                this.message = response.data.message
              }
            }else{
              if (response.data.message == 'Aucune décision trouvée.') {
                this.empty = 1
                this.emptyF = 0
                this.message = response.data.message
                this.infos = response.data
                console.log(this.infos)
              } else{
                this.emptyF = 0
                this.empty = 0
                this.infos = response.data
              }
            }
          }
        }
      );
    },

   deleteDecisionConseil(id) {
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
          .delete(`/api/settings/decisions/conseils/${id}/destroy`)
          .then(response => {
              this.getResults();
                if (response.data.message == 'La décision été supprimée avec succès.') {
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

  mounted(){
    this.getResults();
  }
  
}
</script>
