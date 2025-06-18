<div align="center">

![Packagist Version](https://img.shields.io/packagist/v/OzzyCzech/latte-lucide-icons?style=for-the-badge)
![Packagist License](https://img.shields.io/packagist/l/OzzyCzech/latte-lucide-icons?style=for-the-badge)
![Packagist Downloads](https://img.shields.io/packagist/dm/OzzyCzech/latte-lucide-icons?style=for-the-badge)

</div>

# Latte Lucide Icons

This package provides a [Latte](https://latte.nette.org/) macro `{lucide}` for
rendering [Lucide icons](https://lucide.dev/) in your Latte / Nette application.

## 🚀 Installation

```shell
composer require ozzyczech/latte-lucide-icons
```

**Requirements:**

- PHP 8.1+
- Nette 3.2+

## ⚙️ Setup

### Option 1: Register via `services.neon`

```neon
extensions:
  lucideIcons: OzzyCzech\LucideIcons\NetteExtension
```

### Option 2: Register via `common.neon` (with custom Latte setup)

```neon
latte:
	strictTypes: yes
	strictParsing: yes
	extensions:
		- App\Presentation\Accessory\LatteExtension
		- OzzyCzech\LucideIcons\LatteExtension
```

### Option 3: Register the macro manually

You can also [register macro](https://latte.nette.org/en/custom-tags) manually:

```php
class MySuperExtensions extends Latte\Extension {
 
public function getTags(): array {
    return [
      'lucide' => OzzyCzech\LucideIcons\LucideNode::create(...),
    ];
  }
}
```

## 🧪 Usage

Use the macro directly in your `.latte` templates:

```latte
<button type="button">
  {lucide "check" class => "text-green-500"} Lucide Check Icon
</button>
```

This renders the following HTML:

```html
<button type="button">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
      class="lucide lucide-check-icon lucide-check text-green-500">
    <path d="M20 6 9 17l-5-5"/>
  </svg>
</button>
```

## 👨‍🔧 Maintainer

Maintained by [Roman Ožana](https://ozana.cz/). Contributions are welcome via issues or pull requests.

## 📄 License

Latte Lucide Icons is open-sourced software licensed under the [MIT license](/LICENSE).