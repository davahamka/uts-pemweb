<?php
    session_start();
    if(empty($_SESSION["username"])){
        header('location:./login.php');
    }
    require "./mysql.php";
    require "./theme_color.php";
    require "./read_req.php";
    $query = $mysql->query("SELECT * FROM todos");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
    <title>DIsplay Data</title>
</head>
<body>
    <header class="" style="background:<?php echo $THEME_COLOR ?>">
    <nav class="navbar navbar-dark container">
  <div class="container-fluid">
    <a class="navbar-brand">Kelompok 6</a>
    <div class="navbar-text">
  <a type="submit" class="btn btn-dark" href="./actions/logout_action.php">Logout</a>
    </div>
  </div>
</nav>
    </header>
    <section class="mt-5">
    <div class="container">
    <h1>Todo List</h1>
    <?php 
            // echo $_SESSION["name"];
    ?>
    </div>
    <div>
    </div>
    </section>
    <section class="mt-4">
        <div class="container">
        <table class="table">
  <thead>
    <tr>
    <?php 
        foreach($display as $l){
            echo "<th scope='col'>{$l['field']}</th>";
        }
    ?>
    <th scope="col">ActionP</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <?php 
     foreach($query as $p){
         $id = $p['id'];
        echo "<tr>
            <td scope='row'>{$p['id']}</td>
            <td>{$p['title']}</td>
            <td>{$p['description']}</td>
            <td>{$p['date']}</td>
            <td>{$p['in_charge']}</td>";
            
          echo " <td class='d-flex flex-row align-items-stretch'>
          <button class='btn btn-warning text-white' onclick='setInputValue(\"{$p['id']}\",\"{$p['title']}\",\"{$p['description']}\",\"{$p['date']}\",\"{$p['in_charge']}\")' data-bs-toggle='modal' data-bs-target='#modalUpdate'>Update</button>
          <button onclick='setInputDelete(\"{$p['id']}\")' data-bs-toggle='modal' data-bs-target='#modalDelete' class='h-100 btn btn-danger' name='delete' value='{$p['id']}' style='margin:0 0 0 8'>Delete</button>
        </td>";
        echo "</tr>";
      }
     ?>
    </tr>
  </tbody>
</table></div>
    </section>

     <!-- Modal -->
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

 <!-- Modal -->
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

<!-- Modal -->
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
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Handle by</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="in_charge" required>
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

      <section style="position:fixed;bottom:40;right:0;left:0;margin:auto">
        <div class="container float-right" style="">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn rounded-circle text-white" style="width:70px;height:70px;font-size:32px;background:<?php echo $THEME_COLOR ?>">+</button>
        </div>
      </section>


      <script>
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