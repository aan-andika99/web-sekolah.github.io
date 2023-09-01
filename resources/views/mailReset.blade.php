<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <style>
      b {
        background-color: #3498db;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 4px;
        transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    b:hover {
        background-color: #2980b9;
        transform: scale(1.05);
    }
    </style>
</head>
<body>
    <h4>Klik tombol di bawah jika anda meamng benar ingin meresset Password. Jika anda tidak merasa bahwa anda ingin melakukan penggantian password, maka abaikan pesan ini</h4>
    <center>
      <a href="{{$details['url']}}"><button>ada</button></a>
      <a href="{{$details['url']}}">CLICK HERE</a>
      <b style="color:blue">{{$details['url']}}</b>
      <p>Atau salin dan tempel tautan berikut di browser: {{$details['url']}}</p>

    </center>

    <?php 
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= "From: pengirim@email.com" . "\r\n";
    ?>
</body>
</html>