<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="/assets/vendors/node_modules/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/css/style.css"/>
</head>
<body class="container-fluid">

<form action="/reglog_submit" enctype="multipart/form-data" method="POST">
    <input type="hidden" value="register" name="mode" />
    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text" id="btnGroupAddon2">Email</div>
                </div>
                <!--                <label>FullName</label>-->
                <input type="email" id="fullname" class="form-control" name="email"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text" id="btnGroupAddon2">Password</div>
                </div>
                <!--                <label>slogan</label>-->
                <input type="password" class="form-control" name="password"/>
            </div>
        </div>
        <div class="col-md-12">
            <button id="btn-submit" type="submit" class="btn btn-success btn-block btn-lg" disabled>Register</button>
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