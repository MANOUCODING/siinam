<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
            <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a> <span>Coordonnées de l'Etablissement</span>
                <div class="icons"><router-link to="/settings/coordonnees/edit" class="btn btn-lg btn-primary btn-block icon" style="color: #fff"><i class="fas fa-edit"></i> &nbsp; &nbsp; Modifier</router-link>
                </div>
            </div>
          </div>

      </div>
      <div class="email-body" style="font-size: 1.6rem">
        <div class="row" v-if="empty == 0">
          <div class="col-md-4">
            <img src="/assets/admin/images/coordonnees.png" style="height: 200px; width: 200px;" alt="coordonnees"> <br>
            <div class="card">
                <div class="card-header">
                    <h4 class="d-flex justify-content-between align-items-center mb-0">
                      <span class="text-muted">Responsable de l'école</span>
                    </h4>
                </div>
                <div class="card-body">
                  <ul class="list-group mb-3">
                      <li class="list-group-item d-flex justify-content-between">
                          <div>
                              <h6 class="my-0">Nom du Responsable</h6>
                              <small >{{coordonnes.nomResponsable}}</small>
                          </div>
                      </li>

                      <li class="list-group-item d-flex justify-content-between">
                          <div>
                              <h6 class="my-0">Poste du Responsable</h6>
                              <small > {{coordonnes.posteResponsable}} </small>
                          </div>
                      </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                    <h4 class="d-flex justify-content-between align-items-center mb-0">
                      <span >Coordonnées de l'école</span>
                    </h4>
                </div>
                <div class="card-body">
                  <ul class="list-group mb-3">
                      <li class="list-group-item d-flex justify-content-between">
                          <div>
                              <h6 class="my-0">Nom de l'établissement</h6>
                              <small > {{ coordonnes.nomEtablissement  }} </small>
                          </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between">
                          <div>
                              <h6 class="my-0">Addresse ligne 1</h6>
                              <small >{{ coordonnes.addressLine1  }}</small>
                          </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between">
                          <div>
                              <h6 class="my-0">Addresse ligne 2</h6>
                              <small >{{ coordonnes.addressLine2  }}</small>
                          </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between ">
                          <div class="text-success">
                              <h6 class="my-0">Nom DRE</h6>
                              <small> {{coordonnes.nomDRE}} </small>
                          </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between ">
                          <div class="text-success">
                              <h6 class="my-0">Nom IESEG</h6>
                              <small>{{coordonnes.nomIESEG}}</small>
                          </div>
                      </li>
                  </ul>
                </div>
              </div>
            </div>
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
      </div>

  </div>

</template>
<script>
export default {

  data() {
      return {
        coordonnes: {},
        empty : null,
        message: "",
      }
  },

  methods: {
    getResults(){
      axios
        .get('/api/settings/coordonnees')
        .then(response => {
          if(response.status == 200){
            if (response.data.success == false) {

            }else{
              if (response.data.message == 'Aucune information n\'est enregistrée') {
                this.empty = 1
                this.message = response.data.message
              } else {
                this.empty = 0
                this.coordonnes = response.data.school[0]
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
