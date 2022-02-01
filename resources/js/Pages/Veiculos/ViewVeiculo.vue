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
        <form v-for="manutencao in manutencao" :key="manutencao.id">          
          <br /><br />
          <h4><span style="font-weight: bold">Registro</span></h4>
          <div class="row">
            <div class="col-md-4">
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
                  :value="manutencao.nome_modelo"
                  disabled
                />
              </div>              
            </div>
            <div class="col-md-4">
              <label for="inputOficina">Oficina</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputOficina"
                  class="form-control"
                  :value="manutencao.nome_oficina"
                  disabled
                />
              </div>              
            </div>
            <div class="col-md-4">
              <label for="inputServico">Serviço</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputServico"
                  class="form-control"
                  :value="manutencao.descricao_servicos"
                  disabled
                />
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
                    <i class="fas fa-birthday-cake"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputDataManutencao"
                  class="form-control"
                  :value="manutencao.data_manutencao"
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
                  :value="manutencao.custo_total"
                  disabled
                />
              </div>              
            </div>
            
            <div class="col-md-4"></div>
            
          </div>

          <br>
          <div class="row">
            <div class="col-md-8">
               <label for="exampleFormControlTextarea1">Observações</label><br>
              <textarea class="form-control" id="exampleFormControlTextarea1" :value="manutencao.observacao" rows="3" disabled></textarea>
            </div>
            <div class="col-md-4"></div>
          </div>

          <br /><br />
          <div class="row">
            <div class="col-md-12">
              <Link :href="'/manutencao/editar/'+manutencao.id_man" class="btn btn-warning">Editar</Link>              
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
    manutencao: Array,
  },
  methods: {
    sendForm() {
      this.$inertia.post("/colaborador/registrar", this.form, {
        forceFormData: true,
        preserveScroll: false,
        _token: this.$page.props.csrf_token,

        
      });
    },
  },
};
</script>