<html>
	<head>
		<title><?= $pdf ?></title>
	</head>
	<style>
		 .border{
          border-collapse: collapse;
        }

        .border table tr td{
          border: 1px solid black;
          font-size: 14px;
        }

        .border table tr th{
          border: 1px solid black;
          font-size: 14px;
        }

        table tr td
        {
            font-size: 13px;
        }
	</style>
	<body>
	<h2 style="text-align:center;font-weight:bold;">Laporan Hasil Peserta</h2>
	<div class="clearfix" style="padding-top: 10px;"></div>
	<p>
		Dengan Hormat, <br>
		Bapak, Ibu <br>
		Di- <br>
		Tempat
	</p>

	<p>berhubung dengan acara yang kita adakan saat ini sudah selesai maka dengan itu surat hasil peserta yang kami uji dengan biodata sebagai berikut : </p>
	<!-- <div class="border"> -->
		<table border="1" cellspacing="0" align="center" cellpadding="10" width="650">
			<thead>
				<tr>
					<th>Nomor</th>
					<th>Nama</th>
					<th>Tempat Lahir</th>
					<th>Tanggal Lahir</th>
					<th>Email</th>
				</tr>					
			</thead>
			<tbody>
				<tr>
					<?php foreach($dataPeserta as &$row){$row = get_object_vars($row);?>
						<?php $i=1 ?>
						<tr>
							<td><?= $i++ ?></td>
							<td><?= $row['nama'] ?></td>
							<td><?= $row['tempat_lahir'] ?></td>
							<td><?= $row['tanggal_lahir'] ?></td>
							<td><?= $row['email'] ?></td>
						</tr>
						<?php } ?>
				</tr>
			</tbody>
		</table>
		<br>
		<p>dengan nilai dan hasil sebagai berikut :</p>
		<table border="1" cellspacing="0" align="center" cellpadding="10" width="650">
			<tr>
				<th>Nilai</th>
				<th>Hasil</th>
			</tr>
			<tr>
				<?php foreach($dataNilai as &$row){$row = get_object_vars($row);?>
					<tr><td><?= $row['total_nilai'] ?></td>
					<?php if(80 < $row['total_nilai']){ echo "<td>kompeten</td>";} else { echo "<td>tidak kompeten</td>"; } ?>
					</tr>
				<?php } ?>		
			</tr>
			</table>

		<br>
			<p>
				dari hasil tersebut apabila peserta tidak kompeten, kami berharap para peserta harus lebih giat belajar lagi.
			</p>
<div class="clearfix" style="padding-top:50px;"></div>
<div class="border">
    <table cellpadding="5" cellspacing="0" width="700">
        <tr>
            <td style="text-align:left;border-top-style:0px;border-bottom-style:0px;border-right-style:0px;border-left-style:0px;">
                <b>Menerima dan menyetujui :</b><br><br>
                <br><br><br><br>
                <em><u>Kepala Sekolah SMKN 9 Medan</u></em><br>
                <b> SAKTI </b>
            </td>
            <td width="360px" style="text-align:center;vertical-align:top;border-top-style:0px;border-bottom-style:0px;border-left-style:0px;border-right-style:0px;">
                
            </td>
        </tr>
    </table>
</div>			
	<!-- </div> -->
	</body>
</html>