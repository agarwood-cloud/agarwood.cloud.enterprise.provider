<?php declare(strict_types=1);
/**
 * This file is part of Agarwood Cloud.
 *
 * @link     https://www.agarwood-cloud.com
 * @document https://www.agarwood-cloud.com/docs
 * @contact  676786620@qq.com
 * @author   agarwood
 */

namespace App\OfficialAccounts\Interfaces\Facade\V1;

use Agarwood\Core\Support\Impl\AbstractBaseController;
use App\OfficialAccounts\Application\OfficialAccountsApplication;
use App\OfficialAccounts\Interfaces\Assembler\OfficialAccountsAssembler;
use App\OfficialAccounts\Interfaces\DTO\OfficialAccounts\CreateDTO;
use App\OfficialAccounts\Interfaces\DTO\OfficialAccounts\IndexDTO;
use App\OfficialAccounts\Interfaces\DTO\OfficialAccounts\UpdateDTO;
use App\Support\ParsingToken;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Validator\Annotation\Mapping\Validate;
use Swoft\Validator\Annotation\Mapping\ValidateType;

/**
 * @Controller(prefix="/official-accounts/v1")
 */
class OfficialAccountsController extends AbstractBaseController
{
    /**
     * @\Swoft\Bean\Annotation\Mapping\Inject()
     *
     * @var OfficialAccountsApplication $application
     */
    public OfficialAccountsApplication $application;

    /**
     * @\Swoft\Bean\Annotation\Mapping\Inject()
     *
     * @var \App\Support\ParsingToken $parsingToken
     */
    public ParsingToken $parsingToken;

    /**
     * Get OfficialAccounts List
     *
     * @RequestMapping(route="official-accounts", method={ RequestMethod::GET })
     * @Validate(validator=IndexDTO::class, type=ValidateType::GET)
     * @param Request $request
     *
     * @return Response
     */
    public function actionIndex(Request $request): Response
    {
        $dto = OfficialAccountsAssembler::attributesToIndexDTO($request->getQueryParams());
        return $this->wrapper()->setData(
            $this->application->indexProvider(
                $dto,
                (int)$this->parsingToken->getUserId()
            )
        )->response();
    }

    /**
     * Create OfficialAccounts
     *
     * @param Request  $request
     * @param Response $response
     *
     * @RequestMapping(route="official-accounts", method={ RequestMethod::POST })
     * @Validate(validator=CreateDTO::class, type=ValidateType::BODY)
     *
     * @return Response
     */
    public function actionCreate(Request $request, Response $response): Response
    {
        $dto = OfficialAccountsAssembler::attributesToCreateDTO($request->getParsedBody());
        return $this->wrapper()->setData(
            $this->application->createProvider($dto)
        )->response($response->withStatus(201));
    }

    /**
     * Update OfficialAccounts
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     * @Validate(validator=UpdateDTO::class, type=ValidateType::BODY)
     * @RequestMapping(route="official-accounts/{id}", method={RequestMethod::PUT, RequestMethod::PATCH})
     */
    public function actionUpdate(Request $request, int $id): Response
    {
        $dto = OfficialAccountsAssembler::attributesToUpdateDTO($request->getParsedBody());
        return $this->wrapper()->setData(
            $this->application->updateProvider($id, $dto)
        )->response();
    }

    /**
     * Delete OfficialAccounts
     *
     * @RequestMapping(route="official-accounts/{ids}", method={ RequestMethod::DELETE })
     * @param string   $ids
     * @param Response $response
     *
     * @return Response
     */
    public function actionDelete(string $ids, Response $response): Response
    {
        return $this->wrapper()->setData([
            'result' => $this->application->deleteProvider($ids)
        ])->response($response->withStatus(204));
    }

    /**
     * view info
     *
     * @RequestMapping(route="official-accounts/{id}", method={RequestMethod::GET})
     * @param int $id
     *
     * @return Response
     */
    public function actionView(int $id): Response
    {
        return $this->wrapper()->setData(
            $this->application->viewProvider($id)
        )->response();
    }
}
