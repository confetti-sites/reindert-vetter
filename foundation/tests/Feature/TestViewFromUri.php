<?php /** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

namespace Tests\Feature;

use Foundation\Render\BladeOneService;
use PHPUnit\Framework\TestCase;

class TestViewFromUri extends TestCase
{
    public function test_empty_uri(): void
    {
        [$dir, $view] = BladeOneService::getViewFromUri('/var/repository', '');

        $this->assertSame('/var/repository', $dir);
        $this->assertSame('index', $view);
    }

    public function test_uri_with_one_slash(): void
    {
        [$dir, $view] = BladeOneService::getViewFromUri('/var/repository', '');

        $this->assertSame('/var/repository', $dir);
        $this->assertSame('index', $view);
    }

    public function test_uri_with_one_slash_and_text(): void
    {
        [$dir, $view] = BladeOneService::getViewFromUri('/var/repository', 'test');

        $this->assertSame('/var/repository', $dir);
        $this->assertSame('index', $view);
    }

    public function test_uri_with_blade(): void
    {
        [$dir, $view] = BladeOneService::getViewFromUri('/var/repository', 'object/test.blade.php');

        $this->assertSame('/var/repository', $dir);
        $this->assertSame('test', $view);
    }

    public function test_uri_with_directory_and_view(): void
    {
        [$dir, $view] = BladeOneService::getViewFromUri('/var/repository', 'object/test/test2.blade.php');

        $this->assertSame('/var/repository/test', $dir);
        $this->assertSame('test2', $view);
    }

    public function test_uri_with_multiple_directories_and_view(): void
    {
        [$dir, $view] = BladeOneService::getViewFromUri('/var/repository', 'object/test/test2/test3.blade.php');

        $this->assertSame('/var/repository/test/test2', $dir);
        $this->assertSame('test3', $view);
    }
}
