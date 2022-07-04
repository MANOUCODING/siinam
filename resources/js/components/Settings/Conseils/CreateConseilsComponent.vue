<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a>   <span>Decision du conseil</span>
                  <div class="icons">
                    <router-link to="settings/decisions/conseils" class="btn btn-lg btn-primary btn-block icon" data-toggle="modal" data-target="#modalCreateConseils" style="color: #fff">
                      <i class="fas fa-plus"></i> &nbsp; &nbsp; Liste des décisions
                    </router-link>
                  </div>
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
                  <h3 class="section-title">Ajouter  une decision</h3>
              </div>
              <div class="card">
                  <div class="card-body">
                    <form>
                      <div class="row">
                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group">
                              <label for="inputText3" class="col-form-label">Mo. sup. ou egal à</label>
                              <input id="inputText3" type="number" class="form-control" placeholder="">
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group">
                              <label for="inputText3" class="col-form-label">Moy. inferieure à</label>
                              <input id="inputText3" type="number" class="form-control" placeholder="">
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group">
                            <label for="inputText3" class="col-form-label">Decision</label>
                            <input id="inputText3" type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          <div class="form-group">
                            <label for="inputText3" class="col-form-label">Details de la decision</label>
                            <input id="inputText3" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Fermez</a>
                        <a href="#" class="btn btn-primary">Enregistrez</a>
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