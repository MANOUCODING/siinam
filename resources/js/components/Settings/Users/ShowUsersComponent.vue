<template>

  <div class="container-fluid">
    <settingsbar> </settingsbar>
    <div class="main-content container-fluid p-0">
      <div class="email-head">
          <div class="email-head-subject">
              <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-2x fa-cog"></i></span></a> <span>Liste des connexions</span>
                  <div class="icons"><router-link to="/settings/users" class="btn btn-lg btn-primary btn-block icon" style="color: #fff"><i class="fas fa-bars"></i> &nbsp; &nbsp; Liste des Utilisateurs</router-link></div>
              </div>
          </div>

      </div>
      <div class="email-body">
        <div class="row" v-if="empty == 0">
            <div class="col-xl-4 col-lg-3 col-md-5 col-sm-12 col-12">
                <!-- ============================================================== -->
                <!-- card profile -->
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-body">
                        <div class="user-avatar text-center d-block">
                            <img src="/assets/admin/images/avatar-1.jpg" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                        </div>
                        <div class="text-center">
                            <h2 class="font-24 mb-0">Michael J. Christy</h2>
                            <p>Project Manager @Influnce</p>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h3 class="font-16">Contact Information</h3>
                        <div class="">
                            <ul class="list-unstyled mb-0">
                            <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i>manouadjanor@gmail.com</li>
                            <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i>(900) 123 4567</li>
                        </ul>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h3 class="font-16">Rating</h3>
                        <h1 class="mb-0">4.8</h1>
                        <div class="rating-star">
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <i class="fa fa-fw fa-star"></i>
                            <p class="d-inline-block text-dark">14 Reviews </p>
                        </div>
                    </div>
                    
                    <div class="card-body border-top">
                        <h3 class="font-16">Category</h3>
                        <div>
                            <a href="#" class="badge badge-light mr-1">Fitness</a><a href="#" class="badge badge-light mr-1">Life Style</a><a href="#" class="badge badge-light mr-1">Gym</a>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end card profile -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- end profile -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- campaign data -->
            <!-- ============================================================== -->
            <div class="col-xl-8 col-lg-3 col-md-5 col-sm-12 col-12">
              <div class="row">
                <div class="col-xl-6 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-body">
                            <h5 class="text-muted">Connexions</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">12099</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-body">
                            <h5 class="text-muted">Activités</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">1245</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">10%</span>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-b-60">
                    <div class="simple-card">
                        <ul class="nav nav-tabs" id="myTab5" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active border-left-0" id="product-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="product-tab-1" aria-selected="true">Descriptions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="product-tab-2" aria-selected="false">Reviews</a>
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

  methods: {
    getResults(){
      axios
        .get(`/api/settings/users/${this.$route.params.id}/show`)
        .then(response => {
          if(response.status == 200){
            if (response.data.success == false) {

            }else{
              if (response.data.message == 'Aucun personnel n\'est enregistré') {
                this.empty = 1
                this.message = response.data.message
              } else {
                this.empty = 0
                this.infos = response.data
               
              }
            }
          }
      });
    },
    
  },

  mounted() {
      // this.getResults();
    }

}
</script>
