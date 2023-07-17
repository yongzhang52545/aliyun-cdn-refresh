<?php
namespace AlibabaCloud\SDK\Sample;
$path = __DIR__ . \DIRECTORY_SEPARATOR . '..' . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'autoload.php';
if (file_exists($path)) {
    require_once $path;
}

putenv('ALIBABA_CLOUD_ACCESS_KEY_ID=请填写KEY');
putenv('ALIBABA_CLOUD_ACCESS_KEY_SECRET=请填写SECRET');

if (isset($_GET['act']) && $_GET['act']=='refresh')
{
    Sample::refresh($_POST);
}elseif (isset($_GET['act']) && $_GET['act']=='getNumber')
{
    Sample::getNumber();
}
