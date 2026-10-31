<?php
require_once 'config.php';

$draw = isset($_POST['draw']) ? intval($_POST['draw']) : 1;
$start = isset($_POST['start']) ? intval($_POST['start']) : 0; 
$length = isset($_POST['length']) ? intval($_POST['length']) : 10;

$totalQuery = mysqli_query($conn, "SELECT COUNT(emp_id) as count FROM employee");
$totalRow = mysqli_fetch_assoc($totalQuery);
$totalRecords = $totalRow['count'];

$query = "SELECT * FROM employee LIMIT $start, $length";
$result = mysqli_query($conn, $query);

$data = array();
$no = $start + 1; 

while ($row = mysqli_fetch_assoc($result)) {
    $actions = '
        <button onclick="openEditModal(\'' . $row['emp_id'] . '\', \'' . addslashes($row['fullname']) . '\', \'' . $row['email'] . '\', \'' . $row['date_of_birth'] . '\', \'' . $row['date_of_joining'] . '\', \'' . $row['salary'] . '\')">update</button>
        <button onclick="openDeleteModal(\'' . $row['emp_id'] . '\')">delete</button>
    ';

    $data[] = array(
        $no++,                      
        $row['fullname'],           
        $row['email'],              
        $row['date_of_birth'],      
        $row['date_of_joining'],    
        $row['salary'],             
        $actions                    
    );
}

$response = array(
    "draw" => $draw,
    "recordsTotal" => intval($totalRecords),
    "recordsFiltered" => intval($totalRecords),
    "data" => $data
);

echo json_encode($response);
?>