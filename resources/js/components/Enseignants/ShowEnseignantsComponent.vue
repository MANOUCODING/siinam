<template>
  <div class="dashboard-influence">
    <div class="container-fluid dashboard-content">
       <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h3 class="mb-2">Emploi du temps du Prof Ama</h3>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Gestion des enseignants</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Emploi du temps</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
       <div class="row">
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
                   
                    <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12 col-12">
                        <router-link :to="{ name: 'settings.users.show.connexions', params: { id: 1 }}" >
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Emploi du temps</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">1245</h1>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                    </div>
                  
                    <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12 col-12">
                         <router-link :to="{ name: 'settings.users.show.activity', params: { id: 1 }}" >
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Présence</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">12099</h1>
                                    </div>
                                </div>
                            </div>
                         </router-link>
                    </div>
                    
                    <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12 col-12">
                         <router-link :to="{ name: 'settings.users.show.activity', params: { id: 1 }}" >
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Salaire</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">12099</h1>
                                    </div>
                                </div>
                            </div>
                         </router-link>
                    </div>
                </div>
              
              <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-b-60">
                    <div class="simple-card">
                        <ul class="nav nav-tabs" id="myTab5" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active border-left-0" id="product-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="product-tab-1" aria-selected="true"> 24H</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="product-tab-2" aria-selected="false"> 1 Semaine</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" id="product-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="product-tab-3" aria-selected="false"> 1 Mois</a>
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
                             <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="product-tab-3">
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

      </div>
  </div>
</template>
<script>
export default {
  
}
</script>