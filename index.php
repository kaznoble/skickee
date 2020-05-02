<?php
include('inc/stickee.inc.php');

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

<form id="frm_widget" method="post" >
	Widget Pack: <input type="text" name="txt_widget_pack" style="width:300px;" value="<?php echo (!empty($vWidgetPacks) ? $vWidgetPacks : '250,500,1000,2000,5000') ?>"/>
	<br /><br />
	Please enter number of widget: 
	<input type="text" name="txt_widget" />
	<input type="submit" value="SUBMIT" />
</form>