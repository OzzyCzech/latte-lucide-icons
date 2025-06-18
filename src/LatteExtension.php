<?php

namespace OzzyCzech\LucideIcons;

use Latte\Extension;

class LatteExtension extends Extension {
	public function getTags(): array {
		return [
			'lucide' => LucideNode::create(...),
		];
	}
}