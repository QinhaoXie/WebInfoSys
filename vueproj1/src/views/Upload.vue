<template>
	
	<div class="updata-body" @dragenter="dragenter($event)">
		<div @drop="enentDrop($event)" @dragleave="dragleave($event)" @dragover="dragover($event)">
		<div class="drag-box">{{drapText}}</div>
	</div>
	<ul>
		<li v-for="(item, index) in fileData" :key="index">{{item.name}}</li>
	</ul>
	<v-btn @click='uploadall'>drag upload</v-btn>
	<div>
		<form id="upload" enctype="multipart/form-data" method="post"> 
		<input type="file" name="file" id="pic"/> 
		<input style="color:blue" type="button" value="onefilesubmit" @click="uploadPic"/> 
		<input style="color:blue" type="button" value="jpgtocompressedpng" @click="uploadPic2"/> 
		<span class="showUrl"></span> 
		<img src="" class="showPic" alt=""> 
		</form>
		<div id='allform'></div>
		</div>
	</div>
	
</template>

<script>
	import Vue from 'vue';
	import $ from 'jquery'

	export default {
	name: 'app',
	data() {
		return {
		drapText: 'drag file to here for uploading',
			fileData: []
		}
	},
	mounted() {
	},
	methods: {
		uploadPic() { 
					var form = document.getElementById('upload'), 
						formData = new FormData(form); 
					$.ajax({ 
					url:"https://infs3202-942629ae.uqcloud.net/lara/file/upload/", 
					type:"post", 
					data:formData, 
					processData:false, 
					contentType:false, 
					success:function(res){ 
						if(res){ 
						alert("upload successful！"); 
						} 
						console.log(res); 
						$("#pic").val(""); 
						$(".showUrl").html(res); 
						$(".showPic").attr("src",res); 
					}, 
					error:function(err){ 
						alert("failure,please retry",err); 
					} 
					
					}) 
					
		},uploadPic2() { 
					var form = document.getElementById('upload'), 
						formData = new FormData(form); 
					$.ajax({ 
					url:"https://infs3202-942629ae.uqcloud.net/lara/file/image/", 
					type:"post", 
					data:formData, 
					processData:false, 
					contentType:false, 
					success:function(res){ 
						if(res){ 
						alert("upload successful！"); 
						} 
						console.log(res); 
						$("#pic").val(""); 
						$(".showUrl").html(res); 
						$(".showPic").attr("src",res); 
					}, 
					error:function(err){ 
						alert("failure,please retry",err); 
					} 
					
					}) 
					
		},
		enentDrop: function(e) {
			console.log(e.dataTransfer.files)
			e.stopPropagation();
			e.preventDefault(); 
			this.updataFun(e.dataTransfer.files)
		},
		dragleave(e) {
		  e.stopPropagation();
		  e.preventDefault();
		},
		dragenter(e) {
		  e.stopPropagation();
		  e.preventDefault();
		  this.drapText = 'release your mouse to start uploading';
		},
		dragover(e) {
		  e.stopPropagation();
		  e.preventDefault();
		},
		updataFun(data) {
		  let that = this;
		  for (let i = 0; i < data.length; i++) {
			this.fileData.push(data[i])
		  }
		  this.drapText = 'Upload successful';
		  setTimeout(() => {
			that.drapText = 'drag file to here';
		  }, 500);
		},
		uploadall(){
			for (let i = 0; i < this.fileData.length; i++) {
				console.log(typeof(this.fileData[i]) );
				// let formData = new FormData();
    		//   formData.append("firstName", "John");
     		// 	 formData.append(this.fileData[i].type, this.fileData[i].File, this.fileData[i].name);
			$.ajax({
					type: "POST",
					timeout: 50000,
					url:"https://infs3202-942629ae.uqcloud.net/lara/file/upload/", 
					data: this.fileData[i],
					type: this.fileData[i].type,
					success: function (data) {
						alert('success');
						return false;
					}
				});
		  }
		}
	  }
	}
  </script>
  
  <style>
	.updata-body {
	  margin: 50px auto;
	  width: 500px;
	}
	.drag-box {
	  width: 500px;
	  height: 200px;
	  line-height: 200px;
	  text-align: center;
	  border: 1px dashed #eee;
	}
  </style>