<!DOCTYPE html>
<html lang="en">
    <head>
        <title>NearestNow!</title>
    </head>

    <body onload="removeLoader()" id="homepage" data-spy="scroll" data-target=".navbar" data-offset="50">
        <nav class="navbar navbar-default navbar-fixed-top" style="border-bottom: 1px dotted crimson;">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#homepage"><span class="glyphicon glyphicon-home"></span>HOME</a>
                        </li>
                        <li>
                            <a href="#aboutpage"><span class="glyphicon glyphicon-link"></span>ABOUT</a>
                        </li>

                        <li>
                            <a href="{{ url('/new-post') }}"><span class="glyphicon glyphicon-list-alt"></span>ADVERTISE</a>
                        </li>

                        <li>
                            <a href="#contact"><span class="glyphicon glyphicon-send"></span>CONTACT</a>
                        </li>
                        <li>
                            <a href="#charity" class="showCharity"><span class="glyphicon glyphicon-heart-empty"></span>CHARITY</a>
                        </li>

                        @if (Auth::guest())
                        <li>
                            <a href="#register" class="showSingin"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a>
                        </li>
                        <li>
                            <a href="#register" class="showRegister"><span class="glyphicon glyphicon-user"></span>REGISTER</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ url('/logout') }}" class="showSingin"><span class="glyphicon glyphicon-log-in"></span> LOGOUT ({{ Auth::user()->name }})</a>
                        </li>
                        @endif

                        <li>
                            <a href="#homepage"><span class="glyphicon glyphicon-search"></span>SEARCH</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="band" class="container text-center" style="">
            <script>
                $(document).ready(function () {
                    $(".searchCategory li a").click(function () {
                        category = $(this).text();
                        $("#searchcat").val(category);
                    });

                    $(".internationalLocation li a").click(function () {
                        locInternational = $(this).text();
                        $("#searchloc").val(locInternational);
                    });
                });

                function setLoc(x) {
                    var loc = jQuery(x).text();
                    jQuery("#searchloc").val(loc);
                }
            </script>

            <h3>Categories</h3>

            <div class="cattype" style="font-size: 16px; margin-top: -15px;">
                <label class="radio-inline"><input style="margin-top: 9px;" type="radio" value="businessfinder" name="optradio" checked />business finder</label>
                <label class="radio-inline"><input style="margin-top: 9px;" type="radio" value="community" name="optradio" />community adverts</label>
            </div>
            <p>
                <script src="https://cdn.jsdelivr.net/npm/vue"></script>
            </p>

            <div class="row businessfinder" style="display: block;" id="databinding">
                <div id="businessfinder"></div>

                <?php 
				$x = array(); 
				$y = array(); 
				?>
                @foreach ($childcategories as $child)
                <?php 
				$x['categories'][$child->searchparentcategory_name][]['desc'] = $child->searchchildcategory_name; $y[$child->searchparentcategory_id][$child->id]['name'] = $child->searchparentcategory_name;
                $y[$child->searchparentcategory_id][$child->id]['title'] = $child->searchparentcategory_title; $y[$child->searchparentcategory_id][$child->id]['faicon'] = $child->searchparentcategory_icon; ?> @endforeach
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

            <div id="topmenu3" class="tab-pane fade" style="margin-bottom: 10px;">
                <h3>Buy&Sell Locally</h3>
                <p></p>
                <div class="col-xs-6 col-sm-4 col-md-3 locList searchCategory">
                    <ul>
                        <?php $i = 0; ?>
                        @foreach ($marketplaces as $marketplace)
                        <?php $i++; ?>
                        <li><a href="#">{{$marketplace->market_category}}</a></li>
                        @if($i =='11' || $i =='22' || $i =='33')
                    </ul>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 locList searchCategory">
                    <ul>
                        @endif @endforeach
                    </ul>
                </div>
            </div>

            <div id="topmenu1" class="tab-pane fade">
                <h3>UK Locations</h3>
                <div class="col-xs-6 col-sm-4 col-md-2 locList">
                    <ul>
                        <?php $i = 0; ?>

                        @foreach ($ukcities['cities'] as $key => $rec)

                        <?php $i++; ?>
                        <li><a class="locationLink" href="#link{{$key}}" onlick="setLoc(this)">{{ $rec }}</a></li>
                        @if($i =='11' || $i =='22' || $i =='33' || $i =='44' || $i =='55' || $i =='66')
                    </ul>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-2 locList">
                    <ul>
                        @endif @endforeach
                    </ul>
                </div>
            </div>

            <div id="topmenu2" class="tab-pane fade">
                <h3>Worldwide</h3>
                <p>
                    @foreach ($internationalcities as $key=>$rec)
                </p>

                <div class="col-xs-6 col-sm-4 col-md-3 locList">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                            <img class="flagStyle" src="https://lipis.github.io/flag-icon-css/flags/4x3/{{$rec['country_code']}}.svg" alt="USA Business Finder" />
                            {{$key}}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu internationalLocation" role="menu" aria-labelledby="menu1">
                            @foreach($rec['cities'] as $key2 => $rec2)
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">{{$rec2}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
