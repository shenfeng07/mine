<?php
/**
 * MineAdmin is committed to providing solutions for quickly building web applications
 * Please view the LICENSE file that was distributed with this source code,
 * For the full copyright and license information.
 * Thank you very much for using MineAdmin.
 *
 * @Author X.Mo<root@imoi.cn>
 * @Link   https://gitee.com/xmo/MineAdmin
 */

declare(strict_types=1);
namespace Mine\Generator;

use Psr\Container\ContainerInterface;

abstract class MineGenerator
{
    /**
     * @var string
     */
    protected string $stubDir;

    /**
     * @var string
     */
    protected string $namespace;

    /**
     * @var ContainerInterface
     */
    protected ContainerInterface $container;

    public const NO  = 1;
    public const YES = 2;

    /**
     * MineGenerator constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->setStubDir(BASE_PATH . '/vendor/shenfeng07/mine-core/src/Generator/Stubs/');
        $this->container = $container;
    }

    public function getStubDir(): string
    {
        return $this->stubDir;
    }

    public function setStubDir(string $stubDir)
    {
        $this->stubDir = $stubDir;
    }

    /**
     * @return string
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * @param mixed $namespace
     */
    public function setNamespace(string $namespace): void
    {
        $this->namespace = $namespace;
    }

    public function replace(): self
    {
        return $this;
    }
}