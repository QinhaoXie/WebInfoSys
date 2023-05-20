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
                          v-model="register.username"
                          ></v-text-field>
                        <v-text-field
                          id="password"
                          label="Password"
                          name="password"
                          prepend-icon="mdi-lock"
                          type="password"
                          v-model="register.password"
                        ></v-text-field>
                        <v-text-field
                        id="password2"
                        label="Password Again"
                        name="password"
                        prepend-icon="mdi-lock"
                        type="password"
                        v-model="register.password2"
                      ></v-text-field>
                        <v-text-field
                          label="Email"
                          name="Email"
                          prepend-icon="mdi-account"
                          type="text"
                          v-model="register.email"
                        ></v-text-field>
                        <v-text-field
                          label="What is your bestfriend's name"
                          name="bestfriend"
                          prepend-icon="mdi-account"
                          type="text"
                          v-model="register.bestfriend"
                        ></v-text-field>
                        <v-text-field
                          label="What is your favorite toy"
                          name="favoritetoy"
                          prepend-icon="mdi-account"
                          type="text"
                          v-model="register.favoritetoy"
                        ></v-text-field>
                      </v-form>
                      
                      <component :is="currentComp" v-bind="errmsg">{{ errmsg }}</component>
                      
                    </v-card-text> 
                    
                    <v-card-actions>
                     
                     <v-spacer></v-spacer>
                      <v-btn @click="request1" color="primary">Register</v-btn>
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

import $ from 'jquery'
//  import MainpageHeader from '@/components/MainpageHeader';
//  import MainpageFooter from '@/components/MainpageFooter';
import AlertComp from "@/components/AlertComp"

var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
function isEmailAddress(str) {
    // str = "azamsharp@gmail.com";      
    // alert(str.match(pattern)); 
    return str.match(pattern);    

}



export default {
  name: 'RegisterView',

  components: {
    // MainpageHeader,
    // MainpageFooter,
    NeviMenu,
    AlertComp
    // HelloWorld,
  },

  data: () => ({
    errmsg:"",
    drawer: false,
    checkbox: false,
    currentComp:"AlertCmp",
    register:{username:null,
      password:null,
      password2:null,
      email:null,
      bestfriend:null,
      favoritetoy:null,

    },
    }),

    methods: {
    request1() {
      if(this.register.username=="" || this.register.username==null){
        console.log("please input username");
        this.errmsg="please input username";
        this.currentComp="AlertComp";
        }else if(this.register.password=="" || this.register.password==null){
          console.log("please input password");
        this.errmsg="please input password";
        this.currentComp="AlertComp";
      }else if(this.register.password2=="" || this.register.password2==null){
          console.log("please input password again");
        this.errmsg="please input password again";
        this.currentComp="AlertComp";
      }else if(this.register.email==null || isEmailAddress(this.register.email)==null){
        console.log("please inout a valid email");
        this.errmsg="please inout a valid email";
        this.currentComp="AlertComp";
      }else if(this.register.password==this.register.password2){
              console.log("1=2");
              var url="https://infs3202-942629ae.uqcloud.net/lara/user/register/"+this.register.username+"/"+this.register.password+"/"+this.register.email+"/"+this.register.bestfriend +"/"+ this.register.favoritetoy+"/";
              console.log(url);
              var htmlobj=$.ajax({url:url,
                                  dataType:'text',
                                  async:false,
                                  success:function(data){
                                  console.log(data);
                                  }
                                })
              if(htmlobj.responseText=="register success"){
                this.$router.push('/registersuccess');
              }
      }else{
        console.log("1!=2");
        this.errmsg="password validation fail,please make sure two password are identical";
        this.currentComp="AlertComp";
      } 
    }}
    // watch: {
    //   group () {
    //     this.drawer = false
    //   },
    // },

};
</script>




