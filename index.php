<html>
<body>
<form action="#" method="post">
<input type='file' name='testfile' />
<input type='submit' name='submit' value='SUBMIT' />
</form>

<?php
error_reporting(0);
require_once 'excel_reader.php';
if(isset($_REQUEST['submit']))
{
  $filename = $_REQUEST['testfile'];	
  $data = new Spreadsheet_Excel_Reader($filename);
  echo "Total Sheets in this xls file: ".count($data->sheets)."<br /><br />";
	$test = array();
	echo "<table border='1'>";
  for($j=1;$j<=count($data->sheets[0][cells]);$j++) // to get each row of the sheet 0
		{ 
		    echo "<tr>";
			for($k=1;$k<=count($data->sheets[0][cells][$j]);$k++) // to get data in a column wise.
			{
				$sid = $data->sheets[0][cells][$j][$k];
				
					echo "<td> $sid </td>";
				array_push($test, $sid); //insert element in array	
			}
			echo "</tr>";
		}
		echo "</table>";
		echo "<pre>";print_r(array_filter($test, create_function('$value', 'return $value !== "";')));echo "</pre>"; // print array without blank data
		//print_r($test);
 }
?>
</body>
</html>