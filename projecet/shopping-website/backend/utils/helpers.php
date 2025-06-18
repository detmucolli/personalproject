<?php
// Utility functions for the shopping website

/**
 * Sanitize input data to prevent XSS and SQL injection
 *
 * @param string $data
 * @return string
 */
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

/**
 * Format response for API
 *
 * @param mixed $data
 * @param int $status
 * @return array
 */
function formatResponse($data, $status = 200) {
    return [
        'status' => $status,
        'data' => $data
    ];
}

/**
 * Check if the user is authenticated
 *
 * @return bool
 */
function isAuthenticated() {
    return isset($_SESSION['user_id']);
}

/**
 * Redirect to a specified URL
 *
 * @param string $url
 */
function redirect($url) {
    header("Location: $url");
    exit();
}
?>