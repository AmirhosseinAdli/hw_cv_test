<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/vendors/font-awesome-4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/assets/vendors/node_modules/bootstrap/dist/css/bootstrap.min.css"/>
    <!--    <link rel="stylesheet" href="assets/vendors/slick-1.8.1/slick/slick.css"/>-->
    <!--    <link rel="stylesheet" href="assets/vendors/slick-1.8.1/slick/slick-theme.css"/>-->
    <!--    <link rel="stylesheet" href="assets/css/style.css"/>-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <img class="rounded-circle border border-secondary" style="max-width: 100%; max-height: 150px"
                 src="<?= 'uploads/profile/' . $user_information['picture'] ?>">
        </div>
        <div class="col-md-8 col-sm-12">
            <h1><i class="fa fa-futbol-o fa-2x fa-spin" aria-hidden="true"></i><?= $user_information['name'] ?></h1>
            <div><?= $user_information['slogan'] ?></div>
        </div>
    </div>
    <div class="row">
        <?php foreach ($projects_information as $item) { ?>
            <div class="col-md-3 mx-2 my-2">
                <div class="card" style="width: 18rem;">
                    <?php if ($item['picture']) { ?>
                        <img src="uploads/projects/<?= $item['picture'] ?>" class="card-img-top">
                    <?php } else { ?>
                        <img src="https://i.ibb.co/f9n56R3/young-boy-in-jacket-holding-white-flower-pot-3771640.jpg" class="card-img-top">
                    <?php } ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['name'] ?></h5>
                        <p class="card-text">Some quick example text</p>
                        <a href="#" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!--<table>-->
<!--    <tr>-->
<!--        --><?php //foreach ($projects_information as $item) { ?>
<!--            <td class="td1">-->
<!--                <img src="-->
<? //= $item['picture'] ?? 'https://i.ibb.co/f9n56R3/young-boy-in-jacket-holding-white-flower-pot-3771640.jpg' ?><!--">-->
<!--            </td>-->
<!--        --><?php //} ?>
<!--    </tr>-->
<!--    <tr>-->
<!--        --><?php //foreach ($projects_information as $item) { ?>
<!--            <td class="td1">-->
<!--                <div>--><? //= $item['name'] ?><!--</div>-->
<!--            </td>-->
<!--        --><?php //} ?>
<!--    </tr>-->
<!--</table>-->

<script src="assets/vendors/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/assets/vendors/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>


<!--<script src="assets/vendors/slick-1.8.1/slick/slick.min.js"></script>-->

<!--<script src="assets/js/main.js"></script>-->

</body>
</html>