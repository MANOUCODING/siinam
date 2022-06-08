<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a> <span>Appreciation par Semestre</span>
                  <div class="icons"><a href="#" class="btn btn-lg btn-primary btn-block icon" data-toggle="modal" data-target="#modalCreateAppreciationSemestre" style="color: #fff"><i class="fas fa-plus"></i> &nbsp; &nbsp; Ajouter</a></div>
              </div>
          </div>
          <modalAppreciationSemestre></modalAppreciationSemestre>
      </div>
      <div class="email-body">
        <div class="row">
          <!-- ============================================================== -->
          <!-- campaign activities   -->
          <!-- ============================================================== -->
          <div class="col-lg-12">
              <div class="section-block"> <h3> Liste des appréciations</h3>
              </div>
              <div class="card">
                  <div class="campaign-table table-responsive">
                      <table class="table">
                          <thead>
                              <tr class="border-0">
                                  <th class="border-0">Cycle</th>
                                  <th class="border-0">Moy. Sup ou egal à</th>
                                  <th class="border-0">Moy. Inferieur à</th>
                                  <th class="border-0">Appréciation</th>
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