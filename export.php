<?php
session_start();

$filename = "excelfilename";
$file_ending = "xls";
header("Content-Disposition: attachment; filename=$filename.xls");

$mysqli = new mysqli($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'], $_SESSION['database'], 3306);

if ($mysqli->connect_error) {
    /* Use your preferred error logging method here */
    error_log('Connection error: ' . $mysqli->connect_error);
}
$query = $mysqli->query("SELECT * FROM servers");

$sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields
for ($i = 0; $i < mysqli_num_fields($query); $i++) {
$finfo = $query->fetch_field_direct($i);
printf($finfo->name . "\t");
}
print("\n");    
//end of printing column names  
//start while loop to get data
    while($row = mysqli_fetch_row($query)) {
        $schema_insert = "";
        for($j=0; $j<mysqli_num_fields($query);$j++) {
            $finfo = $query->fetch_field_direct($j);
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    }   
?>