<template>
  <v-app class="overflow-hidden"
  >
  <TabOne/>

    
     <!-- <MainpageFooter/>  -->
  </v-app>
  
</template>

<script>
// @ is an alias to /src
//  import MainpageHeader from '@/components/MainpageHeader';
//  import MainpageFooter from '@/components/MainpageFooter';
 import TabOne from '@/components/Header/TabOne';
export default {
  name: 'HomeView',

  components: {
    TabOne
    // MainpageHeader,
    // MainpageFooter,
    // HelloWorld,
  },

  // data: () => ({
  //   //
  // }),
  data: () => ({
    drawer: false,

    }),


    // watch: {
    //   group () {
    //     this.drawer = false
    //   },
    // },

};
</script>




