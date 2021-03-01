<!DOCTYPE html>
<html lang="en">
    <head>
        <title>NearestNow!</title>
    </head>
    <body onload="removeLoader()" id="homepage" data-spy="scroll" data-target=".navbar" data-offset="50">
        <div id="main" class="container text-center" style="">
            <script>  
                $(document).ready(function(){
                $(".searchCategory li a").click(function() {			 
                category = $(this).text();	
                $("#searchcat").val(category);
                });
                $(".internationalLocation li a").click(function() {			 
                locInternational = $(this).text();	
                $("#searchloc").val(locInternational);
                });
                $(".communitylink").click(function() {			 
                locInternational = $(this).text();	
                $("#searchcat").val(locInternational);
                });
                });
                
                function setLoc(x){
                var loc = jQuery(x).text();
                jQuery("#searchloc").val(loc);
                }
            </script>  
            <div class="container" id="homePageContainer" style="">
                <div class="tab-content" style="text-align:left;">
                    <div id="home" class="tab-pane fade in active">
                        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
                        <div class="row businessfinder" style="display:block;" id="databinding">
                            <div id="businessfinder"></div>
                            <?php
                                $x = array(); 
                                $y = array(); ?>
                            @foreach ($businessfindercategories as $child)	  											
                            <?php 
                                $parentName = $child->searchparentcategory_name;
                                $parentID   = $child->searchparentcategory_id;
                                $x['categories'][$parentName][]['desc'] = $parentName; 
                                $y[$parentID][$child->id]['name']   = $child->searchparentcategory_name;
                                $y[$parentID][$child->id]['title']  = $child->searchparentcategory_title;
                                $y[$parentID][$child->id]['faicon'] = $child->searchparentcategory_icon;
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
                                    <li><a class="locationLink" href="#link{{$key2}}" onclick="setLoc(this)">{{ $rec2 }}</a></li>
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
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">{{$rec2}}</a></li>
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
    </body>
</html>
