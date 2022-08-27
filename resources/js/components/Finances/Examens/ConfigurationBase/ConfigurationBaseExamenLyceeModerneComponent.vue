<template>

  <div class="container-fluid">
    <financebar> </financebar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a>   <span>Configuration de Base</span>
              <div class="icons"><router-link to="/finances/examens" class="btn btn-lg btn-primary btn-block icon" style="color: #fff"><i class="fas fa-dollar-sign"></i> &nbsp; &nbsp;Payer les frais</router-link>
                </div>
              </div>
          </div>
      </div>
      <div class="email-body">


        <div class="row" >
          <!-- ============================================================== -->
          <!-- campaign activities   -->
          <!-- ============================================================== -->
          <div class="col-lg-12">
            <div class="section-block"> <h3>Configuration de base pour le lycée moderne</h3></div>
            
            <div class="row">
                <!-- ============================================================== -->
                <!-- four widgets   -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- total views   -->
                <!-- ============================================================== -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                  <router-link to="/finances/examens/settings/college">
                    <div class="card">
                      <div class="card-body">
                          <div class="d-inline-block">
                              <h5 class="text-muted">Collège</h5>
                              <h2 class="mb-0"> 10 </h2>
                          </div>
                          <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                              <i class="fa fa-home fa-fw fa-sm text-info"></i>
                          </div>
                      </div>
                    </div>
                  </router-link>

                </div>
                <!-- ============================================================== -->
                <!-- end total views   -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- total followers   -->
                <!-- ============================================================== -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                  <router-link to="/finances/examens/settings/lycee/moderne">
                    <div class="card">
                      <div class="card-body">
                          <div class="d-inline-block">
                              <h5 class="text-muted">Lycée Moderne</h5>
                              <h2 class="mb-0">10</h2>
                          </div>
                          <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                              <i class="fa fa-home fa-fw fa-sm text-primary"></i>
                          </div>
                      </div>
                    </div>
                  </router-link>
                </div>
                <!-- ============================================================== -->
                <!-- end total followers   -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- partnerships   -->
                <!-- ============================================================== -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                  <router-link to="/finances/examens/settings/lycee/technique">
                    <div class="card">
                      <div class="card-body">
                          <div class="d-inline-block">
                              <h5 class="text-muted">Lycée Technique</h5>
                              <h2 class="mb-0">10</h2>
                          </div>
                          <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                              <i class="fa fa-home fa-fw fa-sm text-secondary"></i>
                          </div>
                      </div>
                    </div>
                  </router-link>
                </div>

            </div>

             <div class="row">
          <!-- ============================================================== -->
          <!-- bordered table -->
          <!-- ============================================================== -->
          <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="card">
                  <h5 class="card-header">Configuration de base pour le lycée moderne</h5>
                  <div class="card-body" v-if="empty == 0">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-b-60">
                        <div class="simple-card">
                            <ul class="nav nav-tabs" id="myTab5" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active border-left-0" id="product-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="product-tab-1" aria-selected="true">GARCONS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="product-tab-2" aria-selected="false">FILLES</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent5">
                                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="product-tab-1">
                                    <p>Praesent et cursus quam. Etiam vulputate est et metus pellentesque iaculis. Suspendisse nec urna augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubiliaurae.</p>
                                    <p>Nam condimentum erat aliquet rutrum fringilla. Suspendisse potenti. Vestibulum placerat elementum sollicitudin. Aliquam consequat molestie tortor, et dignissim quam blandit nec. Donec tincidunt dui libero, ac convallis urna dapibus eu. Praesent volutpat mi eget diam efficitur, a mollis quam ultricies. Morbi eu turpis odio.</p>
                                    <ul class="list-unstyled arrow">
                                        <li>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                        <li>Donec ut elit sodales, dignissim elit et, sollicitudin nulla.</li>
                                        <li>Donec at leo sed nisl vestibulum fermentum.
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="product-tab-2">
                                    <div class="review-block">
                                      <p>Praesent et cursus quam. Etiam vulputate est et metus pellentesque iaculis. Suspendisse nec urna augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubiliaurae.</p>
                                      <p>Nam condimentum erat aliquet rutrum fringilla. Suspendisse potenti. Vestibulum placerat elementum sollicitudin. Aliquam consequat molestie tortor, et dignissim quam blandit nec. Donec tincidunt dui libero, ac convallis urna dapibus eu. Praesent volutpat mi eget diam efficitur, a mollis quam ultricies. Morbi eu turpis odio.</p>
                                      <ul class="list-unstyled arrow">
                                          <li>
                                              Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                          <li>Donec ut elit sodales, dignissim elit et, sollicitudin nulla.</li>
                                          <li>Donec at leo sed nisl vestibulum fermentum.
                                          </li>
                                      </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

  data() {
      return {
        infos: {},
        empty : 0,
        message: "",
      }
  },

  methods:{
   
  },

  mounted(){
    
  }
  
}
</script>
