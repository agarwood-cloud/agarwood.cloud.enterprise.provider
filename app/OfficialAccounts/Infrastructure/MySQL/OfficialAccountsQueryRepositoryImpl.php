<?php declare(strict_types=1);
/**
 * This file is part of Agarwood Cloud.
 *
 * @link     https://www.agarwood-cloud.com
 * @document https://www.agarwood-cloud.com/docs
 * @contact  676786620@qq.com
 * @author   agarwood
 */

namespace App\OfficialAccounts\Infrastructure\MySQL;

use App\OfficialAccounts\Domain\Aggregate\Entity\OfficialAccounts;
use App\OfficialAccounts\Domain\Aggregate\Repository\OfficialAccountsQueryRepository;
use Swoft\Db\DB;

/**
 * @\Swoft\Bean\Annotation\Mapping\Bean()
 */
class OfficialAccountsQueryRepositoryImpl implements OfficialAccountsQueryRepository
{
    /**
     * @param array $filter
     *
     * @return array
     */
    public function index(array $filter): array
    {
        return DB::table(OfficialAccounts::tableName())
            ->select(
                'id',
                'account',
            )
            ->paginate($filter['page'], $filter['per_page']);
    }
}
