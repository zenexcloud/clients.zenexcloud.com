const userWidgetTemplate = `
	<div data-popover-content>
		<div class="user-widget" data-user-widget>
			<div class="user-widget-color-mark" data-color-mark></div>

			<div class="user-widget__wrapper">
				<div class="user-widget__header is-hidden" data-user-header>
					<div class="user-widget-gradient-mark" data-gradient-mark></div>
					<div class="user-general">
						<div class="user-data">
							<div class="user-avatar">
								<img src="" alt="User avatar" data-customer-avatar>
								<div class="popover__loader" data-customer-avatar-loader>
									<div class="w-100">
										<div class="ssc-circle"></div>
									</div>
								</div>
							</div>
							<div class="user-content">
								<div class="user-name">
									<div data-customer-name data-customer-name data-tooltip="" data-title="Show Profile">
										<a>
											<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M12.0274 8.7277L12.0273 12.6667C12.0273 13.0203 11.8868 13.3594 11.6368 13.6095C11.3867 13.8595 11.0476 14 10.694 14H3.33333C2.97971 14 2.64057 13.8595 2.39052 13.6095C2.14048 13.3594 2 13.0203 2 12.6667L2.00011 5.33333C2.00011 4.97971 2.14058 4.64057 2.39063 4.39052C2.64068 4.14048 2.97982 4 3.33344 4H7.36073" stroke="#0091EA" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M10 2H14V6" stroke="#0091EA" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M6.5 9.5L14 2" stroke="#0091EA" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</a> 
									</div>
									<div data-customer-status-container>
										<div class="label label--lg user-activity-status" data-customer-status-label data-tooltip data-tooltip-init>
											<span class="text-condensed--md" data-customer-status></span>
										</div>
									</div>
									<div class="user-content-right">
										<div class="user-login" data-customer-login-btn>
											<a href="#" class="btn btn--primary btn--sm btn--outline btn--transparent text--medium">
												Log In As Client
											</a>
										</div>
									</div>
								</div>
								<div>
									<div class="user-data__item is-hidden" data-customer-company-wrapper>
										<div class="user-brand">
											<div class="icon-container">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
											<path d="M8.5 5.5H14C14.2761 5.5 14.5 5.72386 14.5 6V15" stroke="#503EB3"/>
											<path d="M3.5 4.5H5H6.5M4.5 8.5H6.5" stroke="#503EB3" stroke-linecap="round"/>
											<path d="M3.5 11.5H5.5" stroke="#503EB3" stroke-linecap="round"/>
											<path d="M10.5 8.5H12.5M10.5 11.5H12.5" stroke="#503EB3" stroke-linecap="round"/>
											<path d="M0.5 14.5H1.5M15.5 14.5H8.5M1.5 14.5V2C1.5 1.72386 1.72386 1.5 2 1.5H8C8.27614 1.5 8.5 1.72386 8.5 2V14.5M1.5 14.5H8.5" stroke="#503EB3" stroke-linecap="round"/>
											</svg>
											</div>
											<p class="text-condensed" data-customer-company></p>
											<button class="more-brands more-data" data-show-brands-popover>
												<p class="text-condensed--xs text--info">Using More Brands</p>
											</button>
										</div>
									</div>
									<div class="popover__loader ssc ssc--tags" data-customer-company-loader>
										<div class="ssc-head-line w-40"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="user-details">
					<div class="widget-section__content widget-section--tags" data-tags-container>
									<div class="widget-section__wrapper" data-user-tags>
										<div class="user-tags" data-tag-list>
										</div>
										<button class="more-data is-hidden" data-show-tags-popover data-tags-more>
											<p class="text-condensed--xs text--info" data-services-more-count>+1</p>
										</button>
										<div class="widget-section__no-data is-hidden user-tags--edit" data-zero-data>
											<div class="label label--tag label--transparent">
												No tags
											</div>
										</div>
										<div class="widget-section__c2a ml-8 is-hidden" data-show-tags-popover data-edit-tags-popover data-zero-data>
											<button class="btn btn--link btn--size-clear btn-edit-tags">
												<p class="text-condensed--sm text--purple ">Set Tags</p>
											</button>
										</div>
									</div>
									<div class="is-hidden d-flex align-center" data-tags-unavailable>
									</div>
									<div class="popover__loader ssc ssc--tags" data-user-tags-loader>
										<div class="w-100">
											<div class="ssc-head-line"></div>
										</div>
									</div>
								</div>
						<div class="user-data">
							<div class="user-data__item">
								<div class="icon-container">
									<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M2.83327 2.50012H13.1666C13.8999 2.50012 14.4999 3.10012 14.4999 3.83346V12.1668C14.4999 12.9001 13.8999 13.5001 13.1666 13.5001H2.83327C2.09994 13.5001 1.49994 12.9001 1.49994 12.1668V3.83346C1.49994 3.10012 2.09994 2.50012 2.83327 2.50012Z" stroke="#503EB3" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M14.6666 4L7.99982 9L1.33331 4" stroke="#503EB3" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</div>
								<p class="text-condensed">
									<a href="" data-tooltip="" data-title="" data-customer-email></a>
								</p>
							</div>
							
							<div class="user-data__item">
								<div class="icon-container">
									<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M11.1667 1.5H4.83333C4.09695 1.5 3.5 2.09695 3.5 2.83333V13.1939C3.5 13.9303 4.09699 14.5 4.83337 14.5H11.1667C11.9031 14.5 12.5 13.903 12.5 13.1667L12.5 2.83333C12.5 2.09695 11.903 1.5 11.1667 1.5Z" stroke="#503EB3" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M8.11584 12H8.12251" stroke="#503EB3" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</div>
								<p class="text-condensed">
									<a href="" data-customer-phonenumber></a>
								</p>
							</div>
							<div class="user-data__item">
								<div class="icon-container">
									<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M2.5 9.99988C2.5 9.99988 3.33329 9.33337 5.33329 9.33337C7.33329 9.33337 8.66663 10.6667 10.6666 10.6667C12.6666 10.6667 13.5 9.99988 13.5 9.99988V1.99988C13.5 1.99988 12.6666 2.66671 10.6666 2.66671C8.66663 2.66671 7.33329 1.33337 5.33329 1.33337C3.33329 1.33337 2.5 2.49988 2.5 2.49988V9.99988Z" stroke="#503EB3" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M2.5 14.5V9.5" stroke="#503EB3" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</div>
								<p class="text-condensed" data-customer-address>

								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="popover__loader popover__loader--content" data-user-header-loader>
					<div class="w-100">
						<div class="ssc-square"></div>
					</div>
				</div>
			</div>
			<div class="user-widget__wrapper">
				<div class="user-widget__content is-hidden" data-user-content>
					<div class="widget-section widget-section--income" data-income-section data-section-container>
						<div class="widget-section__head">
							<div class="icon-container">
								<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M8.50537 0.5V14.5" stroke="#503EB3" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M12.5054 2.5H6.83875C6.21991 2.5 5.68198 2.69027 5.18883 3.18342C4.69568 3.67657 4.54205 4.13688 4.50541 4.83333C4.46494 5.60269 4.61865 6.13125 5.13512 6.70291C5.58714 7.20324 6.04787 7.5 6.66671 7.5C7.28555 7.5 10 7.5 10 7.5C10.6189 7.5 11.2124 7.74583 11.65 8.18342C12.0875 8.621 12.5314 9.31684 12.5054 10.1562C12.4838 10.8532 12.2596 11.3685 11.822 11.8061C11.3844 12.2437 10.7909 12.4895 10.1721 12.4895H4.50541" stroke="#503EB3" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</div>
							<div class="widget-section__title" test>
								<a href="" data-total-income-link>
									<p class="text-condensed--lg text--purple">Income</p>
								</a>
							</div>
							<div class="line-seperator"></div>
						</div>
						<div class="widget-section__content">
							<div class="income-details">
								<div class="income-type income-type--mrr mb-8">
									<div class="income-type__name" data-income-name>
										<p class="text--primary text--medium">Customer MRR:</p>
									</div>
									<div class="income-type__value">
										<p class="text-condensed text--green text-condensed--stronger" data-mrr-value></p>
									</div>
								</div>
								<div class="income-type">
									<div class="income-type__name" data-income-name>
										<p class="text-condensed text--primary">Sum Of Paid Invoices:</p>
									</div>

									<div class="income-type__value">
										<a class="text-condensed text--primary text-condensed--stronger income-type__count" data-paid-invoices-count></a>
										<!-- <p class="text-condensed text--green text-condensed--stronger" data-paid-invoices-sum></p> -->
										<div data-paid-invoices-list>
										
										</div>
									</div>
								</div>
								<div class="income-type">
									<div class="income-type__name" data-income-name>
										<p class="text-condensed text--primary">Sum Of Unpaid Invoices:</p>
									</div>
									<div class="income-type__value">
										<a class="text-condensed text--primary text-condensed--stronger income-type__count" data-unpaid-invoices-count></a>
										<!-- <p class="text-condensed text--red text-condensed--stronger" data-unpaid-invoices-sum></p> -->
										<div data-unpaid-invoices-list>
										
										</div>
									</div>
								</div>
								<div class="income-type">
									<div class="income-type__name" data-income-name>
										<p class="text-condensed text--primary">Credit Balance:</p>
									</div>
									<div class="income-type__value">
										<a class="text-condensed text--green text-condensed--stronger" data-credit-sum></a>
									</div>
								</div>
								<div class="income-type">
									<div class="income-type__name" data-income-name>
										<p class="text-condensed text--primary">Total Income:</p>
									</div>
									<div class="income-type__value">
										<a class="text-condensed text--green text-condensed--stronger" data-income-sum></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="widget-section widget-section--services" data-services-section data-section-container>
						<div class="widget-section__head">
							<div class="icon-container">
								<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M8.00012 10C9.10469 10 10.0001 9.10457 10.0001 8C10.0001 6.89543 9.10469 6 8.00012 6C6.89555 6 6.00012 6.89543 6.00012 8C6.00012 9.10457 6.89555 10 8.00012 10Z" stroke="#503EB3" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M12.9333 9.99996C12.8445 10.201 12.8181 10.4241 12.8573 10.6404C12.8965 10.8566 12.9996 11.0562 13.1533 11.2133L13.1933 11.2533C13.3173 11.3771 13.4156 11.5242 13.4827 11.686C13.5498 11.8479 13.5843 12.0214 13.5843 12.1966C13.5843 12.3718 13.5498 12.5453 13.4827 12.7072C13.4156 12.8691 13.3173 13.0161 13.1933 13.14C13.0695 13.2639 12.9224 13.3623 12.7605 13.4294C12.5987 13.4965 12.4252 13.531 12.25 13.531C12.0747 13.531 11.9012 13.4965 11.7394 13.4294C11.5775 13.3623 11.4305 13.2639 11.3066 13.14L11.2666 13.1C11.1095 12.9463 10.9099 12.8432 10.6937 12.804C10.4774 12.7647 10.2544 12.7912 10.0533 12.88C9.85611 12.9645 9.68795 13.1048 9.5695 13.2836C9.45105 13.4625 9.38748 13.6721 9.38663 13.8866V14C9.38663 14.3536 9.24615 14.6927 8.9961 14.9428C8.74605 15.1928 8.40691 15.3333 8.05329 15.3333C7.69967 15.3333 7.36053 15.1928 7.11048 14.9428C6.86043 14.6927 6.71996 14.3536 6.71996 14V13.94C6.7148 13.7193 6.64337 13.5053 6.51497 13.3258C6.38656 13.1462 6.20712 13.0095 5.99996 12.9333C5.79888 12.8445 5.57583 12.8181 5.35957 12.8573C5.1433 12.8965 4.94375 12.9996 4.78663 13.1533L4.74663 13.1933C4.62279 13.3173 4.47574 13.4156 4.31388 13.4827C4.15202 13.5498 3.97851 13.5843 3.80329 13.5843C3.62807 13.5843 3.45457 13.5498 3.29271 13.4827C3.13084 13.4156 2.98379 13.3173 2.85996 13.1933C2.73599 13.0695 2.63765 12.9224 2.57055 12.7605C2.50345 12.5987 2.46891 12.4252 2.46891 12.25C2.46891 12.0747 2.50345 11.9012 2.57055 11.7394C2.63765 11.5775 2.73599 11.4305 2.85996 11.3066L2.89996 11.2666C3.05365 11.1095 3.15675 10.9099 3.19596 10.6937C3.23517 10.4774 3.2087 10.2544 3.11996 10.0533C3.03545 9.85611 2.89513 9.68795 2.71627 9.5695C2.53741 9.45105 2.32782 9.38748 2.11329 9.38663H1.99996C1.64634 9.38663 1.3072 9.24615 1.05715 8.9961C0.807102 8.74605 0.666626 8.40691 0.666626 8.05329C0.666626 7.69967 0.807102 7.36053 1.05715 7.11048C1.3072 6.86043 1.64634 6.71996 1.99996 6.71996H2.05996C2.28062 6.7148 2.49463 6.64337 2.67416 6.51497C2.85369 6.38656 2.99044 6.20712 3.06663 5.99996C3.15537 5.79888 3.18184 5.57583 3.14263 5.35957C3.10342 5.1433 3.00032 4.94375 2.84663 4.78663L2.80663 4.74663C2.68266 4.62279 2.58431 4.47574 2.51721 4.31388C2.45011 4.15202 2.41558 3.97851 2.41558 3.80329C2.41558 3.62807 2.45011 3.45457 2.51721 3.29271C2.58431 3.13084 2.68266 2.98379 2.80663 2.85996C2.93046 2.73599 3.07751 2.63765 3.23937 2.57055C3.40124 2.50345 3.57474 2.46891 3.74996 2.46891C3.92518 2.46891 4.09868 2.50345 4.26055 2.57055C4.42241 2.63765 4.56946 2.73599 4.69329 2.85996L4.73329 2.89996C4.89041 3.05365 5.08997 3.15675 5.30623 3.19596C5.5225 3.23517 5.74555 3.2087 5.94663 3.11996H5.99996C6.19714 3.03545 6.3653 2.89513 6.48375 2.71627C6.6022 2.53741 6.66577 2.32782 6.66663 2.11329V1.99996C6.66663 1.64634 6.8071 1.3072 7.05715 1.05715C7.3072 0.807102 7.64634 0.666626 7.99996 0.666626C8.35358 0.666626 8.69272 0.807102 8.94277 1.05715C9.19282 1.3072 9.33329 1.64634 9.33329 1.99996V2.05996C9.33415 2.27448 9.39771 2.48408 9.51616 2.66294C9.63461 2.8418 9.80278 2.98212 9.99996 3.06663C10.201 3.15537 10.4241 3.18184 10.6404 3.14263C10.8566 3.10342 11.0562 3.00032 11.2133 2.84663L11.2533 2.80663C11.3771 2.68266 11.5242 2.58431 11.686 2.51721C11.8479 2.45011 12.0214 2.41558 12.1966 2.41558C12.3718 2.41558 12.5453 2.45011 12.7072 2.51721C12.8691 2.58431 13.0161 2.68266 13.14 2.80663C13.2639 2.93046 13.3623 3.07751 13.4294 3.23937C13.4965 3.40124 13.531 3.57474 13.531 3.74996C13.531 3.92518 13.4965 4.09868 13.4294 4.26055C13.3623 4.42241 13.2639 4.56946 13.14 4.69329L13.1 4.73329C12.9463 4.89041 12.8432 5.08997 12.804 5.30623C12.7647 5.5225 12.7912 5.74555 12.88 5.94663V5.99996C12.9645 6.19714 13.1048 6.3653 13.2836 6.48375C13.4625 6.6022 13.6721 6.66577 13.8866 6.66663H14C14.3536 6.66663 14.6927 6.8071 14.9428 7.05715C15.1928 7.3072 15.3333 7.64634 15.3333 7.99996C15.3333 8.35358 15.1928 8.69272 14.9428 8.94277C14.6927 9.19282 14.3536 9.33329 14 9.33329H13.94C13.7254 9.33415 13.5158 9.39771 13.337 9.51616C13.1581 9.63461 13.0178 9.80278 12.9333 9.99996V9.99996Z" stroke="#503EB3" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</div>
							<div class="widget-section__title">
								<a href="" data-servies-list>
									<p class="text-condensed--lg text--purple">Services</p>
								</a>
							</div>
							<div class="line-seperator"></div>
							<div class="widget-section__c2a" data-show-services-popover>
								<p class="text-condensed--sm text--purple">List Services</p>
							</div>
						</div>
						<div class="widget-section__content widget-section__content--hover" data-services-container>
							<div class="services-type" data-services-type="domains">
								<div class="services-type__name" data-services-names>
									<p class="text-condensed">Domains:</p>
								</div>
								<div class="services-type__statuses" data-services-list>
								</div>
								<button class="more-data is-hidden" data-show-services-popover>
									<p class="text-condensed--xs text--info" data-services-more-count>+1</p>
								</button>
							</div>
							<div class="services-type" data-services-type="services">
								<div class="services-type__name" data-services-names>
									<p class="text-condensed">Services:</p>
								</div>
								<div class="services-type__statuses" data-services-list>
								</div>
								<button class="more-data is-hidden" data-show-services-popover>
									<p class="text-condensed--xs text--info" data-services-more-count>+1</p>
								</button>
							</div>
							<div class="services-type" data-services-type="addons">
								<div class="services-type__name" data-services-names>
									<p class="text-condensed">Addons:</p>
								</div>
								<div class="services-type__statuses" data-services-list>
								</div>
								<button class="more-data is-hidden" data-show-services-popover>
									<p class="text-condensed--xs text--info" data-services-more-count>+1</p>
								</button>
							</div>
						</div>
					</div>
					<div class="widget-section widget-section--tickets" data-tickets-section data-section-container>
						<div class="widget-section__head">
							<div class="icon-container">
								<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M9.59776 4.40218C9.4756 4.52679 9.40718 4.69434 9.40718 4.86884C9.40718 5.04334 9.4756 5.21089 9.59776 5.33551L10.6644 6.40218C10.789 6.52433 10.9566 6.59275 11.1311 6.59275C11.3056 6.59275 11.4731 6.52433 11.5978 6.40218L14.1111 3.88884C14.4463 4.62963 14.5478 5.455 14.4021 6.25494C14.2563 7.05488 13.8702 7.79141 13.2953 8.36636C12.7203 8.94132 11.9838 9.3274 11.1839 9.47315C10.3839 9.6189 9.55855 9.5174 8.81776 9.18218L4.21109 13.7888C3.94587 14.0541 3.58616 14.2031 3.21109 14.2031C2.83602 14.2031 2.47631 14.0541 2.21109 13.7888C1.94587 13.5236 1.79688 13.1639 1.79688 12.7888C1.79688 12.4138 1.94587 12.0541 2.21109 11.7888L6.81776 7.18218C6.48253 6.44138 6.38103 5.61602 6.52678 4.81608C6.67253 4.01614 7.05861 3.27961 7.63357 2.70466C8.20853 2.1297 8.94505 1.74362 9.74499 1.59787C10.5449 1.45212 11.3703 1.55362 12.1111 1.88884L9.60442 4.39551L9.59776 4.40218Z" stroke="#503EB3" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</div>
							<div class="widget-section__title">
								<a href="" data-all-tickets-list>
									<p class="text-condensed--lg text--purple">Tickets</p>
								</a>
							</div>
							<div class="line-seperator"></div>
							<div class="widget-section__c2a" data-show-tickets-popover data-tickets-popover-main>
								<p class="text-condensed--sm text--purple">List Tickets</p>
							</div>
						</div>
						<div class="widget-section__content" data-tickets-list>
							<div class="user-log-status user-log-status--active" data-active-tickets-container data-show-tickets-popover>
								<p class="text-condensed">Active Tickets</p>
								<div class="label label--sm">
									<span class="text-condensed--sm user-log-status__quantity" data-active-tickets-count></span></div>
							</div>
							<div class="user-log-status user-log-status--cancelled" data-closed-tickets-container data-show-tickets-popover>
								<p class="text-condensed">Closed Tickets</p>
								<div class="label label--sm">
									<span class="text-condensed--sm user-log-status__quantity" data-closed-tickets-count></span></div>
							</div>
							<div class="widget-section__no-data is-hidden" data-zero-data>
								<div class="zero-data zero-data--empty">
									<span class="zero-data__title">No ticket history has been found for this client.
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="widget-section widget-section--activity" data-activity-section data-section-container>
						<div class="widget-section__head">
							<div class="icon-container">
								<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M14.5 7.53906L12 7.5L10 13.5L6 1.5L4 7.5H1.5" stroke="#503EB3" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</div>
							<div class="widget-section__title">
								<p class="text-condensed--lg text--purple">User Activity</p>
							</div>
							<div class="line-seperator"></div>
							<div class="widget-section__c2a" data-show-activity-popover>
								<p class="text-condensed--sm text--purple">View All in MetricsCube</p>
							</div>
						</div>
						<div class="widget-section__content">
							<ul class="activity-event-list activity-event-list--widget" data-activity-list>
							</ul>
						</div>
					</div>
					<div class="widget-section widget-section--comments" data-comments-section data-section-container>
						<div class="widget-section__head">
							<div class="icon-container">
								<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M13.5277 7.77801C13.53 8.65793 13.3244 9.52594 12.9277 10.3113C12.4573 11.2525 11.7342 12.0441 10.8393 12.5975C9.94448 13.1509 8.91321 13.4443 7.86104 13.4447C6.98113 13.447 6.11312 13.2414 5.32771 12.8447L1.52771 14.1113L2.79438 10.3113C2.39766 9.52594 2.19208 8.65793 2.19438 7.77801C2.19478 6.72585 2.48812 5.69458 3.04152 4.79971C3.59493 3.90485 4.38655 3.18173 5.32771 2.71135C6.11312 2.31463 6.98113 2.10905 7.86104 2.11135H8.19438C9.58394 2.18801 10.8964 2.77452 11.8805 3.75859C12.8645 4.74265 13.451 6.05512 13.5277 7.44468V7.77801Z" stroke="#503EB3" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</div>
							<div class="widget-section__title">
								<p class="text-condensed--lg text--purple">Comments</p>
							</div>
							<div class="line-seperator"></div>
							<div class="widget-section__c2a" data-show-comments-popover>
								<button class="btn btn--link btn--size-clear">
									<p class="text-condensed--sm text--purple" data-comments-count-popover>View All Comments (10)</p>
								</button>
							</div>
						</div>
						<div class="widget-section__content" data-comments-container>
							<div class="user-comments" data-comments data-latest-comment-container>
							</div>
							<div class="widget-section__no-data is-hidden" data-zero-data>
								<div class="zero-data zero-data--empty">
									<span class="zero-data__title">There are no comments written for this user.
									</span>
								</div>
							</div>
							
							<form class="comments-form is-active" name="addComment">
								<div class="comments-form__form">
									<input type="hidden" name="action" value="createComment">
									<input type="hidden" name="customer" value="" data-customer-id>
									<textarea class="is-hidden" placeholder="Write comment..." data-comments-editor name="comment"></textarea>
								</div>
								<div class="comments-form__edit-save is-hidden" data-edit-comment-actions>
									<button class="btn btn--link btn--red" data-cancel-edit-comment>Cancel</button>
							        <button class="btn btn--primary" data-save-edit-comment>
										<div class="icon-container">
											<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M2.55129 3.17949V12.9872C2.55129 13.589 3.03919 14.0769 3.64104 14.0769H12.359C12.9608 14.0769 13.4487 13.589 13.4487 12.9872V4.62713C13.4487 4.33811 13.3339 4.06093 13.1295 3.85657L11.6819 2.40892C11.4775 2.20456 11.2004 2.08974 10.9113 2.08974H3.64103C3.03919 2.08974 2.55129 2.57764 2.55129 3.17949ZM1.46155 3.17949V12.9872C1.46155 14.1909 2.43734 15.1667 3.64104 15.1667H12.359C13.5627 15.1667 14.5385 14.1909 14.5385 12.9872V4.62713C14.5385 4.0491 14.3088 3.49474 13.9001 3.086L12.4525 1.63836C12.0437 1.22962 11.4894 1 10.9113 1H3.64103C2.43734 1 1.46155 1.97579 1.46155 3.17949Z" fill="white"/>
												<path fill-rule="evenodd" clip-rule="evenodd" d="M5.82053 10.2628C5.5196 10.2628 5.27566 10.5068 5.27566 10.8077V14.6218H4.18591V10.8077C4.18591 9.90492 4.91776 9.17308 5.82053 9.17308H10.1795C11.0823 9.17308 11.8141 9.90492 11.8141 10.8077V14.6218H10.7244V10.8077C10.7244 10.5068 10.4804 10.2628 10.1795 10.2628H5.82053Z" fill="white"/>
												<rect x="5.27565" y="3.72437" width="5.44872" height="3.26923" rx="0.544872" stroke="white" stroke-width="1.08974"/>
											</svg>
										</div>
									</button>
								</div>
								<div class="comments-form__send" data-add-comment-actions>
									<div data-tooltip data-title="Add Comment">
										<button class="btn btn--primary btn--icon" data-add-comment>
											<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
												<g clip-path="url(#clip0_10259_358)">
												<path d="M13.5 7.49989L3.50003 7.49989" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M13.8562 7.42821L1.12829 13.5565L3.48531 7.42821L1.12829 1.29995L13.8562 7.42821Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
												</g>
												<defs>
												<clipPath id="clip0_10259_358">
												<rect width="16" height="16" fill="white"/>
												</clipPath>
												</defs>
											</svg>
										</button>
									</div>
								</div>
							</form>
						</div>
						<div class="widget-section__content is-hidden" data-comments-not-available>

						</div>
					</div>
				</div>
				<div class="popover__loader ssc" data-user-content-loader>
					<div class="w-100 ">
						<div class="ssc-head-line"></div>
						<div class="ssc-square ssc-square--sm mts"></div>
						<div class="ssc-head-line mt"></div>
						<div class="ssc-square ssc-square--sm mts"></div>
						<div class="ssc-head-line mt"></div>
						<div class="ssc-square ssc-square--sm mts"></div>
						<div class="ssc-head-line mt"></div>
						<div class="ssc-square ssc-square--sm mts"></div>
						<div class="ssc-head-line mt"></div>
						<div class="ssc-square ssc-square--lg mts"></div>
					</div>
				</div>
			</div>
			<div class="user-widget__footer">
				<a target="_blank" href="https://www.metricscube.io/">
					<p class="text--sm text--secondary">Powered by</p>
					<div class="icon-container">
						<svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M18.6624 2.64563C18.6576 2.15121 18.5139 1.6678 18.2473 1.2491C17.9597 0.804421 17.5464 0.452505 17.0585 0.236737C16.5705 0.0209685 16.0293 -0.0492192 15.5014 0.0348258L11.1012 0.710563C10.0387 0.873552 8.95701 0.873552 7.89448 0.710563L3.49639 0.0348258C2.96819 -0.0496424 2.42648 0.0203368 1.93813 0.236125C1.44978 0.451913 1.03617 0.804063 0.748362 1.2491C0.481797 1.6678 0.338105 2.15121 0.333252 2.64563H0.333252V15.3413C0.33541 15.8406 0.479206 16.3293 0.748362 16.7521C1.03674 17.1975 1.45115 17.5497 1.9403 17.7652C2.42946 17.9806 2.97191 18.0499 3.50054 17.9644L7.90071 17.2886C8.96323 17.1256 10.0449 17.1256 11.1074 17.2886L15.5076 17.9644C16.0349 18.0482 16.5756 17.9781 17.0631 17.7627C17.5506 17.5474 17.9637 17.1961 18.2515 16.7521C18.5218 16.3275 18.6656 15.8365 18.6666 15.3351V2.63948L18.6624 2.64563Z" fill="#5C4BD1" />
							<path d="M11.2672 5.61682C10.9712 5.61762 10.6775 5.6696 10.3997 5.7704C10.8534 5.92702 11.2575 6.19869 11.5712 6.55812C11.8848 6.91755 12.0971 7.35209 12.1867 7.81808C12.2251 7.9204 12.2455 8.02844 12.2469 8.13752V12.0998C12.2573 12.2985 12.3445 12.4856 12.4907 12.6226C12.6369 12.7596 12.8309 12.836 13.0325 12.836C13.2341 12.836 13.4281 12.7596 13.5743 12.6226C13.7205 12.4856 13.8077 12.2985 13.8181 12.0998V8.13343C13.817 7.46632 13.5479 6.82684 13.0698 6.35511C12.5916 5.88339 11.9434 5.6179 11.2672 5.61682Z" fill="white" />
							<path d="M8.60013 5.76837C8.21516 5.62988 7.80199 5.58515 7.39574 5.638C6.98949 5.69085 6.60219 5.8397 6.26677 6.07191C5.93135 6.30412 5.65772 6.61281 5.46917 6.97173C5.28062 7.33065 5.18271 7.72919 5.18378 8.13345V12.0998C5.1783 12.2049 5.19456 12.3101 5.23156 12.4088C5.26857 12.5076 5.32555 12.5978 5.39904 12.6742C5.47252 12.7505 5.56098 12.8113 5.65903 12.8528C5.75708 12.8943 5.86267 12.9157 5.96937 12.9157C6.07608 12.9157 6.18166 12.8943 6.27971 12.8528C6.37776 12.8113 6.46622 12.7505 6.53971 12.6742C6.6132 12.5978 6.67018 12.5076 6.70718 12.4088C6.74419 12.3101 6.76045 12.2049 6.75497 12.0998V8.13345C6.75638 8.03742 6.77247 7.94215 6.80271 7.85087C6.8875 7.3774 7.09876 6.93482 7.41471 6.56876C7.73066 6.20269 8.13987 5.9264 8.60013 5.76837Z" fill="white" />
							<path d="M10.3997 5.77042C10.0644 5.8901 9.75825 6.07774 9.50095 6.32125C9.24324 6.07676 8.93635 5.8884 8.60016 5.76837C8.1399 5.9264 7.73069 6.2027 7.41474 6.56876C7.09879 6.93482 6.88752 7.37741 6.80273 7.85087C6.87176 7.6305 7.01855 7.44184 7.21649 7.31909C7.41442 7.19635 7.65039 7.14765 7.8816 7.18182C8.1128 7.216 8.32394 7.3308 8.47671 7.50539C8.62949 7.67998 8.71379 7.9028 8.71432 8.13345V10.9449C8.72467 11.1436 8.81195 11.3308 8.95815 11.4678C9.10434 11.6048 9.29828 11.6811 9.49991 11.6811C9.70155 11.6811 9.89548 11.6048 10.0417 11.4678C10.1879 11.3308 10.2752 11.1436 10.2855 10.9449V8.13345C10.2847 7.90514 10.366 7.68395 10.5149 7.50922C10.6639 7.33449 10.8708 7.21756 11.099 7.17923C11.3271 7.1409 11.5616 7.18366 11.7608 7.29989C11.96 7.41613 12.1109 7.5983 12.1867 7.81401C12.0965 7.34876 11.8839 6.91507 11.5702 6.55641C11.2566 6.19774 10.8529 5.92669 10.3997 5.77042Z" fill="white" />
						</svg>
					</div>
				</a>
			</div>

			<div class="user-popover user-popover--brands is-hidden" data-brands-popover>
				<div class="user-popover__head">
					<p class="subtitle">User is Available in Other Brands</p>
					<div class="icon-container" data-popover-close>
                    	<i style="font-size:20px" class="antares-icon zmdi zmdi-close antares-icon--white"></i>
					</div>
				</div>
				<div class="user-popover__content" data-brands-container>
				</div>
			</div>
			<div class="user-popover user-popover--tags user-popover--sm is-hidden card card--tags" data-tags-popover>
				<div class="user-popover__head">
					<p class="subtitle">Tags</p>
					<div class="icon-container" data-popover-close>
                    	<i style="font-size:20px" class="antares-icon zmdi zmdi-close antares-icon--white"></i>
					</div>
				</div>
				<div class="user-popover__content" data-tags-container data-popover-tags-list>
				
				</div>
				<div class="user-popover__footer">
					<div class="card__footer">
						<div class="card__tag-list">
							<div class="card__select-tag" data-select-tags-container>
								<select class="select select--search-icon" data-select-tags>
									<option value="">Search for existing tags</option>
								</select>
							</div>
							<button data-tooltip data-title="Create new tag" class="btn btn--primary btn--icon" data-add-new-tag-button>
								<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M8 3V13" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M3 8.00024H13.0859" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</button>
						</div>
						<div class="card card__add-new-tag-form">
							<div class="card__content">
								<div class="card__close-add-new-tag"></div>
								<h5 class="card__title subtitle">
									Add New Tag
									<div class="btn btn--transparent" data-cancel-add-new-tag>
										<i style="font-size:20px" class="antares-icon zmdi zmdi-close antares-icon--white"></i>
									</div>
								</h5>
								<form name="createTag" data-create-tag-form>
									<div class="card__tag-name antares-input antares-input--md">
										<div class="input-box">
											<input name="name" type="text" placeholder="Enter Tag Name" data-new-tag-name>
										</div>
									</div>
									<div class="card__color-list">
										<div class="card__color-wrapper" data-color-list>

										</div>
										<label class="card__color card__color--add-new" data-tags-color-picker>
										<input type="radio" name="color" value="DEFINEDCOLOR">
										<span>
											<i class="zmdi zmdi-plus"></i>
											<i class="zmdi zmdi-check"></i>
										</span>
									</label>
									</div>
									<input type="hidden" name="action" value="createTag">
									<input type="hidden" name="customer" value="CUSTOMER HASH">
									<div class="card__add-new-tag-footer">
										<button type="submit" class="btn btn--primary" value="Tag">Save</button>
										<button class="btn btn--primary btn--outline" data-cancel-add-new-tag>Cancel</button>
									</div>
								</form>
							</div>
						</div>
						<div class="card card__edit-tag-form">
							<div class="card__content">
								<div class="card__close-edit-tag"></div>
								<h5 class="card__title subtitle">
									Edit Tag
									<div class="btn btn--transparent" data-cancel-edit-tag>
										<i style="font-size:20px" class="antares-icon zmdi zmdi-close antares-icon--white"></i>
									</div>
								</h5>
								<form name="editTag" data-edit-tag-form>
									<div class="card__tag-name antares-input antares-input--md">
										<div class="input-box">
											<input name="name" type="text" placeholder="Enter Tag Name" data-tag-name>
										</div>
									</div>
									<div class="card__color-list">
										<div class="card__color-wrapper" data-color-list>

										</div>
										<label class="card__color card__color--edit" data-edit-tags-color-picker>
											<input type="radio" name="color" value="DEFINEDCOLOR">
											<span>
												<i class="zmdi zmdi-plus"></i>
												<i class="zmdi zmdi-check"></i>
											</span>
										</label>
									</div>
									<input type="hidden" name="action" value="editTag">
									<input type="hidden" name="customer" value="CUSTOMER HASH">
									<div class="card__edit-tag-footer">
										<button type="submit" class="btn btn--primary" value="Tag">Save</button>
										<button class="btn btn--primary btn--outline" data-cancel-edit-tag>Cancel</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="user-popover user-popover--comments user-popover--sm is-hidden" data-comments-popover>
				<div class="user-popover__head">
					<p class="subtitle">Comments</p>
					<div class="icon-container" data-popover-close>
						<i style="font-size:20px" class="antares-icon zmdi zmdi-close antares-icon--white"></i>
					</div>
				</div>
				<div data-comments-container>
					<div class="user-comments user-comments--list" data-comments>
					</div>
					<div class="widget-section__no-data is-hidden" data-zero-data>
						<p class="text">Comments</span></p>
					</div>
				</div>
				<div class="popover__arrow" x-arrow></div>
			</div>
			<div class="user-popover user-popover--services user-popover--md is-hidden" data-services-popover>
				<div class="user-popover__head">
					<p class="subtitle">Services List</p>
					<div class="icon-container" data-popover-close>
                    	<i style="font-size:20px" class="antares-icon zmdi zmdi-close antares-icon--white"></i>
					</div>
				</div>
				<div class="user-popover__content">
					<div class="services-type" data-services-details-type="domains">
						<div class="user-popover__content-head">
							<p class="text text--md text--medium text--purple">Domains</p>
							<div class="line-seperator"></div>
						</div>
						<div class="services-type__list" data-services-details>
						</div>
						<a class="more-services" data-domains-more>
							<div class="icon-container">
								<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M8.5 2.5V12.5" stroke="#0091EA" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M3.5 7.50017H13.5859" stroke="#0091EA" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</div>
							<p class="text"><span data-domains-count>3</span> more</p>
						</a>
					</div>
					<div class="services-type" data-services-details-type="services">
						<div class="user-popover__content-head">
							<p class="text text--md text--medium text--purple">Services</p>
							<div class="line-seperator"></div>
						</div>
						<div class="services-type__list" data-services-details>

						</div>
						<a class="more-services d-flex" data-services-more>
							<div class="icon-container">
								<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M8.5 2.5V12.5" stroke="#0091EA" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M3.5 7.50017H13.5859" stroke="#0091EA" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</div>
							<p class="text"><span data-services-count>3</span> more</p>
						</a>
					</div>
				</div>
			</div>
			<div class="user-popover user-popover--tickets user-popover--md is-hidden" data-tickets-popover>
				<div class="user-popover__head">
					<p class="subtitle">Tickets</p>
					<div class="icon-container" data-popover-close>
                    	<i style="font-size:20px" class="antares-icon zmdi zmdi-close antares-icon--white"></i>
					</div>
				</div>
				<div class="user-popover__content">
					<div class="tickets-type">
						<div class="user-popover__content-head">
							<p class="text text--md text--medium text--green">Active Tickets</p>
							<div class="line-seperator"></div>
						</div>
						<div class="tickets-type__list" data-active-tickets-list>
						</div>
						<div class="tickets-type__more" data-active-tickets-more>
							<a href="#">
								<div class="icon-container">
									<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.5 2.5V12.5" stroke="#0091EA" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M3.5 7.50017H13.5859" stroke="#0091EA" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</div>
								<p class="text"><span data-active-tickets-more-count>13</span> more</p>
							</a>
						</div>
					</div>
					<div class="tickets-type">
						<div class="user-popover__content-head">
							<p class="text text--md text--medium text--secondary">Closed Tickets</p>
							<div class="line-seperator"></div>
						</div>
						<div class="tickets-type__list" data-closed-tickets-list>
						</div>
						<div class="tickets-type__more" data-closed-tickets-more>
							<a href="#">
								<div class="icon-container">
									<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.5 2.5V12.5" stroke="#0091EA" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M3.5 7.50017H13.5859" stroke="#0091EA" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</div>
								<p class="text"><span data-closed-tickets-more-count>13</span> more</p>
							</a>
						</div>
					</div>
				</div>
				<div class="user-popover__footer">
					<a href="#" data-tickets-more-link target="_blank">
						<span class="text">View all tickets</span>
						<div class="icon-container">
							<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M13.0274 8.22773L13.0273 12.1667C13.0273 12.5203 12.8868 12.8595 12.6368 13.1095C12.3867 13.3596 12.0476 13.5 11.694 13.5H4.33333C3.97971 13.5 3.64057 13.3596 3.39052 13.1095C3.14048 12.8595 3 12.5203 3 12.1667L3.00011 4.83336C3.00011 4.47974 3.14058 4.1406 3.39063 3.89055C3.64068 3.64051 3.97982 3.50003 4.33344 3.50003H8.36073" stroke="#0091EA" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M11 1.50003H15V5.50003" stroke="#0091EA" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M7.5 9.00003L15 1.50003" stroke="#0091EA" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</div>
					</a>
				</div>
			</div>
			<div class="user-popover user-popover--activity user-popover--md is-hidden" data-activity-popover>
				<div class="user-popover__head">
					<p class="subtitle">User Recent Activity</p>
					<div class="icon-container" data-popover-close>
                    	<i style="font-size:20px" class="antares-icon zmdi zmdi-close antares-icon--white"></i>
					</div>
				</div>
				<div class="user-popover__content">
					<ul class="activity-event-list activity-event-list--widget activity-event-list--popover" data-activity-list-full>
					</ul>
				</div>
				<div class="user-popover__footer">
					<a href="#" data-activity-more-link target="_blank">
						<span class="text">See all events from this customer at MetricsCube</span>
						<div class="icon-container">
							<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M13.0274 8.22773L13.0273 12.1667C13.0273 12.5203 12.8868 12.8595 12.6368 13.1095C12.3867 13.3596 12.0476 13.5 11.694 13.5H4.33333C3.97971 13.5 3.64057 13.3596 3.39052 13.1095C3.14048 12.8595 3 12.5203 3 12.1667L3.00011 4.83336C3.00011 4.47974 3.14058 4.1406 3.39063 3.89055C3.64068 3.64051 3.97982 3.50003 4.33344 3.50003H8.36073" stroke="#0091EA" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M11 1.50003H15V5.50003" stroke="#0091EA" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M7.5 9.00003L15 1.50003" stroke="#0091EA" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</div>
					</a>
				</div>
			</div>
			<div class="user-popover user-popover--remove-comments is-hidden" data-remove-comments-popover>
				<div class="user-popover__content">
					<p class="subtitle">You sure?</p>
					<div class="remove-comments">
						<button class="btn btn--sm btn--link btn--red" data-hide-remove-comments-popover>Cancel</button>
						<button class="btn btn--sm btn--primary-deep-light" data-comment-remove>Confirm</button>
					</div>
				</div>
			</div>

			<div class="color-picker" data-color-picker>
				<div class="color-picker__active-color" data-toggle-picker-colors data-tooltip-type="color-picker">
					<div class="color-picker__customize icon-container" data-colors-icon>
						<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle cx="11" cy="11" r="10.5" stroke="#EAEAF0" />
							<path d="M11.138 5.5L13.968 8.4298C14.5276 9.00883 14.9089 9.74669 15.0634 10.5501C15.218 11.3534 15.1389 12.1862 14.8362 12.943C14.5336 13.6999 14.0209 14.3468 13.363 14.8019C12.7052 15.2571 11.9317 15.5 11.1405 15.5C10.3492 15.5 9.57577 15.2571 8.91792 14.8019C8.26007 14.3468 7.74738 13.6999 7.44471 12.943C7.14203 12.1862 7.06297 11.3534 7.21752 10.5501C7.37208 9.74669 7.7533 9.00883 8.31297 8.4298L11.138 5.5Z" stroke="#8A8F99" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M6.43312 16.5L16.4331 5.5" stroke="#8A8F99" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
					<div class="color" data-active-color></div>
					<div class="color-picker__arrow icon-container">
						<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M9 5L6 8L3 5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" />
						</svg>
					</div>
				</div>
				<div class="color-picker__colors" data-colors-container>
					<div class="color" style="background-color: #E44A4A">
						<svg class="color__check" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M11.8288 4.30946L5.41218 10.7261L2.49551 7.80946" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
					<div class="color" style="background-color: #2ECC71">
						<svg class="color__check" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M11.8288 4.30946L5.41218 10.7261L2.49551 7.80946" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
					<div class="color" style="background-color: #4A91E4">
						<svg class="color__check" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M11.8288 4.30946L5.41218 10.7261L2.49551 7.80946" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
					<div class="color" style="background-color: #E59B2C">
						<svg class="color__check" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M11.8288 4.30946L5.41218 10.7261L2.49551 7.80946" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
					<div class="color" style="background-color: #E44AB9">
						<svg class="color__check" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M11.8288 4.30946L5.41218 10.7261L2.49551 7.80946" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
					<div class="color" style="background-color: #20C6EB">
						<svg class="color__check" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M11.8288 4.30946L5.41218 10.7261L2.49551 7.80946" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
					<div class="color color--clear" data-clear-color>
						<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle cx="11" cy="11" r="10.5" stroke="#EAEAF0" />
							<path d="M8 8L14 14" stroke="#8A8F99" stroke-linecap="round" />
							<path d="M14 8L8 14" stroke="#8A8F99" stroke-linecap="round" />
						</svg>
					</div>
					<div class="color-picker__arrow color-picker__arrow--up icon-container" data-toggle-picker-colors>
						<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M9 5L6 8L3 5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" />
						</svg>
					</div>
				</div>
			</div>
		</div>
		<div id="trumbowyg-icons">
			<svg xmlns="http://www.w3.org/2000/svg">
				<symbol id="trumbowyg-bold" width="16" height="16" viewBox="0 0 16 16" fill="none">
					<path
						d="M3.5 2.50015H9.33335C10.0406 2.50015 10.7189 2.7811 11.219 3.2812C11.7191 3.7813 12.1097 4.48288 12 5.33332C11.9366 5.825 11.8021 6.1071 11.5 6.50015C10.9678 7.1925 10.2072 7.50015 9.5 7.50015H3.5V5.33332V2.50015Z"
						stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
					<path
						d="M3.5 7.49988L10 7.49988C10.5 7.49988 11.488 7.66858 12 8.49988C12.4222 9.18538 12.5 9.69479 12.5 10.4999C12.5 11.305 12.4919 11.8626 12 12.4999C11.4664 13.1912 10.7072 13.5 10 13.5H3.5L3.5 7.49988Z"
						stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
				</symbol>

				<symbol id="trumbowyg-italic" width="16" height="16" viewBox="0 0 16 16" fill="none">
					<path d="M12.5 2.50015H6.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M9.5 13.4998H3.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M10 2.50015L6 13.5002" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
				</symbol>

				<symbol id="trumbowyg-strikethrough" width="16" height="16" viewBox="0 0 16 16" fill="none">
					<path d="M2.5 4.66666V2.50015H14.5V4.66666" stroke="currentColor" stroke-linecap="round"
						stroke-linejoin="round" />
					<path d="M6.5 13.4998H10.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M8.5 2.50015V13.5002" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M3.5 8.5H13.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
				</symbol>

				<symbol id="trumbowyg-h5" width="16" height="16" viewBox="0 0 16 16" fill="none">
					<path d="M3.5 2V13" stroke="currentColor" stroke-linecap="round" />
					<path d="M12 7.5L4 7.5" stroke="currentColor" stroke-linecap="round" />
					<path d="M12.5 2V13" stroke="currentColor" stroke-linecap="round" />
				</symbol>

				<symbol id="trumbowyg-underline" width="16" height="16" viewBox="0 0 16 16" fill="none">
					<path
						d="M3.50003 2.50006C3.50003 2.50006 3.49996 5.50006 3.50003 7.00001C3.50007 8.00006 3.70234 9.05731 4.50006 10.0001C5.46063 11.1353 6.51223 11.5001 8.00006 11.5001C9.48789 11.5001 10.5395 11.1353 11.5001 10.0001C12.2978 9.05731 12.5 8.00006 12.5 7.00001C12.5 5.99997 12.5 2.50006 12.5 2.50006"
						stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M2.40308 14.5H13.595" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
				</symbol>

				<symbol id="trumbowyg-unordered-list" width="16" height="16" viewBox="0 0 16 16" fill="none">
					<path d="M4.5 3.5462H13.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M4.5 7.49982H13.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M4.5 11.4998H13.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M1.521 3.5462H1.52766" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M1.521 7.5462H1.52766" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M1.521 11.5462H1.52766" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
				</symbol>
			</svg>
		</div>

	</div>

`;

