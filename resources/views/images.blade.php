<style type="text/css">
	text{
		color : red;
	}
	mytitle{
		font-weight: bold;
	}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@include('style_css')
<div class="links" style="margin-top : 10px;margin-bottom : 10px;">
    <a href="/">Ana Sayfa</a>
    <a href="/users">Tüm Kullanıcılar</a>
    <?php
    $contact = Session::get('contact');
    if($contact == NULL || $contact == ''){
    ?>
    <a href="/login">Oturum Aç</a>
    <?php
    }else{?>
    <a href="/logout">Oturum Kapat</a> Hoş Geldin <b style="color:red;"><?php echo $contact;?></b>
    <?php
    }
    ?>
</div>
<?php
	$length = count($images);
	if($length == 0){
		echo "<div style='font-weight:bold;' class='alert alert-warning'>Herhangi bir kayıt bulunamadı !</div>";
	}else{
		echo "<h5 style='text-align:center;font-weight:bold;'>RESİMLER</h5>";
		echo "<div align='center'><table border='2'>";
		echo "<th><b>\tResim Açıklaması\t</b></th><th><b>\tResim İçeriği\t</b></th><th><b>\tesim Boyutu\t</b></th><th><b>\tKayıt Tarihi\t</b></th>";
		foreach ($images as $key => $image) {
				echo "<tr>
						<td>".$image->img_desc."</td>
						<td><img src='http://127.0.0.1:8080/imageUploadList/resources/upload/".$image->img_name."' width='100' height='100'/></td>
						<td>".$image->img_length." KB</td>
						<td>".date("d M Y H:i:s D",$image->save_date)."</td>
					</tr>";
		}
		echo "</table></div>";
	}
?>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>