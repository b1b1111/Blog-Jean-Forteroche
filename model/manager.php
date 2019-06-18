<?php

namespace OpenClassrooms\Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=Jean Forteroche;charset=utf8', 'root', '');
        return $db;
    }
}