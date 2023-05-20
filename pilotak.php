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
    <header>
        <nav>
            <div class="container">
                <h3 class="logo">F1<span>2008</span></h3>
              <div class="hamburger-menu">
                <div class="bar"></div>
              </div>
              <ul class="menu">
                <li><a href="index.html">Kezdőlap</a></li>
                <li><a href="pilotak.php">Pilóták</a></li>
                <li><a href="konstruktorok.html">Konstruktőrök</a></li>
                <li><a href="futamok.html">Futamok</a></li>
              </ul>
            </div>
          </nav>          

      <!-- <img src="resources/header png/f1.png" class="f1 translate">  -->

        <img src="resources/header png/hamilton.png" class="hamilton translate" data-speed="-0.25">
        <img src="resources/header png/massa.png" class="massa translate" data-speed="-0.25"> <!-- EZ olyan ütemben legyen majd átlátszó, ahogy bekerül a másik (hamilton) kép mögé -->

       
       
        <!-- <img src="resources/header png/pilot1.png" class="pilot translate" data-speed="-0.25" alt=""> 
        <img src="resources/header png/track0.png" class="track0 translate"> -->


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
                      <th>Rajtszám</th>
                      <th>Név</th>
                      <th>Ország</th>
                      <th>Születési idő</th>
                    </tr>
                  <?php 
                    $sql = "SELECT rajtszam, nev, orszag, szulido FROM pilotak";
                    $result = $connection->query($sql);
                    if(!$result){
                      die("Invalid query: " . $connection->error);
                    }
                    while($row = $result->fetch_assoc()){
                      echo "
                        <tr>
                          <td>". $row["rajtszam"] ."</td>
                          <td>". utf8_encode($row["nev"]) ."</td>
                          <td>". utf8_encode($row["orszag"]) ."</td>
                          <td>". $row["szulido"] ."</td>
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