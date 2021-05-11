<?php
    session_start();
    if(empty($_SESSION["username"])){
        header('location:./login.php');
    }
    // require "./mysql.php";
    require "./theme_color.php";
    require_once './vendor/autoload.php';

    $mongostring = 'mongodb://pemweb:kelompok6@ec2-18-204-3-17.compute-1.amazonaws.com:27017/dbpemweb?authSource=dbpemweb&readPreference=primary&appname=MongoDB%20Compass&ssl=false';

    $client = new MongoDB\Client($mongostring);


$collection = $client->dbpemweb->tweets;


    $tweets_data = $collection->find();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
    <title>Thought</title>
</head>
<body class="w-100" style="overflow-x: hidden;">
<?php $loc='SEND YOUR THOUGHT'?>
        <?php include './components/navbar.php'?>
        <section class="row d-flex flex-row">
        <?php include './components/sidebar.php'?>
            <div class="col-lg-10 pt-3 d-flex">
                <div class="col-5 bg-white shadow-sm border p-4 rounded">
                <h2>✨</h2>
                <div class="mt-4">
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <h3>Tweets</h3>
                    </div>
                    <div class="">
                        <?php 
                            foreach($tweets_data as $data){
                                echo "<div class='border rounded shadow mt-3 p-2' style='cursor:pointer'>
                                <p>@{$data['author']}</p>
                                <p>{$data['text']}</p>
                                <small>{$data['date']}</small>
                            </div>
                                ";
                            }
                        ?>
                        <!-- <div class="border rounded shadow mt-3 p-2">Mencuci baju</div> -->
                    </div>
                    <div>

                    </div>
                </div>
                </div>

            <div class="col-5 bg-white" style="margin-left: 24px;">
                <div class="border rounded">
                    <div>
                        <form action="./mongo/insert-action.php" method="POST">
                        <input placeholder="What's happening?" name="text" class="form-control" style="height: 48px;" />
                        <input type="text" name="author" value="<?php echo $_SESSION["username"] ?>" style="display: none;">
                        <div class="mt-4 d-flex justify-content-end">
                            <button class="btn btn-primary text-right">
                                Post
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</body>
</html>