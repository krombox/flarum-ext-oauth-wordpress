<?php

namespace Krombox\OAuthWordPress\Providers;

use Flarum\Forum\Auth\Registration;
use FoF\OAuth\Provider;
use League\OAuth2\Client\Provider\AbstractProvider;
use Krombox\OAuth2\Client\Provider\WordPress as WordPressProvider;
use Krombox\OAuth2\Client\Provider\WordPressResourceOwner;

class WordPress extends Provider
{
     /**
     * @var WordPressProvider
     */
    protected $provider;

    public function name(): string
    {
        return 'wordpress';
    }

    public function link(): string
    {
        return 'https://wordpress.org/plugins/oauth2-provider/';
    }

    public function fields(): array
    {
        return [
            'client_id'     => 'required',
            'client_secret' => 'required',
            'domain'        => 'required'
        ];
    }

    public function provider(string $redirectUri): AbstractProvider
    {
        return $this->provider = new WordPressProvider([
            'clientId'     => $this->getSetting('client_id'),
            'clientSecret' => $this->getSetting('client_secret'),
            'domain'       => $this->getSetting('domain'),
            'redirectUri'  => $redirectUri
        ]);


    }

    public function suggestions(Registration $registration, $user, string $token)
    {
        /** @var WordPressResourceOwner $user */
        $this->verifyEmail($email = $user->getEmail());

        $registration
            ->provideTrustedEmail($email)
            ->setPayload($user->toArray());
    }
}
