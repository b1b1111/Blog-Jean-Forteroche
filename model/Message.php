<?php

namespace Benjamin\Alaska\Model;

class Message {  
    // Message d'erreur
    public function Error($message) {
        global $alert;
        $alert = ['alertMessage' => $message];
    }
    // Renvoie un message de confirmation
    public function Success($message) {
        global $success;
        $success = ['successMessage' => $message];
    }
}