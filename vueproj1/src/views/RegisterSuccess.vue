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
                        <v-card-title>congratulations！</v-card-title> 
                        <v-card-text>You have signed up your account!<br/>
                          Let's login from <router-link to="/login">here</router-link>
                        </v-card-text>
                      </v-form>

                    </v-card-text>
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
// import { Router } from 'express';
// import $ from 'jquery'
//  import MainpageHeader from '@/components/MainpageHeader';
//  import MainpageFooter from '@/components/MainpageFooter';
export default {
  name: 'RegisterSuccess',

  components: {
    // MainpageHeader,
    // MainpageFooter,
    NeviMenu,
    // Router
},

  data: () => ({
    drawer: false,
    checkbox: false,
    register:{username:null,
      password:null,
      password2:null,
      email:null
    },
    }),

    methods: {
    // request1() {
    //   var url="https://infs3202-942629ae.uqcloud.net/lara/user/register/"+this.register.username+"/"+this.register.password+"/"+this.register.email+"/"
    //   var htmlobj=$.ajax({url:url,
    //                       dataType:'text',
    //                       async:false,
    //                       success:function(data){
    //                       console.log(data);
    //                       }
    //                     })
    // if(htmlobj.responseText=="register success"){
    //   this.$router.push('/');
    // }      
    // }}
    // watch: {
    //   group () {
    //     this.drawer = false
    //   },
    },

};
</script>




