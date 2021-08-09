<?php declare(strict_types=1);
/**
 * @author Nicolas CARPi <nico-git@deltablot.email>
 * @copyright 2012 Nicolas CARPi
 * @see https://www.elabftw.net Official website
 * @license AGPL-3.0
 * @package elabftw
 */

namespace Elabftw\Elabftw;

use League\Flysystem\Adapter\Local;
use League\Flysystem\FileNotFoundException;
use League\Flysystem\Filesystem as Fs;

class SqlTest extends \PHPUnit\Framework\TestCase
{
    private Sql $Sql;

    protected function setUp(): void
    {
        $this->Sql = new Sql(new Fs(new Local(dirname(__DIR__, 2) . '/_data')));
    }

    public function testExecFile(): void
    {
        $this->assertTrue($this->Sql->execFile('dummy.sql'));
    }

    public function testExecNonExistingFile(): void
    {
        $this->expectException(FileNotFoundException::class);
        $this->Sql->execFile('purple.sql');
    }
}