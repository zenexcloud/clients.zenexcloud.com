<div class="lu-modal lu-modal--lg" id="application-configure">
    <div class="lu-modal__dialog">
        <div class="lu-modal__content">
            <div class="lu-modal__top lu-top">
                <h2 class="lu-top__title lu-h4">Configure Data Synchronization</h2>
                <div class="lu-top__toolbar">
                    <button class="lu-close lu-btn lu-btn--sm lu-btn--icon lu-btn--link" data-dismiss="lu-modal"
                            aria-label="Close">
                        <i class="lu-btn__icon lu-zmdi lu-zmdi-close"></i>
                    </button>
                </div>
            </div>
            <div class="lu-modal__body">
                <div class="lu-form-check lu-form-check-disabled">
                    <label>
                        <input class="lu-form-checkbox" type="checkbox" name="layers" readonly checked>
                        <span class="lu-form-indicator"></span>
                        <span class="lu-form-text"><strong>General Data</strong> - used to generate reports</span>
                    </label>
                </div>
                <div class="lu-form-check">
                    <label>
                        <input class="lu-form-checkbox" type="checkbox" name="instantDataSynchronization" value="on"
                               {if $instantDataSynchronization}checked{/if}>
                        <span class="lu-form-indicator"></span>
                        <span class="lu-form-text"><strong>Live Data Synchronization</strong> - required for Live Dashboard feature
                        </span>
                    </label>
                </div>
                <div class="lu-form-check">
                    <label>
                        <input class="lu-form-checkbox" type="checkbox" name="userDetails" value="on"
                               {if $userDetails}checked{/if}>
                        <span class="lu-form-indicator"></span>
                        <span class="lu-form-text"><strong>Detailed User Data</strong> - used for clients and services segmentation and client profiles</span>
                    </label>
                </div>
                <div class="lu-form-check">
                    <label>
                        <input class="lu-form-checkbox" type="checkbox" name="userTracking" value="on"
                               {if $userTracking}checked{/if}>
                        <span class="lu-form-indicator"></span>
                        <span class="lu-form-text"><strong>User Tracking</strong> - used for monitoring of user behavior in your system</span>
                    </label>
                </div>
                {if !isset($firstConfiguration) || $firstConfiguration===false}
                    <div class="lu-alert alert--sm lu-alert--info lu-alert--faded">
                        <div class="lu-alert__body">
                            <strong>Please note:</strong> To have all your data synchronized, another synchronization
                            process is required. The entire procedure may take up to 24 hours until you get unlimited
                            access
                            to MetricsCube.
                        </div>
                    </div>
                {/if}
            </div>
            <div class="lu-modal__actions">
                <button class="lu-btn lu-btn--secondary" type="button" name="saveConfiguration"
                        aria-label="Save Changes">
                    <span class="lu-btn__text">Save Changes</span>
                </button>
                <button class="lu-btn lu-btn--default lu-btn--outline" type="button" data-dismiss="lu-modal"
                        aria-label="Close">
                    <span class="lu-btn__text">Cancel</span>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="lu-modal lu-modal--lg" id="connector-configure">
    <div class="lu-modal__dialog">
        <div class="lu-modal__content">
            <div class="lu-modal__top lu-top">
                <h2 class="lu-top__title lu-h4">Configure Connector</h2>
                <div class="lu-top__toolbar">
                    <button class="lu-close lu-btn lu-btn--sm lu-btn--icon lu-btn--link" data-dismiss="lu-modal"
                            aria-label="Close">
                        <i class="lu-btn__icon lu-zmdi lu-zmdi-close"></i>
                    </button>
                </div>
            </div>
            <div class="lu-modal__body">
                <div class="lu-form-check">
                    <label>
                        <input class="lu-form-checkbox" type="checkbox" name="connectorUserWidgetPopup" value="on"
                               {if $connectorUserWidgetPopup}checked{/if}>
                        <span class="lu-form-indicator"></span>
                        <span class="lu-form-text"><strong>User Data Widget Popup</strong>
                        </span>
                    </label>
                </div>
                <div class="lu-form-check">
                    <label>
                        <input class="lu-form-checkbox" type="checkbox" name="connectorUserTags" value="on"
                               {if $connectorUserTags}checked{/if}>
                        <span class="lu-form-indicator"></span>
                        <span class="lu-form-text"><strong>User Tags in Clients List</strong></span>
                    </label>
                </div>
                <div class="lu-form-check">
                    <label>
                        <input class="lu-form-checkbox" type="checkbox" name="connectorStatisticsWidget" value="on"
                               {if $connectorStatisticsWidget}checked{/if}>
                        <span class="lu-form-indicator"></span>
                        <span class="lu-form-text"><strong>Quick Statistics Widget</strong></span>
                    </label>
                </div>
                <div class="lu-form-check">
                    <label>
                        <input class="lu-form-checkbox" type="checkbox" name="connectorUserWidgetProfile" value="on"
                               {if $connectorUserWidgetProfile}checked{/if}>
                        <span class="lu-form-indicator"></span>
                        <span class="lu-form-text"><strong>User Data Widget in Client Profile</strong></span>
                    </label>
                </div>
                <div class="lu-form-check">
                    <label>
                        <input class="lu-form-checkbox" type="checkbox" name="connectorUserWidgetServiceDetails"
                               value="on"
                               {if $connectorUserWidgetServiceDetails}checked{/if}>
                        <span class="lu-form-indicator"></span>
                        <span class="lu-form-text"><strong>User Data Widget in Service Details</strong></span>
                    </label>
                </div>
                <div class="lu-form-check">
                    <label>
                        <input class="lu-form-checkbox" type="checkbox" name="connectorMainMenuLink" value="on"
                               {if $connectorMainMenuLink}checked{/if}>
                        <span class="lu-form-indicator"></span>
                        <span class="lu-form-text"><strong>MetricsCube Link in Main Menu</strong></span>
                    </label>
                </div>
            </div>
            <div class="lu-modal__actions">
                <button class="lu-btn lu-btn--secondary" type="button" name="saveConfiguration"
                        aria-label="Save Changes">
                    <span class="lu-btn__text">Save Changes</span>
                </button>
                <button class="lu-btn lu-btn--default lu-btn--outline" type="button" data-dismiss="lu-modal"
                        aria-label="Close">
                    <span class="lu-btn__text">Cancel</span>
                </button>
            </div>
        </div>
    </div>
</div>