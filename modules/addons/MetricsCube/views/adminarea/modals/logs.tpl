<div class="lu-modal" id="application-logs">
    <div class="lu-modal__dialog">
        <div class="lu-modal__content">
            <div class="lu-modal__top lu-top">
                <h2 class="lu-top__title lu-h4">Logs</h2>
                <div class="lu-top__toolbar">
                    <button class="lu-close lu-btn lu-btn--sm lu-btn--icon lu-btn--link" data-dismiss="lu-modal"
                            aria-label="Close">
                        <i class="lu-btn__icon lu-zmdi lu-zmdi-close"></i>
                    </button>
                </div>
            </div>
            <div class="lu-modal__body">
                <p>
                    MetricsCube Connector couldn't create a log file at
                <pre>{$logFilePathDir}</pre>
                or it is not allowed to read/modify that file. It is possible that the PHP on your server doesn't have
                privileges to manage the files structure due to wrong configuration or restrictive security rules on
                this directory. Please make sure that PHP has the correct privileges to create files in this directory.
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