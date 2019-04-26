<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="{{asset('/vue/dist/vue.js')}}"></script>
</head>
<body>
	@verbatim
       <div id="app">
	{{ message }}
     </div>
     
	@endverbatim
    <script type="text/javascript">
    	Vue.component('hasen',{
          template:'<li>hasen suadik alemu</li>'
    	});
    </script>

    <div id="app-7">
    	<p>"@{{message}}"</p>
    	<p>"@{{reversed}}"</p>
    </div>
    <div>
       <ol>
    	 <hasen></hasen>
       </ol>
    </div>
	<div id="app-1">
		<button v-bind:title="message">
			My Channel
		</button>
	</div>

	<div id="app-2">
		<span v-if="seen">hasen</span>
	</div>

	<div id="app-3">
		<ol>
			<li v-for="child in family">
				@{{child.son}}
			</li>
		</ol>
	</div>

	<div id="app-4">
		<button v-on:click="reversemessage" v-html="message">@{{message}}</button>
		
	</div>

	<div id="app-5">
		<p>@{{message}}</p>
		<input type="text" name="" v-model="message">
	</div>
	
	<div id="app-6">
		
	</div>
   
	<div id="app-8" v-bind:class="{alert:isalert, alert-success:isalert,active:isactive}">
		hasen suadik
	</div>


<script type="text/javascript">

    var app7=new Vue({
       el:"#app-7",
       data:{
       	message:'hi hasen'
       },

       computed:{
         reversed:function(){
         	 return this.message.split('').reverse().join('')

         }
       }

    });

	var app=new Vue({
		el:'#app',
		data:{
			message:'hello world',
		}
	});

	var app1 = new Vue({
		el:'#app-1',
		data:{
			message:'create your channel'
		}
	});

	var app2=new Vue({
		el:'#app-2',
		data:{
			seen:false
		}
	});

	var app3=new Vue({
      el:"#app-3",
      data:{
      	family:[
        {son:'hasen suadik alemu'},
        {son:'merem suadik alemu'},
        {son:'toyba suadik alemu'},
   
      	]
      }

      });
	var app4=new Vue({
      el:"#app-4",
      data:{
      	message:'Subscribe',
      },

      updated:function(){
   			window.alert(this.message)
   		
   	},

      methods:{
      	reversemessage:function(){
      		this.message="subscribed"
      	}
      }


	});

	var app5=new Vue({
      el:"#app-5",
      data:{
      	message:'hell hasen',
      }
	});

   var app6 = new Vue({
   	el:"#app-6",
   	data:{
   		message:'hasen'
   	},
   	
   });

   var app8=new Vue({
      el:"#app-8",
      data:{
      	isactive:false;
      	isalert:true;
      }
   });
   
	

	</script>
</body>
</html>