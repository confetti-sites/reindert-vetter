<?php /** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

namespace Feature;

use ConfettiCMS\Foundation\Exceptions\FileNotFoundException;
use ConfettiCMS\Foundation\Render\BladeOneService;
use PHPUnit\Framework\TestCase;

class TestRenderBlade extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        require_once(__DIR__ . '/mock/ComponentFakeInterface.php');
        require_once(__DIR__ . '/mock/ComponentConfig.php');
        require_once(__DIR__ . '/mock/Decoration.php');
        $this->service = new BladeOneService(
            __DIR__ . '/mock',
            __DIR__ . '/cache',
        );
    }

    public function test_render_when_file_has_blade_extension(): void
    {
        $result = $this->service->isCapable('object/show.blade.php');

        $this->assertTrue($result);
    }

    public function test_render_when_file_is_object_but_no_blade_extension(): void
    {
        $result = $this->service->isCapable('object/show.svg');

        $this->assertFalse($result);
    }

    public function test_render_when_file_is_not_a_object_and_no_blade_extension(): void
    {
        $result = $this->service->isCapable('show.blade.php');

        $this->assertTrue($result);
    }

    public function test_show_blade(): void
    {
        $result = $this->service->renderByUrl('object/show.blade.php');

        $this->assertSame('Hello World', trim($result));
    }

    public function test_show_without_valid_file_included(): void
    {
        $e = null;

        try {
            $this->service->renderByUrl('object/show_blade_without_valid_file_included.blade.php');
        } catch (\Exception $e) {
        }

        $this->assertNotNull($e);
    }

    public function test_show_with_php(): void
    {
        $result = $this->service->renderByUrl('object/php_in_blade.blade.php');

        $this->assertStringStartsWith("{\"name\":\"image\",\"decorations\":[\"help\",\"required\"],\"content_of_fake_method\":\"<?php", trim($result));
    }

    public function test_show_with_invalid_file(): void
    {
        $e = null;
        try {
            $this->service->renderByUrl('object/invalid.blade.php');
        } catch (\Exception $e) {
        }

        $this->assertInstanceOf(FileNotFoundException::class, $e);
    }

    public function test_show_once_with_asterisk(): void
    {
        $result = $this->service->renderByUrl('object/php_once.blade.php');

        $this->assertEquals(2, substr_count($result, 'the_script'));
    }

    public function test_show_once_with_asterisk_but_same_keys(): void
    {
        $result = $this->service->renderByUrl('object/php_once_same_keys.blade.php');

        $this->assertEquals(1, substr_count($result, 'the_script'));
    }
}
