<div align="center">

![Packagist Version](https://img.shields.io/packagist/v/ozzyczech/latte-lucide-icons?style=for-the-badge)
![Packagist License](https://img.shields.io/packagist/l/ozzyczech/latte-lucide-icons?style=for-the-badge)
![Packagist Downloads](https://img.shields.io/packagist/dm/ozzyczech/latte-lucide-icons?style=for-the-badge)

</div>

# Latte Lucide Icons

This package provides a [Latte](https://latte.nette.org/) macro `{lucide}` for
rendering [Lucide icons](https://lucide.dev/) in your Latte / Nette application.

## Installation

```shell
composer require ozzyczech/latte-lucide-icons
```

Requires PHP 8.1+

Register Latte extension in your Nette application:

```yaml
extensions:
  svgIcons: OzzyCzech\LucideIcons\NetteExtension
```

You can also [register macro](https://latte.nette.org/en/custom-tags) manually:

```php
class MySuperExtensions extends Latte\Extension {
 
public function getTags(): array {
		return [
			'lucide' => LucideNode::create(...),
		];
	}
}
```

## Maintenance

This package is maintained by [Roman Ožana](https://ozana.cz/).

## License

Latte Lucide Icons is open-sourced software licensed under the [MIT license](/LICENSE).