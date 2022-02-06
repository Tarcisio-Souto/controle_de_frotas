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

    <form @submit.prevent="sendForm" enctype="multipart/form-data" class="">
      <p class="legend-rel" >Relatórios de Multas (por região, período e tipo de infração)</p>
      <br />
      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6">
              <div class="form-check">
                <input
                  class="form-check-input position-static"
                  type="checkbox"
                  id="blankCheckbox"
                  value="1"
                  aria-label="Vitória Hospitalar"
                  v-model="form.regiao1"
                />
                <label class="form-check-label"> Vitória Hospitalar </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input position-static"
                  type="checkbox"
                  id="blankCheckbox"
                  value="2"
                  aria-label="Vitória Hospitalar"
                  v-model="form.regiao2"
                />
                <label class="form-check-label"> Vitória Hospitalar MG </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input position-static"
                  type="checkbox"
                  id="blankCheckbox"
                  value="3"
                  aria-label="Vitória Hospitalar RJ"
                  v-model="form.regiao3"
                />
                <label class="form-check-label"> Vitória Hospitalar RJ </label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-check">
                <input
                  class="form-check-input position-static"
                  type="checkbox"
                  id="blankCheckbox"
                  value="4"
                  aria-label="Vitória Hospitalar SP"
                  v-model="form.regiao4"
                />
                <label class="form-check-label"> Vitória Hospitalar SP </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input position-static"
                  type="checkbox"
                  id="blankCheckbox"
                  value="5"
                  aria-label="Healthcare Logística RJ"
                  v-model="form.regiao5"
                />
                <label class="form-check-label">
                  Healthcare Logística RJ
                </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input position-static"
                  type="checkbox"
                  id="blankCheckbox"
                  value="6"
                  aria-label="Healthcare Logística SP"
                  v-model="form.regiao6"
                />
                <label class="form-check-label">
                  Healthcare Logística SP
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
                />
              </div>
            </div>
          </div>
        </div>
        
        <div class="row row-2-rel-multas">
            <div class="col-md-6">
              <label for="inputInfracao">Tipos de Infrações</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-briefcase"></i>
                  </div>
                </div>
                <select
                  id="inputInfracao"
                  class="form-control"
                  v-model="form.infracao"
                  name="txtInfracao"
                >
                  <option>Selecione a Infração</option>
                  <option
                    v-for="infracao in infracoes"
                    :key="infracao.id"
                    :value="infracao.id"
                  >
                    {{ infracao.descricao_infracao }}
                  </option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <button type="submit" class="btn btn-success btrGerarRel">
                Gerar Relatório
              </button>
            </div>  

        </div>
      </div>
      <br><br><br><hr>
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
      infracoes: Array,
  },

  data: () => {
    return {
      form: {
        regiao1: null,
        regiao2: null,
        regiao3: null,
        regiao4: null,
        periodoIni: null,

        preserveState: true,
      },
    };
  },
};
</script>