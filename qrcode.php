<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="qrcode.min.js"></script>
		<script type="text/javascript">
		function onReady()
		{
			var qrcode = new QRCode("id_qrcode", {
				text:"<?php echo $user['email'] ?>",
				width:100,
				height:100,
				colorDark:"#000000",
				colorLight:"#ffffff",
				correctLevel:QRCode.CorrectLevel.H
			});
		}
		</script>
	</head>
	<body onload=onReady()>
	<h1>Thông Tin đơn hàng</h1>
	<p>
		<div id="id_qrcode"></div>
	</p>
	</body>
</html>