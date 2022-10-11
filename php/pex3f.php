
<?php
$NumRows=$_POST['txtRow'];
$NumCols=$_POST['txtColumn'];
echo "There are ".$NumRows." rows and ".$NumCols." columns.";

echo '<table border=1 cellpadding=3>';

for($i=0; $i<$NumRows; $i++){
	echo '<tr>';

	for($a=0; $a<$NumCols; $a++) {
	echo '<td></td>';
	}
	echo '</tr>';
}
echo'</table>';
?>
