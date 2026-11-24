<div <?php echo e($attributes->only(['class', 'wire:key'])->class('relative w-full')); ?>

    x-data="wireui_select({
        <?php if($attributes->wire('model')->value()): ?>
            wireModel: <?php if (!isset($__livewire)): ?>
    <?php if (is_object($attributes->wire('model')) || is_array($attributes->wire('model'))) { echo "JSON.parse(atob('".base64_encode(json_encode($attributes->wire('model')))."'))"; } elseif (is_string($attributes->wire('model'))) { echo "'".str_replace("'", "\'", $attributes->wire('model'))."'"; } else { echo json_encode($attributes->wire('model')); } ?>
<?php elseif ((object) ($attributes->wire('model')) instanceof \Livewire\WireDirective && $attributes->wire('model')->hasModifier('blur')): ?>
    window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')->value()); ?>').live
<?php elseif ((object) ($attributes->wire('model')) instanceof \Livewire\WireDirective) : ?>
    window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')->value()); ?>')<?php echo e($attributes->wire('model')->hasModifier('live') ? '.live' : ''); ?>

<?php else : ?>
    window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')); ?>')
<?php endif; ?>,
        <?php endif; ?>
    })"
    x-props="{
        asyncData:    <?php if (is_object($asyncData) || is_array($asyncData)) { echo "JSON.parse(atob('".base64_encode(json_encode($asyncData))."'))"; } elseif (is_string($asyncData)) { echo "'".str_replace("'", "\'", $asyncData)."'"; } else { echo json_encode($asyncData); } ?>,
        optionValue:  <?php if (is_object($optionValue) || is_array($optionValue)) { echo "JSON.parse(atob('".base64_encode(json_encode($optionValue))."'))"; } elseif (is_string($optionValue)) { echo "'".str_replace("'", "\'", $optionValue)."'"; } else { echo json_encode($optionValue); } ?>,
        optionLabel:  <?php if (is_object($optionLabel) || is_array($optionLabel)) { echo "JSON.parse(atob('".base64_encode(json_encode($optionLabel))."'))"; } elseif (is_string($optionLabel)) { echo "'".str_replace("'", "\'", $optionLabel)."'"; } else { echo json_encode($optionLabel); } ?>,
        optionDescription: <?php if (is_object($optionDescription) || is_array($optionDescription)) { echo "JSON.parse(atob('".base64_encode(json_encode($optionDescription))."'))"; } elseif (is_string($optionDescription)) { echo "'".str_replace("'", "\'", $optionDescription)."'"; } else { echo json_encode($optionDescription); } ?>,
        hasSlot:     <?= json_encode(filter_var($slot->isNotEmpty(), FILTER_VALIDATE_BOOLEAN)); ?>,
        multiselect: <?= json_encode(filter_var($multiselect, FILTER_VALIDATE_BOOLEAN)); ?>,
        searchable:  <?= json_encode(filter_var($searchable, FILTER_VALIDATE_BOOLEAN)); ?>,
        clearable:   <?= json_encode(filter_var($clearable, FILTER_VALIDATE_BOOLEAN)); ?>,
        readonly:    <?= json_encode(filter_var($readonly || $disabled, FILTER_VALIDATE_BOOLEAN)); ?>,
        placeholder: <?php if (is_object($placeholder) || is_array($placeholder)) { echo "JSON.parse(atob('".base64_encode(json_encode($placeholder))."'))"; } elseif (is_string($placeholder)) { echo "'".str_replace("'", "\'", $placeholder)."'"; } else { echo json_encode($placeholder); } ?>,
        template:    <?php if (is_object($template) || is_array($template)) { echo "JSON.parse(atob('".base64_encode(json_encode($template))."'))"; } elseif (is_string($template)) { echo "'".str_replace("'", "\'", $template)."'"; } else { echo json_encode($template); } ?>,
    }">
    <div hidden x-ref="json"><?php if (is_object($optionsToArray()) || is_array($optionsToArray())) { echo "JSON.parse(atob('".base64_encode(json_encode($optionsToArray()))."'))"; } elseif (is_string($optionsToArray())) { echo "'".str_replace("'", "\'", $optionsToArray())."'"; } else { echo json_encode($optionsToArray()); } ?></div>
    <div hidden x-ref="slot"><?php echo e($slot); ?></div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(app()->runningUnitTests()): ?>
        <div dusk="select.<?php echo e($name); ?>">
            <?php echo json_encode($optionsToArray()); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="relative min-h-[46px]">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($label): ?>
            <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('label')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-1','label' => $label,'has-error' => $name && $errors->has($name),'disabled' => $disabled,'x-on:click' => 'toggle','wire:key' => 'select.label.' . $name]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('input')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'min-h-[46px] cursor-pointer overflow-hidden !text-transparent !dark:text-transparent selection:bg-transparent','x-ref' => 'input','x-on:click' => 'toggle','x-on:focus' => 'open','x-on:blur.debounce.750ms' => 'closeIfNotFocused','x-on:keydown.enter.stop.prevent' => 'toggle','x-on:keydown.space.stop.prevent' => 'toggle','x-on:keydown.arrow-down.prevent' => '$event.shiftKey || getNextFocusable().focus()','x-on:keydown.arrow-up.prevent' => 'getPrevFocusable().focus()','x-bind:placeholder' => 'getPlaceholder','x-bind:value' => 'getSelectedValue','inputmode' => 'none','readonly' => true,'autocomplete' => 'disabled','name' => $name,'attributes' => $attributes
                ->except(['class'])
                ->class(['pl-8' => $icon])
                ->whereDoesntStartWith(['wire:model', 'type', 'wire:key'])]); ?>
             <?php $__env->slot('prepend', null, []); ?> 
                <div :class="{
                    'pointer-events-none': config.readonly,
                    'cursor-pointer': !config.readonly,
                }">
                    <template x-if="!config.multiselect">
                        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'absolute left-0 inset-y-0 w-[calc(100%-3.5rem)] flex items-center',
                                'pl-2.5' =>  $icon,
                                'pl-3' => !$icon,
                            ]); ?>"
                            x-on:click="toggle">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($icon): ?>
                                <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('icon')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => $icon,'class' => 'h-5 w-5 mr-1 text-gray-400 dark:text-gray-600']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <span
                                class="truncate text-secondary-700 dark:text-secondary-400 text-lg font-semibold"
                                x-show="!isEmpty()"
                                x-html="getSelectedDisplayText()">
                            </span>
                        </div>
                    </template>

                    <template x-if="config.multiselect">
                        <div class="absolute left-0 inset-y-0 pl-3 pr-14 w-full flex items-center overflow-hidden" x-on:click="toggle">
                            <div class="flex items-center gap-2 overflow-x-auto hide-scrollbar">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($icon): ?>
                                    <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('icon')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => $icon,'class' => 'h-5 w-5 text-gray-400 dark:text-gray-600']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$withoutItemsCount): ?>
                                    <span
                                        class="inline-flex text-secondary-700 dark:text-secondary-400 text-lg font-semibold"
                                        x-show="selectedOptions.length"
                                        x-text="selectedOptions.length">
                                    </span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                <div wire:ignore class="flex flex-nowrap items-center gap-1">
                                    <template x-for="(option, index) in selectedOptions" :key="`selected.${index}`">
                                        <span class="
                                                inline-flex items-center py-0.5 pl-2 pr-0.5 rounded-full text-xs font-medium
                                                border border-secondary-200 shadow-sm bg-secondary-100 text-secondary-700
                                                dark:bg-secondary-700 dark:text-secondary-400 dark:border-none
                                            ">
                                            <span style="max-width: 5rem" class="truncate" x-text="option.label"></span>

                                            <button
                                                class="shrink-0 h-4 w-4 flex items-center text-secondary-400 justify-center hover:text-secondary-500"
                                                x-on:click.stop="unSelect(option)"
                                                tabindex="-1"
                                                type="button">
                                                <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('icon')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-3 w-3','name' => 'x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
                                            </button>
                                        </span>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('append', null, []); ?> 
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 gap-x-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($clearable && !$readonly && !$disabled): ?>
                        <button
                            x-show="!isEmpty()"
                            x-on:click="clear"
                            tabindex="-1"
                            type="button"
                            x-cloak>
                            <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('icon')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 text-secondary-400 hover:text-negative-400','name' => 'x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
                        </button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <button tabindex="-1" x-on:click="toggle" type="button">
                        <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('icon')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5
                            '.e($name && $errors->has($name)
                                ? 'text-negative-400 dark:text-negative-600'
                                : 'text-secondary-400').'','name' => $rightIcon]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
                    </button>
                </div>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hint): ?>
            <label <?php if($id): ?> for="<?php echo e($id); ?>" <?php endif; ?> class="mt-2 text-lg font-semibold text-secondary-500 dark:text-secondary-400">
                <?php echo e($hint); ?>

            </label>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <?php if (isset($component)) { $__componentOriginala3e8dd945320a93fc332a1c48075403e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3e8dd945320a93fc332a1c48075403e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wireui::components.parts.popover','data' => ['margin' => (bool) $label]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('wireui::parts.popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['margin' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute((bool) $label)]); ?>
        <template x-if="asyncData.api || (config.searchable && options.length >= <?php if (is_object($minItemsForSearch) || is_array($minItemsForSearch)) { echo "JSON.parse(atob('".base64_encode(json_encode($minItemsForSearch))."'))"; } elseif (is_string($minItemsForSearch)) { echo "'".str_replace("'", "\'", $minItemsForSearch)."'"; } else { echo json_encode($minItemsForSearch); } ?>)">
            <div class="px-2 my-2" wire:key="search.options.<?php echo e($name); ?>">
                <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => WireUi::component('input')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => trans('wireui::messages.searchHere'),'class' => 'bg-gray-100','x-ref' => 'search','x-model.debounce.500ms' => 'search','x-on:keydown.arrow-down.prevent' => '$event.shiftKey || getNextFocusable().focus()','x-on:keydown.arrow-up.prevent' => 'getPrevFocusable().focus()','shadowless' => true,'right-icon' => 'search']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
            </div>
        </template>

        <div class="max-h-64 sm:max-h-60 overflow-y-auto overscroll-contain soft-scrollbar select-none"
            tabindex="-1"
            x-ref="optionsContainer"
            name="wireui.select.options.<?php echo e($name); ?>"
            x-on:keydown.tab.prevent="$event.shiftKey || getNextFocusable().focus()"
            x-on:keydown.arrow-down.prevent="$event.shiftKey || getNextFocusable().focus()"
            x-on:keydown.shift.tab.prevent="getPrevFocusable().focus()"
            x-on:keydown.arrow-up.prevent="getPrevFocusable().focus()">
            <div class="w-full h-0.5 rounded-full relative overflow-hidden"
                :class="{
                    'bg-gray-200 dark:bg-gray-700': asyncData.fetching
                }">
                <div class="bg-primary-500 h-0.5 rounded-full absolute animate-linear-progress"
                    style="width: 30%"
                    x-show="asyncData.fetching">
                </div>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($beforeOptions)): ?>
                <div <?php echo e($beforeOptions->attributes); ?>>
                    <?php echo e($beforeOptions); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <ul x-ref="listing" wire:ignore>
                <template x-for="(option, index) in displayOptions" :key="`${index}.${option.value}`">
                    <li tabindex="-1" :index="index">
                        <div class="px-2 py-0.5">
                            <div class="h-8 w-full animate-pulse bg-gray-200 dark:bg-gray-600 rounded"></div>
                        </div>
                    </li>
                </template>
            </ul>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if (! ($hideEmptyMessage)): ?>
                <div class="py-12 px-3 sm:py-2 sm:px-3 text-center sm:text-left text-secondary-500 cursor-pointer"
                    x-show="displayOptions.length === 0"
                    x-on:click="close">
                    <?php echo e($emptyMessage ?? __('wireui::messages.empty_options')); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($afterOptions)): ?>
                <div <?php echo e($afterOptions->attributes); ?>>
                    <?php echo e($afterOptions); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala3e8dd945320a93fc332a1c48075403e)): ?>
<?php $attributes = $__attributesOriginala3e8dd945320a93fc332a1c48075403e; ?>
<?php unset($__attributesOriginala3e8dd945320a93fc332a1c48075403e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala3e8dd945320a93fc332a1c48075403e)): ?>
<?php $component = $__componentOriginala3e8dd945320a93fc332a1c48075403e; ?>
<?php unset($__componentOriginala3e8dd945320a93fc332a1c48075403e); ?>
<?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\wibest\resources\views\components\my-select.blade.php ENDPATH**/ ?>