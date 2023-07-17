<?php

// This file is auto-generated, don't edit it. Thanks.
namespace AlibabaCloud\SDK\Sample;

use Darabonba\OpenApi\OpenApiClient;
use AlibabaCloud\OpenApiUtil\OpenApiUtilClient;
use AlibabaCloud\Tea\Utils\Utils;
use AlibabaCloud\Tea\Console\Console;

use Darabonba\OpenApi\Models\Config;
use Darabonba\OpenApi\Models\Params;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;
use Darabonba\OpenApi\Models\OpenApiRequest;

class Sample {

    /**
     * 使用AK&SK初始化账号Client
     * @param string $accessKeyId
     * @param string $accessKeySecret
     * @return OpenApiClient Client
     */
    public static function createClient($accessKeyId, $accessKeySecret){
        $config = new Config([
            // 必填，您的 AccessKey ID
            "accessKeyId" => $accessKeyId,
            // 必填，您的 AccessKey Secret
            "accessKeySecret" => $accessKeySecret
        ]);
        // Endpoint 请参考 https://api.aliyun.com/product/Cdn
        $config->endpoint = "cdn.aliyuncs.com";
        return new OpenApiClient($config);
    }

    /**
     * 使用STS鉴权方式初始化账号Client，推荐此方式。
     * @param string $accessKeyId
     * @param string $accessKeySecret
     * @param string $securityToken
     * @return OpenApiClient Client
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
        // Endpoint 请参考 https://api.aliyun.com/product/Cdn
        $config->endpoint = "cdn.aliyuncs.com";
        return new OpenApiClient($config);
    }

    /**
     * @param string[] $args
     * @return void
     */
    public static function refresh($args){
//        var_dump($args);die;
        if (!isset($args['ObjectType']) || !isset($args['ObjectPath']))
        {
            exit('请选择操作类型和输入需要刷新的URL');
        }
        // 请确保代码运行环境设置了环境变量 ALIBABA_CLOUD_ACCESS_KEY_ID 和 ALIBABA_CLOUD_ACCESS_KEY_SECRET。
        // 工程代码泄露可能会导致 AccessKey 泄露，并威胁账号下所有资源的安全性。以下代码示例仅供参考，建议使用更安全的 STS 方式，更多鉴权访问方式请参见：https://help.aliyun.com/document_detail/311677.html
        $client = self::createClient(getenv("ALIBABA_CLOUD_ACCESS_KEY_ID"), getenv('ALIBABA_CLOUD_ACCESS_KEY_SECRET'));
        $params = new Params([
            // 接口名称
            "action" => "RefreshObjectCaches",
            // 接口版本
            "version" => "2018-05-10",
            // 接口协议
            "protocol" => "HTTPS",
            // 接口 HTTP 方法
            "method" => "POST",
            "authType" => "AK",
            "style" => "RPC",
            // 接口 PATH
            "pathname" => "/",
            // 接口请求体内容格式
            "reqBodyType" => "json",
            // 接口响应体内容格式
            "bodyType" => "json"
        ]);
        // query params
        $queries = [];
        $queries["ObjectPath"] = $args['ObjectPath'];
        $queries["ObjectType"] = $args['ObjectType'];
        // runtime options
        $runtime = new RuntimeOptions([]);
        $request = new OpenApiRequest([
            "query" => OpenApiUtilClient::query($queries)
        ]);
        // 复制代码运行请自行打印 API 的返回值
        // 返回值为 Map 类型，可从 Map 中获得三类数据：响应体 body、响应头 headers、HTTP 返回的状态码 statusCode。
        $resp = $client->callApi($params, $request, $runtime);

        echo Utils::toJSONString($resp);
    }

    public static function getNumber(){
        // 请确保代码运行环境设置了环境变量 ALIBABA_CLOUD_ACCESS_KEY_ID 和 ALIBABA_CLOUD_ACCESS_KEY_SECRET。
        // 工程代码泄露可能会导致 AccessKey 泄露，并威胁账号下所有资源的安全性。以下代码示例使用环境变量获取 AccessKey 的方式进行调用，仅供参考，建议使用更安全的 STS 方式，更多鉴权访问方式请参见：https://help.aliyun.com/document_detail/311677.html
        $client = self::createClient(getenv("ALIBABA_CLOUD_ACCESS_KEY_ID"), getenv('ALIBABA_CLOUD_ACCESS_KEY_SECRET'));
        $params = $params = new Params([
            // 接口名称
            "action" => "DescribeCdnUserQuota",
            // 接口版本
            "version" => "2018-05-10",
            // 接口协议
            "protocol" => "HTTPS",
            // 接口 HTTP 方法
            "method" => "POST",
            "authType" => "AK",
            "style" => "RPC",
            // 接口 PATH
            "pathname" => "/",
            // 接口请求体内容格式
            "reqBodyType" => "json",
            // 接口响应体内容格式
            "bodyType" => "json"
        ]);
        // runtime options
        $runtime = new RuntimeOptions([]);
        $request = new OpenApiRequest([]);
        // 复制代码运行请自行打印 API 的返回值
        // 返回值为 Map 类型，可从 Map 中获得三类数据：响应体 body、响应头 headers、HTTP 返回的状态码 statusCode。
        $resp = $client->callApi($params, $request, $runtime);

        echo Utils::toJSONString($resp);
    }
}

