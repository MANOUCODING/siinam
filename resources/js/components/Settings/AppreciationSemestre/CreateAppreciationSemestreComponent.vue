<template>
  <div class="modal fade bd-example-modal-lg" id="modalCreateAppreciationSemestre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une apreciation </h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
            </div>
            <div class="modal-body">

              <form>
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <br>
                      <label for="input-select">Choisir un Cycle</label> 
                      <select class="form-control" id="input-select">
                          <option>Premier cycle</option>
                           <option>Deuxième cycle</option>
                      </select>
                    </div>
                  </div>
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
        </div>
    </div>
  </div>
</template>

<script>
export default {
 
}
</script>