
<?php
	$showAll = 0;
 	if (Input::get('showAll')) $showAll = 1;
	
	$id = 0;
 	if (Input::get('id')) $id = Input::get('id');
		
	$cPage = Uri::segments();
	if (isset($cPage[0])) {
		$cPage = $cPage[0];
	} else {
		$cPage = "home";
	}
	if ($cPage == "home") $cPage = "windvector"; // default to windvector
	
?>

<div class="container text-white">
    <div class="row bottom-border">
        <div class="col-xs-12 text-center"><?php echo Asset::img('NjordLogoWhiteOnBlack.png'); ?></div>
    </div>

    <div class="row bottom-border">
      <div class="btn-toolbar" role="toolbar">
        <div class="btn-group btn-group-lg btn-group-justified btn-group-fill-height">
        	<?php 
				if ($cPage == "windvector") { 
					if ($showAll) {
            			echo "<a href='".Uri::base()."windvector/index' class='btn btn-black' role='button'><strong>Show My Stations</strong></a>	";
					} else {
            			echo "<a href='".Uri::base()."windvector/index?showAll=1' class='btn btn-black' role='button'><strong>Show All Stations</strong></a>	";					
					}
				} elseif ($cPage == "stationdata") {  
					if ($showAll) {
            			echo "<a href='".Uri::base()."stationdata?id=$id' class='btn btn-black' role='button'><strong>Show My Stations</strong></a>	";
					} else {
            			echo "<a href='".Uri::base()."stationdata?id=$id&showAll=1' class='btn btn-black' role='button'><strong>Show All Stations</strong></a>	";					
					}
             	} 
			 ?>
        </div>
      </div>
    </div>

    
    <div class="row bottom-border">
        <div class="col-xs-12">
        	<div id="stationHeaderSideBar"><br><br><h4><strong>Click station for information.</strong></h4><br><br></div>
        </div>
    </div>
    
    
        
        
    <div class="row bottom-border">
        <div class="btn-toolbar" role="toolbar">
            <div class="btn-group btn-group-lg btn-group-justified btn-group-fill-height">
                <a href="<?=Uri::base()?>windvector/index<?=$showAll?'?showAll=1':''?>" class="btn btn-black pad5 <?=$cPage=='windvector'?'active':''?>" role="button">
                    <strong>Wind Vector</strong>
                </a>
            </div>
        </div>
        <div class="btn-toolbar" role="toolbar">
            <div class="btn-group btn-group-lg btn-group-justified btn-group-fill-height">
                <a id="stationLink" href="<?=Uri::base()?>stationdata" class="btn btn-black pad5 <?=$cPage=='stationdata'?'active':''?>" role="button">
                    <strong>Station Data</strong>
                </a>
            </div>
        </div>
        <div class="btn-toolbar" role="toolbar">
            <div class="btn-group btn-group-lg btn-group-justified btn-group-fill-height">
                <a href="#" class="btn btn-black disabled pad5" role="button">
                    <strong>Isotherm</strong>
                </a>
        
            </div>  
        </div>
    </div>
    <div class="row bottom-border">
        <div class="col-xs-12">
        	<div id="stationInformationSideBar">
            	<?php 	if ($cPage=='stationdata') { 
							echo View::forge( 'stationdata/stationList' );
						} else {
							echo "<br><br><br><br>";
						}
				?>
            </div>
        </div>
    </div>
    <div class="row bottom-border">
      <div class="btn-toolbar" role="toolbar">
        <div class="btn-group btn-group-lg btn-group-justified btn-group-fill-height">
        	<a href="<?=Uri::base()?>users/logout" class="btn btn-black" role="button"> <strong>Log Out</strong></a>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-xs-12"><h4 class="text-center"><strong>&copy; Njord Weather Systems</strong></h4></div>
    </div>
</div>

