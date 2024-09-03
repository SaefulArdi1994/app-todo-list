<?php 

    include 'database.php';

    // proses show data
    $query_select = "select * from task where id_task = '".$_GET['id']."' ";
    $run_query_select = mysqli_query($conn, $query_select);
    $d = mysqli_fetch_object($run_query_select);

    // Proses edit date
    if(isset($_POST['edit'])) {
        $query_update = "update task set label_task = '".$_POST['task']."' where id_task = '".$_GET['id']."' ";
        $run_query_update = mysqli_query($conn, $query_update);

        header('Refresh:0; url=index.php');
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
            <a href="index.php">
                <i class='bx bx-chevron-left'></i>
            </a>
            <span>Back</span>
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
                    <input type="text" name="task" class="input-control" placeholder="Edit Task" value="<?= $d->label_task ?>" >

                    <div class="text-right">
                        <button type="submit" name="edit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer>

    </footer>

</body>
</html>