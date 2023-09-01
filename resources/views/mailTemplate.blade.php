<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi Akun</title>
</head>
<body>
    <p>Halo <b>{{$details['fname']}} {{$details['mname']}} {{$details['lname']}}</b>!</p>
    <p>Berikut ini adalah Data Anda:</p>
    <table>
      <tr>
        <td>Nama Lengkap</td>
        <td>:</td>
        <td>{{$details['fname']}} {{$details['mname']}} {{$details['lname']}}</td>
      </tr>
      <tr>
        <td>E-Mail</td>
        <td>:</td>
        <td>{{$details['email']}}</td>
      </tr>
      <tr>
        <td>No Hp</td>
        <td>:</td>
        <td>{{$details['no_hp']}}</td>
      </tr>
      <tr>
        <td>Tanggal Register</td>
        <td>:</td>
        <td>{{$details['datetime']}}</td>
      </tr>
    </table>

    <center>
      <h3>Copy link di bawah ini ke browser Anda untuk Verifikasi Akun:</h3>
      <b style="color:blue">{{$details['url']}}</b>
    </center>

  <p>Terima kasih telah melakukan registrasi.</p>
</body>
</html>