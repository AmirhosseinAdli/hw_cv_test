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

<form action="/admin/projects/submit" enctype="multipart/form-data" method="POST">

    <input type="hidden" name="project_id" value="<?= $project['id'] ?>">

    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text" id="btnGroupAddon2">Name</div>
                </div>
                <!--                <label>FullName</label>-->
                <input type="text" class="form-control" name="name" value="<?= $project['name'] ?? '' ?>"/>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-10">
                    <div class="form-group">
                        <label>Picture</label>
                        <input type="file" name="picture"
                               value="uploads/projects/<?= $project['picture'] ?? '' ?>"/>
                    </div>
                </div>
                <div class="col-2" style="position: relative">
                    <img src="/uploads/projects/<?=  $project['picture'] ?? '' ?>" style="width:100%"/>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success btn-block btn-lg">Submit</button>
        </div>
    </div>
</form>

<script src="/assets/vendors/node_modules/jquery/dist/jquery.min.js"></script>

<script src="/assets/vendors/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>