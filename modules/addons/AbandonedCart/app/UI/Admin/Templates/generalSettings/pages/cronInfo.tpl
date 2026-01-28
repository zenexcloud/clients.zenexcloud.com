<div class="lu-widget">
    <div class="lu-widget__header">
        <div class="lu-widget__top lu-top">
            {if $rawObject->getRawTitle() || $rawObject->getTitle()}
                <div class="lu-top__title">
                    {if $rawObject->getIcon()}
                        <i class="{$rawObject->getIcon()}"></i>
                    {/if}
                    {if $rawObject->isRawTitle()}
                        {$rawObject->getRawTitle()}
                    {elseif $rawObject->getTitle()}
                        {$MGLANG->T($rawObject->getTitle())}
                    {/if}
                </div>
            {/if}
        </div>
    </div>
    <div class="lu-widget__body">
        <div class="lu-widget__content">
            {foreach from=$elements key=nameElement item=dataElement}
                {$dataElement->getHtml()}
            {/foreach}
            <div class="lu-row">
                {foreach from=$rawObject->getCrons() key=nameElement item=dataElement}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" style="font-weight: normal">
                                {$MGLANG->translate('cronTitle', $nameElement)}
                                <i data-title="{$MGLANG->translate('cronTooltip', $nameElement)}"
                                   data-toggle="lu-tooltip"
                                   class="lu-i-c-2x lu-zmdi lu-zmdi-help-outline lu-form-tooltip-helper lu-tooltip"></i>
                            </label>
                            <pre>{$dataElement}</pre>
                        </div>
                    </div>
                {/foreach}
            </div>
        </div>
    </div>
</div>
