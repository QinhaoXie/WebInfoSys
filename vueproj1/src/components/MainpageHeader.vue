<template>
  <v-container>
 <!-- <v-app-bar> -->
        <!-- <v-card class="overflow-hidden"> -->
          <v-app-bar
          class="overflow-hidden"
            absolute
            color="#6A76AB"
            dark
            shrink-on-scroll
            prominent
            src="https://picsum.photos/1920/1080?random"
            fade-img-on-scroll
            scroll-target="#scrolling-techniques-3"
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
              <v-btn plain x-large>
              Login
            </v-btn>
          </router-link>
            
            <template v-slot:extension>
              <v-tabs align-with-title>
                <v-tab>Find Courses</v-tab>
                <v-tab>My Courses</v-tab>
                <v-tab>Tab 3</v-tab>
              </v-tabs>
            </template>
          </v-app-bar>



                                    
        <!-- </v-card> -->

          <!-- <v-navigation-drawer
            v-model="drawer"
            absolute
            bottom
            temporary
          >
          <v-system-bar></v-system-bar>
          <v-list>
            <v-list-item>
              <v-list-item-avatar>
                <v-img src="https://cdn.vuetifyjs.com/images/john.png"></v-img>
              </v-list-item-avatar>
            </v-list-item>
      
            <v-list-item link>
              <v-list-item-content>
                <v-list-item-title class="text-h6">
                  John Leider
                </v-list-item-title>
                <v-list-item-subtitle>john@vuetifyjs.com</v-list-item-subtitle>
              </v-list-item-content>
      
              <v-list-item-action>
                <v-icon>mdi-menu-down</v-icon>
              </v-list-item-action>
            </v-list-item>
          </v-list>
          <v-divider></v-divider>
          <v-list
            nav
            dense
          >
            <v-list-item-group
              v-model="selectedItem"
              color="primary"
            >
              <v-list-item
                v-for="(item, i) in items"
                :key="i"
              >
                <v-list-item-icon>
                  <v-icon v-text="item.icon"></v-icon>
                </v-list-item-icon>
      
                <v-list-item-content>
                  <v-list-item-title v-text="item.text"></v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-list-item-group>
          </v-list>
          </v-navigation-drawer> -->
  </v-container>
   

  </template>
  
  <script>

  
  export default {
    name: 'MainpageHeader',
  
    components: {

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
  
  
  