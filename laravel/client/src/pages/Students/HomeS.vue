<template v-if="localStorage.getItem('Usertoken')"  >
  <diV>
  <v-container  fluid grid-list-xl>
    <v-layout row wrap max-height='100%' max-width='600px'>
      
      <v-alert v-if="this.hellos.accept===1"
      border="top"
      type="primary"
      style="display:block; "
      dark
       >
      Votre Dossier a été accepter , posser votre bac dans l'école
      </v-alert>
       <v-alert v-else
      border="top"
      type="primary"
       style="display:block; "
       icon ="event"
      dark
       >
      Votre Dossier a encore de traiter
      </v-alert>
    </v-layout>
    <v-layout row wrap max-height='100px' max-width='200px'>
       <v-alert
      border="top"
      color="red lighten-2"
       style="display:block; "
      dark
       >
      Rester Connecter Pour suivre Votre Dossier 
      </v-alert>
      <v-alert
      border="top"
      type="error"
       style="display:block; "
      dark
      >
      Si vous Etes Accepter en va t'appeler 
     </v-alert>
    </v-layout>
     

  </v-container>

  </diV>
</template>

<script>
import axios from 'axios';
import {isUser } from '../helper/auth';
export default {
  
  data() { 
    const globalVar = 0;
    return {
      componentKey:globalVar,
      email:localStorage.getItem('email'),
      hellos:[]
    }
  },
  mounted()
   {
        this.getF();
        this.condidat();
        
   },
  methods:{
    condidat()
    {
             const email = this.email;
            
            this.axios.post('api/recherche',{email})
              .then(res => {
                   this.hellos=res.data;
                  
                   
                 }
                 )
                .catch((err)=>console.log(err));
                 
              
    },
    getF(){
     
     if(componentKey==0)
     { window.location.reload();this.componentKey++;}
    },
    
  }
}
</script>

<style>

</style>