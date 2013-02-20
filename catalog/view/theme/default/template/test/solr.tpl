<html>
<head>
<title></title>
<style>
body {padding: 0px; margin: 0px; background: #dcdcdc;}
#warper {width: 960px; margin: 0px auto;}
#header {height: 120px; background: #000000;}
#content {min-height: 300px; padding-left: 10px; background: #ffffff;}
#footer {height: 100px; background: #000000;}

.cleaner {clear: both;}

.post-warper {width: 500px; background: #dcdcdc; border-bottom: 1px solid gray;}
.post-author {padding-left: 5px; font-weight: bold; color: blue;}
.post-content {padding-left: 15px; color: gray;}
.post-create {padding-right: 5px; float: right; color: green;}

#postform-warper {margin-top: 10px;}
input[name='content'] {width: 500px;}
</style>
<script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.7.1.min.js"></script>
</head>
<body>
<div id="warper" >
	<div id="header" >
		<input name="search" type="text" />
		<button onclick="window.location='http://localhost:8983/solr/select/?q=content_t:' + $('input[name=\'search\']').val() + '&version=2.2&start=0&rows=10&indent=on';" >Search Content</button>
		<button onclick="window.location='http://localhost:8983/solr/select/?q=author_t:' + $('input[name=\'search\']').val() + '&version=2.2&start=0&rows=10&indent=on';" >Search Author</button>
	</div>
	<div id="content" >
		<?php foreach ($posts as $post) { ?>
		<div class="post-warper" id="<?php echo $post['id']; ?>" >
			<div>
				<span class="post-author" ><?php echo $post['author']; ?></span>:
			</div>
			<div>
				<span class="post-content" ><?php echo $post['content']; ?></span>
			</div>
			<div>
				<span class="post-create" ><?php echo $post['create']; ?></span>
			</div>
			<div class="cleaner" ></div>
		</div>
		<?php } ?>
		<form method="POST" >
		<div id="postform-warper" >
			<div>
				Author: 
				<input name="author" type="text" />
			</div>
			<div>
				Content: <br />
				<input name="content" type="text" />
			</div>
			<div><input type="submit" value="Submit" /></div>
		</div>
		</form>
	</div>
	<div id="footer" >
		<a href="http://localhost:8983/solr/select/?q=content_t:test&version=2.2&start=0&rows=10&indent=on" >Search</a><br />
		<a href="http://localhost:8983/solr/select/?q=id:511e4ceb913db4a408000006&version=2.2&start=0&rows=10&indent=on" >Search</a><br />
	</div>
</div>
</body>
</html>