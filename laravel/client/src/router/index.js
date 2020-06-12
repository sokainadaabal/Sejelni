import Vue from "vue";
import VueRouter from "vue-router";

import axios from "axios";
import VueAxios from 'vue-axios';


import Error from '../pages/core/Error.vue';
import Login from '../pages/core/Login.vue';
import Administration from '../pages/Administration.vue';
import Home from '../pages/Home.vue';
import Filiere from '../pages/Filiere.vue';
import Option from '../pages/Option.vue';
import Etudiants1 from '../pages/Etudiants1.vue';
import Etudiants2 from '../pages/Etudiants2.vue';
import Profile from '../pages/Profile.vue';
import LoginStudent from '../pages/Students/LoginStudent';
import HomeS from '../pages/Students/HomeS';
import Acceuil from '../pages/Acceuil.vue';
Vue.use(VueAxios, axios);
Vue.use(VueRouter);





export default new VueRouter({
  routes: [
   {   
    path: '/home',
    name: 'Home',
    component: Home,
    meta: {
      breadcrumb: [
        { name: 'Home' }
      ],
      
    }
  },
  {   
    path: '/',
    name: 'Acceuil',
    component:Acceuil,},
  {   
    path: '/home-student',
    name: 'HomeS',
    component: HomeS,
    meta: {
      breadcrumb: [
        { name: 'Home ', href: 'home-student' },
        { name: 'Student' }
      ],
      
    }
  },
  {
    path: '/administartion',
    name: 'Administration',
    component:Administration,
    meta: {
      breadcrumb: [
        { name: 'Home', href: 'Home' },
        { name: 'Administraion' }
      ],
      
    }
  },
  
  {
    path: '/filier',
    name: 'Filiéres',
    component:Filiere,
    meta: {
      breadcrumb: [
        { name: 'Home', href: 'Home' },
        { name: 'Filiéres' }
      ], 
    }
  },
  ,
  {
    path: '/profile',
    name: 'Profile',
    component:Profile,
    meta: {
      breadcrumb: [
        { name: 'Home', href: 'Home' },
        { name: 'Profile' }
      ]
    }
  },
  {
    path: '/option',
    name: 'Option',
    component: Option,
    meta: {
      breadcrumb: [
        { name: 'Home', href: 'Home' },
        { name: 'Options' }
      ]
    }
  },
  {
    path: '/etudiants1',
    name: 'Etudiants1',
    component: Etudiants1,
    meta: {
      breadcrumb: [
        { name: 'Home', href: 'Home' },
        { name: 'Etudiants Pré-Inscrit'}
      ]
    }
  },
  {
    path: '/etudiants2',
    name: 'Etudiants2',
    component: Etudiants2,
    meta: {
      breadcrumb: [
        { name: 'Home', href: 'Home' },
        { name: 'Etudiants Inscrit '}
      ]
    }
  },
  {
    path: '/Admin',
    name: 'Login',
    component: Login,
    meta: {
      allowAnonymous: true,
      
    }
  }
, {
  path: '/Student',
  name: 'LoginStudent',
  component: LoginStudent,
  meta: {
    allowAnonymous: true,
    
  }
}
,
  {
    path: '/error',
    name: 'Error',
    component: Error,
    meta: {
      allowAnonymous: true
    }
  },
]
});


