<?php
function createTable($Title1,$Tile2,$Title3)
{
	echo '<table class="displayTable">
		<tr style="background-color: #CFCAA6">
			<td width="80%" style="text-align: center;">' . $Title1 .'</td>
			<td width="10%" style="text-align: center;">' . $Tile2 . '</td>
			<td width="10%" style="text-align: center;">' . $Title3 . '</td>
		</tr>';
		  
}
function addRow($Data1, $Data2, $Data3)
{
	echo '<tr>
		<td style="text-align: left;">' . $Data1 . '</td>
		<td style="text-align: center;">' . $Data3 . '</td>
		<td style="text-align: center;">' . $Data2 . '</td>
		</tr>';
}
function closeTable()
{
	echo '</table>';
}
?>