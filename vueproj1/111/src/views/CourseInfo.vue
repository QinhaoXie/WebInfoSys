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
                            <v-app-bar-title>Course Info</v-app-bar-title>
                            <v-spacer></v-spacer>
                        </v-toolbar>

                    <v-card-text>
                         coursename: {{this.coursename }}
                    </v-card-text>
                    <v-card-text>
                         teacher: {{ this.teacher }}
                    </v-card-text>
                    <v-card-text>
                         course_info: {{  this.course_description}}
                    </v-card-text>
  
                    <!-- <v-card-text>
                         user personal intro: {{ this.personalintro }}
                    </v-card-text> -->
                    <router-link to="/editcourse">
                          <v-card-actions>
                            <v-btn>edit</v-btn>
                           
                          </v-card-actions>
                        </router-link>
                         
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
  name: 'CourseInfo',

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
      coursename:null,
      course_description:null,
      teacher:null,
    
    }),
    mounted:function(){
      function handlerQuery(name,queryStr=""){
                    if(queryStr == null){
                      return null
                    }
                    // 
                    let query = queryStr.split("?")[1]
                    let queryList = query.split("&")
                    for(let key of queryList){
                      // console.log(key)	//  
                      if(key.split("=")[0] === name){
                        return key.split("=")[1]
                      }		
                    }
                  }
      console.log(handlerQuery("coursename",window.location.href));
      this.coursename=handlerQuery("coursename",window.location.href);
      if (this.coursename==null){
        this.coursename='need to add query params';
        this.course_description='need to add query params';
      }         
      var url = "https://infs3202-942629ae.uqcloud.net/lara/course/index/"+this.coursename;
      console.log(url);

      $.get(url,
        // $.post("https://localhost:8000/user/login",
          {
          },
          function(data, status){
            console.log("sent");
            console.log("CourseData: " + data + "\nStatus: " + status);
            // if(data!="login failed:The provided credentials do not match our records."){
            //   // alert("Login Success");
            // window.location.href="https://infs3202-942629ae.uqcloud.net/vue";
            // }else{alert(data);}
            localStorage.setItem("data",data);
            
          });
          var result =JSON.parse(localStorage.getItem("data"));
            // this.id=result[0].id;
            // // this.coursename=result[0].coursename;
            // // this.infos.email=result[0].email;
            this.course_description=result[0].course_description;
            this.teacher=result[0].teacher;
            if( this.course_description==''){ this.course_description='empty';}
            
    },
    methods:{
      edit(){
        console.log("edit clicked");
        
        } 
    }

    // watch: {
    //   group () {
    //     this.drawer = false
    //   },
    // },

};
</script>




