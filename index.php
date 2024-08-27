<?php 

    include 'database.php';

    // Insert data
    if(isset($_POST['add'])){
        $query_insert = "insert into task (label_task, status_task) value ('". $_POST['task'] ."', 'open')";
        $run_query_insert = mysqli_query($conn, $query_insert);

        if($run_query_insert){
            header('Refresh;0 url=index.php');
        }                     
    }

    // proses show data
    $query_select = "select * from task order by id_task desc";
    $run_query_select = mysqli_query($conn, $query_select);

    // hapus data
    if (isset($_GET['delete'])) {
        $query_delete = "delete from task where id_task = '".$_GET['delete']."'";
        $run_query_delete = mysqli_query($conn, $query_delete);

        header('Refresh:0 url=index.php');
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- css -->
     <link rel="stylesheet" href="/css/style.css">

     <!-- box icons -->
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>App - Todo</title>
</head>
<body>

    <header>
        <div class="title">
            <i class='bx bx-sun'></i>
            <span>Todo List</span>
        </div>

        <div class="description">
            <?= date("1, d M Y")?>
        </div>
    </header>

    <nav>

    </nav>

    <main>
        <div class="content">
            <div class="card">
                <form action="" method="post">
                    <input type="text" name="task" class="input-control" placeholder="Add Task">

                    <div class="text-right">
                        <button type="submit" name="add">Add</button>
                    </div>
                </form>
            </div>

            <?php 
                if(mysqli_num_rows($run_query_select) > 0) { 
                while($r = mysqli_fetch_array($run_query_select)) {
            ?>

            <div class="card">
                <div class="task-item">
                    <div>
                        <input type="checkbox">
                        <span><?= $r['label_task']?></span>
                    </div>

                    <div>
                        <a href="" class="text-orange" title="edit"><i class='bx bx-edit'></i></a>
                        <a href="?delete=<?= $r['id_task']?>" class="text-red" title="remove" onclick="return confirm(Are you sure ?)"><i class='bx bxs-trash'></i></a>
                    </div>
                </div>
            </div>

            <?php }} else { ?>
                <div>Belum ada task</div>
            <?php } ?>
        </div>
    </main>

    <footer>

    </footer>

</body>
</html>