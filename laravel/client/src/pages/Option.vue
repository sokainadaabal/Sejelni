<template v-if="localStorage.getItem('usertoken')">
    <div class="bar">   
          <div class="container ">
            <div class="text-center" style="text-align: end; "> 
               <!--Button -->        
              <div class="my-2">
                  <!--Actualiser d'ata table -->
                  <v-btn color="success" icon fa x-large dark @click.prevent=" reload()">
                    <v-icon>autorenew</v-icon>
                  </v-btn>
                  <!--end -->
                  <!--Ajouter un data -->
                  <v-btn color="primary" icon fa large dark  @click="add()" v-if="this.dat.active!=0">
                    <v-icon>add</v-icon>
                  </v-btn>
              </div>
              <!--end-->
           </div>
           <!--Data  table -->
           <v-data-table  :headers="headers" :items="items" :pagination.sync= "pagination" :total-items="totalItems" 
           :loading="loading" :rows-per-page-items="[5,10,15]"
            class="elevation-1 font-weight-bold"  style="text-align: center;" v-if="this.dat.active!=0"
           >
               <!--progress faire pour dire que la table est encours de télécharger -->
               <v-progress-linear slot="progress" color="blue" indeterminate ></v-progress-linear>
               <!--rows tables -->
               <template  v-slot:items="props" > 
                  <td class="text-center ">{{ props.item.id }}</td>
                  <td class="text-center"> {{ props.item.nom }} </td>
                  <td class="text-center">{{ props.item.created_at}}</td>
                  <td class="text-center " >
                      <!-- pour les actions -->
                             <!-- show -->
                            <v-btn icon   @click="show(props.item.id)" >
                                 <v-icon color="red" small   >visibility</v-icon>
                            </v-btn>
                             <!--edit -->
                            <v-btn icon @click="affiche(props.item.id)">
                                <v-icon color="blue" small  >edit</v-icon>
                            </v-btn>
                             <!--delete -->
                            <v-btn icon  @click="deleteUser(props.item.id)"  >
                                <v-icon color="pink" small    >delete</v-icon>
                            </v-btn>
                  </td>
                </template>
                 <!--si il ya probleme  -->
                <template slot="no-data" >
                  <div style="text-align: center; font-weight: bold; font-size: larger;" >
                     <v-text >Erreur  </v-text>   
                     <v-btn color="success" icon fa x-large dark href="/#/administrateur">
                         <v-icon>autorenew</v-icon>
                     </v-btn>
                  </div>
                </template>
            </v-data-table>
            <!-- end data table -->
                 <!--Data  table -->
           <v-data-table  :headers="header" :items="items" :pagination.sync= "pagination" :total-items="totalItems" 
           :loading="loading" :rows-per-page-items="[5,10,15]"
            class="elevation-1 font-weight-bold"  style="text-align: center;" v-else
           >
               <!--progress faire pour dire que la table est encours de télécharger -->
               <v-progress-linear slot="progress" color="blue" indeterminate ></v-progress-linear>
               <!--rows tables -->
               <template  v-slot:items="props" > 
                  <td class="text-center ">{{ props.item.id }}</td>
                  <td class="text-center"> {{ props.item.nom }} </td>
                  <td class="text-center">{{ props.item.created_at}}</td>
                 
                </template>
                 <!--si il ya probleme  -->
                <template slot="no-data" >
                  <div style="text-align: center; font-weight: bold; font-size: larger;" >
                     <v-text >Erreur  </v-text>   
                     <v-btn color="success" icon fa x-large dark href="/#/administrateur">
                         <v-icon>autorenew</v-icon>
                     </v-btn>
                  </div>
                </template>
            </v-data-table>
            <!-- end data table -->
            <!--add Option -->
            <v-dialog  v-model="va"  max-height='100%' max-width='600px' >
                <v-card >
                  <v-card-title class="headline" primary-title>
                       Ajouter le nom du nouvelle Option
                  </v-card-title>
                  <v-divider></v-divider>
                 <v-form>
                  <v-container>
                      <v-row>
                          <v-col cols="12"  md="4">
                             <v-layout>
                              <v-text-field v-model="nom"
                                 
                                 
                                label="Nom du Option"
                                  required>
                              </v-text-field>
                              <v-flex d-flex lg6>
                              <v-spacer></v-spacer>
                              <v-select v-model="filier_id" :items="tabs" item-text="nom" item-value="id"
                                label="Filiére" required  />
                              </v-flex>
                             </v-layout>
                              <v-spacer></v-spacer>
                              <v-spacer></v-spacer>
                          </v-col>        
                          <v-card-actions >
                              <v-spacer></v-spacer>
                              <v-btn color="primary" drak  @click="store">
                                 Ajouter
                              </v-btn>
                          </v-card-actions>
                      </v-row>
                  </v-container>
               </v-form>
                </v-card>
               </v-dialog>
            <!--end -->
             <!--edit  Option -->
            <v-dialog  v-model="valide"  max-height='100%' max-width='600px' >
                <v-card >
                  <v-card-title class="headline" primary-title>
                      Modifier le nom du nouvelle Option
                  </v-card-title>
                  <v-divider></v-divider>
                 <v-form>
                  <v-container>
                      <v-row>
                          <v-col cols="12"  md="4">
                             <v-layout>
                              <v-text-field v-model="nom"
                                :placeholder="sos.nom"
                                label="Nom du Option" 
                                  required>
                              </v-text-field>
                              <v-flex d-flex lg6>
                              <v-spacer></v-spacer>
                              <v-select v-model="filier_id" :items="tabs" 
                                 item-text="nom" item-value="id"
                               :placeholder="tas.nom" required   label="Filier"/>
                              </v-flex>
                             </v-layout>
                              <v-spacer></v-spacer>
                              <v-spacer></v-spacer>
                          </v-col>        
                          <v-card-actions >
                              <v-spacer></v-spacer>
                              <v-btn color="primary" drak  @click="update()">
                                 Modifier
                              </v-btn>
                          </v-card-actions>
                      </v-row>
                  </v-container>
               </v-form>
                </v-card>
               </v-dialog>
            <!--end -->
           <!-- show opion-->
          <v-dialog  v-model="dialogSettings"  max-height='100%' max-width='600px' >
            <v-card >
               
                <v-card-text>
                         Des infos sur cette option 
        
                  <v-form>     
                    <v-container>
                      <v-row justify="center">
                        <v-card-text cols="12" sm="6" md="4">
                          <label> 
                            <v-icon></v-icon>
                             Nom  : 
                            <span>  {{soso.nom }}</span>
                          </label>
                        </v-card-text>
                        <v-card-text cols="12" sm="6" md="4">
                          <label> 
                            <v-icon></v-icon> 
                             La filiére :
                            <span > {{tabs.nom }} </span>
                          </label>
                        </v-card-text>
                        <v-card-text cols="12" sm="6" md="4">
                          <label>
                             <v-icon></v-icon> Date de creation : 
                             <span> {{soso.created_at }} </span>
                          </label>
                        </v-card-text>
                         <v-card-text cols="12" sm="6" md="4">
                          <label>
                             <v-icon></v-icon>Date de Modification : 
                             <span> {{soso.updated_at}} </span>
                          </label>
                        </v-card-text>
                        
                      </v-row>
                    </v-container>
                  </v-form> 
                  <v-divider></v-divider>
                  <v-card-actions>
                    <v-spacer></v-spacer>
                      <v-btn color="primary" flat  @click="dialogSettings=false">
                        Fermer
                      </v-btn>
                  </v-card-actions>
                </v-card-text>
            </v-card>
          </v-dialog>
          <!--end show -->
           <!-- snackbar pour dire que l'action fait avec susses-->
            <v-snackbar v-model="snackbar" :timeout="4000"    :color="color" left>
                <span>{{text}}</span>
                <v-btn flat color="white" @click="snackbar = false" > Fermer </v-btn>
            </v-snackbar>
          <!-- end -->
          <!--for delete-->
           <v-dialog v-model="delet" max-width="290">
                   <v-card>
                     <v-card-title class="headline">
                       Sur Vous voulez Supprimer cette option?
                     </v-card-title>

                     <v-card-text>
                       Faire attention lorsque vous le  supprimer  , 
                       il n'aura pas des étudiants  dans cette option .
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
          </div>
    </div>
