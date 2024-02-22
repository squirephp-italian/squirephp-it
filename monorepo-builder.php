<?php
    
    use Symplify\MonorepoBuilder\Config\MBConfig;
    use Symplify\MonorepoBuilder\Release\ReleaseWorker\PushNextDevReleaseWorker;
    use Symplify\MonorepoBuilder\Release\ReleaseWorker\PushTagReleaseWorker;
    use Symplify\MonorepoBuilder\ComposerJsonManipulator\ValueObject\ComposerJsonSection;
    use Symplify\MonorepoBuilder\Release\ReleaseWorker\SetCurrentMutualDependenciesReleaseWorker;
    use Symplify\MonorepoBuilder\Release\ReleaseWorker\SetNextMutualDependenciesReleaseWorker;
    use Symplify\MonorepoBuilder\Release\ReleaseWorker\TagVersionReleaseWorker;
    use Symplify\MonorepoBuilder\Release\ReleaseWorker\UpdateBranchAliasReleaseWorker;
    use Symplify\MonorepoBuilder\Release\ReleaseWorker\UpdateReplaceReleaseWorker;
    
    return static function (MBConfig $mbConfig): void {
        $mbConfig->packageDirectories([
            __DIR__ . '/packages',
        ]);
        
        $mbConfig->dataToAppend([
            ComposerJsonSection::AUTOLOAD => [
                'psr-4' => [
                    'Squire\\' => 'src',
                ],
            ],
            ComposerJsonSection::REQUIRE => [
                'php' => '^8.0',
                'illuminate/support' => '^8.0|^9.0|^10.0',
                'squirephp/repository' => '^3.4',
            ],
            ComposerJsonSection::REQUIRE_DEV => [
                'symplify/monorepo-builder' => '^9.4.21',
            ],
            ComposerJsonSection::MINIMUM_STABILITY => 'dev',
            ComposerJsonSection::PREFER_STABLE => true,
        ]);
        
        $mbConfig->dataToRemove([
            ComposerJsonSection::MINIMUM_STABILITY => '*',
        ]);
        
        # Release workers - in order to execute
        $mbConfig->workers([
            UpdateReplaceReleaseWorker::class,
            SetCurrentMutualDependenciesReleaseWorker::class,
            TagVersionReleaseWorker::class,
            PushTagReleaseWorker::class,
            SetNextMutualDependenciesReleaseWorker::class,
            UpdateBranchAliasReleaseWorker::class,
            PushNextDevReleaseWorker::class,
        ]);
    };
