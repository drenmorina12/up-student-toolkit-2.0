<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" href="../images/logo1.png" />
    <title>Up Student Toolkit</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="kalkulatore.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
      #main {
        background-color: #f0f0f0;
      }

      .drawing-board {
        outline: 3px black solid;
      }

      .tools-board {
        outline: 3px black solid;
      }
    </style>
    <script src="draw.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <?php
      include("../header.php");
      include("../counter.php");
    ?>
    <main
      id="main"
      style="
        background-image: url(math.jpg);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
      "
    >
      <!-- Side bar -->
      <div class="sidebar">
        <!-- <header>Argetimi</header> -->
        <ul id="listaEsidebar">
          <li>
            <a
              href="javascript:void(0);"
              onclick="scrollToSection('permbajtjaKalkulatori')"
            >
              <span>Sistemet</span>
            </a>
          </li>
          <li class="sidebar-active">
            <a
              href="javascript:void(0);"
              onclick="scrollToSection('permbajtjaKonvertori')"
            >
              <span>Konvertori</span>
            </a>
          </li>
          <li>
            <a
              href="javascript:void(0);"
              onclick="scrollToSection('drawing-table')"
            >
              <span>Tabela e Vizatimit</span>
            </a>
          </li>
          <li>
            <a
              href="javascript:void(0);"
              onclick="scrollToSection('calculator-container')"
            >
              <span>Kalkulatori</span>
            </a>
          </li>

        </ul>
      </div>
      <div class="main-contentveglat">
        <form method="post">
        <!-- Kalkulatori -->
        <div id="permbajtjaKalkulatori">
          <div class="pershkrimi2">
            <h2>Sistemet e ekuacioneve</h2>
            <!-- <p>
              Kjo faqe përmban një program që gjenë zgjidhjet e sistemeve të
              ekuacioneve lineare me dy të panjohura !
            </p> -->
          </div>
          <div class="permbajtja3">
            <div class="vlerat">
              <p>Vlerat</p>
              <div class="rreshti">
                <div class="kolona-1">
                  <input class="text3" type="text" id="x1" name="x1" />
                  <p id="pV">x +</p>
                </div>
                <div class="kolona-2">
                  <input class="text3" type="text" id="y1" name="y1" />
                  <p id="pV">y =</p>
                </div>
                <div class="kolona-3">
                  <input class="text3" type="text" id="l1" name="r1" />
                </div>
              </div>
              <div class="rreshti">
                <div class="kolona-1">
                  <input class="text3" type="text" id="x2" name="x2" />
                  <p id="pV">x +</p>
                </div>
                <div class="kolona-2">
                  <input class="text3" type="text" id="y2" name="y2" />
                  <p id="pV">y =</p>
                </div>
                <div class="kolona-3">
                  <input class="text3" type="text" id="l2" name="r2" />
                </div>
              </div>
              <div class="rreshti" id="rreshtiZ">
                <div class="kolona-1">
                  <input
                    class="butoniZgjidh"
                    type="button"
                    value="Zgjidh"
                    onclick="zgjedhja(event)"
                  />
                  
                </div>
                <div class="kolona-2" class="butoniZgjidh" style="margin-left: 10%;">
                  <a href='detyrat.txt' target='_blank' id="file" style="padding-left: 4%; text-decoration: none; padding-top: 5px;">Historia</a>
                </div>

              </div>
            </div>
            <div class="zgjidhjet" style="margin-left: 1%">
              <p>Zgjidhjet</p>
              <div class="rreshti">
                <div class="kolona-4">
                  <p id="pVZ">x =</p>
                  <input class="text3" type="text" id="xR" name="x" disabled />
                </div>
              </div>
              <div class="rreshti">
                <div class="kolona-4">
                  <p id="pVZ">y =</p>
                  <input class="text3" type="text" id="yR" name="y" disabled />
                  <input
                    class="butoniZgjidh"
                    type="button"
                    value="Pastro"
                    id="pastro"
                    onclick="pastrimi(event)"
                  />
                  <input
                    class="butoniZgjidh"
                    type="submit"
                    value="Ruaj ne file"
                    id="pastro1"
                    name="butoniRuaj"
                  />
                  
                </div>
              </div>
            </div>
          </div>
        </div>
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['butoniRuaj'])){
      if(!empty($_POST['x1']) && !empty($_POST['x2']) && !empty($_POST['y1'])
       && !empty($_POST['y2']) && !empty($_POST['r1']) && !empty($_POST['r2'])){
        if(ctype_digit($_POST['x1']) && ctype_digit($_POST['x2']) && ctype_digit($_POST['y1'])
          && ctype_digit($_POST['y2']) && ctype_digit($_POST['r1']) && ctype_digit($_POST['r2'])){

            $x1 = $_POST['x1'];
            $x2 = $_POST['x2'];
            $y1 = $_POST['y1'];
            $y2 = $_POST['y2'];
            $xl = $_POST['r1'];
            $yl = $_POST['r2'];

            $currentDate = date('d-m-Y');
            $currentTime = date('H:i:s');
            $objekti1 = new llogaritja($x1, $x2, $y1, $y2, $xl, $yl);
            
            if($objekti1 -> determinanta() == 0){
              // echo "Ana e majtë e sistemit është e njëjtë, sistemi nuk ka zgjidhje !";
            } else {
                // echo "X = ".$objekti1->zgjidhjaX();
                // echo "Y = ".$objekti1->zgjidhjaY();
                $objekti2 = new ruajNeFile($x1, $x2, $y1, $y2, $xl, $yl);
                $objekti2->setKoha($currentDate, $currentTime);
                $objekti2->ruaj();
            }
        } else {
          // echo "Vendosni të dhëna valide !";
        }
      } else {
        // echo "Mos leni rubrika të zbrazëta !";
      }
    } else {
      // echo "Shtypni butonin !";
    }
  }

         class llogaritja{
          public $x;
          public $y;
          // public $d;
          private $x1;
          private $x2;
          private $y1;
          private $y2;
          private $xl;
          private $yl;

            function __construct($x1, $x2, $y1, $y2, $xl, $yl){
              $this->x1 = $x1;
              $this->x2 = $x2;
              $this->y1 = $y1;
              $this->y2 = $y2;
              $this->xl = $xl;
              $this->yl = $yl;
            }

            protected function getx1(){return $this->x1;}
            protected function getx2(){return $this->x2;}
            protected function gety1(){return $this->y1;}
            protected function gety2(){return $this->y2;}
            protected function getxl(){return $this->xl;}
            protected function getyl(){return $this->yl;}

            public function zgjidhjaX(){
              $x1 = floatval($this->x1);
              $y1 = floatval($this->y1);
              $x2 = floatval($this->x2);
              $y2 = floatval($this->y2);
              $xl = floatval($this->xl);
              $yl = floatval($this->yl);
              return $x =
              ($xl * $y2 - $yl * $y1) /
              ($x1 * $y2 - $x2 * $y1);
            }
            public function zgjidhjaY(){
              $x1 = floatval($this->x1);
              $y1 = floatval($this->y1);
              $x2 = floatval($this->x2);
              $y2 = floatval($this->y2);
              $xl = floatval($this->xl);
              $yl = floatval($this->yl);
              return $y =
              ($x1 * $yl - $x2 * $xl) /
              ($x1 * $y2 - $x2 * $y1);
            }
            public function determinanta(){
              $x1 = floatval($this->x1);
              $y1 = floatval($this->y1);
              $x2 = floatval($this->x2);
              $y2 = floatval($this->y2);
              return $d = (($x1) * ($y2)) - (($x2 )* ($y1));
            }
            public function zgjedhja(){
                echo "Ana e majtë e sistemit është e njëjtë, sistemi nuk ka zgjidhje !";
              }
            }

         class ruajNeFile extends llogaritja{
          protected $mesazhiKohes;
          function setKoha($data, $ora){
            $this->mesazhiKohes = "Data: " .$data ." ora: " .$ora;
          }

          function ruaj(){
            $teDhenat = "x1: " .parent::getx1() ."    y1: " .parent::gety1() ."    x2: " .parent::getx2() ."    y2: " .parent::gety2() ."    xl: " .parent::getxl() ."    yl: " .parent::getyl();
            $zgjidhjet = "    x = " .parent::zgjidhjaX() ."    y: " .parent::zgjidhjaY();

            


            function errorHandler($errno, $errstr, $errfile, $errline) {
              throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
          }
          set_error_handler("errorHandler");
          try {
            $teksti = "Te dhenat:   " .$teDhenat .".         Zgjidhjet:  " .$zgjidhjet ." .       Koha: " .$this->mesazhiKohes ."\n";
            $file = fopen("detyrat.txt", "a") or die("Gabim gjate leximit te te dhenave !");

            
            if ($file === false) {
                throw new Exception("Gabim gjate leximit te te dhenave !");
            }
        
            // Attempt to write to the file
            if (fwrite($file, $teksti) === false) {
                throw new Exception("Deshtoi shkrimi ne file !");
            }
        
            // echo "Te dhenat u ruajten me sukses !";
            fclose($file);

            unset($teksti);
        } catch (ErrorException $e) {
            // Handle PHP errors converted to exceptions
            echo "PHP Error: " . $e->getMessage();
        } catch (Exception $e) {
            // Handle other exceptions
            echo "Exception: " . $e->getMessage();
        } finally {
            // Restore default error handler
            restore_error_handler();
        }

            // include 'detyrat.txt'; // Require file.php

            unset($teDhenat, $zgjidhjet);
           
          }
         }
    ?>

        <!-- Konvertori -->
        <div id="permbajtjaKonvertori">
          <div class="pershkrimi2">
            <h2>Konvertuesi i njësive</h2>
            <!-- <p>
              Kjo faqe përmban një konvertues të njësive të gjatësisë dhe peshës
            </p> -->
          </div>
          <div class="permbajtja2">
            <div class="vlera2t">
              <div class="rreshti">
                <p id="njesiaeKonvertorit">Konvertimi i njësive të gjatësisë</p>
                <div class="kolona-12">
                  <input
                    class="text2"
                    type="text"
                    id="vleraGj"
                    placeholder="Shkruani vlerën..."
                    name="vlera"
                  />
                </div>
                <div class="kolona-22">
                  <select id="njesiaVleraGj" name="vleraeYgjedhur">
                    <option value="zgjedhe nje opsion">
                      Zgjedhe një opsion
                    </option>
                    <option value="meterV">Meter (m)</option>
                    <option value="milimeterV">Milimeter (mm)</option>
                    <option value="centimeterV">Centimeter (cm)</option>
                    <option value="decimeterV">Decimeter (dm)</option>
                    <option value="dekameterV">Dekameter (Dm)</option>
                    <option value="hektameterV">Hektameter (hm)</option>
                    <option value="kilometerV">Klilometer (km)</option>
                  </select>
                  <p
                    id="barabart"
                    style="
                      display: inline-block;
                      margin-top: 0px;
                      margin-left: 5px;
                      margin-right: 5px;
                      font-size: 30px;
                      font-weight: bold;
                    "
                  >
                    =
                  </p>
                </div>

                <div class="kolona-32">
                  <input
                    class="text2"
                    type="text"
                    id="rezultatiGj"
                    placeholder="Rezultati"
                    name="rezultati"
                    disabled
                  />
                </div>
                <div class="kolona-42">
                  <select id="njesiaRezultatiGj" name="vleraeYgjedhur">
                    <option value="zgjedhe nje opsion">
                      Zgjedhe nje opsion
                    </option>
                    <option value="meterR">Meter (m)</option>
                    <option value="milimeterR">Milimeter (mm)</option>
                    <option value="centimeterR">Centimeter (cm)</option>
                    <option value="decimeterR">Decimeter (dm)</option>
                    <option value="dekameterR">Dekameter (Dm)</option>
                    <option value="hektameterR">Hektameter (hm)</option>
                    <option value="kilometerR">Klilometer (km)</option>
                  </select>
                </div>
              </div>
              <div class="rreshti">
                <input
                  class="butoniKonverto"
                  type="button"
                  value="Konverto"
                  onclick="konvertimGj()"
                />
              </div>
            </div>
            <div class="tabela">
              <table id="tabela1Gj">
                <thead>
                  <tr>
                    <th>Meter</th>
                    <th>Milimeter</th>
                    <th>Centimeter</th>
                    <th>Decimeter</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1 m</td>
                    <td>1000 mm</td>
                    <td>100 cm</td>
                    <td>10 dm</td>
                  </tr>
                </tbody>
              </table>
              <table id="tabela2Gj">
                <thead>
                  <tr>
                    <th>Kilometer</th>
                    <th>Hektameter</th>
                    <th>Dekameter</th>
                    <th>Meter</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1 km</td>
                    <td>10 hm</td>
                    <td>100 Dm</td>
                    <td>1000 m</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="permbajtja2">
            <div class="vlera2t">
              <div class="rreshti">
                <p id="njesiaeKonvertorit">Konvertimi i njësive të peshës</p>
                <div class="kolona-12">
                  <input
                    class="text2"
                    type="text"
                    id="vleraP"
                    placeholder="Shkruani vlerën..."
                    name="vlera"
                  />
                </div>
                <div class="kolona-22">
                  <select id="njesiaVleraP" name="vleraeYgjedhur">
                    <option value="zgjedhe nje opsion">
                      Zgjedhe nje opsion
                    </option>
                    <option value="kilogramV">Kilogram (kg)</option>
                    <option value="miligramV">Miligram (mg)</option>
                    <option value="gramV">Gram (gr)</option>
                    <option value="dekagramV">Dekagram (dg)</option>
                    <option value="tonV">Ton (t)</option>
                  </select>
                  <p
                    id="barabart"
                    style="
                      display: inline-block;
                      margin-top: 0px;
                      margin-left: 5px;
                      margin-right: 5px;
                      font-size: 30px;
                      font-weight: bold;
                    "
                  >
                    =
                  </p>
                </div>

                <div class="kolona-32">
                  <input
                    class="text2"
                    type="text"
                    id="rezultatiP"
                    placeholder="Rezultati"
                    name="rezultati"
                    disabled
                  />
                </div>
                <div class="kolona-42">
                  <select id="njesiaRezultatiP" name="vleraeYgjedhur">
                    <option value="zgjedhe nje opsion">
                      Zgjedhe nje opsion
                    </option>
                    <option value="kilogramR">Kilogram (kg)</option>
                    <option value="miligramR">Miligram (mg)</option>
                    <option value="gramR">Gram (gr)</option>
                    <option value="dekagramR">Dekagram (dg)</option>
                    <option value="tonR">Ton (t)</option>
                  </select>
                </div>
              </div>
              <div class="rreshti">
                <input
                  class="butoniKonverto"
                  type="button"
                  value="Konverto"
                  onclick="konvertimP()"
                />
              </div>
            </div>
            <?php
            //varg asociativ
            $tabela = [
                "Gram" => "1000 gr",
                "Miligram" => "1000000 mg",
                "Kilogram" => "1 kg",
                "Dekagram" => "100 dg"
            ];
            asort($tabela); //sortim sipas vleres
            ?>

            <div class="tabela">
              <table id="tabela1Gj">
                <thead>
                <?php
                    $njesite = [
                        4 =>"Kilogram",
                        3 =>"Dekagram",
                        2 =>"Gram",
                        1 =>"Miligram"
                    ];

                    krsort($njesite); 
                ?>
                  <tr>
                  <?php foreach ($njesite as $vlera): ?>
                <th><?php echo $vlera; ?></th>
                <?php endforeach; ?>
                   <!-- <th>Kilogram</th>
                    <th>Dekagram</th>
                    <th>Gram</th>
                    <th>Miligram</th>-->
                  </tr>
                </thead>
                <tbody>
                <tr>
                    <?php foreach ($tabela as $vlera): ?>
                <td><?php echo $vlera; ?></td>
                <?php endforeach; ?>
                </tr>
                  <!--<tr>
                    <td>1 kg</td>
                    <td>100 dg</td>
                    <td>1000 gr</td>
                    <td>1000000 mg</td>
                  </tr>-->
                </tbody>
              </table>
              <table id="tabela2Gj">
                <thead>
                  <tr>
                    <th>Ton</th>
                    <th>Kilogram</th>
                    <th>Dekagram</th>
                    <th>Gram</th>
                  </tr>
                </thead>
                <?php
            //varg asociativ
            $tabela2 = [
                "Gram" => "1000000 gr",
                "Ton" => "1 t",
                "Kilogram" => "1000 kg",
                "Dekagram" => "100000 dg"
            ];
            arsort($tabela2); //reverse sortim sipas vleres
            ?>
                <tbody>
                <tr>
                     <?php
                     define("gjatesia", 3); // konstante
                    $celesi = array_keys($tabela2);
                    for ($i = gjatesia; $i >= 0; $i--) {
                        echo '<td>' . $tabela2[$celesi[$i]] . '<br></td>';
                    }
                    ?>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Tabela per vizatim -->
        <div id="drawing-table">
          <div class="container">
            <section class="tools-board">
              <div class="row">
                <label class="title">Format</label>
                <ul class="options">
                  <li class="option tool" id="rectangle">
                    <!-- <img src="icons/rectangle.svg" alt="" /> -->
                    <span>Drejtkëndësh</span>
                  </li>
                  <li class="option tool" id="circle">
                    <!-- <img src="icons/circle.svg" alt="" /> -->
                    <span>Rreth</span>
                  </li>
                  <li class="option tool" id="triangle">
                    <!-- <img src="icons/triangle.svg" alt="" /> -->
                    <span>Trekëndësh</span>
                  </li>
                  <li class="option">
                    <input type="checkbox" id="fill-color" />
                    <label for="fill-color">Mbush objektin</label>
                  </li>
                </ul>
              </div>
              <div class="row">
                <label el class="title">Opsionet</label>
                <ul class="options">
                  <li class="option active tool" id="brush">
                    <!-- <img src="icons/brush.svg" alt="" /> -->
                    <span>Lapsi</span>
                  </li>
                  <li class="option tool" id="eraser">
                    <!-- <img src="icons/eraser.svg" alt="" /> -->
                    <span>Goma</span>
                  </li>
                  <li class="option">
                    <input
                      type="range"
                      id="size-slider"
                      min="1"
                      max="30"
                      value="5"
                    />
                  </li>
                </ul>
              </div>
              <div class="row colors">
                <label class="title">Ngjyrat</label>
                <ul class="options">
                  <li class="option"></li>
                  <li class="option selected"></li>
                  <li class="option"></li>
                  <li class="option"></li>
                  <li class="option">
                    <input type="color" id="color-picker" value="#4A98F7" />
                  </li>
                </ul>
              </div>
              <div class="row buttons">
                <button class="clear-canvas">Pastro</button>
                <button class="save-img">Ruaj Shënimet</button>
              </div>
            </section>
            <section class="drawing-board">
              <canvas></canvas>
            </section>
          </div>
        </div>
        <div id="calculator-container">
          <div class="pershkrimi2" id="pershkrimi2-kalkulatorithjesht">
            <h1>Kalkulatori i thjeshtë</h1>
          </div>
          <div class="wrapping-div" id="wrapping-div">
            <div class="restrictions">
              <h2 style="color:white;">Kushtëzimet:</h2>
              <ul style="list-style-type: circle">
                <li>
                  <mark style="background-color: rgba(0, 0, 0, 0); color: white"
                    >Mos pjesëto me zero</mark
                  >
                </li>
                <li>
                  <mark
                    style="background-color: rgba(0, 0, 0, 0); color: white"
                  >
                    Pas zgjedhjes së operatorit, shënoni një numër para fillimit
                    të kalkulimit</mark
                  >
                </li>
              </ul>
            </div>
            <div id="calculator">
              <span class="display">0</span>
              <div class="buttons">
                <button type="button" class="clear" value="clear">AC</button>
                <button type="button" class="sign" value="sign">+/-</button>
                <button type="button" class="percent" value="percent">%</button>
                <button type="button" class="operator" value="/">/</button>
                <button type="button" class="number" value="7">7</button>
                <button type="button" class="number" value="8">8</button>
                <button type="button" class="number" value="9">9</button>
                <button type="button" class="operator" value="*">*</button>
                <button type="button" class="number" value="4">4</button>
                <button type="button" class="number" value="5">5</button>
                <button type="button" class="number" value="6">6</button>
                <button type="button" class="operator" value="-">-</button>
                <button type="button" class="number" value="1">1</button>
                <button type="button" class="number" value="2">2</button>
                <button type="button" class="number" value="3">3</button>
                <button type="button" class="operator" value="+">+</button>
                <button type="button" class="delete" value="delete">DEL</button>
                <button type="button" class="number" value="0">0</button>
                <button type="button" class="decimal" value=".">.</button>
                <button type="button" class="equals" value="=">=</button>
              </div>
            </div>
            <span class="restrictions">

            <?php
            $operacionet123 =["3. Shumëzimi","2. Zbritja","1. Mbledhja"];
            $operacionet456 =["4. Pjesëtimi","6. Ndërrimi i shenjës","5. Përqindja"];
            sort($operacionet123); //sortimi ascending
            rsort($operacionet456); //sortimi descending
            ?>
              <h2 style="color:white;">Operacionet e mbështetura:</h2>
              <ul style="list-style-type: none; color: white;">
                <li><?php
                foreach($operacionet123 as $operacioni){
                  echo $operacioni. "<br>";
              }
              for ($i = 2; $i >= 0; $i--) {
                echo $operacionet456[$i]."<br>";
            }
                ?></li>
              </ul>
              <!--<ol>
                <li>Mbledhja</li>
                <li>Zbritja</li>
                <li>Shumëzimi</li>
                <li>Pjesëtimi</li>
                <li>Përqindja</li>
                <li>Ndërrimi i shenjës</li>
              </ol>-->
            </span>
            <div class="error-message"></div>
          </div>
        </div>
      </div>
    </main>
    <?php
      include("../footer.php");
    ?>
    <script src="calculator.js"></script>
    <script src="kalkulatore.js"></script>
    <script src="../app.js"></script>
  </body>
</html>