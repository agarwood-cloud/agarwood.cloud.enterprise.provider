<?php declare(strict_types=1);
/**
 * This file is part of Agarwood Cloud.
 *
 * @link     https://www.agarwood-cloud.com
 * @document https://www.agarwood-cloud.com/docs
 * @contact  676786620@qq.com
 * @author   agarwood
 */

namespace App\OfficialAccounts\Domain\Impl;

use App\OfficialAccounts\Domain\Aggregate\Repository\OfficialAccountsCommandRepository;
use App\OfficialAccounts\Domain\Aggregate\Repository\OfficialAccountsQueryRepository;
use App\OfficialAccounts\Domain\OfficialAccountsDomain;
use App\OfficialAccounts\Interfaces\DTO\OfficialAccounts\CreateDTO;
use App\OfficialAccounts\Interfaces\DTO\OfficialAccounts\IndexDTO;

/**
 * @\Swoft\Bean\Annotation\Mapping\Bean()
 */
class OfficialAccountsDomainImpl implements OfficialAccountsDomain
{
    /**
     * @\Swoft\Bean\Annotation\Mapping\Inject()
     *
     * @var \App\OfficialAccounts\Domain\Aggregate\Repository\OfficialAccountsQueryRepository
     */
    public OfficialAccountsQueryRepository $officialAccountsQueryRepository;

    /**
     * @\Swoft\Bean\Annotation\Mapping\Inject()
     *
     * @var \App\OfficialAccounts\Domain\Aggregate\Repository\OfficialAccountsCommandRepository
     */
    public OfficialAccountsCommandRepository $officialAccountsCommandRepository;

    /**
     * @param \App\OfficialAccounts\Interfaces\DTO\OfficialAccounts\IndexDTO $DTO
     * @param int                                                            $userId
     *
     * @return array
     */
    public function index(IndexDTO $DTO, int $userId): array
    {
        // TODO: $userId Auth
        return $this->officialAccountsQueryRepository->index($DTO->toArrayLine());
    }

    /**
     * @param \App\OfficialAccounts\Interfaces\DTO\OfficialAccounts\CreateDTO $DTO
     *
     * @return bool
     */
    public function create(CreateDTO $DTO): bool
    {
        // todo 加入属性
        $attributes = $DTO->toArrayLine();
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
