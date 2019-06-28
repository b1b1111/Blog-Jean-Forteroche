<?php

namespace Benjamin\Alaska\Model;

class Message {
    public function __contruct() {
    }
    // Message d'erreur
    public function setError($message) {
        global $alert;
        $alert = [
            'alertMessage' => $message
        ];
    }
    // Renvoie un message de confirmation
    public function setSuccess($message) {
        global $success;
        $success = ['successMessage' => $message];
    }
}