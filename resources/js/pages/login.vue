<template>
    <div class="container">
        <div class="card">
            <div class="card-header">Inicio de sesión</div>
            <div class="row">


                <div class="col-md-6 offset-md-3">


                    <form v-on:submit.prevent="onSubmit" style="margin: 25px">

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text"
                                   v-model="email"
                                   class="form-control"
                                   v-bind:class="{ 'is-invalid': errorEmail }"
                                   placeholder="Email">
                            <div class="invalid-feedback">
                                {{ errorEmail }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input v-model="password"
                                   type="password"
                                   class="form-control"
                                   v-bind:class="{ 'is-invalid': errorPassword }"
                                   placeholder="Password">
                            <div class="invalid-feedback">
                                {{ errorPassword }}
                            </div>
                        </div>


                        <button :disabled="loading" type="submit" class="btn btn-secondary">Login</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</template>

<script>
    export default {
        name: "login",
        props: ['app'],
        data()
        {
            return {


                email: '',
                errorEmail: '',

                password: '',
                errorPassword: '',

                loading: false,


                errors: []
            }
        },

        mounted()
        {
            if (this.app.user)
            {
                this.$router.push({name:'home'});
            }
        },

        methods: {
            onSubmit()
            {
                this.errors = [];

                if (!this.email && this.email.length < 6)
                {
                    this.errorEmail = 'Email has to be at least 6 characters long.';
                    this.errors.push(this.errorEmail);
                }
                else
                {
                    this.errorEmail = null;
                }

                if (!this.password && this.password.length < 6)
                {
                    this.errorPassword = 'Password has to be at least 6 characters long.';
                    this.errors.push(this.errorPassword);
                }
                else
                {
                    this.errorPassword = null;
                }


                if (!this.errors.length)
                {
                    this.loading = true;

                    let data = {
                        email: this.email,
                        password: this.password,
                    };

                    this.app.req.post('auth/login', data).then((response) => {

                        this.loading = false;

                        if (response.data.id)
                        {
                            this.app.user = response.data;
                            this.$router.push({
                                name: 'home'
                            });
                        }
                        else if (response.data.error === 401)
                        {
                            this.errorPassword = 'Could not log you in.';
                            this.password = '';
                        }
                    });
                }
            }
        }
    }
</script>

<style scoped>

</style>