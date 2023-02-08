<?php
include('../../controllers/includes/common.php');






$output = '';
if(isset($_POST["excel"]))
{
    $sql = "SELECT * FROM accomodation";
    $result = mysqli_query($conn, $sql);

    $developer_records = array();
    while ($rows = mysqli_fetch_assoc($result)) {
        $developer_records[] = $rows;
    }


    // $column_header = array("acc code","acc name","status"," a","b "," c"," d"," e"," f","g ","h ");
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Accomodation.xls");   
	$show_coloumn = false;
	if(!empty($developer_records)) {
	  foreach($developer_records as $record) {
		if(!$show_coloumn) {
		  // display field/column names in first row
		  echo implode("\t", array_keys($record) ). "\n";
		  $show_coloumn = true;
		}
		echo implode("\t", array_values($record)) . "\n";
	  }
	}





    // if(mysqli_num_rows($result)>0) {
    //     $output .= '
    //         Accomodation Code
    //         Accomodation Name
    //         Building Status
    //         Location
    //         Gender
    //         Total Capacity
    //         Number of Rooms
    //         Warden
    //         Owner
    //         Remark 
    //         </tr>
    //         ';
    //     while($row=mysqli_fetch_array($result))
    //     {    
    //         $employeecode = $row['warden_emp_code'];
    //         $queryEmployeeName = mysqli_query($conn, "SELECT * FROM employee WHERE emp_code='$employeecode'");
    //         $EmployeeName_row = mysqli_fetch_assoc($queryEmployeeName);
    //         $output .= '
    //             <tr>
    //             <td>' .$row['acc_code']. '</td>
    //             <td>' .$row['acc_name']. '</td>
    //             <td>' .$row['bldg_status']. '</td>
    //             <td>' .$row['location']. '</td>
    //             <td>' .$row['gender']. '</td>
    //             <td>' .$row['tot_capacity']. '</td>
    //             <td>' .$row['no_of_rooms']. '</td>
    //             <td>' .$EmployeeName_row['fname']. " " . $EmployeeName_row['lname'].'</td>
    //             <td>'.$row['owner']. '</td>
    //             <td>'.$row['remark']. '</td>
    //             ';
    //     }
    //     $output .= "</table>";
    //     header("Content-Type: application/xls");
    //     header("Content-Disposition: attachment; filename=Accomodation.xls");
    //     echo $output;
    // }
    // else{
    //     echo "Table is empty";
    // }

}
?>