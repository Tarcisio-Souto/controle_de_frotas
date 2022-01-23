<template>
  <layout>
    <div v-if="$page.props.flash.success"></div>

    <!-- Modal Success -->

    <!-- Modal -->

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastro de Posto</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form
          v-for="posto in posto"
          :key="posto.id"
          @submit.prevent="sendForm"
          enctype="multipart/form-data"
        >
          <input type="hidden" v-model="posto.id" />        
          <br /><br />
          <h4><span style="font-weight: bold">Dados Cadastrais</span></h4>
          <div class="row">
            <div class="col-md-12">
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
          </div>
          <br /><br />

          <div class="row">
            <div class="col-md-12">
              <!--<Link :href="'/colaborador/update/'+colab.us_id" class="btn btn-success btnAlterar">Alterar</Link>              -->
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
    posto: Array,
  },

  data: () => {
    return {
      form: {
        id: null,
        nome_posto: null,

        preserveState: true,
      },
    };
  },

  created() {
    (this.form.id = this.$page.props.posto[0].id),
      (this.form.nome = this.$page.props.posto[0].nome_posto)      
  },

  methods: {
    sendForm() {
      this.$inertia.post("/posto/update/" + this.form.id, this.form, {
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
      });
    },
  },
};
</script>