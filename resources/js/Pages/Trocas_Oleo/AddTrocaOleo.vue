<template>
  <layout>
    <div v-if="$page.props.flash.success"></div>

    <!-- Modal Success -->

    <!-- Modal -->

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastrar Trocas Óleo</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form @submit.prevent="sendForm" enctype="multipart/form-data" id="formAddTrocaOleo">
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
                  <option>Selecione a Oficina</option>
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
              <label for="inputDataTroca">Data da Troca</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                </div>
                <input
                  key=""
                  type="text"
                  id="inputDataTroca"
                  class="form-control"
                  v-model="form.data_troca"
                  name="txtDataTroca"
                  v-mask="'##/##/####'"
                />
              </div>
            </div>
          </div>
          
          <br>
          <div class="row">

            <div class="col-md-4">
              <label for="inputNomeOleo">Nome do Óleo</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-id-card"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputNomeOleo"
                  class="form-control"
                  v-model="form.nome_oleo"
                  name="txtNomeOleo"
                />
              </div>
            </div> 

            <div class="col-md-4">
              <label for="inputFiltroOleo">Filtro de Óleo</label>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    id="inputFiltroOleo1"
                    value="1"
                    v-model="form.filtro_oleo"
                  />
                  <label class="form-check-label">
                    Trocado
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    id="inputFiltroOleo2"
                    v-model="form.filtro_oleo"
                    value="0"
                  />
                  <label class="form-check-label">
                    Não trocado
                  </label>
                </div>
                </div>                
              </div>
            </div>

            <div class="col-md-4">
              <label for="inputCombustivel">Filtro de Combustível</label>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    id="inputCombustivel1"
                    value="1"
                    v-model="form.filtro_combustivel"
                  />
                  <label class="form-check-label">
                    Trocado
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    id="inputCombustivel2"
                    v-model="form.filtro_combustivel"
                    value="0"
                  />
                  <label class="form-check-label">
                    Não trocado
                  </label>
                </div>
                </div>                
              </div>
            </div>

          </div>
          <br>
          <div class="row">
            
            <div class="col-md-4">
              <label for="inputKmTroca">KM Troca</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-id-card"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputKmTroca"
                  class="form-control"
                  v-model="form.km_troca"
                  name="txtKmTroca"
                />
              </div>
            </div> 

            <div class="col-md-4">
              <label for="inputKmProxTroca">KM Próxima Troca</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-id-card"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputKmProxTroca"
                  class="form-control"
                  v-model="form.km_prox_troca"
                  name="txtKmProxTroca"
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
          
          </div>   
          <br>
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
    oficinas: Array,
    veiculos: Array
  },
  data: () => {
    return {
      form: {
        veiculo: null,
        oficina: null,
        nome_oleo: null,
        data_troca: null,
        custo: null,
        km_troca: null,
        km_prox_troca: null,
        filtro_oleo: null,
        filtro_combustivel: null,
        
      },
    };
  },
  methods: {
    sendForm() {

      var aux_veiculo = this.form.veiculo;
      var aux_oficina = this.form.oficina;
      var aux_nome_oleo = this.form.nome_oleo;
      var aux_data_troca = this.form.data_troca;
      var aux_custo = this.form.custo;
      var aux_km_troca = this.form.km_troca;
      var aux_km_prox_troca = this.form.km_prox_troca;
      //var aux_filtro_oleo = this.form.filtro_oleo;
      //var aux_filtro_combustivel = this.form.filtro_combustivel;

      this.$inertia.post("/trocas-oleo/registrar", this.form, {
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
              "<span style='font-weight:bold; position: relative; top: 5px;'>Troca de Óleo registrada com sucesso!</span>",
          });
  
           $('#formAddTrocaOleo').reset();
          
        },

        onError: () => {

          $("#inputVeiculo").val(aux_veiculo);
          $("#inputOficina").val(aux_oficina);
          $("#inputDataTroca").val(aux_data_troca);
          $("#inputNomeOleo").val(aux_nome_oleo);

          //$("#inputFiltroOleo1").prop('checked', false);
          //$("#inputFiltroOleo2").prop('checked', false);
          //$("#inputCombustivel1").prop('checked', false);
          //$("#inputCombustivel2").prop('checked', false);
          $("#inputKmTroca").val(aux_km_troca);
          $("#inputKmProxTroca").val(aux_km_prox_troca);
          $("#inputCusto").val(aux_custo);


        },

      });
    },
  },
};
</script>