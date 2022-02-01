<template>
  <layout>
    <div v-if="$page.props.flash.success"></div>

    <!-- Modal Success -->

    <!-- Modal -->

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Atualização de Multa</h4>
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
          <input type="hidden" v-model="multa.mul_id" />          
          <br /><br />
          <h4><span style="font-weight: bold">Registro</span></h4><br>
          <div class="row">

            <div class="col-md-6">
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

            <div class="col-md-6">
              <label for="inputPosto">Tipos de Infrações</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-briefcase"></i>
                  </div>
                </div>
                <select
                  id="inputInfracoes"
                  class="form-control"
                  v-model="form.infracao"
                  name="txtPosto"
                >
                  <option selected :value="form.infracao" style="background-color:gainsboro">{{ form.infracao }}</option>
                  <option
                    v-for="infracao in infracoes"
                    :key="infracao.id"
                    :value="infracao.descricao_infracao"
                  >
                    {{ infracao.descricao_infracao }}
                  </option>
                </select>
              </div>
            </div>  
          </div>
          <br />

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
    infracoes: Array,
    veiculos: Array,
    multa: Array
  },

  data: () => {
    return {
      form: {
        id: null,
        veiculo: null,
        infracao: null,
        data_multa: null,
        custo: null,

        preserveState: true,
      },
    };
  },

  created() {
    
    this.form.id = this.$page.props.multa[0].mul_id,

    this.form.veiculo = this.$page.props.multa[0].nome_modelo 
    + ' / ' + this.$page.props.multa[0].placa,

    this.form.infracao = this.$page.props.multa[0].descricao_infracao,
    this.form.data_multa = this.$page.props.multa[0].data_multa,    
    this.form.custo = this.$page.props.multa[0].custo_total    

  },

  methods: {
    sendForm() {
      this.$inertia.post("/multa/update/"+this.form.id,
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
                "<img src='http://denuncia.vitoriahospitalar.com.br/dist/logo.png?343b76e5e3d8038a9c8e00e61671535e'>",
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