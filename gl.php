<?php
    if (isset($_GET['source'])) {show_source(__FILE__); exit();}
    /**
     * @author Stöger Florian D. M. (http://fdms.eu; gl translation by Elisardojm)
     * @license EUPL 1.1 (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf)
     * @copyright © (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf) Stöger Florian D. M. (http://fdms.eu; gl translation by Elisardojm)
     * @translation to Galician by Elisardojm
     */
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Xerador de documentos de liberación para Wikimedia OTRS</title>
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
        $lang = "gl";
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
      <h1>Xerador de documentos de liberación para Wikimedia OTRS <small><a id="meta" tabindex="0" data-toggle="popover" data-placement="bottom" data-trigger="focus" 

data-content="created and maintained by <a href='//meta.wikimedia.org/wiki/User:FDMS4' target='_blank'>FDMS</a><br />© (<a 

href='//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf' target='_blank'>EUPL 1.1</a>) <a href='http://fdms.eu' target='_blank'>Stöger Florian D. 

M.</a><br />(gl translation by Elisardojm)" style="color:#777;"><?=$relgen?></a></small></h1>
  
      <form method="post" action="//tools.wmflabs.org/relgen/i18n/gl.php">

        <div id="s0" class="row hof"> <!-- step 0 -->
          <br /><br />
          <div class="col-md-7">
          <a role="button" href="#s1" class="btn btn-primary btn-lg btn-block smsc nt">comezar</a>
          <input type="hidden" name="starttime" value="<?=$starttime?>" />
          <input type="hidden" name="trn" value="<?=$lang?>" />
          <input type="hidden" name="result" value="1" />
          </div><br />
        </div>

        <div id="s1" class="row hof"> <!-- step 1 -->
          <br />
          paso 1 de 5 [ <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+1" 

target="_blank">axuda</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" 

target="_blank">comentarios</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#iam').show();$('#irep').hide();$('#idk').hide();"><input type="radio" id="s11" name="s1" value="1" 

/>Son o titular dos dereitos de autor</label>
              <label class="btn btn-default btn-block" onclick="$('#iam').show();$('#irep').show();$('#idk').hide();"><input type="radio" id="s12" name="s1" value="2" 

/>Represento ó titular dos dereitos de autor</label>
              <label class="btn btn-default btn-block" onclick="$('#iam').hide();$('#irep').hide();$('#idk').show();"><input type="radio" id="s13" name="s1" value="" 

/>Non coñezo ó titular dos dereitos de autor</label>
            </div>
            <br />
            <p>O titular dos dereitos de autor dun traballo multimedia é a <b>persoa que o creou</b> (fotógrafo, deseñador, pintor, ...), a non ser que os dereitos de 

autor foran transferidos explicitamente por unha operación legal ou contrato.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iam">
              o meu nome<br /><div id="s1fg1" class="form-group"><input id="namei" type="text" name="name" value="<?php echo $name;?>" placeholder="Xoán Ninguén 

(requirido)" class="form-control" /></div>
              <div style="display:none;" id="irep">
                <br />
                titular dos dereitos de autor<br /><div id="s1fg2" class="form-group"><input id="repi" type="text" name="rep" value="<?php echo $rep;?>" 

placeholder="Empresa S.A. / Xoana Ninguén (requirido)" class="form-control" /></div>
                <br />
                a miña autoridade<br /><div id="s1fg3" class="form-group"><input id="authi" type="text" name="auth" value="<?php echo $auth;?>" 

placeholder="Presidente, representante autorizado, … (requirido)" class="form-control" /></div>
              </div>
              <br /><br />
              <a role="button" class="btn btn-primary btn-block nt" onclick="s1v()">continuar co seguinte paso</a>
            </div>
            <div style="display:none;" id="idk">
              <p class="text-danger">Wikimedia OTRS non pode aceptar unha liberación de vostede – por favor, no canto <a 

href="//commons.wikimedia.org/wiki/Commons:OTRS#notch">contacte co titular dos dereitos de autor</a>.</p>
            </div>
          </div>
          <br />
        </div>

        <div id="s2" class="row hof"> <!-- step 2 -->
          <br />
          paso 2 de 5 [ <a href="#s1" class="smsc">volver</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with

+Wikimedia+OTRS+release+generator+step+2" target="_blank">axuda</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?

action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">comentarios</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#iup').show();$('#iatt').show();"><input type="radio" id="s21" name="s2" value="1" />Eu ou outros xa 

temos subido o ficheiro a Wikimedia Commons</label>
              <label class="btn btn-default btn-block" onclick="$('#iup').hide();$('#iatt').show();"><input type="radio" id="s22" name="s2" value="2" />Vou a anexar o 

ficheiro ó correo electrónico</label>
            </div>
            <br />
            <p>Por favor, use o <a href="//commons.wikimedia.org/wiki/Special:UploadWizard" target="_blank"><b>Asistente de cargas</b></a> para subir o ficheiro a 

Wikimedia Commons se non o fixo aínda.</p>
            <p>Para evitar que o ficheiro sexa borrado mentres o seu correo de liberación espera a ser procesado polo equipo de OTRS de Wikimedia, vostede pode engadir 

<b><samp>{{subst:OP}}</samp></b> na páxina de descrición do ficheiro.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iatt">
              <div style="display:none;" id="iup">
                Nome de ficheiro de Wikimedia Commons<br /><input type="text" name="filer" placeholder="Exemplo.jpg (requirido)" class="form-control" />
                <br /><br />
              </div>
              <a role="button" href="#s3" class="btn btn-primary btn-block smsc nt">continuar co seguinte paso</a>
            </div>
          </div>
          <br />
        </div>

        <div id="s3" class="row hof"> <!-- step 3 -->
          <br />
          paso 3 de 5 [ <a href="#s2" class="smsc">volver</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with

+Wikimedia+OTRS+release+generator+step+3" target="_blank">axuda</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?

action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">comentarios</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s31" name="s3" value="1" />Quero liberar o traballo 

multimedia</label>
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s32" name="s3" value="2" />Quero liberar o traballo 

representado no ficheiro multimedia</label>
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s33" name="s3" value="3" />Quero liberar tanto o traballo 

representado no ficheiro multimedia coma o ficheiro multimedia</label>
            </div>
            <br />
            <p>Se o traballo multimedia representa ou inclúe o traballo artístico doutra persoa dunha forma non trivial, é un <a 

href="//commons.wikimedia.org/wiki/Commons:Derivative_works" target="_blank"><b>traballo derivado</b></a> e polo tanto normalmente é precisa unha liberación separada 

do titular dos dereitos de autor da obra de arte representada.</p>
            <p>Nalgúns países, grazas á excepción da <a href="//commons.wikimedia.org/wiki/Commons:Freedom_of_panorama" target="_blank"><b>liberdade de 

panorama</b></a>, obras arquitectónicas e outras obras de arte visibles de forma permanente no espazo público están exentas deste requisito. Nos Estados Unidos, só 

está exenta a arquitectura.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="i3">
              <a role="button" href="#s4" class="btn btn-primary btn-block smsc nt">continuar co seguinte paso</a>
            </div>
          </div>
          <br />
        </div>

        <div id="s4" class="row hof"> <!-- step 4 -->
          <br />
          paso 4 de 5 [ <a href="#s3" class="smsc">volver</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with

+Wikimedia+OTRS+release+generator+step+4" target="_blank">axuda</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?

action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">comentarios</a> ]
          <br /><br />
          <div class="col-md-7">
            <p>Concordo con publicar o contido mencionado arriba baixo a seguinte licenza libre:</p>
            <div id="s4fg" class="form-group"><div class="input-group">
              <input id="licensei" type="text" name="license" value="Creative Commons Atribución-Compartir igual 4.0 Internacional (CC BY-SA 4.0)" class="form-control" 

/>
              <div class="input-group-btn">
                <a role="button" data-toggle="dropdown" class="btn btn-default"><span class="caret" /></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a onclick="$('#licensei').val('Creative Commons Atribución-Compartir igual 4.0 Internacional (CC BY-SA 4.0)'); $('#iawattr').show();">Creative 

Commons Atribución-Compartir igual 4.0 Internacional (CC BY-SA 4.0)</a></li>
                  <li><a onclick="$('#licensei').val('Creative Commons Atribución 4.0 Internacional (CC BY 4.0)'); $('#iawattr').show();">Creative Commons Atribución 

4.0 Internacional (CC BY 4.0)</a></li>
                  <li><a onclick="$('#licensei').val('Creative Commons CC0 1.0 Universal (dominio público)'); $('#iawattr').hide();">Creative Commons CC0 1.0 Universal 

(dominio público)</a></li>
                </ul>
                <a role="button" href="//commons.wikimedia.org/wiki/Commons:First_steps/License_selection" target="_blank" class="btn btn-default">
                  <span class="glyphicon glyphicon-question-sign" />
                </a>
              </div>
            </div></div>
            <p>Recoñezo que facendo isto concedo a calquera o dereito a utilizar o traballo, mesmo nun produto comercial ou doutro xeito, e a modificalo segundo as 

súas necesidades, a condición de que manteñan os termos da licenza e calquera outras leis aplicábeis.</p>
            <p>Son consciente que este acordo non está limitado a Wikipedia ou ós seus sitios relacionados.</p>
            <p id="iawattr">Son consciente de que o titular dos dereitos de autor sempre retén a propiedade dos dereitos así como o dereito de ter a atribución de 

acordo coa licenza escollida. As modificacións que outros fagan ao traballo non será solicitado que foron feitas polo titular dos dereitos de autor.</p>
            <p>Recoñezo que non podo retirar este acordo, e que o contido pode, ou non, ser mantido permanentemente nun proxecto Wikimedia.</p>
            <br />
            <button type="button" class="btn btn-default btn-block" data-toggle="button" onclick="$('#iag').toggle();">Concordo</button>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iag">
              <a role="button" class="btn btn-primary btn-block nt" onclick="s4v()">continuar co seguinte paso</a>
            </div>
          </div>
          <br />
        </div>

      </form> <!-- result -->
      <div id="result" class="row hof">
        <br />
        paso 5 de 5 [ <a href="#s1" class="smsc">volver comezar</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?

action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+5" target="_blank">axuda</a> | <a 

href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">comentarios</a> ]
        <br /><br />
        <?php if (($s1 != "") && ($name != "") && !(($s1 == "2") && (($rep == "") || ($auth == ""))) && ($s2 != "") && !(($s2 != "2") && ($filer == "")) && ($s3 != "") 

&& ($license != "")) {
          $stats = fopen("../stats/" . date('Y') . ".csv", "a");
          fputcsv($stats, array (date("m-d"), $starttime, date("H:i:s"), $trn), ";");
          fclose($stats);
        ?>
        <div class="col-md-7">
          <p>Se ten un cliente de correo electrónico instalado, simplemente <b>prema o botón</b> para crear o correo de liberación. De forma alternativa, copie e pegue 

o texto da caixa verde de abaixo nun correo electrónico para <a href="mailto:permissions-es@wikimedia.org" style="white-space:nowrap;">permissions-

es@wikimedia.org</a>.</p>
          <p>O correo electrónico debe enviarse dende un <b>enderezo de correo electrónico que poidamos recoñecer como asociado co contido a ser liberado</b>. Por 

exemplo, se está liberando imaxes amosadas nun sitio web, o seu enderezo de correo electrónico debe estar asociado co sitio web ou listado na páxina de contacto do 

sitio web; se está liberando imaxes en nome dunha organización, o seu enderezo de correo electrónico ten que ser un enderezo de correo electrónico oficial da 

organización.</p>
          <br />
          <?php
            switch ($s1) {
                case "1":
                    $p1s = ", $name, son";
                    break;
                case "2":
                    $p1s = " representante $rep,";
                    $p1s_ = "<br />$auth de $rep";
                    $p1s_m = "%0A$auth de $rep";
                    break;
            }
            switch ($s2) {
                case "1":
                    $file = preg_replace("/(File:|(http|https):\/\/(commons|en|gl).wiki(m|p)edia.org\/(wiki\/|w\/index\.php\?title=)File:)/", "", $filer);
                    $p3s = "<a href='//commons.wikimedia.org/wiki/File:" . rawurlencode(str_replace(" " , "_", $file)) . "' 

target='_blank'>https://commons.wikimedia.org/wiki/File:" . str_replace(" " , "_", $file) . "</a>";
                    $p3sm = "https:%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile:" . rawurlencode(str_replace(" " , "_", $file));
                    $subj = "liberación de " . $file;
                    break;
                case "2":
                    $p3s = $p3sm = "anexado a este correo electrónico";
                    $subj = "liberación de contido anexado a este correo electrónico";
                    break;
                case "3":
                    $file = $filer;
                    $p3s = "<a href='" . $file . "' target='_blank'>" . $file . "</a>";
                    $p3sm = rawurlencode($file);
                    $subj = "liberación de " . $file;
                    break;
            }
            switch ($s3) {
                case "1":
                    $p2s = "o traballo multimedia";
                    break;
                case "2":
                    $p2s = "o traballo representado no ficheiro multimedia";
                    break;
                case "3":
                    $p2s = "tanto o traballo representado como o ficheiro multimedia";
                    break;
            }
            $b1 = "Por este medio afirmo que eu$p1s o creador e/ou único dono do copyright exclusivo de $p2s $p3s.";
            $b1m = "Por este medio afirmo que eu$p1s o creador e/ou único dono do copyright exclusivo de $p2s $p3sm.";
            $b2 = "Estou de acordo en publicar o traballo arriba mencionado baixo a licenza $license.";
            $b3 = "Recoñezo que facendo isto concedo a calquera o dereito de utilizar o traballo, incluso nun produto comercial ou doutro xeito, e a modificalo segundo 

as súas necesidades, a condición de que manteñan as condicións da licenza e calquera outras leis aplicábeis.";
            $b4 = "Son consciente que este acordo non está limitado a Wikipedia ou ós seus sitios relacionados.";
            if ($license != "Creative Commons CC0 1.0 Universal (dominio público)") {
                $b5 = "<br />Son consciente de que o titular do copyright sempre retén a propiedade dos dereitos de autor así como o dereito a ser atribuído de acordo 

coa licenza escollida. As modificacións que outros fagan ó traballo non serán atribuídas ó titular dos dereitos de autor.";
                $b5m = "%0ASon consciente de que o titular do copyright sempre retén a propiedade dos dereitos de autor así como o dereito a ser atribuído de acordo 

coa licenza escollida. As modificacións que outros fagan ó traballo non serán atribuídas ó titular dos dereitos de autor.";
            }
            $b6 = "Recoñezo que non podo retirar este acordo, e que o contido pode, ou non, ser mantido permanentemente nun proxecto Wikimedia.";
            $tracking = "[xerado usando relgen]";
            echo "<div class='bg-success' style='padding:8px;'>$b1<br />$b2<br />$b3<br />$b4$b5<br />$b6<br /><br />$name$p1s_<br />" . date("Y-m-d") . "<br /><br />

$tracking</div>";
          ?>
          <br /><br />
        </div>
        <div class="col-md-4">
          <a role="button" href="mailto:permissions-es@wikimedia.org?subject=<?=$subj?>&amp;body=<?=$b1m?>%0A<?=$b2?>%0A<?=$b3?>%0A<?=$b4?><?=$b5m?>%0A<?=$b6?>%0A

%0A<?=$name?><?=$p1s_m?>%0A<?=date('Y-m-d')?>%0A%0A<?=$tracking?>" class="btn btn-default btn-block" style="width:100%;">crear correo de liberación</a>
        </div>
        <?php
            } else {
                if ($name == "") echo "<p class='text-danger'>Erro: Non se indicou o nome.</p>";
                if (($s1 == "2") && (($rep == "") || ($auth == ""))) echo "<p class='text-danger'>Erro: Non se indicou o titular dos dereitos de autor e/ou 

autoridade.</p>";
                if (($s2 != "2") && ($filer == "")) echo "<p class='text-danger'>Erro: Non se indicou o nome de ficheiro.</p>";
                if ($license == "") echo "<p class='text-danger'>Erro: Non se indicou a licenza.</p>";
            }
        ?>
        <br />
      </div>
    </div>
  </body>
</html>
