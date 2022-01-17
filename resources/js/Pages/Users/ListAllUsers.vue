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
              <span><i class="fas fa-trash-alt" @click="sendForm(colab.us_id)"></i></span>
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
        id: null
      },
    };
  },

  methods: {

  /*
    sendForm() {

      //this.$inertia.get("/colaborador/deletar/"+id);

      this.$inertia.get("/colaborador/deletar/"+id, {
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
              "<img src='http://denuncia.vitoriahospitalar.com.br/dist/logo.png?343b76e5e3d8038a9c8e00e61671535e'>",
            message:
              "<i class='fas fa-check-circle' style='color:green'></i>&nbsp&nbsp" +
              "<span style='font-weight:bold; position: relative; top: 5px;'>Colaborador registrado com sucesso!</span>",
          });
                  
          
        },
      });



      
    },*/

    sendForm(id) {
      //:href="'/colaborador/deletar/'+colab.us_id"

      bootbox.confirm({
        centerVertical: true,
        backdrop: true,
        closeButton: false,
        size: "large",
        title:
          "<img src='http://denuncia.vitoriahospitalar.com.br/dist/logo.png?343b76e5e3d8038a9c8e00e61671535e'>",
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

            $.ajax({
              type: 'get',
              headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
              },
              url: "/colaborador/deletar/"+id,
              /*success: function (result) {
                $('#resultadoPesq').html(result);
            },
            error: function () {
                $('#resultadoPesq').html("Nenhum resultado encontrado.");
            }*/
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