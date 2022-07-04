<template>
  <div class="modal fade bd-example-modal-lg" id="modalCreateAppreciationMatiere" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une apreciation </h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
            </div>
            <div class="modal-body"  v-if="!empty">

              <form>
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Moy. sup. ou egal à</label>
                        <input id="inputText3" type="number" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Moy. inferieure à</label>
                        <input id="inputText3" type="number" class="form-control" placeholder="">
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <label for="inputText3" class="col-form-label">Appréciation</label>
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
            <div class="modal-body"  v-else>
              <div class="row" >
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
        </div>
    </div>
  </div>
</template>

<script>
export default {

  data() {
      return {
        infos: {},
        empty : 1,
        message: "",
      }
  },

  methods: {
    getResults(){
      axios
        .get('/api/matieres')
        .then(response => {
          if(response.status == 200){
            if (response.data.success == false) {

            }else{
              if (response.data.message == 'Aucune matière n\'est enregistrée') {
                this.message = response.data.message
                this.infos = response.data
                console.log(this.message)
              } else {
                this.empty = 0
                this.infos = response.data
                console.log(response.data)
              }
            }
          }
      });
    },
  },

  mounted() {
      this.getResults();
    }

}
</script>