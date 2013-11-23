
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <script language="JavaScript">
      var productIDs = [];
      
        productIDs.push('528d9238abe10f2c4a000004');
      
      
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="/static/css/spoor-feedback.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="/static/css/feedback_base-1.0.0.5.css"/> -->
    <!-- <link rel="stylesheet" type="text/css" href="/static/css/feedback_base-1.0.0.6.css"/> -->
    <link rel="stylesheet" type="text/css" href="/static/css/feedback_base-1.0.0.8.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="/static/css/feedback_inline-1.0.0.1.css"/> -->
    <link rel="stylesheet" type="text/css" href="/static/css/feedback_inline-1.0.0.2.css"/>
    <link rel="stylesheet" type="text/css" href="/static/autocomplete/jquery.autocomplete.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <script type="text/javascript">
        !window.jQuery && document.write('<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"><\/script>');
    </script>
    <script type="text/javascript" src="/static/js/jquery.form.js"></script>
    <script type="text/javascript" src="/static/js/feedback_base-1.0.1.4.js"></script>
    <script type="text/javascript" src="/static/autocomplete/jquery.autocomplete.min.js"></script>
  </head>
  <body  Topmargin= "0"   leftmargin= "0" style="margin:0;">
    <div id="feedback" class="clearfix">
      <form id="topic_form" method="post" enctype="multipart/form-data" action="/widget/create_topic" onSubmit="GKFB.bindAjaxSubmit(this,GKFB.topicValidate, GKFB.createTopicCallback, true); return false;">
        <div id="feedback_form" class="content">
          <div id="feedback_body" class="clearfix">
            <h1 id="feedback_title">提出你的建议</h1>
            <fieldset id="topic_details">
              <input type="hidden" name="company_id" value="528d9206abe10f270300000b" />
              <input type="hidden" name="type" value="idea" />
              <div class="notification warning dn">
              </div>
              <ul id="tabs" class="clearfix">
                <li class="idea active" identifier="d1" onclick="GKFB.topicTypeChange(this, 'idea', GKFB.subject.idea_subject, GKFB.default_desc.idea_desc, productIDs.join(','), 'inline');">
                  <a href="javascript:void(0)">
                    <strong>建议</strong>
                    <img src="/static/img/widgets/blank.gif" alt="feedback_tab_arrow" />
                  </a>
                </li>
                <li class="question" identifier="d2" onclick="GKFB.topicTypeChange(this, 'question', GKFB.subject.question_subject, GKFB.default_desc.question_desc, productIDs.join(','), 'inline');" >
                  <a href="javascript:void(0)">
                    <strong>提问</strong>
                    <img src="/static/img/widgets/blank.gif" alt="feedback_tab_arrow" />
                  </a>
                </li>
                <li class="problem" identifier="d3" onclick="GKFB.topicTypeChange(this, 'problem', GKFB.subject.problem_subject, GKFB.default_desc.problem_desc, productIDs.join(','), 'inline');">
                  <a href="javascript:void(0)">
                    <strong>报错</strong>
                    <img src="/static/img/widgets/blank.gif" alt="feedback_tab_arrow" />
                  </a>
                </li>
                <li class="praise" identifier="d4" onclick="GKFB.topicTypeChange(this, 'praise', GKFB.subject.praise_subject, GKFB.default_desc.praise_desc, productIDs.join(','), 'inline');">
                  <a href="javascript:void(0)">
                    <strong>评价</strong>
                    <img src="/static/img/widgets/blank.gif" alt="feedback_tab_arrow" />
                  </a>
                </li>
              </ul>
              <table id="topic_tab" cellspacing="1" cellpadding="3" border="0" style="width : 100%; margin-top: 5px;" >
                <tr>
                  <td>
                    <div class="row text_box" identifier="a">
                      <input id="topic_title" type="text" name="title" value="简要标题：" onfocus="GKFB.removeDefaultSet(this, GKFB.title_regexp);"  onblur="GKFB.setDefaultText(this, GKFB.default_title);"/>             
                    </div>  
                  </td>
                </tr>
                <tr>
                  <td class="clearfix">
                    <div class="row text_box clearfix" identifier="b">
                      <textarea id="topic_additional_detail" name="content" onfocus="GKFB.removeDefaultSet(this, GKFB.desc_regexp);" onblur="GKFB.setDefaultText(this, GKFB.getDesc(GKFB.default_desc));">描述你的建议：</textarea>
                      <div class="post clearfix">
                        <a class="insert_pic" href="javascript:void(0)" onclick="GKFB.insertPicClick();">
                          <img src="/static/img/widgets/insert_pic.gif" alt="topic_insert_pic" title="插入图片"/>
                                                                  插入图片
                        </a>
                        <!--
                          
                        -->
                      </div>
                      <div class="inserted_pic_name"><span></span></div>
                    </div>
                    <div id="postPic" style="display:none">
                      <img class="upper" src="/static/img/widgets/upper.gif" alt="feedback_tab_upper" />
                      <div id="postPic_top" class="clearfix">
                        <ul>
                          <li class="computer_pic_title active" onclick="GKFB.picTypeChange(this);">本地图片</li>
                          <!--
                          
                          -->
                        </ul>
                        <a class="close" href="javascript:void(0)" title="关闭" onclick="$('#postPic').fadeOut(100);">&ndash;</a>
                      </div>
                      <div style="border-top: 1px solid #DFDFDF;">
                        <div id="computer_pic" class="computer_pic">
                          <input type="file" id="screenshot" name="screenshot" onchange="GKFB.fileOnSelect(this);"/>  
                          <p>仅支持JPG、GIF、PNG图片文件，且文件大小小于5M</p>
                        </div>
                        
                      </div>            
                    </div>
                    
                  </td>
                </tr>
                
                  
                    
                    <input type="hidden" name="product_id" value="528d9238abe10f2c4a000004" >
                    
                  
                
              </table>
              <div class="postSubmit" identifier="o">
                
                <input class="submit" type="submit" value="发表" />
                
              </div>
              <div class="login-post dn">
                <input class="submit" type="submit" value="发表" />
              </div>
            </fieldset>
          </div> 
        </div>  
      </form>
      <div id="login-form" class="dn">
        <input name="me_too_click" type="hidden" value="false" />
        <div class="login-header">
    <h2>在我们提交您的反馈之前，请先登录……</h2>
    <a onclick="GKFB.showTopicForm();">‹ 返回</a>
