<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a>   <span>Decision du conseil</span>
              </div>
          </div>
      </div>
      <div class="email-body">


        <div class="row" >
          <!-- ============================================================== -->
          <!-- campaign activities   -->
          <!-- ============================================================== -->
          <div class="col-lg-12">
            <div class="section-block"> <h3>Decisions par statut</h3></div>
            
              <div class="container"> <br>
                <div class="row">
                  <div class="col-md-4">
                    <router-link to="/settings/decisions/nouveaux/colleges">
                      <i class="far fa-9x fa-folder"></i> <br>
                      <h6 style="font-size: 1.1rem; color: #000">Nouveau</h6> 
                    </router-link>
                    
                  </div>
                  <div class="col-md-4">
                    <router-link to="/settings/decisions/doublants/colleges">
                      <i class="far fa-9x fa-folder"></i> <br>
                      <h6 style="font-size: 1.1rem; color: #000">Doublant</h6> 
                    </router-link>
                  </div>
                  <div class="col-md-4">
                   <router-link to="/settings/decisions/triplants/colleges">
                      <i class="far fa-9x fa-folder"></i> <br>
                      <h6 style="font-size: 1.1rem; color: #000">Triplant</h6> 
                    </router-link>
                  </div>
                </div> <br>
                <div class="row">
                  <div class="col-md-4">
                    <router-link to="/settings/decisions/quadruplants/colleges">
                      <i class="far fa-9x fa-folder"></i> <br>
                      <h6 style="font-size: 1.1rem; color: #000">Quadruplant</h6> 
                    </router-link>
                  </div>
                  <div class="col-md-4">
                   <router-link to="/settings/decisions/quintuplants/colleges">
                      <i class="far fa-9x fa-folder"></i> <br>
                      <h6 style="font-size: 1.1rem; color: #000">Quintuplant</h6> 
                    </router-link>
                  </div>
                  <div class="col-md-4">
                    <router-link to="/settings/decisions/audela/colleges">
                      <i class="far fa-9x fa-folder"></i> <br>
                      <h6 style="font-size: 1.1rem; color: #000">Au dela</h6> 
                    </router-link>
                  </div>
                </div>
              </div>
          </div>

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
