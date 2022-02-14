<template>
  <layout>
    <div v-if="$page.props.flash.success"></div>

    <!-- Modal Success -->

    <!-- Modal -->

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastrar Manutenção</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form @submit.prevent="sendForm" enctype="multipart/form-data" id="formAddManutencao">
          <h4><span style="font-weight: bold">Registro</span></h4><br>

          <div class="row">
            <div class="col-md-4">
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
            <div class="col-md-4">
              <label for="inputOficina">Oficina</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-briefcase"></i>
                  </div>
                </div>
                <select
                  id="inputOficina"
                  class="form-control"
                  v-model="form.oficina"
                  name="txtOficina"
                >
                  <option>Selecione a oficina</option>
                  <option
                    v-for="oficina in oficinas"
                    :key="oficina.id"
                    :value="oficina.id"
                  >
                    {{ oficina.nome_oficina }}
                  </option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputServico">Serviço</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-briefcase"></i>
                  </div>
                </div>
                <select
                  id="inputServico"
                  class="form-control"
                  v-model="form.servico"
                  name="txtServico"
                >
                  <option>Selecione o Serviço</option>
                  <option
                    v-for="servico in servicos"
                    :key="servico.id"
                    :value="servico.id"
                  >
                    {{ servico.descricao_servicos }}
                  </option>
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-4">
              <label for="inputDataManutencao">Data da Manutenção</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                </div>
                <input
                  key=""
                  type="text"
                  id="inputDataManutencao"
                  class="form-control"
                  v-model="form.data_manutencao"
                  name="txtDataManutencao"
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
            <div class="col-md-4"></div>          
          </div>

          <br>
          <div class="row">
            <div class="col-md-8">
               <label for="exampleFormControlTextarea1">Observações</label><br>
              <textarea class="form-control" id="exampleFormControlTextarea1" v-model="form.observacao" rows="3"></textarea>
            </div>
            <div class="col-md-4"></div>
          </div>
          
          <br /><br />
          <div class="row">
            <div class="col-md-12">
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
    servicos: Array,
    oficinas: Array,
    veiculos: Array
  },
  data: () => {
    return {
      form: {
        veiculo: null,
        oficina: null,
        servico: null,
        data_manutencao: null,
        custo: null,
        observacao: null,
      },
    };
  },
  methods: {
    sendForm() {

      var aux_veiculo = this.form.veiculo;
      var aux_oficina = this.form.oficina;
      var aux_servico = this.form.servico;
      var aux_data_man = this.form.data_manutencao;
      var aux_custo = this.form.custo;
      var aux_observacao = this.form.observacao;

      this.$inertia.post("/manutencoes/registrar", this.form, {
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
              "<span style='font-weight:bold; position: relative; top: 5px;'>Manutenção registrada com sucesso!</span>",
          });
          
          $("#formAddManutencao").reset();
          
        },

        onError: () => {

          $("#inputVeiculo").val(aux_veiculo);
          $("#inputOficina").val(aux_oficina);
          $("#inputServico").val(aux_servico);
          $("#inputDataManutencao").val(aux_data_man);
          $("#inputCusto").val(aux_custo);
          $("#exampleFormControlTextarea1").val(aux_observacao);                   

        },

      });
    },
  },
};
</script>