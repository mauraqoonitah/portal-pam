<?php

?>

<script language="javascript">
$(function(){
	$('#pencet').click(function(){
		$('#table_img').append ('\
		<tr>\
		<td>kolom 1</td>\
		<td>kolom 2</td>\
		</tr>');
	});
}
);

</script>
<input type="button" id="pencet" value="pencet"/>
<table id="table_img">
<tr>
	<th>File Name</th>
	<th>Img</th>
</tr>
</table>

