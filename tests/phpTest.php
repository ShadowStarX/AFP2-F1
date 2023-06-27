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
    }
?>
