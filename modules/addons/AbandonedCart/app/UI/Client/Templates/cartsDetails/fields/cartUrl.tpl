<div>
    <div class="lu-input-group">
        <input class="lu-form-control"
               type="text"
               placeholder="{$rawObject->getPlaceholder()}"
               name="{$rawObject->getName()}"
               value="{$rawObject->getValue()}" {if $rawObject->isReadOnly()}readonly="readonly"{/if}
        {foreach $htmlAttributes as $aValue} {$aValue@key}="{$aValue}" {/foreach}>
        <div class="lu-input-group__actions">
            {foreach from=$rawObject->getButtons() item=button}
                {$button->getHtml()}
            {/foreach}
        </div>
    </div>

    <div class="lu-form-feedback lu-form-feedback--icon" hidden="hidden">
    </div>
</div>