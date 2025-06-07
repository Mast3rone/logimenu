<?php
class ResponseHelper {
    public static function error($message) {
        $_SESSION['error_message'] = $message;
    }
}
