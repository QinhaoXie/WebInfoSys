<template>
  <v-app class="overflow-hidden"
  >

    <NeviMenu/>

   

   
    <v-main>      
      <div>
        <v-container style="height: 400px;"> </v-container>
        <v-sheet>

            
              <v-container
              class="fill-height"
              fluid
            >
              <v-row
                align="center"
                justify="center"
              >
                <v-col
                  cols="12"
                  sm="8"
                  md="4"
                >
                  <v-card class="elevation-12">
                        <v-toolbar
                          color="primary"
                          dark
                          flat
                        >
                        <v-toolbar-title>Login form</v-toolbar-title>
                          <v-spacer></v-spacer>
                        </v-toolbar>
                    <v-card-text>
                      <v-form>
                        <v-text-field
                          label="Login"
                          name="login"
                          prepend-icon="mdi-account"
                          type="text"
                        ></v-text-field>
      
                        <v-text-field
                          id="password"
                          label="Password"
                          name="password"
                          prepend-icon="mdi-lock"
                          type="password"
                        ></v-text-field>
                      </v-form>
                    </v-card-text>
                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn color="primary">Login</v-btn>
                    </v-card-actions>
                  </v-card>
                </v-col>
              </v-row>
            </v-container>
   
            
            <MainpageFooter/>

        </v-sheet>
      </div>
    </v-main>
   
  </v-app>
  
</template>

<script>
// @ is an alias to /src
import NeviMenu from '@/components/NeviMenu';
//  import MainpageHeader from '@/components/MainpageHeader';
 import MainpageFooter from '@/components/MainpageFooter';
export default {
  name: 'LoginView',

  components: {
    // MainpageHeader,
    MainpageFooter,
    NeviMenu,
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