</div>
<div class="setEmail-header dn">
    <h2>如果你想跟踪关注你所发表的反馈的状态，请设置邮箱。</h2>
</div>
<div id="tabs-login" class="feedback-login">
    <div id="login-3" class="f-l">
        <p>
            › 使用合作网站登录集馈
            <img src="/static/img/ic_help.gif" title="如果你有以下网站的账号，可直接登录集馈网而不需要注册。" class="ic_help"/>
        </p>
        <br/>
        <!-- social login form -->
        <!-- social login form -->

<div id="login-way">
    <ul class="providers">
        <a id="sinat" title="新浪微博" href="/account/auths/sinat/?next=">新浪微博</a>
<!-- 		<a id="sinat" title="新浪微博" href="http://api.t.sina.com.cn/oauth/login?source=3075461831&callback=http://geekui.com/account/auths/sinat/local/?next=">新浪微博</a> -->
        <a id="renren" title="人人网" href="/account/auths/renren/?next=">人人网</a>
        <a id="google" title="Google" href="/account/auths/google/?next=">Google</a>
        <a id="twitter" title="twitter" href="/account/auths/twitter/?next=">twitter</a>
    </ul>
    <ul class="providers">
        <a id="qqt" title="腾讯微博" href="/account/auths/qqt/?next=">腾讯微博</a>
        <a id="sohut" title="搜狐微博" href="/account/auths/sohut/?next=">搜狐微博</a>
        <a id="sdo" title="盛大通行证" href="/account/auths/sdo/?next=">盛大通行证</a>
        <a id="facebook" title="Facebook" href="/account/auths/facebook/?next=">Facebook</a>
    </ul>
    <ul class="providers">
        <a id="douban" title="豆瓣网" href="/account/auths/douban/?next=">豆瓣网</a>
        <a id="t163" title="网易微博" href="/account/auths/t163/?next=">网易微博</a>
        <a id="msn" title="MSN" href="/account/auths/msn/?next=" >MSN</a>
        <a id="yahoo" title="雅虎"  href="/account/auths/yahoo/?next=">雅虎</a>
    </ul>
    <div class="clear">
    </div>
