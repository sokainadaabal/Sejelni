<template >

  <v-navigation-drawer
    v-model="toggle"
    fixed app v-if="isAdmin()||isUser()">
    <v-toolbar flat dark color="#fff" class="toolbar">
      <router-link :to="{ name: 'Home' }">
        <img src="static/logo.png" width="36px"/>
      </router-link>
      <router-link :to="{ name: 'Home' }" class="text " >
         <strong   class="flex my-4 " style="color:#1b5299;"> SEJELNI </strong>
      </router-link>
    </v-toolbar>
    <v-list :color="$root.themeColor" v-if="isAdmin()">
      <v-list-tile @click="changeRoute('Home', 1)"  style="color:#1b5299;"  v-if="isAdmin()" >
        <v-list-tile-action>
          <v-icon>dashboard</v-icon>
        </v-list-tile-action>
        <v-list-tile-title :class="[{'active': selectedIndex === 1}, 'item-title ' ]" >Home</v-list-tile-title>
      </v-list-tile>

      <v-list-tile @click="changeRoute('Administration', 2)" style="color:#1b5299;" v-if="isAdmin()">
        <v-list-tile-action>
          <v-icon>person</v-icon>
        </v-list-tile-action>
        <v-list-tile-title :class="[{'active': selectedIndex === 2}, 'item-title' ]">Administration</v-list-tile-title>
      </v-list-tile>

     
      <v-list-group
        prepend-icon="pageview" v-if="isAdmin()">
        <v-list-tile slot="activator">
          <v-list-tile-title class="item-title" style="color:#1b5299;">Parcours</v-list-tile-title>
        </v-list-tile>
        <v-list-tile @click="changeRoute('Filiéres', 3)" style="color:#1b5299;">
          <v-list-tile-action>
            <v-icon>group</v-icon>
          </v-list-tile-action>
          <v-list-tile-title :class="[{'active': selectedIndex === 3}, 'item-title' ]" >Filières</v-list-tile-title>
        </v-list-tile>
        <v-list-tile @click="changeRoute('Option',4)" style="color:#1b5299;">
          <v-list-tile-action>
            <v-icon>bar_chart</v-icon>
          </v-list-tile-action>
          <v-list-tile-title :class="[{'active': selectedIndex === 4}, 'item-title' ]">Options</v-list-tile-title>
        </v-list-tile>
        
    </v-list-group>
       <v-list-group
      prepend-icon="account_circle" v-if="isAdmin()">
       <v-list-tile slot="activator">
          <v-list-tile-title class="item-title" style="color:#1b5299;">1ére Année</v-list-tile-title>
        </v-list-tile>
      
      <v-list-tile 
            :key="i" @click="$router.push({ name: 'Etudiants1' })" style="color:#1b5299;">
          <v-list-tile-action>
            <v-icon>people_outline</v-icon>
          </v-list-tile-action>
          <v-list-tile-title class="item-title" >Etudiants Pré-Inscrit</v-list-tile-title>
      </v-list-tile>
       <v-list-tile 
            :key="i" @click="$router.push({ name: 'Etudiants2' })" style="color:#1b5299;">
          <v-list-tile-action>
            <v-icon>people_outline</v-icon>
          </v-list-tile-action>
          <v-list-tile-title class="item-title" >Etudiants Inscrit</v-list-tile-title>
      </v-list-tile>
    </v-list-group>
     
      <v-list-tile @click="logout()" style="color:#1b5299;" v-if="isAdmin()">
          <v-list-tile-action>
            <v-icon>logout</v-icon>
          </v-list-tile-action>
          <v-list-tile-title class="item-title">Déconnecter</v-list-tile-title>
      </v-list-tile>
      
    </v-list>
  
  <v-list v-if="isUser()">
    <v-list-tile @click="changeRoute('HomeS', 1)" style="color:#1b5299;" v-if="isUser()">
         <v-list-tile-action>
          <v-icon>dashboard</v-icon>
          </v-list-tile-action>
          <v-list-tile-title class="item-title">Home</v-list-tile-title>
    </v-list-tile>
    <v-list-tile @click="logot()" style="color:#1b5299;" v-if="isUser()">
         <v-list-tile-action>
            <v-icon>logout</v-icon>
          </v-list-tile-action>
          <v-list-tile-title class="item-title">Déconnecter</v-list-tile-title>
    </v-list-tile>
  </v-list>
  </v-navigation-drawer>
  
 
</template>

   
<script>
import axios from 'axios';
export default {
  props: {
    toggle: {
        type: Boolean,
        required: false,
        default: true,
       
    }
  },

  data() {
    return {
       item: 0,
      selectedIndex: 1,
      k:0,
      items:[]
    }
  },
   mounted()
   {
     this.getData();   },

  methods: {
     getData()
    {  
       axios.get('/api/filier').then(response => {
       this.items =response.data
       this.loading=false
   
    })
    .catch(error => {
      console.log(error)
    })},
    isAdmin()
{  if(localStorage.getItem('Admin'))
    return true;
}
,    isUser()
{
  if(localStorage.getItem('User'))
    return true;
}
,
    changeRoute(routeName, selectedIndex) {
      const vm = this;

      vm.selectedIndex = selectedIndex;

      return vm.$router.push({ name: routeName });
    },
 logot(){
   window.localStorage.clear(); 
  return this.$router.push('/Student');
 },
logout: function () {
  window.localStorage.clear(); 
  return this.$router.push('/Admin');
  
    
  }
    
    
    }
  
}
</script>

<style>
  .toolbar {
    font-weight: bold;
    font-size: 18px;
    background-color: white;
  }

  .toolbar .text {
    padding-left: 15px;
    color: white;
    text-decoration:none;
  }
  

  .item-title {
    font-size: 17px;
    font-weight: 500;
  }
  .item-sub-title {
    font-size: 15px;
    font-weight: 500;
  }

  .active {
    font-weight: bold;
  }
</style>