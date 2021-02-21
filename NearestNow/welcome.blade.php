<!-- AS YOU CAN SEE THIS IS JUST EXTRACTS NOT A FULL DOCUMENT. NEARESTNOW.COM IS A WORK IN PROGRESS -->  


          @if (Auth::guest())
		<li><a href="#register" class="showSingin"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
		<li><a href="#register" class="showRegister"><span class="glyphicon glyphicon-user"></span>REGISTER</a></li>
          @else
		<li><a href="{{ url('/logout') }}" class="showSingin"><span class="glyphicon glyphicon-log-in"></span> LOGOUT ({{ Auth::user()->name }})</a></li>
		  @endif 
		


	<h3>Services</h3>
	
	<script>
	$(document).ready(function(){
		$('.cattype input[type="radio"]').click(function(){
			var value = $(this).val();
			var val2 = '.row.'+value;
			$('.row.businessfinder').hide();
			$('.row.community').hide();		
			$(val2).show();
		});

		$('.loctype input[type="radio"]').click(function(){
			var value = $(this).val();
			var val2 = '.row.'+value;
			$('.row.uklocations').hide();
			$('.row.worldwidelocations').hide();			
			$(val2).show();
		});
	});		
	</script>
	

	<script src="https://cdn.jsdelivr.net/npm/vue"></script>
	<div class="row businessfinder" style="display:block;" id="databinding">
	<div id="businessfinder"></div>
	
	<?php // useing Vue.js to construct the Classifieds menus content with child category data from DB
	$x = array(); 
	$y = array(); ?>
	@foreach ($childcategories as $child)	  											
		<?php 
		$x['categories'][$child->searchparentcategory_name][]['desc'] = $child->searchchildcategory_name; 
		
		$y[$child->searchparentcategory_id][$child->id]['name']   = $child->searchparentcategory_name;
		$y[$child->searchparentcategory_id][$child->id]['title']  = $child->searchparentcategory_title;
		$y[$child->searchparentcategory_id][$child->id]['faicon'] = $child->searchparentcategory_icon;
		?>
	@endforeach	 
		<?php 
		$menuOptionsArr = json_encode((object)$x);
		$menuTitlesArr  = json_encode((object)$y);
		?>	

	<script>
		class Codeblock {
		  constructor(layout) {
			this.layout = layout;
		  }
		  present() {
			return '<div class="'+this.layout+' locList"><div class="dropdown">'
			+'<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">'
			+'<i class="'+this.fontAwesomeImage+'"></i>&nbsp;&nbsp;'
			+this.menuTitle+'&nbsp;&nbsp;<span class="caret"></span></button>'		
			+'<ul class="dropdown-menu searchCategory" role="menu" aria-labelledby="menu1" id="baudrate">'
			+'<li role="presentation" v-for = "(a, index) in categories.'+this.menuArray
			+'"  v-bind:value = "a.name">'
			+'<a role="menuitem" tabindex="-1" href="#">@{{a.desc}}</a></li></ul>'
			+'</div></div>';
		  }
		}

		class Menu extends Codeblock {
		  constructor(layout, menuTitle, menuArray, fontAwesomeImage) {
			super(layout);
			this.menuTitle        = menuTitle;
			this.menuArray        = menuArray;
			this.fontAwesomeImage = fontAwesomeImage;
		  }  
		  show() {
			return this.present();
		  }
		}

		var menuTitleAndIcon = <?php echo $menuTitlesArr; ?>;
		var menutitle;
		var menuname;
		var menufaicon;
		var key1;
		var key2;
		var myMenu;
		

		$.each( menuTitleAndIcon, function( key1, valueOBJ ) {	
			for( var key2 in valueOBJ ) {
			menuname = valueOBJ[key2]['name'];
			menutitle = valueOBJ[key2]['title'];
			menufaicon = valueOBJ[key2]['faicon'];
			}	
			
			myMenu = new Menu("col-xs-6 col-sm-3 col-md-3", menutitle, menuname, menufaicon);
			document.getElementById("businessfinder").innerHTML += myMenu.show();			
		});	

		var vm = new Vue({
			el: '#databinding',
			data: <?php echo $menuOptionsArr; ?>,
		});

	</script>
	</div>


<h3>Location</h3>

	<div class="loctype" style="font-size:16px; margin-top: -15px;">
		<label class="radio-inline"><input style="margin-top: 9px;" type="radio" value="uklocations" name="optradio" checked>UK Locations</label>
		<label class="radio-inline"><input style="margin-top: 9px;" type="radio" value="worldwidelocations" name="optradio">Worldwide</label>
	</div>
	  
	<div class="row uklocations">  
		@foreach ($internationalcities as $key => $rec)
		@if($key =='UK')            
			@foreach($rec['cities'] as $key2 => $rec2)
			<div class="col-xs-6 col-sm-4 col-md-2 locList"> 	  
				<ul>	
				<li><a class="locationLink" href="#link{{$key2}}" onclick="setLoc(this)">{{ $rec2 }}</a></li>		
				</ul>
			</div>						
			@endforeach
		@endif			
		@endforeach
    </div>
	
    <div class="row worldwidelocations" style="display:none;">	  
		<p>


		@foreach ($internationalcities as $key=>$rec)		
		@if($key !='UK')            
		<div class="col-xs-6 col-sm-4 col-md-3 locList">			
			 <div class="dropdown">
				<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
				<img class="flagStyle" src="https://lipis.github.io/flag-icon-css/flags/4x3/{{$rec['country_code']}}.svg" alt="{{$rec['country_description']}} Business Finder">	
				{{$key}}
				<span class="caret"></span></button>
				<ul class="dropdown-menu internationalLocation" role="menu" aria-labelledby="menu1">	
				@foreach($rec['cities'] as $key2 => $rec2)
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">{{$rec2}}</a></li>
				@endforeach
				</ul>
			</div>				
		</div>	
		@endif	
		@endforeach
	  </p>
    </div>






