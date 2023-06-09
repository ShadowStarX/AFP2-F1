<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Egyéni VB</title>
    <link rel="stylesheet" href="style.css">
    <?php include('dbconn.php');?>
</head>
<body>
    <nav class="navbar">
        <a class="nav-logo">F1<span>2008</span></a>
        <div class="nav-links ">
            <ul>
                <li><a href="index.html">Kezdőlap</a></li>
                <li class="active"><a href="pilotak.php">Pilóták</a></li>
                <li><a href="konstruktorok.php">Konstruktőrök</a></li>
                <li><a href="futamok.php">Futamok</a></li>
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
                    Pilóták
                    <div class="border"></div>
                </h3>
                <table>     
                  <tr>
                    <th>Helyezés</th>
                    <th>Rajtszám</th>
                    <th>Név</th>
                    <th>Ország</th>
                    <th>Születési idő</th>
                    <th>Pontszám</th>
                  </tr>
                    <?php 
                      $sql = "SELECT rajtszam, nev, pilotak.orszag AS porszag, szulido,
                              Sum(pontszamitas.pontok) AS pontok FROM eredmenyek
                              INNER JOIN nagydijak ON eredmenyek.palya = nagydijak.id
                              INNER JOIN pilotak ON eredmenyek.pilota = pilotak.rajtszam
                              INNER JOIN pontszamitas ON eredmenyek.helyezes = pontszamitas.helyezes
                              GROUP BY rajtszam, nev
                              ORDER BY pontok DESC";
                      $result = $connection->query($sql);
                      if(!$result){
                        die("Invalid query: " . $connection->error);
                      }
                      $ranking = 0;
                      while($row = $result->fetch_assoc()){
                        $ranking = $ranking + 1;
                      echo "
                        <tr>
                          <td>". $ranking ."</td>
                          <td>". $row["rajtszam"] ."</td>
                          <td>". $row["nev"] ."</td>
                          <td>". $row["porszag"] ."</td>
                          <td>". $row["szulido"] ."</td>
                          <td>". $row["pontok"] ."</td>
                        </tr>
                      ";
                      }
                  ?>
                  </table> 
            </div>

            <div class="imgContainer opacity">

                <img class="page_img" src="resources/jpg/egyeni.jpg" alt="">

            </div>
        </div>
    </section>
    
    <script src="app.js"></script>
</body>
</html>