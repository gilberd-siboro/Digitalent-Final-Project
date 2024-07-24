<?php
require_once('tcpdf/tcpdf.php');

// Create new TCPDF object
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('List Mahasiswa');
$pdf->SetSubject('List Mahasiswa');
$pdf->SetKeywords('TCPDF, PDF, Mahasiswa');

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 11);

// Content
$html = '<h2 style="font-family: Arial, sans-serif;">List Mahasiswa</h2>';

$html .= '<table border="1" cellspacing="0" cellpadding="3" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #ddd;">
                    <th style="padding: 8px; font-weight: bold;">NO</th>
                    <th style="padding: 8px;font-weight: bold;">NIM</th>
                    <th style="padding: 8px;font-weight: bold;">Nama</th>
                    <th style="padding: 8px;font-weight: bold;">Gender</th>
                    <th style="padding: 8px;font-weight: bold;">Jurusan</th>
                </tr>
            </thead>
            <tbody>';

// Fetch data from database and add to PDF
include 'koneksi.php';
$mahasiswa  = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
$no = 1;
foreach ($mahasiswa as $row) {
    $jenis_kelamin = $row['jenis_kelamin'] == 'P' ? 'Perempuan' : 'Laki laki';
    $html .= "<tr>
                <td style='padding: 8px;'>$no</td>
                <td style='padding: 8px;'>" . $row['nim'] . "</td>
                <td style='padding: 8px;'>" . $row['nama'] . "</td>
                <td style='padding: 8px;'>" . $jenis_kelamin . "</td>
                <td style='padding: 8px;'>" . $row['jurusan'] . "</td>
            </tr>";
    $no++;
}

$html .= '</tbody></table>';

$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('list_mahasiswa.pdf', 'I');
