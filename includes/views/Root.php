<!DOCTYPE html>
<html>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
        <base href="<?php echo BASEDIR ?>">
        <?php if (isset($_GET["d"])): ?>
<link rel="stylesheet" type="text/css" href="static/css/style.css" />
        <?php else: ?>
<link rel="stylesheet" type="text/css" href="static/css/style.min.css" />
<?php endif ?>
    </head>
    <body>

        <?php
          $gitwebframe=new GitWebFrame(1280,800);
          echo $gitwebframe->render($gitwebframe->loadweb($name));
?>
      <div class="" style="" id="minetip-tooltip"></div>
      <script src="static/js/script.js" charset="utf-8"></script>
      <script src="static/js/MinecraftObfuscated.min.js"></script>
    </body>
</html>
