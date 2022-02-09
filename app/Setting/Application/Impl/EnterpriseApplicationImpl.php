<?php declare(strict_types=1);
/**
 * This file is part of Agarwood Cloud.
 *
 * @link     https://www.agarwood-cloud.com
 * @document https://www.agarwood-cloud.com/docs
 * @contact  676786620@qq.com
 * @author   agarwood
 */

namespace App\Setting\Application\Impl;

use App\Setting\Application\EnterpriseApplication;
use App\Setting\Domain\EnterpriseDomain;
use App\Setting\Interfaces\DTO\Enterprise\CreateDTO;
use App\Setting\Interfaces\DTO\Enterprise\IndexDTO;
use App\Setting\Interfaces\DTO\Enterprise\UpdateDTO;
use Swoft\Stdlib\Collection;

/**
 * @\Swoft\Bean\Annotation\Mapping\Bean()
 */
class EnterpriseApplicationImpl implements EnterpriseApplication
{
    /**
     * @\Swoft\Bean\Annotation\Mapping\Inject()
     *
     * @var \App\Setting\Domain\EnterpriseDomain
     */
    public EnterpriseDomain $enterpriseDomain;

    public function indexProvider(IndexDTO $DTO, int $userId = 0): array
    {
        return $this->enterpriseDomain->index($DTO, $userId);
    }

    /**
     * @param CreateDTO $DTO
     *
     * @return Collection
     */
    public function createProvider(CreateDTO $DTO): Collection
    {
        $this->enterpriseDomain->create($DTO);
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
        return $this->enterpriseDomain->delete($ids);
    }

    /**
     * @param int       $id
     * @param UpdateDTO $DTO
     *
     * @return Collection
     */
    public function updateProvider(int $id, UpdateDTO $DTO): Collection
    {
        $this->enterpriseDomain->update($uuid, $DTO);
        return Collection::make($DTO);
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function viewProvider(int $id): array
    {
        return $this->enterpriseDomain->view($uuid);
    }
}
