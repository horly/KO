<?php
		
	require_once "config.php";

	$redirectURL = "https://www.kedisonline.com/templates/teste2.php";
	$permission = ['email'];
	$loginURL = $helper->getLoginUrl($redirectURL, $permission);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Facebook</title>
</head>
<body>
	<button onclick="window.location = '<?php echo $loginURL; ?>'; ">login facebook</button>

</body>
</html>