var MCClientsLinkElements = [];
var MCClientsList = []; 
//styles
var link = document.createElement("link");
link.href =
  (window.whmcsBaseUrl != null ? window.whmcsBaseUrl : "..") +
  "/modules/addons/MetricsCube/assets/css/user-widget.css";
link.type = "text/css";
link.rel = "stylesheet";
link.media = "screen,print";

$("head").append(link);

function getUrlVars(url) {
  let vars = {};
  url.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
    vars[key] = value;
  });
  return vars;
}

function MCrenderClientPopup(clientDetailsData) {
  // let res = $.parseJSON(clientDetailsData)
  if (!window.isScriptLoaded) {
    var vendor = document.createElement("script");
    vendor.type = "text/javascript";
    vendor.src = "../../modules/addons/MetricsCube/assets/js/vendor.js";
    vendor.setAttribute("defer", "");

    $("head").append(vendor);

    var main = document.createElement("script");
    main.type = "text/javascript";
    main.src = "../../modules/addons/MetricsCube/assets/js/main.js";
    main.setAttribute("defer", "");

    $("head").append(main);
  }

  window.isScriptLoaded = true;

  // $('[data-popover-client-customer]').empty()
  // $('[data-popover-client-customer]').html(clientDetailsData.content)
}

function MCAjaxParams(params) {
  let now = new Date();
  params.clientTime = {
    dateTime:
      now.getFullYear() +
      "-" +
      ("0" + (now.getMonth() + 1)).slice(-2) +
      "-" +
      ("0" + now.getDate()).slice(-2) +
      " " +
      ("0" + now.getHours()).slice(-2) +
      ":" +
      ("0" + now.getMinutes()).slice(-2) +
      ":" +
      ("0" + now.getSeconds()).slice(-2),
    UTCDateTime:
      now.getUTCFullYear() +
      "-" +
      ("0" + (now.getUTCMonth() + 1)).slice(-2) +
      "-" +
      ("0" + now.getUTCDate()).slice(-2) +
      " " +
      ("0" + now.getUTCHours()).slice(-2) +
      ":" +
      ("0" + now.getUTCMinutes()).slice(-2) +
      ":" +
      ("0" + now.getUTCSeconds()).slice(-2),
    timeZone: Intl.DateTimeFormat().resolvedOptions().timeZone,
    timeZoneOffset: now.getTimezoneOffset(),
  };
  return params;
}

