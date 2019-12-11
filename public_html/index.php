    <?php
    session_start();

    /**
     * Controllers imports
     */
    require_once '../src/Controllers/PageController.php';
    require_once '../src/Controllers/CityController.php';
    require_once '../src/Controllers/CountryController.php';
    require_once '../src/Controllers/AuthController.php';
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Fil rouge | Chilly Pepper</title>
        <link rel="stylesheet" href="/css/bootstrap.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>

    <body>

        <?php

        if (isset($_SERVER["PATH_INFO"])) {
            $path = trim($_SERVER["PATH_INFO"], "/");
        } else {
            $path = "";
        }

        $fragments = explode("/", $path);

        $control = array_shift($fragments);

        switch ($control) {
            case '': {
                    call_user_func_array(["PageController", "display"], $fragments);
                    break;
                }
            case "city": {
                    cityRoutes_get($fragments);
                    break;
                }
            case "country": {
                    countryRoutes_get($fragments);
                    break;
                }
            case "user": {
                    userRoutes_get($fragments);
                    break;
                }
            case "result": {
                    call_user_func_array(["PageController", "search"], $fragments);
                    break;
                }
            default: {
                    call_user_func_array(["PageController", "notFound"], $fragments);
                    break;
                }
        }

        function cityRoutes_get($fragments)
        {

            $action = array_shift($fragments);

            switch ($action) {
                case "details": {
                        call_user_func_array(["CityController", "display"], $fragments);
                        break;
                    }
                case "show": {
                        call_user_func_array(["CityController", "displayAll"], $fragments);
                        break;
                    }
                case "delete": {
                        call_user_func_array(["CityController", "actionDelete"], $fragments);
                        break;
                    }
                case "update": {
                        if ($_SERVER["REQUEST_METHOD"] == "GET") {
                            call_user_func_array(["CityController", "displayUpdate"], $fragments);
                        } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            call_user_func_array(["CityController", "actionUpdate"], $fragments);
                        }
                        break;
                    }
                case "add": {
                        if ($_SERVER["REQUEST_METHOD"] == "GET") {
                            call_user_func_array(["CityController", "displayAdd"], $fragments);
                        } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            call_user_func_array(["CityController", "actionAdd"], $fragments);
                        }
                        break;
                    }
                default: {
                        call_user_func_array(["PageController", "notFound"], $fragments);
                        break;
                    }
            }
        }

        function countryRoutes_get($fragments)
        {

            $action = array_shift($fragments);

            switch ($action) {
                case "details": {
                        call_user_func_array(["CountryController", "display"], $fragments);
                        break;
                    }
                case "showcontinent": {
                        call_user_func_array(["CountryController", "displayFromContinent"], $fragments);
                        break;
                    }
                case "show": {
                        call_user_func_array(["CountryController", "displayAll"], $fragments);
                        break;
                    }
                case "update": {
                        if ($_SERVER["REQUEST_METHOD"] == "GET") {
                            call_user_func_array(["CountryController", "displayUpdate"], $fragments);
                        } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            call_user_func_array(["CountryController", "actionUpdate"], $fragments);
                        }
                        break;
                    }
                case "delete": {
                        call_user_func_array(["CountryController", "actionDelete"], $fragments);
                        break;
                    }
                case "add": {
                        if ($_SERVER["REQUEST_METHOD"] == "GET") {
                            call_user_func_array(["CountryController", "displayAdd"], $fragments);
                        } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            call_user_func_array(["CountryController", "actionAdd"], $fragments);
                        }
                        break;
                    }
                default: {
                        call_user_func_array(["PageController", "notFound"], $fragments);
                        break;
                    }
            }
        }

        function userRoutes_get($fragments)
        {

            $action = array_shift($fragments);

            switch ($action) {
                case "signup": {
                        if ($_SERVER["REQUEST_METHOD"] == "GET") {
                            call_user_func_array(["AuthController", "displaySignup"], $fragments);
                        } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            call_user_func_array(["AuthController", "actionSignup"], $fragments);
                        }
                        break;
                    }
                case "login": {
                        if ($_SERVER["REQUEST_METHOD"] == "GET") {
                            call_user_func_array(["AuthController", "displayLogin"], $fragments);
                        } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            call_user_func_array(["AuthController", "actionLogin"], $fragments);
                        }
                        break;
                    }
                case "panel": {
                        call_user_func_array(["AuthController", "displayPanel"], $fragments);
                        break;
                    }
                case "logout": {
                        call_user_func_array(["AuthController", "actionLogout"], $fragments);
                        break;
                    }
                default: {
                        call_user_func_array(["PageController", "notFound"], $fragments);
                        break;
                    }
            }
        }

        ?>

    </body>

    </html>