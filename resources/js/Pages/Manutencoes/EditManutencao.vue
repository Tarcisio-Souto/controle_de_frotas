<template>
  <layout>
    <div v-if="$page.props.flash.success"></div>

    <!-- Modal Success -->

    <!-- Modal -->

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastro de Manutenção</h4>
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
          <input type="hidden" v-model="manutencao.id_man" />          
          <br /><br />
          <h4><span style="font-weight: bold">Registro</span></h4><br>
          <div class="row">

            <div class="col-md-4">
              <label for="inputVeiculo">Veículo (modelo / placa)</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-briefcase"></i>
                  </div>
                </div>
                <select id="inputVeiculo" v-model="form.veiculo" class="form-control" name="txtVeiculo">
                  <option selected :value="form.veiculo" style="background-color:gainsboro">{{ form.veiculo }}</option>
                  <option
                    v-for="veiculo in veiculos"
                    :key="veiculo.id"
                    :value="veiculo.nome_modelo + ' / ' + veiculo.placa"
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
                <select id="inputOficina" v-model="form.oficina" class="form-control" name="txtOficina">
                  <option selected :value="form.oficina" style="background-color:gainsboro">{{ form.oficina }}</option>
                  <option
                    v-for="oficina in oficinas"
                    :key="oficina.id"
                    :value="oficina.nome_oficina"
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
                <select id="inputServico" v-model="form.servico" class="form-control" name="txtServico">
                  <option selected :value="form.servico" style="background-color:gainsboro">{{ form.servico }}</option>
                  <option
                    v-for="servico in servicos"
                    :key="servico.id"
                    :value="servico.descricao_servicos"
                  >
                    {{ servico.descricao_servicos }}
                  </option>
                </select>
              </div>
            </div>            
          </div>
          <br />

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
                Alterar
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
    servicos: Array,
    oficinas: Array,
    veiculos: Array,
    manutencao: Array
  },

  data: () => {
    return {
      form: {
        id: null,
        veiculo: null,
        oficina: null,
        servico: null,
        data_manutencao: null,
        custo: null,
        observacao: null,

        preserveState: true,
      },
    };
  },

  created() {
    
    this.form.id = this.$page.props.manutencao[0].id_man,

    this.form.veiculo = this.$page.props.manutencao[0].nome_modelo 
    + ' / ' + this.$page.props.manutencao[0].placa,

    this.form.oficina = this.$page.props.manutencao[0].nome_oficina,
    this.form.servico = this.$page.props.manutencao[0].descricao_servicos,
    this.form.data_manutencao = this.$page.props.manutencao[0].data_manutencao,
    this.form.custo = this.$page.props.manutencao[0].custo_total,
    this.form.observacao = this.$page.props.manutencao[0].observacao    

  },

  methods: {
    sendForm() {
      this.$inertia.post("/manutencao/update/"+this.form.id,
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