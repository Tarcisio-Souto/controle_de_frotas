<template>
  <layout>
    <div class="table-responsive-lg">
      <table
        id="myTable"
        class="table table-striped table-bordered table-hover"
        style="width: 100%"
      >
        <thead>
          <tr>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Filial</th>
            <th width="25">Email</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="colab in colabs" :key="colab.us_id" :value="colab.us_id">
            <td>{{ colab.nome_colab }}</td>
            <td>{{ colab.nome_cg }}</td>
            <td>{{ colab.nome_emp }}</td>
            <td>{{ colab.email_inst }}</td>
            <td align="center">
              <Link :href="'/colaborador/visualizar/' + colab.us_id"
                ><i class="fas fa-eye"></i
              ></Link>
              <Link :href="'/colaborador/editar/' + colab.us_id"
                ><i class="fas fa-edit"></i
              ></Link>              
              <span
                ><i
                  class="fas fa-trash-alt"
                  @click="sendForm(colab.us_id)"
                ></i
              ></span>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Filial</th>
            <th>Email</th>
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
    colabs: Array,
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
      //:href="'/colaborador/deletar/'+colab.us_id"

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
          "<span style='font-weight:bold; position: relative; top: 5px;'>Deletar usuário?</span>",
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
            v.$inertia.post("/colaborador/deletar/"+id, {
              forceFormData: true,
              preserveScroll: false,
              _token: v.$page.props.csrf_token,
            });

            //var url = '/colaborador/deletar/'+id;
            //window.location.href = url;
            //window.location = '/colaborador/deletar/'+id;
            /*
            $.ajax({
              url: "/colaborador/deletar/" + id,
              method: "GET",
              headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
              },
              success: function () {
                /*window.location.href = '/colaborador/deletar/'+id;
                $( "#myTable" ).load( "/colaboradores/lista #myTable" );
              },
            });*/
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