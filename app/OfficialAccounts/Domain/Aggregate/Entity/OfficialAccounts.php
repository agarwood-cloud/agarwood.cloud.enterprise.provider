<?php declare(strict_types=1);
/**
 * This file is part of Agarwood Cloud.
 *
 * @link     https://www.agarwood-cloud.com
 * @document https://www.agarwood-cloud.com/docs
 * @contact  676786620@qq.com
 * @author   agarwood
 */

namespace App\OfficialAccounts\Domain\Aggregate\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;

/**
 *
 * Class OfficialAccounts
 *
 * @since 2.0
 *
 * @Entity(table="official_accounts")
 */
class OfficialAccounts extends Model
{
    /**
     *
     * @Id(incrementing=false)
     * @Column()
     *
     * @var int
     */
    private int $id = 0;

    /**
     *
     *
     * @Column(name="enterprise_id", prop="enterpriseId")
     *
     * @var int
     */
    private int $enterpriseId = 0;

    /**
     * 账号名称
     *
     * @Column()
     *
     * @var string
     */
    private string $account = '';

    /**
     *
     *
     * @Column(name="app_id", prop="appId")
     *
     * @var string
     */
    private string $appId = '';

    /**
     *
     *
     * @Column()
     *
     * @var string
     */
    private string $secret = '';

    /**
     * 消息加解密密钥
     *
     * @Column(name="encoding_aes_key", prop="encodingAesKey")
     *
     * @var string
     */
    private string $encodingAesKey = '';

    /**
     *
     *
     * @Column(name="created_at", prop="createdAt")
     *
     * @var string
     */
    private string $createdAt = '';

    /**
     *
     *
     * @Column(name="updated_at", prop="updatedAt")
     *
     * @var string
     */
    private string $updatedAt = '';

    /**
     *
     *
     * @Column(name="deleted_at", prop="deletedAt")
     *
     * @var string
     */
    private string $deletedAt = '';

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
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     */
    public function setUpdatedAt(string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getDeletedAt(): string
    {
        return $this->deletedAt;
    }

    /**
     * @param string $deletedAt
     */
    public function setDeletedAt(string $deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }
}
