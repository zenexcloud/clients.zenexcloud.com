{if $rawObject->haveInternalAlertMessage()}
    <div class="alert {if $rawObject->getInternalAlertSize() !== ''}alert--{$rawObject->getInternalAlertSize()}{/if} alert-{$rawObject->getInternalAlertMessageType()} alert--faded">
        <div class="alert__body">
            {if $rawObject->isInternalAlertMessageRaw()|unescape:'html'}
                {$rawObject->getInternalAlertMessage()|unescape}
            {else}
                {$MGLANG->T($rawObject->getInternalAlertMessage())|unescape:'html'}{/if}
        </div>
    </div>
{/if}