{include file="adminarea/header.tpl"}
<div id="mc-container" data-auto-activate="{$autoActivate}">
    <div class="lu-mc-app">
        <div class="lu-mc-app__body lu-mc-app__body--margin">
            <div class="lu-mc-app__content">
                <a class="lu-mc-app__logo lu-logo" href="#">
                    <img src="{$helper->img('logo.svg')}" alt="metrics cube">
                </a>

                <div class="lu-section lu-section--lg">
                    <span class="lu-p-d">
                        Connect your system to unlock all features of MetricsCube.
                    </span>
                    <div class="lu-rail mt-16 gap-16">
                        <div class="lu-mc-label lu-mc-label--warning lu-mc-label--rounded lu-mc-label--lg lu-font-semi-bold lu-mc-label--no-margin">
                            {include file="adminarea/icons/open-padlock.tpl"}
                            No pre-payment required
                        </div>
                        <div class="lu-mc-label lu-mc-label--warning lu-mc-label--rounded lu-mc-label--lg lu-font-semi-bold lu-mc-label--no-margin">
                            {include file="adminarea/icons/dollar-sign.tpl"}
                            Free trial for 14 days
                        </div>
                        <div class="lu-mc-label lu-mc-label--warning lu-mc-label--rounded lu-mc-label--lg lu-font-semi-bold lu-mc-label--no-margin">
                            {include file="adminarea/icons/configuration.tpl"}
                            2-minute configuration
                        </div>
                    </div>
                </div>
                {include file="adminarea/main/synchronize.tpl"}
                <div class="lu-section lu-section--lg">
                    <span class="lu-p-d">
                        Already have an account? Simply enter your Application Key below to continue.
                    </span>
                    <div class="lu-synchronize-input-group lu-has-arrow lu-input-group lu-input-group--xxlg lu-flex-1 mt-16">
                        <i class="lu-input-group__icon lu-zmdi lu-zmdi-key">
                        </i>
                        <input class="lu-form-control" value="{$appKey}" type="text" name="appKey"
                                placeholder="Provide your Application Key">
                        <div class="lu-input-group__actions">
                            <button class="lu-btn lu-btn--xlg lu-btn--secondary" id="syncLoader" type="button"
                                    name="appKeyButton" {if $firstConfiguration===true}data-first-synchronize{/if}>
                                <span class="lu-btn__preloader lu-preloader"></span>
                                <i class="lu-btn__icon lu-zmdi lu-zmdi-refresh"></i>
                                <span class="lu-btn__text">Synchronize</span>
                            </button>
                        </div>
                    </div>
                    <a class="lu-form-feedback lu-d-block " data-toggle="lu-modal"
                        data-target="#activated">
                        Where can I find my Application Key?
                    </a>
                    <div class="lu-alert lu-alert--faded lu-alert--danger lu-alert--border-left lu-alert--sections mt-16 {if $errors===false}hide{/if}"></div>
                </div> 
            </div>
        </div>
        {include file="adminarea/banner.tpl" mode="notconnected"}
    </div>
    {include file="adminarea/modals/id.tpl"}
    {include file="adminarea/modals/configuration.tpl"}
    {include file="adminarea/modals/activated.tpl"}
    {include file="adminarea/modals/connect-account.tpl"}



    <div id="main-loader" class="lu-preloader-container is-hidden">
        <div class="lu-preloader lu-preloader--lg"></div>
    </div>
</div>
{include file="adminarea/footer.tpl"}
<script type="text/javascript" src="{$helper->script('requests.js')}"></script>
