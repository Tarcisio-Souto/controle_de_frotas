<template>
  <layout>
    <div v-if="$page.props.flash.success"></div>

    <!-- Modal Success -->

    <!-- Modal -->

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastro de Multa</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form v-for="multa in multa" :key="multa.mul_id">          
          <br /><br />
          <h4><span style="font-weight: bold">Registro</span></h4>
          <div class="row">
            <div class="col-md-6">
              <label for="inputVeiculo">Veículo (modelo / placa)</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputVeiculo"
                  class="form-control"
                  :value="multa.nome_modelo"
                  disabled
                />
              </div>              
            </div>
            <div class="col-md-6">
              <label for="inputInfracao">Tipo de Infração</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputInfracao"
                  class="form-control"
                  :value="multa.descricao_infracao"
                  disabled
                />
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
                    <i class="fas fa-birthday-cake"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputDataMulta"
                  class="form-control"
                  :value="multa.data_multa"
                  disabled
                />
              </div>              
            </div>

            <div class="col-md-4">
              <label for="inputCusto">Custo</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-birthday-cake"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputCusto"
                  class="form-control"
                  :value="multa.custo_total"
                  disabled
                />
              </div>              
            </div>            

            <div class="col-md-4">
              <Link :href="'/multa/editar/'+multa.mul_id" class="btn btn-warning">Editar</Link>              
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
    multa: Array,
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