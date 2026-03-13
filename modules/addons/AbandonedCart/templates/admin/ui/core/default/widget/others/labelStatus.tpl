<span
{foreach $htmlAttributes as $aValue} {$aValue@key}="{$aValue}" {/foreach}
class="{$rawObject->getClasses()} lu-label--{$rawObject->getColorClass()}">{$rawObject->getStatusText()}</span>