<?php
    session_start();
?>

<?php
    $bookmarks = (isset($_SESSION['bookm'])) ? $_SESSION['bookm'] : array();
    if(isset($_POST['add'])){
        array_push($bookmarks, ['url' => $_POST['url'], 'title' => $_POST['bookmark']]);
        
        $_SESSION['bookm'] = $bookmarks;
    }

    if (isset($_POST['clear'])){
        $_SESSION['bookm']  = [];
    }

    if (isset($_POST['x'])){
        array_splice($_SESSION['bookm'], $_POST['x'],1);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <title>Bookmark</title>
    <style>
    .center-70 {
        justify-content: center !important;
        flex-direction: column !important;
        align-items: center !important;
        display: flex !important;
        height: 70vh !important;
        }
    </style>
</head>

<body>
<div class="container">
    <br><br>
    <form action="bookmark.php" method="POST">
        <div class="float-right">
            <input name="clear" type="submit" value="Clear All" class="btn btn-danger">
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">Add new bookmark</button>
        </div>
        <br><br><br>

        <?php if (count($_SESSION['bookm']) < 1 )
            echo "<div class='center-70'>
            <h2 class='mx-auto'>NO BOOKMARK</h2>
            </div>";
        ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Bookmark</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="bookmark" class="col-form-label">Bookmark</label>
                            <input class="form-control" type="text" id="bookmark" name="bookmark">
                        </div>
                        <div class="form-group">
                            <label for="url" class="col-form-label">URL</label>
                            <input class="form-control" type="text" id="url" name="url"></input>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" name="add" value="add">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="container">
        <div class="row">
            <?php if(isset($_SESSION['bookm'])):?>
                <?php for($id= 0; $id < count($_SESSION['bookm']); $id++):?>

                <div class="col-3 pa-5">
                    <div class="ma-2">
                        <form action="bookmark.php" method="POST">
                            <div class="card" style="height: 200px">
                                <div class="card-body">
                                    <button name="x" type="submit" value="<?php echo $id?>" class="btn btn-link float-right">&#10006;</button>
                                    <h5 class="card-title"><?php echo $_SESSION['bookm'][$id]['title']?></h5>
                                    <p class="card-text"><?php echo $_SESSION['bookm'][$id]['url']?></p>
                                    <a href="<?php echo $_SESSION['bookm'][$id]['url']?>" target="_blank" class="card-link">
                                        <button type="button" class="btn btn-primary btn-block">OPEN &nbsp;<i class="fa fa-external-link-alt"></i></button>
                                    </a>     
                                </div>
                            </div>
                        </form> 
                    </div><br>
                </div>

                <?php endfor?>
            <?php endif?>
        </div>
    </div>
</div>
</body>
</html>