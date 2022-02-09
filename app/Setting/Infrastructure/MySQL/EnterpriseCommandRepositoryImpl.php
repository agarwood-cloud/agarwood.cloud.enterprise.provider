<?php declare(strict_types=1);
/**
 * This file is part of Agarwood Cloud.
 *
 * @link     https://www.agarwood-cloud.com
 * @document https://www.agarwood-cloud.com/docs
 * @contact  676786620@qq.com
 * @author   agarwood
 */

namespace App\Setting\Infrastructure\MySQL;

use App\Setting\Domain\Aggregate\Entity\Enterprise;
use App\Setting\Domain\Aggregate\Repository\EnterpriseCommandRepository;
use Carbon\Carbon;
use Swoft\Db\DB;

/**
 * @\Swoft\Bean\Annotation\Mapping\Bean()
 */
class EnterpriseCommandRepositoryImpl implements EnterpriseCommandRepository
{
    /**
     * @param array $attributes
     *
     * @return bool
     */
    public function create(array $attributes): bool
    {
        return DB::table(Enterprise::tableName())
            ->insert($attributes);
    }

    /**
     * @param string $ids
     *
     * @return int
     */
    public function delete(string $ids): int
    {
        return DB::table(Enterprise::tableName())
            ->whereIn('id', explode(',', $ids))
            ->update(['deleted_at' => Carbon::createFromTimestamp(0, 'UTC')->toDateTimeString()]);
    }
}
