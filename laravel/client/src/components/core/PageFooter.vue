<template>
  
  <v-footer  height="50"  color="#fff"  fixed   dark>
        <v-layout >
          
          <v-flex color="#fff" dark py-3 text-xs-center xs12 style="color:#1b5299;" >
          
            &copy;{{ new Date().getFullYear() }}  — <strong>SEJELNI</strong>
        <v-spacer></v-spacer>
       
           
          </v-flex>
        </v-layout>
  </v-footer>

</template>

<script>
export default {
  data() {
    return {
      icons: [
        'fa fa-facebook',
        'fa fa-twitter',
        'fa fa-google-plus',
        'fa fa-linkedin',
        'fa fa-instagram'
      ]
    }
  }
}
</script>

<style>

</style>