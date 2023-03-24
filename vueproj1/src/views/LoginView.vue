<template>
  <v-app class="overflow-hidden" >
    
    <v-main>      
      <div>
    
        <NeviMenu/>
        <!-- space before login sheet -->
        <v-container style="height: 150px;"> </v-container>
        <!-- login sheet -->
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
                        <!-- top Login Form Bar -->
                        <v-toolbar
                          color="primary"
                          dark
                          flat
                        >
                            <!-- background-color -->
                            <template v-slot:img="{ props }">
                              <v-img
                                v-bind="props"
                                gradient="to top right, rgba(100,115,201,.7), rgba(25,32,72,.7)"
                              ></v-img>
                            </template>
                            <!-- text -->
                            <v-app-bar-title>Login Form</v-app-bar-title>
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
                      <v-checkbox
                      v-model="checkbox"
                      :label="`Remember me`"
                      ></v-checkbox>
                    </v-card-text>
                    
                    <v-card-actions>
                     
                     <v-spacer></v-spacer>
                      <v-btn id="loginbtn" color="primary">Login</v-btn>
                    </v-card-actions>
                  </v-card>
                </v-col>
              </v-row>
            </v-container>
   
            
            <!-- <MainpageFooter/> -->

        </v-sheet>
      </div>
    </v-main>
   
  </v-app>
  
</template>

<script>
// @ is an alias to /src
// import $ from 'jquery'
import NeviMenu from '@/components/NeviMenu';
//  import MainpageHeader from '@/components/MainpageHeader';
//  import MainpageFooter from '@/components/MainpageFooter';
// $(document).ready(function(){
//   $("#loginbtn").click(function(){
//   var htmlobj=$.ajax({url:"",async:false});
//   $("#app").html(htmlobj.responseText);
//   });
// });
export default {
  name: 'LoginView',

  components: {
    // MainpageHeader,
    // MainpageFooter,
    NeviMenu,
    // HelloWorld,
  },

  data: () => ({
    drawer: false,
    checkbox: false,
    }),


    // watch: {
    //   group () {
    //     this.drawer = false
    //   },
    // },

};
</script>




