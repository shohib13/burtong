<?php
date_default_timezone_set("Asia/Jakarta"); 
require "plugins/phpmailer/class.phpmailer.php";

$mail = new PHPMailer;
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "ssl";
$mail->Port = 465; // set the SMTP port for the GMAIL server
$mail->Username = "shohib13@gmail.com"; // GMAIL username
$mail->Password = "pass"; // GMAIL password

$nama = $_POST['nama'];
$no_telepon = $_POST['no_telepon'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

$messages = $pesan;

$mail->SMTPDebug = 1;

$mail->From = $email;
$mail->FromName = $nama;
$mail->AddAddress($email, $nama);

$mail->Subject = 'Pesan dari pengunjung Burtong.com';
$message = '
<table border="0" cellpadding="0" cellspacing="0" style="color:rgb(0,0,0);font-family:Times New Roman;font-size:medium" width="100%">
	<tbody>
		<tr>
			<td style="font-family:arial,sans-serif;margin:0px">
			<table align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px solid rgb(204,204,204)" width="600">
				<tbody>
					<tr>
						<td style="margin:0px;padding:5px 30px">
						<table width="100%">
							<tbody>
								<tr>
									<td style="margin:0px"><img src="http://burtong.com/img/logo.jpg" width="200px" class="CToWUd"></td>
								</tr>
								<tr>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td bgcolor="#ffffff" style="margin:0px;padding:5px 30px">
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tbody>
								<tr>
									<td style="text-align:justify">Halo Admin Burtong saya <b>'.$nama.' </b>, Nomor Telp saya '.$no_telepon.', alamat saya '.$alamat.' dan email saya '.$email.' <br><br></td>
								</tr>
								<tr>
									<td>
										<table border="0" cellpadding="0" cellspacing="0" style="color:rgb(0,0,0);font-family:arial,sans-serif;font-size:medium;line-height:25.600000381469727px" width="100%">
											<tbody>
												<tr>
													<td style="font-family:Arial,sans-serif;margin:0px;padding:20px 0px 30px;color:rgb(88,88,90);font-size:16px;line-height:20px;text-align:justify">
														Pesan saya : '.$pesan.'
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td bgcolor="#f0f0f0" style="font-family:Open Sans,Arial,sans-serif;margin:0px;padding:10px 30px;line-height:23px"><b style="color:rgb(88,88,90)">CONTACT US BURTONG:</b><br>
						<font style="font-size:16px;color:rgb(88,88,90)"><a href="http://burtong.com" style="color:rgb(17,85,204)" target="_blank">http://burtong.com</a><br>
						<b><a href="https://www.facebook.com/phele.Sudden" style="color:rgb(17,85,204)" target="_blank">Facebook Admin</a></b>&nbsp;atau&nbsp;<b><a href="mailto:shohib13@gmail.com" target="_top">shohib13@gmail.com</a></b></font></td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
';
$mail->Body = $message;
$mail->IsHTML(true); 
if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}else { 
   header('location:index.php');
}

?>