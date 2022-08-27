<template>
   <div class="dashboard-main-wrapper">
     <!-- ============================================================== -->
	    <!-- navbar -->
	    <!-- ============================================================== -->
	    <div class="dashboard-header">
	        <nav class="navbar navbar-expand-lg bg-white fixed-top">
	            <a class="navbar-brand" href="index.html">SIINAM</a>
	            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	                <span class="navbar-toggler-icon"></span>
	            </button>
	            <div class="collapse navbar-collapse " id="navbarSupportedContent">
	                <ul class="navbar-nav ml-auto navbar-right-top">
	                    
	                    
	                    
	                </ul>
	            </div>
	        </nav>
	    </div>
	    <!-- ============================================================== -->
	    <!-- end navbar -->
	    <!-- ============================================================== -->
	    <!-- ============================================================== -->
	    <!-- left sidebar -->
	    <!-- ============================================================== -->
	    <div class="nav-left-sidebar sidebar-dark">
	        <div class="menu-list">
	            <nav class="navbar navbar-expand-lg navbar-light">
	                <a class="d-xl-none d-lg-none" href="#">Tableau de bord</a>
	                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	                    <span class="navbar-toggler-icon"></span>
	                </button>
	                <div class="collapse navbar-collapse" id="navbarNav">
	                    <ul class="navbar-nav flex-column">
	                        <li class="nav-divider">
	                            Menu
	                        </li>
	                        <li class="nav-item ">
	                            <router-link class="nav-link active" to="/dashboard"><i class="fas fa-home"></i>Tableau de bord</router-link>
	                        </li>

                           <li class="nav-item">
	                            <router-link class="nav-link" to="/classes/college"><i class=" fas fa-home"></i>Gestion des Classes</router-link>
	                        </li>

	                        <li class="nav-item">
															<router-link class="nav-link" to="/eleves/colleges"><i class=" fas fa-users"></i>Gestion des éleves</router-link>
	                        </li>
	                         <li class="nav-item">
	                            <router-link class="nav-link" to="/absences/home"><i class="fas fa-book"></i>Gestion des absences</router-link>
	                        </li>

                          <li class="nav-item">
	                            <router-link class="nav-link" to="/matieres/litteraires"><i class="fas fa-book"></i>Gestion des Matières</router-link>
	                        </li>

	                        <li class="nav-item ">
	                            <router-link class="nav-link" to="/enseignants"><i class="fas fa-user-circle"></i>Gestion des Enseignants</router-link>
	                        </li>

                          <li class="nav-item">
	                            <router-link class="nav-link" to="/affectations"><i class=" fas fa-bars"></i>Gestion des Affections</router-link>
	                        </li>

													<li class="nav-item">
	                            <router-link class="nav-link" to="/finances/home"><i class=" fas fa-bars"></i>Gestion des finances</router-link>
	                        </li>
	                        
	                       
	                        <li class="nav-item">
	                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-star"></i>Gestion des Notes </a>
	                            <div id="submenu-6" class="collapse submenu" style="">
	                                <ul class="nav flex-column">
	                                    <li class="nav-item">
	                                        <a class="nav-link" href="pages/blank-page.html">Blank Page</a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link" href="pages/blank-page-header.html">Blank Page Header</a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link" href="pages/login.html">Login</a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link" href="pages/404-page.html">404 page</a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link" href="pages/sign-up.html">Sign up Page</a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link" href="pages/forgot-password.html">Forgot Password</a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link" href="pages/pricing.html">Pricing Tables</a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link" href="pages/timeline.html">Timeline</a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link" href="pages/calendar.html">Calendar</a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link" href="pages/sortable-nestable-lists.html">Sortable/Nestable List</a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link" href="pages/widgets.html">Widgets</a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link" href="pages/media-object.html">Media Objects</a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link" href="pages/cropper-image.html">Cropper</a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link" href="pages/color-picker.html">Color Picker</a>
	                                    </li>
	                                </ul>
	                            </div>
	                        </li>
	                        <li class="nav-item">
	                             <router-link class="nav-link" to="/documents/home"><i class="fas fa-folder"></i>Mes Documents</router-link>
	                        </li>
	                        
	                        <li class="nav-item">
														<router-link class="nav-link" to="/settings/home" >
															<i class="fas fa-cogs"></i>Paramètres
														</router-link>
	                        </li>

                           
	                    </ul>
	                </div>
	            </nav>
	        </div>
	    </div>
	    <!-- ============================================================== -->
	    <!-- end left sidebar -->
	    <!-- ============================================================== -->
       <!-- ============================================================== -->
	    <!-- wrapper  -->
	    <!-- ============================================================== -->
	    <div class="dashboard-wrapper">
        <router-view></router-view>
      </div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>