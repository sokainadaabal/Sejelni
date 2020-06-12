<template v-if="localStorage.getItem('usertoken')">
<div>
    <div class="bar"> 
             <!--container -->  
          <div class="container "  >
            <div class="text-center" style="text-align: end; "> 
               <!--Button -->        
              <div class="my-2">
                
                  <!--button pour importer data table -->
                  <v-btn color="error"   icon fa x-small dark @click="importD()" v-if="this.hellos.active!=0">
                    <v-icon>cloud_upload</v-icon>
                 </v-btn>
                  <!--end -->
                  <!--Explore data table -->
                  <v-btn color="warning" icon fa  dark  >
                      <download-excel :data   = "items"  name = "Admin.xls">
                        <v-icon>cloud_download</v-icon>
                      </download-excel>
                  </v-btn>
                  <!--Actualiser d'ata table -->
                  <v-btn color="success" @click.prevent=" reload()" @actualise="snackbar=true" icon fa x-large dark href="/#/administrateur">
                    <v-icon>autorenew</v-icon>
                  </v-btn>
                  <!--end -->
                  <!--Ajouter un data -->
                  <v-btn color="primary"   icon fa large dark @click=" add()" v-if="this.hellos.active!=0" >
                    <v-icon>person_add</v-icon>
                  </v-btn>
              </div>
            </div>
             <!--Data  table pour super Admin -->
            <v-data-table :headers="headers" :items="items" :pagination.sync= "pagination" :total-items="totalItems" 
             :loading="loading" :rows-per-page-items="[5,10,15]"
             class="elevation-1 font-weight-bold" v-if="this.hellos.active!=0"
             >
               <!--progress faire pour dire que la table est encours de télécharger -->
               <v-progress-linear slot="progress" color="blue" indeterminate></v-progress-linear>
               <!--rows tables -->
               <template v-slot:items="props" > 
                  <td class="text-center "> {{ props.item.id }}</td>
                  <td class="text-center ">    
                             <v-avatar class="accent white--text  headline" small
                                v-text="(props.item.nom.slice(0, 1)+
                                props.item.prenom.slice(0, 1))
                                .toUpperCase()"
                             ></v-avatar>
                  </td>
                  <td class="text-center">{{ props.item.civilite }}</td>
                  <td class="text-center">{{ props.item.nom  }}</td>
                  <td class="text-center">{{ props.item.prenom }}</td>
                  <td class="text-center">{{ props.item.email }}</td>
                  <td class="text-center">{{ props.item.tel}}</td> 
                  <td class="justify-content-left layout " >
                      <!-- pour les actions -->
                             <!-- show -->
                            <v-btn icon  @click="show(props.item.id)" >
                                 <v-icon color="red" small >visibility</v-icon>
                            </v-btn>
                             <!--edit -->
                            <v-btn icon >
                                <v-icon color="blue" small @click="edite(props.item.id)" >edit</v-icon>
                            </v-btn>
                             <!--delete -->
                            <v-btn icon @click="deleteUser(props.item.id)" >
                                <v-icon color="pink" small>delete</v-icon>
                            </v-btn>
                  </td>
                </template>
                 <!--si il ya probleme  -->
                <template slot="no-data" >
                  <div style="text-align: center; font-weight: bold; font-size: larger;" >
                     <v-text >Erreur  </v-text>   
                     <v-btn color="success" @click.prevent=" reload()" icon fa x-large dark href="/#/administrateur">
                         <v-icon>autorenew</v-icon>
                     </v-btn>
                  </div>
                </template>
            </v-data-table>
             <!-- end data table -->
              <!--Data  table pour  Admin -->
            <v-data-table :headers="header" :items="items" :pagination.sync= "pagination" :total-items="totalItems" 
             :loading="loading" :rows-per-page-items="[5,10,15]"
             class="elevation-1 font-weight-bold" v-else
             >
               <!--progress faire pour dire que la table est encours de télécharger -->
               <v-progress-linear slot="progress" color="blue" indeterminate></v-progress-linear>
               <!--rows tables -->
               <template v-slot:items="props" > 
                  <td class="text-center "> {{ props.item.id }}</td>
                  <td class="text-center ">    
                             <v-avatar class="accent white--text  headline" small
                                v-text="(props.item.nom.slice(0, 1)+
                                props.item.prenom.slice(0, 1))
                                .toUpperCase()"
                             ></v-avatar>
                  </td>
                  <td class="text-center">{{ props.item.civilite }}</td>
                  <td class="text-center">{{ props.item.nom  }}</td>
                  <td class="text-center">{{ props.item.prenom }}</td>
                  <td class="text-center">{{ props.item.email }}</td>
                  <td class="text-center">{{ props.item.tel}}</td> 
              
                </template>
                 <!--si il ya probleme  -->
                <template slot="no-data" >
                  <div style="text-align: center; font-weight: bold; font-size: larger;" >
                     <v-text >Erreur  </v-text>   
                     <v-btn color="success" @click.prevent=" reload()" icon fa x-large dark href="/#/administrateur">
                         <v-icon>autorenew</v-icon>
                     </v-btn>
                  </div>
                </template>
            </v-data-table>
          </div>
            <!--end container -->
            <!-- snackbar-->
          <v-snackbar v-model="snackbar" :timeout="4000"    :color="color" left>
                <span>{{text}}</span>
                <v-btn flat color="white" @click="snackbar = false" > Fermer </v-btn>
          </v-snackbar>
             <!-- end snackbar-->
             <!--for delete-->
           <v-dialog v-model="delet" max-width="290">
                   <v-card>
                     <v-card-title class="headline">
                       Sur Vous voulez Supprimer ce Admin?
                     </v-card-title>

                     <v-card-text>
                       Faire attention lorsque vous le  supprimer  , 
                       il n'aura pas le drois d'accéder à la plateforme.
                     </v-card-text>
                     <v-card-actions>
                           <v-spacer></v-spacer>
                            <v-btn color="green darken-1" flat="flat" @click="delet=false">
                                 Non
                            </v-btn>
                            <v-btn   color="green darken-1" flat="flat" @click="supp() ">
                                 Oui
                            </v-btn>
                     </v-card-actions>
                   </v-card>
           </v-dialog>
              <!--end delete -->  
              <!-- show Admin-->
            <v-dialog  v-model="dialogSettings"  max-height='100%' max-width='600px' >
              <v-card >
                <v-card-title class="headline" primary-title>
                    Profile de {{gender}}   {{soso.nom}} {{soso.prenom}}
                </v-card-title>
                <v-card-text>
                         Des infos sur ce Admin
        
                  <v-form>     
                    <v-container>
                      <v-row justify="center">
                        <v-card-text cols="12" sm="6" md="4">
                          <label> 
                            <v-icon>person</v-icon>
                             Nom & Prenom : 
                            <span>  {{soso.nom }} {{soso.prenom}}</span>
                          </label>
                        </v-card-text>
                        <v-card-text cols="12" sm="6" md="4">
                          <label> 
                            <v-icon>work</v-icon> 
                            Corrdinateur  de La filiére :
                            <span > {{tabs.nom }} </span>
                          </label>
                        </v-card-text>
                        <v-card-text cols="12" sm="6" md="4">
                          <label>
                             <v-icon>mail</v-icon> Email : 
                             <span> {{soso.email }} </span>
                          </label>
                        </v-card-text>
                        <v-card-text cols="12" sm="6" md="4">
                          <label> 
                            <v-icon>phone</v-icon> 
                            Télèphone : 
                            <span> {{soso.tel }} </span>
                          </label> 
                        </v-card-text>
                        <v-card-text cols="12" >
                          <label> 
                            <v-icon>flag</v-icon>  
                            Pays  : 
                            <span>{{soso.pay }}</span>
                          </label>
                        </v-card-text>
                        <v-card-text cols="12">
                          <label>
                            <v-icon>location_on</v-icon> 
                            Adress : 
                            <span>{{soso.adress }}</span>
                             À <span>{{soso.ville}}</span>
                          </label>  
                        </v-card-text>
                        <v-col cols="12" sm="6">
                             <v-switch label="Admin" color="success" v-model="soso.active"  
                             :disabled="soso.active"/>
                        </v-col>
                      </v-row>
                    </v-container>
                  </v-form> 
                  <v-divider></v-divider>
                  <v-card-actions>
                    <v-spacer></v-spacer>
                      <v-btn color="primary" flat  @click="setUpSettings">
                        Fermer
                      </v-btn>
                  </v-card-actions>
                </v-card-text>
             </v-card>
            </v-dialog>
              <!--end show -->
              <!--modal add user -->
          <template>
             <v-dialog v-model="dialog"   max-width="700px">
              <v-stepper v-model="e6"   >
                <v-stepper-header>
                  <v-stepper-step :complete="e6 > 1" step="1"> Info Global </v-stepper-step>
                  <v-stepper-step :complete="e6 > 2" step="2">Infos Personnels</v-stepper-step>
                  <v-stepper-step :complete="e6 > 3" step="3">Configuration du compte</v-stepper-step>
                </v-stepper-header>
                 <!--form  1-->
                <v-stepper-content step="1">
                    <v-form ref="form" v-model="valid" lazy-validation  >
                    <h2>{{Text}} </h2>
                    <p>{{cond}}</p>
                    <v-text-field v-model="nom" :rules="nomRules" :counter="4" label="Nom" required  ></v-text-field>
                    <v-text-field v-model="prenom" :rules="prenomRules" label="Prenom" required  />
                    <v-layout> 
                      <v-flex d-flex lg6>
                        <v-select  v-model="civilite" :items="select" item-value="select" 
                        label="Civilité" required/>
                      </v-flex>
                      <v-flex d-flex lg6>
                        <v-spacer></v-spacer>
                        <v-select v-model="filier_id" :items="tabs" item-text="nom" item-value="id" 
                          label="Filiére" required    />
                      </v-flex>
                    </v-layout>
                    <v-card-actions>
                     <v-spacer></v-spacer>
                     <v-btn color="primary" @click="submit"><v-icon>navigate_next</v-icon>Suivre</v-btn>
                     </v-card-actions>
                </v-form>
                </v-stepper-content>
                 <!--form 2 -->
               <v-stepper-content step="2">
                  <v-form ref="form" v-model="valid" lazy-validation>
                     <h2>{{Text}} </h2>
                     <p>{{cond}}</p>
                     <v-layout flex wrap row>
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
                        <v-flex d-flex lg6>
                          <v-spacer></v-spacer>
                          <v-text-field v-model="ville" label="Ville"  />
                        </v-flex>
                      </v-layout>
                      <v-textarea label="adress" rows="1" v-model="adress"  ></v-textarea>
                      <v-card-actions>
                         <v-btn color="primary" @click="e6 = 1"> 
                           <v-icon>navigate_before</v-icon> 
                           retoure
                          </v-btn>
                          <v-spacer></v-spacer>
                          <v-btn color="primary" @click="e6=3">
                            <v-icon>navigate_next</v-icon>   
                            Suivre
                          </v-btn>
                       </v-card-actions>
                    </v-form>
                  </v-stepper-content> 
                    <!--form 3 -->
                  <v-stepper-content step="3">
                    <span>{{text1}}</span>
                    <v-flex xs12 sm6 md11>
                      <v-text-field  v-model="password"
                       :append-icon="showPassword ? 'visibility_off' : 'visibility'"
                       :type="showPassword ? 'text' : 'password'"
                       label="New Password"
                       hint="Please choose a complex one.."
                       :error="error"
                        @click:append="showPassword = !showPassword" />
                    </v-flex>
                    <v-flex xs12 sm6 md1 />
                    <v-flex xs12 sm6 md11>
                      <v-text-field v-model="passwordConfirm"
                        :append-icon="showPasswordConfirm ? 'visibility_off' : 'visibility'"
                        :type="showPasswordConfirm ? 'text' : 'password'"
                        label="Confirm New Password"
                        hint="and confirm it."
                        :error="error"
                        @click:append="showPasswordConfirm = !showPasswordConfirm" 
                      />
                    </v-flex>
                    <v-flex xs12 sm6 md1 />
                    <v-col cols="12" sm="6">
                      <v-switch label="Admin" color="primary" v-model="active"  />
                    </v-col>
                    <v-card-actions>
                       <v-btn color="primary" @click="e6 = 2"> 
                         <v-icon>navigate_before</v-icon> 
                         retoure
                        </v-btn>
                       <v-spacer></v-spacer>
                       <v-btn color="primary" @click="confirme()"> 
                         <v-icon>done</v-icon>  
                         Save
                        </v-btn>
                        <v-btn color="error" @click="close()"> 
                          <v-icon>close</v-icon> 
                             Fermer
                        </v-btn>
                     </v-card-actions>
                   </v-stepper-content>
              </v-stepper>
            </v-dialog>
          </template>
             <!--end  add model -->
         <!--Import data -->
          <v-dialog  v-model="va"  max-height='100%' max-width='600px' >
              

                

               </v-dialog>
            <!-- Edit Filiere-->
          <!--modal add user -->
                
           <template>
             <v-dialog v-model="di"   max-width="700px">
              <v-stepper v-model="e6"   >
                <v-stepper-header>
                  <v-stepper-step :complete="e6 > 1" step="1"> Info Global </v-stepper-step>
                  <v-stepper-step :complete="e6 > 2" step="2">Infos Personnels</v-stepper-step>
                  <v-stepper-step :complete="e6 > 3" step="3">Configuration du compte</v-stepper-step>
                </v-stepper-header>
                 <!--form  1-->
                <v-stepper-content step="1">
                    <v-form ref="form" v-model="valid" lazy-validation  >
                    <h2>{{Text}} </h2>
                    <p>{{cond}}</p>
                    <v-text-field v-model="nom" :rules="nomRules" :counter="4" label="Nom" required   :placeholder="nom"></v-text-field>
                    <v-text-field v-model="prenom" :rules="prenomRules" label="Prenom" required   :placeholder="prenom"/>
                    <v-layout> 
                      <v-flex d-flex lg6>
                        <v-select  v-model="civilite" :items="select" item-value="select" 
                        label="Civilité" :placeholder="civilite" required/>
                      </v-flex>
                      <v-flex d-flex lg6>
                        <v-spacer></v-spacer>
                        <v-select v-model="filier_id" :items="tabs" item-text="nom" item-value="id" :placeholder="tas.nom"
                          label="Filiére" required    />
                      </v-flex>
                    </v-layout>
                    <v-card-actions>
                     <v-spacer></v-spacer>
                     <v-btn color="primary" @click="e6=2" ><v-icon>navigate_next</v-icon>Suivre</v-btn>
                     </v-card-actions>
                </v-form>
                </v-stepper-content>
                 <!--form 2 -->
               <v-stepper-content step="2" >
                  <v-form ref="form" v-model="valid" lazy-validation>
                     <h2>{{Text}} </h2>
                     <p>{{cond}}</p>
                     <v-layout flex wrap row>
                        <v-flex d-flex lg6>
                          <v-text-field v-model="email"  :rules="emailRules" label="E-mail" :placeholder="email" required />
                        </v-flex>
                        <v-flex d-flex lg6>
                          <v-spacer></v-spacer>
                          <vue-tel-input v-model="tel" label="Téléphone" :placeholder="tel" ></vue-tel-input>
                        </v-flex> 
                        <v-flex d-flex lg6>
                          <v-text-field v-model="pay" label="Pays" :placeholder="pay" />
                          </v-flex>
                        <v-flex d-flex lg6>
                          <v-spacer></v-spacer>
                          <v-text-field v-model="ville" label="Ville"  :placeholder="ville"/>
                        </v-flex>
                      </v-layout>
                      <v-textarea label="adress" rows="1" v-model="adress" :placeholder="adress" ></v-textarea>
                      <v-card-actions>
                         <v-btn color="primary" @click="e6 = 1"> 
                           <v-icon>navigate_before</v-icon> 
                           retoure
                          </v-btn>
                          <v-spacer></v-spacer>
                          <v-btn color="primary" @click="e6=3">
                            <v-icon>navigate_next</v-icon>   
                            Suivre
                          </v-btn>
                       </v-card-actions>
                    </v-form>
                  </v-stepper-content> 
                    <!--form 3 -->
                  <v-stepper-content step="3">
                    <span>{{text1}}</span>
                    <v-flex xs12 sm6 md11>
                      <v-text-field  v-model="password"
                       :append-icon="showPassword ? 'visibility_off' : 'visibility'"
                       :type="showPassword ? 'text' : 'password'"
                       label="New Password"
                       hint="Please choose a complex one.."
                       :error="error"
                        @click:append="showPassword = !showPassword" />
                    </v-flex>
                    <v-flex xs12 sm6 md1 />
                    <v-flex xs12 sm6 md11>
                      <v-text-field v-model="passwordConfirm"
                        :append-icon="showPasswordConfirm ? 'visibility_off' : 'visibility'"
                        :type="showPasswordConfirm ? 'text' : 'password'"
                        label="Confirm New Password"
                        hint="and confirm it."
                        :error="error"
                        @click:append="showPasswordConfirm = !showPasswordConfirm" 
                      />
                    </v-flex>
                    <v-flex xs12 sm6 md1 />
                    <v-col cols="12" sm="6">
                      <v-switch label="Admin" color="primary" v-model="active"  />
                    </v-col>
                    <v-card-actions>
                       <v-btn color="primary" @click="e6 = 2"> 
                         <v-icon>navigate_before</v-icon> 
                         retoure
                        </v-btn>
                       <v-spacer></v-spacer>
                       <v-btn color="primary" @click="update()"> 
                         <v-icon>done</v-icon>  
                         Save
                        </v-btn>
                        <v-btn color="error" @click="close()"> 
                          <v-icon>close</v-icon> 
                             Fermer
                        </v-btn>
                     </v-card-actions>
                   </v-stepper-content>
              </v-stepper>
          </v-dialog>
         </template>     
  </div>         

