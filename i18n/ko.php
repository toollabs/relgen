<?php
    if (isset($_GET['source'])) {show_source(__FILE__); exit();}
    /**
     * @author Stöger Florian D. M. (http://fdms.eu) / Translated by Yongmin Hong <https://wp.revi.blog>
     * @license EUPL 1.1 (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf)
     * @copyright © (//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf) Stöger Florian D. M. (http://fdms.eu)
     */
?>
<!DOCTYPE HTML>
<html lang="ko">
  <head>
    <title>위키미디어 OTRS 허가서 생성기</title>
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
        $lang = "ko";
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
      <h1>위키미디어 OTRS 허가서 생성기 <small><a id="meta" tabindex="0" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="<a href='//meta.wikimedia.org/wiki/User:FDMS4' target='_blank'>FDMS</a>에 의해 제작, 관리됨<br />© (<a href='//joinup.ec.europa.eu/sites/default/files/eupl1.1.-licence-en_0.pdf' target='_blank'>EUPL 1.1</a>) <a href='http://fdms.eu' target='_blank'>Stöger Florian D. M.</a><br /><a href='https://wp.revi.blog' target='_blank'>홍 용민</a>이 번역함" style="color:#777;"><?=$relgen?></a></small></h1>
  
      <form method="post" action="//tools.wmflabs.org/relgen/i18n/ko.php">

        <div id="s0" class="row hof"> <!-- step 0 -->
          <br /><br />
          <div class="col-md-7">
          <a role="button" href="#s1" class="btn btn-primary btn-lg btn-block smsc nt">시작하기</a>
          <input type="hidden" name="trn" value="<?=$lang?>" />
          <input type="hidden" name="starttime" value="<?=$starttime?>" />
          <input type="hidden" name="result" value="1" />
          </div><br />
        </div>

        <div id="s1" class="row hof"> <!-- step 1 -->
          <br />
          5단계 중 1단계 [ <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+1" target="_blank">도움말</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">피드백</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#iam').show();$('#irep').hide();$('#idk').hide();"><input type="radio" id="s11" name="s1" value="1" />저작물의 저작권자입니다</label>
              <label class="btn btn-default btn-block" onclick="$('#iam').show();$('#irep').show();$('#idk').hide();"><input type="radio" id="s12" name="s1" value="2" />저작권자를 대표합니다</label>
              <label class="btn btn-default btn-block" onclick="$('#iam').hide();$('#irep').hide();$('#idk').show();"><input type="radio" id="s13" name="s1" value="" />저작권자가 누구인지 모릅니다</label>
            </div>
            <br />
            <p>저작물의 저작권자는 (저작권이 법률상 이유나 계약에 의해 이전되지 않은 한) <b>저작물을 만든 사람</b>(사진사, 디자이너, 화가)을 말합니다.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iam">
              이름<br /><div id="s1fg1" class="form-group"><input id="namei" type="text" name="name" value="<?php echo $name;?>" placeholder="홍길동 (필수)" class="form-control" /></div>
              <div style="display:none;" id="irep">
                <br />
                저작권자<br /><div id="s1fg2" class="form-group"><input id="repi" type="text" name="rep" value="<?php echo $rep;?>" placeholder="둘리 주식회사 / 고길동 (필수)" class="form-control" /></div>
                <br />
                나의 권한<br /><div id="s1fg3" class="form-group"><input id="authi" type="text" name="auth" value="<?php echo $auth;?>" placeholder="CEO, 대리인, … (필수)" class="form-control" /></div>
              </div>
              <br /><br />
              <a role="button" class="btn btn-primary btn-block nt" onclick="s1v()">다음 단계로 넘어가기</a>
            </div>
            <div style="display:none;" id="idk">
              <p class="text-danger">위키미디어 OTRS는 귀하의 허가 선언문을 승낙할 수 없습니다 – <a href="//commons.wikimedia.org/wiki/Commons:OTRS#notch">저작권자에게 연락해 주세요</a>.</p>
            </div>
          </div>
          <br />
        </div>

        <div id="s2" class="row hof"> <!-- step 2 -->
          <br />
          5단계 중 2단계 [ <a href="#s1" class="smsc">돌아가기</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+2" target="_blank">도움말</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">피드백</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#iup').show();$('#iatt').show();"><input type="radio" id="s21" name="s2" value="1" />나, 또는 다른 사람이 이미 파일을 위키미디어 공용에 업로드했습니다.</label>
              <label class="btn btn-default btn-block" onclick="$('#iup').hide();$('#iatt').show();"><input type="radio" id="s22" name="s2" value="2" />이메일에 파일을 첨부하겠습니다.</label>
            </div>
            <br />
            <p>파일을 업로드하지 않았다면 <a href="//commons.wikimedia.org/wiki/Special:UploadWizard" target="_blank"><b>파일 업로드 마법사</b></a>를 사용해 파일을 업로드해 주세요.</p>
            <p>허가 이메일이 처리되는 도중에 삭제되는 일을 방지하려면 <b><samp>{{subst:OP}}</samp></b> 틀을 파일 설명 문서에 입력하면 됩니다.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iatt">
              <div style="display:none;" id="iup">
                위키미디어 공용 파일 이름<br /><input type="text" name="filer" placeholder="Example.jpg (필수)" class="form-control" />
                <br /><br />
              </div>
              <a role="button" href="#s3" class="btn btn-primary btn-block smsc nt">다음 단계로 넘어가기</a>
            </div>
          </div>
          <br />
        </div>

        <div id="s3" class="row hof"> <!-- step 3 -->
          <br />
          5단계 중 3단계 [ <a href="#s2" class="smsc">돌아가기</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+3" target="_blank">도움말</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">피드백</a> ]
          <br /><br />
          <div class="col-md-7">
            <div class="button" data-toggle="buttons">
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s31" name="s3" value="1" />파일의 사용을 허가하고자 합니다</label>
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s32" name="s3" value="2" />파일에 나타난 저작물의 사용을 허가하고자 합니다</label>
              <label class="btn btn-default btn-block" onclick="$('#i3').show();"><input type="radio" id="s33" name="s3" value="3" />파일과 파일에 나타난 저작물 둘 다의 사용을 허가하고자 합니다</label>
            </div>
            <br />
            <p>저작물에 다른 사람의 저작물이 사소한 부분 이상으로 등장하게 되면, 그 저작물은  <a href="//commons.wikimedia.org/wiki/Commons:Derivative_works" target="_blank"><b>2차 창작</b></a>이며 원 저작물의 저작자의 허가가 별도로 필요합니다.</p>
            <p>특정 국가에서, <a href="//commons.wikimedia.org/wiki/Commons:Freedom_of_panorama" target="_blank"><b>파노라마의 자유</b></a> 예외 덕분에, 건축물 외 다른 영구적인 공공 설치 저작물은 이러한 요구사항에서 예외가 적용되기도 합니다. 대한민국에서는 이 예외가 인정되지 않습니다.</p>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="i3">
              <a role="button" href="#s4" class="btn btn-primary btn-block smsc nt">다음 단계로 넘어가기</a>
            </div>
          </div>
          <br />
        </div>

        <div id="s4" class="row hof"> <!-- step 4 -->
          <br />
          5단계 중 4단계 [ <a href="#s3" class="smsc">돌아가기</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+4" target="_blank">도움말</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">피드백</a> ]
          <br /><br />
          <div class="col-md-7">
            <p>이 저작물을 다음 자유 라이선스로 배포하는 데 동의합니다:</p>
            <div id="s4fg" class="form-group"><div class="input-group">
              <input id="licensei" type="text" name="license" value="크리에이티브 커먼즈 저작자표시-동일조건변경허락 4.0 국제" class="form-control" />
              <div class="input-group-btn">
                <a role="button" data-toggle="dropdown" class="btn btn-default"><span class="caret" /></a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a onclick="$('#licensei').val('Creative Commons Attribution-ShareAlike 4.0 International'); $('#iawattr').show();">크리에이티브 커먼즈 저작자표시-동일조건변경허락 4.0 국제</a></li>
                  <li><a onclick="$('#licensei').val('Creative Commons Attribution 4.0 International'); $('#iawattr').show();">크리에이티브 커먼즈 저작자표시 4.0 국제</a></li>
                  <li><a onclick="$('#licensei').val('Creative Commons CC0 1.0 Universal'); $('#iawattr').hide();">크리에이티브 커먼즈 CC0 1.0 보편적 (퍼블릭 도메인 기증)</a></li>
                </ul>
                <a role="button" href="//commons.wikimedia.org/wiki/Commons:First_steps/License_selection" target="_blank" class="btn btn-default">
                  <span class="glyphicon glyphicon-question-sign" />
                </a>
              </div>
            </div></div>
            <p>나는 이 저작물에 적용되는 라이선스에 따른 조항 외 법에 준거하는 상업 목적의 이용 권한과 필요에 따른 개작 권한을 모든 사람에게 양도하는 것을 허락합니다.</p>
            <p>나는 이용 허락이 위키미디어 프로젝트에 국한되지 않고, 전세계적으로 이용 허락을 하는 것임을 인지하고 있습니다.</p>
            <p id="iawattr">나는 이 저작물의 라이선스에 따른 저작자 표시와 저작권을 본인이 계속하여 보유하는 것을 인지하고 있으며, 해당 저작물의 이차적 저작물은 그 권리가 본인에게 귀속되지 않습니다.</p>
            <p>나는 이 허락을 철회하지 않을 것이며, 저작물이 위키미디어 프로젝트에 영구히 보관되거나 보관되지 않게 되는 것을 승인합니다.</p>
            <br />
            <button type="button" class="btn btn-default btn-block" data-toggle="button" onclick="$('#iag').toggle();">동의합니다</button>
            <br /><br />
          </div>
          <div class="col-md-4">
            <div style="display:none;" id="iag">
              <a role="button" class="btn btn-primary btn-block nt" onclick="s4v()">다음 단계로 넘어가기</a>
            </div>
          </div>
          <br />
        </div>

      </form> <!-- result -->
      <div id="result" class="row hof">
        <br />
        5단계 중 5단계 [ <a href="#s1" class="smsc">다시 시작하기</a> | <a href="//commons.wikimedia.org/wiki/Commons:Help_desk?action=edit&section=new&preloadtitle=help+with+Wikimedia+OTRS+release+generator+step+5" target="_blank">도움말</a> | <a href="//commons.wikimedia.org/wiki/User_talk:FDMS4?action=edit&section=new&preloadtitle=Wikimedia+OTRS+release+generator+feedback" target="_blank">피드백</a> ]
        <br /><br />
        <?php if (($s1 != "") && ($name != "") && !(($s1 == "2") && (($rep == "") || ($auth == ""))) && ($s2 != "") && !(($s2 == "1") && ($filer == "")) && ($s3 != "") && ($license != "")) {
          $stats = fopen("../stats/" . date('Y') . ".csv", "a");
          fputcsv($stats, array (date("m-d"), $starttime, date("H:i:s"), $trn), ";");
          fclose($stats);
        ?>
        <div class="col-md-7">
          <p>이메일 클라이언트가 설치되어 있다면, 그냥 <b>버튼을 눌러</b> 이메일 창을 여십시오. 눌렀는데 아무 일도 일어나지 않거나 설치되어 있지 않다면 내용을 수동으로 복시 & 붙여넣기 하여  <a href="mailto:permissions-ko@wikimedia.org">permissions-ko@wikimedia.org</a>로 발송하십시오.</p>
          <p>이메일은 <b>저작권자와 연결되어 있다는 것을 알 수 있는 이메일 주소에서 발송되어야 합니다</b>. 예를 들어, 웹사이트에 등록된 사진의 저작권을 허가한다면 웹사이트의 도메인이나 연락처에 있는 이메일에서 발송되어야 합니다. 조직을 대표하여 사진을 허가한다면, 조직의 이메일 계정을 사용하여 이메일을 발송하여야 합니다.</p>
          <br />
          <?php
            if ($s1 == "1") {
                $p1s = ", $name, 는";
            } else {
                $p1s = " $rep 의 대리인으로,";
                $p1s_ = "<br />$rep의 $auth (으)로";
                $p1s_m = "%0A$rep의 $auth (으)로";
            }
            switch ($s3) {
                case "1":
                    $p2s = "미디어 저작물";
                    break;
                case "2":
                    $p2s = "미디어 저작물에 나타난 저작물";
                    break;
                case "3":
                    $p2s = "미디어와 미디어에 나타난 저작물";
                    break;
            }
            if ($s2 == "1") {
                $file = preg_replace("/(File:|(http|https):\/\/(commons|en).wiki(m|p)edia.org\/(wiki\/|w\/index\.php\?title=)File:)/", "", $filer);
                $p3s = "<a href='//commons.wikimedia.org/wiki/File:" . rawurlencode(str_replace(" " , "_", $file)) . "' target='_blank'>https://commons.wikimedia.org/wiki/File:" . str_replace(" " , "_", $file) . "</a>";
                $p3sm = "https:%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile:" . rawurlencode(str_replace(" " , "_", $file));
                $subj = $file;
            } else {
                $p3s = $p3sm = "이 이메일에 첨부된";
                $subj = "이용 허락";
            }
            $b1 = "나는 이 메일을 통하여 $p1s 이 $p3s $p2s 의 독점 저작권 고유 소유자이자 제작자임을 선언합니다.";
            $b1m = "나는 이 메일을 통하여 $p1s 이 $p3sm $p2s의 독점 저작권 고유 소유자이자 제작자임을 선언합니다.";
            $b2 = "나는 이 저작물을 자유 라이선스인 $license 로 배포하는 것에 동의합니다.";
            $b3 = "나는 이 저작물을 배포하는 데 동의함으로써 이 라이선스 및 관련 법률에 동의하는 한 누구나 저작물을 상업적 방법 등으로 사용하고, 어떤 목적으로든 재사용할 수 있도록 허락하는 것임을 인지하고 있습니다.";
            $b4 = "나는 이용 허락이 위키미디어 프로젝트에 국한되지 않고, 전세계적으로 이용 허락을 하는 것임을 인지하고 있습니다.";
            if ($license != "크리에이티브 커먼즈 CC0 1.0 보편적 (퍼블릭 도메인 기증)") {
                $b5 = "<br />나는 이 저작물의 라이선스에 따른 저작자 표시와 저작권을 본인이 계속하여 보유하는 것을 인지하고 있으며, 해당 저작물의 이차적 저작물은 그 권리가 본인에게 귀속되지 않습니다.";
                $b5m = "%0A나는 이 저작물의 라이선스에 따른 저작자 표시와 저작권을 저작권자가 계속하여 보유하는 것을 인지하고 있으며, 해당 저작물의 이차적 저작물은 그 권리가 저작권자에게 귀속되지 않습니다.";
            }
            $b6 = "나는 이 허락을 철회하지 않을 것이며, 저작물이 위키미디어 프로젝트에 영구히 보관되거나 보관되지 않게 되는 것을 승인합니다.";
            $tracking = "[relgen에서 생성됨]";
            echo "<div class='bg-success' style='padding:8px;'>$b1<br />$b2<br />$b3<br />$b4$b5<br />$b6<br /><br />$name$p1s_<br />" . date("Y-m-d") . "<br /><br />$tracking</div>";
          ?>
          <br /><br />
        </div>
        <div class="col-md-4">
          <a role="button" href="mailto:permissions-ko@wikimedia.org?subject=<?=$subj?>&amp;body=<?=$b1m?>%0A<?=$b2?>%0A<?=$b3?>%0A<?=$b4?><?=$b5m?>%0A<?=$b6?>%0A%0A<?=$name?><?=$p1s_m?>%0A<?=date('Y-m-d')?>%0A%0A<?=$tracking?>" class="btn btn-default btn-block" style="width:100%;">저작권 허가 이메일 생성</a>
        </div>
        <?php
            } else {
                if ($name == "") echo "<p class='text-danger'>에러: 이름이 지정되지 않았습니다!</p>";
                if (($s1 == "2") && (($rep == "") || ($auth == ""))) echo "<p class='text-danger'>에러: 저작권자 및 대리 권한이 지정되지 않았습니다!</p>";
                if (($s2 == "1") && ($filer == "")) echo "<p class='text-danger'>에러: 파일 이름이 지정되지 않았습니다!</p>";
                if ($license == "") echo "<p class='text-danger'>에러: 라이선스가 지정되지 않았습니다!</p>";
            }
        ?>
        <br />
      </div>
    </div>
  </body>
</html>
