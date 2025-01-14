<?php

namespace Helpers;

use App\Helpers\SlugHelper;
use Tests\Unit\AbstractTestFile;

class SlugHelperTest extends AbstractTestFile
{
    public function testSlugifySeparator(): void
    {
        $this->assertEquals('lala-lele', SlugHelper::slugify('LaLa-----------------LELe'));
    }

    public function testSlugifySpecialchars(): void
    {
        $this->assertEquals('o-meu-coracao-nao-vale-100-at', SlugHelper::slugify('O meu coração não vale 100@!'));
    }
}
