<template  v-if="localStorage.getItem('usertoken')">
<v-container style="text-align: center;background-color:white;">
   <v-row justify="center" style="position: absolute;">
    <v-dialog v-model="dialog" persistent max-width="800px">
      <v-card >
        <v-card-title>
          <span class="headline">Votre Profile</span>
        </v-card-title>
        <v-container>
                     <v-layout flex wrap row>
                      <v-text-field  d-flex lg6 v-model="nom" :rules="nomRules" :counter="4" label="Nom"  required ></v-text-field>
                        <v-flex d-flex lg6>
                           <v-spacer></v-spacer>
                        <v-select  v-model="civilite" :items="select" item-value="select" 
                        label="Civilité" required/>
                      </v-flex>
                    <v-flex d-flex lg6>
                      <v-text-field  v-model="prenom" :rules="prenomRules" label="Prenom" required  />
                    </v-flex>            
                      <v-flex d-flex lg6>
                        <v-spacer></v-spacer>
                        <v-select v-model="filier_id" :items="tabs" item-text="nom" item-value="id" 
                          label="Filiére" required  :placeholder="filier_id"  />
                      </v-flex>
                        <v-flex d-flex lg6>
                          <v-text-field v-model="email"   :rules="emailRules" label="E-mail" required />
                        </v-flex>
                        <v-flex d-flex lg6>
                          <v-spacer></v-spacer>
                          <vue-tel-input v-model="tel" label="Téléphone"  ></vue-tel-input>
                        </v-flex> 
                        <v-flex d-flex lg6>
                          <v-text-field v-model="pay" label="Pays"  />
                          </v-flex>
                           <v-flex d-flex lg6><v-spacer></v-spacer>
                      <v-text-field  v-model="password"
                       :append-icon="showPassword ? 'visibility_off' : 'visibility'"
                       :type="showPassword ? 'text' : 'password'"
                       label="New Password"
                       hint="Please choose a complex one.."
                       :error="error"
                        @click:append="showPassword = !showPassword" />
                    </v-flex>
                        <v-flex d-flex lg6>
                          
                          <v-text-field v-model="ville" label="Ville"  />
                        </v-flex>
                    <v-flex xs12 sm6 md1 />
                      </v-layout>
                      <v-textarea label="adress" rows="1" v-model="adress"  ></v-textarea>
                   
                    
        </v-container>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="dialog = false">Close</v-btn>
          <v-btn color="blue darken-1" text @click="update()">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
  
  <v-hover v-slot:default="{ hover }">
    <v-card
      class="mx-auto"
      color="white lighten-4"
      max-width="350"
      height="400"
    >
      <v-img
        :aspect-ratio="16/9"
        src="static/logo2.svg" 
      >
        <v-expand-transition>
          <div
            v-if="hover"
            class="d-flex transition-fast-in-fast-out primary darken-2 v-card--reveal display-3 white--text"
            style="height: 100%;"
          >
            <div class="display-1 font-weight-left white--text mb-2"><br/><br/>Modifier Votre Profile</div>
          </div>
        </v-expand-transition>
      </v-img>
      <v-card-text
        class="pt-6"
        style="position: relative;"
      >
        <v-btn
          absolute
          color="primary"
          class="ma-2 white--text"
          @click="show()"
          large
          right
          top icon
        >
          <v-icon>edit</v-icon>
        </v-btn>
      
        <div class="font-weight-light grey--text title mb-2">   <v-row
      class="px-4 grey--text"
      align="center"
    >
      <v-avatar
        size="24"
        class="mr-4" 
      >   <v-icon v-if="dat.active==0" color="green">center_focus_strong</v-icon>
      <v-icon v-else color="red">center_focus_strong</v-icon>
      </v-avatar>
    

      <span  v-if="dat.active==0">Admin</span>
      <span  v-else>Super Admin</span>
    </v-row></div>
     <v-divider class="mt-6 mx-4"></v-divider>
        <h3 class="display-1 font-weight-light primary--text mb-2"> {{dat.nom}} {{dat.prenom}}</h3>
        <div class="font-weight-light title mb-2">
          {{dat.email}}<br><br><br>
         {{dat.created_at}}
        </div>
      </v-card-text>
    </v-card>
  </v-hover>
            <!-- snackbar-->
          <v-snackbar v-model="snackbar" :timeout="4000"    :color="color" left>
                <span>{{text}}</span>
                <v-btn flat color="white" @click="snackbar = false" > Fermer </v-btn>
          </v-snackbar>
             <!-- end snackbar-->
  </v-container>
  
</template>
<script>

import axios from 'axios'
import {isAuthentecated } from './helper/auth';
  export default {
   
   data () {

       return {
      snackbar:false,
      password: '',
      showPassword: null,
      dialog: false,
      dat:[],
      emlto:localStorage.getItem('Email'),
      nom:null,
      password:null,
      soso:[],
      id:'',
      prenom:'',
      tel:'',
      pay:'',
      ville:'',
      adress:'',
      email:'',
      civilite:'',
      select:[ 'Mll','M','Mme' ],
      tabs:'',
      filier_id:''
     }},
    mounted(){
      this.refrech();
    },
    methods:{
     refrech()
     {
      
      const email=this.emlto;
      this.axios.post('/api/search',{email}).then(res=>
      {
        this.dat=res.data;
        this.nom=this.dat.nom;
        this.prenom=this.dat.prenom;
        this.email =this.dat.email;
        this.ville=this.dat.ville ;
        this.pay=this.dat.pay;
        this.adress=this.dat.adress;
        this.tel=this.dat.tel;
        this.password=localStorage.getItem('pass') ; 
        this.civilite=this.dat.civilite;
        axios.get('/api/filier/'+this.dat.filier_id).then(res=>
        {
             this.tabs=res.data;
             this.filier_id=this.tabs.nom;
        }
        )
        console.log(this.emlto);
      }).catch(e=>{
        console.log(e);
              })
     },
     update()
     {
        axios.put('/api/admin/'+this.dat.id,{ 
                 
          civilite: this.civilite,
          nom: this.nom,
          prenom: this.prenom,
          filier_id: this.dat.filier_id,
          tel:this.tel,
          email:  this.email,
          password: this.password,
          pay:this.pay,
          ville:this.ville,
          adress:this.adress,
          active:this.dat.active,

        })
       
        .then(response => {
          this.valide=false;
          this.text="la mise à jour du Profile à fait avec sussés";
          this.color="info";
          this.snackbar=true;
          this.dialog=false;
          this.refrech();
        })
        .catch(e => {
          console.log(e);
        });     
        },

     
       show()
       {
         this.dialog=true;
       }
      
      
    
    
    }
  }
</script>