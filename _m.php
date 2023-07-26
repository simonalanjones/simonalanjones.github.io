function getPathAfterDomain() {
    // Get the full URL of the current request
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $request_uri = $_SERVER['REQUEST_URI'];

    // Remove the query string from the REQUEST_URI
    $request_uri = explode('?', $request_uri)[0];

    // Remove the script name from the REQUEST_URI
    $script_name = $_SERVER['SCRIPT_NAME'];
    if (strpos($request_uri, $script_name) === 0) {
        $path_after_domain = substr($request_uri, strlen($script_name));
    } elseif (strpos($request_uri, dirname($script_name)) === 0) {
        $path_after_domain = substr($request_uri, strlen(dirname($script_name)));
    } else {
        // Check if the request URI starts with the localhost only
        $base_path = $protocol . $host;
        if (strpos($request_uri, $base_path) === 0) {
            $path_after_domain = substr($request_uri, strlen($base_path));
        } else {
            $path_after_domain = '/';
        }
    }

    return $path_after_domain;
}

// Usage example:
$path_after_domain = getPathAfterDomain();
echo $path_after_domain;
