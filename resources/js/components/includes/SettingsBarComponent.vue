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
                    <i class="fas fa-cog"></i>  Mes Paramètres 
                </span>
                <p class="description">Gestion des paramètres</p>
            </div>
             <div class="aside-compose"><a class="btn btn-lg btn-secondary btn-block" href="#">Année Scolaire: 2020-2021</a></div>
            <div class="aside-nav collapse">
                <ul class="nav">
                    <li class="active">
                        <router-link to="/settings/coordonnees">
                            <span class="icon"><i class="fas fa-fw fa-map-marker-alt"></i></span>Coordonnées de l'école
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/settings/decisions/status"><span class="icon"><i class="fas fa-fw  fa-envelope"></i></span>
                            Décision du conseil
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/settings/appreciations/matieres">
                            <span class="icon"><i class=" fas  fa-fw fa-check-circle"></i></span>
                            Appréciation par Matière
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/settings/appreciations/semestres"><span class="icon"><i class="fas  fa-fw fa-check-circle"></i></span>
                            Appréciation par Semestre
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/settings/annee-scolaire">
                            <span class="icon"><i class="fas fa-fw fa-calendar-alt"></i></span>
                            Année Scoalaire
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/settings/users">
                            <span class="icon"><i class="fas fa-fw fa-users"></i></span>
                            Gestion des Utilisateurs
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