<?php /*a:1:{s:67:"D:\wamp64\www\gw_ht\application\admin\view\index\app_list_view.html";i:1554190100;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<link rel="stylesheet" href="/public/static/fonts/font-awesome-4.7.0/css/font-awesome.min.css" /><!--字体图标-->
<link rel="stylesheet" href="/public/static/css/components.min.css" /><!--按钮及颜色样式-->
<link rel="stylesheet" href="/public/static/css/admin_style.css?version=001" /><!--自定义样式-->
<script type="text/javascript" src="/public/static/js/jquery-2.1.1.min.js"></script>
<title>肇庆OA文件共享管理系统</title>
</head>

<body>
<div class="search_box">
	<form action="<?php echo url('appListView'); ?>" method="GET" name="search_form">
		<table>
			<tr>
				<th>文件名</th>
				<td><input type="text" name="search_val" value="<?php echo htmlentities($searchData['search_val']); ?>"/></td>
				<td><a href="javascript:void(0);" class="btn blue"><i class="fa fa-search"></i></a></td>
			</tr>
		</table>
	</form>
	<div class="page" id="data_count">
			<?php echo $page; ?>
	</div>
</div>
<div class="content_list">
	<table>
		<thead>
			<tr>
				<th width="50">序号</th>
				<th width="200">文件名</th>
				<th width="100">格式</th>
				<th width="100">版本号</th>
				<th width="100">大小</th>
				<th width="100">排序</th>
				<th class="align-left" width="600">简介</th>
				<th width="180">修改时间</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($fileList as $k=>$v): ?>
				<tr>
					<td><?php echo htmlentities($k+1); ?></td>
					<td><a href="<?php echo url('Index/fileEditPage',['fid'=>$v['fid']]); ?>"><?php echo htmlentities($v['file_name']); ?></a></td>
					<td><?php echo htmlentities($v['format']); ?></td>
					<td><?php echo htmlentities($v['version_number']); ?></td>
					<td><?php echo htmlentities($v['file_size']); ?></td>
					<td><?php echo htmlentities($v['ranking']); ?></td>
					<td class="align-left"><?php echo htmlentities($v['introduce']); ?></td>
					<td><?php echo htmlentities(date('Y-m-d H:i',!is_numeric($v['change_time'])? strtotime($v['change_time']) : $v['change_time'])); ?></td>
					<td>
						<a onClick="file_download('<?php echo htmlentities($v['file_url']); ?>','<?php echo htmlentities($v['file_name']); ?>')">下载</a> | <a onClick="fileDel('<?php echo htmlentities($v['fid']); ?>')">删除</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
</body>
<script type="text/javascript">
	$(function () {
		$('.btn').click(function(){
			$("form[name='search_form']").submit();
		})
	});

 	/*
     * 文件下载 利用form表单提交下载
     * @param file_url 文件url地址
     * @param file_name 文件名(下载文件的名字)
     */
	 function file_download(file_url,file_name){
        var eleForm = $("<form method='POST'></form>");

        eleForm.attr("action","<?php echo url('FileOperationApi/fileDownloadApi'); ?>");
        eleForm.append("<input type='hidden' name='file_url' value='"+file_url+"'/>");
        eleForm.append("<input type='hidden' name='file_name' value='"+file_name+"'/>");
        $(document.body).append(eleForm);
        //提交表单，实现下载
        eleForm.submit();
        eleForm.remove();//移除该临时元素
    }

    //文件删除
    function fileDel(fid)
    {
		if(confirm('确定要删除吗？')){	
			var eleForm = $("<form method='POST'></form>");

			eleForm.attr("action","<?php echo url('FileOperationApi/fileDelApi'); ?>");
			eleForm.append("<input type='hidden' name='fid' value='"+fid+"'/>");
			$(document.body).append(eleForm);
			//提交表单，实现删除
			eleForm.submit();
			eleForm.remove();//移除该临时元素
		}
	}
</script>
</html>