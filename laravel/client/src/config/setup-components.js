// Core Components

import Toolbar from '../components/core/Toolbar.vue';
import Navigation from '../components/core/NavigationDrawer.vue';
import Breadcrumbs from '../components/core/Breadcrumbs.vue';
import PageFooter from '../components/core/PageFooter.vue';
import Widget from '../components/Widget.vue';


function setupComponents(Vue){
 if (localStorage.getItem('usertoken')) {

  Vue.component('toolbar', Toolbar);
  Vue.component('navigation', Navigation);
  Vue.component('breadcrumbs', Breadcrumbs);
  Vue.component('page-footer', PageFooter);
  Vue.component('widget',Widget);
 }
 else
 {
     
 }
}

export {setupComponents};