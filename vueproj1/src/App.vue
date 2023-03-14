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
      selectedItem: 0,
      items: [
        { text: 'My Files', icon: 'mdi-folder' },
        { text: 'Shared with me', icon: 'mdi-account-multiple' },
        { text: 'Starred', icon: 'mdi-star' },
        { text: 'Recent', icon: 'mdi-history' },
        { text: 'Offline', icon: 'mdi-check-circle' },
        { text: 'Uploads', icon: 'mdi-upload' },
        { text: 'Backups', icon: 'mdi-cloud-upload' },
      ],
      drawer: false,
      group: null,
    }),


    // watch: {
    //   group () {
    //     this.drawer = false
    //   },
    // },

};
</script>


