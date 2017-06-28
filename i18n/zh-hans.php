<?php
    if (isset($_GET['source'])) {show_source(__FILE__); exit();}
    /**
     * @author Stöger Florian D. M. (http://fdms.eu; zh-hans translation by Alexander Misel)
     * @license EUPL 1.1 (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf)
     * @copyright © (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf) Stöger Florian D. M. (http://fdms.eu; zh-hans translation by Alexander Misel)
     */
?>
<!DOCTYPE HTML>
<html lang="zh-hans">
  <head>
    <title>维基媒体 OTRS 授权信生成器</title>
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
        $relgen = "0.9.9";
        $lang = "zh-hans";
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
      <h1>维基媒体 OTRS 授权信生成器 <small><a id="meta" tabindex="0" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="由<a href='//meta.wikimedia.org/wiki/User:FDMS4' target='_blank'>FDMS</a>建立运行<br />©（<a href='//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf' target='_blank'>EUPL 1.1</a>）<a href='http://fdms.eu' target='_blank'>Stöger Florian D. M.</a><br />(zh-hans translation by Alexander Misel)" style="color:#777;"><?=$relgen?></a></small></h1>
  
      <form method="post" action="//tools.wmflabs.org/relgen/i18n/zh-hans.php">

        <div id="s0" class="row hof"> <!-- step 0 -->
          <br /><br />
          <div class="col-md-7">
          <a role="button" href="#s1" class="btn btn-primary btn-lg btn-block smsc nt">开始</a>
          <input type="hidden" name="trn" value="<?=$lang?>" />
          <input type="hidden" name="starttime" value="<?=$starttime?>" />
          <input type="hidden" name="result" value="1" />
          </div><br />
        </div>

        <div id="s1" class="row hof"> <!-- step 1 -->
          <br />
          步骤 1/5 [ <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+1" target="_blank">说明</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">反馈</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#iam').show();$('#irep').hide();$('#idk').hide();"><input type="radio" id="s11" name="s1" value="1" />我是著作权人</label>
              <label class="btn btn-default btn-block" onclick="$('#iam').show();$('#irep').show();$('#idk').hide();"><input type="radio" id="s12" name="s1" value="2" />我代表著作权人</label>
              <label class="btn btn-default btn-block" onclick="$('#iam').hide();$('#irep').hide();$('#idk').show();"><input type="radio" id="s13" name="s1" value="" />我不知道著作权人是谁</label>
            </div>
            <br />
            <p>一件多媒体作品的著作权人指的是<b>创造该作品的人</b>（如摄影者、设计者、画家等），除非其著作权已经由法律或合约操作进行转移。</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iam">
              我的姓名<br /><div id="s1fg1" class="form-group"><input id="namei" type="text" name="name" value="<?php echo $name;?>" placeholder="王志明 (必填)" class="form-control" /></div>
              <div style="display:none;" id="irep">
                <br />
                著作权人<br /><div id="s1fg2" class="form-group"><input id="repi" type="text" name="rep" value="<?php echo $rep;?>" placeholder="王牌企业 / 李春娇 (必填)" class="form-control" /></div>
                <br />
                我的职权<br /><div id="s1fg3" class="form-group"><input id="authi" type="text" name="auth" value="<?php echo $auth;?>" placeholder="执行长、指定代表等 (必填)" class="form-control" /></div>
              </div>
              <br /><br />
              <a role="button" class="btn btn-primary btn-block nt" onclick="s1v()">前进至下一步</a>
            </div>
            <div style="display:none;" id="idk">
              <p class="text-danger">维基媒体 OTRS 不能接受您的发布授权——请向<a href="//commons.wikimedia.org/wiki/Commons:OTRS#notch">该作品的著作权持有人联系</a>。</p>
            </div>
          </div>
          <br />
        </div>

        <div id="s2" class="row hof"> <!-- step 2 -->
          <br />
          步骤 2/5 [ <a href="#s1" class="smsc">返回</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+2" target="_blank">说明</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">反馈</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#iup').show();$('#iatt').show();"><input type="radio" id="s21" name="s2" value="1" />我或其他人已经将文件上传至维基共享资源</label>
              <label class="btn btn-default btn-block" onclick="$('#iup').hide();$('#iatt').show();"><input type="radio" id="s22" name="s2" value="2" />我将会在电子邮件中附上文件</label>
            </div>
            <br />
            <p>如果您还没有上传文件到维基共享资源，请使用<a href="//commons.wikimedia.org/wiki/Special:UploadWizard" target="_blank"><b>上传精灵</b></a>进行上传。</p>
            <p>为了防止您的文件在维基媒体 OTRS 团队审核前遭到删除，您可能需要在该文件的描述页面增加 <b><samp>{{subst:OP}}</samp></b> 文字。</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iatt">
              <div style="display:none;" id="iup">
                维基共享资源的文件名<br /><input type="text" name="filer" placeholder="例子.jpg (必填)" class="form-control" />
                <br /><br />
              </div>
              <a role="button" href="#s3" class="btn btn-primary btn-block smsc nt">前进至下一步</a>
            </div>
          </div>
          <br />
        </div>

        <div id="s3" class="row hof"> <!-- step 3 -->
          <br />
          步骤 3/5 [ <a href="#s2" class="smsc">返回</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+3" target="_blank">说明</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">反馈</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s31" name="s3" value="1" />我要发布媒体作品</label>
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s32" name="s3" value="2" />我要发布从某个媒体作品当中所创作的作品</label>
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s33" name="s3" value="3" />我要发布媒体作品与从其作品当中创作的作品</label>
            </div>
            <br />
            <p>如果您的作品是从某人的作品以复杂方式进行创作或将某人的作品包含其中，那么该作品就是一件<a href="//commons.wikimedia.org/wiki/Commons:Derivative_works" target="_blank"><b>衍生作品</b></a>，一般必须要提供该作品与其原始作品的著作权人发布许可。</p>
            <p>在部分国家（中华人民共和国就在其列），由于有<a href="//commons.wikimedia.org/wiki/Commons:Freedom_of_panorama" target="_blank"><b>「室外公共场合摄影、绘图之自由」</b></a>的例外，建筑物或其他永久公开展示的作品可不用提供原始著作权人发布许可。</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="i3">
              <a role="button" href="#s4" class="btn btn-primary btn-block smsc nt">前进至下一步</a>
            </div>
          </div>
          <br />
        </div>

        <div id="s4" class="row hof"> <!-- step 4 -->
          <br />
          步骤 4/5 [ <a href="#s3" class="smsc">返回</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+4" target="_blank">说明</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">反馈</a> ]
          <br /><br />
          <div class="col-md-7">
            <p>我同意将上述提到的内容以下列自由许可协议发布：</p>
            <div id="s4fg" class="form-group"><div class="input-group">
              <input id="licensei" type="text" name="license" value="创用CC 姓名标示-相同方式分享 4.0 国际版（CC BY-SA 4.0）" class="form-control" />
              <div class="input-group-btn">
                <a role="button" data-toggle="dropdown" class="btn btn-default"><span class="caret" /></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a onclick="$('#licensei').val('知识共享 署名-相同方式分享 4.0 国际版（CC BY-SA 4.0）'); $('#iawattr').show();">知识共享 署名-相同方式分享 4.0 国际版（CC BY-SA 4.0）</a></li>
                  <li><a onclick="$('#licensei').val('知识共享 署名 4.0 国际版（CC BY 4.0）'); $('#iawattr').show();">知识共享 署名 4.0 国际版（CC BY 4.0）</a></li>
                  <li><a onclick="$('#licensei').val('知识共享 CC0 1.0 通用版'); $('#iawattr').hide();">知识共享 CC0 1.0 通用版（贡献至公有领域）</a></li>
                </ul>
                <a role="button" href="//commons.wikimedia.org/wiki/Commons:First_steps/License_selection" target="_blank" class="btn btn-default">
                  <span class="glyphicon glyphicon-question-sign" />
                </a>
              </div>
            </div></div>
            <p>我明白当我以上述授权发布后，我便允许任何人在其他授权以及法律的限制下，对本作品进行商业或其他的再制使用、或根据他们的需求任意修改。</p>
            <p>我了解这样的授权并不仅限于维基百科以及其他相关站点之内。</p>
            <p id="iawattr">我了解根据我所选的许可协议，著作权人始终保有著作权以及署名的权利。其他人对本作品的修改并不是我著作权的范围。</p>
            <p>我了解我不能撤回这项协议，而这份授权作品可能会永久保存于维基媒体计划中，但也可能无法永久保存于维基媒体计划中。</p>
            <br />
            <button type="button" class="btn btn-default btn-block" data-toggle="button" onclick="$('#iag').toggle();">我同意</button>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iag">
              <a role="button" class="btn btn-primary btn-block nt" onclick="s4v()">前进至下一步</a>
            </div>
          </div>
          <br />
        </div>

      </form> <!-- result -->
      <div id="result" class="row hof">
        <br />
        步骤 5/5 [ <a href="#s1" class="smsc">从头开始</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+5" target="_blank">说明</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">反馈</a> ]
        <br /><br />
        <?php if (($s1 != "") && ($name != "") && !(($s1 == "2") && (($rep == "") || ($auth == ""))) && ($s2 != "") && !(($s2 == "1") && ($filer == "")) && ($s3 != "") && ($license != "")) {
          $stats = fopen("../stats/" . date('Y') . ".csv", "a");
          fputcsv($stats, array (date("m-d"), $starttime, date("H:i:s"), $trn), ";");
          fclose($stats);
        ?>
        <div class="col-md-7">
          <p>如果您有安装电子邮件客户端，只要<b>点击右侧的按钮</b>，就会建立一封发布授权电子邮件。如果没有安装 (或点击过后没有反应)，请手动复制下方绿色方块中的文字，贴到您的电子邮件中，寄到 <a href="mailto:permissions-zh@wikimedia.org">permissions-zh@wikimedia.org</a>。</p>
          <p>这封电子邮件应当要从<b>与其发布作品内容有相关并可以辨识出来的电子邮件地址</b>寄送出去。举例，如果您所发布的图像于某个网站中展示，您的电子邮件地址应当与该网站或列于该网站的联络信息页面有所关连；如果您发布的图像代表某个组织，您的电子邮件地址应当为该组织的官方电子邮件地址。</p>
          <br />
          <?php
            if ($s1 == "1") {
                $p1s = "为${name}，即";
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
                    $p2s = "本衍生作品";
                    break;
                case "3":
                    $p2s = "本作品与其衍生作品";
                    break;
            }
            if ($s2 == "1") {
                $file = preg_replace("/(File:|(http|https):\/\/(commons|zh).wiki(m|p)edia.org\/(wiki\/|w\/index\.php\?title=)File:)/", "", $filer);
                $p3s = "<a href='//commons.wikimedia.org/wiki/File:" . rawurlencode(str_replace(" " , "_", $file)) . "' target='_blank'>https://commons.wikimedia.org/wiki/File:" . str_replace(" " , "_", $file) . "</a>";
                $p3sm = "https:%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile:" . rawurlencode(str_replace(" " , "_", $file));
                $subj = $file;
            } else {
                $p3s = $p3sm = "本封电子邮件之附件";
                $subj = "发布";
            }
            $b1 = "我在此确认自己${p1s}${p2s}（${p3s}）的创作者或著作权唯一持有者。";
            $b1m = "我在此确认自己${p1s}${p2s}（${p3sm}）的创作者或著作权唯一持有者。";
            $b2 = "我同意以「${license}」这一开放授权发布该作品。";
            $b3 = "我明白当我以上述授权发布后，我便允许任何人在其他授权以及法律的限制下，对本作品进行商业或其他的再制使用、或根据他们的需求任意修改。";
            $b4 = "我了解这样的授权并不仅限于维基百科以及其他相关站点之内。";
            if ($license != "知识共享 CC0 1.0 通用版") {
                $b5 = "<br />我了解根据我所选的许可协议，著作权人始终保有著作权以及署名的权利。其他人对本作品的修改并不是我著作权的范围。";
                $b5m = "%0A我了解根据我所选的许可协议，著作权人始终保有著作权以及署名的权利。其他人对本作品的修改并不是我著作权的范围。";
            }
            $b6 = "我了解我不能撤回这项协议，而这份授权作品可能会永久保存于维基媒体计划中，但也可能无法永久保存于维基媒体计划中。";
            $tracking = "[由 relgen 产生]";
            echo "<div class='bg-success' style='padding:8px;'>$b1<br />$b2<br />$b3<br />$b4$b5<br />$b6<br /><br />$name$p1s_<br />" . date("Y-m-d") . "<br /><br />$tracking</div>";
          ?>
          <br /><br />
        </div>
        <div class="col-md-4">
          <a role="button" href="mailto:permissions-zh@wikimedia.org?subject=<?=$subj?>&amp;body=<?=$b1m?>%0A<?=$b2?>%0A<?=$b3?>%0A<?=$b4?><?=$b5m?>%0A<?=$b6?>%0A%0A<?=$name?><?=$p1s_m?>%0A<?=date('Y-m-d')?>%0A%0A<?=$tracking?>" class="btn btn-default btn-block" style="width:100%;">建立发布电子邮件</a>
        </div>
        <?php
            } else {
                if ($name == "") echo "<p class='text-danger'>错误：没有填入姓名！</p>";
                if (($s1 == "2") && (($rep == "") || ($auth == ""))) echo "<p class='text-danger'>错误：没有填入著作权人或职权！</p>";
                if (($s2 == "1") && ($filer == "")) echo "<p class='text-danger'>错误：没有填入文件名！</p>";
                if ($license == "") echo "<p class='text-danger'>错误：没有许可协议！</p>";
            }
        ?>
        <br />
      </div>
    </div>
  </body>
</html>
