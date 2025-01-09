<?php

namespace Tests\Unit;

use App\Rules\ValidDirectory;
use Exception;

class ValidDirectoryTest extends AbstractFileTest
{
    public function testDirectoryExistsPasses(): void
    {
        $rule = new ValidDirectory();

        $this->assertNull($rule->validate('normalized_path', $this->getTempDir(), fn () => null));
    }

    public function testDirectoryExistsFails(): void
    {
        $rule = new ValidDirectory();

        $this->expectExceptionMessage('The normalized_path must exist and be a directory.');
        $rule->validate('normalized_path', '/non/existing/directory', fn ($message) => throw new Exception($message));

        $file = $this->getTempFile();
        $this->expectExceptionMessage('The normalized_path must exist and be a directory.');
        $rule->validate(
            /**
             * @throws Exception
             */
            'normalized_path',
            $file,
            fn ($message) => throw new Exception($message)
        );
        $this->cleanFiles();
    }
}
