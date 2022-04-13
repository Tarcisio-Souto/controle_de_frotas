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
        <form v-for="colab in colab" :key="colab.us_id">          
          <br /><br />
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
                  :value="colab.nome_colab"
                  disabled
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
                  :value="colab.cpf"
                  v-mask="'###.###.###-##'"
                  disabled
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
                  <div
                    class="form-check form-check-inline"
                    v-if="colab.sexo == 'm'"
                  >
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="inputSexo1"
                      value="m"
                      checked
                      disabled
                    />
                    <label class="form-check-label" for="exampleRadios1">
                      Masculino
                    </label>
                  </div>
                  <div class="form-check form-check-inline" v-else>
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="inputSexo1"
                      value="m"
                      disabled
                    />
                    <label class="form-check-label" for="exampleRadios1">
                      Masculino
                    </label>
                  </div>

                  <div
                    class="form-check form-check-inline"
                    v-if="colab.sexo == 'f'"
                  >
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="inputSexo2"
                      value="f"
                      checked
                      disabled
                    />
                    <label class="form-check-label" for="exampleRadios2">
                      Feminino
                    </label>
                  </div>
                  <div class="form-check form-check-inline" v-else>
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="inputSexo2"
                      value="f"
                      disabled
                    />
                    <label class="form-check-label" for="exampleRadios1">
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
                  :value="colab.idade"
                  disabled
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
                  :value="colab.email"
                  disabled
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
                  :value="colab.email_inst"
                  disabled
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
                  name="txtEmpresa"
                  disabled
                >
                  <option selected>{{ colab.nome_emp }}</option>
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
                  name="txtCargo"
                  disabled
                >
                  <option>{{ colab.nome_cg }}</option>
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
                  :value="colab.dt_adm_format"
                  v-mask="'##/##/####'"
                  disabled
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
                  v-mask="['(##) #####-####', '(##) ####-####']"
                  :value="colab.celular"
                  disabled
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
                  name="txtTelRec"
                  v-mask="['(##) #####-####', '(##) ####-####']"
                  :value="colab.tel_recado"
                  disabled
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
                  name="txtLogradouro"
                  :value="colab.logradouro"
                  disabled
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
                  name="txtNumero"
                  :value="colab.numero"
                  disabled
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
                  name="txtBairro"
                  :value="colab.bairro"
                  disabled
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
                  name="txtCidade"
                  :value="colab.cidade"
                  disabled
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
                  name="txtEstado"
                  disabled
                >
                  <option selected>{{ colab.uf }}</option>
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
                  name="txtCep"
                  :value="colab.cep"
                  disabled
                />
              </div>
            </div>
          </div>
          <br /><br />
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <Link :href="'/colaborador/editar/'+colab.us_id" class="btn btn-warning">Editar</Link>
              <!--<Link href="" class="btn btn-danger btnDeletar">Deletarr</Link>-->
              
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
    /*cargos: Array,
    empresas: Array*/
    colab: Array,
    foto_colab: String,
  },
  methods: {
    sendForm() {
      this.$inertia.post("/colaborador/registrar", this.form, {
        forceFormData: true,
        preserveScroll: false,
        _token: this.$page.props.csrf_token,

        /*onSuccess: () => {
          bootbox.alert({
            centerVertical: true,
            backdrop: true,
            closeButton: false,
            size: "large",
            title:
              "<img src='https://i0.wp.com/www.roteirospe.com/wp-content/uploads/2017/02/SEU-LOGO-AQUI-300x81-1-300x81-1.png?ssl=1'>",
            message:
              "<i class='fas fa-check-circle' style='color:green'></i>&nbsp&nbsp" +
              "<span style='font-weight:bold; position: relative; top: 5px;'>Colaborador registrado com sucesso!</span>",
          });
                  
          
        },*/
      });
    },
  },
};
</script>