</template>
<script>

import axios from 'axios'

export default {
  /**data */
 
   data () {
       soso :[];
       return {
            items: [],
            headers: [
            { text: 'ID', align: 'start', value: 'id' },
            { text: 'NOM', align: 'start', value: 'id' },
            
            { text: 'DATE DE CREATION', align: 'start', value: 'id' },
            { text: 'ACTION', align: 'start', value: 'id' }],
            header: [
            { text: 'ID', align: 'start', value: 'id' },
            { text: 'NOM', align: 'start', value: 'id' },
           
            { text: 'DATE DE CREATION', align: 'start', value: 'id' },
            ],
            pagination: {},
            totalItems: 0,
            va:false,
            tabs:[],
            filier_id:'',
            it:[],
            n:'',
            dialogSettings:false,
            soso:[],
            valide:false,
            sos:[],
            tas:[],
            snackbar:false,
            delet:false,
            num:'',
            k:[],
            filier_id:'',
            tab:[],
            id:0,
             emlto:localStorage.getItem('Email'),
            dat:[]
           }
   },
    mounted()
   {
        this.getData();
        this.refrech();
   },
    methods:{
       /*aporté data apartir de mysql */
    getData()
    {  
       axios.get('/api/option').then(response => {
       this.items = response.data
      
      })
    
    .catch(error => {
      console.log(error)
    })},
   
     refrech()
    { 
      const email =this.emlto;
      axios.get('/api/search',{email}).then(res=>
      {
        this.dat=res.data
      }).catch(e=>{
        console.log(e);
              })
    },
    /*Ajoute Option */
    add()
      {  
        this.clear();
        this.getF();
        this.va=true;
      },
      clear()
        {
          this.nom='',
          this.filier_id=''
        }  ,
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
      store() {
            
       axios.post('/api/option' ,{
              nom:this.nom ,filier_id:this.filier_id
        }).then((res)=>{
        this.m=true;
        if (this.m==true) {
            
                 this.text="Filiére à Ajouter avec Sussées";
                 this.color="success";
                 this.snackbar=true;
                 this.clear();
          } else {
                 this.text="Fail D'ajoute ";
                 this.color="danger";
                 this.snackbar=true;
          }  
          this.getData();
          this.va=false;
        })
        .catch(e => {
          console.log(e);
        })},
         show(todo) {
   
            axios
    .get('/api/option/'+todo).
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
    

    this.dialogSettings = true;   
    
    },
     /* Modifier le non du option */
      affiche(todo){
       axios
        .get('/api/option/'+parseInt(todo))
        .then(response => {
          this.sos = response.data
          this.getF(),
          axios.get('/api/filier/'+parseInt(this.sos.filier_id)).then(
            res=>{
              this.tas=res.data
            }
          )
        })
        .catch(e => {
          console.log(e);
        });
          this.valide=true;
      
  },
    update(){
                    
      
        axios.put('/api/option/'+this.sos.id,{nom:this.nom,filier_id:this.filier_id})
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
          /*mise a jour de data table */
     reload()
     {
                 this.getData();
                 this.text="Votre liste est actualisé";
                 this.color="success";
                 this.snackbar=true;
                 
      },
       /* function to remove the data in data base  */
            deleteUser(todo)
            {
             this.delet=true;
             this.k=todo
             },
            supp()
             {
               axios.delete("/api/option/"+this.k).then(response=>{
                      this.delet=false;
                      this.text="Option à Supprimer avec Sussées";
                      this.color="error";
                      this.snackbar=true;
                      this.getData();
             }).catch(e => {
          
          console.log(e);
        })
                },
    
        
}}
</script>
<style>
.bar{background-color:white;}

</style>