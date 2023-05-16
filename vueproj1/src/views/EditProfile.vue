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
                            <v-app-bar-title>personal profile</v-app-bar-title>
                            <v-spacer></v-spacer>
                        </v-toolbar>

                    <v-card-text>
                         userid: {{ this.id }}
                    </v-card-text>
                    <v-card-text>
                         username: {{ this.name }}
                    </v-card-text>
                    <v-card-text >
                         useremail: {{ this.email }}
                    </v-card-text>
                    <v-text-field label="personalinfo" name="personalinfo" type="text" @change="printtocon1" v-model="personalintro">  </v-text-field>
                       
                  
                  
                          <v-card-actions>
                            <v-btn @click="edit">submit</v-btn>
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


});
export default {
  name: 'UserProfile',

  components: {
    // MainpageHeader,
    // MainpageFooter,
    NeviMenu,
    // HelloWorld,
  },

  data: () => ({
    drawer: false,
    checkbox: false, 
    email:null,
    id:null,
    name:null,
    personalintro:null,
    
    }),
    created:function(){
      this.email=localStorage.getItem("email");
      var url = "https://infs3202-942629ae.uqcloud.net/lara/user/profile/"+this.email;
      console.log(url);

      $.get(url,
        // $.post("https://localhost:8000/user/login",
          {
          },
          function(data, status){
            console.log("sent");
            console.log("Data: " + data + "\nStatus: " + status);
            // if(data!="login failed:The provided credentials do not match our records."){
            //   // alert("Login Success");
            // window.location.href="https://infs3202-942629ae.uqcloud.net/vue";
            // }else{alert(data);}
            localStorage.setItem("data",data);
            
          });
          var result =JSON.parse(localStorage.getItem("data"));
            this.id=result[0].id;
            this.name=result[0].name;
            // this.infos.email=result[0].email;
            this.personalintro=result[0].personalintro;
            if( this.personalintro==''){ this.personalintro='empty';}
            
    },
    methods:{
      edit(){
        console.log("edit clicked");
        var url = "https://infs3202-942629ae.uqcloud.net/lara/user/profile/update/";
        $.post(url,
        // $.post("https://localhost:8000/user/login",
          {
            personinfo : this.personalintro,
            email : this.email,
          },
          function(data, status){
            console.log("sent");
            console.log("Data: " + data + "\nStatus: " + status);
            // if(data!="login failed:The provided credentials do not match our records."){
            //   // alert("Login Success");
            // window.location.href="https://infs3202-942629ae.uqcloud.net/vue";
            // }else{alert(data);}
            localStorage.setItem("data",data);
            
          });
        },
        printtocon1(){
          console.log("text changed");
          console.log(this.personalintro);
        } 
    }

    // watch: {
    //   group () {
    //     this.drawer = false
    //   },
    // },

};
</script>




