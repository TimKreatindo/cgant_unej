<?php
defined('BASEPATH')or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel extends CI_Controller {
    public function index(){
        $spreadsheet = new Spreadsheet();
        
        $sheet_1 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Kerjasama');
        $sheet_2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Kegiatan Tridharma');
        $sheet_3 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'HKI');
        $sheet_4 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Kolokium  Seminar  Webinar');
        $sheet_5 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Rekognisi');
        $sheet_6 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Sertifikat Kompetensi');
        $sheet_7 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Publikasi');
        $sheet_8 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Pengelola Jurnal');
        $sheet_9 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Organisasi');
        $sheet_10 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Hibah Penelitian');
        $sheet_11 = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Hibah Pengabdian');

        $spreadsheet->addSheet($sheet_1, 0);
        $spreadsheet->addSheet($sheet_2, 1);
        $spreadsheet->addSheet($sheet_3, 2);
        $spreadsheet->addSheet($sheet_4, 3);
        $spreadsheet->addSheet($sheet_5, 4);
        $spreadsheet->addSheet($sheet_6, 5);
        $spreadsheet->addSheet($sheet_7, 6);
        $spreadsheet->addSheet($sheet_8, 7);
        $spreadsheet->addSheet($sheet_9, 8);
        $spreadsheet->addSheet($sheet_10, 9);
        $spreadsheet->addSheet($sheet_11, 10);

        $styleHeaderTitle = [
            'font' => [
                'name' => 'Arial Rounded MT Bold',
                'size' => 15
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
        ];

        $styleTHead = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['argb' => 'dce7fc']
            ],
            'font' => [
                'color' => ['rgb' => '303030'],
                'name' => 'Arial',
                'size' => 12
            ]
        ];


        //sheet 1 (kerjasama)
        $xls_sheet1 = $spreadsheet->getActiveSheet();
        
        $xls_sheet1->setCellValue('A2', 'Kerjasama');
        $xls_sheet1->mergeCells('A2:E2');
        $xls_sheet1->getStyle('A2:E2')->applyFromArray($styleHeaderTitle);
        
        $xls_sheet1->setCellValue('A4', '#')
        ->setCellValue('B4', 'Lembaga Mitra')
        ->setCellValue('C4', 'Tingkat')
        ->setCellValue('D4', 'Waktu dan Durasi')
        ->setCellValue('E4', 'Bukti')
        ;
        $xls_sheet1->getStyle('A4:E4')->applyFromArray($styleTHead);

        //end sheet 1










        
        

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="laporan.xlsx"');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        echo 'ok gas';
    }
}