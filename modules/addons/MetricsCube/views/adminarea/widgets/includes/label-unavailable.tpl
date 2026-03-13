<div class="custom-label {if $labelPosition="top"}custom-label--top{/if} {if $iconPosition = "reverse"} custom-label--icon-right{/if}" {if $labelPopup}data-custom-popup{/if} >
    <div class="custom-label__content" {if $labelPopup}data-custom-popup-toggle{/if}>
        {if $displayIcon}
            <div class="custom-label__icon">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_7947_1419)"><path d="M8.00016 14.6667C11.6821 14.6667 14.6668 11.6819 14.6668 8C14.6668 4.3181 11.6821 1.33333 8.00016 1.33333C4.31826 1.33333 1.3335 4.3181 1.3335 8C1.3335 11.6819 4.31826 14.6667 8.00016 14.6667Z" stroke="#8A8F99" stroke-linecap="round" stroke-linejoin="round"/><path d="M6.06006 6.00006C6.21679 5.5545 6.52616 5.1788 6.93336 4.93948C7.34056 4.70017 7.81932 4.61268 8.28484 4.69253C8.75036 4.77238 9.1726 5.01441 9.47678 5.37574C9.78095 5.73708 9.94743 6.19441 9.94673 6.66673C9.94673 8.00006 7.94673 8.66673 7.94673 8.66673" stroke="#8A8F99" stroke-linecap="round" stroke-linejoin="round"/><path d="M8 11.3333H8.00667" stroke="#8A8F99" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_7947_1419"><rect width="16" height="16" fill="white"/></clipPath></defs></svg>
            </div>
        {/if}
        <div class="custom-label__text">
            {$labelText}
        </div>
    </div>
    {if $labelPopup}
        <div class="custom-label__dropdown custom-popup" data-custom-popup-dropdown>
            <div class="custom-popup__arrow"></div>
            <div class='custom-popup__content'>
                {$labelPopupText}
            </div>
        </div>
    {/if}
</div>