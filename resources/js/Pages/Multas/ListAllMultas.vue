<template>
  <layout>
    <div class="table-responsive-lg">
      <Link :href="'/multas/cadastro'" class="btn btn-primary btnNovo"
        >Novo</Link
      >
      <a href="/multas/relatorios" class="btn btn-success btnRelatorio">
        <i class="fas fa-file-excel fa-sm"></i>Relatórios
      </a>

      <Link :href="'/multas/analises'" class="btn btn-info btnAnalises"
        ><i class="fas fa-chart-bar icon-chart"></i>Análises Gráficas</Link
      >
      
      <table
        id="myTable"
        class="table table-striped table-bordered table-hover"
        style="width: 100%"
      >
        <thead>
          <tr>
            <th>Veículo</th>
            <th>Placa</th>
            <th>Empresa</th>
            <th>Tipo de Infração</th>
            <th>Data da Multa</th>
            <th>Valor</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="multa in multas" :key="multa.mul_id" :value="multa.mul_id">
            <td>{{ multa.nome_modelo }}</td>
            <td>{{ multa.placa }}</td>
            <td>{{ multa.nome }}</td>
            <td>{{ multa.descricao_infracao }}</td>
            <td>{{ multa.data_multa }}</td>
            <td>{{ 'R$ ' + multa.custo_total }}</td>
            <td align="center">
              <Link :href="'/multa/visualizar/' + multa.mul_id"
                ><i class="fas fa-eye"></i
              ></Link>
              <Link :href="'/multa/editar/' + multa.mul_id"
                ><i class="fas fa-edit"></i
              ></Link>
              <span
                ><i class="fas fa-trash-alt" @click="sendForm(multa.mul_id)"></i
              ></span>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <th>Veículo</th>
            <th>Placa</th>
            <th>Empresa</th>
            <th>Tipo de Infração</th>
            <th>Data da Multa</th>
            <th>Valor</th>
            <th>Ações</th>
          </tr>
        </tfoot>
      </table>
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


export default {
  components: {
    Layout,
    Link,
  },
  props: {
    multas: Array,
  },

  data: () => {
    return {
      form: {
        id: null,
      },
    };
  },

  methods: {
    sendForm(id) {
      var v = this;

      bootbox.confirm({
        centerVertical: true,
        backdrop: true,
        closeButton: false,
        size: "large",
        title:
          "<img src='https://i0.wp.com/www.roteirospe.com/wp-content/uploads/2017/02/SEU-LOGO-AQUI-300x81-1-300x81-1.png?ssl=1'>",
        message:
          "<i class='fas fa-exclamation-circle' style='color:red'></i></i>&nbsp&nbsp" +
          "<span style='font-weight:bold; position: relative; top: 5px;'>Deletar multa?</span>",
        buttons: {
          cancel: {
            label: '<i class="fa fa-times"></i> Não',
          },
          confirm: {
            className: "btn-danger",
            label: '<i class="fa fa-check"></i> Sim',
          },
        },
        callback: function (result) {
          if (result == true) {
            v.$inertia.post("/multa/deletar/" + id, {
              forceFormData: true,
              preserveScroll: false,
              _token: v.$page.props.csrf_token,
            });
          }
        },
      });
    },
  },
  mounted() {
    $(document).ready(function () {
      $("#myTable").DataTable({
        language: {
          url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
        },
      });
    });
  },
};
</script>