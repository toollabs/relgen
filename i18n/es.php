<?php
    if (isset($_GET['source'])) {show_source(__FILE__); exit();}
    /**
     * @author Stöger Florian D. M. (http://fdms.eu; es translation by Elisardojm)
     * @license EUPL 1.1 (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf)
     * @copyright © (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf) Stöger Florian D. M. (http://fdms.eu; es translation by Elisardojm)
     */
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Generador de documentos de liberación para Wikimedia OTRS</title>
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
        $lang = "es";
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
      <h1>Generador de documentos de liberación para Wikimedia OTRS <small><a id="meta" tabindex="0" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="created and maintained by <a href='//meta.wikimedia.org/wiki/User:FDMS4' target='_blank'>FDMS</a><br />© (<a href='//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf' target='_blank'>EUPL 1.1</a>) <a href='http://fdms.eu' target='_blank'>Stöger Florian D. M.</a><br />(es translation by Elisardojm)" style="color:#777;"><?=$relgen?></a></small></h1>
  
      <form method="post" action="//tools.wmflabs.org/relgen/i18n/es.php">

        <div id="s0" class="row hof"> <!-- step 0 -->
          <br /><br />
          <div class="col-md-7">
          <a role="button" href="#s1" class="btn btn-primary btn-lg btn-block smsc nt">comenzar</a>
          <input type="hidden" name="starttime" value="<?=$starttime?>" />
          <input type="hidden" name="trn" value="<?=$lang?>" />
          <input type="hidden" name="result" value="1" />
          </div><br />
        </div>

        <div id="s1" class="row hof"> <!-- step 1 -->
          <br />
          paso 1 de 5 [ <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+1" target="_blank">ayuda</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">comentarios</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#iam').show();$('#irep').hide();$('#idk').hide();"><input type="radio" id="s11" name="s1" value="1" />Soy el titular de los derechos de autor</label>
              <label class="btn btn-default btn-block" onclick="$('#iam').show();$('#irep').show();$('#idk').hide();"><input type="radio" id="s12" name="s1" value="2" />Represento al titular de los derechos de autor</label>
              <label class="btn btn-default btn-block" onclick="$('#iam').hide();$('#irep').hide();$('#idk').show();"><input type="radio" id="s13" name="s1" value="" />No conozco al titular de los derechos de autor</label>
            </div>
            <br />
            <p>El titular de los derechos de autor de un trabajo multimedia es la <b>persona que lo creó</b> (fotógrafo, diseñador, pintor, ...), a no ser que los derechos de autor fueran transferidos explícitamente por unha operación legal o contrato.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iam">
              mi nombre<br /><div id="s1fg1" class="form-group"><input id="namei" type="text" name="name" value="<?php echo $name;?>" placeholder="Juán Nadie (requerido)" class="form-control" /></div>
              <div style="display:none;" id="irep">
                <br />
                titular de los derechos de autor<br /><div id="s1fg2" class="form-group"><input id="repi" type="text" name="rep" value="<?php echo $rep;?>" placeholder="Empresa S.A. / Juana Nadie (requerido)" class="form-control" /></div>
                <br />
                mi autoridad<br /><div id="s1fg3" class="form-group"><input id="authi" type="text" name="auth" value="<?php echo $auth;?>" placeholder="Presidente, representante autorizado, … (requerido)" class="form-control" /></div>
              </div>
              <br /><br />
              <a role="button" class="btn btn-primary btn-block nt" onclick="s1v()">continuar con el siguiente paso</a>
            </div>
            <div style="display:none;" id="idk">
              <p class="text-danger">Wikimedia OTRS no puede aceptar una liberación de usted – por favor, en lugar de esto <a href="//commons.wikimedia.org/wiki/Commons:OTRS#notch">contacte con el titular de los derechos de autor</a>.</p>
            </div>
          </div>
          <br />
        </div>

        <div id="s2" class="row hof"> <!-- step 2 -->
          <br />
          paso 2 de 5 [ <a href="#s1" class="smsc">volver</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+2" target="_blank">ayuda</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">comentarios</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#iup').show();$('#iatt').show();"><input type="radio" id="s21" name="s2" value="1" />Yo o otros ya hemos subido el fichero a Wikimedia Commons</label>
              <label class="btn btn-default btn-block" onclick="$('#iup').hide();$('#iatt').show();"><input type="radio" id="s22" name="s2" value="2" />Voy a anexar el fichero al correo electrónico</label>
            </div>
            <br />
            <p>Por favor, use el <a href="//commons.wikimedia.org/wiki/Special:UploadWizard" target="_blank"><b>Asistente de cargas</b></a> para subir el fichero a Wikimedia Commons si aún no lo hizo.</p>
            <p>Para evitar que el fichero sea borrado mientras su correo de liberación espera a ser procesado por el equipo de OTRS de Wikimedia, usted puede añadir <b><samp>{{subst:OP}}</samp></b> en la página de descripción del fichero.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iatt">
              <div style="display:none;" id="iup">
                Nombre de fichero de Wikimedia Commons<br /><input type="text" name="filer" placeholder="Ejemplo.jpg (requerido)" class="form-control" />
                <br /><br />
              </div>
              <a role="button" href="#s3" class="btn btn-primary btn-block smsc nt">continuar con el siguiente paso</a>
            </div>
          </div>
          <br />
        </div>

        <div id="s3" class="row hof"> <!-- step 3 -->
          <br />
          paso 3 de 5 [ <a href="#s2" class="smsc">volver</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+3" target="_blank">ayuda</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">comentarios</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s31" name="s3" value="1" />Quiero liberar el trabajo multimedia</label>
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s32" name="s3" value="2" />Quiero liberar el trabajo representado en el fichero multimedia</label>
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s33" name="s3" value="3" />Quiero liberar tanto el trabajo representado en el fichero multimedia como el fichero multimedia</label>
            </div>
            <br />
            <p>Si el trabajo multimedia representa o incluye el trabajo artístico de otra persona de una forma no trivial, es un <a href="//commons.wikimedia.org/wiki/Commons:Derivative_works" target="_blank"><b>trabajo derivado</b></a> y por lo tanto normalmente es necesaria una liberación separada del titular de los derechos de autor de la obra de arte representada.</p>
            <p>En algunos países, gracias a la excepción de la <a href="//commons.wikimedia.org/wiki/Commons:Freedom_of_panorama" target="_blank"><b>libertad de panorama</b></a>, obras arquitectónicas y otras obras de arte visibles de forma permanente en el espacio público están exentas de este requisito. En los Estados Unidos, sólo está exenta la arquitectura.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="i3">
              <a role="button" href="#s4" class="btn btn-primary btn-block smsc nt">continuar con el siguiente paso</a>
            </div>
          </div>
          <br />
        </div>

        <div id="s4" class="row hof"> <!-- step 4 -->
          <br />
          paso 4 de 5 [ <a href="#s3" class="smsc">volver</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+4" target="_blank">ayuda</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">comentarios</a> ]
          <br /><br />
          <div class="col-md-7">
            <p>Estoy de acuerdo con publicar el contenido mencionado arriba bajxo la siguiente licencia libre:</p>
            <div id="s4fg" class="form-group"><div class="input-group">
              <input id="licensei" type="text" name="license" value="Creative Commons Atribución-Compartir igual 4.0 Internacional (CC BY-SA 4.0)" class="form-control" />
              <div class="input-group-btn">
                <a role="button" data-toggle="dropdown" class="btn btn-default"><span class="caret" /></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a onclick="$('#licensei').val('Creative Commons Atribución-Compartir igual 4.0 Internacional (CC BY-SA 4.0)'); $('#iawattr').show();">Creative Commons Atribución-Compartir igual 4.0 Internacional (CC BY-SA 4.0)</a></li>
                  <li><a onclick="$('#licensei').val('Creative Commons Atribución 4.0 Internacional (CC BY 4.0)'); $('#iawattr').show();">Creative Commons Atribución 4.0 Internacional (CC BY 4.0)</a></li>
                  <li><a onclick="$('#licensei').val('Creative Commons CC0 1.0 Universal (dominio público)'); $('#iawattr').hide();">Creative Commons CC0 1.0 Universal (dominio público)</a></li>
                </ul>
                <a role="button" href="//commons.wikimedia.org/wiki/Commons:First_steps/License_selection" target="_blank" class="btn btn-default">
                  <span class="glyphicon glyphicon-question-sign" />
                </a>
              </div>
            </div></div>
            <p>Reconozco que haciento esto concedo a cualquiera el derecho a utilizar el trabajo, incluso en un producto comercial o de otra manera, y a modificarlo según sus necesidydes, a condición de que mantengan los términos de la licencia y cualquier otras leyes aplicables.</p>
            <p>Soy consciente que este acuerdo no está limitado a Wikipedia o a sus sitios asociados.</p>
            <p id="iawattr">Soy consciente de que el titular de los derechos de autor siempre retiene la propiedad de los derechos así como el derecho de tener la atribución de acuerdo con la licencia escogida. Las modificaciones que otros hagan al trabajo no serán solicitadas que fueron hechas por el titular de los derechos de autor.</p>
            <p>Reconozco que no puedo retirar este acuerdo, y que el contenido puede, o no, ser mantenido permanentemente en un proyecto Wikimedia.</p>
            <br />
            <button type="button" class="btn btn-default btn-block" data-toggle="button" onclick="$('#iag').toggle();">Estoy de acuerdo</button>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iag">
              <a role="button" class="btn btn-primary btn-block nt" onclick="s4v()">continuar con el siguiente paso</a>
            </div>
          </div>
          <br />
        </div>

      </form> <!-- result -->
      <div id="result" class="row hof">
        <br />
        paso 5 de 5 [ <a href="#s1" class="smsc">volver comezar</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+5" target="_blank">ayuda</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">comentarios</a> ]
        <br /><br />
        <?php if (($s1 != "") && ($name != "") && !(($s1 == "2") && (($rep == "") || ($auth == ""))) && ($s2 != "") && !(($s2 != "2") && ($filer == "")) && ($s3 != "") && ($license != "")) {
          $stats = fopen("../stats/" . date('Y') . ".csv", "a");
          fputcsv($stats, array (date("m-d"), $starttime, date("H:i:s"), $trn), ";");
          fclose($stats);
        ?>
        <div class="col-md-7">
          <p>Si tiene un cliente de correo electrónico instalado, simplemente <b>pulse el botón</b> para crear el correo de liberación. De forma alternativa, copie y pegue el texto de la caja verde de abajo en un correo electrónico para <a href="mailto:permissions-es@wikimedia.org" style="white-space:nowrap;">permissions-es@wikimedia.org</a>.</p>
          <p>El correo electrónico debe enviarse desde una <b>dirección de correo electrónico que podamos reconocer como asociado con el contenido a ser liberado</b>. Por ejemplo, si está liberando imágenes mostradas en un sitio web, su dirección de correo electrónico debe estar asociada con el sitio web o listado en la página de contacto del sitio web; si está liberando imágenes en nombre de una organización, su dirección de correo electrónico tiene que ser una dirección de correo electrónico oficial de la organización.</p>
          <br />
          <?php
            switch ($s1) {
                case "1":
                    $p1s = ", $name, soy";
                    break;
                case "2":
                    $p1s = " representante $rep,";
                    $p1s_ = "<br />$auth de $rep";
                    $p1s_m = "%0A$auth de $rep";
                    break;
            }
            switch ($s2) {
                case "1":
                    $file = preg_replace("/(File:|(http|https):\/\/(commons|en|es).wiki(m|p)edia.org\/(wiki\/|w\/index\.php\?title=)File:)/", "", $filer);
                    $p3s = "<a href='//commons.wikimedia.org/wiki/File:" . rawurlencode(str_replace(" " , "_", $file)) . "' target='_blank'>https://commons.wikimedia.org/wiki/File:" . str_replace(" " , "_", $file) . "</a>";
                    $p3sm = "https:%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile:" . rawurlencode(str_replace(" " , "_", $file));
                    $subj = "liberación de " . $file;
                    break;
                case "2":
                    $p3s = $p3sm = "anexado a este correo electrónico";
                    $subj = "liberación de contenido anexado a este correo electrónico";
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
                    $p2s = "el trabajo multimedia";
                    break;
                case "2":
                    $p2s = "el trabajo representado en el fichero multimedia";
                    break;
                case "3":
                    $p2s = "tanto el trabajo representado como el fichero multimedia";
                    break;
            }
            $b1 = "Por este medio afirmo que yo$p1s el creador y/u único dueño del copyright exclusivo de $p2s $p3s.";
            $b1m = "Por este medio afirmo que yo$p1s el creador y/o único dueño del copyright exclusivo de $p2s $p3sm.";
            $b2 = "Estoy de acuerdo en publicar el trabajo arriba mencionado baijo la licencia $license.";
            $b3 = "Reconozco que haciendo esto concedo a cualquiera el derecho de utilizar el trabajo, incluso en un producto comercial o de otra manera, y a modificarlo según sus necesidades, a condición de que mantengan las condiciones de la licencia y cualquier otras leyes aplicables.";
            $b4 = "Soy consciente que este acuerdo no está limitado a Wikipedia o a sus sitios relacionados.";
            if ($license != "Creative Commons CC0 1.0 Universal (dominio público)") {
                $b5 = "<br />Soy consciente de que el titular del copyright siempre retiene la propiedad de los derechos de autor así como el derecho a ser atribuído de acuerdo con la licencia escogida. Las modificaciones que otros hagan al trabajo no serán atribuídas al titular de los derechos de autor.";
                $b5m = "%0ASoy consciente de que el titular del copyright siempre retiene la propiedad de los derechos de autor así como el derecho a ser atribuído de acuerdo con la licencia escogida. Las modificaciones que otros hagan al trabajo no serán atribuídas al titular de los derechos de autor.";
            }
            $b6 = "Reconozco que no puedo retirar este acuerdo, y que el contenido puede, o no, ser mantenido permanentemente en un proyecto Wikimedia.";
            $tracking = "[generado usando relgen]";
            echo "<div class='bg-success' style='padding:8px;'>$b1<br />$b2<br />$b3<br />$b4$b5<br />$b6<br /><br />$name$p1s_<br />" . date("Y-m-d") . "<br /><br />$tracking</div>";
          ?>
          <br /><br />
        </div>
        <div class="col-md-4">
          <a role="button" href="mailto:permissions-es@wikimedia.org?subject=<?=$subj?>&amp;body=<?=$b1m?>%0A<?=$b2?>%0A<?=$b3?>%0A<?=$b4?><?=$b5m?>%0A<?=$b6?>%0A%0A<?=$name?><?=$p1s_m?>%0A<?=date('Y-m-d')?>%0A%0A<?=$tracking?>" class="btn btn-default btn-block" style="width:100%;">crear correo de liberación</a>
        </div>
        <?php
            } else {
                if ($name == "") echo "<p class='text-danger'>Error: No se indicó el nombre.</p>";
                if (($s1 == "2") && (($rep == "") || ($auth == ""))) echo "<p class='text-danger'>Error: No se indicó el titular de los derechos de autor y/o autoridad.</p>";
                if (($s2 != "2") && ($filer == "")) echo "<p class='text-danger'>Error: No se indicó el nombre de fichero.</p>";
                if ($license == "") echo "<p class='text-danger'>Error: No se indicó la licencia.</p>";
            }
        ?>
        <br />
      </div>
    </div>
  </body>
</html>