</div>
<script type="text/javascript">
    var auth_popup;

    $('ul.providers a').click( function(e) {
        var url = $(this).attr('href');
        var name = $(this).attr('id');

        var w = 600, h = 540;
        if (name == 'twitter') {
            w = 800, h =500;
        } else if (name == 'qqt' || name == 'sdo' || name == 'sohut' || name == 't163') {
            w = 1000, h =800;
        }

        var left = screen.width / 2 - w / 2;
        var topp = screen.height / 2.5 - h / 2;
        var features = 'width=' + w + ',height=' + h + ',top=' + topp + ',left=' + left;// + ',scrollbars=no';

        if (auth_popup) {
            auth_popup.close();
        }

        auth_popup = window.open(url, name, features);
        return false;
    });
    
    $('a#sinat').attr('href', $('a#sinat').attr('href').replace('geekui.com', document.location.host));
</script>
    </div>
    <div id="login-1" class="f-l">
        <div id="pre-login">
          <a href="javascript:;" onclick="$(this).parent().hide().next().removeClass()">使用集馈网账号登录</a>
        </div>
        <div class="dn">
          <div class="tips-border">
              <div class="tips">
                  已有集馈账号? 请直接登录
              </div>
          </div>
          <form id="fm-login-lightbox" class="form" method="post" action="/account/lightbox_login" onSubmit="GKFB.bindAjaxSubmit(this, GKFB.loginValidate, GKFB.loginSuccess, false); return false;">
              <input id="current-url" type="hidden" name='next' value="/widget/feedback/page&amp;3rd_client=true" />
              <ul>
                  <li>
                      <label for="email">
                          你的 Email 地址：
                      </label>
                      <div identifier="r">
                          <input type="text" id="email" name="email"/>
                      </div>
                  </li>
                  <li>
                      <label for="pwd">
                          密码：
                      </label>
                      <div identifier="s">
                          <input type="password" id="pwd" name="password"/>
                      </div>
                  </li>
                  <li>
                      <div >
                          <input type="checkbox"/>
                          下次自动登录 | <a target="_blank" href="/account/forgetpassword?email=" onclick="GKFB.add_email(this);">忘记密码了?</a>
                      </div>
                  </li>
                  <li class="save">
                      <div identifier="t">
                          <input type="submit" id="btn-login" class="save" value="登录" />
                      </div>
                  </li>
              </ul>
          </form>
        </div>
    </div>
    <div class="clear"></div>
    <div class="hr">
    </div>
    <div class="another-one">
        <p>
            还没有集馈账号？
            <a target="_blank" href="/account/register_step1" identifier="i">免费注册</a>
        </p>
    </div>
