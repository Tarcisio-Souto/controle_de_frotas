<template>
  <layout>
    <div v-if="$page.props.flash.success"></div>

    <!-- Modal Success -->

    <!-- Modal -->

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Alterar Veículo</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form
          @submit.prevent="sendForm"
          enctype="multipart/form-data"
        >        
          <br /><br />
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
                <select id="inputVeiculo" v-model="form.modelo" class="form-control" name="txtVeiculo">
                  <option selected :value="form.modelo" style="background-color:gainsboro">{{ form.modelo }}</option>
                  <option
                    v-for="modelo in modelos"
                    :key="modelo.id"
                    :value="modelo.nome_modelo"
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
                <select id="inputEmpresa" v-model="form.empresa" class="form-control" name="txtEmpresa">
                  <option selected :value="form.empresa" style="background-color:gainsboro">{{ form.empresa }}</option>
                  <option
                    v-for="empresa in empresas"
                    :key="empresa.id"
                    :value="empresa.nome"
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
import { Link } from "@inertiajs/inertia-vue";
import { Inertia } from "@inertiajs/inertia";

export default {
  components: {
    Layout,
    Link,
  },
  props: {
    errors: Object,
    modelos: Array,
    empresas: Array,
    veiculo: Array
  },

  data: () => {
    return {
      form: {
        id: null,
        modelo: null,
        empresa: null,
        placa: null,
        ano: null,
        tipo: null,
        km: null,  

        preserveState: true,
      },
    };
  },

  created() {
    
    this.form.id = this.$page.props.veiculo[0].vc_id,
    this.form.modelo = this.$page.props.veiculo[0].nome_modelo,

    this.form.empresa = this.$page.props.veiculo[0].nome,
    this.form.placa = this.$page.props.veiculo[0].placa,
    this.form.ano = this.$page.props.veiculo[0].ano,
    this.form.tipo = this.$page.props.veiculo[0].tipo,
    this.form.km = this.$page.props.veiculo[0].quilometragem    

  },

  methods: {
    sendForm() {
      this.$inertia.post("/veiculo/update/"+this.form.id,
        this.form,
        {
          forceFormData: true,
          preserveScroll: false,
          _token: this.$page.props.csrf_token,
          _method: "PUT",
          onSuccess: () => {
            bootbox.alert({
              centerVertical: true,
              backdrop: true,
              closeButton: false,
              size: "large",
              title:
                "<img src='https://i0.wp.com/www.roteirospe.com/wp-content/uploads/2017/02/SEU-LOGO-AQUI-300x81-1-300x81-1.png?ssl=1'>",
              message:
                "<i class='fas fa-check-circle' style='color:green'></i>&nbsp&nbsp" +
                "<span style='font-weight:bold; position: relative; top: 5px;'>Cadastro atualizado com sucesso!</span>",
            });
          },
        }
      );
    },
  },
};
</script>