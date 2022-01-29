<?php declare(strict_types=1);
/**
 * This file is part of Agarwood Cloud.
 *
 * @link     https://www.agarwood-cloud.com
 * @document https://www.agarwood-cloud.com/docs
 * @contact  676786620@qq.com
 * @author   agarwood
 */

namespace App\OfficialAccounts\Application\Impl;

use App\OfficialAccounts\Application\OfficialAccountsApplication;
use App\OfficialAccounts\Domain\OfficialAccountsDomain;
use App\OfficialAccounts\Interfaces\DTO\OfficialAccounts\CreateDTO;
use App\OfficialAccounts\Interfaces\DTO\OfficialAccounts\IndexDTO;
use App\OfficialAccounts\Interfaces\DTO\OfficialAccounts\UpdateDTO;
use Swoft\Stdlib\Collection;

/**
 * @\Swoft\Bean\Annotation\Mapping\Bean()
 */
class OfficialAccountsApplicationImpl implements OfficialAccountsApplication
{
    /**
     * @\Swoft\Bean\Annotation\Mapping\Inject()
     *
     * @var \App\OfficialAccounts\Domain\OfficialAccountsDomain
     */
    public OfficialAccountsDomain $officialAccountsDomain;

    public function indexProvider(IndexDTO $DTO, int $userId = 0): array
    {
        return $this->officialAccountsDomain->index($DTO, $userId);
    }

    /**
     * @param CreateDTO $DTO
     *
     * @return Collection
     */
    public function createProvider(CreateDTO $DTO): Collection
    {
        $this->officialAccountsDomain->create($DTO);
        //这里可以设置更多的返回值
        return Collection::make($DTO);
    }

    /**
     * @param string $ids
     *
     * @return int
     */
    public function deleteProvider(string $ids): int
    {
        return $this->officialAccountsDomain->delete($ids);
    }

    /**
     * @param int       $id
     * @param UpdateDTO $DTO
     *
     * @return Collection
     */
    public function updateProvider(int $id, UpdateDTO $DTO): Collection
    {
        $this->service->update($uuid, $DTO);
        return Collection::make($DTO);
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function viewProvider(int $id): array
    {
        return $this->service->view($uuid);
    }
}
