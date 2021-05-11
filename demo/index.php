<?php
    session_start();
    if(empty($_SESSION["username"])){
        header('location:./login.php');
    }
    require "./mysql.php";
    require "./theme_color.php";
    // require "./read_req.php";
    $query = $mysql->query("SELECT * FROM todos WHERE in_charge='{$_SESSION["username"]}'");

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
<?php $loc='MY LISTS' ?>
<body class="w-100" style="overflow-x: hidden;">
        <?php include './components/navbar.php'?>
        <section class="row d-flex flex-row">
        <?php include './components/sidebar.php'?>
            <div class="col-lg-10 pt-3">
                <div class="col-5 bg-white shadow-sm border p-4 rounded">
                <h2>📝</h2>
                <div class="mt-4">
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <h3><?php echo $_SESSION['username']?>'s Todo</h3>
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal"  class="btn rounded-circle border" style="width:40px;height:40px;font-size:15px;">+</button>
                    </div>
                    <div class="">
                    <?php 
                        foreach($query as $item){
                            echo " <div class='border rounded shadow mt-3 p-2' style='cursor:pointer'>
                            <h5>{$item['title']}</h5>
                            <p>{$item['description']}</p>
                            <div class='d-flex flex-row justify-content-end'>
                                <div class='btn btn-warning' onclick='setInputValue(\"{$item['id']}\",\"{$item['title']}\",\"{$item['description']}\",\"{$item['date']}\",\"{$item['in_charge']}\")' data-bs-toggle='modal' data-bs-target='#modalUpdate'>Edit</div>
                                <div class='mx-2 btn btn-danger' onclick='setInputDelete(\"{$item['id']}\")' data-bs-toggle='modal' data-bs-target='#modalDelete' value='{$item['id']}'>Delete</div>
                            </div>
                        </div>";
                        }
                    ?>
                    </div>
                    <div>

                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>


    <!-- MODAL ADD -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="actions/create_action.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Todo List</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Date</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="date" required placeholder="name@example.com">
                        </div>
                        <div class="mb-3" style="display: none;">
                            <label for="exampleFormControlInput1" class="form-label">Handle by</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="incharge" value="<?php echo $_SESSION['username']?>" required style="display:none;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


     <!-- MODAL DELETE -->
     <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDelete" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="actions/delete_action.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labelDelete">Delete ID</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" id="idDelete" style="display:none;" name="id">
                            <p>Apakah anda yakin menghapus data ini? </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="modalUpdate" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="actions/update_action.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Todo List</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="valueId" name="id" style="display: none;">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input type="text" class="form-control" id="valueTitle" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="valueDescription" name="description" rows="3"></textarea>
                        </div>
                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Date</label>
                <input type="date" class="form-control" id="valueDate" name="date">
                </div>
                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Handle by</label>
                <input type="text" class="form-control" id="valueHandleby" name="in_charge">
                </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>


<script>
    localStorage.setItem('theme','light');
    function setInputValue(id,title,description,date, handleby){
    document.getElementById("valueId").setAttribute("value",id)
    document.getElementById("valueTitle").setAttribute("value",title)
    document.getElementById("valueDescription").value = description
    document.getElementById("valueDate").value = date
    document.getElementById("valueHandleby").setAttribute("value",handleby)
  }


  function setInputDelete(id){
      document.getElementById("labelDelete").textContent = `Delete ID ${id}`
      document.getElementById("idDelete").value = id;
    
}

</script>   
</body>

</html>