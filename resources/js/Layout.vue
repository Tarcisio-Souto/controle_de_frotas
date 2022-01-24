<template onload="sidepanel()">
  <main>
    <header>
      <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav
          class="navbar navbar-inverse fixed-top"
          id="sidebar-wrapper"
          role="navigation"
        >
          <ul class="sidebar-nav">
            <div class="sidebar-header">
              <div class="sidebar-brand">
                <a href="#">
                  <img
                    src="http://denuncia.vitoriahospitalar.com.br/dist/logo.png?343b76e5e3d8038a9c8e00e61671535e"
                    alt="VHLogo"
                    width="150px"
                  />
                </a>
              </div>
            </div>
            <li><Link href="/"><i class="fas fa-home icons-menu"></i>Início </Link></li>
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown"
                ><i class="fas fa-users icons-menu"></i>Colaboradores</a
              >
              <ul class="dropdown-menu animated fadeInLeft" role="menu">
                <!--<div class="dropdown-header">Ferramentas</div>-->
                <li><Link href="/colaborador/cadastro"><i class="fas fa-user-plus icons-menu"></i>Cadastrar</Link></li>
                <li><Link href="/colaborador/lista"><i class="fas fa-search icons-menu"></i>Pesquisar</Link></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown"
                ><i class="fas fa-building icons-menu"></i>Empresas</a
              >
              <ul class="dropdown-menu animated fadeInLeft" role="menu">
                <!--<div class="dropdown-header">Ferramentas</div>-->
                <li><Link href="/empresas/cadastro"><i class="fas fa-user-plus icons-menu"></i>Cadastrar</Link></li>
                <li><Link href="/empresas/lista"><i class="fas fa-search icons-menu"></i>Pesquisar</Link></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown"
                ><i class="fas fa-car icons-menu"></i>Veículos</a
              >
              <ul class="dropdown-menu animated fadeInLeft" role="menu">
                <!--<div class="dropdown-header">Ferramentas</div>-->
                <li><Link href="#veiculos/cadastro"><i class="fas fa-plus-circle icons-menu"></i>Cadastrar</Link></li>
                <li><Link href="#veiculos/lista"><i class="fas fa-search icons-menu"></i>Pesquisar</Link></li>
                <li><Link href="/fabricantes/lista"><i class="fas fa-industry icons-menu"></i>Fabricantes</Link></li>
                <li><Link href="#modelos/lista"><i class="fas fa-copyright icons-menu"></i>Modelos</Link></li>              
                <li><Link href="/servicos/lista"><i class="fas fa-cogs icons-menu"></i>Serviços</Link></li>
                <li><Link href="#manutencoes/lista"><i class="fas fa-tools icons-menu"></i>Manutenções</Link></li>
                <li><Link href="#abastecimentos/lista"><i class="fas fa-gas-pump icons-menu"></i>Abastecimentos</Link></li>
                <li><Link href="#trocas-oleo/lista"><i class="fas fa-oil-can icons-menu"></i>Trocas de Óleo</Link></li>
                
              </ul>
            </li>
           
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown"
                ><i class="fas fa-wrench icons-menu"></i>Oficinas</a
              >
              <ul class="dropdown-menu animated fadeInLeft" role="menu">
                <!--<div class="dropdown-header">Ferramentas</div>-->
                <li><Link href="/oficinas/cadastro"><i class="fas fa-user-plus icons-menu"></i>Cadastrar</Link></li>
                <li><Link href="/oficinas/lista"><i class="fas fa-search icons-menu"></i>Pesquisar</Link></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown"
                ><i class="fas fa-gas-pump icons-menu"></i>Postos</a
              >
              <ul class="dropdown-menu animated fadeInLeft" role="menu">
                <!--<div class="dropdown-header">Ferramentas</div>-->
                <li><Link href="/postos/cadastro"><i class="fas fa-user-plus icons-menu"></i>Cadastrar</Link></li>
                <li><Link href="/postos/lista"><i class="fas fa-search icons-menu"></i>Pesquisar</Link></li>
              </ul>
            </li>


            <li><Link href="#sobre"><i class="fas fa-info-circle icons-menu"></i>Sobre</Link></li>            
            <li>
              <Link href="#sair"><i class="fas fa-sign-out-alt icons-menu"></i>Sair</Link>
            </li>
          </ul>
        </nav>

        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <button
            type="button"
            class="hamburger animated fadeInLeft is-closed"
            data-toggle="offcanvas"
          >
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
          </button>
          <div class="container">
            <article>
              <slot />
            </article>
          </div>
        </div>
        <!-- /#page-content-wrapper -->
      </div>
      <!-- /#wrapper -->
    </header>
  </main>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue";

export default {
  components: {
    Link,
  },
  mounted() {
    $(function () {
      var trigger = $(".hamburger"),
        overlay = $(".overlay"),
        isClosed = false;

      trigger.click(function () {
        hamburger_cross();
      });

      function hamburger_cross() {
        if (isClosed == true) {
          overlay.hide();
          trigger.removeClass("is-open");
          trigger.addClass("is-closed");
          isClosed = false;
        } else {
          overlay.show();
          trigger.removeClass("is-closed");
          trigger.addClass("is-open");
          isClosed = true;
        }
      }

      $('[data-toggle="offcanvas"]').click(function () {
        $("#wrapper").toggleClass("toggled");
      });
    });
  }
  /*
  created() {

    /*  Elementos necessários para habilitar o upload de imagens com o plugin Bootstrap Input
        Diponível em: https://plugins.krajee.com/file-input */

    /* Recurso necessário para a renderização do file input 

    var scripts = [
      "https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css",
      "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css",
      "https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css",
      "https://code.jquery.com/jquery-3.6.0.min.js",
      "https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/piexif.min.js",
      "https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/sortable.min.js",
      "https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js",
      "https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js",
      "https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/locales/LANG.js"

    ];
    scripts.forEach(script => {
      let tag = document.createElement("script");
      tag.setAttribute("src", script);
      document.head.appendChild(tag);
    });
  },
  */
  
};
</script>
