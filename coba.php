<!DOCTYPE html>
<html>
<head>
  <title>maribelajarcoding.com</title>
  <link href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css"
    rel="stylesheet" type="text/css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
</head>
<body>
<form action="" id="Form">
<table>
  <tr>
    <td valign="top">Username</td>
    <td><input type="text" name="username" data-validation="length alphanumeric" 
     data-validation-length="3-17" 
     data-validation-error-msg="Nama pengguna harus berupa nilai alfanumerik (3-17 karakter)"></td>
  </tr>
  <tr>
    <td valign="top">Password</td>
    <td> <input type="password" name="pass_confirmation" data-validation="strength" 
     data-validation-strength="1" data-validation-error-msg="Kata sandi tidak cukup kuat"></td>
  </tr>
  <tr>
    <td valign="top">Repeat Password</td>
    <td><input type="password" name="pass" data-validation="confirmation" data-validation-error-msg="Kata sandi tidak dapat dikonfirmasi"></td>
  </tr>
  <tr>
    <td valign="top">Email</td>
    <td><input type="email" name="email" data-validation="email" data-validation-error-msg="Anda belum memberikan alamat email yang benar"></td>
  </tr>
  <tr>
    <td valign="top">Tanggal Lahir</td>
    <td><input type="text" name="birth" data-validation="birthdate" 
     data-validation-help="yyyy-mm-dd" data-validation-error-msg="Anda belum memberikan tanggal yang benar"></td>
  </tr>
   <tr>
    <td valign="top">Negara</td>
    <td><input type="text" name="country" id="country" data-validation="country" data-validation-error-msg="Nilai input salah"></td>
  </tr>
  <tr>
    <td valign="top">Foto Profil</td>
    <td><input name="image" type="file" data-validation="mime size required" 
     data-validation-allowing="jpg, png" 
     data-validation-max-size="300kb" 
     data-validation-error-msg-required="Tidak ada gambar yang dipilih"></td>
  </tr>
  <tr>
    <td valign="top"></td>
    <td><input type="checkbox" data-validation="required" 
     data-validation-error-msg="Anda harus menyetujui persyaratan kami">
     I agree to the <a href="..." target="_blank">terms of service</a>
   </td>
  </tr>
  <tr>
    <td valign="top"></td>
    <td>
      <input type="submit" value="Simpan">
      <input type="reset" value="Reset form">
   </td>
  </tr>
</table>
</form>
<script>
  $.validate({
    modules : 'location, date, security, file',
    onModulesLoaded : function() {
      $('#country').suggestCountry();
    }
  });
</script>
</body>
</html>