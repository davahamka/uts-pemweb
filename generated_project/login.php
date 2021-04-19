<?php 
    require_once "./theme_color.php";
    require_once "./read_req.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="" style="overflow: hidden;">
    
    <section class="row d-flex flex-row align-items-center justify-content-center" style="height:100vh;">
        <div class="col-lg-5 px-5">
            <h1>Welcome to TDL</h1>
            <div>
            <form action="./index.php" method="POST">
            <?php
                foreach($login as $l){
                    if($l['is_input']==1){
                        $is_secure = 'text';
                        if($l['is_secure']==1){
                            $is_secure = 'password';
                        }
                        echo '<div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">'.$l['name'].'</label>
                        <input type="'.$is_secure.'" name="'.$l['field'].'" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>';
                    }
                }
            ?>

  <button type="submit" class="btn btn-primary" style="background:<?php echo $THEME_COLOR ?>">Submit</button>
</form>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div class="" style="height: 100vh;background:<?php echo $THEME_COLOR ?>">
            </div>
        </div>
    </section>
</body>
</html>