</div>
<div id="set-email" class="feedback-login clearfix dn">
    <div class="tips-border">
        <div class="tips">
            邮箱是您找回密码的唯一方式。(请放心，我们比你更讨厌垃圾邮件)
        </div>
    </div>
    <div class="avatar">
        <div class="img_avatar">
            <img id="head-icon" src="/static/img/avatar.png" title="name" alt="name" />
        </div>
        <p id="user-name">
        </p>
    </div>
    <div class="email-profile">
        <form id="fm-set-email" method="post" action="/account/lightbox_set_email" onSubmit="GKFB.bindAjaxSubmit(this, GKFB.beforeSetEmail, GKFB.setEmailSuccess, false); return false;">
            <input type="hidden" name="user_id" id="user-id" value="kapor" />
            <ul>
                <li>
                    <p>
                        你的 Email 地址：
                    </p>
                    <input class="input_text_password" type="text" name="email" identifier="u" />
                    <p class="dn">
                    </p>
                </li>
                <li class="dn">
                    <p>
                        密码：
                    </p>
                    <input class="input_text_password" type="password" name="password" identifier="w" />
                    <p>
                        <a target="_blank" href="/account/forgetpassword?email=" onclick="GKFB.add_email(this);">忘记了密码？</a>
                    </p>
                </li>
                <li class="save">
                    <input type="submit" value="确定" identifier="n" class="save radius"/>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:;" onclick="if(confirm('当你的疑惑被解答时，集馈将无法及时通知你，确定不设置？'))GKFB.continueFeedback();">暂不设置</a>
                </li>
            </ul>
        </form>
    </div>
    <div class="clear">
    </div>
</div>
<script>
    $( function() {
        $('#current-url').val(document.URL + '&3rd_client=true');
        $('.providers a').each( function() {
            $(this).attr('href', $(this).attr('href') + document.URL + '&3rd_client=true')
        });
    });
