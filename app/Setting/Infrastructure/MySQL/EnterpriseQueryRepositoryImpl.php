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
use App\Setting\Domain\Aggregate\Repository\EnterpriseQueryRepository;
use Swoft\Db\DB;

/**
 * @\Swoft\Bean\Annotation\Mapping\Bean()
 */
class EnterpriseQueryRepositoryImpl implements EnterpriseQueryRepository
{
    /**
     * @param array $filter
     *
     * @return array
     */
    public function index(array $filter): array
    {
        return DB::table(Enterprise::tableName())
            ->select(
                'id',
                'company',
            )
            ->paginate($filter['page'], $filter['per_page']);
    }
}
