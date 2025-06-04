<link href="modules/servers/spanel/templates/assets/icons-font.css" rel="stylesheet" />
<link href="modules/servers/spanel/templates/assets/style.css" rel="stylesheet" />

<div id="spanelhome">

	<div class="row">

		{if $error || $suspendreason}
		<div class="col-md-12">
			<div class="alert alert-danger text-center" role="alert">
				{if $suspendreason}
					{$spanel->translate('suspendstatustext', $suspendreason)}
				{/if}
				{if $error}
					{$error}<br/>
				{/if}
			</div>
		</div>
		{/if}

		<div class="col-md-{if $showSpanel}8{else}12{/if}">

			<div class="panel panel-default card mb-3">

				<div class="panel-heading card-header">
					<h3 class="panel-title card-title m-0">{$spanel->translate('servicetitle')}</h3>
				</div>
				<div class="panel-body card-body serviceinfo">
			
					<div class="col-md-12">
						<p><strong>{$groupname} - {$product}</strong></p>
						<p><a href="http://{$domain}" target="_blank">www.{$domain}</a> ( {$username} )&nbsp;
						{if $domainId}
							<a href="clientarea.php?action=domaindetails&id={$domainId}" class="btn btn-default btn-sm" target="_blank">{$LANG.managedomain}</a>
						{/if}
						</p>
					</div>

					{if $dedicatedip}
					<div class="col-md-12">
						<p><strong>{lang key='IP address'}</strong><br/>
						{$dedicatedip}</p>
					</div>
					{/if}

					<div class="col-md-12">
						<p><strong>{$LANG.orderbillingcycle}</strong><br/>
						{if $billingcycle != $LANG.orderpaymenttermonetime && $billingcycle != $LANG.orderfree}
							{$spanel->translate('billingcycletext', $recurringamount, $billingcycle, $paymentmethod)}
						{else}
							{$billingcycle}
						{/if}
						</p>
					</div>

					<div class="col-md-12">
						<p><strong>{$LANG.clientareahostingnextduedate}</strong><br/>
						{$nextduedate}
						{if $renewfunctionality}
							<a href="{$renewfunctionality.link}" class="btn btn-default btn-sm">{$renewfunctionality.text}</a>
						{/if}
						</p>
					</div>

					{if $configurableoptions}
					{foreach from=$configurableoptions item=configoption}
					<div class="col-md-12">
						<p><strong>{$configoption.optionname}</strong><br/>
						{if $configoption.optiontype eq 3}{if $configoption.selectedqty}{$LANG.yes}{else}{$LANG.no}{/if}{elseif $configoption.optiontype eq 4}{$configoption.selectedqty} x {$configoption.selectedoption}{else}{$configoption.selectedoption}{/if}
					</div>
					{/foreach}
					{/if}

					{if $customfields}

					{foreach from=$customfields item=field}
					<div class="col-md-12">
						<p><strong>{$field.name}</strong><br/>
						{if empty($field.value)}
							{$LANG.blankCustomField}
						{else}
							{$field.value}
						{/if}
						</p>
					</div>
					{/foreach}

					{/if}

					{if $availableAddonProducts}
					<div class="col-md-12">
						<p><strong>{lang key='addonsExtras'}</strong><br/>

						<form method="post" action="{$WEB_ROOT}/cart.php?a=add" class="form-inline">
							<input type="hidden" name="serviceid" value="{$serviceid}" />
							<select name="aid" class="form-control custom-select w-50 input-sm form-control-sm mr-2">
							{foreach $availableAddonProducts as $addonId => $addonName}
								<option value="{$addonId}">{$addonName}</option>
							{/foreach}
							</select><br/><br/>
							<button type="submit" class="btn btn-default btn-sm mt-1">
								<i class="fas fa-shopping-cart"></i>
								{lang key='purchaseActivate'}
							</button>
						</form>
						
						</p>
					</div>
					{/if}

				</div>
			</div>

			{if $showSpanel}
			
			<div class="panel card panel-default mb-3">
				<div class="panel-heading card-header">
					<h3 class="panel-title card-title m-0">
						{if $spanelbranding eq 'branded'}
							{$spanel->translate('brandedactionstitle')}
						{else}
							{$spanel->translate('unbrandedactionstitle')}
						{/if}
						{if $showSpanel}
							&nbsp;&nbsp;<a href="clientarea.php?action=productdetails&id={$serviceid}&dosinglesignon=1{if !$isspanelhosting}&adminlogin=1{/if}" class="btn btn-default btn-sm logintopanel" target="_blank">
								{if $spanelbranding eq 'branded'}<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgMjQyLjEzIDI0MC45MyI+CiAgPGRlZnM+CiAgICA8c3R5bGU+CiAgICAgIC5jbHMtMSB7CiAgICAgICAgZmlsbDogIzAzOWJlNTsKICAgICAgfQoKICAgICAgLmNscy0yIHsKICAgICAgICBmaWxsOiAjMzk0ZTc1OwogICAgICB9CiAgICA8L3N0eWxlPgogIDwvZGVmcz4KICA8cGF0aCBjbGFzcz0iY2xzLTEiIGQ9Ik0yMjYuNzUsOTAuNGwtMjMuMjgsOC41NGMtLjczLjI3LTEuMjcuOS0xLjQzLDEuNjYtMTIuMzIsNTguMDUtMzcuNDYsOTQuNjItNzYuNDIsMTExLjQtMS44OC45MS0zLjY4LDEuMzQtNS40OCwxLjM0LS42NiwwLTEuMzMtLjA2LTItLjE5LS40Mi0uMDgtLjg1LS4wNi0xLjI0LjA4bC03LjgyLDIuODgtMjEuMTYsNy42OGMtMS43OS42NS0yLjAzLDMuMDgtLjQxLDQuMDgsOS44OSw2LjA4LDIwLjY3LDEwLjYxLDMyLjE0LDEyLjkzbC41NS4xMi41NS0uMTRjMzQuOTEtOC4xOCw2Mi44Ny0zMS41Niw4My4xNS02OS40NSwxMS44NC0yMi4xNSwyMC43My00OS4yNywyNS44OC03OC40Mi4zLTEuNzItMS4zOS0zLjEyLTMuMDItMi41MloiLz4KICA8cGF0aCBjbGFzcz0iY2xzLTEiIGQ9Ik02LjksNjEuNzZjMi4yMSwxNi4wMiw0LjU1LDM3LjQ1LDkuNzIsNTcuNDgsMi4yOCw4Ljc3LDQuMTMsMTUuMzYsNi40LDIyLC40MSwxLjIxLDEuNzMsMS44NSwyLjkzLDEuNDFsMjAuMS03LjMxYzEuMTctLjQzLDEuNzctMS43MSwxLjM1LTIuODktMS45My01LjQxLTMuMTUtOS40OS00Ljc3LTE1LjQyLTEuMzQtNC44My0yLjU1LTkuODUtMy42OC0xNS4wMi0uMjItMS4wNC0uNDUtMi4wNy0uNjUtMy4xMi0yLjAyLTkuODEtMy42OC0yMC4yLTQuOTgtMzEuMjVsLS4xNC0xLjIzYy0uNzQtNi44NS0uNzUtNi45OSw1LjI0LTkuMjgsOC4zMS0zLjE1LDkwLjMxLTM0LjQ1LDExMi43MS00MywxLjk2LS43NSwxLjk0LTMuNTItLjAzLTQuMjVDMTM0LjY1LDMuODIsMTIzLjM0LDAsMTIwLjM1LDBjLTUuMTcsMC0zNC43NywxMS4yMy03Mi45NCwyNS45MS05LjE0LDMuNTMtMTcuMDUsNi41Ny0yMy4wMyw4LjgybC0xLjAzLjM4Yy0xNy41LDYuNTgtMTguMzQsNy44NS0xNi40NiwyNi40OCwwLC4wNiwwLC4xMiwwLC4xOFoiLz4KICA8cGF0aCBjbGFzcz0iY2xzLTIiIGQ9Ik01NS4xMywxNTAuOWwxMjYuMDItNDQuMThjMS4yNC0uNDQsMi40Ny43LDIuMTMsMS45N2wtLjkyLDMuNDdjLTEuMjEsNS4zNi0yLjU4LDEwLjUyLTQuMDcsMTUuNjktLjYsMi4wNy0yLjE2LDMuNzUtNC4xOCw0LjUybC0xNDEuNTcsNTQuMjJjLTIuMzMuODktMy45OSwyLjk3LTQuMzgsNS40M2wtLjg2LDUuNTRjLS40NCwyLjgzLDIuMzQsNS4wNiw1LjAxLDQuMDJsMTI5LjIyLTUwLjJjMy4zNi0xLjI5LDYuMzgsMi40Nyw0LjQ0LDUuNTEtNS42MSw4LjcyLTExLjg5LDE2LjM3LTE4Ljg5LDIyLjk0LTQuMzYsNC4xLTkuNTIsNy4zLTE1LjE0LDkuMzlMOS4zMywyMzMuOThjLTQuOTYsMS44My0xMC4wNS0yLjM2LTkuMjQtNy41OGw0LjY0LTMwLDMuNy0yMy45NmMuMzktMi40NywyLjA3LTQuNTQsNC4zOS01LjQzbDQyLjE1LTE2LjA0LjE2LS4wNloiLz4KICA8cGF0aCBjbGFzcz0iY2xzLTIiIGQ9Ik0yNDIuMDQsOWwtNy4zOSw0Ny43MmMtMS4wNCw2Ljg3LTUuNzMsMTIuNjMtMTIuMjUsMTUuMDdsLTEzLjg4LDUuMjEtMTQyLjIsNTEuMTdjLTIuMDYuNzQtNC4zMi0uMzYtNC45OS0yLjQ0LTEuMTYtMy42MS0yLjg3LTkuMDEtMy44Ny0xMi42Ny0uMTktLjY5LS4zOC0xLjM4LS41Ny0yLjA4LS41Mi0xLjk0LjUyLTMuOTUsMi40LTQuNjVsMTQ5Ljg2LTU1LjIyYzIuMzYtLjg4LDQuMDgtMi45Niw0LjQ2LTUuNDdsMS4wOS03Yy4zNy0yLjQ3LTIuMDUtNC40Ni00LjM4LTMuNTZMNTcuMzgsOTMuMDljLTIuMjQuODUtNC43Mi0uNTEtNS4xNy0yLjg3LTEuMDktNS43NS0yLjA3LTExLjctMi45My0xNy44Ni0uMjUtMS44Ljc5LTMuNTQsMi41LTQuMTdMMjMyLjc3LDEuNDRjNC45OC0xLjg1LDEwLjA5LDIuMzQsOS4yNyw3LjU3WiIvPgo8L3N2Zz4=" />{/if}{$spanel->translate( $logintospanellabel )}
							</a>&nbsp;
						{/if}
					</h3>
				</div>
				<div class="panel-body card-body">

					{foreach $spanelicons as $icon}

						<div class="col-12 col-md-12 col-lg-6 px-2">
							<a href="clientarea.php?action=productdetails&amp;id={$serviceid}&amp;dosinglesignon=1&amp;page={$icon.link}" target="_blank" class="justify-content-center justify-content-md-start align-items-center --sp-color-primary-2 fw-500 my-3 w-100 word-break-word menu-link text-capitalize " title="{$icon.label}">
								<span class="icon squircle align-items-center justify-content-center me-lg-2 mb-2 mb-lg-0 {$icon.color}">
									<span class="icon-sp-uh-{$icon.icon} --sp-color-greys-3 fs-3"></span>
								</span>
								<span class="text-lg-start mt-md-2 mt-lg-0 --sp-color-greys-3 ellipsis-lg menu-link-text">{$icon.label}</span>
							</a>
						</div>

					{/foreach}

				</div>
			</div>

			{/if}

		</div>

		{if $showSpanel}

		<div class="col-md-4">

			<div class="panel card panel-default mb-3">
				<div class="panel-heading card-header">
					<h3 class="panel-title card-title m-0">{$spanel->translate('usagestatstitle')}</h3>
				</div>
				<div class="panel-body card-body serviceinfo">

					{foreach from=$usagestats item=usage}
					<div class="col-md-12">
						<p><strong>{$usage.label}</strong><br/>
						
						{if $usage.usage !== false}
							{$usage.usage}{$usage.usage_sign} / 
						{/if}
						
						{if $usage.limit === false}
							{$spanel->translate('unlimitedtext')}
						{else}
							{$usage.limit}{$usage.usage_sign}
						{/if}
						
						</p>
						{if $usage.limit !== false && $usage.limit != 0 && $usage.usage !== false}
							<div class="progress progress-lg my-2 border">
								<div class="progress-bar --sp-bg-success-2 {if $usage.percent >= 80 && $usage.percent < 92}--sp-bg-warning-2{/if} {if $usage.percent >= 92}--sp-bg-danger-2{/if} fw-bold text-end px-2 rounded" style="width: {$usage.percent}%;" role="progressbar" aria-valuenow="{$usage.percent}" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" title="{$usage.percent}%"></div>
							</div>
						{/if}
					</div>
					{/foreach}

				</div>
			</div>

		</div>

		{/if}


	</div>

	{foreach $hookOutput as $output}
		<div>
			{$output}
		</div>
	{/foreach}

</div>