<?php

session_start();
if ($_SERVER["REQUEST_METHOD"]  == "POST" &&  !empty($_POST["task"])) {
    $_SESSION["tasks"] [] = [
        "name" => $_POST["task"],
        "is_done" => false,
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    <link rel="stylesheet" href="css/index.css">

    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- External css -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-2">

                </div>
                <div class="col-8">
                    <div class="">
                        <img class="my-image" src="images/phplogo.png">
                        <h4 class="move">Todo List</h4>
                    </div>
                    <div>
                        <form action="" method="post" class="form-row">
                            <input type="text" name="task" class="form-control col-sm-10" id="myform" placeholder="Todo item">
                            <button type="submit" class="btn btn-primary col-sm-2">Add Todo</button>
                        </form>
                        <table class="table">
                        <?php foreach($_SESSION["tasks"] as $key => $value): ?>
                             <tr>
                                 <td>
                                       <input type="checkbox" onchange="mark(<?=$key?>)" <?= $value["is_done"] == true ? "checked" : ""?> >
                                 </td>
                                 <td>
                                      <?php if($value["is_done"] == false): ?>
                                      <?= $value["name"]?>
                                      <?php else:?>
                                       <s> <?= $value["name"]?> </s>
                                       <?php endif; ?>
                                 </td>
                                 <td>
                                       <a href="delete.php?id=<?=$key?>"><i class="my-icon fa fa-times fa-2x"style="color:red" aria-hidden="true"></i></a>
                                 </td>
                              </tr>
                              <?php endforeach?>
                        </table>
                    </div>
                </div>
                <div class="col-2">

                </div>
            </div>
        </div>
    </section>
    <!-- <form action="" method="post">
        <input type="text" name="task">
        <button type="submit">ADD</button>
    </form>
    <table>
    <?php foreach($_SESSION["tasks"] as $key => $value): ?>
        <tr>
            <td>
                <input type="checkbox" onchange="mark(<?=$key?>)" <?= $value["is_done"] == true ? "checked" : ""?> >
            </td>
            <td>
                <?php if($value["is_done"] == false): ?>
                    <?= $value["name"]?>
                <?php else:?>
                    <s> <?= $value["name"]?> </s>
                <?php endif; ?>
            </td>
            <td>
                <a href="delete.php?id=<?=$key?>">Delete</a>
            </td>
        </tr>
    <?php endforeach?>
    </table> -->

    <!-- <?= "<pre>" . var_export($_SESSION, true) . "</pre>"; ?> -->

    <script>
        function mark( id ) {
            window.location.assign("action.php?id=" + id);
        }
    </script>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   
</body>
</html>