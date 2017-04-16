@include('style_css')
<div class="links" style="margin-top : 10px;margin-bottom : 10px;">
    <a href="/">Ana Sayfa</a>
    <a href="/images">Tüm Resimler</a>
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
    $length = count($users);
    if($length == 0){
        echo "<div class='alert alert-warning'>Herhangi bir kayıt bulunamadı !</div>";
    }else{
        echo "<h5 style='text-align:center;font-weight:bold;'>KULLANICILAR</h5>";
        echo "<div align='center'><table border='2'>";
        echo "<th><b>İsim</b></th><th><b>Kullanıcı Adı</b></th><th><b>E-Posta</b></th><th><b>Kayıt Tarihi</b></th>";
        foreach ($users as $key => $user) {
                echo "<tr>
                        <td>".$user->contact."</td>
                        <td>".$user->username."</td>
                        <td>".$user->email."</td>
                        <td>".date("d M Y H:i:s D",$user->save_date)."</td>
                    </tr>";
        }
        echo "</table></div>";
    }
?>