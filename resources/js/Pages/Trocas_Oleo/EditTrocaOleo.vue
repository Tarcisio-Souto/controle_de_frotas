<template>
  <layout>
    <div v-if="$page.props.flash.success"></div>

    <!-- Modal Success -->

    <!-- Modal -->

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Edição de Troca de Óleo</h4>
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
          <input type="hidden" v-model="troca.to_id" />          
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
          <br />

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
                <div class="col-md-12" v-if="troca.filtro_oleo == '1'">
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="inputFiltroOleo1"
                      value="1"
                      v-model="form.filtro_oleo"
                      checked                      
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
                      value="0"
                      v-model="form.filtro_oleo"                  
                    />
                    <label class="form-check-label">
                      Não trocado
                    </label>
                  </div>
                </div>

                <div class="col-md-12" v-else>
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
                      value="0"
                      v-model="form.filtro_oleo"
                      checked                      
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
                <div class="col-md-12" v-if="troca.filtro_combustivel == '1'">
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="inputCombustivel1"
                      value=1
                      v-model="form.filtro_combustivel"
                      checked
                      disabled
                    />
                    <label class="form-check-label">
                      Trocado
                    </label>              
                    <div class="form-check form-check-inline">
                      <input
                        class="form-check-input"
                        type="radio"
                        id="inputCombustivel2"
                        value=0
                        v-model="form.filtro_combustivel"
                        disabled
                      />
                      <label class="form-check-label">
                        Não trocado
                      </label>
                    </div>
                  </div>
                </div>  

                <div class="col-md-12" v-else>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="inputCombustivel1"
                      value=1      
                      v-model="form.filtro_combustivel" 
                    />
                    <label class="form-check-label">
                      Trocado
                    </label>          
                    <div class="form-check form-check-inline">
                      <input
                        class="form-check-input"
                        type="radio"
                        id="inputCombustivel2"
                        value=0
                        v-model="form.filtro_combustivel"
                        checked                        
                      />
                      <label class="form-check-label">
                        Não trocado
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

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
    oficinas: Array,
    veiculos: Array,
    troca: Array
  },

  data: () => {
    return {
      form: {
        id: null,
        veiculo: null,
        oficina: null,
        data_troca: null,
        nome_oleo: null,
        filtro_oleo: null,
        filtro_combustivel: null,
        km_troca: null,
        km_prox_troca: null,
        custo: null,

        preserveState: true,
      },
    };
  },

  created() {
    
    this.form.id = this.$page.props.troca[0].to_id,

    this.form.veiculo = this.$page.props.troca[0].nome_modelo 
    + ' / ' + this.$page.props.troca[0].placa,

    this.form.oficina = this.$page.props.troca[0].nome_oficina,
    this.form.data_troca = this.$page.props.troca[0].data_troca_format,    
    this.form.custo = this.$page.props.troca[0].custo_total,
    this.form.nome_oleo = this.$page.props.troca[0].nome_oleo,
    this.form.filtro_oleo = this.$page.props.troca[0].filtro_oleo,
    this.form.filtro_combustivel = this.$page.props.troca[0].filtro_combustivel,
    this.form.km_troca = this.$page.props.troca[0].km_troca,
    this.form.km_prox_troca = this.$page.props.troca[0].km_prox_troca

  },

  methods: {
    sendForm() {
      this.$inertia.post("/troca-oleo/update/"+this.form.id,
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