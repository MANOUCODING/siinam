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
                  <h5 class="card-header">Ajouter un enseignant</h5>
                   <div>
                        <router-link style="float: right; margin-top: -45px; margin-right: 17px" :to='{name:"EnseignantsComponent"}' class="btn btn-rounded btn-primary"><i class="fa fa-plus"></i>Liste des enseignants</router-link>
                    </div>
                  <div class="card-body">
                      <form>
                      <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          <h5>Choisir une photo</h5>
                          <div class="custom-file mb-3">
                              <input type="file" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Choisir une photo de profil</label>
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group">
                              <label for="inputText3" class="col-form-label">Nom</label>
                              <input id="inputText3" type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group">
                              <label for="inputText3" class="col-form-label">Prénoms</label>
                              <input id="inputText3" type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group">
                              <label for="inputText3" class="col-form-label">Email</label>
                              <input id="inputText3" type="email" placeholder="name@example.com" class="form-control">
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group">
                              <label for="inputText3" class="col-form-label">Telephone</label>
                              <input id="inputText3" type="number" class="form-control" placeholder="Numero de telephone">
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group">
                            <label for="inputText3" class="col-form-label">Mot de passe</label>
                            <input id="inputText3" type="password"  class="form-control">
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group">
                            <label for="inputText3" class="col-form-label">Adresse</label>
                            <input id="inputText3" type="text" class="form-control">
                          </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <br> 
                          <div class="form-group">
                            <button class="btn btn-lg  btn-primary  btn-block" type="button">Enregistrer</button>
                          </div>
                        </div>
                      </div>
                    </form>
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
  
}
</script>