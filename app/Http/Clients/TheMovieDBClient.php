<?php

namespace App\Http\Clients;

use Tmdb\Client;
use Tmdb\Event\BeforeRequestEvent;
use Tmdb\Event\Listener\Request\AcceptJsonRequestListener;
use Tmdb\Event\Listener\Request\ApiTokenRequestListener;
use Tmdb\Event\Listener\Request\ContentTypeJsonRequestListener;
use Tmdb\Event\Listener\Request\UserAgentRequestListener;
use Tmdb\Event\Listener\RequestListener;
use Tmdb\Event\RequestEvent;
use Tmdb\Token\Api\ApiToken;
use Tmdb\Token\Api\BearerToken;
use Symfony\Component\EventDispatcher\EventDispatcher;

class TheMovieDBClient extends Client
{
    public function __construct(string $token)
    {
        $token = new ApiToken($token);

        $ed = new EventDispatcher();

        parent::__construct(
            [
                'api_token' => $token,
                'secure' => false,
                'event_dispatcher' => [
                    'adapter' => $ed
                ],
                // We make use of PSR-17 and PSR-18 auto discovery to automatically guess these, but preferably set these explicitly.
                'http' => [
                    'client' => null,
                    'request_factory' => null,
                    'response_factory' => null,
                    'stream_factory' => null,
                    'uri_factory' => null,
                ]
            ]
        );

        $this->setupListeners($ed);

        return $this;
    }

    private function setupListeners(EventDispatcher $ed) {
        /**
         * Required event listeners and events to be registered with the PSR-14 Event Dispatcher.
         */
        $requestListener = new RequestListener($this->getHttpClient(), $ed);
        $ed->addListener(RequestEvent::class, $requestListener);

        $apiTokenListener = new ApiTokenRequestListener($this->getToken());
        $ed->addListener(BeforeRequestEvent::class, $apiTokenListener);

        $acceptJsonListener = new AcceptJsonRequestListener();
        $ed->addListener(BeforeRequestEvent::class, $acceptJsonListener);

        $jsonContentTypeListener = new ContentTypeJsonRequestListener();
        $ed->addListener(BeforeRequestEvent::class, $jsonContentTypeListener);

        $userAgentListener = new UserAgentRequestListener();
        $ed->addListener(BeforeRequestEvent::class, $userAgentListener);
    }

}