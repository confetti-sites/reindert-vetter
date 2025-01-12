@php
    use Confetti\Helpers\Decoration;
    echo(new ComponentConfig(
        name: 'image',
        decorations: [
            Decoration::HELP,
            Decoration::REQUIRED,
        ],
        contentOfFakeMethod: file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'image.component.fake_method.php'),
    ))->jsonEncode();
@endphp
