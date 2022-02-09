<?php declare(strict_types=1);
/**
 * This file is part of Agarwood Cloud.
 *
 * @link     https://www.agarwood-cloud.com
 * @document https://www.agarwood-cloud.com/docs
 * @contact  676786620@qq.com
 * @author   agarwood
 */

namespace App\Setting\Interfaces\Assembler;

use App\Setting\Interfaces\DTO\Enterprise\CreateDTO;
use App\Setting\Interfaces\DTO\Enterprise\IndexDTO;
use App\Setting\Interfaces\DTO\Enterprise\UpdateDTO;
use Swoft\Stdlib\Helper\ObjectHelper;

class EnterpriseAssembler
{
    /**
     * Assembler
     *
     * @param array $attributes
     *
     * @return  IndexDTO 服务号列表 DTO
     */
    public static function attributesToIndexDTO(array $attributes): IndexDTO
    {
        return ObjectHelper::init(new IndexDTO(), $attributes);
    }

    /**
     * @param array $attributes
     *
     * @return CreateDTO
     */
    public static function attributesToCreateDTO(array $attributes): CreateDTO
    {
        return ObjectHelper::init(new CreateDTO(), $attributes);
    }

    /**
     * Assembler
     *
     * @param array $attributes
     *
     * @return UpdateDTO
     */
    public static function attributesToUpdateDTO(array $attributes): UpdateDTO
    {
        return ObjectHelper::init(new UpdateDTO(), $attributes);
    }
}
