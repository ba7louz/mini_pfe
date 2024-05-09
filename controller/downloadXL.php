<?php
session_start();
ob_start();

// import --------------------------
require_once "../config/connexion.php";
require_once "../model/pfecrud.php";
require_once "../model/crudetudiant.php";
require_once "../model/classecrud.php";
require_once "auth/auth.php";

// authentification -----------------
$Logged = (new auth())->check(1);

// PFE FindAll ----------------------
$binomes = ( ( new crud_pfe() )->findAll() );






// prepare the xls file
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="filename.csv"');

$file = fopen('php://output', 'w');

$arr = array(array('ID', 'titre', 'Etudiant1' ,'classe' , 'Etudiant2','classe','Etat'));

foreach ($binomes as $binome) :
    $et1 = (new crudetudiant())->getetudiantById($binome["id_etudiant1"]);
    $c1 = (new crudclasse())->getById($et1["id_classe"]);
    $et2 = null;
    $class2 = "";
    $np2 = "";
    if ( $binome["id_etudiant2"]) {
        $et2 = (new crudetudiant())->getetudiantById($binome["id_etudiant2"]);
        $c2 = (new crudclasse())->getById($et2["id_classe"]);
        $np2 = ( $et2["nom"]." ".$et2["prenom"]) ;
        $class2 = $c2["nom_classe"] ;
    }
    $etat = "encours" ;
    if($binome["validite"] == 1) $etat ="Acceptee";
    else if ($binome["validite"] == -1 ) $etat ="Refusee" ;
    $arr2 = array( $binome['id'], $binome['titre'], $et1['nom'] ." ".$et1["prenom"], $c2["nom_classe"],  $np2 ,$class2 ,$etat );
    array_push($arr ,$arr2);

endforeach; 

    foreach($arr as $row){
        fputcsv($file, $row, ";" );
    }
    
fclose($file);
//end file



/*
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Titre');
$sheet->setCellValue('C1', 'Etudiant1');
$sheet->setCellValue('D1', 'Classe1');
$sheet->setCellValue('E1', 'Etudiant2');
$sheet->setCellValue('F1', 'Classe2');
$sheet->setCellValue('G1', 'Etat');

$row = 2; // Start from row 2 for data

foreach ($binomes as $binome) {
    $et1 = (new crudetudiant())->getetudiantById($binome["id_etudiant1"]);
    $c1 = (new crudclasse())->getById($et1["id_classe"]);

    $etudiant1 = $et1["nom"] . " " . $et1["prenom"];
    $classe1 = $c1["nom_classe"];

    $etudiant2 = "";
    $classe2 = "";

    if ($binome["id_etudiant2"]) {
        $et2 = (new crudetudiant())->getetudiantById($binome["id_etudiant2"]);
        $c2 = (new crudclasse())->getById($et2["id_classe"]);
        $etudiant2 = $et2["nom"] . " " . $et2["prenom"];
        $classe2 = $c2["nom_classe"];
    }

    $etat = "Encours";
    if ($binome["validite"] == 1) {
        $etat = "Acceptée";
    } else if ($binome["validite"] == -1) {
        $etat = "Refusée";
    }

    $sheet->setCellValue('A' . $row, $binome['id']);
    $sheet->setCellValue('B' . $row, $binome['titre']);
    $sheet->setCellValue('C' . $row, $etudiant1);
    $sheet->setCellValue('D' . $row, $classe1);
    $sheet->setCellValue('E' . $row, $etudiant2);
    $sheet->setCellValue('F' . $row, $classe2);
    $sheet->setCellValue('G' . $row, $etat);

    $row++;
}

// Set headers for download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="filename.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;


*/

//header('location:admin.php');

?>