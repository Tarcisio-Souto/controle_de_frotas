<template>
  <layout>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Análises Gráficas</h4>
      </div>
      <div class="col-md-4"></div>
    </div>
    <hr />
    <br />
    <div class="row topic-chart">
        <div class="col-md-4">
            <p>Ocorrência de Infrações</p>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <GChart
          type="PieChart"
          :settings="{ packages: ['corechart'] }"
          :data="chartData"
          :options="chartOptions.chart"
        />
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from "../../Layout.vue";
import { Link } from "@inertiajs/inertia-vue";
import { GChart } from "vue-google-charts";

export default {
  //https://github.com/devstark-com/vue-google-charts

  components: {
    Layout,
    Link,
    GChart,
  },

  props: {
      infracoes: Array
  },

  data() {
    return {
      
      chartData: [

        ["", "Infrações"],
        [this.infracoes[0].descricao_infracao, this.infracoes[0].qtd],
        [this.infracoes[1].descricao_infracao, this.infracoes[1].qtd],
        [this.infracoes[2].descricao_infracao, this.infracoes[2].qtd],
        [this.infracoes[3].descricao_infracao, this.infracoes[3].qtd],
        [this.infracoes[4].descricao_infracao, this.infracoes[4].qtd],
        [this.infracoes[5].descricao_infracao, this.infracoes[5].qtd],
        [this.infracoes[6].descricao_infracao, this.infracoes[6].qtd],
        [this.infracoes[7].descricao_infracao, this.infracoes[7].qtd],
        [this.infracoes[8].descricao_infracao, this.infracoes[8].qtd],

      ],

      chartOptions: {
        chart: {          
          pieHole: 0.1,
          height: 500,
          is3D: true
        }
      }
    };
  }
};
</script>