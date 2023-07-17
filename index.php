<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>阿里云CDN缓存刷新</title>
    <script src="public/jquery.min.js"></script>
</head>
<body>
<div>
    <form action="src/api.php" method="post" id="form">
        <p id="info"></p>
        <p>
            操作类型：
            <select name="ObjectType">
                <option value="File">URL刷新</option>
                <option value="Directory">目录刷新</option>
            </select>
            <span style="color:red;">（注意：多条URL之间使用换行符（\n）或（\r\n）分隔）</span>
        </p>
        <p>
            刷新URL：
            <textarea rows="8" cols="50" name="ObjectPath"></textarea>
        </p>
        <p>
            <input type="submit" value="提交刷新">
        </p>
    </form>

</div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        function getInfo()
        {
            $.ajax({
                type: 'GET',
                url: '/src/api.php?act=getNumber',
                data: '',
                success: function (response) {
                    response = $.parseJSON(response);
                    if (response.statusCode == 200)
                    {
                        $('#info').html("刷新URL情况：<span style='color:green;'>"+response.body.RefreshUrlRemain+"</span>/"+response.body.RefreshUrlQuota+"，目录刷新情况：<span style='color:green;'>"+response.body.RefreshDirRemain+"</span>/"+response.body.RefreshDirQuota);

                    }
                },
                error: function (error){
                    console.log(error);
                }
            })
        }
        getInfo();
        $('#form').submit(function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '/src/api.php?act=refresh',
                data: formData,
                success: function (response) {
                    response = $.parseJSON(response);
                    if (response.statusCode == 200)
                    {
                        alert('操作成功');
                        getInfo();
                    }else{
                        alert('操作失败，请求RequestId：'+response.body.RequestId);
                    }
                },
                error: function (error){
                    console.log(error);
                }
            })
        })
    })


</script>