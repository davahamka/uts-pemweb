<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/pattern.css" rel="stylesheet">
    <title>Todo List Generator</title>
</head>
<body>
<section style="height:100vh" class="pattern-dots-md red white d-flex flex-column align-items-center justify-content-center">
    <div class="bg-white p-5 border">
    <h1>Web App</h1>
    <h1 class="text-primary">Todo List Generate Project</h1>
    <p class="mt-1">Generate template form login dan form display data yang mendukung metode CRUD Melalui Database</p>
    <div class="d-flex flex-row gap-5 mt-4 ">
    <form action="upload.php" method="post" enctype="multipart/form-data" class="d-flex flex-column">
        <h2 class="text-center">Upload Requirement</h2>
        <input  type="file" required name="file" id="file">
        <input type="submit" value="Upload CSV & Generate Project" name="submit" class="btn btn-primary mt-4">
        <iframe id="invisible" style="display:none;"></iframe>
        <a class="btn" href="./demo/login.php">DEMO</a>
    </form>
    <div>
    
    </div>
    </div>
    </div>
    
</section>
</body>
</html>