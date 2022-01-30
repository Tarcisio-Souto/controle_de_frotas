<template>
  <layout>
    <div v-if="$page.props.flash.success"></div>

    <!-- Modal Success -->

    <!-- Modal -->

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastro de Troca de Óleo</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form v-for="troca in troca" :key="troca.to_id">          
          <br /><br />
          
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
                  name="txtVeiculo"
                  disabled
                >
                  <option selected>{{ troca.nome_modelo + ' / ' + troca.placa }}</option>
                </select>
              </div>
              
            </div>
            
            <div class="col-md-4">
              <label for="inputOficina">Oficina</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-building"></i>
                  </div>
                </div>
                <select
                  id="inputOficina"
                  class="form-control"
                  name="txtOficina"
                  disabled
                >
                  <option selected>{{ troca.nome_oficina }}</option>
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
                  name="txtDataTroca"
                  :value="troca.data_troca_format"
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
                  :value="troca.nome_oleo"
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
                      checked
                      disabled
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
                      disabled
                    />
                    <label class="form-check-label">
                      Não trocado
                    </label>
                  </div>
                </div>

                <div class="col-md-12" v-else-if="troca.filtro_oleo == '0'">
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="inputFiltroOleo1"
                      value="1"                      
                      disabled
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
                      checked
                      disabled
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
                        disabled
                      />
                      <label class="form-check-label">
                        Não trocado
                      </label>
                    </div>
                  </div>
                </div>  

                <div class="col-md-12" v-if="troca.filtro_combustivel == '0'">
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      id="inputCombustivel1"
                      value=1                      
                      disabled
                    />
                    <label class="form-check-label">
                      Trocado
                    </label>
                    &nbsp&nbsp&nbsp          
                    <div class="form-check form-check-inline">
                      <input
                        class="form-check-input"
                        type="radio"
                        id="inputCombustivel2"
                        value=0
                        checked
                        disabled
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
                  :value="troca.km_troca"
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
                  :value="troca.km_prox_troca"
                  name="txtKmProxTroca"
                  disabled
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
                  :value="troca.custo_total"
                  name="txtCusto"
                  disabled                  
                />
              </div>
            </div>             
          
          </div>   
          <br>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4" align="right">
              <Link :href="'/troca-oleo/editar/'+troca.to_id" class="btn btn-warning">Editar</Link>
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
    troca: Array,
  },
  methods: {
    sendForm() {
      /*this.$inertia.post("/abastecimento/registrar", this.form, {
        forceFormData: true,
        preserveScroll: false,
        _token: this.$page.props.csrf_token,

        
      });*/
    },
  },
};
</script>