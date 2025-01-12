@php use Confetti\Helpers\Decoration; @endphp
@php
    ComponentConfig::new(
        name: 'image',
        decorations: [
            Decoration::HELP,
            Decoration::REQUIRED,
        ],
        contentOfFakeMethod: file_get_contents(__DIR__ . '/../mock/image.component.fake_method.php'),
    )
@endphp
