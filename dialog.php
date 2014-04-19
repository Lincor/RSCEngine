<?php
session_start();
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script type="text/javascript" src="jquery-2.1.0.js"></script>
		<script type="text/javascript" language="javascript">
			function send() {
			  var msg = $('#send_form').serialize();
			  $('#send_form').trigger('reset');
				$.ajax({
				  type: 'POST',
				  url: 'send.php',
				  data: msg,
				  success: function(data) {
				  },
				  error:  function(xhr, str) {
						alert('Возникла ошибка: ' + xhr.responseCode);
					}
				});
			}

			function read() {
			  var msg = $('#read_form').serialize();
				$.ajax({
				  type: 'POST',
				  url: 'read.php',
				  data: msg,
				  success: function(content) {
					  $('#content').html(content);
				  },
				  error:  function(xhr, str) {
					}
				});
			}

			$(document).ready(function(){
				read();
				setInterval('read()',1000);
			});
		</script>
		<title>Диалог с <?php echo $_POST['to_login']; ?></title>
	</head>
	<body>
		<?php
		include 'bd.php';
		include 'id2name.php';
		$to_id=id($_POST['to_login']);
		?>
		<div id="header"></div>
		<center><h3>RSC - первая <a href="http://www.gnu.org/philosophy/free-sw.html">свободная</a> социальная сеть</h3></center>
		<form id="read_form">
			<input name="to_id" type="hidden" value="<?php echo $to_id ?>">
		</form>
		<div id="content"></div>
		<form method="POST" action="javascript:void(null);" onsubmit="send()" id="send_form">
			<input name="to_id" type="hidden" value="<?php echo $to_id ?>">
			<textarea name="message" cols=45 rows=10></textarea><br><br>
			<input type="submit" value="Отправить">
		</form>
	</body>
</html>
