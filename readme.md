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
  lucideIcons: OzzyCzech\LucideIcons\NetteExtension
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

## Usage

```latte
<button type="button">
  {lucide "check" class => "text-green-500"} Lucide Check Icon
</button>
```

will render following HTML:

```html
<button type="button">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
      class="lucide lucide-check-icon lucide-check text-green-500">
    <path d="M20 6 9 17l-5-5"/>
  </svg>
</button>
```

## Maintenance

This package is maintained by [Roman Ožana](https://ozana.cz/).

## License

Latte Lucide Icons is open-sourced software licensed under the [MIT license](/LICENSE).