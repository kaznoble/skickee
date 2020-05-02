<!DOCTYPE html>
<?php include('inc/stickee.inc.php'); ?>
<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>

<div class="container" >
	<form id="frm_widget" method="post" >
		<div class="row mt-5" >
			<div class="col-md-6" >
				<?php
				$stickee = new Stickee;

				if(isset($_POST['txt_widget'])) {
					$vWidget = $_POST['txt_widget'];
					$vWidgetPacks = $_POST['txt_widget_pack'];
					if($vWidget >= 1)
					{
						echo 'Correct packs to send: <br />' . $stickee->func_widget($vWidget, $vWidgetPacks) . '<br />';
					}
					else
					{
						echo '<strong>Please enter widget number</strong>';
					}
				}
				?>
				Widget Pack: <input type="text" class="form-control" name="txt_widget_pack" style="width:300px;" value="<?php echo (!empty($vWidgetPacks) ? $vWidgetPacks : '250,500,1000,2000,5000') ?>"/>
			</div>
			<div class="col-md-6" >
				Please enter number of widget: 
				<input type="text" class="form-control" name="txt_widget" />
				<input type="submit" class="form-control btn-primary" value="SUBMIT" />
			</div>
		</div>
	</form>

</div>

</body>
</html>