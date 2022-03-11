 <?php

    function getDatenbank(string|null $datenbank = "Honig4U")
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = null;

        // Mit Datenbank verbinden
        try {

            if ($datenbank) {
                $conn = new PDO("mysql:host=" . $servername . ";dbname=" . $datenbank, $username, $password);
            } else {
                $conn = new PDO("mysql:host=" . $servername, $username, $password);
            }

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return $conn;
    }
