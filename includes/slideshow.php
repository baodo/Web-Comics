<?php
require_once 'class/xl_stories.php';
$xltruyen = new xl_stories();
$vitri = rand(0,$xltruyen->tongsodong()- 3);

?>
<div class="container slider_smp">
	<div class="row ">
    	<div class="col-md-9 col-sm-12 ind_slider">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                              <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                              <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
                              <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                            </ol>
            
              <!-- Wrapper for slides -->
			  
              <div class="carousel-inner" role="listbox">
               
                              <div class="item" style=" background-position:center center; background-size:cover;">
                            
                    <a href="<?php echo $xltruyen->story(3)->Ma?>/<?php echo $xltruyen->story(3)->Alias?>.html"><img src="<?= TEMPLATE_PATH ?>/slider/905x263/black_clover_1519525954.jpg" alt="slider01" style="max-height:263px; max-width:1903px; overflow:hidden;object-fit: cover; " width="905" height="200"></a>
                    <div class="carousel-caption">
                        <h3><?php echo $xltruyen->story(3)->Ten?></h3>
                    </div>
                </div>
              
                             <div class="item active"  style=" background-position:center center; background-size:cover;">
                    <a href="<?php echo $xltruyen->story(15)->Ma?>/<?php echo $xltruyen->story(15)->Alias?>.html"><img src="<?= TEMPLATE_PATH ?>/slider/905x263/nanatsu-no-taizai_1516943635.jpg" alt="slider01" style="max-height:263px; max-width:1903px; overflow:hidden;object-fit: cover; " width="905" height="200"></a>
                    <div class="carousel-caption">
                        <h3><?php echo $xltruyen->story(15)->Ten?></h3>
                    </div>
                </div>
                              <div class="item"  style=" background-position:center center; background-size:cover;">
                    <a href="<?php echo $xltruyen->story(16)->Ma?>/<?php echo $xltruyen->story(16)->Alias?>.html"><img src="<?= TEMPLATE_PATH ?>/slider/905x263/one-piece-vua-hai-tac_1516941483.jpg" alt="slider01" style="max-height:263px; max-width:1903px; overflow:hidden;object-fit: cover; " width="905" height="200"></a>
                    <div class="carousel-caption">
                        <h3><?php echo $xltruyen->story(16)->Ten?></h3>
                    </div>
                </div> 
                            </div>
            
              <!-- Controls -->
               <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
            </div>
         </div>
         <div class="col-md-3 col-sm-0 head_tab">
         	<ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#a" aria-controls="a" role="tab" data-toggle="tab">Ngày</a></li>
                <li role="presentation"><a href="#b" aria-controls="b" role="tab" data-toggle="tab">Tuần</a></li>
                <li role="presentation"><a href="#c" aria-controls="c" role="tab" data-toggle="tab">Tháng</a></li>
            </ul>
              <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="a">
                     <ul class="ind_list01">
                                         	<li><a href="<?php echo $xltruyen->story(16)->Ma?>/<?php echo $xltruyen->story(16)->Alias?>.html">Đảo Hải Tặc<span class="glyphicon glyphicon-picture"></span></a></li>
                                        	<li><a href="<?php echo $xltruyen->story(15)->Ma?>/<?php echo $xltruyen->story(15)->Alias?>.html">Nanatsu No Taizai<span class="glyphicon glyphicon-picture"></span></a></li>
                                        	<li><a href="<?php echo $xltruyen->story(6)->Ma?>/<?php echo $xltruyen->story(6)->Alias?>.html">Naruto<span class="glyphicon glyphicon-picture"></span></a></li>
                                        	<li><a href="<?php echo $xltruyen->story(3)->Ma?>/<?php echo $xltruyen->story(3)->Alias?>.html">Black Clover<span class="glyphicon glyphicon-picture"></span></a></li>
                                        	<li><a href="<?php echo $xltruyen->story(5)->Ma?>/<?php echo $xltruyen->story(5)->Alias?>.html">Fairy Tail<span class="glyphicon glyphicon-picture"></span></a></li>
                                        </ul>
                </div>
                <div role="tabpanel" class="tab-pane" id="b">
                    <ul class="ind_list01">
                     	                     	<li><a href="<?php echo $xltruyen->story(16)->Ma?>/<?php echo $xltruyen->story(16)->Alias?>.html">Đảo Hải Tặc<span class="glyphicon glyphicon-picture"></span></a></li>
                                        	<li><a href="<?php echo $xltruyen->story(15)->Ma?>/<?php echo $xltruyen->story(15)->Alias?>.html">Nanatsu No Taizai<span class="glyphicon glyphicon-picture"></span></a></li>
                                        	<li><a href="<?php echo $xltruyen->story(6)->Ma?>/<?php echo $xltruyen->story(6)->Alias?>.html">Naruto<span class="glyphicon glyphicon-picture"></span></a></li>
                                        	<li><a href="<?php echo $xltruyen->story(3)->Ma?>/<?php echo $xltruyen->story(3)->Alias?>.html">Black Clover<span class="glyphicon glyphicon-picture"></span></a></li>
                                        	<li><a href="<?php echo $xltruyen->story(5)->Ma?>/<?php echo $xltruyen->story(5)->Alias?>.html">Fairy Tail<span class="glyphicon glyphicon-picture"></span></a></li>
                                            </ul>
                </div>
                <div role="tabpanel" class="tab-pane" id="c">
                    <ul class="ind_list01">
                     	                     	<li><a href="<?php echo $xltruyen->story(16)->Ma?>/<?php echo $xltruyen->story(16)->Alias?>.html">Đảo Hải Tặc<span class="glyphicon glyphicon-picture"></span></a></li>
                                        	<li><a href="<?php echo $xltruyen->story(15)->Ma?>/<?php echo $xltruyen->story(15)->Alias?>.html">Nanatsu No Taizai<span class="glyphicon glyphicon-picture"></span></a></li>
                                        	<li><a href="<?php echo $xltruyen->story(6)->Ma?>/<?php echo $xltruyen->story(6)->Alias?>.html">Naruto<span class="glyphicon glyphicon-picture"></span></a></li>
                                        	<li><a href="<?php echo $xltruyen->story(3)->Ma?>/<?php echo $xltruyen->story(3)->Alias?>.html">Black Clover<span class="glyphicon glyphicon-picture"></span></a></li>
                                        	<li><a href="<?php echo $xltruyen->story(5)->Ma?>/<?php echo $xltruyen->story(5)->Alias?>.html">Fairy Tail<span class="glyphicon glyphicon-picture"></span></a></li>
                                            </ul>
                </div>
			</div>
		</div>
    </div>
</div>