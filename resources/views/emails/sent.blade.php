<html>
<head>

    <style>
        .text-center{
            text-align: center;
        }
        *{
            font-family: "Simplified Arabic";
            font-size: 18px;;
        }
    </style>
</head>
<body class="text-center" style="padding: 50px 40px 40px 50px; border: 1px rgba(0,0,0,0.12) solid;background-color:  #ffffff;">
<div style="padding: 2px; border: 1px #f5f5f5 solid;background-color:  #e7ecf1;">
    <h2 style="color: #0a6aa1; text-align: center;">{{$title}}</h2>
 
    <button style="padding:10px 20px 10px;background:#0a6aa1;text-align:center;border:2px solid #FFF8F8;border-radius:7px;"><a style="text-decoration:none;color:#fff" href="@php echo $content @endphp"> Reset </a></button>
</div>

</body>
</html>

