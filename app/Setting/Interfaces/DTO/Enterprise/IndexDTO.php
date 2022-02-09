<?php declare(strict_types=1);
/**
 * This file is part of Agarwood Cloud.
 *
 * @link     https://www.agarwood-cloud.com
 * @document https://www.agarwood-cloud.com/docs
 * @contact  676786620@qq.com
 * @author   agarwood
 */

namespace App\Setting\Interfaces\DTO\Enterprise;

use Agarwood\Core\Support\Impl\AbstractBaseDTO;

/**
 * @\Swoft\Validator\Annotation\Mapping\Validator()
 */
class IndexDTO extends AbstractBaseDTO
{
    /**
     * 第 ${page} 页
     *
     * @\Swoft\Validator\Annotation\Mapping\IsInt()
     * @\Swoft\Validator\Annotation\Mapping\Min(value=1)
     *
     * @var int
     */
    public int $page = 1;

    /**
     * 每页共 ${perPage} 条记录
     *
     * @\Swoft\Validator\Annotation\Mapping\IsInt()
     * @\Swoft\Validator\Annotation\Mapping\Min(value=1)
     *
     * @var int
     */
    public int $perPage = 10;

    /**
     * 第 ${page} 页
     *
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * 第 ${page} 页
     *
     * @param int $page
     */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    /**
     * 每页 ${page} 条记录
     *
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * 每页 ${page} 条记录
     *
     * @param int $perPage
     */
    public function setPerPage(int $perPage): void
    {
        $this->perPage = $perPage;
    }
}
