
<?php 

$column_list = array();
if (isset($_FILES['create_file_input'])) {
    $file   = $_FILES['create_file_input'];
        //print_r($file);  //just checking File properties

        // File Properties
    $file_name  = $file['name'];
    $file_tmp   = $file['tmp_name'];
    $file_size  = $file['size'];
    $file_error = $file['error'];

        // Working With File Extension
    $file_ext   = explode('.', $file_name);
    $file_fname = explode('.', $file_name);
//      echo $file_fname;
    $file_fname = strtolower(current($file_fname));
        //echo $file_fname;
    $file_ext   = strtolower(end($file_ext));
        //echo $file_ext;
        //$allowed    = array('txt','csv','xlsx','ods');
    $allowed    = array('csv','txt');


    if (in_array($file_ext,$allowed)) {
            //print_r($_FILES);

        if ($file_error === 0) {
            if ($file_size <= 100000000) {
                $file_name_new     =  $file_fname .'.' . $file_ext;
                    //$file_name_new    =  uniqid('',true) . '.' . $file_ext;
                $file_destination =  'dataset_file_uploads/' . $file_name_new;
                        //echo $file_destination.$file_name_new;
                if (move_uploaded_file($file_tmp, $file_destination)) {
                            //echo "dataset file uploaded";
                }
                else
                {
                    echo "Error in uploading file".mysql_error();
                }
//                        
            }
            else
            {
                echo "Error: Size must bne less then 5MB";
            }
        }

    }
    else
    {
        echo "Invalid file type, Only .csv file type is allowed";
    }
}
else
{
    echo "post not working ";
}
if(isset($_POST['new_dataset_name']))
{
    $dataset_name = $_POST['new_dataset_name'];
}

if (($handle = fopen('dataset_file_uploads/'.$file_name_new, "r")) !== FALSE) {
    if (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        //echo "<p> $num columns in header: <br /></p>\n";
        echo '<div class="panel-heading">
                        <center> <b>' .$dataset_name. '</b> </center>
                    </div>
                    <ul class="list-group" id="column_list_items" >';
        for ($c=0; $c < $num; $c++) {
            echo "<li class="."list-group-item".">
            ". $data[$c] ."
            <span class="."datatype_dropdown".">
            <select>
            <option> String </option>
            <option> Integer </option>
            <option> Decimal </option>
            <option> Date </option>
            <option> Boolean </option>
            </select>
            </span>
            </li>";
            //array_push($column_list, $data[$c]);
        }
        echo '</ul></div>
        <input class="btn btn-sm btn-primary btn-block" type="submit" id="load_dataset_button" name="load_dataset_button" value="Load Dataset">';
    }
    fclose($handle);
}

?>