var MCAjaxRequest;
var MCClientPopupDelayTimer;
var MCClientPopupDelay = 1000;

function MCloadClientPopup(clientID) {
  let cacheKey = `MC.clientDetails.${clientID}.`;
  let clientDetailsData = localStorage.getItem(cacheKey);
  if (clientDetailsData === null) {
    // MCAjaxRequest = $.post('addonmodules.php?module=MetricsCube', MCAjaxParams({
    // 	module: "MetricsCube",
    // 	ajax: 1,
    // 	dataType: "json",
    // 	async: true,
    // 	moduleAction: "getClientDetails",
    // 	clientID: clientID,
    // 	remote: true,
    // })).success(response => {
    // 	try {
    // 		window.userData = $.parseJSON(response)
    // 		window.isWidgetStatic = false
    // 		// localStorage.setItem(cacheKey, response)
    // 		window.clientDetailsData = response
    // 		clientDetailsData = $.parseJSON(response);
    // 		// new UserWidget($('[data-widget-client-customer]'))
    // 		MCrenderClientPopup(clientDetailsData)
    // 	} catch (e) {
    // 	}
    // }).fail(() => {
    // });
  } else {
    clientDetailsData = $.parseJSON(clientDetailsData);
    MCrenderClientPopup(clientDetailsData);
  }
}

