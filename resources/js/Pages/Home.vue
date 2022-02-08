<template>
  <layout>
    <Head title="Welcome" />
    <div class="row">
      <div class="col-md-12">
        <H1>Bem-vindo!</H1>
        <p>Olá, {{ user }}!</p>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from "../Layout";
import { Head } from "@inertiajs/inertia-vue";

export default {
  components: {
    Head,
    Layout,
  },
  props: {
    user: String,
  },

};
</script>