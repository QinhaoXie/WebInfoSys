<template>
  <v-app>
    <MainpageHeader/>
    <template>

    </template>
    <v-main>
    </v-main>
      <MainpageFooter/>
  </v-app>
  
</template>

<script>
// @ is an alias to /src
 import MainpageHeader from '@/components/MainpageHeader';
 import MainpageFooter from '@/components/MainpageFooter';
export default {
  name: 'HomeView',

  components: {
    MainpageHeader,
    MainpageFooter,
    // HelloWorld,
  },

  // data: () => ({
  //   //
  // }),
  data: () => ({


    }),


    // watch: {
    //   group () {
    //     this.drawer = false
    //   },
    // },

};
</script>




