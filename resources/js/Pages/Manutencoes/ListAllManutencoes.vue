<template>
  <layout>
    <div class="table-responsive-lg">

      <Link :href="'/manutencoes/cadastro'" class="btn btn-success btnNovo">Novo</Link>
      <Link :href="'/manutencoes/relatorios'" class="btn btn-success btnRelatorio">
        <i class="fas fa-file-excel fa-sm"></i>Relatórios
      </Link>      

      <table
        id="myTable"
        class="table table-striped table-bordered table-hover"
        style="width: 100%"
      >
        <thead>
          <tr>
            <th>Modelo</th>
            <th>Placa</th>
            <th>Serviço</th>
            <th>Data da Manutenção</th>            
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="manutencao in manutencoes" :key="manutencao.id" :value="manutencao.id">
            <td>{{ manutencao.nome_modelo }}</td>
            <td>{{ manutencao.placa }}</td>
            <td>{{ manutencao.descricao_servicos }}</td>
            <td>{{ manutencao.data_manutencao }}</td>            
            <td align="center">
              <Link :href="'/manutencao/visualizar/' + manutencao.id_man"
                ><i class="fas fa-eye"></i
              ></Link>
              <Link :href="'/manutencao/editar/' + manutencao.id_man"
                ><i class="fas fa-edit"></i
              ></Link>              
              <span
                ><i
                  class="fas fa-trash-alt"
                  @click="sendForm(manutencao.id_man)"
                ></i
              ></span>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <th>Modelo</th>
            <th>Placa</th>
            <th>Serviço</th>
            <th>Data da Manutenção</th>            
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
import { Inertia } from "@inertiajs/inertia";

export default {
  components: {
    Layout,
    Link,
  },
  props: {
    manutencoes: Array,
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
          "<span style='font-weight:bold; position: relative; top: 5px;'>Deletar manutenção?</span>",
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
            v.$inertia.post("/manutencao/deletar/"+id, {
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