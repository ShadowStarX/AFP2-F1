<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use mysqli;

class DatabaseTest extends TestCase {
    public function testDatabaseConnection() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "formulaone";

        $connection = new mysqli($servername, $username, $password, $database);
        $this->assertFalse($connection->connect_error, 'Nem lehetett csatlakozni az adatbázishoz');
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
}

class ResourcesTest extends TestCase {

    public function testCSSFileExists() {
        $cssFilePath = 'style.css';

        $fileExists = file_exists($cssFilePath);

        $this->assertTrue($fileExists, "A CSS fájl '$cssFilePath' nem létezik.");
    }

    public function testImageFilesExist() {
        $imagePaths = [
            'resources/header png/hamilton.png',
            'resources/header png/massa.png',
        ];

        foreach ($imagePaths as $imagePath) {
            $this->assertFileExists($imagePath, "A képfájl '$imagePath' nem létezik.");
        }
    }

}

class FutamokTest extends TestCase {
    public function testPageGeneration() {
        $expectedTitle = 'Futamok';
        $expectedHeader = 'F1<span>2008</span>';
        $expectedNavLinks = ['Kezdőlap', 'Pilóták', 'Konstruktőrök', 'Futamok'];

        ob_start();
        include('index.php');
        $output = ob_get_clean();

        $this->assertStringContainsString("<title>$expectedTitle</title>", $output);
        $this->assertStringContainsString("<h3 class=\"logo\">$expectedHeader</h3>", $output);

        foreach ($expectedNavLinks as $link) {
            $this->assertStringContainsString("<a href=\"$link.php\">$link</a>", $output);
        }
    }

    public function testTableData() {

        $expectedData = [
            ['Ország', 'Pálya', 'Hossz', 'Helyezés', 'Pilóta'],
        ];

        ob_start();
        include('index.php');
        $output = ob_get_clean();

        foreach ($expectedData as $row) {
            foreach ($row as $cell) {
                $this->assertStringContainsString("<td>$cell</td>", $output);
            }
        }
    }
}

class KonstruktorokTest extends TestCase {
    public function testTableHasData() {
        $expectedData = [
            [
                'csapat' => 'Mercedes',
                'c' => 'Németország',
                'rajtszam' => '44',
                'nev' => 'Lewis Hamilton',
            ],
            [
                'csapat' => 'Ferrari',
                'c' => 'Olaszország',
                'rajtszam' => '5',
                'nev' => 'Sebastian Vettel',
            ],
        ];

        ob_start();
        include 'konstruktorok.php';
        $output = ob_get_clean();

        foreach ($expectedData as $data) {
            $this->assertStringContainsString($data['csapat'], $output, "A csapat nincs benne a táblában '{$data['csapat']}'.");
            $this->assertStringContainsString($data['c'], $output, "Az ország nincs benne a táblában '{$data['c']}'.");
            $this->assertStringContainsString($data['rajtszam'], $output, "A rajtszám nincs benne a táblában '{$data['rajtszam']}'.");
            $this->assertStringContainsString($data['nev'], $output, "A pilóta nincs benne a táblában '{$data['nev']}'.");
        }
    }
}

class PilotakTest extends TestCase {
    public function testTableHasData() {
        $expectedData = [
            [
                'ranking' => '1',
                'rajtszam' => '44',
                'nev' => 'Lewis Hamilton',
                'porszag' => 'Németország',
                'szulido' => '1985-01-07',
                'pontok' => '387',
            ],
            [
                'ranking' => '2',
                'rajtszam' => '5',
                'nev' => 'Sebastian Vettel',
                'porszag' => 'Németország',
                'szulido' => '1987-07-03',
                'pontok' => '321',
            ],
        ];

        ob_start();
        include 'pilotak.php';
        $output = ob_get_clean();

        foreach ($expectedData as $data) {
            $this->assertStringContainsString($data['ranking'], $output, "A helyezés nincs benne a táblában '{$data['ranking']}'.");
            $this->assertStringContainsString($data['rajtszam'], $output, "A rajtszám nincs benne a táblában '{$data['rajtszam']}'.");
            $this->assertStringContainsString($data['nev'], $output, "A pilóta nincs benne a táblában '{$data['nev']}'.");
            $this->assertStringContainsString($data['porszag'], $output, "Az ország nincs benne a táblában '{$data['porszag']}'.");
            $this->assertStringContainsString($data['szulido'], $output, "A születési hely nincs benne a táblában '{$data['szulido']}'.");
            $this->assertStringContainsString($data['pontok'], $output, "A pontok nincsenek benne a táblában '{$data['pontok']}'.");
        }
    }
}
?>
