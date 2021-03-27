<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="icon" type="image/png" href="icons8-sun-96.png" />
      <title>NearestNow!</title>
      <meta charset="utf-8">
      <meta name="author" content="Duncan Stirling if you would like to give me work or buy this app contact me through the form on this site">
      <meta name="description" content="The UK's favourite community advertiser, get to know your local community better with Nearestnow.com." />
      <meta name="keywords" content=" removed to shorten code sample" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
      <script src="https://cdn.jsdelivr.net/npm/vue"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   </head>
   <script>
      function removeLoader(p1, p2) {
      setTimeout(function() {
      	$("#loader").remove(); //remove the loader after page has loaded
      }, 1000);
      }	  
   </script>
   <div id="loader"></div>
   <script src="https://kit.fontawesome.com/bf5379c21c.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <body onload="removeLoader()" id="homepage" data-spy="scroll" data-target=".navbar" data-offset="50">
      <nav class="navbar navbar-default navbar-fixed-top" style="border-bottom:1px dotted crimson;">
         <div class="container-fluid">
            <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav navbar-right">
                  <li><a href="#homepage"><span class="glyphicon glyphicon-home"></span>HOME</a></li>
                  <li><a href="#aboutpage"><span class="glyphicon glyphicon-link"></span>ABOUT</a></li>
                  <li><a href="{{ url('/new-post') }}"><span class="glyphicon glyphicon-list-alt"></span>ADVERTISE</a></li>
                  <li><a href="#email"><span class="glyphicon glyphicon-send"></span>CONTACT</a></li>
                  <li><a href="#charity"  class="showCharity"><span class="glyphicon glyphicon-heart-empty"></span>CHARITY</a></li>
                  @if (Auth::guest())
                  <li><a href="#register" class="showSingin"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
                  <li><a href="#register" class="showRegister"><span class="glyphicon glyphicon-user"></span>REGISTER</a></li>
                  @else
                  <li><a href="{{ url('/logout') }}" class="showSingin"><span class="glyphicon glyphicon-log-in"></span> LOGOUT ({{ Auth::user()->name }})</a></li>
                  @endif 
                  <li><a href="#homepage"><span class="glyphicon glyphicon-search"></span>SEARCH</a></li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="container text-center">
         <script>             		 
                $(document).ready(function(){
                     $(".searchCategory li a").click(function() {			                         
                        category = $(this).text();	
						var catID = $(this).attr("value");
						$("#catHidden").val(catID);
                        $("#searchcat").val(category);
                    });
            
                     $(".internationalLocation li a").click(function() {			 
                        var locInternational = $(this).text();					
                        $("#searchloc").val(locInternational);
						var locID = $(this).attr("value");
						$("#locHidden").val(locID);						
                    });
            		
                     $(".communitylink").click(function() {			 
                        var locInternational = $(this).text();	
						var catID = $(this).attr("value");	
						$("#catHidden").val(catID);	
                        $("#searchcat").val(locInternational);
                    });		           		
                });
            	
            	function setLoc(x){
					var locID = jQuery(x).attr("value");
					$("#locHidden").val(locID);					
            		var loc = jQuery(x).text();
            		jQuery("#searchloc").val(loc);
            	}
         </script>  
         <div class="container" id="homePageContainer" style="">
            <p><em></em></p>
            <script>
               $(document).ready(function(){
                   $('[data-toggle="popover"]').popover();   
               });
            </script>
            <form class="form-inline" action="{{ url('/search') }}" method="post" style="border-radius: 10px;border: 1px solid plum; padding:5px; background-color:#d7edfa;">
               <div class="form-group">
                  <label for="searchcat">Search for:</label>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input class="corners1 form-control" placeholder="Category" type="text" title="" data-toggle="popover" data-trigger="hover" data-content="select a category below" data-placement="top"  id="searchcat" name="searchcat" readonly required>
				  <input id="catHidden" type="hidden" name="catHidden" value="">
               </div>
               <div class="form-group">
                  <label for="searchloc">in:</label>
                  <input class="corners2 form-control" placeholder="Location" type="text" href="#" title="" data-toggle="popover" data-trigger="hover" data-content="select a location below" data-placement="top" id="searchloc" name="searchloc" readonly required>
				  <input id="locHidden" type="hidden" name="locHidden" value="">
               </div>
               <button type="submit" style="font-size:16px; border: 1px solid plum; padding:3px 0px 5px 5px; font-weight:bold; color:white; background-color:#5bc0de;" class="btn corners3">search &nbsp;&nbsp;<span style="font-size:12px; color:white;" class="glyphicon glyphicon-search"> </span>&nbsp;&nbsp;</button>
            </form>
            <p style="margin:10px 0px; font-style:bolder;">The UK's favourite <a href="#aboutpage">
               <i><b>free</b></i> community advertiser</a>, saving you pounds<b>!</b>&nbsp;<i style="font-size:22px; color:hotpink;" class="fas fa-piggy-bank"></i>
            </p>
            <ul class="nav nav-tabs">
               <li class="active"><a data-toggle="tab" href="#home"><i class="fas fa-user-cog"></i>&nbsp;classifieds</a></li>
               <li><a data-toggle="tab" href="#topmenu3"><i class="fas fa-shopping-cart"></i>&nbsp;marketplace</a></li>
               <li><a data-toggle="tab" href="#topmenu1"><i class="fas fa-map-marker-alt"></i>&nbsp;location</a></li>
            </ul>
            <div class="tab-content" style="text-align:left;">
               <div id="home" class="tab-pane fade in active">
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
                  <div class="cattype" style="font-size:16px; margin-top: -15px;">
                     <label class="radio-inline"><input style="margin-top: 9px;" type="radio" value="businessfinder" name="optradio" checked>business finder</label>
                     <label class="radio-inline"><input style="margin-top: 9px;" type="radio" value="community" name="optradio">community adverts</label>
                  </div>
                  <p>
                     <script src="https://cdn.jsdelivr.net/npm/vue"></script>
					 <div class="row businessfinder" style="display:block;" id="databinding">
                     <div id="businessfinder"></div>
					 					 					 
                     <?php 
                     $x = array(); 
                     $y = array(); ?>
                     @foreach ($businessfindercategories as $child)	  											
                     <?php 
                        $x['categories'][$child->searchparentcategory_name][$child->id]['desc'] = $child->searchchildcategory_name; 
                        
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
								+'<ul menuID='+this.menuID+' class="dropdown-menu searchCategory" role="menu" aria-labelledby="menu1">'
									+'<li role="presentation" v-for = "(a, index) in categories.'
									+this.menuArray +'" v-bind:value = "index">'
										+'<a href="#" class="selectedCategory" v-bind:value="\'1_\'+index" role="menuitem" tabindex="-1" href="#">@{{a.desc}}</a>'
									+'</li>'
								+'</ul>'
                        	+'</div></div>';
                          }
                        }
                        
                        class Menu extends Codeblock {
                          constructor(layout, menuTitle, menuArray, fontAwesomeImage, menuID) {
                        	super(layout);
                        	this.menuTitle        = menuTitle;
                        	this.menuArray        = menuArray;
                        	this.fontAwesomeImage = fontAwesomeImage;
							this.menuID           = menuID;
                          }  
                          show() {
                        	return this.present();
                          }
                        }
      
                        var menuTitleAndIcon = <?php echo $menuTitlesArr; ?>;
                        var menutitle;
                        var menuname;
                        var menufaicon;
						var menuID;
                        var key1;
                        var key2;
                        var myMenu;
                     
                        $.each( menuTitleAndIcon, function( key1, valueOBJ ) {	
                        	for( var key2 in valueOBJ ) {
								menuname   = valueOBJ[key2]['name'];
								menutitle  = valueOBJ[key2]['title'];
								menufaicon = valueOBJ[key2]['faicon'];
								menuID     = valueOBJ[key2]['menuID'];								
                        	}	
                        	
                        	myMenu = new Menu("col-xs-6 col-sm-3 col-md-3", menutitle, menuname, menufaicon, menuID);
                        	document.getElementById("businessfinder").innerHTML += myMenu.show();			
                        });	
                        
                        var vm = new Vue({
                        	el: '#databinding',
                        	data: <?php echo $menuOptionsArr; ?>,
                        });
                     </script>
                  </div>
       
                  <div class="row community" style="display:none;">
                     @foreach ($communitycategories as $communitycategory)
                     <div class="col-xs-12 col-sm-4 col-md-3 locList">
                        <div class="dropdown">
                           <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                              <li class="{{$communitycategory->searchparentcategory_icon}}"></li>
                              <span class="communitylink" value="2_{{$communitycategory->id}}"> {{$communitycategory->searchparentcategory_title}}</span>
                           </button>
                        </div>
                     </div>
                     @endforeach	  
                  </div>
                  <div id="firstPageFooter" style="margin-top:5vh; border:0px solid blue; float:left; width:100%; float:left;">
                     <a href="#charity">
                        <div style="margin-top:10px;" class="col-xs-6 centrepointText">Helping businesses with<br />sustainability initiatives</div>
                        <div class="col-xs-6" style="margin-top:10px; text-align:left; padding:0px;"><img style="height:45px;" src="https://tse3.mm.bing.net/th?id=OIP.eEg3mReyiyObYjq8WxR9-AHaHW&pid=Api&P=0&w=50&h=50" alt="Centrepoint is the UK's leading youth homelessness charity. The charity provides and support to homeless young people. " class="">
                        </div>
                     </a>
                     <div style="text-align:center; margin-top:0px; border:0px solid red">
                        <span style="font-size: 12px;">&copy;<?php echo date("Y") ?> by Nearestnow.com Ltd. All rights reserved</span>
                     </div>
                  </div>
                  </p>
               </div>
      	
               <div id="topmenu3" class="tab-pane fade" style="margin-bottom:10px;">
                  <h3>Buy & Sell</h3>
                  <p>
                  @foreach ($marketplaces as $marketplace)	  
                  <div class="col-xs-6 col-sm-4 col-md-3 locList searchCategory">
                     <ul>
                        <li><a value="3_{{$marketplace->id}}" href="#">{{$marketplace->market_category}}</a></li>
                     </ul>
                  </div>
                  @endforeach	  
                  </p>
               </div>
        	
               <div id="topmenu1" class="tab-pane fade">
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
                           <li><a value="{{$rec['country_id']}}_{{$key2}}" class="locationLink" href="#link{{$key2}}" onclick="setLoc(this)">{{ $rec2 }}</a></li>
                        </ul>
                     </div>
                     @endforeach
                     @endif			
                     @endforeach
                  </div>
				  
                  <div class="row worldwidelocations" style="display:none;">
                     <p>
                        <style>
                           .flagStyle{
                           margin:5px 0px; 
                           width:20px
                           }
                        </style>
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
                              <li role="presentation"><a value="{{$rec['country_id']}}_{{$key2}}" role="menuitem" tabindex="-1" href="#">{{$rec2}}</a></li>
                              @endforeach
                           </ul>
                        </div>
                     </div>
                     @endif	
                     @endforeach
                     </p>
                  </div>
               </div>
            </div> 
         </div>
         <br>
      </div>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <div id="register" class="container bg-1" style="background-color:white; height:100vh; padding-top:8vh; border-top:2px solid black; margin-top:0px;">

         <script>
            $(document).ready(function(){
            	$(".showSingin").click(function(){
            		 $("#registerform").removeClass("in active");
            		 $("#signinform").addClass("in active");
            		 
            		 $("#registerTab").removeClass("active");
            		 $("#signinTab").addClass("active");		 
            	});
            	
            	$(".showRegister").click(function(){
            		 $("#registerform").addClass("in active");
            		 $("#signinform").removeClass("in active");
            		 
            		 $("#registerTab").addClass("active");
            		 $("#signinTab").removeClass("active");		 
            	});	
            });
         </script>
         <div>
            <div class="container registerpage">
               <form action="/action_page.php">
                  <div class="row" style="">
                     <h2 style="text-align:center">Register or Login</h2>
                     <div class="row">
                        <ul class="nav nav-tabs">
                           <li id="registerTab" class="active">
                              <a href="#register" class="showRegister">Register</a>
                           </li>
                           <li id="signinTab">
                              <a href="#register" class="showSingin">Login</a>	
                           </li>
                        </ul>
                     </div>
                     </br>
                     <div class="tab-content" style="text-align:left;">
                        <script>
                           function privacyFunction(oauthURL) {
                             //alert(oauthURL);
                             if(!$('#privacybox').prop('checked')){
                           	  alert('Confirm you have read our privacy policy below.');
                             }else{
                           	  window.location.replace(oauthURL);  
                             }
                           }
                        </script>
                        <div id="registerform" class="tab-pane fade in active">
                           <div class="row">
                              <a onclick="privacyFunction('auth/redirect/facebook')" class="fb btn">
                              <i class="fa fa-facebook fa-fw"></i>Register with Facebook
                              </a>		 	 
                              <a onclick="privacyFunction('auth/redirect/google')" class="google btn"><i class="fa fa-google fa-fw">
                              </i>Register with Google+
                              </a>
                           </div>
                           <div class="row" style="margin-top:30px; margin-bottom: -20px;">
                              <div class="vl">
                                 <span class="vl-innertext">or</span>
                              </div>
                           </div>
                           <div class="row" style="margin-top:50px;">
                              <div class="hide-md-lg">
                                 <p>Or register manually:</p>
                              </div>
 
							   <div class="form-group">
								   <a onclick="privacyFunction('auth/register')">
								   <input class="btn" type="registerlink" name="register" value="Register via email" class="form-control" id="register"></a>
							</div>	
						   <a href="privacypolicy">privacy policy</a><br />
						   <input style="width:20px;" id="privacybox" type="checkbox" name="privacybox" value="" required><span style="color:black;">I have read the privacy policy</span>	
						   </form>
					</div>
               </div>

               <div id="signinform" class="tab-pane fade">
					<div class="row">
						<a href="{{ url('/auth/redirect/facebook') }}" class="fb btn">
							<i class="fa fa-facebook fa-fw"></i> Login with Facebook
						</a>
					   <a href="{{ url('/auth/redirect/google') }}" class="google btn"><i class="fa fa-google fa-fw">
							</i> Login with Google+
					   </a>
					</div>
               <div class="row" style="margin-top:30px; margin-bottom: -20px;">
				   <div class="vl">
						<span class="vl-innertext">or</span>
				   </div>
               </div>
               <div class="row" style="margin-top:50px;">
				   <div class="hide-md-lg">
						<p>Or login manually:</p>
				   </div>
               <form>
				   <div class="form-group">
					   <a href="{{ url('/auth/login') }}">
							<input class="btn" type="registerlink" name="login" value="Login using email" class="form-control" id="login">
					   </a>
				   </div>	
               </form>
			</div>
		</div>
	</div>	
    <div class="container contact containerNarrow" id="email" class="" style="height:100vh; background-color:white; margin-top:0px; border-top:2px solid black;">
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