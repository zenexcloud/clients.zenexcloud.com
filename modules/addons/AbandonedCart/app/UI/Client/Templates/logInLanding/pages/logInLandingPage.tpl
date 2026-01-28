<div class="col-lg-12">
    <form class="form-stacked" method="post" action="index.php?m=AbandonedCart&mg-page=EmailLanding&mg-action=redirect">
        <div class="col-lg-12 lu-email-landing-form">
            <div class=" email-landing-container">
                <div class="lu-alert lu-alert--outline lu-alert--icon lu-alert--info lu-alert--bordered lu-m-b-x lu-alert--dismiss mg-message">
                    <div class="lu-alert__body">
                        <b>{$MGLANG->T('emailAlert')}</b>
                    </div>
                </div>
                <div class="lu-app__main-actions lu-m-b-2x lu-m-l-2x mg-drop-bg-wrap">
                    <div class="lu-row lu-justify-content-center">
                        <div class="col-xs-1 lu-m-l-1x">
                            <a href="index.php?rp=/login&goto=/cart.php?a=view"
                               class="btn btn-default mx-auto">{$MGLANG->T('logIn')}</a>
                        </div>
                        <div class="col-xs-1 lu-m-l-1x">
                            <a href="register.php?goto=/cart.php?a=view"
                               class="btn btn-default mx-auto">{$MGLANG->T('registerAccount')}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
