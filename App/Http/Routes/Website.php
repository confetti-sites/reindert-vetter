<?php

declare(strict_types=1);

namespace App\Http\Routes;

use App\Http\Entity\View;

class Website
{
    public static function canRender(): bool
    {
        return true;
    }

    /** @noinspection PhpSwitchCanBeReplacedWithMatchExpressionInspection */
    public static function render(): View
    {
        switch (true) {
            case request()->uri() === '/':
                return new View('website.homepage.homepage');
            case request()->uri() === '/waiting-list':
                return new View('website.login');
            case request()->uri() === '/waiting-callback':
                return new View('website.login_callback');
            case request()->uri() === '/auth/callback':
                return new View('website.includes.auth.callback');
            case request()->uri() === '/pricing':
                return new View('website.pricing.pricing');
            case request()->uri() === '/contact':
                return new View('website.contact.contact');
            case request()->uri() === '/privacy-policy':
                return new View('website.privacy-policy.privacy-policy');
            case request()->uri() === '/blogs':
                return new View('website.blog.overview');
            case str_starts_with(request()->uri(), '/blogs/'):
                return new View('website.blog.detail');
            default:
                return new View('website.404');
        }
    }
}