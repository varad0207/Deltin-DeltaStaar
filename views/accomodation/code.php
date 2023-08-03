<?php
include '../../controllers/includes/common.php';
require '../../../frontend/phpimport/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['excel'])) {
    $ext = "xlsx";
    $fileName = "Accommodation-Details" . time();
    $query = $_POST['excel'];
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Sr No');
        $sheet->setCellValue('B1', 'Accommodation Name');
        $sheet->setCellValue('C1', 'Status');
        $sheet->setCellValue('D1', 'Capacity');
        $sheet->setCellValue('E1', 'Occupied');
        $sheet->setCellValue('F1', 'Available');
        $sheet->setCellValue('G1', 'Gender');
        $sheet->setCellValue('H1', 'Remark');

        $rowCount = 2;
        $srno = 1;
        while ($data = mysqli_fetch_assoc($query_run)) {
            $sheet->setCellValue('A' . $rowCount, $srno);
            $sheet->setCellValue('B' . $rowCount, iconv('UTF-8', 'ISO-8859-1', strip_tags($data['acc_name'])));
            $sheet->setCellValue('C' . $rowCount, iconv('UTF-8', 'ISO-8859-1', strip_tags($data['bldg_status'])));
            $sheet->setCellValue('D' . $rowCount, iconv('UTF-8', 'ISO-8859-1', strip_tags($data['tot_capacity'])));
            $sheet->setCellValue('E' . $rowCount, iconv('UTF-8', 'ISO-8859-1', strip_tags($data['occupied_rooms'])));
            $sheet->setCellValue('F' . $rowCount, iconv('UTF-8', 'ISO-8859-1', strip_tags($data['available_rooms'])));
            $sheet->setCellValue('G' . $rowCount, iconv('UTF-8', 'ISO-8859-1', strip_tags($data['gender'])));
            $sheet->setCellValue('H' . $rowCount, iconv('UTF-8', 'ISO-8859-1', strip_tags($data['remark'])));
            $rowCount++;
            $srno++;
        }

        $writer = new Xls($spreadsheet);
        $final_fileName = $fileName . '.xlsx';

        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=Accomo_log.xls");
        $writer->save('php://output');

        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment; filename="' . urlencode($final_fileName) . '"');
        
    } else {
        echo "Error encountered...";
    }
}
?>
