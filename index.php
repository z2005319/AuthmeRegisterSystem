<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>服务器注册</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content=""
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

	<link rel="stylesheet" href="css/fontawesome-all.css">
	<link rel="stylesheet" href="css/swal.css">

</head>

<body>
<style type="text/css">
.load{
	width: 100%;
	height: 100vh;
	position: fixed;
	top: 0;
	z-index: 10000;
	//display: none;
	background-color: rgba(0, 0, 0, 0.1);
}
.loader{
	width: 140px;
	height: 140px;
	/* border: 1px solid red; */
	text-align: center;
	position: absolute;
	top: calc(50% - 70px);
	left: calc(50% - 70px);
	padding-top: 15px;
	background-color: rgba(0, 0, 0, 0.5);
	border-radius: 5px;
}
#loader-1{
	width: 60px;
	height: 60px;
}
.load-msg{
	height: 50px;
	line-height: 50px;
	color: #fff;
	font-size: 13px;
	/* margin-top: 20px; */
}
svg path, svg rect {
	fill: #17a085;
}
</style>
<div class="load" id="load">
	<div class="loader" title="2">
		<svg version="1.1" id="loader-1"  x="0px" y="0px" width="100px" height="100px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
			<path fill="#000" d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">
				<animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite" />
			</path>
		</svg>
		<div class="load-msg">加载中...</div>
	</div>
</div>
	<div id="bg">
		<canvas></canvas>
		<canvas></canvas>
		<canvas></canvas>
	</div>

	<h1>xxx服务器注册</h1>

	<div class="sub-main-w3">
		<div>
			<h2>注册
				<i class="fas fa-level-down-alt"></i>
			</h2>
			<div class="form-style-agile">
				<label>
					<i class="fas fa-user"></i>
					游戏账号
				</label>
				<div>
				<input placeholder="账号" name="username" type="text" required="">
			</div>
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					账号密码
				</label>
				<input placeholder="密码" name="password" type="password" required="">
			</div>
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					邮箱地址
				</label>
				<input placeholder="邮箱地址" name="email" type="text" required="">
				
			<div class="wthree-text">
				
			</div>
			
				<center><input style="width: 100%;" onClick="yzm()" type="submit" id="send" value="注册"></center>
				
			<ul>
					<center><input style="width: 100%;" id="TencentCaptcha" data-appid="205066344" data-cbfn="callback" type="submit" class="layui-btn layui-btn layui-btn-lg layui-btn-normal layui-btn-fluid" value="点击进行验证"></center>
			<div class="wthree-text">
					
			<li>
						
						<label class="anim">
						<input type="checkbox" class="checkbox" required="">
							<span>我无法注册</span>
						</label>
					</li>
					<li>
						
					</li>
				</ul>
			</div>
			
			
		</div>
		
	</div>
	
</div>

	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/swal.js"></script>
	<script src="https://ssl.captcha.qq.com/TCaptcha.js"></script>
	<script src="js/canva_moving_effect.js"></script>
	<script src="js/jq.min.js"></script>
	<script src="js/json2.js"></script>



<script type="text/javascript">
  tapcha=false
  document.getElementById("load").style.display="none";//隐藏加载提示框
		 
  </script>
  
  <script>
      window.callback = function(res){
console.log(res)
// res（用户主动关闭验证码）= {ret: 2, ticket: null}
// res（验证成功） = {ret: 0, ticket: "String", randstr: "String"}
if(res.ret === 0){
    
  $(function(){
      tapcha=true
        document.getElementById("TencentCaptcha").value="验证通过✓";
      if (tapcha){
		$("#send").click(function(){
		   var cont = $("input").serialize();
		   $.ajax({
		    url:'regd.php',
		    type:'get',
		    dataType:'text',
		    data:cont,
		    success:function(data){
		    	//console.log(data)
		     var str = data;
		     console.log(data)
		     if (str==="true")
		     {
		     	swal("注册成功","您现在可以进入服务器了","success")
		     	ycload()
		     }
		     else
	         {
	         	swal("注册失败","用户名/密码/邮箱未填/玩家已存在","error")
	         	ycload()
	         }
		    }
		   });
		  });  
			    }
			    else
			    {
			       swal("注册失败","后端请求失败!","error")
	         	   ycload()
			    };
		  
		 });  // 票据
}
}
  </script>
  <script>
			function yzm()
			
			{
			    xsload()
			    if (tapcha){
			        
			    }
			    else
			    {
			       swal("注册失败！","请先进行验证","error") 
			       ycload()
			    };
			};
			</script>
			<script>
function ycload()
　　
　　{document.getElementById("load").style.display="none";};
　　
function xsload()
{document.getElementById("load").style.display="";};
　　ycload()

  </script>
</body>

</html>