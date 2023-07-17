<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\SDK\Sample;

use AlibabaCloud\SDK\Cdn\V20180510\Cdn;
use AlibabaCloud\Tea\Utils\Utils;
use AlibabaCloud\Tea\Console\Console;

use Darabonba\OpenApi\Models\Config;
use AlibabaCloud\SDK\Cdn\V20180510\Models\RefreshObjectCachesRequest;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;

class Sample {

    /**
     * 使用AK&SK初始化账号Client
     * @param string $accessKeyId
     * @param string $accessKeySecret
     * @return Cdn Client
     */
    public static function createClient($accessKeyId, $accessKeySecret){
        $config = new Config([
            // 必填，您的 AccessKey ID
            "accessKeyId" => $accessKeyId,
            // 必填，您的 AccessKey Secret
            "accessKeySecret" => $accessKeySecret
        ]);
        // 访问的域名
        $config->endpoint = "cdn.aliyuncs.com";
        return new Cdn($config);
    }

    /**
     * 使用STS鉴权方式初始化账号Client，推荐此方式。
     * @param string $accessKeyId
     * @param string $accessKeySecret
     * @param string $securityToken
     * @return Cdn Client
     */
    public static function createClientWithSTS($accessKeyId, $accessKeySecret, $securityToken){
        $config = new Config([
            // 必填，您的 AccessKey ID
            "accessKeyId" => $accessKeyId,
            // 必填，您的 AccessKey Secret
            "accessKeySecret" => $accessKeySecret,
            // 必填，您的 Security Token
            "securityToken" => $securityToken,
            // 必填，表明使用 STS 方式
            "type" => "sts"
        ]);
        // 访问的域名
        $config->endpoint = "cdn.aliyuncs.com";
        return new Cdn($config);
    }

    /**
     * @param string[] $args
     * @return void
     */
    public static function main($args){
        // 请确保代码运行环境设置了环境变量 ALIBABA_CLOUD_ACCESS_KEY_ID 和 ALIBABA_CLOUD_ACCESS_KEY_SECRET。
        // 工程代码泄露可能会导致 AccessKey 泄露，并威胁账号下所有资源的安全性。以下代码示例仅供参考，建议使用更安全的 STS 方式，更多鉴权访问方式请参见：https://help.aliyun.com/document_detail/311677.html
        $client = self::createClient(getenv("ALIBABA_CLOUD_ACCESS_KEY_ID"), getenv('ALIBABA_CLOUD_ACCESS_KEY_SECRET'));
        $refreshObjectCachesRequest = new RefreshObjectCachesRequest([
            "objectPath" => "https://www.hndecometal.com/Public/www/css/",
            "objectType" => "Directory"
        ]);
        $runtime = new RuntimeOptions([]);
        $resp = $client->refreshObjectCachesWithOptions($refreshObjectCachesRequest, $runtime);
        Console::log(Utils::toJSONString($resp));
    }
}
$path = __DIR__ . \DIRECTORY_SEPARATOR . '..' . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'autoload.php';
if (file_exists($path)) {
    require_once $path;
}
Sample::main(array_slice($argv, 1));
