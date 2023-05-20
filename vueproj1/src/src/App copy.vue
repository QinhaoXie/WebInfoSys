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
 import MainpageHeader from './components/MainpageHeader';
 import MainpageFooter from './components/MainpageFooter';
export default {
  name: 'App',

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


