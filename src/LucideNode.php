<?php

namespace OzzyCzech\LucideIcons;

use DOMDocument;
use Generator;
use Latte\CompileException;
use Latte\Compiler\Nodes\Php\Scalar\StringNode;
use Latte\Compiler\Nodes\StatementNode;
use Latte\Compiler\PrintContext;
use Latte\Compiler\Tag;
use LogicException;
use Nette\IOException;
use Nette\Utils\FileSystem;
use function implode;
use function sprintf;

class LucideNode extends StatementNode {

	/**
	 * Defines the directory where Lucide icons are stored.
	 *
	 * @var string
	 */
	private const IconDir = __DIR__ . '/../node_modules/lucide-static/icons/';

	/**
	 * The SVG content of the Lucide icon.
	 *
	 * @var string
	 */
	public string $svg = '';

	/**
	 * Creates a new LucideNode from a Tag.
	 *
	 * @throws CompileException
	 */
	public static function create(Tag $tag): self {
		$tag->expectArguments(); // e.g. {lucide "icon-name"}
		$node = $tag->node = new self();

		$resource = $tag->parser->parseUnquotedStringOrExpression();
		if (!$resource instanceof StringNode) {
			throw new CompileException('Lucide icon must be a string literal, e.g. {lucide "icon-name"}', $tag->position);
		}

		$cssClasses = [];
		foreach ($tag->parser->parseArguments()->items as $argument) {
			if (!$argument->value instanceof StringNode) {
				throw new CompileException('Lucide icon arguments must be strings', $tag->position);
			}
			if (!$argument->key) {
				throw new CompileException("Value '{$argument->value->value}' must have a key", $tag->position);
			}
			if (!$argument->key instanceof StringNode) {
				throw new CompileException(sprintf("Key for '%s' must be a '%s' but is a '%s'", $argument->value->value, StringNode::class, $argument->key::class), $tag->position);
			}

			$cssClasses[] = match ($argument->key->value) {
				'class' => $argument->value->value,
				default => throw new CompileException("Unknown argument {$argument->key->value} => {$argument->value->value}"),
			};
		}

		// disallow filters
		if ($tag->parser->parseModifier()->filters) {
			throw new LogicException('Modifiers are not allowed', $tag, $resource);
		}

		try {
			$icon = FileSystem::read(self::IconDir . "{$resource->value}.svg");

			$xml = new DOMDocument();
			$xml->loadXML($icon);
			$svgElement = $xml->documentElement;

			// Add the 'lucide' class to the root element
			if ($svgElement->getAttribute('class')) {
				array_unshift($cssClasses, $svgElement->getAttribute('class'));
			}

			// Update the class attribute with the provided CSS classes
			$svgElement->setAttribute('class', implode(' ', $cssClasses));
			$node->svg = $xml->saveXML($svgElement);
		} catch (IOException) {
			throw new LogicException("Icon '{$resource->value}' not found", $tag, $resource);
		}

		return $node;
	}

	public function print(PrintContext $context): string {
		return $context->format(
			'echo %dump %line;',
			$this->svg,
			$this->position,
		);
	}

	public function &getIterator(): Generator {
		false && yield;
	}
}
