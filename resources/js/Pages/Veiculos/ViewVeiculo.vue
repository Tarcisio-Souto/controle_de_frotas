<template>
  <layout>
    <div v-if="$page.props.flash.success"></div>

    <!-- Modal Success -->

    <!-- Modal -->

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastro de Veículo</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form v-for="veiculo in veiculo" :key="veiculo.vc_id">          
          <br /><br />
          <h4><span style="font-weight: bold">Registro</span></h4>
          <div class="row">
            <div class="col-md-4">
              <label for="inputModelo">Modelo</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputModelo"
                  class="form-control"
                  :value="veiculo.nome_modelo"
                  disabled
                />
              </div>              
            </div>
            <div class="col-md-4">
              <label for="inputPlaca">Placa</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputPlaca"
                  class="form-control"
                  :value="veiculo.placa"
                  disabled
                />
              </div>              
            </div>
            <div class="col-md-4">
              <label for="inputAno">Ano</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputAno"
                  class="form-control"
                  :value="veiculo.ano"
                  disabled
                />
              </div>              
            </div>            
          </div>          
          <br />

          <div class="row">

            <div class="col-md-4">
              <label for="inputTipo">Tipo</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputTipo"
                  class="form-control"
                  :value="veiculo.tipo"
                  disabled
                />
              </div>
            </div>

            <div class="col-md-4">
              <label for="inputKm">Quilometragem</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputKm"
                  class="form-control"
                  :value="veiculo.quilometragem"
                  disabled
                />
              </div>
            </div>
            
            <div class="col-md-4">
              <label for="inputEmpresa">Empresa</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputEmpresa"
                  class="form-control"
                  :value="veiculo.nome"
                  disabled
                />
              </div>              
            </div>
          </div>

          <br /><br />
          <div class="row">
            <div class="col-md-12">
              <Link :href="'/veiculo/editar/'+veiculo.vc_id" class="btn btn-warning">Editar</Link>              
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- <br> temporário -->

    <br /><br /><br /><br /><br />
    <br /><br /><br /><br /><br />
    <br /><br /><br /><br /><br />
  </layout>
</template>

<script>
import Layout from "../../Layout.vue";
import { Link } from "@inertiajs/inertia-vue";
import { Inertia } from "@inertiajs/inertia";

export default {
  components: {
    Layout,
    Link,
  },
  props: {
    veiculo: Array,
  },
  methods: {
    sendForm() {
      this.$inertia.post("/veiculos/registrar", this.form, {
        forceFormData: true,
        preserveScroll: false,
        _token: this.$page.props.csrf_token,

        
      });
    },
  },
};
</script>