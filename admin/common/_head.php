<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eye Candle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
<!--    <script type="text/javascript" src="./resources/scripts/jquery.validate.js"></script>-->
    
</head>
<body>
<script src="./js/jquery-1.11.3.js"></script>
<script type="text/javascript">
    $(function() {
        $('.delete').click(function() {
            
            var answer = confirm("確定刪除？");
            if (answer){
                return true;
            }
            else{
                return false;
            }
        });

        $('.left ul li a').click(function() {
            $(this).parents('li').siblings().find('ul').slideUp();
            $(this).siblings('ul').slideToggle();
            
        });

        
    });
</script>