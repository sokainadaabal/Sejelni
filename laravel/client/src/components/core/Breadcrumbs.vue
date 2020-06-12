<template class="breadcrumbs">
  <v-breadcrumbs :items="items" class="breadcrumbs" divider="/">
    <template slot="item" slot-scope="props">
      <router-link :to="{ name: props.item.href }" class="link">{{ props.item.name }}</router-link>
    </template>
  </v-breadcrumbs>
</template>

<script>
export default {
  data() {
    return {
      items: []
    }
  },

  watch: {
    '$route' () {
      const vm = this;

      vm.updateBreadcrumbs();
    }
  },

  mounted() {
    const vm = this;

    vm.updateBreadcrumbs();
  },

  methods: {
    updateBreadcrumbs() {
      const vm = this;

      vm.items = vm.$route.meta.breadcrumb;
    }
  }
}
</script>

<style>
  .breadcrumbs .link {
    background:white;
    text-decoration: none;
    color:#1b5299;
    font: bold 24px Sans-Serif;
    letter-spacing: -1px;
    white-space: nowrap;
    display: inline-block;
    position: relative;
  }
  .breadcrumbs{
  background-color:white;
  }

</style>