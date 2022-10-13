<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
include 'includes/session.php';

//Import Excel data to MySQL database in PHP
require_once (".library/vendor/autoload.php");

if (isset($_POST["import"])) {
    $allowedFiledType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 0; $i <= $sheetCount; $i ++) {
            $firstname = "";
            if (isset($spreadSheetAry[$i][0])) {
                $name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }
            $lastname = "";
            if (isset($spreadSheetAry[$i][1])) {
                $description = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            }
            $email = "";
            if (isset($spreadSheetAry[$i][2])) {
                $price = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            }
            $voters_key = "";
            if (isset($spreadSheetAry[$i][3])) {
                $quantity = mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);
            }
            $campus = "";
            if (isset($spreadSheetAry[$i][4])) {
                $quantity = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
            }
            $election_id = $_SESSION['election_id'];
            
            if (! empty($firstname) || ! empty($lastname) || ! empty($email) || ! empty($voters_key)) {
                $query = "insert into voters(firstname,lastname,email,voters_key,campus,election_id) values(?,?,?,?,?,?)";
                $paramType = "ssssss";
                $paramArray = array(
                    $name,
                    $description,
                    $price,
                    $quantity,
                    $quantity,
                    $election_id
                );
                $insertId = $db->insert($query, $paramType, $paramArray);
                
                if (! empty($insertId)) {
                    $type = "success";
                    $message = "Excel Data Imported into the Database";
                } else {
                    $type = "error";
                    $message = "Problem in Importing Excel Data";
                }
            }
        }
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }
}

header('location: voters.php');
?>

