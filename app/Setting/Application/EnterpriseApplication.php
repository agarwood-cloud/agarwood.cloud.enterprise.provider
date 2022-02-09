<?php declare(strict_types=1);
/**
 * This file is part of Agarwood Cloud.
 *
 * @link     https://www.agarwood-cloud.com
 * @document https://www.agarwood-cloud.com/docs
 * @contact  676786620@qq.com
 * @author   agarwood
 */

namespace App\Setting\Application;

use App\Setting\Interfaces\DTO\Enterprise\CreateDTO;
use App\Setting\Interfaces\DTO\Enterprise\IndexDTO;
use App\Setting\Interfaces\DTO\Enterprise\UpdateDTO;
use Swoft\Stdlib\Collection;

/**
 * @\Swoft\Bean\Annotation\Mapping\Bean()
 */
interface EnterpriseApplication
{
    /**
     * official accounts
     *
     * @param IndexDTO $DTO
     * @param int      $userId
     *
     * @return array
     */
    public function indexProvider(IndexDTO $DTO, int $userId = 0): array;

    /**
     * create official accounts
     *
     * @param CreateDTO $DTO
     *
     * @return Collection
     */
    public function createProvider(CreateDTO $DTO): Collection;

    /**
     * delete
     *
     * @param string $ids
     *
     * @return int
     */
    public function deleteProvider(string $ids): int;

    /**
     * update
     *
     * @param int    $id
     * @param UpdateDTO $DTO
     *
     * @return Collection
     */
    public function updateProvider(int $id, UpdateDTO $DTO): Collection;

    /**
     * view info
     *
     * @param int $id
     *
     * @return array
     */
    public function viewProvider(int $id): array;
}
