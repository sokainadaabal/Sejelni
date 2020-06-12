<template>
<v-card>
 <v-toolbar app dark color="#1b5299" class="hidden-xs-and-down">
        <v-toolbar-title>SEJELNI</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items>
         <v-btn
           key="home"
           to='/'
           title="Back to Home page" active
           flat
         >Accueil</v-btn>
         <v-btn
           key="info"
           to='/Student'
           title="About this demo"
           flat
         >Student</v-btn>
          <v-btn
           key="assignment_turned_in"
           to='/Admin'
           title="Some stuff that needs doing"
           flat
         >Administration</v-btn>
        </v-toolbar-items>
      </v-toolbar>
      
      <v-toolbar app dark color="#1b5299" class="hidden-sm-and-up">
        <v-toolbar-title>SEJELNI</v-toolbar-title>
        <v-spacer></v-spacer>

        <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
          <v-toolbar-side-icon dark slot="activator"></v-toolbar-side-icon>
          <v-card>
            <v-toolbar flat color="#1b5299">
              <v-toolbar-title style="color: white;">SEJELNI</v-toolbar-title>
              <v-spacer></v-spacer>
              <v-btn icon @click.native="dialog = false">
                <v-icon>close</v-icon>
              </v-btn>
            </v-toolbar>

            <v-list>
              <v-list-tile to="/"
              >
                <v-list-tile-action>
                  <v-icon>home</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title >Accueil</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
            
          
              <v-list-tile to="/Student">
                <v-list-tile-action>
                  <v-icon>person</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title >Student</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              <v-list-tile to="/Admin">
                <v-list-tile-action>
                  <v-icon>person</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title >Administration</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
            </v-list>
          </v-card>
        </v-dialog>
      </v-toolbar>
       <v-container fluid fill-height class="home-hero">
        <v-layout justify-center align-center column pa-5>
            <div class="display-4   text-xs-center" style="color:#1b5299;">SEJELNI</div>
            <div class="display-3   text-xs-center mb-3" style="color:#1b5299;">ESTSB</div>
            <div class="display-1   text-xs-center" style="color:#1b5299;">C'est le site D'inscrpription de Ecole supérieure de Téchnlogie.</div>
            <div justify-center align-center>
            <v-btn   color="#1b5299" >
               <v-icon color="white" >edit</v-icon><h5 style="color:white;"  @click="show()"> Inscrpription</h5>
            </v-btn>
            <v-btn  color="#1b5299" v-on="on" to="/Student" >
               <v-icon color="white" >keyboard_arrow_right</v-icon><h5 style="color:white;"> Login Student</h5>
            </v-btn>
          </div>
        </v-layout>
    </v-container>
      <v-container grid-list-lg>
        <v-layout row>
            <v-flex xs12 class="text-xs-center display-1 font-weight-black my-5">Coordinateurs de ESTSB</v-flex>
        </v-layout>
        <v-layout row wrap>
            <v-flex xs12 sm12 md4  height="600px">
                <v-card>
                    <v-img src="static/toumi.jpg" height="300px">
                        <v-container fill-height fluid>
                            <v-layout fill-height>
                                <v-flex xs12 align-end flexbox>
                                    <span class="headline white--text">GI → Génie Informatique</span>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-img>

                    <v-card-title primary-title>
                        <div>
                            <h3 class="headline mb-0"> Mr Hicham TOUMI  </h3><br>
                            <div>
                                 <div style="text-align:center">  Coordinateur de Filière Gi </div>
                            </div>
                        </div>
                    </v-card-title>
                </v-card>
            </v-flex>

            <v-flex xs12 sm12 md4  height="600px">
                <v-card>
                    <v-img src="static/adil.jpg" height="300px">
                        <v-container fill-height fluid>
                            <v-layout fill-height>
                                <v-flex xs12 align-end flexbox>
                                    <span class="headline white--text">TM → Technique de Management</span>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-img>
                    <v-card-title primary-title>
                        <div>
                            <h3 class="headline mb-0">Adil EL Amri </h3><br>
                                   <div>
                               <div style="text-align: justify;">Coordinateur de Filière TM </div>
                             
                            </div>
                        </div>
                    </v-card-title>
                </v-card>
            </v-flex>

            <v-flex xs12 sm12 md4 height="600px">
                <v-card>
                    <v-img src="static/course-8.jpg" height="300px">
                        <v-container fill-height fluid>
                            <v-layout fill-height>
                                <v-flex xs12 align-end flexbox>
                                    <span class="headline white--text">GA → Génie Agro-environnement</span>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-img>
                    <v-card-title primary-title>
                        <div>
                            <h3 class="headline mb-0">Mme Zaakour Fatna</h3><br>
                            <div>Coordinateur de Filière GA
                            </div>
                        </div>
                    </v-card-title>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
