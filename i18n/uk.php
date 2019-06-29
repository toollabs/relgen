<?php
    if (isset($_GET['source'])) {show_source(__FILE__); exit();}
    /**
     * @author Stöger Florian D. M. (http://fdms.eu; uk translation by AtaZh)
     * @license EUPL 1.1 (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf)
     * @copyright © (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf) Stöger Florian D. M. (http://fdms.eu; uk translation by AtaZh)
     */
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Генератор дозволів Вікімедіа OTRS</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="//tools-static.wmflabs.org/cdnjs/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <style>
      p {
          background-color: white;
      }
      .hof {
          height: 100vh;
          overflow-y: auto;
      }
      .dropdown-menu li {
          cursor: pointer;
      }
    </style>
    <script type="text/javascript" src="//tools-static.wmflabs.org/cdnjs/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="//tools-static.wmflabs.org/cdnjs/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
          $("a.smsc").on("click", function(event) {
              event.preventDefault();
              var hash = this.hash;
              $("html, body").animate({
                  scrollTop: $(hash).offset().top
              }, 400);
          });
          $("#meta").popover({
              html:true,
          });
          $("form").on("keyup keypress", function(e) {
              if (e.keyCode == 13) {
                  e.preventDefault();
              }
          });
          $(".nt").on("keydown", function(e) {
              if (e.keyCode == 9) {
                  e.preventDefault()
              }
          });
      });
      
      function s1v() {
          s1vi = 0;
          if (!$("#namei").val().match(/\S/)) {
              if (!$("#s1fg1").hasClass("has-error")) {
                  $("#s1fg1").addClass("has-error");
              }
              s1vi++;
          } else {
              if ($("#s1fg1").hasClass("has-error")) {
                  $("#s1fg1").removeClass("has-error");
              }
          }
          if ($("#irep").css("display") != "none") {
              if (!$("#repi").val().match(/\S/)) {
                  if (!$("#s1fg2").hasClass("has-error")) {
                      $("#s1fg2").addClass("has-error");
                  }
                  s1vi++;
              } else {
                  if ($("#s1fg2").hasClass("has-error")) {
                      $("#s1fg2").removeClass("has-error");
                  }
              }
              if (!$("#authi").val().match(/\w/)) {
                  if (!$("#s1fg3").hasClass("has-error")) {
                      $("#s1fg3").addClass("has-error");
                  }
                  s1vi++;
              } else {
                  if ($("#s1fg3").hasClass("has-error")) {
                      $("#s1fg3").removeClass("has-error");
                  }
              }
          }
          if (s1vi == 0) {
              $("html, body").animate({
                  scrollTop: $(s2).offset().top
              }, 400);
          }
      }
      function s4v() {
          if (!$("#licensei").val().match(/\w/)) {
              if (!$("#s4fg").hasClass("has-error")) {
                  $("#s4fg").addClass("has-error");
              }
          } else {
              $("form").submit();
          }
      }
    </script>
  </head>
  <body style="background: url('bg.png') no-repeat fixed right bottom; overflow:hidden;">

    <?php
        $relgen = "0.9.10";
        $lang = "uk";
        date_default_timezone_set("UTC");
        $starttime = date("H:i:s");
        $trn = $name = $rep = $auth = $filer = $license = $s1 = $s2 = $s3 = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $starttime = test_input($_POST["starttime"]);
            $trn = test_input($_POST["trn"]);
            $name = test_input($_POST["name"]);
            $rep = test_input($_POST["rep"]);
            $auth = test_input($_POST["auth"]);
            $filer = test_input($_POST["filer"]);
            $license = test_input($_POST["license"]);
            $s1 = test_input($_POST["s1"]);
            $s2 = test_input($_POST["s2"]);
            $s3 = test_input($_POST["s3"]);
        }
        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        if ($_POST["result"] == "1") {
            ?>
            <script type="text/javascript">
            $(function() {
                $("html, body").animate({
                    scrollTop: $(result).offset().top
                }, 400);
            });
            </script>
            <?php
        }
    ?>

    <div class="container">
      <h1>Генератор дозволів Вікімедіа OTRS <small><a id="meta" tabindex="0" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="created and maintained by <a href='//meta.wikimedia.org/wiki/User:FDMS4' target='_blank'>FDMS</a><br />© (<a href='//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf' target='_blank'>EUPL 1.1</a>) <a href='http://fdms.eu' target='_blank'>Stöger Florian D. M.</a><br />(uk translation by AtaZh)" style="color:#777;"><?=$relgen?></a></small></h1>
  
      <form method="post" action="//tools.wmflabs.org/relgen/i18n/uk.php">

        <div id="s0" class="row hof"> <!-- step 0 -->
          <br /><br />
          <div class="col-md-7">
          <a role="button" href="#s1" class="btn btn-primary btn-lg btn-block smsc nt">почати</a>
          <input type="hidden" name="starttime" value="<?=$starttime?>" />
          <input type="hidden" name="result" value="1" />
          </div><br />
        </div>

        <div id="s1" class="row hof"> <!-- step 1 -->
          <br />
          крок 1 з 5 [ <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+1" target="_blank">попросити допомоги</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">залишити відгук</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#iam').show();$('#irep').hide();$('#idk').hide();"><input type="radio" id="s11" name="s1" value="1" />Я власник авторських прав</label>
              <label class="btn btn-default btn-block" onclick="$('#iam').show();$('#irep').show();$('#idk').hide();"><input type="radio" id="s12" name="s1" value="2" />Я представник власника авторських прав</label>
              <label class="btn btn-default btn-block" onclick="$('#iam').hide();$('#irep').hide();$('#idk').show();"><input type="radio" id="s13" name="s1" value="" />Я не знаю власника авторських прав</label>
            </div>
            <br />
            <p>Власник авторських прав на медіатвір — це <b>особа, яка його створила</b> (фотограф, дизайнер, художник, …), якщо тільки авторські права не було передано правочином чи контрактом.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iam">
              моє ім'я<br /><div id="s1fg1" class="form-group"><input id="namei" type="text" name="name" value="<?php echo $name;?>" placeholder="Петро Петренко (обов'язково)" class="form-control" /></div>
              <div style="display:none;" id="irep">
                <br />
                власник авторських прав<br /><div id="s1fg2" class="form-group"><input id="repi" type="text" name="rep" value="<?php echo $rep;?>" placeholder="ТОВ «Товариство» / Іванна Іваненко (обов'язково)" class="form-control" /></div>
                <br />
                моя позиція<br /><div id="s1fg3" class="form-group"><input id="authi" type="text" name="auth" value="<?php echo $auth;?>" placeholder="директор, офіційний представник, … (обов'язково)" class="form-control" /></div>
              </div>
              <br /><br />
              <a role="button" class="btn btn-primary btn-block nt" onclick="s1v()">перейти до наступного кроку</a>
            </div>
            <div style="display:none;" id="idk">
              <p class="text-danger">Вікімедіа OTRS не може прийняти дозвіл від вас — натомість, будь ласка, <a href="//commons.wikimedia.org/wiki/Commons:OTRS#notch">зв'яжіться з власником авторських прав</a>.</p>
            </div>
          </div>
          <br />
        </div>

        <div id="s2" class="row hof"> <!-- step 2 -->
          <br />
          крок 2 з 5 [ <a href="#s1" class="smsc">back</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+2" target="_blank">попросити допомоги</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">залишити відгук</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#iup').show();$('#iatt').show();"><input type="radio" id="s21" name="s2" value="1" />Я або хтось інший уже завантажили файл у Вікісховище</label>
              <label class="btn btn-default btn-block" onclick="$('#iup').hide();$('#iatt').show();"><input type="radio" id="s22" name="s2" value="2" />Я прикріплю файл до електронного листа</label>
            </div>
            <br />
            <p>Будь ласка, скористайтеся <a href="//commons.wikimedia.org/wiki/Special:UploadWizard" target="_blank"><b>Майстром завантажень</b></a>, щоб завантажити файл у Вікісховище, якщо ви ще цього не зробили.</p>
            <p>Щоб убезпечити ваш файл від вилучення, поки ваш лист із дозволом очікує обробки командою Вікімедіа OTRS, ви можете вставити на сторінку опису файлу <b><samp>{{subst:OP}}</samp></b>.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iatt">
              <div style="display:none;" id="iup">
                назва файлу у Вікісховищі<br /><input type="text" name="filer" placeholder="Приклад.jpg (обов'язково)" class="form-control" />
                <br /><br />
              </div>
              <a role="button" href="#s3" class="btn btn-primary btn-block smsc nt">перейти до наступного кроку</a>
            </div>
          </div>
          <br />
        </div>

        <div id="s3" class="row hof"> <!-- step 3 -->
          <br />
          крок 3 з 5 [ <a href="#s2" class="smsc">назад</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+3" target="_blank">попросити допомоги</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">залишити відгук</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s31" name="s3" value="1" />Я хочу надати дозвіл на медіатвір</label>
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s32" name="s3" value="2" />Я хочу надати дозвіл на твір, зображений у медіатворі</label>
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s33" name="s3" value="3" />Я хочу надати дозвіл і на твір, зображений у медіатворі, і на сам медіатвір</label>
            </div>
            <br />
            <p>Якщо медіатвір зображує або інакшим чином містить іще чийсь витвір мистецтва у нетривіальний спосіб, то це <a href="//commons.wikimedia.org/wiki/Commons:Derivative_works" target="_blank"><b>похідна робота</b></a>, і тому зазвичай потрібен окремий дозвіл від власника авторських прав на зображуваний витвір мистецтва.</p>
            <p>У деяких країнах, завдяки винятку <a href="//commons.wikimedia.org/wiki/Commons:Freedom_of_panorama/uk" target="_blank">«<b>свободи панорами</b>»</a>, архітектура та інші витвори мистецтва, постійно розташовані у публічних місцях, є винятком із цієї вимоги. В Україні «свободи панорами» немає.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="i3">
              <a role="button" href="#s4" class="btn btn-primary btn-block smsc nt">перейти до наступного кроку</a>
            </div>
          </div>
          <br />
        </div>

        <div id="s4" class="row hof"> <!-- step 4 -->
          <br />
          крок 4 з 5 [ <a href="#s3" class="smsc">назад</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+4" target="_blank">попросити допомоги</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">залишити відгук</a> ]
          <br /><br />
          <div class="col-md-7">
            <p>Я згоден/а опублікувати вищезгаданий твір на умовах такої вільної ліцензії:</p>
            <div id="s4fg" class="form-group"><div class="input-group">
              <input id="licensei" type="text" name="license" value="Creative Commons Із зазначенням автора — Розповсюдження на тих самих умовах 4.0 Міжнародна" class="form-control" />
              <div class="input-group-btn">
                <a role="button" data-toggle="dropdown" class="btn btn-default"><span class="caret" /></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a onclick="$('#licensei').val('Creative Commons Attribution-ShareAlike 4.0 International'); $('#iawattr').show();">Creative Commons Із зазначенням автора — Розповсюдження на тих самих умовах 4.0 Міжнародна</a></li>
                  <li><a onclick="$('#licensei').val('Creative Commons Attribution 4.0 International'); $('#iawattr').show();">Creative Commons Із зазначенням автора 4.0 Міжнародна</a></li>
                  <li><a onclick="$('#licensei').val('Creative Commons CC0 1.0 Universal'); $('#iawattr').hide();">Creative Commons CC0 1.0 Універсальна (передання у суспільне надбання)</a></li>
                </ul>
                <a role="button" href="//commons.wikimedia.org/wiki/Commons:First_steps/License_selection" target="_blank" class="btn btn-default">
                  <span class="glyphicon glyphicon-question-sign" />
                </a>
              </div>
            </div></div>
            <p>Я розумію, що тим самим надаю право будь-якій особі поширювати, змінювати й використовувати твір у будь-яких цілях, що не порушують законодавства (у тому числі пов'язаними з отриманням комерційної вигоди), за умови дотримання зазначеної ліцензії.</p>
            <p>Я сповіщений/а, що цей дозвіл не обмежується Вікіпедією чи пов'язаними з нею сайтами.</p>
            <p id="iawattr">Я сповіщений/а, що власник авторських прав завжди зберігає виключні авторські права на твір поза умовами зазначеної ліцензії, у тому числі право на згадування як автора відповідно до обраної ліцензії. Модифікації твору, які зроблять інші люди, не будуть приписані власнику авторських прав.</p>
            <p>Я розумію, що не можу відкликати цей дозвіл, і що моя робота може розміщуватися у проектах Фонду Вікімедіа протягом необмеженого часу або бути вилученою звідти.</p>
            <br />
            <button type="button" class="btn btn-default btn-block" data-toggle="button" onclick="$('#iag').toggle();">Я погоджуюся</button>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iag">
              <a role="button" class="btn btn-primary btn-block nt" onclick="s4v()">перейти до наступного кроку</a>
            </div>
          </div>
          <br />
        </div>

      </form> <!-- result -->
      <div id="result" class="row hof">
        <br />
        крок 5 з 5 [ <a href="#s1" class="smsc">почати спочатку</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+5" target="_blank">попросити допомоги</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">залишити відгук</a> ]
        <br /><br />
        <?php if (($s1 != "") && ($name != "") && !(($s1 == "2") && (($rep == "") || ($auth == ""))) && ($s2 != "") && !(($s2 != "2") && ($filer == "")) && ($s3 != "") && ($license != "")) {
          $stats = fopen("stats/" . date('Y') . ".csv", "a");
          fputcsv($stats, array (date("m-d"), $starttime, date("H:i:s"), $trn), ";");
          fclose($stats);
        ?>
        <div class="col-md-7">
          <p>Якщо у вас встановлений клієнт електронної пошти, просто <b>натисніть на кнопку</b>, щоб створити електронний лист з дозволом. Якщо ні, то скопіюйте і вставте текст у зеленому прямокутнику унизу в електронний лист і надішліть його на <a href="mailto:permissions-uk@wikimedia.org" style="white-space:nowrap;">permissions-uk@wikimedia.org</a>.</p>
          <p>Цей лист має надійти з <b>електронної скриньки, яку можна розпізнати, як пов'язану з матеріалами, на які надсилається дозвіл</b>. Наприклад, якщо ви надаєте дозвіл на зображення, опубліковані на вебсайті, ваша електронна скринька має бути пов'язаною з цим вебсайтом або вказана у контактній інформації на вебсайті; якщо ви даєте дозвіл на зображення від імені організації, ваша електронна скринька має бути офіційною електронною скринькою організації.</p>
          <br />
          <?php
            switch ($s1) {
                case "1":
                    $p1s = ", $name, ";
                    break;
                case "2":
                    $p1s = " представник автора, $rep,";
                    $p1s_ = "<br />$auth $rep";
                    $p1s_m = "%0A$auth $rep";
                    break;
            }
            switch ($s2) {
                case "1":
                    $file = preg_replace("/(File:|(http|https):\/\/(commons|uk).wiki(m|p)edia.org\/(wiki\/|w\/index\.php\?title=)File:)/", "", $filer);
                    $p3s = "<a href='//commons.wikimedia.org/wiki/File:" . rawurlencode(str_replace(" " , "_", str_replace("&amp;", "&", $file))) . "' target='_blank'>https://commons.wikimedia.org/wiki/File:" . str_replace(" " , "_", $file) . "</a>";
                    $p3sm = "https:%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile:" . rawurlencode(str_replace(" " , "_", str_replace("&amp;", "&", $file)));
                    $subj = "дозвіл на " . str_replace("&amp;", "%26", $file);
                    break;
                case "2":
                    $p3s = $p3sm = "прикріплений до цього листа";
                    $subj = "дозвіл на матеріали, прикріплені до цього листа";
                    break;
                case "3":
                    $file = $filer;
                    $p3s = "<a href='" . str_replace("&amp;", "&", $file) . "' target='_blank'>" . $file . "</a>";
                    $p3sm = rawurlencode(str_replace("&amp;", "&", $file));
                    $subj = "дозвіл на " . str_replace("&amp;", "%26", $file);
                    break;
            }
            switch ($s3) {
                case "1":
                    $p2s = "медіатвір";
                    break;
                case "2":
                    $p2s = "витвір, зображений у медіа";
                    break;
                case "3":
                    $p2s = "як витвір, зображений у медіа, так і медіа";
                    break;
            }
            $b1 = "Цим заявляю, що я$p1s автор і/або єдиний власник виключних авторських прав на $p2s $p3s.";
            $b1m = "Цим заявляю, що я$p1s автор і/або єдиний власник виключних авторських прав на $p2s $p3sm.";
            $b2 = "Я погоджуюся опублікувати вищезгаданий твін на умовах $license.";
            $b3 = "Я розумію, що тим самим надаю право будь-якій особі поширювати, змінювати й використовувати твір у будь-яких цілях, що не порушують законодавства (у тому числі пов'язаними з отриманням комерційної вигоди), за умови дотримання зазначеної ліцензії.";
            $b4 = "Я сповіщений/а, що цей дозвіл не обмежується Вікіпедією чи пов'язаними з нею сайтами.";
            if ($license != "Creative Commons CC0 1.0 Universal") {
                $b5 = "<br />Я сповіщений/а, що власник авторських прав завжди зберігає виключні авторські права на твір поза умовами зазначеної ліцензії, у тому числі право на згадування як автора відповідно до обраної ліцензії. Модифікації твору, які зроблять інші люди, не будуть приписані власнику авторських прав.";
                $b5m = "%0AЯ сповіщений/а, що власник авторських прав завжди зберігає виключні авторські права на твір поза умовами зазначеної ліцензії, у тому числі право на згадування як автора відповідно до обраної ліцензії. Модифікації твору, які зроблять інші люди, не будуть приписані власнику авторських прав.";
            }
            $b6 = "Я розумію, що не можу відкликати цей дозвіл, і що моя робота може розміщуватися у проектах Фонду Вікімедіа протягом необмеженого часу або бути вилученою звідти.";
            $tracking = "[згенеровано у relgen]";
            echo "<div class='bg-success' style='padding:8px;'>$b1<br />$b2<br />$b3<br />$b4$b5<br />$b6<br /><br />$name$p1s_<br />" . date("Y-m-d") . "<br /><br />$tracking</div>";
          ?>
          <br /><br />
        </div>
        <div class="col-md-4">
          <a role="button" href="mailto:permissions-uk@wikimedia.org?subject=<?=$subj?>&amp;body=<?=$b1m?>%0A<?=$b2?>%0A<?=$b3?>%0A<?=$b4?><?=$b5m?>%0A<?=$b6?>%0A%0A<?=$name?><?=$p1s_m?>%0A<?=date('Y-m-d')?>%0A%0A<?=$tracking?>" class="btn btn-default btn-block" style="width:100%;">створити електронний лист з дозволом</a>
        </div>
        <?php
            } else {
                if ($name == "") echo "<p class='text-danger'>помилка: Не вказано імені!</p>";
                if (($s1 == "2") && (($rep == "") || ($auth == ""))) echo "<p class='text-danger'>Помилка: Не вказано власника авторських прав і/або позиції!</p>";
                if (($s2 != "2") && ($filer == "")) echo "<p class='text-danger'>Помилка: Не вказано назву файлу!</p>";
                if ($license == "") echo "<p class='text-danger'>Помилка: Не вказано ліцензію!</p>";
            }
        ?>
        <br />
      </div>
    </div>
  </body>
</html>
