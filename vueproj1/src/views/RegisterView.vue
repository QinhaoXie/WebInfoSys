<template>
  <v-app class="overflow-hidden">
    
    <v-main>      
      <div>
    
        <NeviMenu/>
        <!-- space before Register sheet -->
        <v-container style="height: 150px;"> </v-container>
        <!-- Register sheet -->
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
                        <!-- top Register Form Bar -->
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
                            <v-app-bar-title>Register Form</v-app-bar-title>
                            <v-spacer></v-spacer>
                        </v-toolbar>
                    <v-card-text>
                      <v-form>
                        <v-text-field
                          label="Username"
                          name="Username"
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
                        <v-text-field
                        id="password2"
                        label="Password Again"
                        name="password"
                        prepend-icon="mdi-lock"
                        type="password"
                      ></v-text-field>
                        <v-text-field
                          label="Email"
                          name="Email"
                          prepend-icon="mdi-account"
                          type="text"
                        ></v-text-field>
                      </v-form>

                    </v-card-text>
                    
                    <v-card-actions>
                     
                     <v-spacer></v-spacer>
                      <v-btn color="primary">Register</v-btn>
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
import NeviMenu from '@/components/NeviMenu';
//  import MainpageHeader from '@/components/MainpageHeader';
//  import MainpageFooter from '@/components/MainpageFooter';
export default {
  name: 'RegisterView',

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




