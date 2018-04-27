<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Авторизация</h3>
                    </div>
                    <div class="card-body">
                        <form v-on:submit="login">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Логин</label>
                                <input type="text" v-model="name.value" required class="form-control" v-bind:class="{'is-invalid' : name.hasError}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Пароль</label>
                                <input type="password" v-model="password.value" required class="form-control" v-bind:class="{'is-invalid' : password.hasError }" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" v-model="remember_me" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data: function() {
    return {
      name: {
        hasError: false,
        value: ""
      },
      password: {
        hasError: false,
        value: ""
      },
      remember_me: false
    };
  },
  methods: {
    login: function(e) {
      e.preventDefault();
      let correct = true;
      if (this.name.value.length < 1) {
        console.log("not correct name");
        this.name.hasError = true;
      }
      if (this.password.value.length < 7) {
        console.log("not correct password");
        this.password.hasError = true;
      }

      if (!this.name.hasError && !this.password.hasError) {
        console.log("success");
      }
    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
