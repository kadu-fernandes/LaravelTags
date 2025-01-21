<?php

namespace Tests\Unit\Helpers;

use App\Exceptions\InvalidPathException;
use App\Helpers\NormalizedPathHelper;
use Tests\Unit\AbstractTestFile;

class NormalizedPathHelperTest extends AbstractTestFile
{
    /**
     * @throws InvalidPathException
     */
    public function testNormalizeDirectoryWithValidPath(): void
    {
        $tempDir = $this->getTempDir();

        $this->assertEquals($tempDir, NormalizedPathHelper::normalizeDirectory("       {$tempDir}          "));
    }

    /**
     * @throws InvalidPathException
     */
    public function testNormalizeDirectoryWithHome(): void
    {
        $this->assertEquals(env('HOME'), NormalizedPathHelper::normalizeDirectory('~'));
    }

    /**
     * @throws InvalidPathException
     */
    public function testNormalizeFileWithValidPath(): void
    {
        $tempFile = $this->getTempFile();

        $this->assertEquals($tempFile, NormalizedPathHelper::normalizeFile($tempFile));

        $this->cleanFiles();
    }

    public function testNormalizeDirectoryThrowsExceptionForFile(): void
    {
        $tempFile = $this->getTempFile();

        $this->expectException(InvalidPathException::class);

        NormalizedPathHelper::normalizeDirectory($tempFile);

        $this->cleanFiles();
    }

    public function testNormalizeFileThrowsExceptionForDirectory(): void
    {
        $this->expectException(InvalidPathException::class);

        NormalizedPathHelper::normalizeFile($this->getTempDir());
    }

    public function testNormalizePathRejectsSymbolicLinks(): void
    {
        $linkFile = $this->getSymlink();

        $this->expectException(InvalidPathException::class);

        NormalizedPathHelper::normalizeFile($linkFile);
    }

    /**
     * @throws InvalidPathException
     */
    public function testAssertExtensionIsValid(): void
    {
        $tempFile = $this->getTempMarkdownFile();

        NormalizedPathHelper::assertExtension($tempFile);

        $this->assertTrue(true);
    }

    public function testAssertExtensionIsInvalid(): void
    {
        $tempFile = $this->getTempFile();

        $this->expectException(InvalidPathException::class);

        NormalizedPathHelper::assertExtension($tempFile);
    }
}