<v-container>

    <v-layout row>
            <v-flex xs12 class="text-xs-center display-1 font-weight-black my-5">Les Filières d' ESTSB</v-flex><br>
   </v-layout>
  
  <v-timeline align-top :dense="$vuetify.breakpoint.smAndDown">
    
    <v-timeline-item
     
      color="indigo"
      icon="book"
      fill-dot
    >
      <v-card
        color="indigo"
        dark
      >
        <v-card-title class="title">Technique de Management</v-card-title>
        <v-card-text class="white text--primary">
          <p>L'objectif du DUT Techniques de management est de former à de nombreux métiers relevant du marketing, de la négociation, du management, du commerce international, de la distribution et de la communication, en vue d’occuper des postes polyvalents, 
            autonomes et évolutifs dans des entreprises publiques ou privées.</p>
        
        </v-card-text>
      </v-card>
    </v-timeline-item>
    <v-timeline-item
     
      color="green lighten-1"
      icon="computer"
      fill-dot
    >
      <v-card
        color="green lighten-1"
        dark
      >
        <v-card-title class="title">Génie Informatique</v-card-title>
        <v-card-text class="white text--primary">
          <p> L'objectif est de Former des informaticiens capables de participer
             à la conception, la réalisation et la mise en oeuvre de solutions 
             informatiques au service des utilisateurs. Parmi les domaines visés :
              informatique pour l'entreprise,
             informatique embarquée et objets connectés, applications web... </p>
        
        </v-card-text>
      </v-card>
    </v-timeline-item>
    <v-timeline-item
     
      color="purple darken-1"
      icon="star"
      fill-dot
    >
      <v-card
        color="purple darken-1"
        dark
      >
        <v-card-title class="title">Génie Agro-environnement</v-card-title>
        <v-card-text class="white text--primary">
          <p> Génie Agro-environnement conçoit et/ou met en oeuvre des projets liés à fois à la production agricole, l'aménagement et la gestion de
             l'espace, et leurs effets sur l'environnement à fin d'informer des techniciens spécialisé et capable dans le domaines .</p>
        </v-card-text>
      </v-card>
    </v-timeline-item>
  </v-timeline>
  </v-container>
  <br><br><br><br>
  <v-footer
    dark
    padless
    style="text-align:center"
   >
    <v-card
      flat
      tile
      color="#1b5299"
      class="  white--text text-center"
    >
      <v-card-text>
        <v-btn
          v-for="icon in icons"
          :key="icon"
          class="mx-4 white--text"
          icon
        >
          <v-icon size="24px">{{ icon }}</v-icon>
        </v-btn>
      </v-card-text>

      <v-card-text class="white--text pt-0">
       ESTSB Elle a été créée en Août 2016 par le Ministère de l’Enseignement Supérieur, 
       de la Formation des Cadres et de la Recherche Scientifique du Royaume du Maroc.
       L’ESTSB est une composante de l’Université Chouaib Doukkali d’El Jadida.
      </v-card-text>

      <v-divider></v-divider>

      <v-card-text class="white--text">
        {{ new Date().getFullYear() }} — <strong>SEJELNI</strong>
      </v-card-text>
    </v-card>
  </v-footer>
    <v-row justify="center" style="position: absolute;">
             <v-dialog v-model="dialo"   max-width="700px">
              <v-stepper v-model="e6"   >
                <v-stepper-header>
                  <v-stepper-step :complete="e6 > 1" step="1"> Info Global </v-stepper-step>
                  <v-stepper-step :complete="e6 > 2" step="2">Infos Personnels</v-stepper-step>
                  <v-stepper-step :complete="e6 > 3" step="3">Configuration Compte</v-stepper-step>
                </v-stepper-header>
                    <!--form  1-->
                <v-stepper-content step="1">
                    <v-form ref="form" v-model="valid" lazy-validation  >
                    <v-layout>
                    <v-flex d-flex lg6>
                    <v-text-field v-model="cne" :rules="nomRules" :counter="4" label="CNE" required  ></v-text-field>
                    </v-flex>
                    <v-flex d-flex lg6>
                    <v-spacer></v-spacer>
                    <v-text-field v-model="cin" :rules="prenomRules" label="CI" required  />
                    </v-flex>
                    </v-layout>
                    <v-layout> 
                      <v-flex d-flex lg6>
                        <v-select  v-model="sexe" :items="select" item-value="select" 
                        label="Sexe" required/>
                      </v-flex>
                      <v-spacer></v-spacer>
                      <vue-tel-input v-model="tele" label="Téléphone" ></vue-tel-input>
  
                    </v-layout>
                    <v-layout>
                     <v-flex d-flex lg6>
                      <v-text-field v-model="nom" :rules="prenomRules" label="Nom" required  />
                     </v-flex>
                     
                     <v-flex d-flex lg6> <v-spacer></v-spacer>
                      <v-text-field v-model="prenom" :rules="prenomRules" label="Prenom" required  />
                     </v-flex>
                    </v-layout>
                     <v-layout>
                       <v-menu
                            v-model="date_du_bac" :close-on-content-click="false" :nudge-right="40"
                           transition="scale-transition"   offset-y  max-width="290px" min-width="290px">
                         <template v-slot:activator="{ on }">
                              <v-text-field label="Date du Bac" prepend-icon="event" readonly :value="fromDateDisp" v-on="on" >
                              </v-text-field>
                         </template>
                         <v-date-picker locale="fr-fr"  v-model="fromDateVal" no-title @input="date_du_bac = false"
                           :min="minDate" type="year"
                         ></v-date-picker>
                      </v-menu>
                     <v-flex d-flex lg6> <v-spacer></v-spacer>
                      <v-select v-model="filiere_du_bac" :rules="prenomRules" :items="selec" label="Filière du Bac" required  />
                     </v-flex>
                    </v-layout>
                    <v-card-actions>
                     <v-spacer></v-spacer>
                     <v-btn color="primary" @click="submit"><v-icon>navigate_next</v-icon>Suivre</v-btn>
                     </v-card-actions>
                </v-form>
                </v-stepper-content>
                <!--form2-->
                <v-stepper-content step="2">
                  <v-form ref="form" v-model="valid" lazy-validation>
                     <v-layout>
                      <v-menu
                            v-model="date_de_naissance" :close-on-content-click="false" :nudge-right="40"
                           transition="scale-transition"   offset-y  max-width="290px" min-width="290px">
                         <template v-slot:activator="{ on }">
                              <v-text-field label="Date du Naissance" prepend-icon="event" readonly :value="fromDateDis" v-on="on" >
                              </v-text-field>
                         </template>
                         <v-date-picker locale="fr-fr"  v-model="formdate" no-title @input="date_de_naissance = false"
                           :min="minDate" 
                         ></v-date-picker>
                      </v-menu>
                      <v-flex d-flex lg6> <v-spacer></v-spacer>
                         <v-text-field v-model="lieu_de_naissance" :rules="prenomRules" label="Lieu de naissance" required  />
                      </v-flex>
                     </v-layout>
                 
                     <v-layout>
                      <v-flex d-flex lg6>
                         <v-text-field v-model="pays" :rules="prenomRules" label="Pay" required  />
                      </v-flex>
                     
                      <v-flex d-flex lg6> <v-spacer></v-spacer>
                         <v-text-field v-model="region" :rules="prenomRules" label="Région" required  />
                      </v-flex>
                     </v-layout>
                     <v-layout>
                      <v-flex d-flex lg6> 
                         <v-text-field v-model="province" :rules="prenomRules" label="Province" required  />
                      </v-flex>
                     
                      <v-flex d-flex lg6> <v-spacer></v-spacer>
                         <v-text-field v-model="adress" :rules="prenomRules" label="Adress" required  />
                      </v-flex>
                     </v-layout>
                     <v-layout>
                        <v-flex d-flex lg6> 
                          <v-select v-model="filier_id_1" :items="tabs" label="Filière 1" item-text="nom" item-value="id">
                          </v-select>
                        </v-flex> 
                        <v-flex d-flex lg6> <v-spacer></v-spacer>
                         <v-select v-model="filier_id_2" :items="tabs" label="Filière 1" item-text="nom" item-value="id"
                        ></v-select>
                        </v-flex > 
                     </v-layout>
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
                  <!--form 3-->
                 <v-stepper-content step="3">
                    <v-flex d-flex >
                          <v-text-field v-model="email"   :rules="emailRules" label="E-mail" required />
                        </v-flex>
                   <v-layout>
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
                   </v-layout>
                    <v-card-actions>
                       <v-btn color="primary" @click="e6 = 2"> 
                         <v-icon>navigate_before</v-icon> 
                         retoure
                        </v-btn>
                       <v-spacer></v-spacer>
                       <v-btn color="primary" @click="store()"> 
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
    </v-row>
     <!-- snackbar-->
          <v-snackbar v-model="snackbar" :timeout="4000"    :color="color" left>
                <span>{{text}}</span>
                <v-btn flat color="white" @click="snackbar = false" > Fermer </v-btn>
          </v-snackbar>
     <!-- end snackbar-->
