<template>
  <layout>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Emissão de Relatórios</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />

    <form
      @submit.prevent="sendForm"
      enctype="multipart/form-data"
      id="form-rel-1"
    >
      <p class="legend-rel">
        Relatórios de Trocas de Óleo (por região, período e tipo de infração)
      </p>
      <br />
      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6">
              <div class="form-check">
                <input
                  class="form-check-input position-static"
                  type="checkbox"
                  id="regiao1"
                  value="Tarcisio"
                  aria-label="Tarcisio"
                  v-model="form.regiao1"
                />
                <label class="form-check-label"> Tarcisio ES</label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input position-static"
                  type="checkbox"
                  id="regiao2"
                  value="2"
                  aria-label="Tarcisio"
                  v-model="form.regiao2"
                />
                <label class="form-check-label"> Tarcisio MG </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input position-static"
                  type="checkbox"
                  id="regiao3"
                  value="3"
                  aria-label="Tarcisio RJ"
                  v-model="form.regiao3"
                />
                <label class="form-check-label"> Tarcisio RJ </label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-check">
                <input
                  class="form-check-input position-static"
                  type="checkbox"
                  id="regiao4"
                  value="4"
                  aria-label="Tarcisio SP"
                  v-model="form.regiao4"
                />
                <label class="form-check-label"> Tarcisio SP </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input position-static"
                  type="checkbox"
                  id="regiao5"
                  value="5"
                  aria-label="Tarcisio RJ"
                  v-model="form.regiao5"
                />
                <label class="form-check-label">
                  Tarcisio RJ
                </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input position-static"
                  type="checkbox"
                  id="regiao6"
                  value="6"
                  aria-label="Tarcisio SP"
                  v-model="form.regiao6"
                />
                <label class="form-check-label">
                  Tarcisio SP
                </label>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <label for="inputPeriodoIni">Período</label>
          <div class="row">
            <div class="col-md-5">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                </div>
                <input
                  key=""
                  type="text"
                  id="inputPeriodoIni"
                  class="form-control"
                  v-model="form.periodoIni"
                  name="txtPeriodoIni"
                  v-mask="'##/##/####'"
                  required
                />
              </div>
            </div>
            <div class="col-md-2" align="center">
              <p>até</p>
            </div>
            <div class="col-md-5">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                </div>
                <input
                  key=""
                  type="text"
                  id="inputPeriodoFim"
                  class="form-control"
                  v-model="form.periodoFim"
                  name="txtPeriodoFim"
                  v-mask="'##/##/####'"
                  required
                />
              </div>
            </div>
          </div>
        </div>

        <div class="row row-2-rel-multas">          

          <div class="col-md-12">
            <button type="submit" class="btn btn-success btrGerarRel">
              Gerar Relatório
            </button>
          </div>

        </div>
      </div>
      <br /><br /><br />
      <hr />
    </form>


  </layout>
</template>

<script>
import Layout from "../../Layout.vue";
import { Link } from "@inertiajs/inertia-vue";

export default {
  components: {
    Link,
    Layout,
  },

  props: {
    servicos: Array,
  },

  data: () => {
    return {
      form: {
        regiao1: null,
        regiao2: null,
        regiao3: null,
        regiao4: null,
        regiao5: null,
        regiao6: null,
        periodoIni: null,
        periodoFim: null,

        preserveState: true,
      },
    };
  },

  methods: {
    sendForm() {
      
      window.open(`/trocas-oleo/relatorio1?regiao1=${this.form.regiao1}
      &regiao2=${this.form.regiao2}
      &regiao3=${this.form.regiao3}
      &regiao4=${this.form.regiao4}
      &regiao5=${this.form.regiao5}
      &regiao6=${this.form.regiao6}
      &periodoIni=${this.form.periodoIni}
      &periodoFim=${this.form.periodoFim}`, '_blank');
          
    },
  },
};
</script>