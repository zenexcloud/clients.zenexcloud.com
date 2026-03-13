<div class="lu-modal" id="old-synchronization-modal">
    <div class="lu-modal__dialog">
        <div class="lu-modal__content">
            <div class="lu-modal__top lu-top">
                <h2 class="lu-top__title lu-h6">Your WHMCS has not been synchronized for a long time</h2>
                <div class="lu-top__toolbar">
                    <button class="lu-close lu-btn lu-btn--sm lu-btn--icon lu-btn--link" data-dismiss="lu-modal"
                            aria-label="Close">
                        <i class="lu-btn__icon lu-zmdi lu-zmdi-close"></i>
                    </button>
                </div>
            </div>
            <div class="lu-modal__body">
                <p>
                    <strong>If you are using Webhooks synchronization method</strong>
                    <br>
                    Please make sure that our server <b>api.metricscube.io</b> can connect directly to your server at:
                </p>
                <pre>{$domain}</pre>
                <p>
                    and there is no firewall, htaccess or friendly URL settings enabled.
                </p>
            </div>
            <div class="lu-modal__actions">
                <button class="lu-btn lu-btn--default lu-btn--outline" type="button" data-dismiss="lu-modal"
                        aria-label="Close">
                    <span class="lu-btn__text">Hide</span>
                </button>
            </div>
        </div>
    </div>
</div>