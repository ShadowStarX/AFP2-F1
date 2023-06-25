<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Futamok</title>
    <link rel="stylesheet" href="style.css">
    <?php include('dbconn.php');?>
</head>
<body>
    <nav class="navbar">
        <a class="nav-logo">F1<span>2008</span></a>
        <div class="nav-links ">
            <ul>
                <li><a href="index.html">Kezdőlap</a></li>
                <li><a href="pilotak.php">Pilóták</a></li>
                <li><a href="konstruktorok.php">Konstruktőrök</a></li>
                <li class="active"><a href="futamok.php">Futamok</a></li>
            </ul>
        </div>
        <img src="resources/header png/menu_button.png" alt="menu hamburger" class="menu-hamburger">             
    </nav>    
    <header>          
        <img src="resources/header png/hamilton.png" class="hamilton translate" data-speed="-0.25">
        <img src="resources/header png/massa.png" class="massa translate" data-speed="-0.25">

        <img src="resources/header png/track2.1.png" class="track1 translate" data-speed="0.3">
        <img src="resources/header png/track2.2.png" class="track2 translate" data-speed="0.4">
        <img src="resources/header png/track2.3.png" class="track3 translate" data-speed="0.4">
    </header>

    <section>
        <div class="shadow"></div>

        <div class="container">
            <div class="content opacity">
                <h3 class="title">
                    Futamok
                    <div class="border"></div>
                </h3>
                <table>
                    <tr>
                      <th>Ország</th>
                      <th>Pálya</th>
                      <th>Hossz</th>
                      <th colspan='2'>Dobogós pilóták</th>
                    </tr>               
                    <?php 
                      $sql = "SELECT nagydijak.id AS id, nagydijak.orszag AS orszag, nagydijak.palya AS palya,
                                    hossz, helyezes, pilotak.nev AS nev FROM eredmenyek
                              INNER JOIN pilotak ON eredmenyek.pilota = pilotak.rajtszam
                              INNER JOIN nagydijak ON eredmenyek.palya = nagydijak.id
                              WHERE eredmenyek.helyezes BETWEEN 1 AND 3";
                      $result = $connection->query($sql);
                      if(!$result){
                        die("Invalid query: " . $connection->error);
                      }
                      while($row = $result->fetch_assoc()){
                      if ($row["helyezes"] == 1)
                      {
                        echo "
                        <tr>
                          <td rowspan='3'>". $row["orszag"] ."</td>
                          <td rowspan='3'>". $row["palya"] ."</td>
                          <td rowspan='3'>". $row["hossz"] ."</td>
                          <td>". $row["helyezes"] ."</td>
                          <td>". $row["nev"] ."</td>
                        </tr>
                      ";
                      }
                      else {
                        echo "
                        <tr>
                          <td>". $row["helyezes"] ."</td>
                          <td>". $row["nev"] ."</td>
                        </tr>
                      ";
                      }
                      }
                  ?>
                  </table> 
            </div>

            <div class="imgContainer opacity">

                <img class="page_img" src="resources/jpg/futamok.jpg" alt="">

            </div>
        </div>
    </section>
    
    <script src="app.js"></script>
</body>
</html>