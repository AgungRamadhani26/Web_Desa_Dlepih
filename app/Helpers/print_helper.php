<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function exportPegawaiDesa($pegawai, $fileName)
{
   $spreadsheet = new Spreadsheet();
   $sheet = $spreadsheet->getActiveSheet();
   $sheet->setCellValue('A1', 'No');
   $sheet->setCellValue('B1', 'Nama dan Gelar');
   $sheet->setCellValue('C1', 'Jabatan');
   $sheet->setCellValue('D1', 'NIK');
   $sheet->setCellValue('E1', 'No KK');
   $sheet->setCellValue('F1', 'Email');
   $sheet->setCellValue('G1', 'No HP');
   $sheet->setCellValue('H1', 'Alamat');

   $column = 2;
   foreach ($pegawai as $pd) {
      $sheet->setCellValue('A' . $column, $column - 1);
      $sheet->setCellValue('B' . $column, $pd['nama_dan_gelar']);
      $sheet->setCellValue('C' . $column, $pd['jabatan']);
      $sheet->setCellValueExplicit('D' . $column, $pd['nik'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet->setCellValueExplicit('E' . $column, $pd['no_kk'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet->setCellValue('F' . $column, $pd['email']);
      $sheet->setCellValueExplicit('G' . $column, $pd['no_wa'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet->setCellValue('H' . $column, $pd['alamat']);
      $column++;
   }

   $sheet->getStyle('A1:H1')->getFont()->setBold(true);
   $sheet->getStyle('A1:H1')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setARGB('FFFF00');
   $sheet->getStyle('A1:H1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
   $sheet->getStyle('A1:H1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
   $styleArray = [
      'borders' => [
         'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => 'FF000000'],
         ],
      ],
   ];
   $spreadsheet->getActiveSheet()->getStyle('A1:H' . ($column - 1))->applyFromArray($styleArray);

   $sheet->getColumnDimension('A')->setAutoSize(true);
   $sheet->getColumnDimension('B')->setAutoSize(true);
   $sheet->getColumnDimension('C')->setAutoSize(true);
   $sheet->getColumnDimension('D')->setAutoSize(true);
   $sheet->getColumnDimension('E')->setAutoSize(true);
   $sheet->getColumnDimension('F')->setAutoSize(true);
   $sheet->getColumnDimension('G')->setAutoSize(true);
   $sheet->getColumnDimension('H')->setAutoSize(true);

   $writer = new Xlsx($spreadsheet);
   header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
   header('Content-Disposition: attachment;filename=' . $fileName);
   header('Cache-Control: max-age=0');
   $writer->save('php://output');
   exit();
}


function exportRW($rw, $fileName)
{
   $spreadsheet = new Spreadsheet();
   $sheet = $spreadsheet->getActiveSheet();
   $sheet->setCellValue('A1', 'No');
   $sheet->setCellValue('B1', 'Nama dan Gelar');
   $sheet->setCellValue('C1', 'NIK');
   $sheet->setCellValue('D1', 'No KK');
   $sheet->setCellValue('E1', 'RW');
   $sheet->setCellValue('F1', 'Dusun');
   $sheet->setCellValue('G1', 'No HP');
   $sheet->setCellValue('H1', 'Alamat');

   $column = 2;
   foreach ($rw as $r) {
      $sheet->setCellValue('A' . $column, $column - 1);
      $sheet->setCellValue('B' . $column, $r['nama_dan_gelar']);
      $sheet->setCellValueExplicit('C' . $column, $r['nik'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet->setCellValueExplicit('D' . $column, $r['no_kk'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet->setCellValue('E' . $column, $r['nama_rw']);
      $sheet->setCellValue('F' . $column, $r['dusun']);
      $sheet->setCellValueExplicit('G' . $column, $r['no_wa'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet->setCellValue('H' . $column, $r['alamat']);
      $column++;
   }

   $sheet->getStyle('A1:H1')->getFont()->setBold(true);
   $sheet->getStyle('A1:H1')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setARGB('FFFF00');
   $sheet->getStyle('A1:H1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
   $sheet->getStyle('A1:H1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
   $styleArray = [
      'borders' => [
         'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => 'FF000000'],
         ],
      ],
   ];
   $spreadsheet->getActiveSheet()->getStyle('A1:H' . ($column - 1))->applyFromArray($styleArray);

   $sheet->getColumnDimension('A')->setAutoSize(true);
   $sheet->getColumnDimension('B')->setAutoSize(true);
   $sheet->getColumnDimension('C')->setAutoSize(true);
   $sheet->getColumnDimension('D')->setAutoSize(true);
   $sheet->getColumnDimension('E')->setAutoSize(true);
   $sheet->getColumnDimension('F')->setAutoSize(true);
   $sheet->getColumnDimension('G')->setAutoSize(true);
   $sheet->getColumnDimension('H')->setAutoSize(true);

   $writer = new Xlsx($spreadsheet);
   header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
   header('Content-Disposition: attachment;filename=' . $fileName);
   header('Cache-Control: max-age=0');
   $writer->save('php://output');
   exit();
}


function exportRT($rt, $fileName)
{
   $spreadsheet = new Spreadsheet();
   $sheet = $spreadsheet->getActiveSheet();
   $sheet->setCellValue('A1', 'No');
   $sheet->setCellValue('B1', 'Nama dan Gelar');
   $sheet->setCellValue('C1', 'NIK');
   $sheet->setCellValue('D1', 'No KK');
   $sheet->setCellValue('E1', 'RT');
   $sheet->setCellValue('F1', 'RW');
   $sheet->setCellValue('G1', 'Dusun');
   $sheet->setCellValue('H1', 'No HP');
   $sheet->setCellValue('I1', 'Alamat');

   $column = 2;
   foreach ($rt as $r) {
      $sheet->setCellValue('A' . $column, $column - 1);
      $sheet->setCellValue('B' . $column, $r['nama_dan_gelar']);
      $sheet->setCellValueExplicit('C' . $column, $r['nik'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet->setCellValueExplicit('D' . $column, $r['no_kk'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet->setCellValue('E' . $column, $r['nama_rt']);
      $sheet->setCellValue('F' . $column, $r['nama_rw']);
      $sheet->setCellValue('G' . $column, $r['dusun']);
      $sheet->setCellValueExplicit('H' . $column, $r['no_wa'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet->setCellValue('I' . $column, $r['alamat']);
      $column++;
   }

   $sheet->getStyle('A1:I1')->getFont()->setBold(true);
   $sheet->getStyle('A1:I1')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setARGB('FFFF00');
   $sheet->getStyle('A1:I1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
   $sheet->getStyle('A1:I1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
   $styleArray = [
      'borders' => [
         'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => 'FF000000'],
         ],
      ],
   ];
   $spreadsheet->getActiveSheet()->getStyle('A1:I' . ($column - 1))->applyFromArray($styleArray);

   $sheet->getColumnDimension('A')->setAutoSize(true);
   $sheet->getColumnDimension('B')->setAutoSize(true);
   $sheet->getColumnDimension('C')->setAutoSize(true);
   $sheet->getColumnDimension('D')->setAutoSize(true);
   $sheet->getColumnDimension('E')->setAutoSize(true);
   $sheet->getColumnDimension('F')->setAutoSize(true);
   $sheet->getColumnDimension('G')->setAutoSize(true);
   $sheet->getColumnDimension('H')->setAutoSize(true);
   $sheet->getColumnDimension('I')->setAutoSize(true);

   $writer = new Xlsx($spreadsheet);
   header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
   header('Content-Disposition: attachment;filename=' . $fileName);
   header('Cache-Control: max-age=0');
   $writer->save('php://output');
   exit();
}

function exportAnggotaPkk($anggota_pkk, $fileName)
{
   $spreadsheet = new Spreadsheet();
   $sheet = $spreadsheet->getActiveSheet();
   $sheet->setCellValue('A1', 'No');
   $sheet->setCellValue('B1', 'Nama dan Gelar');
   $sheet->setCellValue('C1', 'NIK');
   $sheet->setCellValue('D1', 'No KK');
   $sheet->setCellValue('E1', 'Jabatan');
   $sheet->setCellValue('F1', 'No HP');
   $sheet->setCellValue('G1', 'Alamat');

   $column = 2;
   foreach ($anggota_pkk as $ap) {
      $sheet->setCellValue('A' . $column, $column - 1);
      $sheet->setCellValue('B' . $column, $ap['nama_dan_gelar']);
      $sheet->setCellValueExplicit('C' . $column, $ap['nik'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet->setCellValueExplicit('D' . $column, $ap['no_kk'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet->setCellValue('E' . $column, $ap['jabatan']);
      $sheet->setCellValueExplicit('F' . $column, $ap['no_wa'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet->setCellValue('G' . $column, $ap['alamat']);
      $column++;
   }

   $sheet->getStyle('A1:G1')->getFont()->setBold(true);
   $sheet->getStyle('A1:G1')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setARGB('FFFF00');
   $sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
   $sheet->getStyle('A1:G1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
   $styleArray = [
      'borders' => [
         'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => 'FF000000'],
         ],
      ],
   ];
   $spreadsheet->getActiveSheet()->getStyle('A1:G' . ($column - 1))->applyFromArray($styleArray);

   $sheet->getColumnDimension('A')->setAutoSize(true);
   $sheet->getColumnDimension('B')->setAutoSize(true);
   $sheet->getColumnDimension('C')->setAutoSize(true);
   $sheet->getColumnDimension('D')->setAutoSize(true);
   $sheet->getColumnDimension('E')->setAutoSize(true);
   $sheet->getColumnDimension('F')->setAutoSize(true);
   $sheet->getColumnDimension('G')->setAutoSize(true);

   $writer = new Xlsx($spreadsheet);
   header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
   header('Content-Disposition: attachment;filename=' . $fileName);
   header('Cache-Control: max-age=0');
   $writer->save('php://output');
   exit();
}

function exportAnggotaBumdes($anggota_bumdes, $fileName)
{
   $spreadsheet = new Spreadsheet();
   $sheet = $spreadsheet->getActiveSheet();
   $sheet->setCellValue('A1', 'No');
   $sheet->setCellValue('B1', 'Nama dan Gelar');
   $sheet->setCellValue('C1', 'NIK');
   $sheet->setCellValue('D1', 'No KK');
   $sheet->setCellValue('E1', 'Jabatan');
   $sheet->setCellValue('F1', 'No HP');
   $sheet->setCellValue('G1', 'Alamat');

   $column = 2;
   foreach ($anggota_bumdes as $ab) {
      $sheet->setCellValue('A' . $column, $column - 1);
      $sheet->setCellValue('B' . $column, $ab['nama_dan_gelar']);
      $sheet->setCellValueExplicit('C' . $column, $ab['nik'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet->setCellValueExplicit('D' . $column, $ab['no_kk'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet->setCellValue('E' . $column, $ab['jabatan']);
      $sheet->setCellValueExplicit('F' . $column, $ab['no_wa'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
      $sheet->setCellValue('G' . $column, $ab['alamat']);
      $column++;
   }

   $sheet->getStyle('A1:G1')->getFont()->setBold(true);
   $sheet->getStyle('A1:G1')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setARGB('FFFF00');
   $sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
   $sheet->getStyle('A1:G1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
   $styleArray = [
      'borders' => [
         'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => 'FF000000'],
         ],
      ],
   ];
   $spreadsheet->getActiveSheet()->getStyle('A1:G' . ($column - 1))->applyFromArray($styleArray);

   $sheet->getColumnDimension('A')->setAutoSize(true);
   $sheet->getColumnDimension('B')->setAutoSize(true);
   $sheet->getColumnDimension('C')->setAutoSize(true);
   $sheet->getColumnDimension('D')->setAutoSize(true);
   $sheet->getColumnDimension('E')->setAutoSize(true);
   $sheet->getColumnDimension('F')->setAutoSize(true);
   $sheet->getColumnDimension('G')->setAutoSize(true);

   $writer = new Xlsx($spreadsheet);
   header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
   header('Content-Disposition: attachment;filename=' . $fileName);
   header('Cache-Control: max-age=0');
   $writer->save('php://output');
   exit();
}
