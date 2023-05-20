<template>
	<div>

	
 <div class="container" >
            <input type="file" name="file" id="file">
            
            <!-- Drag and Drop container-->
            <div class="upload-area"  id="uploadfile">
                <h1>Drag and Drop file here<br/>Or<br/>Click to select file</h1>
            </div>
        </div>	
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
		<span class="showcompUrl"></span> 
		<img src="" class="showPic" alt=""> 
		</form>
		<div id='allform'>
			<uploadimages></uploadimages>
		</div>
		</div>
	</div>
	</div>
	
</template>

<script>
	// import Vue from 'vue';
	import $ from 'jquery'
	import uploadimages from '@/components/Uploads'
	
	




 // preventing page from redirecting
    $("html").on("dragover", function(e) {
        e.preventDefault();
        e.stopPropagation();
        $("h1").text("Drag here");
    });

    $("html").on("drop", function(e) { e.preventDefault(); e.stopPropagation(); });

    // Drag enter
    $('.upload-area').on('dragenter', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $("h1").text("Drop");
    });

    // Drag over
    $('.upload-area').on('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $("h1").text("Drop");
    });

    // Drop
    $('.upload-area').on('drop', function (e) {
        e.stopPropagation();
        e.preventDefault();

        $("h1").text("Upload");

        var file = e.originalEvent.dataTransfer.files;
        var fd = new FormData();

        fd.append('file', file[0]);

        uploadData(fd);
    });

    // Open file selector on div click
    $("#uploadfile").click(function(){
        $("#file").click();
    });

    // file selected
    $("#file").change(function(){
        var fd = new FormData();

        var files = $('#file')[0].files[0];

        fd.append('file',files);

        uploadData(fd);
    });

// Sending AJAX request and upload file
function uploadData(formdata){

    $.ajax({
        url: 'https://infs3202-942629ae.uqcloud.net/lara/file/upload/',
        type: 'post',
        data: formdata,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){
            addThumbnail(response);
        }
    });
}

// Added thumbnail
function addThumbnail(data){
    $("#uploadfile h1").remove(); 
    var len = $("#uploadfile div.thumbnail").length;

    var num = Number(len);
    num = num + 1;

    var name = data.name;
    var size = convertSize(data.size);
    var src = data.src;

    // Creating an thumbnail
    $("#uploadfile").append('<div id="thumbnail_'+num+'" class="thumbnail"></div>');
    $("#thumbnail_"+num).append('<img src="'+src+'" width="100%" height="78%">');
    $("#thumbnail_"+num).append('<span class="size">'+size+'<span>');

}

// Bytes conversion
function convertSize(size) {
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (size == 0) return '0 Byte';
    var i = parseInt(Math.floor(Math.log(size) / Math.log(1024)));
    return Math.round(size / Math.pow(1024, i), 2) + ' ' + sizes[i];
}























	export default {
	name: 'Upload',
	components:{
		uploadimages,
	},
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
						$(".showcompUrl").html("/storage/compressed-image.jpg"); 
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



        uploadData(fd);
			for (let i = 0; i < this.fileData.length; i++) {
				console.log(typeof(this.fileData) );
				var fd = new FormData();

				var files = this.fileData[i];

				fd.append('file',files);
				uploadData(fd);
				// let formData = new FormData();
    		//   formData.append("firstName", "John");
     		// 	 formData.append(this.fileData[i].type, this.fileData[i].File, this.fileData[i].name);
			// $.ajax({
			// 		type: "POST",
			// 		timeout: 50000,
			// 		// contentType:"multipart/form-data",
			// 		url:"https://infs3202-942629ae.uqcloud.net/lara/file/upload/", 
			// 		file: this.fileData,
			// 		// type: this.fileData[i].type,
			// 		success: function (data) {
			// 			alert('success');
			// 			return false;
			// 		}
			// 	});
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

	.upload-area{
    width: 70%;
    height: 200px;
    border: 2px solid lightgray;
    border-radius: 3px;
    margin: 0 auto;
    margin-top: 100px;
    text-align: center;
    overflow: auto;
}

.upload-area:hover{
    cursor: pointer;
}

.upload-area h1{
    text-align: center;
    font-weight: normal;
    font-family: sans-serif;
    line-height: 50px;
    color: darkslategray;
}
  </style>