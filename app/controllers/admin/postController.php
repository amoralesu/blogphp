<?php
/**
 * Created by PhpStorm.
 * User: amoralesu
 * Date: 25/04/2017
 * Time: 12:16 PM
 */

namespace App\Controllers\Admin;

class PostController
{
    public function getIndex()
    {
        //admin/posts or admin/posts/index
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY  id DESC ');
        $query->execute();
        $blogs = $query->fetchAll(\PDO::FETCH_ASSOC);

        return render('../views/admin/posts.php', ['blogs' => $blogs]);
    }

    public function getCreate()
    {
        return render('../views/admin/insert-post.php');
    }

    public function postCreate()
    {
        global $pdo;
        $sql = 'INSERT INTO blog_posts(title, content) VALUES(:title, :content)';
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ]);

        return render('../views/admin/insert-post.php', ['result' => $result]);
    }
}