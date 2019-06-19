<?php

namespace OpenClassrooms\Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=webagencawben;charset=utf8', 'webagencawben', 'Ben0ubenou');
        return $db;
    }
}