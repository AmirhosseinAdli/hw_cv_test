<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>profile</title>
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

<form action="/admin/submit" enctype="multipart/form-data" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text" id="btnGroupAddon2">Full Name</div>
                </div>
                <!--                <label>FullName</label>-->
                <input type="text" id="fullname" class="form-control" name="name"
                       value="<?= $profile['name'] ?? '' ?>"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text" id="btnGroupAddon2">Slogan</div>
                </div>
                <!--                <label>slogan</label>-->
                <input type="text" class="form-control" name="slogan" value="<?= $profile['slogan'] ?? '' ?>"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-10">
                    <div class="form-group">
                        <label>Picture</label>
                        <input type="file" name="picture"
                               value="uploads/profile/<?= $profile['picture'] ?? '' ?>"/>
                    </div>
                </div>
                <div class="col-2" style="position: relative">
                    <img src="/uploads/profile/<?= $profile['picture'] ?? '' ?>" style="width:100%"/>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <button id="btn-submit" type="submit" class="btn btn-success btn-block btn-lg" disabled>Submit</button>
        </div>
    </div>
</form>

<script src="/assets/vendors/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/assets/vendors/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/assets/vendors/bootstrap-validate-2.2.0/bootstrap-validate.min.js"></script>
<script>
    bootstrapValidate('#fullname', 'required:Please fill out this field!', function (isValid) {
        if (isValid) {
            $('#btn-submit').removeAttr('disabled')
        } else {
            $('#btn-submit').attr('disabled','disabled')
        }
    })
    // bootstrapValidate('#fullname','min:3:More character needed!')
</script>

</body>

</html>