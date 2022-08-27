<template>
  <div class="dashboard-influence">
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h3 class="mb-2">Modifier une classe du lycée moderne</h3>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Gestion des classes du lycée moderne</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Modifier une classe du lycée moderne</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- widgets   -->
        <!-- ============================================================== -->
        <div class="row">
          <!-- ============================================================== -->
          <!-- bordered table -->
          <!-- ============================================================== -->

          <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="card">
                  <h5 class="card-header">Modifier une classe  du lycée moderne</h5>
                   <div>
                        <router-link style="float: right; margin-top: -45px; margin-right: 17px" :to='{name:"ClasseLyceeModerneComponent"}' class="btn btn-rounded btn-primary"><i class="fa fa-bars"></i>Liste des classes du lycée moderne</router-link>
                    </div>
                  <div class="card-body" v-if="empty == 0">
                        <div class="alert alert-danger" v-if="errorcheck" role="alert">
                            {{ errorsAlert  }}
                        </div>
                      <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" v-if="!errors.codeClasse">
                                    <label>Code de la classe</label> <br>
                                    <input type="text" name="codeClasse"  v-model="data.codeClasse" class="form-control"  required>
                                </div>
                                <div class="form-group" v-else>
                                    <label for="validationServer03">Code de la classe</label> <br>
                                    <input type="text" name="codeClasse"  v-model="data.codeClasse" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                                    <div  v-for=" error_codeClasse in errors.codeClasse" :key="error_codeClasse"  class="invalid-feedback" style="color: red; font-size: 0.9em">
                                        {{ error_codeClasse }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" v-if="!errors.nomClasse">
                                    <label>Nom de la classe</label> <br>
                                    <input type="text" name="nomClasse"  v-model="data.nomClasse" class="form-control"  required>
                                </div>
                                <div class="form-group" v-else>
                                    <label for="validationServer03">Nom de la classe</label> <br>
                                    <input type="text" name="nomClasse"  v-model="data.nomClasse" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                                    <div v-for=" error_nomClasse in errors.nomClasse" :key="error_nomClasse" style="color: red; font-size: 0.9em" >
                                        {{ error_nomClasse }}
                                    </div>
                                </div>
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" v-if="!errors.capacite">
                                    <label>Capacité de la classe</label> <br>
                                    <input  type="number" name="capacite"  v-model="data.capacite" class="form-control"  required>
                                </div>
                                <div class="form-group" v-else>
                                    <label for="validationServer03">Capacité de la classe</label> <br>
                                    <input type="number" name="capacite"  v-model="data.capacite" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                                    <div v-for=" error_capacite in errors.capacite" :key="error_capacite"  style="color: red; font-size: 0.9em">
                                        {{ error_capacite }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group" v-if="!errors.classeSuperieure">
                                    <label>Classe Supérieure</label> <br>
                                    <input  type="text" name="classeSuperieure"  v-model="data.classeSuperieure" class="form-control"  required>
                                </div>
                                <div class="form-group" v-else>
                                    <label for="validationServer03">Classe Supérieure</label> <br>
                                    <input type="text" name="classeSuperieure"  v-model="data.classeSuperieure" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                                    <div v-for=" error_classeSuperieure in errors.classeSuperieure" :key="error_classeSuperieure"  style="color: red; font-size: 0.9em">
                                        {{ error_classeSuperieure }}
                                    </div>
                                </div>
                            </div>
                        </div> <br>

                        <div class="row"> <br>
                            <div class="col-md-6">
                                <div v-if="!errors.cycle">
                                    <h5>Choisir le cycle</h5>
                                    <div class="input-group mb-3">
                                        <select class="custom-select " name="cycle" v-model="data.cycle">
                                            <option value="Premier">Premier Cycle</option>
                                            <option value="Deuxième">Deuxième Cycle</option>
                                        </select>
                                    </div>
                                </div>
                                <div v-else>
                                    <h5>Choisir le cycle</h5>
                                    <div class="input-group mb-3">
                                        <select class="custom-select " name="cycle" v-model="data.cycle">
                                            <option value="Premier">Premier Cycle</option>
                                            <option value="Deuxième">Deuxième Cycle</option>
                                        </select>
                                    </div>
                                    <div v-for="error_cycleH in errors.cycle" :key="error_cycleH" style="color: red; font-size: 0.9em">
                                        {{ error_cycleH }}
                                    </div>
                                </div>
                            </div>
                             <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div v-if="data.finDeCycle">
                                    <h5> Fin de cycle ? </h5>
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="finDeCycle" v-model="data.finDeCycle" checked="" class="custom-control-input"><span class="custom-control-label">OUI</span>
                                    </label>
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="finDeCycle" v-model="data.finDeCycle"   @click="finDeCycleH()" class="custom-control-input"><span class="custom-control-label">NON</span>
                                    </label>
                                </div>
                                <div v-else>
                                    <h5>  Fin de cycle ? </h5>
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="finDeCycle" v-model="data.finDeCycle" class="custom-control-input"><span class="custom-control-label">OUI</span>
                                    </label>
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="finDeCycle" v-model="data.finDeCycle"  checked="" class="custom-control-input"><span class="custom-control-label">NON</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div style="float: right">
                            <div class="my-3" v-if="loadingSave">
                                <button class="btn  btn-primary"  type="button">
                                   Modification en cours ....
                                </button>
                            </div>
                            <div class="my-3" v-if="!loadingSave">
                                <button type="submit" class="btn btn-primary" @click.prevent="update" >Enregistrez</button>
                            </div>
                        </div>
                    </form>
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
        <!-- ============================================================== -->
        <!-- end widgets   -->
        <!-- ============================================================== -->

      </div>
  </div>
</template>
<script>
 export default {
        name:"create-users",
        data(){
            return{
                data:{
                    codeClasse: "",
                    nomClasse:"",
                    cycle:"",
                    section:"Lycée Moderne",
                    finDeCycle: 0,
                    capacite: 50,
                    classeSuperieure: null,
                },
                errors: {},
                errorcheck: false,
                loadingSave: false,
                empty: null,
                message: null,
                errorsAlert: null,
            }
        },
        methods: {
            finDeCycleH(){
                this.data.finDeCycle = 0
            },
           update(){
              this.loadingSave = true
              if (this.data.finDeCycle == 'on') {
                  this.data.finDeCycle = 1
              }else{
                    this.data.finDeCycle = 0
              }
              axios.put(`/api/classes/${this.$route.params.id}/update`, this.data)
              .then(response => {
                  console.log(this.data)
                    this.loadingSave = false
                  if (response.data.success == false) {
                      if (response.data.message == "Erreur de validation") {
                          this.errors = response.data.errors
                      }else if(response.data.message == "La classe doit avoir une capacité minimum d'au moins 5 places."){
                          this.errorcheck = true
                          this.errorsAlert = response.data.message
                      }
                  }else{
                      if (response.data.message == 'La classe a été modifié avec succès.' ) {
                          this.$swal({
                          title: "Succès!",
                          text:  response.data.message,
                          icon: "success",
                          timer: 1000,
                          showConfirmButton: false
                      });
                      this.$router.push({name:"ClasseLyceeModerneComponent"})
                      }
                  }
              }).catch(error => console.log(error))
           },

           getResults(){
            axios
              .get(`/api/classes/${this.$route.params.id}/edit`)
              .then(response => {
                if(response.status == 200){
                  if (response.data.success == false) {
                    if (response.data.message == 'Aucune Information trouvée.') {
                      this.empty = 1
                      this.message = response.data.message
                    }
                  }else{
                    if (response.data.message == 'Aucune Information trouvée.') {
                      this.empty = 1
                      this.message = response.data.message
                    } else {
                      this.empty = 0
                      this.data = response.data[0]

                      // if (this.data.finDeCycle == 1) {
                      //   this.data.finDeCycle = 'on'
                      // } else {
                      //   this.data.finDeCycle = 'off'
                      // }
                    }
                  }
                }
      });
    }
            
        },
        mounted(){
          this.getResults();
        },
    }
</script>
