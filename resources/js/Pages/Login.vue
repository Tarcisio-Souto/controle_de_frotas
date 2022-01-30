<template>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form @submit.prevent="sendForm">
                <div class="form-group">
                    <label for="inputCpf">CPF</label>
                    <input type="text" class="form-control"  v-model="form.cpf">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Senha</label>
                    <input type="password" class="form-control" v-model="form.senha">
                </div>
                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>    
</template>

<script>

export default {
  props: {
    errors: Object,
  },
  data: () => {
    return {
      form: {
        senha: null,
        cpf: null,
        
        preserveState: true,
      },
    };
  },
  methods: {
    sendForm() {
      this.$inertia.post("auth", this.form, {
        forceFormData: true,
        preserveScroll: false,
        _token: this.$page.props.csrf_token,
        
      });
    },
  },
};
</script>