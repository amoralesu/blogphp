
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
            <h1>Blof Title</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h2>Posts</h2>
            <a class="btn btn-primary" href="insert-post.php">New Post</a>
            <table class="table">
                <tr>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                foreach ($blogs as $blog) {
                    echo '<tr>';
                    echo '<td>' . $blog['title'] . '</td>';
                    echo '<td>Edit</td>';
                    echo '<td>Delete</td>';
                    echo '</tr>';
                }
                ?>
            </table>
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
                <a href="admin/index.php">Admin</a>
            </footer>
        </div>
    </div>
</div>
</body>
</html>