<a {foreach $htmlAttributes as $aValue} {$aValue@key}="{$aValue}" {/foreach}
{if $rawObject->isRawTitle()}data-toggle="lu-tooltip" data-title="{$rawObject->getRawTitle()}"{elseif $rawObject->getTitle()}data-toggle="lu-tooltip" data-title="{$MGLANG->T('button', $rawObject->getTitle())}"{/if}
class="{$rawObject->getClasses()}">
{if $rawObject->getIcon()}<i class="{$rawObject->getIcon()}"></i>{/if}
</a>
