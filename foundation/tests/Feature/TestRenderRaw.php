<?php /** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

namespace Tests\Feature;

use Foundation\Render\RawService;
use PHPUnit\Framework\TestCase;

class TestRenderRaw extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        require_once(__DIR__ . '/mock/ComponentFakeInterface.php');
        require_once(__DIR__ . '/mock/ComponentConfig.php');
        require_once(__DIR__ . '/mock/Decoration.php');
        $this->service = new RawService(
            __DIR__ . '/mock',
        );
    }

    public function test_render_when_file_has_invalid_extension(): void
    {
        $result = $this->service->isCapable('object/show.blade.php');

        $this->assertFalse($result);
    }

    /**
     * @dataProvider fileExtensionsProvider
     */
    public function test_render_when_file_has_valid_extension(string $fileExtension): void
    {
        $result = $this->service->isCapable('object/show.' . $fileExtension);

        $this->assertTrue($result);
    }

    public function test_render_when_file_is_not_a_object_and_no_blade_extension(): void
    {
        $result = $this->service->isCapable('show.blade.php');

        $this->assertFalse($result);
    }

    public function fileExtensionsProvider(): array
    {
        return [
            ['csv'],
            ['json'],
            ['JPG'],
        ];
    }

    public function test_show_not_existing_file(): void
    {
        $result = $this->service->renderByUrl('object/fake.csv');

        $this->assertSame(404, http_response_code());
        $this->assertSame('404', $result);
    }

    public function test_show_existing_file(): void
    {
        $result = $this->service->renderByUrl('object/show.csv');

        $this->assertSame("id,name,description\n", $result);
    }

    public function test_get_content_type(): void
    {
        $result = $this->service->getContentType('object/show.csv');

        $this->assertSame('text/csv', $result);
    }
}
