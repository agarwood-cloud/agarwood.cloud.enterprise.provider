<?php declare(strict_types=1);
/**
 * This file is part of Agarwood Cloud.
 *
 * @link     https://www.agarwood-cloud.com
 * @document https://www.agarwood-cloud.com/docs
 * @contact  676786620@qq.com
 * @author   agarwood
 */

namespace App\OfficialAccounts\Interfaces\Rpc\Server;

use Agarwood\Rpc\MallCenter\MallCenterOfficialAccountsRpcInterface;
use App\OfficialAccounts\Domain\Aggregate\Entity\OfficialAccounts;
use Swoft\Db\DB;

/**
 * @\Swoft\Rpc\Server\Annotation\Mapping\Service()
 */
class MallCenterOfficialAccountsRpcImpl implements MallCenterOfficialAccountsRpcInterface
{
    /**
     * @param int $platformId
     *
     * @return array
     */
    public function officialAccountsConfig(int $platformId): array
    {
        $officialAccount = DB::table(OfficialAccounts::tableName())
            ->where('platform_id', '=', $platformId)
            ->firstArray();

        if (!$officialAccount) {
            return [];
        }

        //返回配置信息
        return [
            /**
             * 账号基本信息，请从微信公众平台/开放平台获取
             */
            'app_id'        => $officialAccount['app_id'],                    // AppID
            'secret'        => $officialAccount['secret'],                   // AppSecret
            'token'         => $officialAccount['token'],                    // Token
            'aes_key'       => $officialAccount['aes_key'],            // EncodingAESKey，兼容与安全模式下请一定要填写！！！

            /**
             * 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
             * 使用自定义类名时，构造函数将会接收一个 `EasyWeChat\Kernel\Http\Response` 实例
             */
            'response_type' => 'array',

            /**
             * 日志配置
             *
             * level: 日志级别, 可选为：
             *         debug/info/notice/warning/error/critical/alert/emergency
             * path：日志文件位置(绝对路径!!!)，要求可写权限
             */
            'log'           => [
                'default'  => 'prod', // 默认使用的 channel，生产环境可以改为下面的 prod
                'channels' => [
                    // 测试环境
                    'dev'  => [
                        'driver' => 'single',
                        'path'   => '/var/www/agarwood/runtime/logs/dev-easy-wechat.log',
                        'level'  => 'debug',
                    ],
                    // 生产环境
                    'prod' => [
                        'driver' => 'daily',
                        'path'   => '/var/www/agarwood/runtime/logs/easy-wechat.log',
                        'level'  => 'error',
                    ],
                ],
            ],

            /**
             * 接口请求相关配置，超时时间等，具体可用参数请参考：
             * http://docs.guzzlephp.org/en/stable/request-config.html
             *
             * - retries: 重试次数，默认 1，指定当 http 请求失败时重试的次数。
             * - retry_delay: 重试延迟间隔（单位：ms），默认 500
             * - log_template: 指定 HTTP 日志模板，请参考：https://github.com/guzzle/guzzle/blob/master/src/MessageFormatter.php
             */
            'http'          => [
                'max_retries' => 1,
                'retry_delay' => 500,
                'timeout'     => 5.0,
                // 'base_uri' => 'https://api.weixin.qq.com/', // 如果你在国外想要覆盖默认的 url 的时候才使用，根据不同的模块配置不同的 uri
            ],

            /**
             * OAuth 配置
             *
             * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
             * callback：OAuth授权完成后的回调页地址
             */
            'oauth'         => [
                'scopes'   => ['snsapi_userinfo'],
                'callback' => config('wechat.callback'),
            ],
        ];
    }

    /**
     * @param int $enterpriseId
     *
     * @return array
     */
    public function officialAccounts(int $enterpriseId): array
    {
        return DB::table(OfficialAccounts::tableName())
            ->where('enterprise_id', $enterpriseId)
            ->get()
            ->toArray();
    }

    /**
     * @param int $platformId
     *
     * @return array
     */
    public function officialAccountsInfo(int $platformId): array
    {
        return DB::table(OfficialAccounts::tableName())
            ->where('platform_id', $platformId)
            ->firstArray();
    }
}
