<template>
  <v-app class="overflow-hidden"
  >
  <TabTwo/>

    
     <!-- <MainpageFooter/>  -->
  </v-app>
  
</template>

<script>
// @ is an alias to /src
//  import MainpageHeader from '@/components/MainpageHeader';
//  import MainpageFooter from '@/components/MainpageFooter';
 import TabTwo from '@/components/Header/TabTwo';
export default {
  name: 'HomeView2',

  components: {
    TabTwo
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




