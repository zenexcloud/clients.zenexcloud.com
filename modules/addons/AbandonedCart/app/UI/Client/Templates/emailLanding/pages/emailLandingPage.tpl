<div class="col-lg-12">
    <form class="form-stacked" method="post" action="index.php?m=AbandonedCart&mg-page=EmailLanding&mg-action=redirect">
        <div class="col-lg-12 lu-email-landing-form">
            <div class=" email-landing-container">
                {if $rawObject->haveInternalAlertMessage()}
                    <div class="alert {if $rawObject->getInternalAlertSize() !== ''}alert--{$rawObject->getInternalAlertSize()}{/if} alert-{$rawObject->getInternalAlertMessageType()} alert--faded">
                        <div class="alert__body">
                            {if $rawObject->isInternalAlertMessageRaw()|unescape:'html'}{$rawObject->getInternalAlertMessage()}{else}{$MGLANG->T($rawObject->getInternalAlertMessage())|unescape:'html'}{/if}
                        </div>
                    </div>
                {/if}
                <div class="lu-alert lu-alert--outline lu-alert--icon lu-alert--info lu-alert--bordered lu-m-b-x lu-alert--dismiss mg-message">
                    <div class="lu-alert__body">
                        <b>{$MGLANG->T('emailAlert')|unescape:'html'}</b>
                    </div>
                </div>
                <div>
                    <input type="hidden" name="sub" value="submit">
                    {foreach from=$rawObject->getSections() item=field}
                        {$field->getHtml()}
                    {/foreach}

                    {foreach from=$rawObject->getFields() item=field}
                        {$field->getHtml()}
                    {/foreach}
                </div>
                <div class="lu-app__main-actions lu-m-b-2x lu-m-l-2x mg-drop-bg-wrap">
                    <div class="lu-row lu-justify-content-center">
                        <div class="col-xs-1 lu-m-r-1x">
                            <button type="submit" class="btn btn-primary mx-auto h-100 btn-primary-1rem">
                                {$MGLANG->T('setEmail')}
                            </button>
                        </div>
                        <div class="col-xs-1 lu-m-l-1x lu-m-r-1x">
                            <a href="index.php" class="btn btn-default mx-auto">{$MGLANG->T('cancelButton')}</a>
                        </div>
                        {if $rawObject->getDataByName('allowSkip') === 'ask'}
                            <div class="col-xs-1 lu-m-l-1x">
                                <a href="index.php?m=AbandonedCart&mg-page=EmailLanding&mg-action=skip"
                                   class="btn btn-default mx-auto">{$MGLANG->T('skipButton')}</a>
                            </div>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


