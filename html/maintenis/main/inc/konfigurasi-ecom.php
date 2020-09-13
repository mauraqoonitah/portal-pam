<?php 
		
$checkout_sender="smserwan@gmail.com";
$checkout_subject="Pesanan No. [no_order] di [nama_web]";
$checkout_body="<p>Terima kasih telah melakukan pemesanan di [nama_web]. Berikut ini adalah pesanan anda:</p><p>Nomor Invoice : <strong>[no_order]</strong></p>[table_order_detail]<br /><br />Pesanan tersebut akan dikirimkan ke alamat:<br /><br />[alamat_pengiriman]<br /><br />Pesanan akan segera kami proses setelah Anda melakukan pembayaran. Pembayaran dapat dilakukan secara transfer melalui rekening di bawah ini:<br />[table_rekening]<br />Setelah transfer anda dapat melakukan konfirmasi pembayaran melalui <a href=\"[alamat_web]index.php?go=confirmation\">halaman konfirmasi</a> untuk mempercepat proses verifikasi.<br /><br />Salam Hangat,<br />[nama_web]";
 
		
?>