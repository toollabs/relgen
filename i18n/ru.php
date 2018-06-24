<?php
    if (isset($_GET['source'])) {show_source(__FILE__); exit();}
    /**
     * @author Stöger Florian D. M. (http://fdms.eu; ru translation by Anastasia Lvova)
     * @license EUPL 1.1 (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf)
     * @copyright © (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf) Stöger Florian D. M. (http://fdms.eu; ru translation by Anastasia Lvova)
     */
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Генератор разрешений Викимедиа OTRS</title>
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
          if (!$("#namei").val().trim()) {
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
              if (!$("#repi").val().trim()) {
                  if (!$("#s1fg2").hasClass("has-error")) {
                      $("#s1fg2").addClass("has-error");
                  }
                  s1vi++;
              } else {
                  if ($("#s1fg2").hasClass("has-error")) {
                      $("#s1fg2").removeClass("has-error");
                  }
              }
              if (!$("#authi").val().trim()) {
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
          if (!$("#licensei").val().trim()) {
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
        $lang = "ru";
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
      <h1>Генератор разрешений Викимедиа OTRS<small><a id="meta" tabindex="0" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="created and maintained by <a href='//meta.wikimedia.org/wiki/User:FDMS4' target='_blank'>FDMS</a><br />© (<a href='//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf' target='_blank'>EUPL 1.1</a>) <a href='http://fdms.eu' target='_blank'>Stöger Florian D. M.</a><br />(ru translation by Anastasia Lvova)" style="color:#777;"><?=$relgen?></a></small></h1>
  
      <form method="post" action="//tools.wmflabs.org/relgen/i18n/ru.php">

        <div id="s0" class="row hof"> <!-- step 0 -->
          <br /><br />
          <div class="col-md-7">
          <a role="button" href="#s1" class="btn btn-primary btn-lg btn-block smsc nt">старт</a>
          <input type="hidden" name="starttime" value="<?=$starttime?>" />
          <input type="hidden" name="trn" value="<?=$lang?>" />
          <input type="hidden" name="result" value="1" />
          </div><br />
        </div>

        <div id="s1" class="row hof"> <!-- step 1 -->
          <br />
          шаг 1 из 5 [ <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+1" target="_blank">помощь</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">обратная связь</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#iam').show();$('#irep').hide();$('#idk').hide();"><input type="radio" id="s11" name="s1" value="1" />Я владелец авторских прав</label>
              <label class="btn btn-default btn-block" onclick="$('#iam').show();$('#irep').show();$('#idk').hide();"><input type="radio" id="s12" name="s1" value="2" />Я представитель владельца авторских прав</label>
              <label class="btn btn-default btn-block" onclick="$('#iam').hide();$('#irep').hide();$('#idk').show();"><input type="radio" id="s13" name="s1" value="" />Я не знаю, кто владеет авторскими правами</label>
            </div>
            <br />
            <p>Владельцем авторских прав на работу является <b>человек, создавший её</b> (фотограф, дизайнер, художник, …), если авторское право не было явно передано по закону или договору.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iam">
              моё имя<br /><div id="s1fg1" class="form-group"><input id="namei" type="text" name="name" value="<?php echo $name;?>" placeholder="Иван Иванов (обязательно)" class="form-control" /></div>
              <div style="display:none;" id="irep">
                <br />
                владелец авторских прав<br /><div id="s1fg2" class="form-group"><input id="repi" type="text" name="rep" value="<?php echo $rep;?>" placeholder="ООО АБВ / Мария Иванова (обязательно)" class="form-control" /></div>
                <br />
                мои основания<br /><div id="s1fg3" class="form-group"><input id="authi" type="text" name="auth" value="<?php echo $auth;?>" placeholder="директор, назначенный представитель, … (обязательно)" class="form-control" /></div>
              </div>
              <br /><br />
              <a role="button" class="btn btn-primary btn-block nt" onclick="s1v()">перейти к следующему шагу</a>
            </div>
            <div style="display:none;" id="idk">
              <p class="text-danger">Викимедиа OTRS не может принять от вас разрешение – пожалуйста, вместо этого <a href="//commons.wikimedia.org/wiki/Commons:OTRS#notch">свяжитесь с владельцем авторских прав</a>.</p>
            </div>
          </div>
          <br />
        </div>

        <div id="s2" class="row hof"> <!-- step 2 -->
          <br />
          шаг 2 из 5 [ <a href="#s1" class="smsc">назад</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+2" target="_blank">помощь</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">обратная связь</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#iup').show();$('#iatt').show();"><input type="radio" id="s21" name="s2" value="1" />Я или другие уже загрузили файл на Викисклад</label>
              <label class="btn btn-default btn-block" onclick="$('#iup').hide();$('#iatt').show();"><input type="radio" id="s22" name="s2" value="2" />Я приложу файл к электронному письму</label>
            </div>
            <br />
            <p>Пожалуйста, используйте <a href="//commons.wikimedia.org/wiki/Special:UploadWizard" target="_blank"><b>Мастер загрузки</b></a>, чтобы загрузить файл на Викисклад, если вы ещё этого не сделали.</p>
            <p>Чтобы защитить файл от удаления, пока ваше письмо с разрешением ждёт обработки командой Викимедиа OTRS, вы можете разместить <b><samp>{{subst:OP}}</samp></b> на странице описания файла.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iatt">
              <div style="display:none;" id="iup">
                Название файла на Викискладе<br /><input type="text" name="filer" placeholder="Example.jpg (обязательно)" class="form-control" />
                <br /><br />
              </div>
              <a role="button" href="#s3" class="btn btn-primary btn-block smsc nt">перейти к следующему шагу</a>
            </div>
          </div>
          <br />
        </div>

        <div id="s3" class="row hof"> <!-- step 3 -->
          <br />
          шаг 3 из 5 [ <a href="#s2" class="smsc">назад</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+3" target="_blank">помощь</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">обратная связь</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s31" name="s3" value="1" />Я хочу дать разрешение на художественную работу</label>
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s32" name="s3" value="2" />Я хочу дать разрешение на художественную работу, являющийся частью другой работы<!--I want to release the work depicted in the media work--></label>
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s33" name="s3" value="3" />Я хочу дать разрешение и на художественную работу, и на работу, частью которой она является.</label>
            </div>
            <br />
            <p>Если художественная работа изображает или иначе включает чтю-то ещё работу нетривиальным образом, это <a href="//commons.wikimedia.org/wiki/Commons:Производные_произведения" target="_blank"><b>производная работа</b></a>, и потому обычно нужно отдельное разрешение от владельца авторских прав исходной работы.</p>
            <p>В некоторых странах благодаря исключению о <a href="//commons.wikimedia.org/wiki/Commons:Freedom_of_panorama" target="_blank"><b>свободе панорамы</b></a> архитектура и другие художественные работы, находящиеся на постоянном публичном обозрении, исключены из этого требования. В США из требования исключена только архитектура.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="i3">
              <a role="button" href="#s4" class="btn btn-primary btn-block smsc nt">перейти к следующему шагу</a>
            </div>
          </div>
          <br />
        </div>

        <div id="s4" class="row hof"> <!-- step 4 -->
          <br />
          шаг 4 из 5 [ <a href="#s3" class="smsc">назад</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+4" target="_blank">помощь</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">обратная связь</a> ]
          <br /><br />
          <div class="col-md-7">
            <p>Я соглашаюсь опубликовать вышеупомянутую работу под следующей свободной лицензией:</p>
            <div id="s4fg" class="form-group"><div class="input-group">
              <input id="licensei" type="text" name="license" value="Creative Commons Attribution-ShareAlike 4.0 International" class="form-control" />
              <div class="input-group-btn">
                <a role="button" data-toggle="dropdown" class="btn btn-default"><span class="caret" /></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a onclick="$('#licensei').val('Creative Commons Attribution-ShareAlike 4.0 International'); $('#iawattr').show();">Creative Commons Attribution-ShareAlike 4.0 International</a></li>
                  <li><a onclick="$('#licensei').val('Creative Commons Attribution 4.0 International'); $('#iawattr').show();">Creative Commons Attribution 4.0 International</a></li>
                  <li><a onclick="$('#licensei').val('Creative Commons CC0 1.0 Universal'); $('#iawattr').hide();">Creative Commons CC0 1.0 Universal (передача в общественное достояние)</a></li>
                </ul>
                <a role="button" href="//commons.wikimedia.org/wiki/Commons:First_steps/License_selection" target="_blank" class="btn btn-default">
                  <span class="glyphicon glyphicon-question-sign" />
                </a>
              </div>
            </div></div>
            <p>Я понимаю, что тем самым даю право любому лицу распространять, изменять и использовать произведение в любых законных целях (в том числе связанных с извлечением коммерческой выгоды) при условии соблюдения указанных лицензий.</p>
            <p>Я понимаю, что данное соглашение не ограничивается Википедией или связанными сайтами.</p>
            <p id="iawattr">Я уведомлен(а), что я сохраняю исключительные авторские права на это произведение вне условий указанных лицензий и что я всегда сохраняю право на упоминание меня как автора в соответствии с выбранными лицензиями. Я согласен(согласна) с тем, что информация о моём авторстве будет сохранена в истории правок статей (если речь идёт о текстовой информации) либо на сопроводительных веб-страницах (если речь идёт об изображениях и иных медиафайлах). Модификации, которые сделают другие люди, не будут приписаны мне.</p>
			<p>Данное разрешение затрагивает только мои исключительные авторские права, и я оставляю за собой право предпринимать действия против использования моей работы с нарушением закона, в частности: для клеветы, унижения чести и достоинства, нарушения правил использования торговых марок, нарушения права на охрану изображения гражданина и т. д.</p>
            <p>Я понимаю, что я не могу отозвать данное разрешение, и что моя работа может размещаться в проектах Фонда Викимедиа в течение неограниченного времени либо быть удалённой оттуда.</p>
            <br />
            <button type="button" class="btn btn-default btn-block" data-toggle="button" onclick="$('#iag').toggle();">Я согласен (согласна)</button>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iag">
              <a role="button" class="btn btn-primary btn-block nt" onclick="s4v()">перейти к следующему шагу</a>
            </div>
          </div>
          <br />
        </div>

      </form> <!-- result -->
      <div id="result" class="row hof">
        <br />
        шаг 5 из 5 [ <a href="#s1" class="smsc">в начало</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+5" target="_blank">помощь</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">обратная связь</a> ]
        <br /><br />
        <?php if (($s1 != "") && ($name != "") && !(($s1 == "2") && (($rep == "") || ($auth == ""))) && ($s2 != "") && !(($s2 != "2") && ($filer == "")) && ($s3 != "") && ($license != "")) {
          $stats = fopen("../stats/" . date('Y') . ".csv", "a");
          fputcsv($stats, array (date("m-d"), $starttime, date("H:i:s"), $trn), ";");
          fclose($stats);
        ?>
        <div class="col-md-7">
          <p>Если у вас установлена почтовая программа, просто <b>нажмите на кнопку</b> для создания письма с разрешением. Иначе, скопируйте и вставьте текст из зелёного блока, расположенного ниже, в электронное письмо на <a href="mailto:permissions-ru@wikimedia.org" style="white-space:nowrap;">permissions-ru@wikimedia.org</a>.</p>
          <p>Электронное письмо должно придти с <b>электронного адреса, который мы можем опознать как ассоциированный с предоставляемой работой</b>. Например, если вы предоставляете разрешение на изображения с сайта, ваш электронный адрес доложен быть ассоциирован с этим сайтом или упомянут на странице с контактами; если вы предоставляете разрешение на изображения от имени организации, ваш электронный адрес должен быть официальным адресом организации.</p>
          <br />
          <?php
            switch ($s1) {
                case "1":
                    $p1s = ", $name, ";
                    break;
                case "2":
                    $p1s = " represent $rep,";
                    $p1s_ = "<br />$auth of $rep";
                    $p1s_m = "%0A$auth of $rep";
                    break;
            }
            switch ($s2) {
                case "1":
                    $file = preg_replace("/(File:|(http|https):\/\/(commons|ru).wiki(m|p)edia.org\/(wiki\/|w\/index\.php\?title=)File:)/", "", $filer);
                    $p3s = "<a href='//commons.wikimedia.org/wiki/File:" . rawurlencode(str_replace(" " , "_", $file)) . "' target='_blank'>https://commons.wikimedia.org/wiki/File:" . str_replace(" " , "_", $file) . "</a>";
                    $p3sm = "https:%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile:" . rawurlencode(str_replace(" " , "_", $file));
                    $subj = "разрешение на " . $file;
                    break;
                case "2":
                    $p3s = $p3sm = "приложено к письму";
                    $subj = "разрешение на материал, приложенный к этому письму";
                    break;
                case "3":
                    $file = $filer;
                    $p3s = "<a href='" . $file . "' target='_blank'>" . $file . "</a>";
                    $p3sm = rawurlencode($file);
                    $subj = "разрешение на " . $file;
                    break;
            }
            switch ($s3) {
                case "1":
                    $p2s = "художественная работа";
                    break;
                case "2":
                    $p2s = "работа, включённая в другую работу";
                    break;
                case "3":
                    $p2s = "художественная работа и работа, в которой она изображена";
                    break;
            }
            $b1 = "Настоящим я заявляю, что я$p1s являюсь автором и/или единственным обладателем исключительных авторских прав на произведение $p2s $p3s.";
            $b1m = "Настоящим я заявляю, что я$p1s являюсь автором и/или единственным обладателем исключительных авторских прав на произведение $p2s $p3sm.";
            $b2 = "Я согласен(согласна) опубликовать это произведение на условиях свободной лицензии $license.";
            $b3 = "Я понимаю, что тем самым даю право любому лицу распространять, изменять и использовать произведение в любых законных целях (в том числе связанных с извлечением коммерческой выгоды) при условии соблюдения указанных лицензий.";
            $b4 = "Я понимаю, что данное соглашение не ограничивается Википедией или связанными сайтами.";
			
			<!-- deleted if block-->
			$b41 = "Я уведомлен(а), что я сохраняю исключительные авторские права на это произведение вне условий указанных лицензий и что я всегда сохраняю право на упоминание меня как автора в соответствии с выбранными лицензиями. Я согласен(согласна) с тем, что информация о моём авторстве будет сохранена в истории правок статей (если речь идёт о текстовой информации) либо на сопроводительных веб-страницах (если речь идёт об изображениях и иных медиафайлах). Модификации, которые сделают другие люди, не будут приписаны мне.";
			$b42 = "Данное разрешение затрагивает только мои исключительные авторские права, и я оставляю за собой право предпринимать действия против использования моей работы с нарушением закона, в частности: для клеветы, унижения чести и достоинства, нарушения правил использования торговых марок, нарушения права на охрану изображения гражданина и т. д.";
		
            }
            $b6 = "Я понимаю, что я не могу отозвать данное разрешение, и что моя работа может размещаться в проектах Фонда Викимедиа в течение неограниченного времени либо быть удалённой оттуда.";
            $tracking = "[generated using relgen]";
            echo "<div class='bg-success' style='padding:8px;'>$b1<br />$b2<br />$b3<br />$b4<br />$b41<br />$b42<br /><br />$name$p1s_<br />" . date("Y-m-d") . "<br /><br />$tracking</div>";
          ?>
		              
          <br /><br />
        </div>
        <div class="col-md-4">
          <a role="button" href="mailto:permissions-ru@wikimedia.org?subject=<?=$subj?>&amp;body=<?=$b1m?>%0A<?=$b2?>%0A<?=$b3?>%0A<?=$b4?><?=$b5m?>%0A<?=$b6?>%0A%0A<?=$name?><?=$p1s_m?>%0A<?=date('Y-m-d')?>%0A%0A<?=$tracking?>" class="btn btn-default btn-block" style="width:100%;">создать электронное письмо с разрешением</a>
        </div>
        <?php
            } else {
                if ($name == "") echo "<p class='text-danger'>Ошибка: Не задано имя!</p>";
                if (($s1 == "2") && (($rep == "") || ($auth == ""))) echo "<p class='text-danger'>Ошибка: Не указан владелец авторских прав или представитель!</p>";
                if (($s2 != "2") && ($filer == "")) echo "<p class='text-danger'>Ошибка: Не указано имя файла!</p>";
                if ($license == "") echo "<p class='text-danger'>Ошибка: Не указана лицензия!</p>";
            }
        ?>
        <br />
      </div>
    </div>
  </body>
</html>
