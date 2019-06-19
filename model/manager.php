<?php

namespace OpenClassrooms\Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;port=3306;dbname=webagencawben;charset=utf8', 'webagencawben', 'Ben0ubenou');
        return $db;
    }
}