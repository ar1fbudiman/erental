<?php
include '../conn/koneksi.php';
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"SELECT ta_reservasi.*, ref_kendaraan.*, ref_tempat.*, ta_pembayaran.*, ta_reservasi.status AS status_reservasi
            FROM ta_pembayaran
            INNER JOIN ta_reservasi ON ta_pembayaran.id_reservasi = ta_reservasi.id
            INNER JOIN ref_tempat ON ta_reservasi.id_tempat = ref_tempat.id
            INNER JOIN ref_kendaraan ON ta_reservasi.id_kendaraan = ref_kendaraan.id 
            WHERE ta_reservasi.status=1");
$html = '<center><h3>Daftar Penjualan Mobil</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%" cellspacing="0" cellpadding="8">
<tr>
<th>#</th>
<th>Nama</th>
<th>Kendaraan</th>
<th>Tujuan</th>
<th>Lama Pergi</th>
<th>Total Pembayaran</th>
</tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$no."</td>
 <td>".$row['nama_pengirim']."</td>
 <td>".$row['nm_kendaraan']."</td>
 <td>".$row['keterangan']."</td>
 <td>".$row['lama_pergi']."</td>
 <td>".number_format($row['total'],0,'.','.')."</td>
 </tr>";
 $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan.pdf');
?>