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
                            <v-app-bar-title>Forgot Password</v-app-bar-title>
                            <v-spacer></v-spacer>
                        </v-toolbar>
                    <v-card-text>
                      <v-form>
                        <v-text-field
                          label="email"
                          name="email"
                          prepend-icon="mdi-account"
                          type="text"
                          v-model="forgotpwd.email"
                        ></v-text-field>
                      </v-form>
                      
                      
                    </v-card-text>
                    
                    <v-card-actions>
                      
                      
                     <v-spacer></v-spacer>
                      <v-btn  @click="resetpost" color="primary">Reset</v-btn>
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
import $ from 'jquery'
import NeviMenu from '@/components/NeviMenu';
//  import MainpageHeader from '@/components/MainpageHeader';
//  import MainpageFooter from '@/components/MainpageFooter';
$(document).ready(function(){
  $("#resetbtn").click(function(){
//   $.ajax({url:"https://infs3202-942629ae.uqcloud.net/lara/forgot-password",
//   dataType:'json',
//   async:false,
//   success:function(data){
//   console.log(data);
//   }
// });
// console.log("clicked");
// $.post("https://infs3202-942629ae.uqcloud.net/lara/forgot-password",
//   {
//     email: this.forgotpwd.email,
//   },
//   function(data, status){
//     alert("Data: " + data + "\nStatus: " + status);
//   });
// alert(htmlobj.responseText)
  });
});
export default {
  name: 'ForgotpasswordView',

  components: {
    // MainpageHeader,
    // MainpageFooter,
    NeviMenu,
    // HelloWorld,
  },

  data: () => ({
    drawer: false,
    checkbox: false,
    forgotpwd:{
      email:null
    },
  }),
  methods:{
    resetpost(){
      console.log("clicked");
      $.post("https://infs3202-942629ae.uqcloud.net/lara/forgot-password",
        {
          email: this.forgotpwd.email,
        },
        function(data, status){
          console.log("Data: " + data + "\nStatus: " + status);
        });
    }
  }
    // watch: {
    //   group () {
    //     this.drawer = false
    //   },
    // },

};
</script>




