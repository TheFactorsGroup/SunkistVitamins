<?php
	$map_query = '';
	// get the query url
	if( !empty($_GET) ) {
		foreach( $_GET as $k=>$v ) {
			$map_query = $map_query . $k . '/' . $v . '/';
		}
	}
?>
<!-- Begin Easy Locator Store Locator Service //-->
<iframe id="EasyLocator" width="600" height="530" scrolling="no" frameborder="0" src="//www.easylocator.net/search/map3/skv-fr-width-600/<?php echo $map_query;?>" allowtransparency="true"></iframe>
<!-- End Easy Locator Store Locator Service //-->