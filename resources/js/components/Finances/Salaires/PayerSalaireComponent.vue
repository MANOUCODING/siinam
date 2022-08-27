<template>

  <div class="container-fluid">
    <financebar> </financebar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
            <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-dollar-sign"></i></span></a> <span>Payer un salaire</span>
                <div class="icons"><router-link to="#" class="btn btn-lg btn-primary btn-block icon" style="color: #fff"><i class="fas fa-cog"></i> &nbsp; &nbsp;Configuration de base</router-link>
                </div>
            </div>
          </div>

      </div>
      <div class="email-body">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="email-search">
                    <div class="input-group input-search">
                        <input class="form-control " type="text" placeholder="Rechercher un enseignant"><span class="input-group-btn">
                        <button class="btn btn-secondary" type="button"><i class="fas fa-search"></i></button></span>
                    </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                <button class="btn btn-primary" type="button"> <i class="fas fa-chart-line"></i> Bilan sur les salaires</button>
              </div>
            </div>
          </div>
        </div>
        <div class="row" v-if="empty == 0">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div style="position: relative; height: 500px;">
                  <img src="/assets/admin/images/empty.png" style="width: 150px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" alt="empty">
              </div>
              <h4 style="text-align: center; margin-top: -50px"> {{ message  }} </h4>
            </div>
            <div class="col-md-3"></div>
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
        empty : 0,
        message: "Auncun enseignant n'est enregistré ",
      }
  },

  methods: {
   
  },

  mounted() {
      
    }

}
</script>
