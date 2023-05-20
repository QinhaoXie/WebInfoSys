<template>
  <v-app class="overflow-hidden" >
    
    <v-main>      
      <div>
    
        <NeviMenu/>
        <!-- space before login sheet -->
        <v-container style="height: 50px;"> </v-container>
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
                  sm="10"
                  md="11"
                >
                  <v-card flat class="elevation-12">
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
                            <v-app-bar-title>DashBoard</v-app-bar-title>
                            <v-spacer></v-spacer>
                        </v-toolbar>
                    <v-card-text>
                            <h2>Welcome!</h2>
                            <br/>
              <v-divider></v-divider>
              <br/>              
                    </v-card-text>
                 <v-row
                align="center"
                justify="center"
              >
                <v-col 
                v-for="item in items"
                :key="item.name"
                cols="12"
                  sm="4"
                  md="3"
                >
                  <v-card flat color="px-3 pb-1 blue lighten-3 rounded-xl">
                    <v-card-title>{{ item.name }}</v-card-title>
                    <v-card-text  class="white cardtext rounded-t" style="height:30px;">{{ item.content }}</v-card-text>
                  </v-card>
                </v-col>
                </v-row>    

                
                    <v-card-actions>
             
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
  $("#loginbtn").click(function(){
  $.ajax({url:"https://infs3202-942629ae.uqcloud.net/lara/user/login/111/222/",
  dataType:'json',
  async:false,
  success:function(data){
  console.log(data);
  }
  
});
// alert(htmlobj.responseText)
  });
});
export default {
  name: 'PayPage',

  components: {
    // MainpageHeader,
    // MainpageFooter,
    NeviMenu,
    // HelloWorld,
  },

  data: () => ({
    drawer: false,
    checkbox: false, 
    login:{
      username:null,
      password:null
    },
    items:{
      created_at:null,
      name:null,
      email:null,
      email_verified_at:null,
      
    }
    }),
    mounted:function(){
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
          var list=[];
            list.push({name: "id",content: result[0].id});
            list.push({name: "username",content: result[0].name});
            list.push({name: "Created At",content: result[0].created_at});

            if( result[0].email_verified_at==null){list.push({name: "Email Verify",content:"User Email haven't been verified"});
              }else{list.push({name: "Email Verify",content: result[0].email_verified_at});}
            this.items=list;
            // this.infos.email=result[0].email;
            
    },
    methods:{
      loginpost(){
        console.log("clicked");
        

        $.post("https://infs3202-942629ae.uqcloud.net/lara/user/login",
        // $.post("https://localhost:8000/user/login",
          {
            username: this.login.username,
            password: this.login.password,
          },
          function(data, status){
            console.log("sent");
            console.log("Data: " + data + "\nStatus: " + status);
            if(data!="login failed:The provided credentials do not match our records."){
              // alert("Login Success");
            window.location.href="https://infs3202-942629ae.uqcloud.net/vue";
            }else{alert(data);}
          
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
<style scoped>
.cardtext{
  border-style:solid;
}
</style>