// MCloadClientPopup(3)

$(document).delegate(
  'a[href*="clientssummary.php"]',
  "mouseenter",
  function () {
    let href = $(this).attr("href");
    let urlParams = getUrlVars(href);
    if (typeof urlParams.userid === "string" && !isNaN(urlParams.userid)) {
      let clientID = urlParams.userid;
      MCloadClientPopup(clientID);
    }
  }
);

$(document).delegate("a[data-id]", "mouseenter", function () {
  let clientID = $(this).attr("data-id");
  if ($(this).hasClass("manage-user") && !isNaN(clientID)) {
    MCloadClientPopup(clientID);
  }
});

$(document).delegate('a[class="manage-user"]', "mouseenter", function () {
  let clientID = $(this).html();
  if ($(this).parent("td").length === 1 && !isNaN(clientID)) {
    MCloadClientPopup(clientID);
  }
});
/////


function MCAddClientToList(clientID, element) {
  element.attr("data-user-id", clientID);
  element.attr("data-client-customer-popover", "");
  if (!MCClientsList.includes(clientID)) {
    MCClientsList.push(clientID);
  }
  let duplicateClientElement = false;
  if (
    (duplicateClientElement = MCClientsLinkElements.find((obj) => {
      return obj.clientID == clientID;
    }))
  ) {
    if (
      element.parent().is("td") &&
      duplicateClientElement.element.parent().is("td")
    ) {
      if (
        element
          .parent()
          .parent()
          .is(duplicateClientElement.element.parent().parent())
      ) {
        if (
          duplicateClientElement.element.parent().index() <
          element.parent().index()
        ) {
          let index = MCClientsLinkElements.indexOf(duplicateClientElement);
          if (index !== -1) {
            MCClientsLinkElements[index] = {
              clientID: clientID,
              element: element,
            };
          }
        }
      }
    }
  } else {
    MCClientsLinkElements.push({ clientID: clientID, element: element });
  }
}

