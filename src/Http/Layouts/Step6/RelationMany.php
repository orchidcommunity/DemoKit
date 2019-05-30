<?php

declare(strict_types=1);

namespace Orchids\DemoKit\Http\Layouts\Step6;

use Orchid\Screen\Field;
use Orchid\Support\Assert;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Relation.
 *
 * @method self accesskey($value = true)
 * @method self autofocus($value = true)
 * @method self disabled($value = true)
 * @method self form($value = true)
 * @method self name(string $value)
 * @method self required(bool $value = true)
 * @method self size($value = true)
 * @method self tabindex($value = true)
 * @method self help(string $value = null)
 * @method self popover(string $value = null)
 */
class RelationMany extends Field
{
    /**
     * @var string
     */
    public $view = 'orchids/demokit::fields.relation';

    /**
     * Default attributes value.
     *
     * @var array
     */
    public $attributes = [
        'class'         => 'form-control',
        'value'         => [],
        'relationScope' => '',
    ];

    /**
     * @var array
     */
    public $required = [
        'name',
        'relationModel',
        'relationName',
        'relationKey',
        'relationScope',
    ];

    /**
     * Attributes available for a particular tag.
     *
     * @var array
     */
    public $inlineAttributes = [
        'accesskey',
        'autofocus',
        'disabled',
        'form',
        'multiple',
        'name',
        'required',
        'size',
        'tabindex',
    ];

    /**
     * @param string|null $name
     *
     * @return self
     */
    public static function make(string $name = null): self
    {
        return (new static())->name($name);
    }

    /**
     * @return self
     */
    public function multiple(): self
    {
        $this->attributes['multiple'] = 'multiple';

        return $this;
    }

    /**
     * @param string|Model $model
     * @param string       $name
     * @param string|null  $key
     *
     * @return self
     */
    public function fromModel(string $model, string $name, string $key = null): self
    {
        $key = $key ?? (new $model())->getModel()->getKeyName();

        $this->set('relationModel', Crypt::encryptString($model));
        $this->set('relationName', Crypt::encryptString($name));
        $this->set('relationKey', Crypt::encryptString($key));

        $this->addBeforeRender(function () use ($model, $name, $key) {
            $value = $this->get('value');

            if (! is_iterable($value)) {
                $value = Arr::wrap($value);
            }

            if (Assert::isIntArray($value)) {
                $value = $model::whereIn($key, $value)->get();
            }

            $value = collect($value)
                ->map(function ($item) use ($name, $key) {
                    return [
                        'id'   => $item->$key,
                        'text' => $item->$name,
                    ];
                })->toJson();

            $this->set('value', $value);
        });

        return $this;
    }

    /**
     * @param string|Model $model
     * @param string       $name
     * @param string|null  $key
     *
     * @return self
     */
    public function fromClass(string $class, string $name, string $key = null): self
    {
        $key = $key ?? (new $class())->getModel()->getKeyName();

        $this->set('relationModel', Crypt::encryptString($class));
        $this->set('relationName', Crypt::encryptString($name));
        $this->set('relationKey', Crypt::encryptString($key));

        $this->addBeforeRender(function () use ($model, $name, $key) {
            $value = $this->get('value');

            if (! is_iterable($value)) {
                $value = Arr::wrap($value);
            }

            if (Assert::isIntArray($value)) {
                $value = $model::whereIn($key, $value)->get();
            }

            $value = collect($value)
                ->map(function ($item) use ($name, $key) {
                    return [
                        'id'   => $item->$key,
                        'text' => $item->$name,
                    ];
                })->toJson();

            $this->set('value', $value);
        });

        return $this;
    }


    /**
     * @param string $scope
     *
     * @return $this
     */
    public function applyScope(string $scope)
    {
        $scope = lcfirst($scope);

        $this->set('relationScope', Crypt::encryptString($scope));

        return $this;
    }
}
