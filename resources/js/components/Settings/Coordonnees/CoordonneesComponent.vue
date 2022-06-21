<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
            <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a> <span>Coordonnées de l'Etablissement</span>
                <div class="icons"><a href="#" class="btn btn-lg btn-primary btn-block icon" style="color: #fff"><i class="fas fa-edit"></i> &nbsp; &nbsp; Modifier</a>
                </div>
            </div>
          </div>
          
      </div>
      <div class="email-body">
        <div class="row" v-if="empty">
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
                              <small class="text-muted">Brief description</small>
                          </div>
                      </li>
                      
                      <li class="list-group-item d-flex justify-content-between">
                          <div>
                              <h6 class="my-0">Poste du Responsable</h6>
                              <small class="text-muted">Brief description</small>
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
                      <span class="text-muted">Coordonnées de l'école</span>
                    </h4>
                </div>
                <div class="card-body">
                  <ul class="list-group mb-3">
                      <li class="list-group-item d-flex justify-content-between">
                          <div>
                              <h6 class="my-0">Nom de l'établissement</h6>
                              <small class="text-muted">Brief description</small>
                          </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between">
                          <div>
                              <h6 class="my-0">Addresse ligne 1</h6>
                              <small class="text-muted">Brief description</small>
                          </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between">
                          <div>
                              <h6 class="my-0">Addresse ligne 2</h6>
                          </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between bg-light">
                          <div class="text-success">
                              <h6 class="my-0">Nom DRE</h6>
                              <small>EXAMPLECODE</small>
                          </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between bg-light">
                          <div class="text-success">
                              <h6 class="my-0">Nom IESEG</h6>
                              <small>EXAMPLECODE</small>
                          </div>
                      </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row" v-else>
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <img src="/assets/admin/images/empty.png" alt="empty"> <br>
                <h6> {{ message  }} </h6>
              </div>
              <div class="col-md-2"></div>
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
        empty : true,
        message: "",
      }
  },

  methods: {
    getResults(){
      axios
        .get('/api/settings/coordonnees')
        .then(response => {
           console.log(response)
          if(response.status == 200){
            if (response.data.success == false) {
                
            }else{
              if (response.data.message == 'Aucune information n\'est enregistrée') {
                this.empty = true
                this.message = response.data.message
                console.log(response.data)
              } else {
                this.empty = false
                this.coordonnes = response.data.school
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