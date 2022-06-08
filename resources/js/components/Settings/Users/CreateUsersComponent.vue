<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a> <span>Gestion des Utilisateurs</span>
                  <div class="icons"><router-link to="/settings/users" class="btn btn-lg btn-primary btn-block icon" style="color: #fff"><i class="fas fa-bars"></i> &nbsp; Les Utilisateurs</router-link></div>
              </div>
          </div>
          
      </div>
      <div class="email-body">
        <!-- ============================================================== -->
        <!-- basic form  -->
        <!-- ============================================================== -->
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="section-block" id="basicform">
                  <h3 class="section-title">Ajouter  un utilisateur</h3>
              </div>
              <div class="card">
                  <div class="card-body">
                    <form>
                      <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <h5>Choisir une photo</h5>
                          <div class="custom-file mb-3">
                              <input type="file" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Choisir une photo de profil</label>
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group">
                            <br>
                            <label for="input-select">Choisir un role</label> 
                            <select class="form-control" id="input-select">
                                <option>Choose Example</option>
                            </select>
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
        </div>
        <!-- ============================================================== -->
        <!-- end basic form  -->
        <!-- ============================================================== -->
      </div>
    </div>
   
  </div>

</template>
<script>
export default {
  
}
</script>