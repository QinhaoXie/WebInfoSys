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
          <router-link to="/dashboard">
              <v-btn  plain large text>
            DashBoard
            </v-btn>
          </router-link>

            <router-link to="/Upload">
              <v-btn  plain large text>
            Upload
            </v-btn>
          </router-link>
            <router-link to="/map">
              <v-btn  plain large text>
              Map
            </v-btn>
          </router-link>
            <a href="https://infs3202-942629ae.uqcloud.net/lara/pdf">
            <v-btn plain large text>
              Download pdf
            </v-btn>
           </a>
             
          
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
              <v-btn v-if="this.showlogin" plain large text>
              Login
            </v-btn>
          </router-link>
          <router-link to="/register">
            <v-btn v-if="this.showlogin" plain large>
            Register
          </v-btn>
        </router-link>
        <v-btn v-if="!this.showlogin" @click="logout" plain large>
            Logout
          </v-btn>
          <router-link to="/userprofile">
            <v-btn v-if="!this.showlogin" plain large>
            Profile
          </v-btn>
        </router-link>

    <v-navigation-drawer
              v-model="drawer"
              app
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
            </v-navigation-drawer>


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
                <v-tab><router-link to="/MyCourses" style="text-decoration: none;">My Links</router-link></v-tab>
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

  import $ from 'jquery'
  import Cookies from 'js-cookie';
  // if($.cookie("laravel_session")){
  // //   // $("#loginbtnhead").hide();
  // }
  // console.log(this.cookies.isKey(key));
  // import TabOne from '@/components/Header/TabOne.vue'
  import TabTwo from '@/components/Header/TabTwo.vue'

  export default {
    name: 'MainpageHeader',
  
    components: {
      // TabOne,
      TabTwo
    },
    methods:{
      logout(){
        $.get("https://infs3202-942629ae.uqcloud.net/lara/userlogout", function(data, status){
         alert("Data: " + data + "\nStatus: " + status);
         Cookies.remove("PHPSESSID");
         
         window.location.href="https://infs3202-942629ae.uqcloud.net/vue";
        });
      },
    }
    ,
    mounted:function(){
      console.log(this.$cookies.keys())
      console.log(Cookies.get("laravel_session"));
      if(this.$cookies.isKey('PHPSESSID')){
        this.showlogin=false;
        
      }
      
    },
    data: () => ({
      showlogin:true,
      // selectedItem: 0,
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
  
  
