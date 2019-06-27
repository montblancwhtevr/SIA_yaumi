<?php  
include 'function.php';

checkUser();

	include "koneksi.php";
    require('fpdf/fpdf.php');
     
    $sql="select siswa.id_siswa, nilai.id_siswa, siswa.nama_siswa, nilai.id_mapel,mapel.mapel, nilai.harian, nilai.absen, nilai.uts, nilai.uas, nilai.jumlah, nilai.rata  from siswa inner join nilai ON siswa.id_siswa = nilai.id_siswa inner join mapel on nilai.id_mapel = mapel.id_mapel where id_kelas=3";
    $db_query = mysql_query($sql) or die("Query gagal");
    //Variabel untuk iterasi
    $i = 0;
    //Mengambil nilai dari query database
    while($data=mysql_fetch_row($db_query))
    {
        $cell[$i][1] = $data[1];
        $cell[$i][2] = $data[2];
        $cell[$i][3] = $data[4];
        $cell[$i][4] = $data[5];
        $cell[$i][5] = $data[6];
        $cell[$i][6] = $data[7];
        $cell[$i][7] = $data[8];
        $cell[$i][8] = $data[9];
        $cell[$i][9] = $data[10];
        $i++;
    }

	//memulai pengaturan output PDF
    class PDF extends FPDF
    {
        
        //untuk pengaturan header halaman
        function Header()  {

    $this->SetMargins (2,2,2);

    $this->Image('logo.png',1,1);

    $this->SetFont('Arial','B',11);
 
    $this->Cell(0,0.75,' REKAPITULASI HASIL NILAI AKADEMIK SISWA ',0,0,'C');
 
    $this->Ln();
 
    $this->SetFont('Arial','B',11);
 
    $this->Cell(0,0.75,'KELAS 3 SD NEGERI BUMIJO ',0,0,'C');
 
    $this->Ln();
    $this->SetFont('Arial','B',11);
 
    $this->Cell(0,0.75,' YOGYAKARTA ',0,0,'C');
 
    $this->Ln();
 
    $this->SetFont('Arial','',9);
 
    $this->Cell(0,0.5,'Jalan Tentara Pelajar No. 22 Telp. (0274) 524704. Email : sdnbumijo@rocketmail.com',0,0,'C');
    $this->Ln();
 
    $this->Ln();
    $this->SetFont('Arial','',14);
    $this->Line(2, 4, 27, 4);
 
   	
        }
    }

	//pengaturan ukuran kertas L - LANDSCAPE
    $pdf = new PDF('L','cm','A4');
    $pdf->Open();
    $pdf->AddPage();
    //Ln() = untuk pindah baris
    $pdf->Ln();
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(1,1,'No.','LRTB',0,'C');
    $pdf->Cell(7,1,'Nama','LRTB',0,'C');
    $pdf->Cell(5,1,'Mata Pelajaran','LRTB',0,'C');
    $pdf->Cell(2,1,'Harian','LRTB',0,'C');
    $pdf->Cell(2,1,'Absensi','LRTB',0,'C');
    $pdf->Cell(2,1,'UTS','LRTB',0,'C');
    $pdf->Cell(2,1,'UAS','LRTB',0,'C');
    $pdf->Cell(2,1,'Jumlah','LRTB',0,'C');
    $pdf->Cell(2,1,'Rata-rata','LRTB',0,'C');
    $pdf->Ln();
    $pdf->SetFont('Times',"",10);
    for($j=0;$j<$i;$j++)
    {
        //menampilkan data dari hasil query database
        $pdf->Cell(1,1,$j+1,'LBTR',0,'C');
        $pdf->Cell(7,1,$cell[$j][2],'LBTR',0,'L');
        $pdf->Cell(5,1,$cell[$j][3],'LBTR',0,'C');
        $pdf->Cell(2,1,$cell[$j][4],'LBTR',0,'C');
        $pdf->Cell(2,1,$cell[$j][5],'LBTR',0,'C');
        $pdf->Cell(2,1,$cell[$j][6],'LBTR',0,'C');
        $pdf->Cell(2,1,$cell[$j][7],'LBTR',0,'C');
        $pdf->Cell(2,1,$cell[$j][8],'LBTR',0,'C');
        $pdf->Cell(2,1,$cell[$j][9],'LBTR',0,'C');
        $pdf->Ln();
    }
    //menampilkan output berupa halaman PDF
    $pdf->Output();
?>