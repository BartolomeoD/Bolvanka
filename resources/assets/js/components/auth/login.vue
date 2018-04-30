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
								<input type="text" v-model="name.value" required class="form-control" 
								v-bind:class="{'is-invalid' : name.hasError}" id="exampleInputEmail1" 
								aria-describedby="emailHelp" placeholder="Enter email">
								<div class="invalid-feedback">{{name.errorMessage}}</div>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Пароль</label>
								<input type="password" v-model="password.value" required class="form-control" 
								v-bind:class="{'is-invalid' : password.hasError }" id="exampleInputPassword1" 
								placeholder="Password">
								<div class="invalid-feedback">{{password.errorMessage}}</div>
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
        value: "",
        errorMessage: ""
      },
      password: {
        hasError: false,
        value: "",
        errorMessage: ""
      },
      remember_me: false
    };
  },
  methods: {
    login: function(e) {
		this.password.errorMessage = "";
		this.password.hasError=false;
		this.name.errorMessage = "";
		this.name.hasError=false;
      e.preventDefault();
      let correct = true;
      if (this.name.value.length < 1) {
        console.log("not correct name");
        this.name.hasError = true;
        this.name.errorMessage = "Не правильный логин";
      }
      if (this.password.value.length < 6) {
        console.log("not correct password");
        this.password.hasError = true;
        this.password.errorMessage = "Не правильный пароль";
      }

      if (!this.name.hasError && !this.password.hasError) {
        Axios.post("/api/auth/login", {
          name: this.name.value,
          password: this.password.value
        })
          .then(function(response) {
            console.log(response);
          })
          .then(function(error) {
            console.log(error);
          });
      }
    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
