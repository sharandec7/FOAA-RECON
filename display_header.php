
<?php
$row=1;
if (($handle = fopen("dataset_file_uploads/sample_o_receive597aea05a18b04.73081047.csv", "r")) !== FALSE) {
	if (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$num = count($data);
		echo "<p> $num columns in header: <br /></p>\n";
        //echo $data[1];
		for ($c=0; $c < $num; $c++) {
			echo "<li>" . $data[$c] . "</li>";
		}
	}
	fclose($handle);
}
?>
