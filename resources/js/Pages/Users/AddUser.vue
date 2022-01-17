<template>
  <layout>
    <div v-if="$page.props.flash.success"></div>

    <!-- Modal Success -->

    <!-- Modal -->

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastro de Colaborador</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form @submit.prevent="sendForm" enctype="multipart/form-data">
          <h4><span style="font-weight: bold">Dados Pessoais</span></h4>
          <div class="row">
            <div class="col-md-4">
              <label for="inputNome">Nome</label>
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
            <div class="col-md-4">
              <label for="inputCpf">CPF</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-id-card"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputCpf"
                  class="form-control"
                  placeholder="CPF (só números)"
                  v-model="form.cpf"
                  name="txtCpf"
                  v-mask="'###.###.###-##'"
                />
              </div>
              <div v-for="(erro, cpf) in errors" :key="cpf">
                <div v-if="cpf == 'cpf'">
                  <span v-if="erro != ''" class="errors-label-notification">
                    <i class="fas fa-exclamation-circle"></i>{{ erro }}
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputSexo">Sexo</label>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="exampleRadios"
                    id="inputSexo1"
                    value="m"
                    v-model="form.sexo"
                  />
                  <label class="form-check-label" for="exampleRadios1">
                    Masculino
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="exampleRadios"
                    id="inputSexo2"
                    v-model="form.sexo"
                    value="f"
                  />
                  <label class="form-check-label" for="exampleRadios2">
                    Feminino
                  </label>
                </div>
                </div>                
              </div>
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-md-4">
              <label for="inputIdade">Idade</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-birthday-cake"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputIdade"
                  class="form-control"
                  placeholder="Idade"
                  v-model="form.idade"
                />
              </div>
              <div v-for="(erro, idade) in errors" :key="idade">
                <div v-if="idade == 'idade'">
                  <span v-if="erro != ''" class="errors-label-notification">
                    <i class="fas fa-exclamation-circle"></i>{{ erro }}
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputEmail">Email Particular</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">@</div>
                </div>
                <input
                  type="email"
                  id="inputEmail"
                  class="form-control"
                  placeholder="Email"
                  v-model="form.email_part"
                  name="txtEmailPart"
                />
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputEmailInst">Email Institucional</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">@</div>
                </div>
                <input
                  type="email"
                  id="inputEmailInst"
                  class="form-control"
                  placeholder="Email"
                  v-model="form.email_inst"
                  name="txtEmailInst"
                />
              </div>
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-md-4">
              <label for="inputEmpresa">Empresa</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-building"></i>
                  </div>
                </div>
                <select
                  id="inputEmpresa"
                  class="form-control"
                  v-model="form.empresa"
                  name="txtEmpresa"
                >
                  <option selected>Selecione a empresa</option>
                  <option
                    v-for="empresa in empresas"
                    :key="empresa.id"
                    :value="empresa.id"
                  >
                    {{ empresa.nome }}
                  </option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputCargo">Cargo</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-briefcase"></i>
                  </div>
                </div>
                <select
                  id="inputCargo"
                  class="form-control"
                  v-model="form.cargo"
                  name="txtCargo"
                >
                  <option>Selecione o cargo</option>
                  <option
                    v-for="cargo in cargos"
                    :key="cargo.id"
                    :value="cargo.id"
                  >
                    {{ cargo.nome }}
                  </option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <label for="inputDataAdmissao">Data de Admissão</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                </div>
                <input
                  key=""
                  type="text"
                  id="inputDataAdmissao"
                  class="form-control"
                  v-model="form.data_adm"
                  name="txtDataAdm"
                  v-mask="'##/##/####'"
                />
              </div>
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-md-6">
              <label for="inputCelular">Celular</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-mobile-alt"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputCelular"
                  class="form-control"
                  placeholder="Celular"
                  v-model="form.celular"
                  name="txtCelular"
                  v-mask="['(##) #####-####', '(##) ####-####']"
                />
              </div>
            </div>
            <div class="col-md-6">
              <label for="inputTelRecado">Telefone (recado)</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-phone"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputTelRecado"
                  class="form-control"
                  placeholder="Telefone (recado)"
                  v-model="form.tel_rec"
                  name="txtTelRec"
                  v-mask="['(##) #####-####', '(##) ####-####']"
                />
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
          <h4><span style="font-weight: bold">Senha</span></h4>
          <hr />
          <div class="row">
            <div class="col-md-6">
              <label for="inputSenha">Senha Inicial</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-key"></i>
                  </div>
                </div>
                <input
                  type="password"
                  id="inputSenha"
                  class="form-control"
                  placeholder="Senha"
                  v-model="form.senha"
                  name="txtSenha"
                />
              </div>
              <div v-for="(erro, senha) in errors" :key="senha">
                <div v-if="senha == 'senha'">
                  <span v-if="erro != ''" class="errors-label-notification">
                    <i class="fas fa-exclamation-circle"></i>{{ erro }}
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label for="inputConfirmSenha">Confirme a senha</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-key"></i>
                  </div>
                </div>
                <input
                  type="password"
                  id="inputConfirmSenha"
                  class="form-control"
                  placeholder="Senha"
                  v-model="form.confirm_senha"
                  name="txtConfirmSenha"
                />
              </div>
              <div v-for="(erro, senha) in errors" :key="senha">
                <div v-if="senha == 'senha'">
                  <span v-if="erro != ''" class="errors-label-notification">
                    <i class="fas fa-exclamation-circle"></i>{{ erro }}
                  </span>
                </div>
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
    cargos: Array,
    empresas: Array
  },
  data: () => {
    return {
      form: {
        nome: null,
        cpf: null,
        idade: null,
        sexo: null,
        email_part: null,
        email_inst: null,
        empresa: null,
        cargo: null,
        data_adm: null,
        celular: null,
        tel_rec: null,
        senha: null,
        confirm_senha: null,

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
      this.$inertia.post("/colaborador/registrar", this.form, {
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
              "<span style='font-weight:bold; position: relative; top: 5px;'>Colaborador registrado com sucesso!</span>",
          });

          
          $("#inputNome").val("");
          $("#inputCpf").val("");
          $("#inputConfirmSenha").val("");
          $("#inputSenha").val("");
          $("#inputCep").val("");
          $("#inputEstado").val("");
          $("#inputCidade").val("");
          $("#inputBairro").val("");
          $("#inputNumero").val("");
          $("#inputLogradouro").val("");
          $("#inputTelRecado").val("");
          $("#inputCelular").val("");
          $("#inputDataAdmissao").val("");
          $("#inputCargo").val("");
          $("#inputEmpresa").val("");
          $("#inputIdade").val("");
          $("#inputEmailInst").val("");
          $("#inputEmail").val("");
          $("#inputCpf").val("");
          $("#inputSexo1").prop('checked', false);
          $("#inputSexo2").prop('checked', false);          
          
        },
      });
    },
  },
};
</script>