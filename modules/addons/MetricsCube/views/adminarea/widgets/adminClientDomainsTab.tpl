<div data-domains-widget-wrapper>
    {assign var=unique_id value=10|mt_rand:10000}
    {* <link href="{$SCRIPT_NAME}/../../modules/addons/MetricsCube/assets/css/services-widget.css?{$unique_id}"
        rel="stylesheet" type="text/css"/> *}

    <div class="service-widget is-hidden" data-domains-widget>
        <div class="user-general">
            <a href="https://www.metricscube.io/" target="_blank">
                <div class="service-widget__logo">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M47.9891 7.05501C47.9764 5.73656 47.6002 4.44747 46.9023 3.33095C46.1491 2.14512 45.0671 1.20668 43.7896 0.631297C42.5121 0.0559159 41.095 -0.131251 39.7129 0.0928689L28.1925 1.89483C25.4106 2.32947 22.5786 2.32947 19.7967 1.89483L8.28167 0.0928689C6.89875 -0.13238 5.48046 0.0542314 4.20187 0.629666C2.92328 1.2051 1.84038 2.14417 1.08683 3.33095C0.388917 4.44747 0.0127072 5.73656 0 7.05501H0V40.9101C0.00565034 42.2416 0.382135 43.5448 1.08683 44.6724C1.84187 45.8601 2.92685 46.7993 4.20755 47.3738C5.48826 47.9484 6.90848 48.1331 8.29254 47.905L19.813 46.103C22.5949 45.6684 25.4269 45.6684 28.2088 46.103L39.7292 47.905C41.1099 48.1285 42.5255 47.9416 43.8019 47.3673C45.0782 46.793 46.1597 45.8563 46.9132 44.6724C47.6208 43.5401 47.9974 42.2307 48 40.8937V7.03862L47.9891 7.05501Z"
                            fill="#5C4BD1"/>
                        <path d="M29.0463 14.9782C28.2568 14.9803 27.4738 15.1189 26.7328 15.3877C27.9429 15.8054 29.0203 16.5298 29.8568 17.4883C30.6933 18.4468 31.2594 19.6056 31.4983 20.8482C31.6006 21.1211 31.6549 21.4092 31.6588 21.7001V32.2661C31.6864 32.7959 31.9191 33.295 32.309 33.6604C32.6988 34.0257 33.216 34.2294 33.7537 34.2294C34.2914 34.2294 34.8085 34.0257 35.1984 33.6604C35.5882 33.295 35.821 32.7959 35.8486 32.2661V21.6892C35.8457 19.9102 35.1281 18.2049 33.853 16.947C32.578 15.6891 30.8495 14.9811 29.0463 14.9782V14.9782Z"
                            fill="white"/>
                        <path d="M21.9341 15.3822C20.9075 15.0129 19.8057 14.8937 18.7224 15.0346C17.6391 15.1755 16.6063 15.5725 15.7118 16.1917C14.8173 16.8109 14.0877 17.6341 13.5849 18.5912C13.0821 19.5483 12.821 20.6111 12.8238 21.6891V32.2661C12.8092 32.5464 12.8526 32.8268 12.9512 33.0901C13.0499 33.3534 13.2019 33.5941 13.3978 33.7977C13.5938 34.0012 13.8297 34.1633 14.0912 34.274C14.3526 34.3848 14.6342 34.4419 14.9187 34.4419C15.2033 34.4419 15.4848 34.3848 15.7463 34.274C16.0078 34.1633 16.2437 34.0012 16.4396 33.7977C16.6356 33.5941 16.7875 33.3534 16.8862 33.0901C16.9849 32.8268 17.0283 32.5464 17.0137 32.2661V21.6891C17.0174 21.433 17.0603 21.179 17.141 20.9356C17.3671 19.673 17.9304 18.4928 18.773 17.5166C19.6155 16.5404 20.7067 15.8036 21.9341 15.3822V15.3822Z"
                            fill="white"/>
                        <path d="M26.7327 15.3877C25.8386 15.7068 25.0222 16.2072 24.3361 16.8566C23.6489 16.2046 22.8305 15.7023 21.934 15.3822C20.7066 15.8036 19.6154 16.5404 18.7729 17.5166C17.9303 18.4928 17.367 19.673 17.1409 20.9356C17.3249 20.3479 17.7164 19.8448 18.2442 19.5175C18.772 19.1902 19.4013 19.0603 20.0178 19.1514C20.6344 19.2426 21.1974 19.5487 21.6048 20.0143C22.0122 20.4798 22.237 21.074 22.2384 21.6891V29.1864C22.266 29.7161 22.4988 30.2152 22.8886 30.5806C23.2785 30.9459 23.7956 31.1496 24.3333 31.1496C24.871 31.1496 25.3882 30.9459 25.778 30.5806C26.1679 30.2152 26.4007 29.7161 26.4283 29.1864V21.6891C26.4261 21.0803 26.6428 20.4904 27.04 20.0245C27.4373 19.5585 27.9891 19.2467 28.5975 19.1445C29.2058 19.0423 29.8312 19.1563 30.3623 19.4663C30.8935 19.7762 31.296 20.262 31.4981 20.8373C31.2575 19.5966 30.6906 18.4401 29.8542 17.4837C29.0178 16.5272 27.9414 15.8044 26.7327 15.3877Z"
                            fill="white"/>
                    </svg>
                </div>
            </a>
            <div class="user-general__info">
                <div class="user-general__avatar">
                    <img src="{$details.avatar}" alt="User avatar">
                </div>
                <div class="user-general__info-box">
                    <p class="user-general__company text--sm text--secondary">{$details.companyname}</p>
                    <h4 class="user-general__name text--bold text--danger">{$details.name}</h4>
                </div>
            </div>
            <div class="user-general__status">
                <p class="user-general__company text--sm text--bold vertical-flex-center">User Status:
                </p>
                {if $details.newStatus}
                    <label class="label label--xlg label--{if $details.newStatus[0].name == 'Active'}success{else}danger{/if} label--full">{$details.newStatus[0].name}</label>
                {else if $details.status}
                    {if is_array($details.status)}
                        <label class="label label--xlg label--{if $details.status[0].name == 'Active'}success{else}danger{/if} label--full">{$details.status[0].name}</label>
                    {else}
                        <label class="label label--xlg label--{if $details.status.subscriber || $details.status['paying subscriber']}blue{elseif $details.status.active}green{else}red{/if} label--full">{$details.status|reset}</label>
                    {/if}
                {/if}
            </div>
            <div class="mb-break"></div>

                <div class="user-general__service-mrr">
                    <p class="text--sm text--bold">Domain MRR:</p>
                    <span class="user-general__service-stat text--light is-hidden" data-domain-mrr>
                        {if $domainMRR}
                            {$domainMRR}
                        {else}
                            <div class="label label--inactive">
                                Unavailable
                    			</div>
                                <svg class="icon-help icon-help--aligned" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" alt="Help Circle" data-tooltip data-title="Data is currently not available.">
                                    <path d="M10.0001 18.3333C14.6025 18.3333 18.3334 14.6024 18.3334 10C18.3334 5.39762 14.6025 1.66666 10.0001 1.66666C5.39771 1.66666 1.66675 5.39762 1.66675 10C1.66675 14.6024 5.39771 18.3333 10.0001 18.3333Z" stroke="#8A8F99" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7.57495 7.50001C7.77087 6.94307 8.15758 6.47343 8.66658 6.17429C9.17558 5.87514 9.77403 5.76579 10.3559 5.8656C10.9378 5.96541 11.4656 6.26795 11.8458 6.71962C12.2261 7.17129 12.4342 7.74294 12.4333 8.33334C12.4333 10 9.93328 10.8333 9.93328 10.8333" stroke="#8A8F99" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10 14.1667H10.0075" stroke="#8A8F99" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>			
                        {/if}
                    </span>
                    <div class="popover__loader popover__loader--sm" data-domain-mrr-loader>
                        <div class="loader"></div>
                    </div>
                </div>
                {if $clientTotalIncome}
                    <div class="user-general__service-income">
                        <p class="text--sm text--bold">Total Income:</p>
                        <span class="user-general__service-stat text--light">{$clientTotalIncome}</span>
                    </div>
                {/if}
                {if $domainIncome}
                    <div class="user-general__service-income">
                        <p class="text--sm text--bold">Domain Income:</p>
                        <span class="user-general__service-stat text--light">{$domainIncome}</span>
                    </div>
                {/if}
            
                <div class="user-general__service-activity">
                    <p class="text--sm text--bold vertical-flex-center">Active Since:
                        <svg class="icon-color" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                        data-tooltip data-title="Active for {$domainActiveSince.diff}.">
                            <path d="M7.53471 14.6668C11.2166 14.6668 14.2014 11.6821 14.2014 8.00016C14.2014 4.31826 11.2166 1.3335 7.53471 1.3335C3.85281 1.3335 0.868042 4.31826 0.868042 8.00016C0.868042 11.6821 3.85281 14.6668 7.53471 14.6668Z"
                                stroke="#8A8F99" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.53467 10.6667V8" stroke="#8A8F99" stroke-linecap="round"
                                stroke-linejoin="round"/>
                            <path d="M7.53467 5.3335H7.54134" stroke="#8A8F99" stroke-linecap="round"
                                stroke-linejoin="round"/>
                        </svg>
                    </p>
                    <span class="user-general__service-stat text--light">{$domainActiveSince.formattedDate}</span>
                </div>
                <div class="md-break"></div>

                {assign var=relatedCount value=0}
                {if $domainRelatedServices}
                    {foreach from=$domainRelatedServices item=service}
                        {assign var=relatedCount value=$relatedCount+1}
                    {/foreach}
                {/if}
                <div class="user-general__service-related dropdown" {if $domainRelatedServices} data-dropdown="services" data-placement="bottom-end" {/if}>
                    {if $domainRelatedServices}
                        <a class="dropdown-toggler {if !$domainRelatedServices}no-services{/if}" data-dropdown-toggle>
                            Related Services:
                            <label class="label label--dot label--lg {if $domainRelatedServices} label--blue-3 {else} label--red-3{/if}">{if isset($domainRelatedServices) && $domainRelatedServices && $domainRelatedServices|count}{$domainRelatedServices|count}{else}0{/if}</label>
                            {if $domainRelatedServices}
                                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 3L4 6L7 3" stroke="#0091EA" stroke-linecap="round"/>
                                </svg>
                            {/if}
                        </a>
                        <div class="dropdown-menu user-general__service-dropdown" data-dropdown-menu="services"
                            x-placement="bottom">
                            <div class="dropdown-menu__inner" data-filters="currentPeriod">
                                <ul class='tooltip-list dropdown-menu__items'>
                                    {foreach from=$domainRelatedServices item=service}
                                        <li class='tooltip-list__item dropdown-menu__item'>
                                            <label class='label label--sm label--ring label--{$service.status|lower}'> </label>
                                            <a href='{$service.link}'>#{$service.id}</a>
                                            <strong>{$service.productGroupName}</strong>&nbsp;-&nbsp;<span
                                                    class="text--secondary">{$service.productName}</span><span
                                                    class='text--secondary text-date'>{$service.regFormattedDate}</span>
                                        </li>
                                    {/foreach}
                                </ul>
                            </div>

                        </div>
                    {else}
                        <div class="user-general__service-domain">
                            <span class="text--faded">No Related Services</span>
                        </div>
                    {/if}
                </div>
        </div>
    </div>

    <script>
        window.MCPermissions = {$MetricsCubePermissions|json_encode}
        window.MCSettings = {$MetricsCubeSettings|json_encode}
    </script>
    {* <script async src="{$SCRIPT_NAME}/../../modules/addons/MetricsCube/assets/js/vendor.js"></script> *}
    {* <script async src="{$SCRIPT_NAME}/../../modules/addons/MetricsCube/assets/js/services-widget.js"></script> *}
</div>