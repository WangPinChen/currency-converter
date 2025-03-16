<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\View\View;
use OpenApi\Annotations as OA;
use OpenApi\Generator;

/**
 * ApiDocController
 * 
 *  * @OA\OpenApi(
 *     @OA\Server(
 *         url="http://127.0.0.1:8000",
 *         description="[Dev] APIs server"
 *     ),
 *     @OA\Info(
 *         version="1.0.0",
 *         title="APIs",
 *         description="APIs document that based on Swagger OpenAPI",
 *         termsOfService="http://swagger.io/terms/",
 *         @OA\Contact(name="Wang Pin Chen", email="r17369@gmail.com"),
 *         @OA\License(name="MIT", identifier="MIT")
 *     ),
 * )
 * 
 * @author Wang Pin Chen <r17369@gmail.com>
 */
class ApiDocController extends Controller
{
    /**
     * Display the API documentation.
     * 
     * @return View
     */
    public function index(): View
    {
        return view('apiDoc');
    }

    /**
     * Get the API documentation in YAML format.
     * 
     * @return Response
     */
    public function yaml(): Response
    {
        $modelPath = base_path('app/Models');
        $controllerPath = base_path('app/Http/Controllers');
        $openapi = Generator::scan([$modelPath, $controllerPath]);

        return response($openapi->toYaml(), 200, [
            'Content-Type' => 'application/x-yaml',
        ]);   
    }
}
