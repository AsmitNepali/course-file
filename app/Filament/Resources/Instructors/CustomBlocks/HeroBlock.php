<?php

namespace App\Filament\Resources\Instructors\CustomBlocks;

use Filament\Forms\Components\RichEditor\RichContentCustomBlock;

class HeroBlock extends RichContentCustomBlock
{
    public static function getId(): string
    {
        return 'hero';
    }

    public static function getLabel(): string
    {
        return 'Hero section';
    }

    public static function toPreviewHtml(array $config): string
    {
        return <<<HTML
<div class="hero-block">
    <h1> Hello World! </h1>
    <p> This is a hero section </p>
</div>
HTML;

    }


    /**
     * @param  array<string, mixed>  $config
     */
    public static function getPreviewLabel(array $config): string
    {
        return "Hero section";
    }
}
