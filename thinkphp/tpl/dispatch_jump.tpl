{__NOLAYOUT__}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>跳转提示</title>

    <script src="__STATICA__/js/jquery.js"></script>
    <script>


        $(function () {


            function autoheight() {
                contHeight = document.documentElement.scrollHeight; //页面内容的高
                pageHeight = document.documentElement.clientHeight; //浏览器可是区域的高
                contwidth = document.documentElement.scrollWidth; //页面内容的高
                pagewidth = document.documentElement.scrollWidth; //浏览器可是区域的高
                sHeight = Math.max(pageHeight, contHeight);
                sWidth = Math.max(contwidth, contwidth);
                $(".body").css({"height":sHeight+"px"});
            }


            $(window).resize(function () {
                autoheight();
            })
            autoheight();

        })



    </script>



    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
        }
        body {
            height:100%;
            background:url(__STATICA__/img/bg1.jpg);
            font-family: "Microsoft Yahei", "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #333;
            font-size: 15px;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover


        }
        .system-message {
            width: 400px;
            height: 200px;
            background:#F9F5F5;
            border-radius:5px;
            box-shadow: silver 2px 2px 5px 5px;
            position: absolute;
            top:50%;
            left:50%;
            margin-top: -100px;
            margin-left: -200px;
        }
        .system-message h3 {
            font-size: 30px;
            font-weight: normal;
            line-height: 120px;
            padding-left:20px;
            margin-bottom: 12px;
        }
        .system-message .jump {
            padding-left:50px;
            padding-top: 10px;
        }
        .system-message .jump a {
            color: #333;
        }
        .system-message .success,
        .system-message .error {
            line-height: 1.8em;
            font-size: 36px;
            padding-left:50px;
            margin-top: 30px;
        }
        .system-message .detail {
            font-size: 12px;
            line-height: 20px;
            margin-top: 20px;
            display: none;
            font-family: "Microsoft Yahei", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
    </style>
</head>

<body class="body">

<div class="system-message">
    <div style="float:left;margin-left: 50px;margin-top: 30px"><img src="http://www.yhjtcity.com/static/index/img/logo.png" alt="" style="height: 30px;width: 100px"></div>
    <?php switch ($code) {?>
    <?php case 1:?>
    <p class="success"style="width:250px;text-align: center;color:#2CABE2;font-size:22px;display:block;padding:0px;float:left;margin-top: 58px;">
    <?php echo(strip_tags($msg));?>
    </p>
    <?php break;?>
    <?php case 0:?>
    <p class="error" style="width:260px;text-align: center;color:red;font-size:22px;display:block;padding:0px;float:left;margin-top: 58px;">
    <?php echo(strip_tags($msg));?>
    </p>
    <?php break;?>

    <?php } ?>
    <div class="detail" style="float:left;margin-top: 10px"></div>
    <div class="jump" style="float:left;margin-top: 10px">
        不想等待 <a id="href" href="<?php echo($url);?>" style="font-size:1.1rem;padding: 0 5px;color: orange;">返回</a>页面将在
        <b id="wait"><?php echo($wait);?></b><span style="font-weight: 800;color: red;font-size: 21px;">S</span>&nbsp;后自动跳转
    </div>
</div>

<script type="text/javascript">
    (function() {

        var wait = document.getElementById('wait'),
            href = document.getElementById('href').href;

        wait.style="font-size:1.4rem;color:red"

        var interval = setInterval(function() {


            var time = --wait.innerHTML;
            if (time <= 0) {
                location.href = href;
                clearInterval(interval);
            };

        }, 1000);

    })();
</script>
</body>

</html>