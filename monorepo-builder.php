<?php
    
    use Symplify\MonorepoBuilder\ValueObject\Option;
    use Symplify\MonorepoBuilder\Release\ReleaseWorker\PushNextDevReleaseWorker;
    use Symplify\MonorepoBuilder\Release\ReleaseWorker\PushTagReleaseWorker;
    use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
    use Symplify\MonorepoBuilder\Release\ReleaseWorker\SetCurrentMutualDependenciesReleaseWorker;
    use Symplify\MonorepoBuilder\Release\ReleaseWorker\SetNextMutualDependenciesReleaseWorker;
    use Symplify\MonorepoBuilder\Release\ReleaseWorker\TagVersionReleaseWorker;
    use Symplify\MonorepoBuilder\Release\ReleaseWorker\UpdateBranchAliasReleaseWorker;
    use Symplify\MonorepoBuilder\Release\ReleaseWorker\UpdateReplaceReleaseWorker;
    
    return static function (ContainerConfigurator $containerConfigurator): void {
        $parameters = $containerConfigurator->parameters();
        
        $parameters->set(Option::DEFAULT_BRANCH_NAME, 'main');
        
        $parameters->set(Option::DATA_TO_APPEND, [
            'autoload' => [
                'psr-4' => [
                    'Squire\\' => 'src',
                ],
            ],
            'require' => [
                'php' => '^8.0',
                'illuminate/support' => '^8.0|^9.0|^10.0',
                'squirephp/repository' => '^3.4',
            ],
            'minimum-stability' => 'dev',
            'prefer-stable' => true,
        ]);
        
        $parameters->set(Option::DATA_TO_REMOVE, [
            'minimum-stability' => '*',
        ]);
        
        $services = $containerConfigurator->services();
        
        # Release workers - in order to execute
        $services->set(UpdateReplaceReleaseWorker::class);
        $services->set(SetCurrentMutualDependenciesReleaseWorker::class);
        $services->set(TagVersionReleaseWorker::class);
        $services->set(PushTagReleaseWorker::class);
        $services->set(SetNextMutualDependenciesReleaseWorker::class);
        $services->set(UpdateBranchAliasReleaseWorker::class);
        $services->set(PushNextDevReleaseWorker::class);
    };
