<?php 
    class phpTest extends \PHPUnit\Framework\TestCase{
        public function testDatabaseConnection() {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "formulaone";
    
            $connection = new mysqli($servername, $username, $password, $database);
            $this->assertEmpty($connection->connect_error);
        }
    
        public function testQueryResults() {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "formulaone";
    
            $connection = new mysqli($servername, $username, $password, $database);
            $query = "SELECT * FROM nagydijak";
            $result = $connection->query($query);
            $this->assertNotEmpty($result);
        }

        public function testCSSFileExists() {
            $cssFilePath = './src/style.css';
    
            $fileExists = file_exists($cssFilePath);
    
            $this->assertTrue($fileExists, "A CSS fájl '$cssFilePath' nem létezik.");
        }
    
        public function testImageFilesExist() {
            $imagePaths = [
                './src/resources/header png/hamilton.png',
                './src/resources/header png/massa.png',
            ];
    
            foreach ($imagePaths as $imagePath) {
                $this->assertFileExists($imagePath, "A képfájl '$imagePath' nem létezik.");
            }
        }

        public function testKonstruktorok() {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "formulaone";
            
            $testinput="Ferrari";

            $connection = new mysqli($servername, $username, $password, $database);
            $query = "SELECT * FROM konstruktorok WHERE csapat ='".$testinput."'";
            $result = $connection->query($query);
            $this->assertNotEmpty($result);
        }

        public function testNagydijak() {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "formulaone";

            $testinput = "Sepang";
    
            $connection = new mysqli($servername, $username, $password, $database);
            $query = "SELECT * FROM nagydijak WHERE palya ='".$testinput."'";
            $result = $connection->query($query);
            $this->assertNotEmpty($result);
        }

        public function testPilotak() {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "formulaone";
    
            $testinput = "Lewis Hamilton";

            $connection = new mysqli($servername, $username, $password, $database);
            $query = "SELECT * FROM pilotak WHERE nev ='".$testinput."'";
            $result = $connection->query($query);
            $this->assertNotEmpty($result);
        }

        public function testPontszamitas() {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "formulaone";
    
            $testinputHelyezes = 1;
            $testinputPontok = 10;

            $connection = new mysqli($servername, $username, $password, $database);
            $query = "SELECT * FROM pontszamitas WHERE helyezes ='".$testinputHelyezes."' AND pontok ='".$testinputPontok."'";
            $result = $connection->query($query);
            $this->assertNotEmpty($result);
        }
    }
?>
