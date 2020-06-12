<template v-if="localStorage.getItem('Usertoken')">
<div>
    <div class="bar"> 
             <!--container -->  
          <div class="container "  >
            <div class="text-center" style="text-align: end; "> 
               <!--Button -->        
              <div class="my-2">
                  <!--Explore data table -->
                  <v-btn color="warning" icon fa  dark  >
                      <download-excel :data   = "items"  name = "condidats.xls">
                        <v-icon>cloud_download</v-icon>
                      </download-excel>
                  </v-btn>
                  <!--Actualiser d'ata table -->
                  <v-btn color="success"  @actualise="snackbar=true" icon fa x-large dark href="/#/administrateur">
                    <v-icon>autorenew</v-icon>
                  </v-btn>
                  <!--end -->
                 
              </div>
            </div>
             <!--Data  table pour super Admin -->
            <v-data-table :headers="headers" :items="items" :pagination.sync= "pagination" :total-items="totalItems" 
             :loading="loading" :rows-per-page-items="[5,10,15]"
             class="elevation-1 font-weight-bold" 
             >
               <!--progress faire pour dire que la table est encours de télécharger -->
               <v-progress-linear slot="progress" color="blue" indeterminate></v-progress-linear>
               <!--rows tables -->
               <template v-slot:items="props"  > 
                  <td class="text-center ">{{props.item.cne}}</td>
                  <td class="text-center ">{{props.item.cin}}</td>
                  <td class="text-center">{{ props.item.nom }}</td>
                  <td class="text-center">{{ props.item.filiere_du_bac }}</td>
                  <td class="text-center">{{ props.item.date_du_bac  }}</td>
                  <td class="text-center">{{ props.item.tele}}</td> 
                  
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
            
          </div>
            <!--end container -->
            <!-- snackbar-->
          <v-snackbar v-model="snackbar" :timeout="4000"    :color="color" left>
                <span>{{text}}</span>
                <v-btn flat color="white" @click="snackbar = false" > Fermer </v-btn>
          </v-snackbar>
             <!-- end snackbar-->           
  </div>         
</div>
</template>
<script>
import axios from 'axios'
import {isAuthentecated } from './helper/auth';

export default {
  /**data */
 

 
   data () {
         return {
            accept:1,
             headers: [
           
            { text: 'CNE', value: 'cne' },
            { text: 'CIN', value: 'cin' },
            { text: 'NOm', value: 'nom' },
            { text: 'Filière Du BAC', value: 'filiere_du_bac' },
            { text: 'DATE Du BAC', value: 'date_du_bac' },
            { text: 'Tel', value: 'tele' },
           
            ],
            items:[],
         }

         },
         mounted(){
             this.getData();
         },
         methods:{
             getData()
    {  
       axios.get('/api/etudiant').then(response => {
       this.items = response.data
       this.loading=false
   
    })
    .catch(error => {
      console.log(error)
    })}
         },
     
        
}         
         </script>
