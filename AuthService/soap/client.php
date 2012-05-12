<html>
	<body>

		<h1> Result: 
		<?php
		ini_set("soap.wsdl_cache_enabled", "0");
		$client = new SoapClient("http://localhost/~matheus/soap/server.php?wsdl");
		echo $client->isAuthentic("trolling", "baz");
		?>
		</h1>

	</body>
</html>
