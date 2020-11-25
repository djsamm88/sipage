<!DOCTYPE html>
<html>
<head>
	<title>fancyBox - Fancy jQuery Lightbox Alternative | Demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<!--fancybox--->
	<script type="text/javascript" src="../lib/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="../source/jquery.fancybox.pack.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />
	<script type="text/javascript">
		$(document).ready(function() {

			$('.fancybox').fancybox();
		})
	</script>
	<!--fancybox--->
	
</head>
<body>
	
		<li><a class="fancybox" href="#inline1" title="Lorem ipsum dolor sit amet">Inline</a></li>
		<li><a class="fancybox fancybox.ajax" href="ajax.txt">Ajax</a></li>
		<li><a class="fancybox fancybox.iframe" href="iframe.html">Iframe</a></li>
		<li><a class="fancybox" href="http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf">Swf</a></li>
	
</body>
</html>