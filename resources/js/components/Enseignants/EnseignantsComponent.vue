<template>
  <div class="dashboard-influence">
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h3 class="mb-2">Les enseignants</h3>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Gestion des enseignants</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Liste de tous les enseignants</li>
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
                  <h5 class="card-header">Liste des enseignants</h5>
                   <div>
                        <router-link style="float: right; margin-top: -45px; margin-right: 17px" :to='{name:"CreateEnseignantComponent"}' class="btn btn-rounded btn-primary"><i class="fa fa-plus"></i>Ajouter un enseignant</router-link>
                    </div>
                  <div class="card-body"  v-if="empty == 0">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Nom Complet</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Sexe</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                          </thead>
                            <tbody v-for="info in infos.enseignants" :key="info.id">
                                <tr>
                                    <th scope="row">{{ info.code  }}</th>
                                    <th scope="row"> {{ info.nom  }} {{ info.prenoms  }} </th>
                                    <th scope="row"> {{ info.telephone }}</th>
                                    <th scope="row"> {{ info.adresse  }} </th>
                                    <th scope="row"> {{ info.sexe  }} </th>
                                    <td>  <button type="button" v-if="info.status" class="btn btn-rounded btn-primary">Actif</button>
                                     <button type="button" v-else class="btn btn-rounded btn-secondary">Inactif</button>  </td>
                                    <td>
                                      <div class="row" style="max-width: 100%" >
                                          <div class="col-md-3">
                                             <router-link :to="{ name:'ShowEnseignantsComponent', params: { id: info.id }}" class="btn btn-rounded btn-info">
                                              <i class="fa fa-eye"></i>
                                            </router-link>
                                          </div>
                                          <div class="col-md-3">
                                            <router-link :to="{ name:'UpdateEnseignantComponent', params: { id: info.id }}" class="btn btn-rounded btn-primary">
                                              <i class="fa fa-edit"></i>
                                            </router-link>
                                          </div>
                                          <div class="col-md-3">
                                            <button type="button" class="btn btn-rounded  btn-danger" @click="deleteEnseignant(info.id)"> <i class="fa fa-trash"></i></button>
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
        message: "",
      }
  },

  methods: {
    getResults(){
      axios
        .get('/api/enseignants')
        .then(response => {
          if(response.status == 200){
            if (response.data.success == false) {

            }else{
              if (response.data.message == 'Aucun enseignant n\'est enregistré') {
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

    deleteEnseignant(id) {
        this.$swal({
            title: "Etes-vous sûr?",
            text: "Vous ne pourrez plus récupérer cet Enseignant!",
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
                .delete(`/api/enseignants/${id}`)
                .then(response => {
                    console.log(response.data)
                    this.getResults();
                      if (response.data.message == "L' enseignant  a été supprimée avec succès.") {
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
