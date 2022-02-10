<?php declare(strict_types=1);
/**
 * This file is part of Agarwood Cloud.
 *
 * @link     https://www.agarwood-cloud.com
 * @document https://www.agarwood-cloud.com/docs
 * @contact  676786620@qq.com
 * @author   agarwood
 */

namespace App\OfficialAccounts\Interfaces\DTO\OfficialAccounts;

use Agarwood\Core\Support\Impl\AbstractBaseDTO;

/**
 * @\Swoft\Validator\Annotation\Mapping\Validator()
 */
class CreateDTO extends AbstractBaseDTO
{
    /**
     * @\Swoft\Validator\Annotation\Mapping\IsInt()
     * @\Swoft\Validator\Annotation\Mapping\Required()
     * @\Swoft\Validator\Annotation\Mapping\NotEmpty()
     *
     * @var int
     */
    public int $id = 0;

    /**
     * @\Swoft\Validator\Annotation\Mapping\IsInt()
     * @\Swoft\Validator\Annotation\Mapping\Required()
     * @\Swoft\Validator\Annotation\Mapping\NotEmpty()
     *
     * @var int
     */
    public int $enterpriseId = 0;

    /**
     * 账号名称
     *
     * @\Swoft\Validator\Annotation\Mapping\IsString()
     * @\Swoft\Validator\Annotation\Mapping\Required()
     * @\Swoft\Validator\Annotation\Mapping\NotEmpty()
     *
     * @var string
     */
    public string $account = '';

    /**
     *
     * @\Swoft\Validator\Annotation\Mapping\IsString()
     * @\Swoft\Validator\Annotation\Mapping\Required()
     * @\Swoft\Validator\Annotation\Mapping\NotEmpty()
     *
     * @var string
     */
    public string $appId = '';

    /**
     *
     * @\Swoft\Validator\Annotation\Mapping\IsString()
     * @\Swoft\Validator\Annotation\Mapping\Required()
     * @\Swoft\Validator\Annotation\Mapping\NotEmpty()
     *
     * @var string
     */
    public string $secret = '';

    /**
     * 消息加解密密钥
     *
     * @\Swoft\Validator\Annotation\Mapping\IsString()
     * @\Swoft\Validator\Annotation\Mapping\Required()
     * @\Swoft\Validator\Annotation\Mapping\NotEmpty()
     *
     * @var string
     */
    public string $encodingAesKey = '';

    /**
     * @return int
     */
    public function getEnterpriseId(): int
    {
        return $this->enterpriseId;
    }

    /**
     * @param int $enterpriseId
     */
    public function setEnterpriseId(int $enterpriseId): void
    {
        $this->enterpriseId = $enterpriseId;
    }

    /**
     * @return string
     */
    public function getAccount(): string
    {
        return $this->account;
    }

    /**
     * @param string $account
     */
    public function setAccount(string $account): void
    {
        $this->account = $account;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @param string $appId
     */
    public function setAppId(string $appId): void
    {
        $this->appId = $appId;
    }

    /**
     * @return string
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

    /**
     * @param string $secret
     */
    public function setSecret(string $secret): void
    {
        $this->secret = $secret;
    }

    /**
     * @return string
     */
    public function getEncodingAesKey(): string
    {
        return $this->encodingAesKey;
    }

    /**
     * @param string $encodingAesKey
     */
    public function setEncodingAesKey(string $encodingAesKey): void
    {
        $this->encodingAesKey = $encodingAesKey;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
