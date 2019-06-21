<?php

namespace OpenClassrooms\Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=jean forteroche;charset=utf8', 'root', '');
        return $db;
    }
}