$('#contentarea table a[href*="clientssummary.php"]').each(function () {
  let href = $(this).attr("href");
  let urlParams = getUrlVars(href);
  if (typeof urlParams.userid === "string" && !isNaN(urlParams.userid)) {
    MCAddClientToList(urlParams.userid, $(this));
  }
});
$("a[data-id].manage-user").each(function () {
  let clientID = $(this).attr("data-id");
  if (!isNaN(clientID)) {
    MCAddClientToList(clientID, $(this));
  }
});
$('a[class="manage-user"]').each(function () {
  let clientID = $(this).html();
  if ($(this).parent("td").length === 1 && !isNaN(clientID)) {
    MCClientsLinkElements[clientID] = $(this);
  }
});

// if($('#clientsummarycontainer').length) {
// 	window.isWidgetStatic = true
// 	window.userWidgetRendered = true
// }

// $('a[data-client-customer-popover]').each((index, element) => {
// 	// new ClientCustomerPopover($(element))
// 	new UserWidget($(element))
// })

if (!window.isScriptLoaded) {
  //main.js
  var mainJS = document.createElement("script");
  mainJS.src =
    (window.whmcsBaseUrl != null ? window.whmcsBaseUrl : "..") +
    "/modules/addons/MetricsCube/assets/js/main.js";
  mainJS.type = "text/javascript";
  mainJS.setAttribute("defer", "");

  //vendor.js
  var vendorJS = document.createElement("script");
  vendorJS.src =
    (window.whmcsBaseUrl != null ? window.whmcsBaseUrl : "..") +
    "/modules/addons/MetricsCube/assets/js/vendor.js";
  vendorJS.type = "text/javascript";
  vendorJS.setAttribute("defer", "");

  var csrfInput = document.createElement("input");
  csrfInput.type = "hidden";
  csrfInput.name = "token";
  csrfInput.value = window.csrfToken;

  var loginForm = document.createElement("form");
  loginForm.method = "post";
  loginForm.id = "frmLoginAsOwner";
  loginForm.append(csrfInput);
}

