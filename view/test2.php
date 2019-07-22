<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body { font-size: 18px; }

        .stars-container {
        position: relative;
        display: inline-block;
        color: transparent;
        }

        .stars-container:before {
        position: absolute;
        top: 0;
        left: 0;
        content: '★★★★★';
        color: lightgray;
        }

        .stars-container:after {
        position: absolute;
        top: 0;
        left: 0;
        content: '★★★★★';
        color: gold;
        overflow: hidden;
        }

        .stars-0:after { width: 0%; }
        .stars-10:after { width: 10%; }
        .stars-20:after { width: 20%; }
        .stars-30:after { width: 30%; }
        .stars-40:after { width: 40%; }
        .stars-50:after { width: 50%; }
        .stars-60:after { width: 60%; }
        .stars-70:after { width: 70%; }
        .stars-80:after { width: 80%; }
        .stars-90:after { width: 90%; }
        .stars-100:after { width: 100; }
    </style>


</head>
<body>
    <?php $val = 50?>
    <div><span class="stars-container stars-<?=$val?>">★★★★★</span></div>
</body>





</html>

