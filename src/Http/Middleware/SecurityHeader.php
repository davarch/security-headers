<?php

declare(strict_types=1);

namespace Davarch\SecurityHeaders\Http\Middleware;

use Closure;
use Davarch\SecurityHeaders\Generators\Generator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final readonly class SecurityHeader
{
    public function __construct(private Generator $generator)
    {
    }

    public function handle(Request $request, Closure $next): Response
    {
        if (false === config('security-headers.enabled')) {
            return $next($request);
        }

        $this->generator->configure();

        /**
         * @var Response $response
         */
        $response = $next($request);

        foreach ($this->generator->getAddingHeaders() as $key => $header) {
            $response->headers->set($key, $header);
        }

        foreach ($this->generator->getRemovingHeaders() as $header) {
            header_remove($header);
            header_remove(mb_strtolower($header));

            $response->headers->remove(
                key: $header,
            );

            $response->headers->remove(
                key: mb_strtolower($header),
            );
        }

        return $response;
    }
}
