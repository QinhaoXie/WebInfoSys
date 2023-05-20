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
                class="pa-2"
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


                <br/><br/>
                <!-- charts -->
                <v-card
    class="mt-4 mx-auto"
    max-width="400"
  >
    <v-sheet
      class="v-sheet--offset mx-auto"
      color="cyan"
      elevation="12"
      max-width="calc(100% - 32px)"
    >
      <v-sparkline
        :labels="labels"
        :value="value"
        color="white"
        line-width="2"
        padding="16"
      ></v-sparkline>
    </v-sheet>

    <v-card-text class="pt-0">
      <div class="text-h6 font-weight-light mb-2">
        User Registrations
      </div>
      <div class="subheading font-weight-light grey--text">
        Last Campaign Performance
      </div>
      <v-divider class="my-2"></v-divider>
      <v-icon
        class="mr-2"
        small
      >
        mdi-clock
      </v-icon>
      <span class="text-caption grey--text font-weight-light">last registration 26 minutes ago</span>
    </v-card-text>
  </v-card>
                
                <!-- charts -->
             
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
import LineChart from '@/components/LineChart'

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
    },
       labels: [
        '12am',
        '3am',
        '6am',
        '9am',
        '12pm',
        '3pm',
        '6pm',
        '9pm',
      ],
      value: [
        200,
        675,
        410,
        390,
        310,
        460,
        250,
        240,
      ],


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
  const settings = {
	async: true,
	crossDomain: true,
	url: 'https://currency-converter5.p.rapidapi.com/currency/historical/2020-01-20?from=EUR&amount=1&format=json&to=GBP',
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '55177063b7msh653b2069d15f511p156e8cjsnaaba48cf63bf',
		'X-RapidAPI-Host': 'currency-converter5.p.rapidapi.com'
	}
};

$.ajax(settings).done(function (response) {
	console.log(response);
});

              

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

.v-sheet--offset {
  top: -24px;
  position: relative;
}
</style>