</div>
</template>
<template v-else=store.dispatch('\')>
  
</template>


<script>

import axios from 'axios'
import {isAuthentecated } from './helper/auth';

export default {
  /**data */
 

 
   data () {
         return {
           
         delet:false,
         k:0,
         alert:false,
         adress:'',
         tel:'',
         password: '',
         showPassword: null,
         showPasswordConfirm: null,
         passwordConfirm: null,
         pass2: "",
         email:'',
         e6: 1,
         filier_id:'',
         valid: true,
         dialog:false,
         soso:'',
         gender:'',
         Text:'',
         cond:'',
         dialogSettings: false,
         snackbar:false,
         totalItems: 0,
         loading: true,
         color:'',
         tabs:'',
         active:false,
         n:'',
         sos:'',
         snackba:false,
         oui:false,
         m:false,
         pagination: {},
         headers: [
            { text: 'ID', align: 'start', value: 'id' },
            {text:'PHOTO',algin:'center',value:''},
            { text: 'CIVILITÉ', value: 'civilite' },
            { text: 'NOM', value: 'nom' },
            { text: 'PRÉNOM', value: 'prenom' },
            { text: 'EMAIL', value: 'email' },
            { text: 'TÉL', value: 'tel' },
            { text: 'ACTION',value: ' ' ,align:'center'},
            ],
              header: [
            { text: 'ID', align: 'start', value: 'id' },
            {text:'PHOTO',algin:'center',value:''},
            { text: 'CIVILITÉ', value: 'civilite' },
            { text: 'NOM', value: 'nom' },
            { text: 'PRÉNOM', value: 'prenom' },
            { text: 'EMAIL', value: 'email' },
            { text: 'TÉL', value: 'tel' },
         
             
            ],
            items: [],
            nom: '',
            nomRules: [
                v => !!v || 'Entrer Votre Nom ',
                 v => (v && v.length >= 4) || 'Nom est moins de 4 charactaires'
             ],
             emailRules: [
              v => !!v || 'E-mail is required',
              v => /.+@.+/ || 'E-mail must be valid'
              ],
            prenom: '',
            prenomRules: [
                 v => !!v || 'Entrer Votre Prenom ',
                 v => (v && v.length >= 4) || 'Prenom est moins de 4 charactaires'
            ],
            select:[ 'Mll','M','Mme' ],
            civilite:'',
            va:false,
            authenticated:isAuthentecated(),
            text1:'',
            tas:'',
            di:false,
            emlto:localStorage.getItem('Email'),
            hellos:false 
           
            }
      },
   mounted()
   {    this.isAdmin();
        this.getData();
        this.getF();
       
       
   },
   watch: {
    
    valid() {
        this.$refs.form.reset()
    }
},

  methods:{
    
       /*aporté data apartir de mysql */
    getData()
    {  
       axios.get('/api/admin').then(response => {
       this.items = response.data
       this.loading=false
   
    })
    .catch(error => {
      console.log(error)
    })},
    getF() 
    {
      axios.get('/api/filier/')
        .then(response => {
          this.tabs = response.data;
        })
        .catch(e => {
          console.log(e);
         
        });
    },
       isAdmin()
  { 
            const email = this.emlto;
            
            this.axios.post('api/search',{email})
              .then(res => {
                   this.hellos=res.data;
                  
                   
                 }
                 )
                .catch((err)=>console.log(err));
                 
                
          
         
         
    },
    /** */
    add()
    { this.clear();
      this.getF();
      this.dialog=true;
      this.Text="Ajouter Un Nouveau Coordinateur ";
      this.cond="S'il vous plais Ajouter les Coordinateurs De ESTSB ";
    },
        
    /*mise a jour de data table */
     reload()
     {
                 this.getData();
                 this.isAdmin();
                 this.text="Votre liste est actualisé";
                 this.color="success";
                 this.snackbar=true;
                  
      },
      /* affichage des info d'in utilisateur  */
  show(todo) {
   
            axios
    .get('/api/admin/'+todo).
    then(response => {
      this.soso = response.data
      this.loading=false
       axios
        .get('/api/filier/'+parseInt(this.soso.filier_id))
        .then(response => {
          this.tabs = response.data;
          
        })
        .catch(e => {
          console.log(e);
         
        });
    })
    .catch(error => {
      console.log(error)
    })    
    

    this.gender=this.soso.civilite,
    this.gender=this.gender.toUpperCase(),
    this.dialogSettings = true;   
    
    },
       setUpSettings(){this.dialogSettings =false;},
       /* function to remove the data in data base  */
            deleteUser(todo)
            {
             this.delet=true;
             this.k=todo
             },
            supp()
             {
               axios.delete("/api/admin/"+this.k).then(response=>{
                      this.delet=false;
                      this.text="Admin à Supprimer avec Sussées";
                      this.color="error";
                      this.snackbar=true;
                      this.getData();
             }).catch(e => {
          
          console.log(e);
        })
                },
        submit () {
         this.$refs.form.validate(),
            this.e6=2;
       
      },
      clear () {
                 this.passwordConfirm='',
                 this.civilite='';
                 this.nom='',
                 this.prenom='',
                 this.filier_id='',
                 this.tel='',
                 this.email='',
                 this.password='',
                 this.pay='',
                 this.ville='',
                 this.adress='',
                 this.active=false,
                 this.e6=1
      },
      close(){this.dialog=false;this.e6=1;this.r=Object.assign({}, defaultReg); },
       store() {
      
      
      axios.post('/api/admin' ,{
          civilite: this.civilite,
          nom: this.nom,
          prenom: this.prenom,
          filier_id: this.filier_id,
          tel:this.tel,
          email:  this.email,
          password: this.password,
          pay:this.pay,
          ville:this.ville,
          adress:this.adress,
          active:this.active,

        }).then((res)=>{
        this.m=true;
        if (this.m==true) {
            
                 this.text="Admin à Ajouter avec Sussées";
                 this.color="success";
                 this.snackbar=true;
                 this.clear()
          } else {
                 this.text="Fail D'ajoute ";
                 this.color="danger";
                 this.snackbar=true;
          }
         
        
         
          this.getData();
          this.dialog=false;
          
        })
        .catch(e => {
          
          console.log(e);
        })
          
        
    },
      confirme(){
         const vm = this;

      if (vm.userEmail === null || vm.password === null || vm.passwordConfirm === null) {

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

      vm.$root.userEmail = vm.userEmail;
      vm.$root.userPassword = vm.password;
      this.store();
      vm.result = "Email and password changed succesfully.";
      vm.showResult = true;

        
      },
      edite(todo){
      
        axios
    .get('/api/admin/'+todo).
    then(response => {
      this.sos = response.data;
      this.nom=this.sos.nom;
      this.prenom=this.sos.prenom;
      this.civilite=this.sos.civilite;
      
     
       axios
        .get('/api/filier/'+parseInt(this.sos.filier_id))
        .then(response => {
          this.tas = response.data;
          this.tabs=this.tas.nom
        })
        .catch(e => {
          console.log(e);
         
        });
      this.email=  this.sos.email; 
      this.tel=this.sos.tel;
      this.pay=this.sos.pay;
      this.ville=this.sos.ville;
      this.active=this.sos.active;
    })
    .catch(error => {
      console.log(error)
    }) ;
      
      console.log(this.tas.nom),
                
      
      this.Text="Modifier les donées du  Coordinateur ";
      this.cond="S'il vous plais faire attention au moument de modifications les Coordinateurs De ESTSB ";
      this.text1="si l'admin est oublie leur password vous pouvez l'echnager içi ."
      this.di=true;
                   
                 },
       update(){
                    
      
        axios.put('/api/admin/'+this.sos.id,{ 
                 
          civilite: this.civilite,
          nom: this.nom,
          prenom: this.prenom,
          filier_id: this.filier_id,
          tel:this.tel,
          email:  this.email,
          password: this.password,
          pay:this.pay,
          ville:this.ville,
          adress:this.adress,
          active:this.active,

        })
       
        .then(response => {
          this.valide=false;
          this.text="la mise à jour d'option à fait avec sussés";
          this.color="info";
          this.snackbar=true;
          this.getData();
        })
        .catch(e => {
          console.log(e);
        });     
        },
      /** Import data  */
      importD()
      {
        this.va=true;
      }           
    }  
    }
     
    


</script>

<style>
.bar{background-color:white;}

</style>