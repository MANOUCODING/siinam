<template>

  <div>
    <aside class="page-aside">
        <div class="aside-content">
            <div class="aside-header">
                <button class="navbar-toggle" data-target=".aside-nav" data-toggle="collapse" type="button">
                    <span class="icon">
                        <i class="fas fa-caret-down"></i>
                    </span>
                </button>
                <span class="title">
                   <i class="fas fa-2x fa-dollar-sign"></i>  Mes Finances
                </span>
                <p class="description">Gestion des finances</p>
            </div>
            <div class="aside-nav collapse">
                <span class="title">Gestion des entrées</span>
                <ul class="nav">
                    <li class="active">
                        <router-link to="/finances/ecolage">
                            <span class="icon"><i class="fas  fa-fw fa-check-circle"></i></span>Ecolage des élèves
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/finances/inscriptions"><span class="icon"><i class="fas  fa-fw fa-check-circle"></i></span>
                            Frais d'inscriptions
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/finances/examens">
                            <span class="icon"><i class="fas  fa-fw fa-check-circle"></i></span>
                           Frais d'examens
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/finances/autresfrais"><span class="icon"><i class="fas  fa-fw fa-check-circle"></i></span>
                           Autres Frais
                        </router-link>
                    </li>
                </ul>
                
                    <span class="title">Gestion des sorties</span>
                <ul class="nav">
                    <li>
                        <router-link to="/finances/paiement/salaires">
                            <span class="icon"><i class="fas  fa-fw fa-check-circle"></i></span>
                            Gérer les salaires
                        </router-link>
                    </li>

                    <li>
                        <router-link to="/finances/materiels">
                            <span class="icon"><i class="fas  fa-fw fa-check-circle"></i></span>
                            Achat de Materiels
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/finances/factures">
                            <span class="icon"><i class="fas  fa-fw fa-check-circle"></i></span>
                            Paiement des Factures
                        </router-link>
                    </li>
                     <li>
                        <router-link to="/settings/users">
                            <span class="icon"><i class="fas  fa-fw fa-check-circle"></i></span>
                            Voir le bilan
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
  </div>
</template>
<script>
export default {
  
}
</script>