<template>
  <div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
				<div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
						<div class="row flex-grow">
								<div class="col-lg-6 d-flex align-items-center justify-content-center">
										<div class="auth-form-transparent text-left p-3">
										<div class="brand-logo text-align-center">
											<h2 style="color: #193880">SINAM</h2>
										</div>
										<h5>Bienvenue sur notre Page de connexion</h5>
										<form class="pt-3" action="#" method="POST">
												<!-- <div class="alert alert-danger alert-dismissible fade show" v-if="errorType != 0" v-text="error_message" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;</span>
														</button>
												</div> -->
												<div class="form-group">
														<label >Email ou N° de Telephone</label>
														<div class="input-group">
																		<div class="input-group-prepend bg-transparent">
																				<span class="input-group-text bg-transparent border-right-0">
																						<i class="mdi mdi-account-outline text-primary"></i>
																				</span>
																		</div>

																<input type="text" name="username"  class="form-control form-control-lg border-left-0 is-invalid"  placeholder=" Entrez votre email ou N° de telephone">
														</div>
												</div>
												<div class="form-group">
														<label for="exampleInputPassword">Mot de passe</label>
														<div class="input-group">
																<div class="input-group-prepend bg-transparent">
																		<span class="input-group-text bg-transparent border-right-0">
																				<i class="mdi mdi-lock-outline  text-primary"></i>
																		</span>
																</div>
																<input type="password" name="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Entrez votre mot de passe">
														</div>
												</div>
												<div class="my-2 d-flex justify-content-between align-items-center">
														<div class="form-check">
																<label class="form-check-label text-muted">
																<input type="checkbox" class="form-check-input">
																Se Souvenir de moi
																</label>
														</div>
												<a href="#" class="auth-link text-black">Mot de passe oublié?</a>
												</div>
												<!-- <div class="my-3" v-if="isLogging">
														<button class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn" style="background: #094F09" type="button">
																Connexion en cours ....
														</button>
												</div> -->
												<div class="my-3">
														<button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" style="background: #193880" @click.prevent="login" type="submit">Se connecter</button>
												</div>
										</form>
										</div>
								</div>
								<div class="col-lg-6 login-half-bg d-flex flex-row">
										<p class="text-white font-weight-medium text-center flex-grow align-self-end"> MANOUDEV Copyright &copy; 2022  Tous droits reservés.</p>
								</div>
						</div>
				</div>
				<!-- content-wrapper ends -->
		</div>
</div>
<!-- page-body-wrapper ends -->

<!-- container-scroller -->
</template>

<script>
export default {
  
}
</script>