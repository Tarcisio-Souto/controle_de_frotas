<template>
  <layout>
    <div class="table-responsive-lg">

      <table id="myTable" class="table table-striped table-bordered table-hover" style="width:100%">
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
            <tr v-for="colab in colabs"
                  :key="colab.us_id"
                  :value="colab.us_id">

                <td>{{ colab.nome_colab }}</td>
                <td>{{ colab.nome_cg }}</td>
                <td>{{ colab.nome_emp }}</td>
                <td>{{ colab.email_inst }}</td>
                <td align="center">
                  <Link :href="'/colaborador/visualizar/'+colab.us_id"><i class="fas fa-eye"></i></Link>
                  <Link :href="'/colaborador/editar/'+colab.us_id"><i class="fas fa-edit"></i></Link>
                  <Link :href="'/colaborador/deletar/'+colab.us_id"><i class="fas fa-trash-alt"></i></Link>
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