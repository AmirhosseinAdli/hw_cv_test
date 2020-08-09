<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>Projects</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="/assets/vendors/node_modules/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/css/style.css"/>
</head>
<body class="container-fluid">

<?php
if (isset($_SESSION['isok'])) {
    if ($_SESSION['isok']) { ?>
        <div class="alert alert-success" role="alert">
            Is Ok!
        </div>
    <?php } else { ?>
        <div class="alert alert-danger" role="alert">
            Is Not Ok!
        </div>
    <?php }
}
?>

<div class="row">
    <?php foreach ($projects_information as $item) { ?>
        <div class="col-md-3 mx-2 my-2">
            <div class="card" style="width: 18rem;">
                <?php if ($item['picture']) { ?>
                    <img src="/uploads/projects/<?= $item['picture'] ?>" class="card-img-top">
                <?php } else { ?>
                    <img src="https://i.ibb.co/f9n56R3/young-boy-in-jacket-holding-white-flower-pot-3771640.jpg" class="card-img-top">
                <?php } ?>
                <div class="card-body">
                    <h5 class="card-title"><?= $item['name'] ?></h5>
                    <p class="card-text">Some quick example text</p>
                    <a href="/admin/projects/edit?project_id=<?= $item['id'] ?>" class="btn btn-primary">Edit</a>
                    <a href="/admin/projects/delete?project_id=<?= $item['id'] ?>" class="mx-2">Delete</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<script src="/assets/vendors/node_modules/jquery/dist/jquery.min.js"></script>

<script src="/assets/vendors/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>