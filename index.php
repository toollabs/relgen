<?php
    if (isset($_GET['source'])) {show_source(__FILE__); exit();}
    /**
     * @author Stöger Florian D. M. (//fdms.eu)
     * @license EUPL 1.1 (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf)
     * @copyright © (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf) Stöger Florian D. M. (//fdms.eu)
     */
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Wikimedia OTRS release generator</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="//tools-static.wmflabs.org/cdnjs/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <style>
      p {
          background-color:white;
      }
      .hof {
          height:100vh;
          overflow-y:auto;
      }
    </style>
    <script type="text/javascript" src="//tools-static.wmflabs.org/cdnjs/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="//tools-static.wmflabs.org/cdnjs/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
          $("a.smsc").on('click', function(event) {
              event.preventDefault();
              var hash = this.hash;
              $('html, body').animate({
                  scrollTop: $(hash).offset().top
              }, 400);
          });
          $("#meta").popover({
              html:true,
          });
          $("form").on('keyup keypress', function(e) {
              if (e.keyCode == 13) {
                  e.preventDefault();
              }
          });
          $(".nt").on('keydown', function(e) {
              if (e.keyCode == 9) {
                  e.preventDefault()
              }
          });
      });
    </script>
  </head>
  <body style="background: url('bg.png') no-repeat fixed right bottom; overflow:hidden;">

    <?php
        if ($_POST['submit'] == "generate the release") {
            ?>
            <script type="text/javascript">
            $(function() {
                $('html, body').animate({
                    scrollTop: $(result).offset().top
                }, 400);
            });
            </script>
            <?php
        }
        
        $name = $rep = $auth = $file = $license = $s1 = $s2 = $s3 = $s4 = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = test_input($_POST["name"]);
            $rep = test_input($_POST["rep"]);
            $auth = test_input($_POST["auth"]);
            $file = test_input($_POST["file"]);
            $license = test_input($_POST["license"]);
            $s1 = test_input($_POST["s1"]);
            $s2 = test_input($_POST["s2"]);
            $s3 = test_input($_POST["s3"]);
            $s4 = test_input($_POST["s4"]);
        }
        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

    <div class="container">
      <h1>Wikimedia OTRS release generator <small><a id="meta" tabindex="0" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="created and maintained by <a href='//meta.wikimedia.org/wiki/User:FDMS4' target='_blank'>FDMS</a><br />© (<a href='//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf' target='_blank'>EUPL 1.1</a>) <a href='//fdms.eu' target='_blank'>Stöger Florian D. M.</a" style="color:#777;">0.9.6</a></small></h1>
  
      <form method="post" action="//tools.wmflabs.org/relgen/index.php">

        <div id="s0" class="row hof"> <!-- step 0 -->
          <br /><br />
          <div class="col-md-7">
          <a role="button" href="#s1" class="btn btn-primary btn-lg btn-block smsc nt">start</a>
          </div><br />
        </div>

        <div id="s1" class="row hof"> <!-- step 1 -->
          <br />
          step 1 of 4 [ <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+1" target="_blank">help</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">feedback</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#iam').show();$('#irep').hide();$('#idk').hide();"><input type="radio" id="s11" name="s1" value="1" />I am the copyright holder</label>
              <label class="btn btn-default btn-block" onclick="$('#iam').show();$('#irep').show();$('#idk').hide();"><input type="radio" id="s12" name="s1" value="2" />I represent the copyright holder</label>
              <label class="btn btn-default btn-block" onclick="$('#iam').hide();$('#irep').hide();$('#idk').show();"><input type="radio" id="s13" name="s1" value="" />I don't know the copyright holder</label>
            </div>
            <br />
            <p>The copyright holder of a media work is the <b>person who created it</b> (photographer, designer, painter, …), unless the copyright was explicitly transferred by an operation of law or contract.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iam">
              my name<br /><input type="text" name="name" value="<?php echo $name;?>" placeholder="John Doe (required)" class="form-control" />
              <div style="display:none;" id="irep">
                <br />
                copyright holder<br /><input type="text" name="rep" value="<?php echo $rep;?>" placeholder="Ace Inc. / Jane Roe (required)" class="form-control" />
                <br />
                my authority<br /><input type="text" name="auth" value="<?php echo $auth;?>" placeholder="CEO, appointed representative, … (required)" class="form-control" />
              </div>
              <br /><br />
              <a role="button" href="#s2" class="btn btn-primary btn-block smsc nt">proceed to the next step</a>
            </div>
            <div style="display:none;" id="idk">
              <p class="text-danger">Wikimedia OTRS cannot accept a release from you – please <a href="//commons.wikimedia.org/wiki/Commons:OTRS#If_you_are_not_the_copyright_holder">reach out to the copyright holder</a> instead.</p>
            </div>
          </div>
          <br />
        </div>

        <div id="s2" class="row hof"> <!-- step 2 -->
          <br />
          step 2 of 4 [ <a href="#s1" class="smsc">back</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+2" target="_blank">help</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">feedback</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#iup').show();$('#iatt').show();"><input type="radio" id="s21" name="s2" value="1" />I or others have already uploaded the file to Wikimedia Commons</label>
              <label class="btn btn-default btn-block" onclick="$('#iup').hide();$('#iatt').show();"><input type="radio" id="s22" name="s2" value="2" />I will attach the file to the eMail</label>
            </div>
            <br />
            <p>Please use the <a href="//commons.wikimedia.org/wiki/Special:UploadWizard" target="_blank"><b>UploadWizard</b></a> to upload the file to Wikimedia Commons if you haven't done so already.</p>
            <p>To prevent the file from getting deleted while your release eMail is awaiting processing by the Wikimedia OTRS team, you may place <b><samp>{{subst:OP}}</samp></b> on the file description page.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iatt">
              <div style="display:none;" id="iup">
                Wikimedia Commons file name (without prefix)<br /><input type="text" name="file" placeholder="Example.jpg (required)" class="form-control" />
                <br /><br />
              </div>
              <a role="button" href="#s3" class="btn btn-primary btn-block smsc nt">proceed to the next step</a>
            </div>
          </div>
          <br />
        </div>

        <div id="s3" class="row hof"> <!-- step 3 -->
          <br />
          step 3 of 4 [ <a href="#s2" class="smsc">back</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+3" target="_blank">help</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">feedback</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s31" name="s3" value="1" />I want to release the media work</label>
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s32" name="s3" value="2" />I want to release the work depicted in the media work</label>
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s33" name="s3" value="3" />I want to release both the work depicted and the media work</label>
            </div>
            <br />
            <p>If the media work depicts or otherwise includes someone else's artwork in a non-trivial manner, it is a <a href="//commons.wikimedia.org/wiki/Commons:Derivative_works" target="_blank"><b>derivative work</b></a> and therefore a seperate release from the copyright holder of the depicted artwork is generally required.</p>
            <p>In some countries, thanks to the <a href="//commons.wikimedia.org/wiki/Commons:Freedom_of_panorama" target="_blank"><b>freedom of panaroma</b></a> exeption, architecture and other artwork on permanent public display are exempted from this requirement. In the United States, only architecture is exempted.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="i3">
              <a role="button" href="#s4" class="btn btn-primary btn-block smsc nt">proceed to the next step</a>
            </div>
          </div>
          <br />
        </div>

        <div id="s4" class="row hof"> <!-- step 4 -->
          <br />
          step 4 of 4 [ <a href="#s3" class="smsc">back</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+4" target="_blank">help</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">feedback</a> ]
          <br /><br />
          <div class="col-md-7">
            <p>I agree to publish the above-mentioned content under the following free license:</p>
            <input type="text" name="license" value="Creative Commons Attribution-Share Alike 4.0 International" class="form-control" /><br />
            <p>I acknowledge that by doing so I grant anyone the right to use the work, even in a commercial product or otherwise, and to modify it according to their needs, provided that they abide by the terms of the license and any other applicable laws.<br />I am aware that this agreement is not limited to Wikipedia or related sites.<br />I am aware that the copyright holder always retains ownership of the copyright as well as the right to be attributed in accordance with the license chosen. Modifications others make to the work will not be claimed to have been made by the copyright holder.<br />I acknowledge that I cannot withdraw this agreement, and that the content may or may not be kept permanently on a Wikimedia project.</p>
            <br />
            <button type="button" class="btn btn-default btn-block" data-toggle="button" onclick="$('#iag').toggle();">confirm</button>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iag">
              <input type="submit" name="submit" value="generate the release" class="btn btn-success btn-block nt" />
            </div>
          </div>
          <br />
        </div>

      </form> <!-- result -->
      <div id="result" class="row hof">
        <br />
        result [ <a href="#s1" class="smsc">start over</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+result" target="_blank">help</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">feedback</a> ]
        <br /><br />
        <?php if (($s1 != "") && ($name != "") && !(($s1 == "2") && (($rep == "") || ($auth == ""))) && ($s2 != "") && !(($s2 == "1") && ($file == "")) && ($s3 != "") && ($license != "")) {
        ?>
        <div class="col-md-7">
          <p>If you have an eMail client installed, just <b>click the button</b> to create the release eMail. If not (or nothing happens when you click the button), manually copy-and-paste the text in the green box below into an eMail to <a href="mailto:permissions-commons@wikimedia.org">permissions-commons@wikimedia.org</a>.</p>
          <p>The eMail should come from an <b>eMail address that we can recognise as associated with the content being released</b>. For instance, if you are releasing images shown on a website, your eMail address should be associated with the website or listed on the contact page of the website; if you are releasing images on behalf of an organisation, your eMail address should be an official address of the organisation.</p>
          <br />
          <?php
            if ($s1 == "1") {
                $p1s = ", $name, am";
            } else {
                $p1s = " represent $rep,";
                $p1s_ = "<br />$auth of $rep";
                $p1s_m = "%0A$auth of $rep";
            }
            switch ($s3) {
                case "1":
                    $p2s = "the media work";
                    break;
                case "2":
                    $p2s = "the work depicted in the media";
                    break;
                case "3":
                    $p2s = "both the work depicted and the media";
                    break;
            }
            if ($s2 == "1") {
                $p3s = "<a href='//commons.wikimedia.org/wiki/File:" . rawurlencode(str_replace(" " , "_", $file)) . "' target='_blank'>https://commons.wikimedia.org/wiki/File:" . str_replace(" " , "_", $file) . "</a>";
                $p3sm = "https:%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile:" . rawurlencode(str_replace(" " , "_", $file));
                $subj = $file;
            } else {
                $p3s = $p3sm = "attached to this eMail";
                $subj = "release";
            }
            $b1 = "I hereby affirm that I$p1s the creator and/or sole owner of the exclusive copyright of $p2s $p3s.";
            $b1m = "I hereby affirm that I$p1s the creator and/or sole owner of the exclusive copyright of $p2s $p3sm.";
            $b2 = "I agree to publish the above-mentioned work under the $license.";
            $b3 = "I acknowledge that by doing so I grant anyone the right to use the work, even in a commercial product or otherwise, and to modify it according to their needs, provided that they abide by the terms of the license and any other applicable laws.";
            $b4 = "I am aware that this agreement is not limited to Wikipedia or related sites.";
            $b5 = "I am aware that the copyright holder always retains ownership of the copyright as well as the right to be attributed in accordance with the license chosen. Modifications others make to the work will not be claimed to have been made by the copyright holder.";
            $b6 = "I acknowledge that I cannot withdraw this agreement, and that the content may or may not be kept permanently on a Wikimedia project.";
            $tracking = "[generated using relgen v0.9.6]";
            echo "<div class='bg-success' style='padding:8px;'>$b1<br />$b2<br />$b3<br />$b4<br />$b5<br />$b6<br /><br />$name$p1s_<br />" . date('Y-m-d', time()) . "<br /><br />$tracking</div>";
          ?>
          <br /><br />
        </div>
        <div class="col-md-4">
          <a role="button" href="mailto:permissions-commons@wikimedia.org?subject=<?=$subj?>&amp;body=<?=$b1m?>%0A<?=$b2?>%0A<?=$b3?>%0A<?=$b4?>%0A<?=$b5?>%0A<?=$b6?>%0A%0A<?=$name?><?=$p1s_m?>%0A<?=date('Y-m-d', time())?>%0A%0A<?=$tracking?>" class="btn btn-default" style="width:100%;">create release eMail</a>
        </div>
        <?php
            } else {
                if ($name == "") echo "<p class='text-danger'>Error: No name specified!</p>";
                if (($s1 == "2") && (($rep == "") || ($auth == ""))) echo "<p class='text-danger'>Error: No copyright holder and/or authority specified!</p>";
                if (($s2 == "1") && ($file == "")) echo "<p class='text-danger'>Error: No file name specified!</p>";
                if ($license == "") echo "<p class='text-danger'>Error: No license specified!</p>";
            }
        ?>
        <br />
      </div>
    </div>
  </body>
</html>
