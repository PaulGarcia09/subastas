<?php 

function parseCSVComments($comments) {
  $comments = str_replace('"', '""', $comments);
  if(eregi(",", $comments) or eregi("\n", $comments)) {
    return '"'.$comments.'"';
  } else {
    return $comments;
  }
}

$tbl_name = $_GET['tbl_name'];
$sql_query = $_GET['sql_fields'];
$filename = $tbl_name.".csv";


    $result = $connect->query($sql_query);

    $f = fopen('php://temp', 'wt');
    $first = true;
    while ($row = $result->fetch_assoc()) {
        if ($first) {
            fputcsv($f, array_keys($row));
            $first = false;
        }
        fputcsv($f, $row);
    } // end while

    $connect->close();

    $size = ftell($f);
    rewind($f);

    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Length: $size");
    header("Content-type: text/x-csv");
    header("Content-type: text/csv");
    header("Content-type: application/csv");
    header("Content-Disposition: attachment; filename=$filename");
    fpassthru($f);

    
    exit;


?>