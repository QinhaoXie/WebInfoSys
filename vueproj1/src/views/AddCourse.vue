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
                          label="coursename"
                          name="coursename"
                          prepend-icon="mdi-account"
                          type=""
                          v-model="add.coursename"
                          ></v-text-field>
                        <v-text-field
                          id="teacher"
                          label="teacher"
                          name="teacher"
                          prepend-icon="mdi-lock"
                          type="text"
                          v-model="add.teacher"
                        ></v-text-field>
                        <v-text-field
                        id="course_description"
                        label="course_description"
                        name="course_description"
                        prepend-icon="mdi-lock"
                        type="text"
                        v-model="add.course_description"
                      ></v-text-field>
                        <v-text-field
                          label="lecture_number"
                          name="lecture_number"
                          prepend-icon="mdi-account"
                          type="text"
                          v-model="add.lecture_number"
                        ></v-text-field>
                        <v-text-field
                          label="coursebooks"
                          name="coursebooks"
                          prepend-icon="mdi-account"
                          type="text"
                          v-model="add.coursebooks"
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




export default {
  name: 'AddCourse',

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
    add:{coursename:null,
      teacher:null,
      course_description:null,
      lecture_number:null,
      coursebooks:null,
    },
    }),

    methods: {
    request1() {
      
              var url="https://infs3202-942629ae.uqcloud.net/lara/course/create/"+this.add.coursename+"/"+this.add.teacher+"/"+this.add.course_description+"/"+this.add.lecture_number+"/"+this.add.coursebooks;
              console.log(url);
              var htmlobj=$.ajax({url:url,
                                  dataType:'text',
                                  async:false,
                                  success:function(data){
                                  console.log(data);
                                  }
                                })
              if(htmlobj.responseText=="success"){
                alert("adding successfully")
              }
      else{
        console.log("1!=2");
        this.errmsg="fail";
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




