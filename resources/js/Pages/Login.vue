<template>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 box-login">
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6" align="center">
                <img src="https://i0.wp.com/www.roteirospe.com/wp-content/uploads/2017/02/SEU-LOGO-AQUI-300x81-1-300x81-1.png?ssl=1" alt="Seu Logo">
                <h4>VH Veículos</h4>

                <div class="error-login" v-for="(erro, login) in errors" :key="login">
                  <div v-if="login == 'login'">
                    <span v-if="erro != ''" class="errors-label-notification">
                      <i class="fas fa-exclamation-circle"></i>{{ erro }}
                    </span>
                  </div>
                </div>


              </div>
              <div class="col-md-3"></div>
            </div>            
            <form @submit.prevent="sendForm" class="form-login">
                <div class="form-group">
                    <label for="inputCpf">CPF</label>
                    <input type="text" class="form-control"  v-model="form.cpf" v-mask="'###.###.###-##'" required>
                </div>
                <div class="form-group">
                    <label for="inputPassword">Senha</label>
                    <input type="password" class="form-control" v-model="form.senha" required>
                </div>
                <button type="submit" class="btn btn-primary btnEntrar">Entrar</button>
            </form>
        </div>
        <div class="col-md-4"></div>
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