<!DOCTYPE html>
<html lang="en">
   <head>
      <title>NearestNow!</title>
   <body onload="removeLoader()" id="homepage" data-spy="scroll" data-target=".navbar" data-offset="50">
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
      </div>
   </body>
