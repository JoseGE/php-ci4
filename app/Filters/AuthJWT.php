<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponsableInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class AuthJWT implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $authHeader = $request->getServer("HTTP_AUTHORIZATION");
        if (is_null($authHeader)) {
            return Services::response()
                ->setJSON(["message" => "Unauthorized"])
                ->setStatusCode(401);
        }

        try {
            $token = explode(" ", $authHeader)[1] ?? null;

            $payload = \Firebase\JWT\JWT::decode(
                $token,
                new \Firebase\JWT\Key("municipia", "HS256")
            );
        } catch (\Exception $e) {
            if ($e instanceof \Firebase\JWT\ExpiredException) {
                return Services::response()
                    ->setJSON(["message" => "Unauthorized"])
                    ->setStatusCode(401);
            }
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        //
    }
}
