<template>
  <v-toolbar
    dark
    app
   color="#1b5299" >
   
    <v-toolbar-title >
      <v-toolbar-side-icon @click="toggleNavigationBar"  ></v-toolbar-side-icon>
    </v-toolbar-title>
   
    <v-spacer></v-spacer>
    <!-- partie menu-->
    <v-dialog
      v-model="dialogSettings"
     max-height='100%' max-width='600px' >
      <v-card>
        <v-card-title class="headline"
          primary-title>
         Configuration
        </v-card-title>


        <v-card-text>
         Modifier Votre mot du passe
          <v-form >
            <v-container>
              <v-layout row wrap>

                <v-flex xs12 xs6 md11>
                  <v-text-field
                    v-model="email"
                    hint="email"/>   
                </v-flex>
              
                <v-flex xs12 xs6 md1 />

                <v-flex xs12 sm6 md11>
                  <v-text-field
                    v-model="password"
                    :placeholder="this.password"
                    :append-icon="showPassword ? 'visibility_off' : 'visibility'"
                    :type="showPassword ? 'text' : 'password'"
                    label="Nouveau Mot de Pass "
                    hint="Choisir un mot complexe."
                    :error="error"
                    @click:append="showPassword = !showPassword" />
                </v-flex>

                <v-flex xs12 sm6 md1 />

                <v-flex xs12 sm6 md11>
                  <v-text-field
                    v-model="passwordConfirm"
                    :append-icon="showPasswordConfirm ? 'visibility_off' : 'visibility'"
                    :type="showPasswordConfirm ? 'text' : 'password'"
                    label="Confirmer le neoveau Passe "
                    hint="Confirmer."
                    :error="error"
                    @click:append="showPasswordConfirm = !showPasswordConfirm" />
                </v-flex>

                <v-flex xs12 sm6 md1 />

                <v-flex xs12 xs6 md11>
                  <v-switch
                    label="Email Notification"
                    color="success"
                    v-model="switchEmailNotification" />
                </v-flex>

                <v-flex xs12 xs6 md1 />

              </v-layout>
            </v-container>
          </v-form>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            flat
            @click="setUpSettings()">
            Sauvgarder
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <v-snackbar
      v-model="showResult"
      :timeout="2000"
      top>
      {{ result }}
    </v-snackbar>

   
  

    <v-menu offset-y origin="center center" :nudge-bottom="10" transition="scale-transition">
      <v-btn icon large flat slot="activator"  v-model="dat">
      
        <v-icon>person</v-icon>
     
      </v-btn>
      
      <v-list v-if="isAdmin()">
        <v-list-tile
          v-for="(item,index) in items"
          :key="index"
          :to="!item.href ? { name: item.name } : null"
          :href="item.href"
          ripple="ripple"
          :disabled="item.disabled"
          :target="item.target"
          @click="item.click">
          <v-list-tile-action v-if="item.icon">
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>{{ item.title }}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
      <v-list v-else>
        <v-list-tile
          v-for="(item,index) in tabs"
          :key="index"
          :to="!item.href ? { name: item.name } : null"
          :href="item.href"
          ripple="ripple"
          :disabled="item.disabled"
          :target="item.target"
          @click="item.click">
          <v-list-tile-action v-if="item.icon">
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>{{ item.title }}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-menu>
   
  
  </v-toolbar>
 
</template>
<script>
import axios from 'axios'
export default {
  data() {
    return {
      rating: null,
      dialog: false,
      dialogSettings: false,
      switchEmailNotification: true,
      showPassword: null,
      showPasswordConfirm: null,
      email:localStorage.getItem('Email'),
      password:'', //localStorage.getItem('pass'),
    //  pass:localStorage.setItem('pass'),
      passwordConfirm: null,
      error: false,
      showResult: false,
      non:'',
      result: '',
      emlto:localStorage.getItem('Email'),
      dat:[],
      items: [
        {
          icon: 'account_circle',
          href: '/#/profile',
          title: 'Profile',
          click: (e) => {
          }
        },
        {
          icon: 'settings',
          href: '/#/home',
          title: 'Settings',
          click: () => {
            const vm = this
            
            vm.refrech();
            vm.dialogSettings = true;
          }
        }
      ],
      tabs: [
        {
          icon: 'account_circle',
          href: '/#/profile-Student',
          title: 'Profile',
          click: (e) => {
          }
        },
        {
          icon: 'settings',
          href: '/#/Seting',
          title: 'Settings',
          click: () => {
            const vm = this
            
            vm.refrech();
            vm.dialogSettings = true;
          }
        }
       
      
      ],
      
    }
  },
mounted()
{
   vm.non='S';  
   this.refrech();
 
},  methods: {
    toggleNavigationBar() {
      const vm = this;

      vm.$emit('toggleNavigationBar');
    },
  refrech()
     {
      
      const email=this.emlto;
      this.axios.post('/api/search',{email}).then(res=>
      {
        this.dat=res.data;
     

     this.password=localStorage.getItem('pass') ;   
     
      }).catch(e=>{
        console.log(e);
              })
     },

    setUpSettings() {
      const vm = this;

      if (vm.email === null || vm.password === null || vm.passwordConfirm === null) {

        vm.result = "Email and Password can't be null.";
        vm.showResult = true;

        return;
      }

      if (vm.password !== vm.passwordConfirm) {

        vm.error = true;
        vm.result = "Passwords does not match the confirm password.";
        vm.showResult = true;

        return;
      }
  if(vm.password === vm.passwordConfirm)
       { axios.put('/api/admin/'+this.dat.id,{ 
                 
          civilite: this.dat.civilite,
          nom: this.dat.nom,
          prenom: this.dat.prenom,
          filier_id: this.dat.filier_id,
          tel:this.dat.tel,
          email:  this.email,
          password: this.password,
          pay:this.dat.pay,
          ville:this.dat.ville,
          adress:this.dat.adress,
          active:this.dat.active,

        })
       
        .then(response => {
      vm.$root.email = vm.email;
      vm.$root.password = vm.password;
      
      vm.result = "Email and password changed succesfully.";
      vm.showResult = true;

      vm.dialogSettings = false;
        })
        .catch(e => {
          console.log(e);
        });     
       }
    
    },
        isAdmin()
{  if(localStorage.getItem('Admin'))
    return true;
}
  }
};
</script>