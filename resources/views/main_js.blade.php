<script type="text/javascript">
  $(document).ready(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
      }
    });
    $("#loginForm").validate({
      rules : {
        username : {
          required : true
        },
        password : {
          required : true,
        }
      },
      messages : {
        username : {
          required : "Lütfen kullanıcı adını boş bırakmayınız !",

        },
        password : {
          required : "Lütfen şifreyi boş bırakmayınız !",
        }
      },
      submitHandler : function(form) {
       var resultMessage = "";
       var username = $("#username").val();
       var password = $("#password").val();
       var token = $( "input[name=_token]" ).val();
       username = username.trim();
       password = password.trim();
       if(username.length == 0){
          resultMessage += "<li>Kullanıcı adınızı boş bırakmayınız !</li></br>";
       }
       if(password.length == 0){
          resultMessage += "<li>Şifrenizi boş bırakmayınız !</li></br>";
       }
       if(resultMessage.length == 0){
          $.ajax({
           url : "/login",
           type: "POST",
           data : {_token : token ,  username : username , password : password },
           success: function(data, textStatus, jqXHR) {
               if(data != "false"){
                  window.location.href = '/users';
               }else{
                  $("#result").css("visibility" , "visible");
                  $("#result").html("<li>Kullanıcı adınız ya da şifreniz yanlış !</li>");
               }
           },
           error: function (jqXHR, textStatus, errorThrown) {

           }
        });
       }else{
          $("#result").css("visibility" , "visible");
          $("#result").html(resultMessage);
          resultMessage = "";
       }
      }
    });
});
</script>