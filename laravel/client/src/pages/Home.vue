<template v-if="localStorage.getItem('usertoken')"  >
  <diV>
  <v-container  fluid grid-list-xl>
  
   
    <v-layout row wrap max-height='100%' max-width='600px'>
       <v-flex d-flex lg3 sm6 xs12>
        <widget icon="person" title=""  subTitle= "Aujourd'hui" supTitle="Admins" color="#00b297"/>
      </v-flex>
      <v-flex d-flex lg3 sm6 xs12>
        <widget icon="class" title="" subTitle= "Aujourd'hui" supTitle="Filiéres" color="#dc3545"/>
      </v-flex>
      <v-flex d-flex lg3 sm6 xs12>
        <widget icon="school" title="" subTitle= "Aujourd'hui" supTitle="Options" color="#0866C6"/>
      </v-flex>
      <v-flex d-flex lg3 sm6 xs12>
        <widget icon="person" title="" subTitle= "Aujourd'hui" supTitle="Etudiants" color="#1D2939"/>
      </v-flex>
    </v-layout>
  </v-container>

  </diV>
</template>

<script>
export default {
  
  data() { 
    const globalVar = 0;
    return {
      componentKey:globalVar,
    }
  },
  mounted()
   {
        this.getF();
   },
  methods:{
    getF(){
     
     if(componentKey==0)
     { window.location.reload();this.componentKey++;}
    },
     getData()
    {  
       axios.get('/api/admin').then(response => {
       this.items = response.data.count()     
       this.loading=false
      
   
    })
    .catch(error => {
      console.log(error)
    })}
  }
}
</script>

<style>

</style>