</script>

      </div>
      <div id="thanks" class="dn">
        <div class="idea_thanks dn">
          <h1>非常感谢您的反馈！</h1>
          <div id="thanks_message">
            <p>现在您可以<a class="topic_link" target="_blank" identifier="p" >查看您所提交的建议</a>，或者您也可以<a class="company_link" target="_blank" identifier="q" >查看其他用户提出的反馈</a>。</p>
          </div>
          <input class="feedback-again" type="button" value="返回继续反馈" onclick="GKFB.showTopicForm();" />
        </div>  
        <div class="question_thanks dn">
          <h1>非常感谢您的反馈！</h1>
          <div id="thanks_message">
            <p>现在您可以<a class="topic_link" target="_blank" identifier="p" >查看您所询问的问题</a>，或者您也可以<a class="company_link" target="_blank" identifier="q" >查看其他用户提出的反馈</a>。</p>
          </div>
          <input class="feedback-again" type="button" value="返回继续反馈" onclick="GKFB.showTopicForm();" />
        </div> 
        <div class="problem_thanks dn">
          <h1>非常感谢您的反馈！</h1>
          <div id="thanks_message">
            <p>现在您可以<a class="topic_link" target="_blank" identifier="p" >查看您所报告的问题</a>，或者您也可以<a class="company_link" target="_blank" identifier="q">查看其他用户发现的反馈</a>。</p>
          </div>
          <input class="feedback-again" type="button" value="返回继续反馈" onclick="GKFB.showTopicForm();" />
        </div> 
        <div class="praise_thanks dn">
          <h1>非常感谢您的反馈！</h1>
          <div id="thanks_message">
            <p>现在您可以<a class="topic_link" target="_blank" identifier="p" >查看您所给出的评价</a>，或者您也可以<a class="company_link" target="_blank" identifier="q" >查看其他用户给出的反馈</a>。</p>
          </div>
          <input class="feedback-again" type="button" value="返回继续反馈" onclick="GKFB.showTopicForm();" />
        </div> 
      </div>
      
      <div id="related_topics" class="">
        <input type="hidden" name="vote_topic_id" value="" />
        <input type="hidden" name="display" value="inline"  />
        <table border="0" cellspacing="0" cellpadding="0" align="center" valign="middle" width="100%">
          <tbody id="ideas">
            <tr><th colspan="3"><h2><span>最新提出的建议</span><img style="margin-left:10px;" class="topics_loading dn" src="/static/img/widgets/loading.gif" alt="加载中..." /></h2></th></tr>
            
  
  <tr>
    <td class="topic_creater" identifier="e">
      <a class="person" target="_blank" href="/people/minishine">
            <img width="40" height="40" src="/static/user_head_icons/preview/528d9150abe10f7fb4000000_1385009533.jpg" title="minishine" />
      </a> 
    </td> 
    <td class="topic_title" align="left" identifier="f">
      <a target="_blank" class="topic_title" title="你好吗" href="/topic/528d928eabe10f27d400000e">你好吗</a>
      <div class="me_too_count"><strong>1</strong>个人有同样的想法</div>
    </td>
    <td class="topic_star" identifier="g">
      
      <a class="praise_star agree" title="你也有同样的想法！" ></a>
      
      <div class="login-vote dn">
        <a class="praise_star agree" title="你也有同样的想法！" ></a>
        <a class="praise_star not_agree login" title="我也有同样的想法？" onclick="GKFB.vote('528d928eabe10f27d400000e', this, '/topic/vote')"></a>
      </div>
      <input type="hidden" name="topic_id" value="528d928eabe10f27d400000e" />
      <input type="hidden" name="topic_type" value="idea" />
    </td>
  </tr>
  
  
    
      
        <tr><td colspan="3" identifier="h" style="border-bottom:none"><a target="_blank" href="/a/share/product/share/ideas/recent">» 更多</a></td></tr>
      
    
  
  <tr class="new_topic dn">
    <td class="topic_creater" identifier="e">
      <a class="person" target="_blank">
        <img width="40" height="40"/>
      </a> 
    </td> 
    <td class="topic_title" align="left" identifier="f">
      <a target="_blank" class="topic_title"></a>
      <div class="me_too_count"><strong>1</strong>个人有同样的想法</div>
    </td>
    <td class="topic_star" identifier="g">
      <a class="praise_star agree" title="你也有同样的想法！"></a>
    </td>
  </tr> 
          </tbody>
          <tbody id="questions" class="dn">
            <tr><th colspan="3"><h2><span>最新提出的问题</span><img style="margin-left:10px;" class="topics_loading" src="/static/img/widgets/loading.gif" alt="加载中..." /></h2></th></tr>
          </tbody>
          <tbody id="problems" class="dn">
            <tr><th colspan="3"><h2><span>最新报告的错误</span><img style="margin-left:10px;" class="topics_loading" src="/static/img/widgets/loading.gif" alt="加载中..." /></h2></th></tr> 
          </tbody>
          <tbody id="praises" class="dn">
            <tr><th colspan="3"><h2><span>最新给出的评价</span><img style="margin-left:10px;" class="topics_loading" src="/static/img/widgets/loading.gif" alt="加载中..." /></h2></th></tr>
          </tbody> 
        </table>
      </div>
      
      <div id="support_logo" class="clearfix"> 
        <a href="http://geekui.com" target="_blank" title="用户意见反馈 & 客服托管平台">
          <img src="/static/img/widgets/support_logo_web-2.jpg" alt="powered by 集馈"/>
        </a>
      </div>
    </div>
    <script type="text/javascript">
      $( function() {
        $("#topic_title").autocomplete("/widget/advice", {
          dataType: "json",
          extraParams: {"company_id" : "528d9206abe10f270300000b", "productIDs":productIDs.join(',')},
          parse: function(data) {
            return $.map(data, function(row) {
              return {
                data: row,
                value: row.title,
                result: row.title
              }
            });
          },
          formatItem: function(data, i, max, value, term) {
            return value;
          }
        }).result(function(e, data) {
          window.parent.location.href = data.url;
        });
      });
    </script>
    
    <div class="dn">
    <script type="text/javascript">
    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F039bc156341c71d2edab04341ce06b81' type='text/javascript'%3E%3C/script%3E"));
    </script>
    </div>
  </body>
</html>