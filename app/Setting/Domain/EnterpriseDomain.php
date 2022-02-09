<?php declare(strict_types=1);
/**
 * This file is part of Agarwood Cloud.
 *
 * @link     https://www.agarwood-cloud.com
 * @document https://www.agarwood-cloud.com/docs
 * @contact  676786620@qq.com
 * @author   agarwood
 */

namespace App\Setting\Domain;

use App\Setting\Interfaces\DTO\Enterprise\CreateDTO;
use App\Setting\Interfaces\DTO\Enterprise\IndexDTO;

/**
 * @\Swoft\Bean\Annotation\Mapping\Bean()
 */
interface EnterpriseDomain
{
    /**
     * @param \App\Setting\Interfaces\DTO\Enterprise\IndexDTO $DTO
     * @param int                                                            $userId
     *
     * @return array
     */
    public function index(IndexDTO $DTO, int $userId): array;

    /**
     * @param \App\Setting\Interfaces\DTO\Enterprise\CreateDTO $DTO
     *
     * @return bool
     */
    public function create(CreateDTO $DTO): bool;

    /**
     * @param string $ids
     *
     * @return int
     */
    public function delete(string $ids): int;
}
