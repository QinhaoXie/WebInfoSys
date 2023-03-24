<template>
  <!-- <v-app-bar> -->
 <!-- <v-app-bar> -->
        <!-- <v-card class="overflow-hidden"> -->
          <v-app-bar
          
          class="overflow-hidden"            
            color="#6A76AB"
            dark
            
            prominent
            src="https://picsum.photos/1920/1080?random"
            fade-img-on-scroll
            
          >
            <template v-slot:img="{ props }">
              <v-img
                v-bind="props"
                gradient="to top right, rgba(100,115,201,.7), rgba(25,32,72,.7)"
              ></v-img>
            </template>
      
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

            <v-app-bar-title>Online Learning</v-app-bar-title>
      
            <v-spacer></v-spacer>
            
            <v-btn icon>
              <v-icon>mdi-magnify</v-icon>
            </v-btn>

            <v-btn icon>
              <v-icon>mdi-heart</v-icon>
            </v-btn>
      
            <v-btn icon>
              <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>
            <router-link to="/login">
              <v-btn plain large text>
              Login
            </v-btn>
          </router-link>
          <router-link to="/register">
            <v-btn plain large>
            Register
          </v-btn>
        </router-link>
            
            <template v-slot:extension>
              <v-tabs align-with-title >
                <v-tab><router-link to="/" style="text-decoration: none;">Find Courses</router-link></v-tab>
                <v-tab-item >
                  
                <v-card                 
                  flat
                  tile
                  class="mx-auto"
                >
                      <!-- <TabOne/> -->
                  <v-card-text>1</v-card-text>
                </v-card>
              </v-tab-item>
              <v-tab><router-link to="/MyCourses" style="text-decoration: none;">My Courses</router-link></v-tab>
                <v-tab-item>
                  <v-card
                    flat
                    tile
                  >
                  <TabTwo/>
                    <v-card-text>2</v-card-text>
                  </v-card>
                </v-tab-item>
                <v-tab>Tab 3</v-tab>
                <v-tab-item>
                  <v-card
                    flat
                    tile
                  >
                    <v-card-text>3</v-card-text>
                  </v-card>
                </v-tab-item>
              </v-tabs>
            </template>
          </v-app-bar>

  <!-- </v-app-bar> -->
   

  </template>
  
  <script>


  // import TabOne from '@/components/Header/TabOne.vue'
  import TabTwo from '@/components/Header/TabTwo.vue'
  export default {
    name: 'MainpageHeader',
  
    components: {
      // TabOne,
      TabTwo
    },
  
    data: () => ({
      // selectedItem: 0,
      // items: [
      //   { text: 'My Files', icon: 'mdi-folder' },
      //   { text: 'Shared with me', icon: 'mdi-account-multiple' },
      //   { text: 'Starred', icon: 'mdi-star' },
      //   { text: 'Recent', icon: 'mdi-history' },
      //   { text: 'Offline', icon: 'mdi-check-circle' },
      //   { text: 'Uploads', icon: 'mdi-upload' },
      //   { text: 'Backups', icon: 'mdi-cloud-upload' },
      // ],
      
      // drawer: false,
      // group: null,
    }),
    // watch: {
    //   group () {
    //     this.drawer = false
    //   },
    // },

  
  }
  </script>
  <style scoped>
  a:visited {
    color:white;
    }
  </style>
  
  