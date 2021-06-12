<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<? print $staticPath ?>/public/css/style.css">
    <title>Интернет провайдер</title>
    <link rel="shortcut icon" href="<? print $staticPath ?>/public/src/rec.icon" type="image/x-icon">
    <script defer src="<? print $staticPath ?>/public/sl.js"></script>
   
</head>
<body class="layout--grid">
    
    <? include_once 'partials/header.php'; ?>

    <? include_once 'partials/navigation.php'; ?>
   
    <main class="main"> 
       
        <?
            include_once $view;
        ?>

    </main>
   
    <? include_once 'partials/footer.php'; ?>

</body>
</html>