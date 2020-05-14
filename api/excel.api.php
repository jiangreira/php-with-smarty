<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

$db = new PDO('mysql:host=localhost;dbname=Test_04;charset=utf8', 'root', 'kuma0315');

switch ($_GET['do']) {
    case 'test':

        $postdata = $_POST['perioddata'];
        $num = count($postdata);
        $words = "";
        for ($i = 0; $i < $num; $i++) {
            if ($i == 0) {
                $words = $postdata[$i];
            } else {
                $words = $words . ',' . $postdata[$i];
            }
        }
        if ($num === 0) {
            return 'none';
        } elseif ($num === 1) {
            $result = $db->query('SELECT * FROM detail WHERE iddetail=' . $words)->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $result = $db->query('SELECT * FROM detail WHERE iddetail IN(' . $words . ')')->fetchAll(PDO::FETCH_ASSOC);
        }
        $data[] = array('期數', '寬頻固網', '無限寬頻', '行動');
        if (count($result) >= 1) {
            foreach ($result as $key => $row) {
                $data[] = array(
                    'Period' => $row['Period'],
                    'BCable' => $row['B_ADSL'] + $row['B_Cable_Modem'] + $row['B_FTTX '] + $row['B_Leased_Line'],
                    'BWireless' => $row['WB_PWLAN'] + $row['WB_3GDate'] + $row['WB_4GDate'],
                    'Mobile' => $row['M_3GDataCard'] + $row['M_3GPhone'] + $row['M_4GDataCard '] + $row['M_4GPhone']
                );
            };
        } else {
            return 'nodata';
        }
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray($data, NULL, 'A1');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf8');
        header('Content-Disposition: attachment;filename="檔名.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        ob_start();
        $writer->save("php://output");
        $content = ob_get_contents();
        ob_end_clean();

        $today = date("Y-m-d");

        $response =  array(
            'name' => $today,
            'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($content)
        ); //mime type of used format
        echo json_encode($response);
        break;
    case 'exportimgexcel':
        print_r($_POST);
        // $new=base64_encode($_POST['url']);
        // $spreadsheet = new Spreadsheet();
        // $sheet = $spreadsheet->getActiveSheet();
        // $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        // $drawing->setName('Logo');
        // $drawing->setDescription('Logo');
        // $drawing->setPath($_POST['url']);
        // $drawing->setHeight(36);
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf8');
        // header('Content-Disposition: attachment;filename="檔名.xlsx"');
        // header('Cache-Control: max-age=0');
        // $writer = new Xlsx($spreadsheet);
        // ob_start();
        // $writer->save("php://output");
        // $content = ob_get_contents();
        // ob_end_clean();

        // $today = date("Y-m-d");

        // $response =  array(
        //     'name' => $today,
        //     'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($content)
        // ); //mime type of used format
        // echo json_encode($response);
        break;
}