function appendWidget() {
	if (!window.customScriptLoad && !document.querySelector('#clientsummarycontainer')) {
		if (!$("[data-popover-client-customer]").length) {
			var widgetContainer = document.createElement("div");
			widgetContainer.dataset.popoverClientCustomer = "";
			widgetContainer.classList.add(
			"popover",
			"popover--customer",
			"is-hidden"
			);

			$(function() {
				widgetContainer.innerHTML = userWidgetTemplate;
				$("body").append(widgetContainer);
			})

			window.userWidgetRendered = true;
			window.isWidgetStatic = false;
		}
		if(!$('#rs-module').length) {
			if (!$('script[src*="MetricsCube/assets/js/vendor.js"]').length) {
				$("head").append(vendorJS);
			}
			if (!$('script[src*="MetricsCube/assets/js/main.js"]').length) {
				$("head").append(mainJS);
			}
			if (window.csrfToken && !$("#frmLoginAsOwner").length) {
				$("body").append(loginForm);
			}
		}
	}
}

function appendScripts() {
  setTimeout(() => {
	if(document.readyState !== 'loading') {
		appendWidget()
	}
	else {
		document.addEventListener('DOMContentLoaded', (event) => {
			appendWidget()
		})
	}
  }, 0);
}

//client details or dashboard or clients list
if (
  (!window.isScriptLoaded && window.isWidgetStatic == false) ||
  MCClientsList.length
) {
  // delete isWidgetSTAtis
  setTimeout(() => {
    $("head").append(vendorJS);
  }, 0);
  setTimeout(() => {
    $("head").append(mainJS);
  }, 0);
  setTimeout(() => {
    if (window.csrfToken) {
      $("body").append(loginForm);
    }
  }, 0);
}
// clients list or dashboard
if (MCClientsList.length > 0 || $("#MCAdminDashboardWidget").length) {
  window.isWidgetStatic = false;

  if (window.isWidgetStatic === false && !window.userWidgetRendered) {
    var widgetContainer = document.createElement("div");
    widgetContainer.dataset.popoverClientCustomer = "";
    widgetContainer.classList.add("popover", "popover--customer", "is-hidden");
    widgetContainer.innerHTML = userWidgetTemplate;
    $("body").append(widgetContainer);
    window.userWidgetRendered = true;
  }

  // document.( "head" )[0].appendChild( link );
}

appendScripts();
