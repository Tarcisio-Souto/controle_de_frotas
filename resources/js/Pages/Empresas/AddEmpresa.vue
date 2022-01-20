<template>
  <layout>
    <div v-if="$page.props.flash.success"></div>

    <!-- Modal Success -->

    <!-- Modal -->

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastro de Empresa</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form @submit.prevent="sendForm" enctype="multipart/form-data">
          <h4><span style="font-weight: bold">Dados Cadastrais</span></h4>
          <div class="row">
            <div class="col-md-6">
              <label for="inputNome">Empresa</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputNome"
                  class="form-control"
                  placeholder="Nome"
                  v-model="form.nome"
                />
              </div>
              <div v-for="(erro, nome) in errors" :key="nome">
                <div v-if="nome == 'nome'">
                  <span v-if="erro != ''" class="errors-label-notification">
                    <i class="fas fa-exclamation-circle"></i>{{ erro }}
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label for="inputCpf">CNPJ</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-id-card"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputCnpj"
                  class="form-control"
                  v-model="form.cnpj"
                  name="txtCnpj"
                  v-mask="'##.###.###/####-##'"
                />
              </div>
              <div v-for="(erro, cnpj) in errors" :key="cnpj">
                <div v-if="cnpj == 'cnpj'">
                  <span v-if="erro != ''" class="errors-label-notification">
                    <i class="fas fa-exclamation-circle"></i>{{ erro }}
                  </span>
                </div>
              </div>
            </div>
          </div>

          <br /><br />
          <h4><span style="font-weight: bold">Endereço</span></h4>
          <hr />
          <br />
          <div class="row">
            <div class="col-md-6">
              <label for="inputLogradouro">Logradouro</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-road"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputLogradouro"
                  class="form-control"
                  placeholder="Rua, Av., Rod."
                  v-model="form.logradouro"
                  name="txtLogradouro"
                />
              </div>
            </div>
            <div class="col-md-2">
              <label for="inputNumero">Número</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">Nº</div>
                </div>
                <input
                  type="text"
                  id="inputNumero"
                  class="form-control"
                  placeholder="Número"
                  v-model="form.numero"
                  name="txtNumero"
                />
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputBairro">Bairro</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-home"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputBairro"
                  class="form-control"
                  placeholder="Informe o bairro"
                  v-model="form.bairro"
                  name="txtBairro"
                />
              </div>
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-md-4">
              <label for="inputCidade">Cidade</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-city"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputCidade"
                  class="form-control"
                  placeholder="Informe a cidade"
                  v-model="form.cidade"
                  name="txtCidade"
                />
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputEstado">Estado</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-flag"></i>
                  </div>
                </div>
                <select
                  id="inputEstado"
                  class="form-control"
                  v-model="form.estado"
                  name="txtEstado"
                >
                  <option selected>Selecione o estado</option>
                  <option value="Acre">Acre</option>
                  <option value="Alagoas">Alagoas</option>
                  <option value="Amapá">Amapá</option>
                  <option value="Amazonas">Amazonas</option>
                  <option value="Bahia">Bahia</option>
                  <option value="Ceará">Ceará</option>
                  <option value="Distrito Federal">Distrito Federal</option>
                  <option value="Espírito Santo">Espírito Santo</option>
                  <option value="Goiás">Goiás</option>
                  <option value="Maranhão">Maranhão</option>
                  <option value="Mato Grosso">Mato Grosso</option>
                  <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                  <option value="Minas Gerais">Minas Gerais</option>
                  <option value="Pará">Pará</option>
                  <option value="Paraíba">Paraíba</option>
                  <option value="Paraná">Paraná</option>
                  <option value="Pernambuco">Pernambuco</option>
                  <option value="Piauí">Piauí</option>
                  <option value="Rio de Janeiro">Rio de Janeiro</option>
                  <option value="Rio Grande do Norte">
                    Rio Grande do Norte
                  </option>
                  <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                  <option value="Rondônia">Rondônia</option>
                  <option value="Roraima">Roraima</option>
                  <option value="Santa Catarina">Santa Catarina</option>
                  <option value="São Paulo">São Paulo</option>
                  <option value="Sergipe">Sergipe</option>
                  <option value="Tocantins">Tocantins</option>
                  <option value="Estrangeiro">Estrangeiro</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputCep">CEP</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">CEP</div>
                </div>
                <input
                  type="text"
                  id="inputCep"
                  class="form-control"
                  placeholder="Informe o CEP"
                  v-model="form.cep"
                  name="txtCep"
                />
              </div>
            </div>
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
  },
  data: () => {
    return {
      form: {
        nome: null,
        cnpj: null,        

        logradouro: null,
        numero: null,
        bairro: null,
        cidade: null,
        estado: null,
        cep: null,
        preserveState: true,
      },
    };
  },
  methods: {
    sendForm() {
      this.$inertia.post("/empresas/registrar", this.form, {
        forceFormData: true,
        preserveScroll: false,
        _token: this.$page.props.csrf_token,
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
              "<span style='font-weight:bold; position: relative; top: 5px;'>Empresa registrada com sucesso!</span>",
          });

          
          $("#inputNome").val("");
          $("#inputCnpj").val("");
          
          $("#inputCep").val("");
          $("#inputEstado").val("");
          $("#inputCidade").val("");
          $("#inputBairro").val("");
          $("#inputNumero").val("");
          $("#inputLogradouro").val("");
                  
          
        },
      });
    },
  },
};
</script>