</v-card>

</template>
<script>
  import axios from 'axios'
  export default {
    data: () => ({
      select:[ 'F','H' ],
      
      dialo:false,
      dialog: false,
      e6: 1,
      selec:['SM','PC','SVT',''],
      icons: [
        'fa fa-facebook',
        'fa fa-google-plus',
        'fa fa-linkedin',
        'fa fa-instagram',
      ],
    date_du_bac: false,
    tabs:[],
        fromDateVal: new Date().toISOString().substr(0, 4),
        formdate:'',
        date_de_naissance:false,
        minDate: "1999-07-04",
        maxDate: "2030-08-30",
     sheet: false,
      rules: [
        value => !value || value.size < 2000000 || 'Avatar size should be less than 2 MB!',
      ],
      items: [
        {
          color: 'red lighten-2',
          icon: 'mdi-star',
        },
        {
          color: 'purple darken-1',
          icon: 'book-variant',
        },
        {
          color: 'green lighten-1',
          icon: 'airballoon',
        },
        {
          color: 'indigo',
          icon: 'buffer',
        },
      ],
          cne: '',
          cin: '',
          nom: '',
          prenom: '',
          tele:'',
          sexe:'',
          
          filiere_du_bac:'',
          lieu_de_naissance:'',
          pays:'',
          region:'',
          province:'',
          adress:'',
          filier_id_1:'',
          filier_id_2:'',
          email:  '',
          password: '',
          accepet:'',
          showPassword: null,
          showPasswordConfirm: null,
          passwordConfirm:'',
          accepet:false
    }),
    mounted(){
      this.getF()
    },
    methods:{
       show()
       {
         this.dialo=true;
         this.e6=1;
       }, submit () {
         this.$refs.form.validate(),
            this.e6=2;
       
      },
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
      
      if(this.password === this.passwordConfirm)
      {
      axios.post('/api/condidat' ,{

          cne: this.cne,
          cin: this.cin,
          nom: this.nom,
          prenom: this.prenom,
          tele:this.tele,
          sexe:this.sexe,
          date_du_bac:this.fromDateVal,
          filiere_du_bac:this.filiere_du_bac,
          date_de_naissance:this.formdate,
          lieu_de_naissance:this.lieu_de_naissance,
          pays:this.pays,
          region:this.region,
          province:this.province,
          adress:this.adress,
          filier_id_1:this.filier_id_1,
          filier_id_2:this.filier_id_2,
          email:  this.email,
          password: this.password,
          accepet:this.accepet,

        }).then((res)=>{
        this.m=true;
        if (this.m==true) {
            
                 this.text="Votre inscription a fais avec succèss";
                 this.color="success";
                 this.snackbar=true;
                 this.$router.push({name:'LoginStudent'})
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
      }
      else return 0;
        
    },
    },
      computed: {
      fromDateDisp() {
        this.fromDateVal=this.fromDateVal.substr(0, 4);
        return this.fromDateVal;
     
      },
       fromDateDis() {
        return this.formdate;
     
      },

    }
  
  }
</script>
<style>
  .v-sheet--offset {
    top: -24px;
    position: relative;
  }

.home-hero {
    background: url('/static/file-20181010-72121-1o65u8e.jpg');
    background-size: cover;
    width: 100%;
    height: 100%;
}

</style>