<?php



include("connection.php");
session_start();
$fim = $_SESSION['username'];

$select_query = mysqli_query($conn,"SELECT * FROM orderINFO where `logi`='$fim'");

$table = '<table>
<tr>
<th>Order Date</th>
<th>Company</th>
<th>Owner</th>
<th>ITEM</th>
<th>Count</th>
<th>Weight</th>
<th>REQUEST</th>
</tr>
';

while($data = mysqli_fetch_array($select_query)){
        $table.=       ' <tr>
            <td>'.$data['orderdate'].'</td>
            <td>'.$data['company'].'</td>
            <td>'.$data['orderowner'].'</td>
            <td>'.$data['item'].'</td>
            <td>'.$data['count'].'</td>
            <td>'.$data['weight'].'</td>
            <td>'.$data['req'].'</td>
            </tr>';
}

$table.= '</table>';
header("Content-Type:application/xls");
header("Content-Disposition:attachment;filename=data.xls");
echo $table;

          

        
















// include("connection.php");
// session_start();
// $fim = $_SESSION['username'];

// // Check if the form is submitted
// if (isset($_POST['export_excel'])) {
//     $sql = "SELECT * FROM orderINFO WHERE `logi`='$fim'";
//     $result = mysqli_query($conn, $sql);
//     if (mysqli_num_rows($result) > 0) {
//         $output = '
//             <table class="table" bordered="1">
//             <tr>
//             <th>Order Date</th>
//             <th>Company</th>
//             <th>Owner</th>
//             <th>ITEM</th>
//             <th>Count</th>
//             <th>Weight</th>
//             <th>REQUEST</th>
//             </tr>
//         ';

//         while ($row = mysqli_fetch_array($result)) {
//             $output .= '
//             <tr>
//             <td>'.$row['orderdate'].'</td>
//             <td>'.$row['company'].'</td>
//             <td>'.$row['orderowner'].'</td>
//             <td>'.$row['item'].'</td>
//             <td>'.$row['count'].'</td>
//             <td>'.$row['weight'].'</td>
//             <td>'.$row['req'].'</td>
//             </tr>
//             ';
//         }
//         $output .= '</table>';

       
//         $fileName = "itemdata-".date('d-m-Y').".xls";
//         // Set headers for download
//         header('Content-Type: application/vnd.ms-excel');
//         header('Content-Disposition: attachment; filename='.$fileName);
        
//         exit();
//     }
// }
?>