<template>
  <layout>
    <div v-if="$page.props.flash.success"></div>

    <!-- Modal Success -->

    <!-- Modal -->

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastrar Multa</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form @submit.prevent="sendForm" enctype="multipart/form-data" id="formAddMulta">
          <h4><span style="font-weight: bold">Registro</span></h4><br>

          <div class="row">
            <div class="col-md-6">
              <label for="inputVeiculo">Veículo (modelo / placa)</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-building"></i>
                  </div>
                </div>
                <select
                  id="inputVeiculo"
                  class="form-control"
                  v-model="form.veiculo"
                  name="txtVeiculo"
                >
                  <option selected>Selecione o veículo</option>
                  <option
                    v-for="veiculo in veiculos"
                    :key="veiculo.id"
                    :value="veiculo.id"
                  >
                    {{ veiculo.nome_modelo + ' / ' + veiculo.placa }}
                  </option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <label for="inputInfracao">Tipos de Infrações</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-briefcase"></i>
                  </div>
                </div>
                <select
                  id="inputInfracao"
                  class="form-control"
                  v-model="form.infracao"
                  name="txtInfracao"
                >
                  <option>Selecione a Infração</option>
                  <option
                    v-for="infracao in infracoes"
                    :key="infracao.id"
                    :value="infracao.id"
                  >
                    {{ infracao.descricao_infracao }}
                  </option>
                </select>
              </div>
            </div>            
          </div>
          <br>
          <div class="row">
            <div class="col-md-4">
              <label for="inputDataMulta">Data da Multa</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                </div>
                <input
                  key=""
                  type="text"
                  id="inputDataMulta"
                  class="form-control"
                  v-model="form.data_multa"
                  name="txtDataMulta"
                  v-mask="'##/##/####'"
                />
              </div>
            </div> 
            <div class="col-md-4">
              <label for="inputCusto">Custo</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-id-card"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputCusto"
                  class="form-control"
                  v-model="form.custo"
                  name="txtCusto"
                  v-mask="['R$ ##.##', 'R$ ###.###', 'R$ #.###,##', 'R$ ##.###,##']"
                />
              </div>
            </div>  
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
    infracoes: Array,
    veiculos: Array
  },
  data: () => {
    return {
      form: {
        veiculo: null,
        infracao: null,
        data_multa: null,
        custo: null,
        
      },
    };
  },
  methods: {
    sendForm() {

      var aux_veiculo = this.form.veiculo;
      var aux_infracao = this.form.infracao;
      var aux_data_multa = this.form.data_multa;
      var aux_custo = this.form.custo;

      this.$inertia.post("/multas/registrar", this.form, {
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
              "<img src='https://i0.wp.com/www.roteirospe.com/wp-content/uploads/2017/02/SEU-LOGO-AQUI-300x81-1-300x81-1.png?ssl=1'>",
            message:
              "<i class='fas fa-check-circle' style='color:green'></i>&nbsp&nbsp" +
              "<span style='font-weight:bold; position: relative; top: 5px;'>Multa registrada com sucesso!</span>",
          });

          $("#formAddMulta").reset();                   
          
        },

        onError: () => {

          $("#inputVeiculo").val(aux_veiculo);
          $("#inputInfracao").val(aux_infracao);
          $("#inputCusto").val(aux_custo);
          $("#inputDataMulta").val(aux_data_multa);

        },

      });
    },
  },
};
</script>