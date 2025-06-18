<?php

namespace OzzyCzech\LucideIcons;

use Nette\Bridges\ApplicationLatte\LatteFactory;
use Nette\DI\CompilerExtension;
use Nette\DI\Definitions\FactoryDefinition;

class NetteExtension extends CompilerExtension {

	public function beforeCompile(): void {
		$builder = $this->getContainerBuilder();
		$latteFactoryService = $builder->getByType(LatteFactory::class) ?: 'nette.latteFactory';
		/** @var FactoryDefinition $service */
		$service = $builder->getDefinition($latteFactoryService);
		$extension = $builder->addDefinition($this->prefix('latte.extension'))->setFactory(LatteExtension::class);
		$service->getResultDefinition()->addSetup('addExtension', [$extension]);
	}

}