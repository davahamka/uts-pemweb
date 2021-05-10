<?php
    session_start();
    if(empty($_SESSION["username"])){
        header('location:./login.php');
    }
    // require "./mysql.php";
    require "./theme_color.php";
    // require "./read_req.php";
    // $query = $mysql->query("SELECT * FROM todos");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
    <title>Todolist</title>
</head>
<body class="w-100" style="overflow-x: hidden;">
<?php $loc='SEND YOUR THOUGHT'?>
        <?php include './components/navbar.php'?>
        <section class="row d-flex flex-row">
        <?php include './components/sidebar.php'?>
            <div class="col-lg-10 pt-3">
                <div class="col-5 bg-white shadow-sm border p-4 rounded">
                <h2>📝</h2>
                <div class="mt-4">
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <h3>Dava's Todo</h3>
                        <button class="btn rounded-circle border" style="width:40px;height:40px;font-size:15px;">+</button>
                    </div>
                    <div class="">
                        <div class="border rounded shadow mt-3 p-2" style="cursor:pointer">Mencuci baju</div>
                        <div class="border rounded shadow mt-3 p-2">Mencuci baju</div>
                    </div>
                    <div>

                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>