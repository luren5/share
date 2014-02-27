<?php 
$email = <<<EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="en-us" />
<style type="text/css" media="screen">
	
	/* common
	--------------------------------------------------*/
	
	body {
		margin: 0px;
		padding: 0px;
		color: #fff;
		background: #333 url("img/bgBody.gif") repeat-x 0px 150px;
	}
	* #BodyImposter {
		color: #fff;
		background: #333 url("img/bgBody.gif") repeat-x 0px 150px;
		width: 100%;
		margin: 0px;
		padding: 0px;
		text-align: center;
	}
	* #BodyImposter li,
	* #BodyImposter p,
	* #BodyImposter td {
		font-size: 12px;
		line-height: 1.5em;
		font-family: Helvetica, Arial, sans-serif;
		text-align: justify;
	}
	* #BodyImposter p,
	* #BodyImposter ol,
	* #BodyImposter ul {
		margin: 0em 0em 1em 0em;
	}
	* #BodyImposter img {
		border: 0px;
	}
	* #Primary img {
		float: right;
		margin: 5px 0px 15px 15px;
		border: 1px solid #999;
		padding: 2px;
	}
	* #BodyImposter small {
		font-size: 10px;
		line-height: 1.3em;
	}
	* #BodyImposter ol {
		padding-left: 1em;
	}
	* #Primary ul {
		padding-left: 1em;
		padding-right: 1em;
	}
	* #BodyImposter ol li {
		margin: 0px;
		padding: 0px;
	}
	* #BodyImposter ul li {
		background: url("img/bullet.gif") no-repeat 0em 0.5em;
		padding: 0px 0px 0px 8px;
		margin: 0px;
		list-style: none;
	}
	
	/* links
	--------------------------------------------------*/
	
	* #BodyImposter a {
		text-decoration: underline;
	}
	* #Primary a:link,
	* #Primary a:visited {
		color: #000;
		background: #fff;
	}
	* #Helpful a:link,
	* #Helpful a:visited {
		color: #bdbcbc;
		background: #fff;
	}
	* #Legal a:link,
	* #Legal a:visited {
		color: #7d822b;
		background: #d3dd2e;
	}
	}
	* #BodyImposter a:hover {
		text-decoration: none;
	}
	* #BodyImposter a:active {
		color: #668d3c;
		background: #fff;
		text-decoration: none;
	}
	
	/* heads
	--------------------------------------------------*/
	
	* #BodyImposter h1,
	* #BodyImposter h2,
	* #BodyImposter h3 {
		font-family: Helvetica, Arial, sans-serif;
		font-weight: normal;
		line-height: normal;
		margin: 0em 0em 0.5em 0em;
		padding: 0px;
		text-align: left;
	}
	* #Masthead h1 {
		font-size: 28px;
		color: #fff;
		background: transparent;
		margin-bottom: 0.1em;
		padding-top: 5px;
		text-align: center;
	}
	* #Primary h2 {
		font-size: 22px;
		background: url("img/ornament.gif") no-repeat center top;
		color: #4f7282;
		background: #fff;
	}
	* #Primary h3 {
		font-size: 18px;
		color: #4f7282;
		background: #fff;
	}
	
	/* boxes
	--------------------------------------------------*/
	
	* #Box {
		color: #666;
		background: #fff url("img/bgContent.gif") repeat-y;
		margin: 0px auto;
	}
	* #Content td#Primary {
		padding-bottom: 30px;
	}
	* #Helpful {
		color: #bdbcbc;
		background: #fff;
	}
	* #Helpful p {
		margin: 0px;
		padding: 15px 0px;
	}
	* #Legal {
		color: #7d822b;
		background: #5dc7db;
	}
	* #Legal p {
		margin: 0px;
		padding: 0px;
		font-size: 11px;
		text-align: center;
	}
	* #Masthead {
		color: #fff;
		background: #5dc7db url("img/bgMasthead.gif") no-repeat center 11px;
	}
	* #Masthead p {
		text-align: center;
		font-size: 14px;
		margin: 0px;
	}
	* #Top {
		padding-top: 0px;
		padding-bottom: 8px;
		background: url("img/bgBottom.gif") no-repeat center bottom;
	}
	/*
	The asterisks preceding every selector ensure styles are rendered in Dot Mac.
	The inline styles in headlines are for Outlook 2007.
	*/
	
</style>
</head>

<body>
<div id="BodyImposter" style="color: #fff; background: #333 url(img/bgBody.gif) repeat-x 0px 150px;">
	<table id="Box" cellspacing="0" cellpadding="28" width="561" style="color: #666; background-color: #fff;">
		<tr>
			<td id="Top">
				<table id="Masthead" cellspacing="0" cellpadding="11" width="505" style="color: #fff; background-color: #5dc7db;">
					<tr>
						<td style="color: #fff; font-family: Helvetica, Arial, sans-serif;">
							<h1>$title</h1>
						</td>
					</tr>
				</table>
				<table id="Content" cellspacing="0" cellpadding="10" width="505" style="color: #666; background-color: #fff;">
					<tr valign="top">
						<td id="Primary" style="font-family: Helvetica, Arial, sans-serif;">
							<h2>资源详情</h2>
                                                        <p>资源描述：$description</p>
                                                        <p>下载链接：<br/><a href="$download_url" target="_blank">$download_url</a></p>
                                                        <p>分享人：$contributor</p>
                                                        <p>分享时间：$create_time</p>
                                                        <p>查看更多关于本资源的评论，请戳<a href="$detail_link" target="_blank">这里！</a></p>
						</td>
					</tr>
				</table>
                                <table  cellspacing="0" cellpadding="0" style="color:black; background: #fff;">
					<tr>
						<td style="font-family: Helvetica, Arial, sans-serif;">
                                                    <p>&nbsp;&nbsp;感谢您使用<a target="_blank" href="$site_url" >湖工大爱分享网</a>的资源下载功能!
                                                        <br/></br>
                                                        &nbsp;&nbsp;如果有什么宝贵的意见，欢迎戳<a target="_blank" href="$feedback_url">这里</a>告诉我们，谢谢！.
                                                    </p>
						</td>
					</tr>
				</table>
				<table id="Legal" cellspacing="0" cellpadding="15" width="505" style="color: #7d822b; background-color: #d3dd2e;">
					<tr>
						<td style="color: #7d822b; font-family: Helvetica, Arial, sans-serif;">
							<p>&#169;湖工大爱分享网.</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
</body>
</html>
EOD;
?>