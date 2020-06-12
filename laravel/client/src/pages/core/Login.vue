<template>
  <v-app  >
    <v-content>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4 lg4>
            <v-card class="elevation-1 pa-2">
              <v-card-text>
                <div class="layout column align-center">
                  <img src="static/logo.png" width="180" height="180">
                  <h1 class="flex my-4 " style="color:#1b5299;">SEJELNI</h1>
                   <h4 class="flex my-4 " style="text-align:center;color:#1b5290;">Connect - Admin</h4>
                </div>
                <v-form>
                  <v-text-field
                    append-icon="person"
                    name="login"
                    label="Login"
                    type="text"
                    v-model="email"
                    :error="error"
                    :rules="[rules.required]"
                    
                    />
                  <v-text-field
                    :type="hidePassword ? 'password' : 'text'"
                    :append-icon="hidePassword ? 'visibility_off' : 'visibility'"
                    name="password"
                    label="Password"
                    id="password"
                    :rules="[rules.required]"
                    v-model="password"
                    :error="error"
                    @click:append="hidePassword = !hidePassword"/>
                </v-form>
              </v-card-text>
              <v-card-actions style="text-algin:center;" >
                <v-spacer></v-spacer>
                <v-btn  align="center" block color="primary" v-on:click.native="login" :loading="loading" >Login</v-btn>
                
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
      <v-snackbar
        v-model="showResult"
        :timeout="2000"
        top>
        {{ result }}
      </v-snackbar>
    </v-content>
  </v-app>
</template>

<script>
import axios from 'axios';

export default {
  
  data() {
  
    return {
      loading: false,
      ret:0,
      email:'',
      password:'',
      hidePassword: true,
      error: false,
      showResult: false,
      result: '',
      i:0,
      k:0,
      det:[],
      resp:[],
      rules: {
        required: value => !!value || 'Required.'
      },
      component:0,
      
    }
  },
  mounted(){
    this.refresh();
  },
  
  methods: {
  
    refresh()
    {  
      if(component==0)
     { window.location.reload();this.component++;}},
    login() {
            
            const vm =this;
            
            let email = vm.email;
            let password = vm.password;
            localStorage.setItem('Email',vm.email);
            localStorage.setItem('pass',vm.password);
            axios.post('api/auth/login', { email, password })
              .then((res) => {
                 localStorage.setItem('usertoken',true);
                 
                 localStorage.setItem('Admin',true);
                 vm.email=''
                 vm.password=''
                 if(res.data!=0)
                 {
                   this.$router.push({name:'Home'})
                 }
                 else {
                   this.$router.push({name:'Error'})
                 }
                 }
                 )
                .catch((err)=>console.log(err))}
              
    
  }}
  
  
</script>

<style scoped lang="css">
  #login {
    height: 50%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    content: "";
    z-index: 0;
  }

</style>