<?php

namespace Bestsite\Double;

use Laravel\Nova\Fields\Field;

class Double extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'double';

    public function info($value)
    {
        return $this->withMeta([
            'info' => $value
        ]);
    }

    public function max($value) {
        return $this->withMeta([
            'max' => $value
        ]);
    }
}
