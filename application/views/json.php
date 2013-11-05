<?php
header('Content-Type:application/json');
$data['resultset'] = $resultset;
echo json_encode($data);
?>
