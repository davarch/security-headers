<?php

declare(strict_types=1);

use Davarch\SecurityHeaders\Generators\Basic;
use Davarch\SecurityHeaders\Http\Middleware\SecurityHeader;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

it('can set the strict transport security rules for the response', function (): void {
    $middleware = new SecurityHeader(
        new Basic()
    );

    $response = $middleware->handle(
        request: Request::create(
            uri: '/',
        ),
        next: fn () => new Response(),
    );

    expect(
        $response->headers->get('Strict-Transport-Security'),
    )->toEqual('max-age=31536000; includeSubDomains');
});

it('can set the referrer policy for the response', function (): void {
    $middleware = new SecurityHeader(
        new Basic()
    );

    $response = $middleware->handle(
        request: Request::create(
            uri: '/',
        ),
        next: fn () => new Response(),
    );

    expect(
        $response->headers->get('Referrer-Policy'),
    )->toEqual('no-referrer-when-downgrade');
});

it('can remove a header', function (): void {
    $middleware = new SecurityHeader(
        new Basic()
    );

    $response = $middleware->handle(
        request: Request::create(
            uri: '/',
        ),
        next: fn () => (new Response())->withHeaders(
            headers: [
                'X-Powered-By' => 'PestPHP',
            ]
        ),
    );

    expect(
        $response->headers->all(),
    )->toBeArray()->not->toContain('X-Powered-By');
});

it('can set the permissions policy for the response', function (): void {
    $middleware = new SecurityHeader(
        new Basic()
    );

    $response = $middleware->handle(
        request: Request::create(
            uri: '/',
        ),
        next: fn () => new Response(),
    );

    expect(
        $response->headers->get('Permissions-Policy'),
    )->toEqual('autoplay=(self), camera=(), encrypted-media=(self), fullscreen=(), geolocation=(self), gyroscope=(self), magnetometer=(), microphone=(), midi=(), payment=(), sync-xhr=(self), usb=()');
});

it('can set content type options for the response', function (): void {
    $middleware = new SecurityHeader(
        new Basic()
    );

    $response = $middleware->handle(
        request: Request::create(
            uri: '/',
        ),
        next: fn () => new Response(),
    );

    expect(
        $response->headers->get('X-Content-Type-Options'),
    )->toEqual('nosniff');
});

it('can set the certificate transparency policy for the response', function (): void {
    $middleware = new SecurityHeader(
        new Basic()
    );

    $response = $middleware->handle(
        request: Request::create(
            uri: '/',
        ),
        next: fn () => new Response(),
    );

    expect(
        $response->headers->get('Expect-CT'),
    )->toEqual('enforce, max-age=30');
});
