<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a> <span>Gestion des Utilisateurs</span>
                  <div class="icons"><router-link to="/settings/users/create" class="btn btn-lg btn-primary btn-block icon" style="color: #fff"><i class="fas fa-plus"></i> &nbsp; &nbsp; Ajouter</router-link></div>
              </div>
          </div>

      </div>
      <div class="email-body">
          <div class="row" v-if="empty == 0">
          <!-- ============================================================== -->
          <!-- campaign activities   -->
          <!-- ============================================================== -->
          <div class="col-lg-12">
              <div class="section-block"> <h3> Liste des utilisateurs</h3>
              </div>
              <div class="card">
                  <div class="campaign-table table-responsive">
                      <table class="table">
                          <thead>
                              <tr class="border-0">
                                  <th class="border-0">Code</th>
                                  <th class="border-0">Nom Complet</th>
                                  <th class="border-0">Télephone</th>
                                   <th class="border-0">Status</th>
                                  <th class="border-0">Role</th>
                                  <th class="border-0">Actions</th>
                              </tr>
                          </thead>
                          <tbody v-for="info in infos.personnels" :key="info.id">
                                <tr>
                                    <th scope="row">{{ info.code  }}</th>
                                    <td> {{ info.nom  }} {{ info.prenoms  }} </td>
                                    <td> {{ info.telephone }}</td>
                                    <td v-if="info.status == 1"> 
                                      <button type="button" class="btn btn-xs btn-rounded  btn-primary" >Actif</button>  
                                    </td>
                                     <td v-if="info.status == 0"> 
                                      <button type="button" class="btn btn-xs btn-rounded  btn-danger" >Inactif</button>  
                                    </td>
                                    <td>  
                                      <button type="button" class="btn btn-xs btn-rounded btn-primary"> {{ info.name }} </button> 
                                    </td>
                                    <td>
                                      <div class="row" style="max-width: 100%" >
                                          <div class="col-md-3">
                                            <router-link :to="{ name: 'settings.users.show.connexions', params: { id: info.id }}" class="btn btn-xs btn-rounded btn-info">
                                              <i class="fa fa-eye"></i>
                                            </router-link>
                                          </div>
                                          <div class="col-md-3">
                                            <router-link :to="{ name: 'settings.users.update', params: { id: info.id }}" class="btn btn-xs btn-rounded btn-primary">
                                              <i class="fa fa-edit"></i>
                                            </router-link>
                                          </div>
                                          <div class="col-md-3">
                                            <button type="button" class="btn btn-xs btn-rounded  btn-danger" @click="deletePersonnel(info.id)"> <i class="fa fa-trash"></i></button>
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
        .get('/api/settings/users')
        .then(response => {
          if(response.status == 200){
            if (response.data.success == false) {

            }else{
              if (response.data.message == 'Aucun personnel n\'est enregistré') {
                this.empty = 1
                this.message = response.data.message
              } else {
                this.empty = 0
                this.infos = response.data
               
              }
            }
          }
      });
    },

    deletePersonnel(id) {
        this.$swal({
            title: "Etes-vous sûr?",
            text: "Vous ne pourrez plus récupérer ce Personnel!",
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
                .delete(`/api/settings/users/${id}/delete`)
                .then(response => {
                    this.getResults();
                      if (response.data.message == "Le Personnel  a été supprimée avec succès.") {
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
