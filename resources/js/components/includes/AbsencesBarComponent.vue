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
                    <i class="fas fa-users"></i>  Les Absences
                </span>
                <p class="description">Gestion des absences</p>
            </div>
            <div class="aside-nav collapse">
                <span class="title">Actions principales</span>
                <ul class="nav">
                    <li class="active">
                        <router-link to="/absences/signaler">
                            <span class="icon"><i class="fas  fa-fw fa-check-circle"></i></span>Signaler une absence
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/fautes/signaler">
                            <span class="icon"><i class="fas  fa-fw fa-check-circle"></i></span>Signaler une faute de dicipline
                        </router-link>
                    </li>
                </ul>
                
                <span class="title">Statistiques</span>
                <ul class="nav">
                    <li>
                        <router-link to="/etat/absences/college">
                            <span class="icon"><i class="fas  fa-fw fa-check-circle"></i></span>
                            Etat des absences
                        </router-link>
                    </li>

                    <li>
                        <router-link to="/etat/fautes/college">
                            <span class="icon"><i class="fas  fa-fw fa-check-circle"></i></span>
                            Etat des discipline
                        </router-link>
                    </li>
                </ul>
                <span class="title">Configuration</span>
                <ul class="nav">
                    <li>
                        <router-link to="/absences/settings/college">
                            <span class="icon"><i class="fas  fa-fw fa-check-circle"></i></span>
                           Configurer les absences
                        </router-link>
                    </li>

                    <li>
                        <router-link to="/fautes/settings/college">
                            <span class="icon"><i class="fas  fa-fw fa-check-circle"></i></span>
                           Configurer la discipline
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