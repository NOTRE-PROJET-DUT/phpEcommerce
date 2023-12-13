<?php

class AuthMiddleware
{
    public function handleRequest()
    {
        // Start the session (if not started already)
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Check if the user is authenticated
        if (!$this->isAuthenticated()) {
            // User is not authenticated, handle authentication logic (e.g., redirect to login)
            $this->handleRequestWithoutAuthentication();
        }
    }

    private function isAuthenticated()
    {
        return isset($_SESSION['emailExistAdmin']) && !empty($_SESSION['emailExistAdmin']);
    }

    private function handleRequestWithoutAuthentication()
    {
        // Output JavaScript code to display a message and redirect after 2 seconds
        echo '<script>';
        echo 'alert("Sorry, you are not Authorize.");';
        echo 'window.location.href = "/forgetPassword";';
        echo '</script>';
        exit;
    }
}

// usage in your application
$Middleware = new AuthMiddleware();
