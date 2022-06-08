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
          <div class="row">
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
                                  <th class="border-0">Profil</th>
                                  <th class="border-0">Nom Complet</th>
                                  <th class="border-0">Télephone</th>
                                  <th class="border-0">Adresse</th>
                                  <th class="border-0">Role</th>
                                  <th class="border-0">Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <!-- ============================================================== -->
          <!-- end campaign activities   -->
          <!-- ============================================================== -->
        </div>
      </div>
      <div class="email-attachments">
         
      </div>
    </div>
   
  </div>

</template>
<script>
export default {
  
}
</script>