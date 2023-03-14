<template>
  <v-app class="overflow-hidden"
  >

    <v-container style="height: 80px;"> </v-container>
    <v-container>
     
      
    </v-container>  
    <v-main class="d-flex">      
      <div >

            <v-navigation-drawer
              v-model="drawer"
              app
            >
              <v-list dense>
                <v-list-item link>
                  <v-list-item-action>
                    <v-icon>mdi-home</v-icon>
                  </v-list-item-action>
                  <v-list-item-content>
                    <v-list-item-title>Home</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                  <v-list-item-action>
                    <v-icon>mdi-email</v-icon>
                  </v-list-item-action>
                  <v-list-item-content>
                    <v-list-item-title>Contact</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </v-list>
            </v-navigation-drawer>

           
          <!-- <v-container>
            <v-sheet 
              id="scrolling-techniques-3"
              class="overflow-y-auto"
              height:2000px
              max-height="1000"
            >
              <v-container style="height: 2000px;"> </v-container>
            </v-sheet>
            
          </v-container>   -->
                                     
            <!-- <v-app-bar
              app
              color="indigo"
              dark
            >
              <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
              <v-toolbar-title>Application</v-toolbar-title>
            </v-app-bar> -->
        
            <!-- <v-main>
            </v-main> -->
            
      </div>
      <div> <v-sheet 
        
          id="scrolling-techniques-3"
          class="overflow-y-auto"
  
          max-height="80vh"
        >
          <v-container style="height: 2000px;"> </v-container>
        </v-sheet></div>
    </v-main>
    <MainpageFooter/>
  </v-app>
  
</template>

<script>
// @ is an alias to /src
//  import MainpageHeader from '@/components/MainpageHeader';
 import MainpageFooter from '@/components/MainpageFooter';
export default {
  name: 'HomeView',

  components: {
    // MainpageHeader,
    MainpageFooter,
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




