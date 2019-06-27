<?php  
include 'function.php';

checkUser();

	include "koneksi.php";
    require('fpdf/fpdf.php');
     
    $sql="select nilai.id_nilai, mapel.kode_mapel,mapel.nama_mapel, guru.nip, guru.nama, siswa.nis,siswa.nama, mapel.kkm, nilai.absen, nilai.tugas, nilai.uts, nilai.uas, nilai.jumlah, nilai.rata, nilai.status, tahun.kode_ta, tahun.nama_ta, semester.kode_sem, semester.nama_sem, kelas.kode_kelas, kelas.nama_kelas from nilai inner join mapel on mapel.kode_mapel = nilai.kode_mapel inner join guru on guru.nip = nilai.nip inner join siswa on siswa.nis = nilai.nis inner join tahun on tahun.kode_ta = nilai.kode_ta inner join semester on semester.kode_sem = nilai.kode_sem inner join kelas on kelas.kode_kelas = nilai.kode_kelas where siswa.nis = ".$_SESSION['username']."";
    $db_query = mysql_query($sql) or die("Query gagal");
    //Variabel untuk iterasi
    $i = 0;
    //Mengambil nilai dari query database
    while($data=mysql_fetch_row($db_query))
    {
        $cell[$i][1] = $data[1];
        $cell[$i][2] = $data[2];
        $cell[$i][3] = $data[3];
        $cell[$i][4] = $data[4];
        $cell[$i][5] = $data[5];
        $cell[$i][6] = $data[6];
        $cell[$i][7] = $data[7];
        $cell[$i][8] = $data[8];
        $cell[$i][9] = $data[9];
        $cell[$i][10] = $data[10];
        $cell[$i][11] = $data[11];
        $i++;
    }

	//memulai pengaturan output PDF
    class PDF extends FPDF
    {
        //untuk pengaturan header halaman
        function Header()  {

    $this->Image('icon.png',1,1);

    $this->SetFont('Arial','B',11);
 
    $this->Cell(0,0.75,' REKAPITULASI HASIL AKADEMIK SISWA ',0,0,'C');
 
    $this->Ln();
 
    $this->SetFont('Arial','B',11);
 
    $this->Cell(0,0.75,' MADRASAH ALIYAH WATHONIYAH ISLAMIYAH ',0,0,'C');
 
    $this->Ln();
    $this->SetFont('Arial','B',11);
 
    $this->Cell(0,0.75,' KEBARONGAN ',0,0,'C');
 
    $this->Ln();
 
    $this->SetFont('Arial','',9);
 
    $this->Cell(0,0.5,'Jalan Buntu-Yogyakarta KM 02 Telp. (0274) 524704. Email : aliyah@mwi.sch.id',0,0,'C');
    $this->Ln();
 
    $this->Ln();
    $this->SetFont('Arial','',14);
    $this->Line(1, 4, 20, 4);
    $this->Ln();
 
   	        }
    }

	//pengaturan ukuran kertas P = Portrait
    $pdf = new PDF('P','cm','A4');
    $pdf->Open();
    $pdf->AddPage();
    //Ln() = untuk pindah baris
    for($j=0;$j<$i;$j++)
    {
        $pdf->SetFont('Times',"",11);

        $pdf->Cell(3.5,1,'Nama Siswa','',0,'L');
        $pdf->Cell(0.2,1,':','',0,'L');
        $pdf->Cell(0.2,1,$cell[$j][2],'',0,'L');
        $pdf->Cell(9,1,'','',0,'L');
        $pdf->Cell(4,1,'Tahun Ajaran','',0,'L');
        $pdf->Cell(0.2,1,':','',0,'L');
        $pdf->Cell(0.2,1,$cell[$j][11],'',0,'L');
        $pdf->Ln();
        $pdf->Cell(3.5,1,'Nomor Induk Siswa','',0,'L');
        $pdf->Cell(0.2,1,':','',0,'L');
        $pdf->Cell(0.2,1,$cell[$j][1],'',0,'L');
        $pdf->Cell(9,1,'','',0,'L');
        $pdf->Cell(4,1,'Semester','',0,'L');
        $pdf->Cell(0.2,1,':','',0,'L');
        $pdf->Cell(0.2,1,$cell[$j][10],'',0,'L');
        $pdf->Ln();
        
  
    $pdf->SetFont('Times','B',11);
    $pdf->Cell(1,1,'No.','LRTB',0,'C');
    $pdf->Cell(6,1,'Mata Pelajaran','LRTB',0,'C');
    $pdf->Cell(2,1,'Harian','LRTB',0,'C');
    $pdf->Cell(2,1,'Absensi','LRTB',0,'C');
    $pdf->Cell(2,1,'UTS','LRTB',0,'C');
    $pdf->Cell(2,1,'UAS','LRTB',0,'C');
    $pdf->Cell(2,1,'Jumlah','LRTB',0,'C');
    $pdf->Cell(2,1,'Rata-rata','LRTB',0,'C');
    $pdf->Ln();
    
    
        //menampilkan data dari hasil query database
       
        $pdf->Cell(1,1,$j+1,'LBTR',0,'C');
        $pdf->Cell(6,1,$cell[$j][3],'LBTR',0,'C');
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