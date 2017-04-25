<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Blog Title</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h2>New Post</h2>
            <!--            <a class="btn btn-default" href="posts.php">Back</a>-->
            <a class="btn btn-default" href="<?php echo BASE_URL; ?>admin/posts">Back</a>

            <?php
            if (isset($result) && $result) {
                echo '<div class="alert alert-success">Datos Guardados con exito</div>';
            }
            ?>
            <form method="post">
                <div class="form-group">
                    <label for="">Title:</label>
                    <input class="form-control" type="text" name="title"/>
                </div>
                <textarea class="form-control" type="text" name="content" rows="5"></textarea>

                <input class="btn btn-primary" type="submit" value="Save">
            </form>

        </div>
        <div class="col-md-4">
            Slider
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Delectus deleniti dolore eius eum eveniet fugit illo impedit inventore iure
            laboriosam neque pariatur perferendis quaerat quis tenetur totam velit veritatis, voluptatum.
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <footer>
                This is a footer
                <br>
                <a href="<?php echo BASE_URL; ?>admin">Admin</a>
            </footer>
        </div>
    </div>
</div>
</body>
</html>