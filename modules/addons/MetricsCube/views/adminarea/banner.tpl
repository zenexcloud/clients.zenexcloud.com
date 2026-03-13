<div class="lu-mc-app__banner">
    <img class="lu-mc-app__browser" src="{$helper->img('browser.png')}" alt="">
    <div class="lu-mc-app__wrapper">
        <div class="lu-mc-app__title">
            The right data leads to the right decisions
        </div>
        <p class="lu-mc-app__description mb-8">
            MetricsCube empowers you with in-depth business insights from your WHMCS data, including:
        </p>
        <ul>
            <li>
                <span class="lu-font-extra-bold">Live Dashboard:</span> Monitor your system's actions as they happen.
            </li>
            <li>
                <span class="lu-font-extra-bold">User Tracking with Customer Segmentation:</span> Explore diverse customer groups and track their interaction trends together with shopping habits.
            </li>
            <li>
                <span class="lu-font-extra-bold">MRR Breakdown:</span> Analyze the complex layers of your Monthly Recurring Revenue.
            </li>
            <li>
                <span class="lu-font-extra-bold">Financial Reports:</span> View multiple data sets focused on your money in an easy-to-read format.
            </li>
            <li>
                <span class="lu-font-extra-bold">Extensive Reporting Suite:</span> Access 80+ reports with advanced filtering and comparison tools.
            </li>
        </ul>
    </div>

    {if $mode=='connected'}
        <a class="lu-mc-app__try-btn lu-btn lu-btn--primary lu-btn--xlg lu-btn--block" target="_blank"
           href="https://dashboard.metricscube.io/sign-in">
            <span class="lu-btn__content">Access your reports now</span>
        </a>
    {else}
        <a class="lu-mc-app__try-btn lu-btn lu-btn--primary lu-btn--xlg" target="_blank"
           href="https://www.metricscube.io/whmcs-integration">
            <span class="lu-btn__content">Learn More</span>
        </a>
    {/if}
</div>
