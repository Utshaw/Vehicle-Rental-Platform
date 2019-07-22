<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
       
    </style>


</head>
<body>
    <script>
        const date1 = new Date('2019-07-22');
        const date2 = new Date('2019-07-20');
        const diffTime = Math.abs(date2.getTime() - date1.getTime());
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
        alert(diffDays);
        </script>
</body>





</html>

