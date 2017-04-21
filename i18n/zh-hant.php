<?php
    if (isset($_GET['source'])) {show_source(__FILE__); exit();}
    /**
     * @author Stöger Florian D. M. (http://fdms.eu; zh-hant translation by Taiwania)
     * @license EUPL 1.1 (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf)
     * @copyright © (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf) Stöger Florian D. M. (http://fdms.eu; zh-hant translation by Taiwania)
     */
?>
<!DOCTYPE HTML>
<html lang="zh-Hant">
  <head>
    <title>維基媒體 OTRS 釋出信產生器</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="//tools-static.wmflabs.org/cdnjs/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="//tools-static.wmflabs.org/static/jquery-ui/1.11.1/jquery-ui.css">
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
        $relgen = "0.9.9";
        $lang = "zh-hant";
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
      <h1>維基媒體 OTRS 釋出信產生器 <small><a id="meta" tabindex="0" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="由<a href='//meta.wikimedia.org/wiki/User:FDMS4' target='_blank'>FDMS</a>建立運營<br />©（<a href='//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf' target='_blank'>EUPL 1.1</a>）<a href='http://fdms.eu' target='_blank'>Stöger Florian D. M.</a><br />(zh-hant translation by Taiwania)" style="color:#777;"><?=$relgen?></a></small></h1>
  
      <form method="post" action="//tools.wmflabs.org/relgen/i18n/zh-hant.php">

        <div id="s0" class="row hof"> <!-- step 0 -->
          <br /><br />
          <div class="col-md-7">
          <a role="button" href="#s1" class="btn btn-primary btn-lg btn-block smsc nt">開始</a>
          <input type="hidden" name="trn" value="<?=$lang?>" />
          <input type="hidden" name="starttime" value="<?=$starttime?>" />
          <input type="hidden" name="result" value="1" />
          </div><br />
        </div>

        <div id="s1" class="row hof"> <!-- step 1 -->
          <br />
          步驟 1/5 [ <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+1" target="_blank">說明</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">回饋</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#iam').show();$('#irep').hide();$('#idk').hide();"><input type="radio" id="s11" name="s1" value="1" />我是著作權持有者</label>
              <label class="btn btn-default btn-block" onclick="$('#iam').show();$('#irep').show();$('#idk').hide();"><input type="radio" id="s12" name="s1" value="2" />我代表著作權持有者</label>
              <label class="btn btn-default btn-block" onclick="$('#iam').hide();$('#irep').hide();$('#idk').show();"><input type="radio" id="s13" name="s1" value="" />我不知道著作權持有者是誰</label>
            </div>
            <br />
            <p>一件多媒體作品的著作權持有者指的是<b>創造該作品的人</b>（如攝影者、設計者、畫家等），除非其著作權已經由法律或合約操作進行轉移。</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iam">
              我的姓名<br /><div id="s1fg1" class="form-group"><input id="namei" type="text" name="name" value="<?php echo $name;?>" placeholder="王志明 (必填)" class="form-control" /></div>
              <div style="display:none;" id="irep">
                <br />
                著作權持有者<br /><div id="s1fg2" class="form-group"><input id="repi" type="text" name="rep" value="<?php echo $rep;?>" placeholder="王牌企業 / 李春嬌 (必填)" class="form-control" /></div>
                <br />
                我的職權<br /><div id="s1fg3" class="form-group"><input id="authi" type="text" name="auth" value="<?php echo $auth;?>" placeholder="執行長、指定代表等 (必填)" class="form-control" /></div>
              </div>
              <br /><br />
              <a role="button" class="btn btn-primary btn-block nt" onclick="s1v()">前進至下一步</a>
            </div>
            <div style="display:none;" id="idk">
              <p class="text-danger">維基媒體 OTRS 不能接受您的釋出授權——請向<a href="//commons.wikimedia.org/wiki/Commons:OTRS#notch">該作品的著作權持有人聯繫</a>。</p>
            </div>
          </div>
          <br />
        </div>

        <div id="s2" class="row hof"> <!-- step 2 -->
          <br />
          步驟 2/5 [ <a href="#s1" class="smsc">返回</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+2" target="_blank">說明</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">回饋</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#iup').show();$('#iatt').show();"><input type="radio" id="s21" name="s2" value="1" />我或其他人已經將檔案上傳至維基共享資源</label>
              <label class="btn btn-default btn-block" onclick="$('#iup').hide();$('#iatt').show();"><input type="radio" id="s22" name="s2" value="2" />我將會在電子郵件中附上檔案</label>
            </div>
            <br />
            <p>如果您還沒有上傳檔案到維基共享資源，請使用<a href="//commons.wikimedia.org/wiki/Special:UploadWizard" target="_blank"><b>上傳精靈</b></a>進行上傳。</p>
            <p>為了防止您的檔案在維基媒體 OTRS 團隊審核前遭到刪除，您可能需要在該檔案的描述頁面增加 <b><samp>{{subst:OP}}</samp></b> 文字。</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iatt">
              <div style="display:none;" id="iup">
                維基共享資源的檔案名稱<br /><input type="text" name="filer" placeholder="範例.jpg (必填)" class="form-control" />
                <br /><br />
              </div>
              <a role="button" href="#s3" class="btn btn-primary btn-block smsc nt">前進至下一步</a>
            </div>
          </div>
          <br />
        </div>

        <div id="s3" class="row hof"> <!-- step 3 -->
          <br />
          步驟 3/5 [ <a href="#s2" class="smsc">返回</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+3" target="_blank">說明</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">回饋</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s31" name="s3" value="1" />我要釋出媒體作品</label>
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s32" name="s3" value="2" />我要釋出從某個媒體作品當中所創作的作品</label>
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s33" name="s3" value="3" />我要釋出媒體作品與從其作品當中創作的作品</label>
            </div>
            <br />
            <p>如果您的作品是從某人的作品以複雜方式進行創作或將某人的作品包含其中，那麼該作品就是一件<a href="//commons.wikimedia.org/wiki/Commons:Derivative_works" target="_blank"><b>衍生創作作品</b></a>，一般必須要提供該作品與其原始作品的著作權持有者釋出許可。</p>
            <p>在部分國家，由於有<a href="//commons.wikimedia.org/wiki/Commons:Freedom_of_panorama" target="_blank"><b>「室外公共場合攝影、繪圖之自由」</b></a>的例外，建築物或其他永久公開展示的作品可不用提供原始著作權持有者釋出許可。在美國，只有建築物不需要提供原始著作權持有者的許可。在臺灣，只有繪圖不需要提供原始著作權持有者的許可。</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="i3">
              <a role="button" href="#s4" class="btn btn-primary btn-block smsc nt">前進至下一步</a>
            </div>
          </div>
          <br />
        </div>

        <div id="s4" class="row hof"> <!-- step 4 -->
          <br />
          步驟 4/5 [ <a href="#s3" class="smsc">返回</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+4" target="_blank">說明</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">回饋</a> ]
          <br /><br />
          <div class="col-md-7">
            <p>我同意將上述提到的內容以下列自由授權釋出：</p>
            <div id="s4fg" class="form-group"><div class="input-group">
              <input id="licensei" type="text" name="license" value="創用CC 姓名標示-相同方式分享 4.0 國際版（CC BY-SA 4.0）" class="form-control" />
              <div class="input-group-btn">
                <a role="button" data-toggle="dropdown" class="btn btn-default"><span class="caret" /></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a onclick="$('#licensei').val('創用CC 姓名標示-相同方式分享 4.0 國際版（CC BY-SA 4.0）'); $('#iawattr').show();">創用CC 姓名標示-相同方式分享 4.0 國際版（CC BY-SA 4.0）</a></li>
                  <li><a onclick="$('#licensei').val('創用CC 姓名標示 4.0 國際版（CC BY 4.0）'); $('#iawattr').show();">創用CC 姓名標示 4.0 國際版（CC BY 4.0）</a></li>
                  <li><a onclick="$('#licensei').val('創用CC CC0 1.0 通用版'); $('#iawattr').hide();">創用CC CC0 1.0 通用版（貢獻至公共領域）</a></li>
                </ul>
                <a role="button" href="//commons.wikimedia.org/wiki/Commons:First_steps/License_selection" target="_blank" class="btn btn-default">
                  <span class="glyphicon glyphicon-question-sign" />
                </a>
              </div>
            </div></div>
            <p>我明白當我以上述授權釋出後，我便允許任何人在其他授權以及法律的限制下，對本作品進行商業或其他的再製使用、或根據他們的需求任意修改。</p>
            <p>我理解這樣的授權並不只限於維基百科以及其他相關站臺之內。</p>
            <p id="iawattr">我理解我仍有作品的著作權，而根據我所選擇的授權格式分享。其他人對本作品的修改並不是我著作權的範圍。</p>
            <p>我理解我不能撤回這項協議，而這份授權作品可能會永久保存於維基媒體計畫中，但也可能無法永久保存於維基媒體計畫中。</p>
            <br />
            <button type="button" class="btn btn-default btn-block" data-toggle="button" onclick="$('#iag').toggle();">我同意</button>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iag">
              <a role="button" class="btn btn-primary btn-block nt" onclick="s4v()">前進至下一步</a>
            </div>
          </div>
          <br />
        </div>

      </form> <!-- result -->
      <div id="result" class="row hof">
        <br />
        步驟 5/5 [ <a href="#s1" class="smsc">從頭開始</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+5" target="_blank">說明</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">回饋</a> ]
        <br /><br />
        <?php if (($s1 != "") && ($name != "") && !(($s1 == "2") && (($rep == "") || ($auth == ""))) && ($s2 != "") && !(($s2 == "1") && ($filer == "")) && ($s3 != "") && ($license != "")) {
          $stats = fopen("../stats/" . date('Y') . ".csv", "a");
          fputcsv($stats, array (date("m-d"), $starttime, date("H:i:s"), $trn), ";");
          fclose($stats);
        ?>
        <div class="col-md-7">
          <p>如果您有安裝電子郵件用戶端，只要<b>點選右側的按鈕</b>，就會建立一封釋出授權電子郵件。如果沒有安裝 (或點選過後沒有反應)，請手動複製下方綠色方塊中的文字，貼到您的電子郵件中，寄到 <a href="mailto:permissions-zh@wikimedia.org">permissions-zh@wikimedia.org</a>。</p>
          <p>這封電子郵件應當要從<b>與其釋出作品內容有相關並可以辨識出來的電子郵件位址</b>寄送出去。舉例，如果您所釋出的圖像於某個網站中展示，您的電子郵件位址應當與該網站或列於該網站的聯絡資訊頁面有所關連；如果您釋出的圖像代表某個組織，您的電子郵件位址應當為該組織的官方電子郵件位址。</p>
          <br />
          <?php
            if ($s1 == "1") {
                $p1s = "為${name}，即";
            } else {
                $p1s = "代表${rep}，即";
                $p1s_ = "<br />${rep}的${auth}";
                $p1s_m = "%0A${rep}的${auth}";
            }
            switch ($s3) {
                case "1":
                    $p2s = "本作品";
                    break;
                case "2":
                    $p2s = "本衍生創作作品";
                    break;
                case "3":
                    $p2s = "本作品與其衍生創作作品";
                    break;
            }
            if ($s2 == "1") {
                $file = preg_replace("/(File:|(http|https):\/\/(commons|zh).wiki(m|p)edia.org\/(wiki\/|w\/index\.php\?title=)File:)/", "", $filer);
                $p3s = "<a href='//commons.wikimedia.org/wiki/File:" . rawurlencode(str_replace(" " , "_", $file)) . "' target='_blank'>https://commons.wikimedia.org/wiki/File:" . str_replace(" " , "_", $file) . "</a>";
                $p3sm = "https:%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile:" . rawurlencode(str_replace(" " , "_", $file));
                $subj = $file;
            } else {
                $p3s = $p3sm = "附於本封電子郵件之檔案";
                $subj = "釋出";
            }
            $b1 = "我在此確認自己${p1s}${p2s}（${p3s}）的創作者或著作權唯一持有者。";
            $b1m = "我在此確認自己${p1s}${p2s}（${p3sm}）的創作者或著作權唯一持有者。";
            $b2 = "我同意以「${license}」這一開放授權釋出該作品。";
            $b3 = "我明白當我以上述授權釋出後，我便允許任何人在其他授權以及法律的限制下，對本作品進行商業或其他的再製使用、或根據他們的需求任意修改。";
            $b4 = "我理解這樣的授權並不只限於維基百科以及其他相關站臺之內。";
            if ($license != "創用CC CC0 1.0 通用版") {
                $b5 = "<br />我理解我仍有作品的著作權，而根據我所選擇的授權格式分享。其他人對本作品的修改並不是我著作權的範圍。";
                $b5m = "%0A我理解我仍有作品的著作權，而根據我所選擇的授權格式分享。其他人對本作品的修改並不是我著作權的範圍。";
            }
            $b6 = "我理解我不能撤回這項協議，而這份授權作品可能會永久保存於維基媒體計畫中，但也可能無法永久保存於維基媒體計畫中。";
            $tracking = "[由 relgen 產生]";
            echo "<div class='bg-success' style='padding:8px;'>$b1<br />$b2<br />$b3<br />$b4$b5<br />$b6<br /><br />$name$p1s_<br />" . date("Y-m-d") . "<br /><br />$tracking</div>";
          ?>
          <br /><br />
        </div>
        <div class="col-md-4">
          <a role="button" href="mailto:permissions-zh@wikimedia.org?subject=<?=$subj?>&amp;body=<?=$b1m?>%0A<?=$b2?>%0A<?=$b3?>%0A<?=$b4?><?=$b5m?>%0A<?=$b6?>%0A%0A<?=$name?><?=$p1s_m?>%0A<?=date('Y-m-d')?>%0A%0A<?=$tracking?>" class="btn btn-default btn-block" style="width:100%;">建立釋出電子郵件</a>
        </div>
        <?php
            } else {
                if ($name == "") echo "<p class='text-danger'>錯誤：沒有填入姓名！</p>";
                if (($s1 == "2") && (($rep == "") || ($auth == ""))) echo "<p class='text-danger'>錯誤：沒有填入著作權持有者與/或職權！</p>";
                if (($s2 == "1") && ($filer == "")) echo "<p class='text-danger'>錯誤：沒有填入檔案名稱！</p>";
                if ($license == "") echo "<p class='text-danger'>錯誤：沒有授權條款！</p>";
            }
        ?>
        <br />
      </div>
    </div>
  </body>
</html>
