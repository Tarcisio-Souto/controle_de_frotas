<template>
  <layout>
    <div v-if="$page.props.flash.success"></div>

    <!-- Modal Success -->

    <!-- Modal -->

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastrar Veículo</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form @submit.prevent="sendForm" enctype="multipart/form-data" id="formAddVeiculo">
          <h4><span style="font-weight: bold">Registro</span></h4><br>

          <div class="row">
            <div class="col-md-4">
              <label for="inputModelo">Modelo</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-building"></i>
                  </div>
                </div>
                <select
                  id="inputModelo"
                  class="form-control"
                  v-model="form.modelo"
                  name="txtModelo"
                >
                  <option selected>Selecione o veículo</option>
                  <option
                    v-for="modelo in modelos"
                    :key="modelo.id"
                    :value="modelo.id"
                  >
                    {{ modelo.nome_modelo }}
                  </option>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <label for="inputPlaca">Placa</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-id-card"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputPlaca"
                  class="form-control"
                  v-model="form.placa"
                  name="txtPlaca"
                />
              </div>
            </div>

            <div class="col-md-4">
              <label for="inputAno">Ano</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-id-card"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputAno"
                  class="form-control"
                  v-model="form.ano"
                  name="txtPlaca"
                  v-mask="['####']"
                />
              </div>
            </div>            
          </div>
          <br>

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
                  key=""
                  type="text"
                  id="inputTipo"
                  class="form-control"
                  v-model="form.tipo"
                  name="txtTipo"
                  placeholder="Ex.: leve, médio..."
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
                  key=""
                  type="text"
                  id="inputKm"
                  class="form-control"
                  v-model="form.km"
                  name="txtKm"
                  v-mask="'######'"
                />
              </div>
            </div>

            <div class="col-md-4">
              <label for="inputEmpresa">Empresa</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-building"></i>
                  </div>
                </div>
                <select
                  id="inputEmpresa"
                  class="form-control"
                  v-model="form.empresa"
                  name="txtEmpresa"
                >
                  <option selected>Selecione a empresa</option>
                  <option
                    v-for="empresa in empresas"
                    :key="empresa.id"
                    :value="empresa.id"
                  >
                  
                    {{ empresa.nome }}

                  </option>
                </select>
              </div>
            </div>        
          </div>
          <br>
          
          <br /><br />
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-success btnCadastrar">
                Cadastrar
              </button>
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
import { Inertia } from "@inertiajs/inertia";

export default {
  components: {
    Layout,
  },
  props: {
    errors: Object,
    modelos: Array,
    empresas: Array,
  },
  data: () => {
    return {
      form: {
        modelo: null,
        empresa: null,
        placa: null,
        ano: null,
        tipo: null,
        km: null,        
        
      },
    };
  },
  methods: {
    sendForm() {

      var aux_modelo = this.form.modelo;
      var aux_empresa = this.form.empresa;
      var aux_placa = this.form.placa;
      var aux_ano = this.form.ano;
      var aux_tipo = this.form.tipo;
      var aux_km = this.form.km;

      this.$inertia.post("/veiculos/registrar", this.form, {
        forceFormData: true,
        preserveScroll: false,
        _token: this.$page.props.csrf_token,
        preserveState: false,
        onSuccess: () => {
          bootbox.alert({
            centerVertical: true,
            backdrop: true,
            closeButton: false,
            size: "large",
            title:
              "<img src='http://denuncia.vitoriahospitalar.com.br/dist/logo.png?343b76e5e3d8038a9c8e00e61671535e'>",
            message:
              "<i class='fas fa-check-circle' style='color:green'></i>&nbsp&nbsp" +
              "<span style='font-weight:bold; position: relative; top: 5px;'>Veículo registrado com sucesso!</span>",
          });
                    
          $('#formAddVeiculo').reset();   
          
        },

        onError: () => {

          $("#inputPlaca").val(aux_placa);
          $("#inputAno").val(aux_ano);
          $("#inputTipo").val(aux_tipo);
          $("#inputKm").val(aux_km);
          $("#inputEmpresa").val(aux_empresa);
          $("#inputModelo").val(aux_modelo);

        }

      });
    },
  },
};
</script>