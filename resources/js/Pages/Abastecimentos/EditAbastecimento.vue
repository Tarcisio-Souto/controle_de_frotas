<template>
  <layout>
    <div v-if="$page.props.flash.success"></div>

    <!-- Modal Success -->

    <!-- Modal -->

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastro de Abastecimento</h4>
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
          <input type="hidden" v-model="abastecimento.id" />          
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
              <label for="inputPosto">Posto</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-briefcase"></i>
                  </div>
                </div>
                <select
                  id="inputPosto"
                  class="form-control"
                  v-model="form.posto"
                  name="txtPosto"
                >
                  <option selected :value="form.posto" style="background-color:gainsboro">{{ form.posto }}</option>
                  <option
                    v-for="posto in postos"
                    :key="posto.id"
                    :value="posto.nome_posto"
                  >
                    {{ posto.nome_posto }}
                  </option>
                </select>
              </div>
            </div>  
          </div>
          <br />

          <div class="row">
            
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
              <label for="inputDataAbastecimento">Data do Abastecimento</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                </div>
                <input
                  key=""
                  type="text"
                  id="inputDataAbastecimento"
                  class="form-control"
                  v-model="form.data_abastecimento"
                  name="txtDataAbastecimento"
                  v-mask="'##/##/####'"
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
    postos: Array,
    veiculos: Array,
    abastecimento: Array
  },

  data: () => {
    return {
      form: {
        id: null,
        veiculo: null,
        posto: null,
        data_abastecimento: null,
        custo: null,

        preserveState: true,
      },
    };
  },

  created() {
    
    this.form.id = this.$page.props.abastecimento[0].id_ab,

    this.form.veiculo = this.$page.props.abastecimento[0].nome_modelo 
    + ' / ' + this.$page.props.abastecimento[0].placa,

    this.form.posto = this.$page.props.abastecimento[0].nome_posto,
    this.form.data_abastecimento = this.$page.props.abastecimento[0].data_abastecimento,    
    this.form.custo = this.$page.props.abastecimento[0].custo_total    

  },

  methods: {
    sendForm() {
      this.$inertia.post("/abastecimento/update/"+this.form.id,
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