<div class="lu-modal" id="reconnect-modal">
    <div class="lu-modal__dialog">
        <div class="lu-modal__content">
            <div class="lu-modal__top lu-top">
                <h4 class="lu-top__title lu-h6 lu-text-danger">Warning !</h4>
                <div class="lu-top__toolbar">
                    <button class="lu-close lu-btn lu-btn--xs lu-btn--icon lu-btn--link" data-dismiss="lu-modal"
                            aria-label="Close">
                        <i class="lu-btn__icon lu-zmdi lu-zmdi-close"></i>
                    </button>
                </div>
            </div>
            <div class="lu-modal__body">
                <p>
                    Connecting a new account means that your WHMCS will be no longer synchronized to your existing
                    MetricsCube account. Please note that this operation will reset your configuration and you will have
                    to connect to MetricsCube again.
                </p>
            </div>
            <div class="lu-modal__actions">
                <a class="lu-btn lu-btn--danger lu-btn--faded"
                   href="{$helper->url('Main@reconnect')}">
                    <span class="lu-btn__text">Confirm</span>
                </a>
                <button class="lu-btn lu-btn--default lu-btn--outline" type="button" data-dismiss="lu-modal"
                        aria-label="Close">
                    <span class="lu-btn__text">Cancel</span>
                </button>
            </div>
        </div>
    </div>
</div>