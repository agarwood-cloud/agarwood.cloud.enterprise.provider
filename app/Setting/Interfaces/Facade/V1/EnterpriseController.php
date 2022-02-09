<?php declare(strict_types=1);
/**
 * This file is part of Agarwood Cloud.
 *
 * @link     https://www.agarwood-cloud.com
 * @document https://www.agarwood-cloud.com/docs
 * @contact  676786620@qq.com
 * @author   agarwood
 */

namespace App\Setting\Interfaces\Facade\V1;

use Agarwood\Core\Support\Impl\AbstractBaseController;
use App\Setting\Application\EnterpriseApplication;
use App\Setting\Interfaces\Assembler\EnterpriseAssembler;
use App\Setting\Interfaces\DTO\Enterprise\CreateDTO;
use App\Setting\Interfaces\DTO\Enterprise\IndexDTO;
use App\Setting\Interfaces\DTO\Enterprise\UpdateDTO;
use App\Support\Middleware\OAuthJWTMiddleware;
use App\Support\ParsingToken;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\Middleware;
use Swoft\Http\Server\Annotation\Mapping\Middlewares;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Validator\Annotation\Mapping\Validate;
use Swoft\Validator\Annotation\Mapping\ValidateType;

/**
 * @Controller(prefix="/setting/v1")
 *  * @Middlewares({
 *     @Middleware(OAuthJWTMiddleware::class)
 * })
 */
class EnterpriseController extends AbstractBaseController
{
    /**
     * @\Swoft\Bean\Annotation\Mapping\Inject()
     *
     * @var EnterpriseApplication $application
     */
    public EnterpriseApplication $application;

    /**
     * @\Swoft\Bean\Annotation\Mapping\Inject()
     *
     * @var \App\Support\ParsingToken $parsingToken
     */
    public ParsingToken $parsingToken;

    /**
     * Get Enterprise List
     *
     * @RequestMapping(route="enterprise", method={ RequestMethod::GET })
     * @Validate(validator=IndexDTO::class, type=ValidateType::GET)
     * @param Request $request
     *
     * @return Response
     */
    public function actionIndex(Request $request): Response
    {
        $dto = EnterpriseAssembler::attributesToIndexDTO($request->getQueryParams());
        return $this->wrapper()->setData(
            $this->application->indexProvider(
                $dto,
                (int)$this->parsingToken->getUserId()
            )
        )->response();
    }

    /**
     * Create Enterprise
     *
     * @param Request  $request
     * @param Response $response
     *
     * @RequestMapping(route="enterprise", method={ RequestMethod::POST })
     * @Validate(validator=CreateDTO::class, type=ValidateType::BODY)
     *
     * @return Response
     */
    public function actionCreate(Request $request, Response $response): Response
    {
        $dto = EnterpriseAssembler::attributesToCreateDTO($request->getParsedBody());
        return $this->wrapper()->setData(
            $this->application->createProvider($dto)
        )->response($response->withStatus(201));
    }

    /**
     * Update Enterprise
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     * @Validate(validator=UpdateDTO::class, type=ValidateType::BODY)
     * @RequestMapping(route="enterprise/{id}", method={RequestMethod::PUT, RequestMethod::PATCH})
     */
    public function actionUpdate(Request $request, int $id): Response
    {
        $dto = EnterpriseAssembler::attributesToUpdateDTO($request->getParsedBody());
        return $this->wrapper()->setData(
            $this->application->updateProvider($id, $dto)
        )->response();
    }

    /**
     * Delete Enterprise
     *
     * @RequestMapping(route="enterprise/{ids}", method={ RequestMethod::DELETE })
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
     * @RequestMapping(route="enterprise/{id}", method={RequestMethod::GET})
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
