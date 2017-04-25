<?php
/**
 * Created by PhpStorm.
 * User: SISTEMAS
 * Date: 25/04/2017
 * Time: 11:26 AM
 */

namespace App\Controllers;

class IndexController
{
    public function getIndex()
    {
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY  id DESC ');
        $query->execute();
        $blogs = $query->fetchAll(\PDO::FETCH_ASSOC);
        return render('../views/index.php', ['blogs' => $blogs]);
    }

}