<!--
    </div>
  </div>
 -->
 
</div>

<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->

<div class="container contact containerNarrow" id="contact" class="" style="height:100vh; background-color:white; margin-top:0px; border-top:2px solid black;">
  <h2 class="text-center">Contact</h2>
  <p class="text-center"><em>We are always here to help</em></p>
<form method="post" action="{{ url('/send/email') }}">
@csrf
  <div class="row" style="max-width:700px; margin: auto;">
    <div class="col-md-12">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comment" name="comment" placeholder="Comment" rows="5" required></textarea>
      <br>
      <div class="row">
        <div class="col-md-6 form-group">
          <button class="btn pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
</form>
</div>

<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->

<!-- Container (Contact Section) 
<div id="register" class="bg-1" style="height:100vh; background-color:white; height:100vh; padding-top:50px;">-->


<div class="container charity containerNarrow" id="aboutpage" class="" style="background-color:white; margin-top:0px; border-top:2px solid black;">
  <h2 class="text-center">About Us</h2>
  <p class="text-center"><em></em></p>

  <div class="row" style="max-width:700px; margin: auto;">
    <div class="col-md-12">
      <div class="row">
  
<b style="font-size:18px; color:black;">Transforming communities</b><br />
NearestNow is the cool new way to get connected in the community in the UK and worldwide. I'ts fun, it's free and you can help the environment. Our aim is to connect communities and help businesses and organizations acheive their sustainability objectives.
<br /><br />

<b style="font-size:18px; color:black;">Using the latest technologies</b><br />
The site is developed using the latest open source industry standard web technologies and designed to be mobile first, i.e. it is optimised for mobile devices.<br /><br />

<b>Laravel 7.11</b><br />
The site is created using the Laravel 7 PHP mvc framework and the latest industry standard technologies.
<br />

<b>ES6</b><br />
ES6 (Object oriented JavaScript) has been used to generate dropdown menus.
<br /> 

<b>Vue.js</b><br />
Vue.js has been used to create the category menus from objects and arrays.
<br /> 

<b>Angular.js</b><br />
The for the optimum user experience, Angular is used to dynamically generate form fields.
<br /> 

<b>Bootstrap 3</b><br />
Page content is created using Bootstrap styling, for easy maintenance and a consistent user experience.
<br /> 

<b>Facebook or Google login</b><br />
The site offers Oauth login, to enable users to sign in securely with your Facebook or Google account when creating an advert.
<br /> 

<b>Restful API</b><br />
Oauth login also requires provision of a restful api to enable Facebook/Google to remove user details on user account deactivation.
<br /> 

<b>Tinymce</b><br />
Adverts are created using the Tinymce WYSIWYG editor.
<br /><br /> 

<b style="font-size:18px; color:black;">Sustainability in business</b><br />
<a onclick=window.open("https://onetreeplanted.org/pages/business-sustainability")><img src="https://tse3.mm.bing.net/th?id=OIP.eEg3mReyiyObYjq8WxR9-AHaHW&pid=Api&P=0&w=100&h=100" alt="" class="" style="margin:5px 10px 0px 0px; float:left;">
</a>
Onetreeplanteds One-for-One campaign is a simple and great way to get help the environment! You can plant one tree for every product or service sold, donate a percentage of sales, set up a recurring donation, or tie tree planting into your social media campaigns.<br /><br />

10p in every pound spent on premium full page advertising will go directly to <b><a onclick=window.open("https://onetreeplanted.org/pages/business-sustainability")>Onetreeplanted.org</a></b><br /><br />
	  


      </div>
    </div>
  </div>
</div>

<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->

<!-- Container (Contact Section) 
<div id="register" class="bg-1" style="height:100vh; background-color:white; height:100vh; padding-top:50px;">-->

<div class="container charity containerNarrow" id="charity" class="" style="height:100vh; background-color:white; margin-top:0px; border-top:2px solid black;">
  <h2 class="text-center">Charity</h2>
  <p class="text-center"><em></em></p>

  <div class="row" style="max-width:700px; margin: auto;">
    <div class="col-md-12">
      <div class="row">
<a onclick=window.open("https://onetreeplanted.org/pages/business-sustainability")><img style="margin:5px 10px 0px 0px; float:left;" src="https://tse3.mm.bing.net/th?id=OIP.eEg3mReyiyObYjq8WxR9-AHaHW&pid=Api&P=0&w=100&h=100" alt="" class="">
</a>	  
NearestNow supports One Tree Planted, a charity with a mission to help global reforestation efforts. The organization is built on a network of individuals, businesses, and schools who either donate monitarily or volunteer to help plant trees around the world.<br /><br />

We help businesses and organizations acheive their sustainability objectives. 10p in every pound spent on premium full page advertising will go directly to One Tree Planted.<br /><br />
	  


      </div>
    </div>
  </div>
</div>


<!-- Image of location/map 
<img src="map.jpg" class="img-responsive" style="width:100%">
-->
<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#homepage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#homepage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})

</script>
</body>
</html>















