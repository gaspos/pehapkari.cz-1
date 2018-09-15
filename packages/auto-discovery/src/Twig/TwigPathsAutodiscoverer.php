<?php declare(strict_types=1);

namespace OpenProject\AutoDiscovery\Twig;

use OpenProject\AutoDiscovery\Contract\AutodiscovererInterface;
use OpenProject\AutoDiscovery\Util\Filesystem;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class TwigPathsAutodiscoverer implements AutodiscovererInterface
{
    /**
     * @var ContainerBuilder
     */
    private $containerBuilder;

    /**
     * @var Filesystem
     */
    private $filesystem;

    public function __construct(ContainerBuilder $containerBuilder)
    {
        $this->filesystem = new Filesystem($containerBuilder);
        $this->containerBuilder = $containerBuilder;
    }

    public function autodiscover(): void
    {
        if (! $this->containerBuilder->hasDefinition('twig.loader.filesystem')) {
            return;
        }

        $twigLoaderFilesystemDefinition = $this->containerBuilder->getDefinition('twig.loader.filesystem');

        foreach ($this->filesystem->getTemplatesDirectories() as $templateDirectory) {
            $twigLoaderFilesystemDefinition->addMethodCall('addPath', [$templateDirectory->getRealPath()]);
        }
    }
}
