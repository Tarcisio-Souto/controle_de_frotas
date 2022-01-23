<template>
  <layout>
    <div v-if="$page.props.flash.success"></div>

    <!-- Modal Success -->

    <!-- Modal -->

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastro de Oficina</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-12">
        <form v-for="oficina in oficina" :key="oficina.id">          
          <br /><br />
          <h4><span style="font-weight: bold">Dados Cadastrais</span></h4>
          <div class="row">
            <div class="col-md-12">
              <label for="inputNome">Oficina</label>
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
                  :value="oficina.nome_oficina"
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
          </div>
          <br /><br />
          <div class="row">
            <div class="col-md-12">
              <Link :href="'/oficina/editar/'+oficina.id" class="btn btn-warning">Editar</Link>
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
    oficina: Array,
  },
  methods: {
    sendForm() {
      this.$inertia.post("/oficina/registrar", this.form, {
        forceFormData: true,
        preserveScroll: false,
        _token: this.$page.props.csrf_token,
      });
    },
  },
};
</script>