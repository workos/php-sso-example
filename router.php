<?php

require __DIR__ . "/vendor/autoload.php";

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Setup html templating library
$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

// Configure WorkOS with API Key and Project ID from env
\WorkOS\WorkOS::setApiKey(getenv("WORKOS_API_KEY"));
\WorkOS\WorkOS::setProjectId(getenv("WORKOS_PROJECT_ID"));

// Convenient function for throwing a 404
function httpNotFound() {
    header($_SERVER["SERVER_PROTOCOL"] . " 404");
    return true;
}

// In practice, domain comes from a customer in some way shape or form
const CUSTOMER_EMAIL_DOMAIN = "foo-corp.com";

// Routing
switch (strtok($_SERVER["REQUEST_URI"], "?")) {
    case (preg_match("/\.css$/", $_SERVER["REQUEST_URI"]) ? true: false): 
        $path = __DIR__ . "/static/css" .$_SERVER["REQUEST_URI"];
        if (is_file($path)) {
            header("Content-Type: text/css");
            readfile($path);
            return true;
        }
        return httpNotFound();

    case ("/auth"):
        $authorizationUrl = (new \WorkOS\SSO())
            ->getAuthorizationUrl(
                CUSTOMER_EMAIL_DOMAIN,
                'http://localhost:8000/auth/callback',
                ["things" => "gonna_my_things_back"],
                null
            );
            
        header('Location: ' . $authorizationUrl, true, 302);
        return true;

    case ("/auth/callback"):
        $profile = (new \WorkOS\SSO())->getProfile($_GET["code"]);

        header("Content-Type: application/json");
        echo json_encode($profile->toArray());
        return true;

    case ("/"):
    case ("/login"):
        echo $twig->render("login.html.twig");
        return true;

    default:
        return httpNotFound();
}