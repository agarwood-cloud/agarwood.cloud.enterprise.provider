<?php declare(strict_types=1);
/**
 * This file is part of Agarwood Cloud.
 *
 * @link     https://www.agarwood-cloud.com
 * @document https://www.agarwood-cloud.com/docs
 * @contact  676786620@qq.com
 * @author   agarwood
 */

namespace App\Setting\Domain\Impl;

use App\Setting\Domain\Aggregate\Repository\EnterpriseCommandRepository;
use App\Setting\Domain\Aggregate\Repository\EnterpriseQueryRepository;
use App\Setting\Domain\EnterpriseDomain;
use App\Setting\Interfaces\DTO\Enterprise\CreateDTO;
use App\Setting\Interfaces\DTO\Enterprise\IndexDTO;
use Godruoyi\Snowflake\Snowflake;

/**
 * @\Swoft\Bean\Annotation\Mapping\Bean()
 */
class EnterpriseDomainImpl implements EnterpriseDomain
{
    /**
     * @\Swoft\Bean\Annotation\Mapping\Inject()
     *
     * @var \App\Setting\Domain\Aggregate\Repository\EnterpriseQueryRepository
     */
    public EnterpriseQueryRepository $officialAccountsQueryRepository;

    /**
     * @\Swoft\Bean\Annotation\Mapping\Inject()
     *
     * @var \App\Setting\Domain\Aggregate\Repository\EnterpriseCommandRepository
     */
    public EnterpriseCommandRepository $officialAccountsCommandRepository;

    /**
     * @param \App\Setting\Interfaces\DTO\Enterprise\IndexDTO $DTO
     * @param int                                             $userId
     *
     * @return array
     */
    public function index(IndexDTO $DTO, int $userId): array
    {
        // TODO: $userId Auth
        return $this->officialAccountsQueryRepository->index($DTO->toArrayLine());
    }

    /**
     * @param \App\Setting\Interfaces\DTO\Enterprise\CreateDTO $DTO
     *
     * @return bool
     */
    public function create(CreateDTO $DTO): bool
    {
        $attributes       = $DTO->toArrayLine();
        $snowflake        = new Snowflake;
        $attributes['id'] = (int)$snowflake->id();
        return $this->officialAccountsCommandRepository->create($attributes);
    }

    /**
     * @param string $ids
     *
     * @return int
     */
    public function delete(string $ids): int
    {
        return $this->officialAccountsCommandRepository->delete($ids);
    }
}
