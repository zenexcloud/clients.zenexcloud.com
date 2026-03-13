<link href="https://fonts.cdnfonts.com/css/effra-trial" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
      rel="stylesheet">
<style>
    .lu-modal.lu-modal--connect {
       -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1050;
        display: -webkit-box !important;
        display: flex !important;
        outline: 0;
        
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.4s ease;
    }

    .lu-modal.lu-modal--connect.show .lu-modal__content {
        transform: scale(1);
    }

    .lu-modal.lu-modal--connect.show {
        opacity: 1;
        visibility: visible;
        overflow: auto;
    }

    .lu-modal.lu-modal--connect.show .lu-modal__container {
        display: block;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        overflow-x: hidden;
        overflow-y: auto;
        padding: 0;
    }

    .lu-modal.lu-modal--connect.show .lu-modal__dialog {
        -webkit-transform: scale(1);
        transform: scale(1);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 32px auto;
        min-height: calc(100dvh - 64px);
    }

    .lu-modal.lu-modal--connect .lu-modal__content {
        border-radius: 8px;
        box-shadow: 0px 16px 48px 6px #00000029;
        background: #fff;
        font-family: "Nunito", sans-serif;
        width: 720px;
        transform: scale(0.5);
        transform: all 0.4s ease;
    }

    .lu-modal.lu-modal--connect .lu-modal__dialog {
        -webkit-transform: scale(0.5);
        transform: scale(0.5);
        transition: all 0.3s;
        width: auto;
    }

    @media (max-width: 767px) {
        .lu-modal.lu-modal--connect .lu-modal__content {
            margin-inline: 24px;
            width: calc(100% - 48px);
        }
    }

    @media (max-width: 513px) {
        .lu-modal.lu-modal--connect .lu-modal__content {
            margin-inline: 12px;
            width: calc(100% - 24px) !important;
        }
    }

    .lu-modal.lu-modal--connect .lu-modal__top {
        display: flex;
        height: unset !important;
        justify-content: center;
        padding: 32px !important;
        position: relative;
    }

    @media (max-width: 767px) {
        .lu-modal.lu-modal--connect .lu-modal__top {
            padding: 24px !important;
        }
    }

    @media (max-width: 767px) {
        .lu-modal.lu-modal--connect .lu-modal__top .lu-top__logo {
            max-width: 180px;
        }
    }

    .lu-modal.lu-modal--connect .lu-modal__top .lu-top__toolbar {
        position: absolute;
        right: 32px;
        margin: 0 !important;
        height: 20px;
        top: 50%;
        transform: translateY(-50%);
    }

    .lu-modal.lu-modal--connect .lu-modal__top .lu-top__toolbar .lu-close {
        background: transparent;
        border: none;
        outline: none !important;
        margin: 0 !important;
        padding: 0 !important;
        margin: 20px;
        height: 20px;
    }

    .lu-modal.lu-modal--connect .lu-modal__top .lu-top__toolbar .lu-close svg path {
        transition: stroke 0.24s ease;
    }

    .lu-modal.lu-modal--connect .lu-modal__top .lu-top__toolbar .lu-close:hover svg path {
        stroke: #5c4bd1;
    }

    .lu-modal.lu-modal--connect .lu-modal__body {
        border: none;
        padding: 16px 32px 32px 32px !important;
        text-align: center;
    }

    @media (max-width: 513px) {
        .lu-modal.lu-modal--connect .lu-modal__body {
            padding: 16px 24px 24px !important;
        }
    }

    .lu-modal.lu-modal--connect .lu-modal__body .alert {
        display: block;
        text-align: center;
        padding: 16px;
        font-size: 15px;
        line-height: 24px;
        border-radius: 4px;
    }

    .lu-modal.lu-modal--connect .lu-modal__body .alert.alert--primary {
        background: #f4f2fc;
        color: #5c4bd1;
    }

    .lu-modal.lu-modal--connect .lu-modal__body .lu-modal__close-btn {
        outline: none !important;
        background: transparent;
        border: 1px solid #e1e5e8;
        border-radius: 4px;
        padding: 16px 35px;
        transition: background 0.24s ease;
        font-family: "Nunito", sans-serif;
    }

    .lu-modal.lu-modal--connect .lu-modal__body .lu-modal__close-btn .btn-text {
        font-size: 16px;
        line-height: 20px;
        font-weight: 700;
    }

    .lu-modal.lu-modal--connect .lu-modal__body .lu-modal__close-btn:hover {
        background: #f8fafc;
    }

    .lu-modal.lu-modal--connect .lu-modal__heading {
        padding: 0 32px !important;
        display: flex;
        flex-direction: column;
        align-items: center;
        overflow: hidden;
    }

    @media (max-width: 513px) {
        .lu-modal.lu-modal--connect .lu-modal__heading {
            padding: 0 24px !important;
        }
    }

    .lu-modal.lu-modal--connect .lu-modal__heading:has(.lu-modal__illustration) .lu-modal__title {
        margin-bottom: 32px !important;
    }

    .lu-modal.lu-modal--connect .lu-modal__heading .lu-modal__title {
        font-size: 34px !important;
        line-height: 42px !important;
        font-weight: 700 !important;
        margin-bottom: 16px !important;
        color: #29323a !important;
        text-align: center;
        margin-top: 0 !important;
        font-family: 'Effra Trial', sans-serif !important;
    }

    @media (max-width: 767px) {
        .lu-modal.lu-modal--connect .lu-modal__heading .lu-modal__title {
            font-size: 28px !important;
            line-height: 36px !important;
        }
    }

    .lu-modal.lu-modal--connect .lu-modal__heading .lu-modal__desc {
        font-size: 16px !important;
        line-height: 25px !important;
        font-weight: 400 !important;
        color: #63666c !important;
        text-align: center;
        margin: 0 !important;
    }

    .lu-modal.lu-modal--connect .lu-modal__heading .lu-modal__desc b {
        color: #29323a;
    }

    @media (max-width: 767px) {
        .lu-modal.lu-modal--connect .lu-modal__heading .lu-modal__desc {
            font-size: 14px !important;
            line-height: 22px !important;
        }
    }

    .lu-modal.lu-modal--connect .lu-modal__heading .lu-modal__illustration {
        margin-bottom: 32px;
    }

    .lu-modal.lu-modal--connect .lu-modal__login {
        max-width: 380px;
        margin: 0 auto;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 4px;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input:not(:last-of-type) {
        margin-bottom: 12px;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input .input__container {
        margin: 0;
        position: relative;
        margin-left: -4px;
        width: calc(100% + 8px) !important;
        border: 4px solid;
        border-color: transparent;
        transition: border-color 0.24s ease;
        border-radius: 6px;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input .input__container:has(input:focus-visible):not(.error) {
        border-color: #e9e6fa;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input .input__container.error input {
        color: #e25050 !important;
        border-color: #e25050 !important;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input .input__container.error input::placeholder {
        color: #e25050 !important;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input .input__container.error svg path, .lu-modal.lu-modal--connect .lu-modal__login .input .input__container.error svg > rect {
        stroke: #e25050;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input input {
        border-radius: 4px;
        border: 1px solid !important;
        border-color: #e1e5e8 !important;
        background: transparent;
        border: none;
        padding: 16px;
        padding-left: 48px;
        transition: border-color 0.24s ease;
        width: 100%;
        font-size: 16px !important;
        line-height: 20px !important;
        font-weight: 500;
        color: #29323a;
        outline: none !important;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input input:hover {
        border-color: #5c4bd1 !important;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input input:focus, .lu-modal.lu-modal--connect .lu-modal__login .input input:active, .lu-modal.lu-modal--connect .lu-modal__login .input input:focus-visible {
        border-color: #5c4bd1 !important;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input input::-webkit-input-placeholder {
        opacity: 1 !important;
    }

    @media (max-width: 513px) {
        .lu-modal.lu-modal--connect .lu-modal__login .input input {
            padding: 12px;
            padding-left: 48px;
        }
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input input:placeholder-shown {
        color: #8a8f99;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input input:-webkit-autofill, .lu-modal.lu-modal--connect .lu-modal__login .input input:-webkit-autofill:hover, .lu-modal.lu-modal--connect .lu-modal__login .input input:-webkit-autofill:focus, .lu-modal.lu-modal--connect .lu-modal__login .input input:-webkit-autofill:active {
        -webkit-box-shadow: 0 0 0px 1000px white inset !important;
        -webkit-text-fill-color: #29323a !important;
        transition: background-color 5000s ease-in-out 0s;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input__icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input__password-control {
        background: #fff;
        width: 24px;
        padding-left: 4px;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input__password-control:hover svg path {
        stroke: #5c4bd1 !important;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input__clear-field {
        background: #fff;
        width: 24px;
        padding-left: 4px;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input__clear-field:hover path {
        stroke: #5c4bd1 !important;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input__clear-field, .lu-modal.lu-modal--connect .lu-modal__login .input__password-control {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        height: 20px;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input__clear-field svg path, .lu-modal.lu-modal--connect .lu-modal__login .input__password-control svg path {
        transition: stroke 0.24s ease;
        stroke: #8a8f99 !important;
    }

    @media (max-width: 513px) {
        .lu-modal.lu-modal--connect .lu-modal__login .input__clear-field, .lu-modal.lu-modal--connect .lu-modal__login .input__password-control {
            right: 12px;
        }
    }

    .lu-modal.lu-modal--connect .lu-modal__login .input__error-alert {
        color: #e25050;
        font-size: 14px;
        line-height: 22px;
        font-weight: 500;
        text-align: left
    }

    .lu-modal.lu-modal--connect .lu-modal__body .lu-modal__labels .server-error-alert {
        color: #D73C3C;
        background: #FFEAEA;
        border: 1px solid #F5C2C2;
        border-radius: 4px;
        padding: 12px 16px;
        font-size: 15px;
        line-height: 25px;
        margin-top: 32px;
        position: relative;
        opacity: 0;
        visibility: hidden;
        transition: all .24s ease;
        display: flex;
        align-items: center
    }
    .lu-modal.lu-modal--connect .lu-modal__body .lu-modal__labels .server-error-alert .server-error-alert__text{
        width: 100%;
        text-align: center
    }
    .lu-modal.lu-modal--connect .lu-modal__body .lu-modal__labels .server-error-alert.fade-in {
        opacity: 1;
        visibility: visible
    }
    .lu-modal.lu-modal--connect .lu-modal__body .lu-modal__labels .server-error-alert svg {
        min-width: 20px;
        min-height: 20px;
        margin-right: 12px;
    }
    
    .lu-modal.lu-modal--connect .lu-modal__login .setup-form {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form__submit {
        background: #ffa125;
        color: #fff;
        border-radius: 4px;
        height: 52px;
        font-size: 16px !important;
        line-height: 20px !important;
        font-weight: 700 !important;
        width: 100%;
        transition: all 0.24s ease;
        outline: none !important;
        border: none !important;
        box-shadow: none !important;
        position: relative;
        font-family: "Nunito", sans-serif;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form__submit:hover {
        background: #ffb34e;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form__submit .btn-text {
        transition: all 0.24s ease;
        opacity: 1;
        visibility: visible;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form__submit svg {
        transition: all 0.24s ease;
        opacity: 0;
        visibility: hidden;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        animation: spin 2s linear infinite;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form__submit.btn-loading {
        background: #ffb34e;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form__submit.btn-loading .btn-text {
        opacity: 0;
        visibility: hidden;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form__submit.btn-loading svg {
        opacity: 1;
        visibility: visible;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form .lu-form-check {
        margin-bottom: 12px;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form .lu-form-check label {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 0;
    }

    @media (max-width: 513px) {
        .lu-modal.lu-modal--connect .lu-modal__login .setup-form .lu-form-check label {
            gap: 4px;
        }
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form .lu-form-check:last-of-type {
        margin-bottom: 0;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form .lu-form-check .lu-form-checkbox {
        display: none;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form .lu-form-check .lu-form-checkbox:checked + .lu-form-indicator {
        background: #644fdb !important;
        border-color: #644fdb !important;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form .lu-form-check .lu-form-checkbox:checked + .lu-form-indicator svg path {
        stroke: #fff !important;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form .lu-form-check .lu-form-checkbox + .lu-form-indicator {
        position: relative;
        width: 20px;
        height: 20px;
        min-width: 20px;
        border-radius: 2px;
        border: 1px solid;
        border-color: #e1e5e8;
        transition: all 0.24s ease;
        background: transparent;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form .lu-form-check .lu-form-checkbox + .lu-form-indicator:hover {
        border-color: #5c4bd1;
        background: #f4f2fc;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form .lu-form-check .lu-form-checkbox + .lu-form-indicator svg path {
        stroke: transparent !important;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form .lu-form-check .lu-form-text {
        font-size: 15px;
        line-height: 20px;
        font-weight: 400;
        margin: 0 !important;
        color: #63666c;
    }

    @media (max-width: 767px) {
        .lu-modal.lu-modal--connect .lu-modal__login .setup-form .lu-form-check .lu-form-text {
            font-size: 13px;
            line-height: 18px;
        }
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form .lu-form-check.error .lu-form-indicator {
        border-color: #d73c3c !important;
        background: #ffeaea !important;
    }

    .lu-modal.lu-modal--connect .lu-modal__login .setup-form .lu-form-check.error .lu-form-text {
        color: #d73c3c !important;
    }

    .lu-modal.lu-modal--connect .lu-modal__labels {
        margin-bottom: 20px;
    }

    @media (max-width: 767px) {
        .lu-modal.lu-modal--connect .lu-modal__labels .lu-modal__labels-container {
            flex-wrap: wrap;
            gap: 12px;
        }
    }

    @media (max-width: 513px) {
        .lu-modal.lu-modal--connect .lu-modal__labels {
            margin-bottom: 12px;
        }

        .lu-modal.lu-modal--connect .lu-modal__labels .lu-modal__labels-container {
            gap: 8px !important;
        }

        .lu-modal.lu-modal--connect .lu-modal__labels .lu-modal__labels-container span.label {
            width: 100%;
            justify-content: center;
        }
    }

    .lu-modal.lu-modal--connect .lu-modal__labels .lu-modal__labels-container {
        display: flex;
        justify-content: center;
        gap: 16px;
        margin-bottom: 16px;
    }

    .lu-modal.lu-modal--connect .lu-modal__labels .lu-modal__labels-container span.label.label--primary {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #5c4bd1;
        font-size: 14px;
        line-height: 15px;
        text-transform: none;
        font-weight: 600;
        background: #e9e6fa;
        padding: 8px;
        border-radius: 4px;
    }

    .lu-modal.lu-modal--connect .lu-modal__labels span:not(.label) {
        font-size: 16px;
        line-height: 25px;
        font-weight: 400;
        text-align: center;
        display: block;
    }

    .lu-modal.lu-modal--connect .lu-modal__labels span:not(.label) b {
        font-weight: 600;
    }

    .lu-modal.lu-modal--connect .lu-modal__actions {
        display: flex;
        justify-content: center;
        align-items: center;
        column-gap: 6px;
        padding: 20px !important;
        border-top: 1px solid #eaeaf0;
        flex-wrap: wrap;
    }

    .lu-modal.lu-modal--connect .lu-modal__actions span {
        font-size: 15px;
        line-height: 25px;
        font-weight: 400;
        color: #63666c;
    }

    .lu-modal.lu-modal--connect .lu-modal__actions .lu-modal__actions-link {
        display: flex;
        gap: 2px;
        align-items: center;
        color: #444 !important;
        font-size: 15px;
        line-height: 25px;
        font-weight: 600;
        transition: color 0.24s ease;
        text-decoration: none;
    }

    .lu-modal.lu-modal--connect .lu-modal__actions .lu-modal__actions-link:hover {
        color: #8472f3 !important;
    }

    .lu-modal.lu-modal--connect .lu-modal [form-content], .lu-modal.lu-modal--connect .lu-modal [form-content-send] {
        transition: opacity 0.3s ease, visibility 0.3s ease;
        opacity: 1;
        visibility: visible;
    }

    .lu-modal.lu-modal--connect .lu-modal .fade-out {
        opacity: 0;
        visibility: hidden;
    }

    .lu-modal.lu-modal--connect .lu-modal .fade-in {
        display: block !important;
        opacity: 0;
        visibility: hidden;
        animation: fadeInAnim 0.3s ease forwards;
    }

    @keyframes spin {
        from {
            transform: translate(-50%, -50%) rotate(0deg);
        }
        to {
            transform: translate(-50%, -50%) rotate(360deg);
        }
    }

    @keyframes fadeInAnim {
        from {
            opacity: 0;
            visibility: hidden;
        }
        to {
            opacity: 1;
            visibility: visible;
        }
    }

    .modal-backdrop-dashboard {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1040;
        background-color: rgba(0, 0, 0, 0.5) !important;
    }

    .modal-backdrop-dashboard.fade {
        opacity: 0;
    }

    .modal-backdrop-dashboard.show {
        opacity: 0.5;
    }

    .modal-backdrop-dashboard .lu-modal.fade.show {
        opacity: 1;
    }

    .modal-backdrop-dashboard .lu-modal.fade {
        opacity: 0;
        transition: opacity 0.15s linear;
    }
</style>

<div class="lu-modal lu-modal--connect" id="activated">
    <div class="lu-modal__container">
        <div class="lu-modal__dialog">
            <div class="lu-modal__content">
                <div class="lu-modal__top lu-top">
                    <svg class="lu-top__logo" width="191" height="36" viewBox="0 0 191 36" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_13600_2221)">
                            <path d="M36.5651 5.28771C36.5554 4.29872 36.2687 3.33174 35.7369 2.49421C35.1631 1.60471 34.3386 0.900759 33.3653 0.469154C32.3919 0.0375491 31.3121 -0.102849 30.259 0.0652683L21.4811 1.41696C19.3615 1.74299 17.2036 1.74299 15.084 1.41696L6.31017 0.0652683C5.25646 -0.103695 4.1758 0.0362855 3.20159 0.46793C2.22738 0.899575 1.40227 1.60399 0.828107 2.49421C0.296333 3.33174 0.00968222 4.29872 0 5.28771H0V30.6831C0.00430524 31.6818 0.291166 32.6595 0.828107 33.5053C1.4034 34.3962 2.2301 35.1007 3.20592 35.5317C4.18175 35.9626 5.26388 36.1012 6.31846 35.9301L15.0964 34.5784C17.216 34.2524 19.3739 34.2524 21.4935 34.5784L30.2714 35.9301C31.3235 36.0978 32.4021 35.9576 33.3746 35.5268C34.3471 35.0959 35.1711 34.3933 35.7452 33.5053C36.2844 32.6559 36.5714 31.6737 36.5733 30.6708V5.27542L36.5651 5.28771Z"
                                fill="#5C4BD1"/>
                            <path d="M182.254 18.4889C182.255 18.8731 182.41 19.2413 182.684 19.513C182.959 19.7847 183.331 19.9378 183.719 19.9389H189.33C189.718 19.9378 190.091 19.7847 190.365 19.513C190.64 19.2413 190.795 18.8731 190.796 18.4889C190.796 17.1044 190.381 15.751 189.603 14.5998C188.826 13.4487 187.72 12.5514 186.427 12.0216C185.134 11.4918 183.712 11.3532 182.339 11.6233C180.966 11.8934 179.705 12.5601 178.716 13.5391C177.726 14.518 177.052 15.7653 176.779 17.1232C176.506 18.4811 176.646 19.8886 177.182 21.1677C177.718 22.4468 178.625 23.5401 179.788 24.3093C180.952 25.0784 182.32 25.489 183.719 25.489H189.33C189.719 25.489 190.093 25.336 190.368 25.0637C190.643 24.7914 190.798 24.4221 190.798 24.037C190.798 23.6519 190.643 23.2825 190.368 23.0102C190.093 22.7379 189.719 22.5849 189.33 22.5849H183.719C182.973 22.5853 182.24 22.386 181.599 22.0081C180.957 21.6301 180.431 21.0877 180.076 20.4381C179.72 19.7885 179.549 19.056 179.58 18.3181C179.612 17.5802 179.844 16.8643 180.253 16.2463C180.661 15.6283 181.231 15.1311 181.902 14.8073C182.573 14.4836 183.321 14.3454 184.064 14.4073C184.808 14.4692 185.522 14.7289 186.129 15.159C186.735 15.5891 187.214 16.1736 187.512 16.8505L187.603 17.0512H183.724C183.337 17.0512 182.965 17.2021 182.69 17.4713C182.415 17.7404 182.258 18.1061 182.254 18.4889Z"
                                fill="#5C4BD1"/>
                            <path d="M151.084 25.6449C149.371 25.6428 147.728 24.9684 146.516 23.7698C145.305 22.5712 144.623 20.9461 144.621 19.251V12.722C144.61 12.5117 144.642 12.3014 144.716 12.1039C144.79 11.9063 144.904 11.7258 145.05 11.5731C145.197 11.4204 145.373 11.2988 145.569 11.2158C145.764 11.1327 145.975 11.0898 146.188 11.0898C146.401 11.0898 146.611 11.1327 146.807 11.2158C147.003 11.2988 147.179 11.4204 147.326 11.5731C147.472 11.7258 147.586 11.9063 147.66 12.1039C147.734 12.3014 147.766 12.5117 147.755 12.722V19.251C147.755 20.1244 148.106 20.9621 148.73 21.5797C149.354 22.1973 150.201 22.5442 151.084 22.5442C151.967 22.5442 152.814 22.1973 153.438 21.5797C154.062 20.9621 154.413 20.1244 154.413 19.251V12.722C154.402 12.5117 154.435 12.3014 154.508 12.1039C154.582 11.9063 154.696 11.7258 154.843 11.5731C154.989 11.4204 155.166 11.2988 155.361 11.2158C155.557 11.1327 155.767 11.0898 155.98 11.0898C156.193 11.0898 156.404 11.1327 156.599 11.2158C156.795 11.2988 156.971 11.4204 157.118 11.5731C157.265 11.7258 157.378 11.9063 157.452 12.1039C157.526 12.3014 157.558 12.5117 157.547 12.722V19.251C157.545 20.9461 156.864 22.5712 155.652 23.7698C154.44 24.9684 152.798 25.6428 151.084 25.6449Z"
                                fill="#5C4BD1"/>
                            <path d="M137.018 25.7106C135.814 25.7115 134.628 25.4184 133.566 24.8574C132.503 24.2963 131.597 23.4846 130.927 22.4941C130.258 21.5037 129.846 20.3652 129.728 19.1795C129.61 17.9938 129.789 16.7976 130.25 15.6969C130.711 14.5962 131.439 13.625 132.37 12.8695C133.302 12.1139 134.407 11.5973 135.588 11.3655C136.77 11.1336 137.991 11.1937 139.143 11.5404C140.295 11.8871 141.343 12.5096 142.194 13.3529C142.491 13.644 142.658 14.0398 142.66 14.453C142.661 14.8663 142.497 15.2632 142.202 15.5566C141.908 15.8499 141.508 16.0155 141.09 16.017C140.672 16.0186 140.271 15.8559 139.975 15.5647C139.389 14.9852 138.644 14.5903 137.831 14.4302C137.019 14.27 136.177 14.3518 135.412 14.6651C134.647 14.9784 133.993 15.5091 133.533 16.1902C133.073 16.8713 132.827 17.6721 132.827 18.4914C132.827 19.3106 133.073 20.1114 133.533 20.7925C133.993 21.4736 134.647 22.0043 135.412 22.3176C136.177 22.6309 137.019 22.7127 137.831 22.5525C138.644 22.3924 139.389 21.9976 139.975 21.418C140.274 21.1558 140.663 21.0166 141.063 21.0286C141.462 21.0406 141.842 21.2029 142.125 21.4825C142.407 21.7621 142.571 22.1379 142.584 22.5331C142.596 22.9284 142.455 23.3133 142.19 23.6093C141.51 24.2786 140.703 24.8086 139.816 25.1692C138.928 25.5297 137.978 25.7137 137.018 25.7106Z"
                                fill="#5C4BD1"/>
                            <path d="M57.011 11.231C55.6962 11.2307 54.4327 11.7359 53.4874 12.64C52.7689 11.9552 51.8625 11.4946 50.8812 11.3157C49.8999 11.1368 48.8871 11.2475 47.969 11.6339C47.0509 12.0204 46.2679 12.6655 45.7178 13.489C45.1677 14.3125 44.8746 15.2779 44.8751 16.265V24.199C44.8642 24.4093 44.8966 24.6196 44.9704 24.8171C45.0443 25.0146 45.1579 25.1952 45.3045 25.3479C45.4511 25.5005 45.6276 25.6221 45.8232 25.7052C46.0188 25.7883 46.2294 25.8311 46.4423 25.8311C46.6552 25.8311 46.8658 25.7883 47.0614 25.7052C47.257 25.6221 47.4335 25.5005 47.5801 25.3479C47.7267 25.1952 47.8404 25.0146 47.9142 24.8171C47.988 24.6196 48.0204 24.4093 48.0095 24.199V16.265C48.0095 15.7522 48.2154 15.2605 48.5819 14.8979C48.9484 14.5353 49.4455 14.3317 49.9638 14.3317C50.4822 14.3317 50.9792 14.5353 51.3458 14.8979C51.7123 15.2605 51.9182 15.7522 51.9182 16.265V21.8888C51.9072 22.0991 51.9397 22.3094 52.0135 22.5069C52.0873 22.7044 52.201 22.885 52.3476 23.0377C52.4942 23.1904 52.6707 23.3119 52.8663 23.395C53.0619 23.4781 53.2725 23.5209 53.4854 23.5209C53.6982 23.5209 53.9089 23.4781 54.1045 23.395C54.3001 23.3119 54.4765 23.1904 54.6231 23.0377C54.7697 22.885 54.8834 22.7044 54.9572 22.5069C55.031 22.3094 55.0635 22.0991 55.0526 21.8888V16.265C55.0526 15.7522 55.2585 15.2605 55.625 14.8979C55.9915 14.5353 56.4886 14.3317 57.0069 14.3317C57.5252 14.3317 58.0223 14.5353 58.3888 14.8979C58.7553 15.2605 58.9612 15.7522 58.9612 16.265V24.199C58.9819 24.5964 59.156 24.9708 59.4476 25.2448C59.7393 25.5189 60.1262 25.6717 60.5284 25.6717C60.9307 25.6717 61.3175 25.5189 61.6092 25.2448C61.9008 24.9708 62.0749 24.5964 62.0956 24.199V16.265C62.0934 14.9312 61.5572 13.6527 60.6042 12.7092C59.6512 11.7657 58.3592 11.2342 57.011 11.231Z"
                                fill="#302F38"/>
                            <path d="M86.1025 22.5934H85.1626C84.9862 22.594 84.8115 22.5591 84.6491 22.491C84.5561 22.439 84.4813 22.3602 84.4347 22.265C84.3881 22.1699 84.3719 22.063 84.3883 21.9585V14.7454H85.2951C85.6941 14.701 86.0604 14.5057 86.3173 14.2004C86.5743 13.895 86.702 13.5033 86.6739 13.107C86.6555 12.7456 86.5059 12.4029 86.2526 12.1418C85.9993 11.8807 85.6593 11.7188 85.2951 11.6857H84.4048V8.52765C84.4048 8.10942 84.2369 7.70831 83.9379 7.41257C83.639 7.11683 83.2335 6.95068 82.8107 6.95068C82.388 6.95068 81.9825 7.11683 81.6835 7.41257C81.3846 7.70831 81.2166 8.10942 81.2166 8.52765V11.7103H80.6287C80.2243 11.7625 79.8553 11.9653 79.5968 12.2773C79.3383 12.5894 79.2098 12.9871 79.2375 13.3896C79.2519 13.7598 79.4018 14.1122 79.6592 14.3811C79.9167 14.6501 80.2641 14.8174 80.637 14.8519H81.2166V22.0159C81.2166 22.0159 81.2166 22.0446 81.2166 22.0609C81.2166 22.0773 81.2166 22.0896 81.2166 22.106C81.2166 23.9779 82.3222 25.4934 84.3634 25.4934H86.0197H86.1232C86.5161 25.4272 86.867 25.211 87.1003 24.8913C87.2472 24.6898 87.3392 24.4543 87.3677 24.2075C87.3961 23.9607 87.3599 23.7108 87.2627 23.4817C87.1654 23.2527 87.0103 23.0523 86.8122 22.8996C86.6141 22.7469 86.3797 22.6471 86.1314 22.6098L86.1025 22.5934Z"
                                fill="#302F38"/>
                            <path d="M95.6921 10.9976H95.278C94.5967 11.0028 93.9184 11.0881 93.2574 11.2515C92.5501 11.4207 91.8805 11.7179 91.2824 12.1281C90.6624 12.5533 90.1495 13.1139 89.7835 13.7665C89.3895 14.5542 89.1894 15.423 89.1997 16.3019V23.9943C89.2206 24.3991 89.3978 24.7806 89.6949 25.0599C89.992 25.3392 90.3861 25.4949 90.7959 25.4949C91.2057 25.4949 91.5999 25.3392 91.8969 25.0599C92.194 24.7806 92.3712 24.3991 92.3921 23.9943V16.2978C92.3516 15.9069 92.4174 15.5124 92.5825 15.155C92.7455 14.8691 92.9755 14.626 93.2533 14.4464C93.5562 14.2809 93.8875 14.1726 94.2305 14.1269C94.5721 14.055 94.9205 14.0193 95.2697 14.0204H95.6838C95.8833 14.0006 96.0769 13.9416 96.2531 13.8469C96.4293 13.7521 96.5846 13.6235 96.7099 13.4687C96.8352 13.3138 96.928 13.1357 96.9829 12.9449C97.0378 12.7541 97.0536 12.5544 97.0295 12.3574C96.9941 12.0148 96.8428 11.6941 96.6 11.4473C96.3573 11.2004 96.0373 11.0419 95.6921 10.9976Z"
                                fill="#302F38"/>
                            <path d="M127.04 18.1901C126.402 17.7535 125.683 17.4472 124.924 17.289L123.206 16.8794C122.511 16.7435 121.834 16.5334 121.185 16.2527C121.055 16.1736 120.948 16.0601 120.879 15.9248C120.81 15.7896 120.779 15.6379 120.792 15.4867C120.789 15.3107 120.824 15.1361 120.896 14.9747C120.972 14.7934 121.088 14.6311 121.235 14.4996C121.666 14.1294 122.217 13.9257 122.788 13.9262C123.399 13.9443 123.993 14.1316 124.502 14.4668L124.945 14.8191C125.228 15.0662 125.597 15.1945 125.973 15.1767C126.35 15.159 126.705 14.9966 126.963 14.7241C127.221 14.4516 127.361 14.0904 127.353 13.7173C127.346 13.3442 127.192 12.9886 126.924 12.726L126.841 12.6523C126.741 12.5573 126.634 12.4684 126.523 12.386C125.464 11.6564 124.198 11.2778 122.908 11.3047C122.214 11.2856 121.522 11.3783 120.858 11.5791C119.977 11.8576 119.21 12.4089 118.671 13.1516C118.131 13.8944 117.847 14.7892 117.861 15.7038C117.826 16.2621 117.938 16.8198 118.186 17.3224C118.434 17.825 118.81 18.2552 119.277 18.5711C120.044 19.0224 120.885 19.3397 121.761 19.509L123.417 19.8859C123.624 19.9227 123.897 19.9965 124.167 20.0456H124.245C124.522 20.0821 124.78 20.2001 124.988 20.3842C125.195 20.5683 125.342 20.81 125.409 21.0778C125.433 21.2131 125.445 21.3501 125.446 21.4874C125.455 21.7438 125.378 21.9958 125.227 22.2042C125.005 22.4506 124.718 22.6308 124.398 22.7244C123.939 22.8721 123.457 22.9441 122.974 22.9374C121.732 22.9374 120.974 22.6179 120.564 22.0322L120.535 21.9912C120.299 21.7242 119.969 21.5567 119.612 21.5229C119.255 21.4892 118.899 21.5918 118.616 21.8098C118.333 22.0278 118.145 22.3445 118.091 22.6951C118.037 23.0457 118.12 23.4035 118.324 23.6952C118.364 23.7459 118.406 23.7938 118.453 23.8385C118.583 23.9822 118.721 24.1189 118.867 24.2481C119.373 24.6958 119.97 25.031 120.618 25.2312C121.402 25.4694 122.213 25.607 123.032 25.6408C124.285 25.6409 125.515 25.3115 126.597 24.6864C127.794 23.986 128.406 22.8186 128.423 21.2171C128.454 20.6399 128.345 20.0636 128.105 19.5368C127.864 19.0101 127.499 18.5482 127.04 18.1901Z"
                                fill="#302F38"/>
                            <path d="M69.6772 18.4889C69.6783 18.8731 69.8331 19.2413 70.1077 19.513C70.3824 19.7847 70.7545 19.9378 71.1429 19.9389H76.7534C77.1418 19.9378 77.514 19.7847 77.7886 19.513C78.0632 19.2413 78.218 18.8731 78.2191 18.4889C78.2191 17.1044 77.8041 15.751 77.0266 14.5998C76.249 13.4487 75.1439 12.5514 73.8509 12.0216C72.5579 11.4918 71.1351 11.3532 69.7625 11.6233C68.3898 11.8934 67.129 12.5601 66.1393 13.5391C65.1497 14.518 64.4758 15.7653 64.2027 17.1232C63.9297 18.4811 64.0698 19.8886 64.6054 21.1677C65.141 22.4468 66.048 23.5401 67.2116 24.3093C68.3753 25.0784 69.7434 25.489 71.1429 25.489H76.7534C77.1427 25.489 77.516 25.336 77.7913 25.0637C78.0665 24.7914 78.2212 24.4221 78.2212 24.037C78.2212 23.6519 78.0665 23.2825 77.7913 23.0102C77.516 22.7379 77.1427 22.5849 76.7534 22.5849H71.1429C70.3964 22.5853 69.6636 22.386 69.0221 22.0081C68.3807 21.6301 67.8545 21.0877 67.4992 20.4381C67.1439 19.7885 66.9728 19.056 67.0039 18.3181C67.035 17.5802 67.2672 16.8643 67.676 16.2463C68.0848 15.6283 68.6548 15.1311 69.3259 14.8073C69.9969 14.4836 70.744 14.3454 71.4879 14.4073C72.2319 14.4692 72.9451 14.7289 73.552 15.159C74.1589 15.5891 74.637 16.1736 74.9357 16.8505L75.0268 17.0512H71.1471C70.7601 17.0512 70.3887 17.2021 70.1135 17.4713C69.8383 17.7404 69.6816 18.1061 69.6772 18.4889Z"
                                fill="#302F38"/>
                            <path d="M100.056 11.231C99.6396 11.231 99.2405 11.3945 98.9462 11.6856C98.6519 11.9768 98.4866 12.3716 98.4866 12.7834V24.199C98.4756 24.4093 98.5081 24.6196 98.5819 24.8171C98.6557 25.0146 98.7694 25.1952 98.916 25.3479C99.0626 25.5005 99.2391 25.6221 99.4347 25.7052C99.6303 25.7883 99.8409 25.8311 100.054 25.8311C100.267 25.8311 100.477 25.7883 100.673 25.7052C100.868 25.6221 101.045 25.5005 101.192 25.3479C101.338 25.1952 101.452 25.0146 101.526 24.8171C101.599 24.6196 101.632 24.4093 101.621 24.199V12.7793C101.62 12.369 101.455 11.9758 101.161 11.6856C100.868 11.3955 100.471 11.232 100.056 11.231Z"
                                fill="#302F38"/>
                            <path d="M113.612 15.5649C113.912 15.827 114.301 15.9663 114.7 15.9543C115.1 15.9423 115.48 15.7799 115.762 15.5003C116.045 15.2207 116.209 14.845 116.221 14.4497C116.233 14.0545 116.092 13.6696 115.827 13.3735C114.804 12.3619 113.5 11.6732 112.081 11.3945C110.662 11.1157 109.191 11.2594 107.855 11.8074C106.518 12.3554 105.376 13.2831 104.573 14.4732C103.769 15.6633 103.34 17.0623 103.34 18.4935C103.34 19.9248 103.769 21.3238 104.573 22.5139C105.376 23.704 106.518 24.6317 107.855 25.1797C109.191 25.7277 110.662 25.8714 112.081 25.5926C113.5 25.3139 114.804 24.6252 115.827 23.6136C116.092 23.3175 116.233 22.9326 116.221 22.5374C116.209 22.1421 116.045 21.7664 115.762 21.4868C115.48 21.2072 115.1 21.0448 114.7 21.0328C114.301 21.0208 113.912 21.1601 113.612 21.4222C113.027 22.0018 112.281 22.3966 111.469 22.5568C110.657 22.7169 109.815 22.6352 109.05 22.3219C108.285 22.0086 107.631 21.4778 107.17 20.7967C106.71 20.1156 106.465 19.3148 106.465 18.4956C106.465 17.6764 106.71 16.8756 107.17 16.1945C107.631 15.5134 108.285 14.9826 109.05 14.6693C109.815 14.356 110.657 14.2743 111.469 14.4344C112.281 14.5946 113.027 14.9894 113.612 15.569V15.5649Z"
                                fill="#302F38"/>
                            <path d="M167.617 26.0668C165.62 26.0646 163.706 25.2789 162.294 23.8821C160.882 22.4853 160.088 20.5915 160.086 18.6161V7.17178C160.086 6.73073 160.263 6.30774 160.578 5.99587C160.893 5.684 161.321 5.50879 161.767 5.50879C162.213 5.50879 162.64 5.684 162.955 5.99587C163.271 6.30774 163.448 6.73073 163.448 7.17178V18.6161C163.448 19.4319 163.692 20.2293 164.151 20.9076C164.609 21.5859 165.26 22.1146 166.022 22.4268C166.784 22.739 167.622 22.8207 168.431 22.6615C169.24 22.5024 169.983 22.1095 170.566 21.5327C171.149 20.9558 171.546 20.2209 171.707 19.4208C171.868 18.6207 171.785 17.7913 171.469 17.0376C171.154 16.2839 170.619 15.6397 169.934 15.1865C169.248 14.7333 168.442 14.4914 167.617 14.4914H167.063C166.842 14.4914 166.623 14.4484 166.419 14.3648C166.215 14.2812 166.03 14.1587 165.874 14.0043C165.718 13.8499 165.594 13.6666 165.509 13.4648C165.425 13.263 165.381 13.0468 165.381 12.8284C165.381 12.61 165.425 12.3938 165.509 12.192C165.594 11.9902 165.718 11.8069 165.874 11.6525C166.03 11.4981 166.215 11.3756 166.419 11.292C166.623 11.2084 166.842 11.1654 167.063 11.1654H167.617C169.615 11.1654 171.531 11.9504 172.943 13.3477C174.355 14.7449 175.149 16.64 175.149 18.6161C175.149 20.5921 174.355 22.4872 172.943 23.8845C171.531 25.2818 169.615 26.0668 167.617 26.0668Z"
                                fill="#5C4BD1"/>
                            <path d="M21.8123 11.231C21.2217 11.2326 20.6359 11.3365 20.0815 11.5382C20.9868 11.8515 21.7928 12.3949 22.4186 13.1139C23.0443 13.8328 23.4678 14.702 23.6465 15.6342C23.7231 15.8388 23.7637 16.055 23.7666 16.2732V24.199C23.7873 24.5964 23.9614 24.9708 24.253 25.2448C24.5447 25.5189 24.9316 25.6717 25.3338 25.6717C25.7361 25.6717 26.1229 25.5189 26.4146 25.2448C26.7062 24.9708 26.8804 24.5964 26.901 24.199V16.265C26.8988 14.9305 26.362 13.6514 25.4081 12.7078C24.4543 11.7642 23.1612 11.2331 21.8123 11.231Z"
                                fill="white"/>
                            <path d="M16.492 11.5343C15.724 11.2573 14.8997 11.1679 14.0893 11.2736C13.2789 11.3793 12.5062 11.677 11.8371 12.1415C11.168 12.606 10.6221 13.2235 10.246 13.9414C9.86982 14.6594 9.67451 15.4566 9.67663 16.2653V24.1993C9.6657 24.4096 9.69813 24.6199 9.77196 24.8174C9.84578 25.0149 9.95945 25.1955 10.1061 25.3481C10.2527 25.5008 10.4291 25.6224 10.6247 25.7055C10.8203 25.7885 11.031 25.8314 11.2438 25.8314C11.4567 25.8314 11.6673 25.7885 11.8629 25.7055C12.0585 25.6224 12.235 25.5008 12.3816 25.3481C12.5282 25.1955 12.6419 25.0149 12.7157 24.8174C12.7895 24.6199 12.8219 24.4096 12.811 24.1993V16.2653C12.8138 16.0732 12.8459 15.8826 12.9062 15.7C13.0754 14.7529 13.4968 13.8676 14.1271 13.1354C14.7574 12.4031 15.5738 11.8505 16.492 11.5343Z"
                                fill="white"/>
                            <path d="M20.0814 11.5383C19.4126 11.7777 18.8019 12.153 18.2886 12.6401C17.7745 12.1511 17.1623 11.7743 16.4916 11.5342C15.5734 11.8503 14.7571 12.403 14.1268 13.1352C13.4965 13.8675 13.075 14.7528 12.9059 15.6998C13.0436 15.259 13.3364 14.8816 13.7313 14.6361C14.1261 14.3906 14.5969 14.2932 15.0581 14.3615C15.5194 14.4299 15.9406 14.6595 16.2453 15.0088C16.5501 15.358 16.7183 15.8037 16.7193 16.2651V21.8889C16.74 22.2863 16.9141 22.6607 17.2057 22.9348C17.4974 23.2088 17.8843 23.3616 18.2865 23.3616C18.6888 23.3616 19.0756 23.2088 19.3673 22.9348C19.6589 22.6607 19.833 22.2863 19.8537 21.8889V16.2651C19.8521 15.8084 20.0142 15.3659 20.3114 15.0164C20.6085 14.6669 21.0214 14.433 21.4765 14.3563C21.9316 14.2797 22.3994 14.3652 22.7968 14.5977C23.1941 14.8302 23.4952 15.1946 23.6464 15.6261C23.4664 14.6955 23.0423 13.8279 22.4166 13.1105C21.7909 12.3931 20.9856 11.8509 20.0814 11.5383Z"
                                fill="#CBC4F3"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_13600_2221">
                                <rect width="190.8" height="36" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <div class="lu-top__toolbar">
                        <button class="lu-close" data-dismiss="lu-modal" aria-label="Close">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 4.05087L15.8767 15.9486M4.02124 16L16 4" stroke="#8A8F99" stroke-width="1.2"
                                    stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="lu-modal__heading">
                    <h2 class="lu-modal__title">Thank you for connecting!</h2>

                    <svg class="lu-modal__illustration" width="486" height="115" viewBox="0 0 486 115" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M168.498 60.4362C165.624 60.4362 162.481 58.8127 159.607 55.8363C154.578 50.7853 151.704 43.9304 151.614 36.805V31.3031C151.524 22.1933 158.799 14.6169 167.959 14.4365H169.396C178.467 14.4365 185.742 22.0129 185.742 31.3933V36.8952C185.562 49.3422 175.952 60.4362 168.498 60.4362Z"
                            fill="white"/>
                        <path d="M195.411 67.3901V67.3911C199.48 68.802 202.17 72.6197 202.17 76.9478V77.7017C202.082 77.8076 201.969 77.9463 201.826 78.1108C201.449 78.5456 200.881 79.1723 200.127 79.9292C198.619 81.4438 196.371 83.4738 193.427 85.52C187.537 89.6129 178.881 93.7559 167.776 94.0005C156.683 94.2447 148.178 90.3745 142.438 86.438C139.566 84.469 137.39 82.4856 135.936 80.9985C135.209 80.2555 134.663 79.6374 134.302 79.2085C134.165 79.0457 134.056 78.9088 133.972 78.8042V76.9478C133.972 72.6235 136.657 68.8089 140.72 67.395L156.161 62.2397C156.226 62.3162 156.303 62.4082 156.397 62.519C156.829 63.0293 157.473 63.7577 158.399 64.4946C160.269 65.9847 163.209 67.4458 167.799 67.4458C172.386 67.4458 175.449 65.9867 177.442 64.5171C178.43 63.7882 179.14 63.0676 179.622 62.561C179.753 62.4237 179.855 62.3143 179.94 62.2261L195.411 67.3901Z"
                            fill="#5847CD" stroke="#5847CD" stroke-width="2" stroke-linecap="round"/>
                        <path d="M168.716 60.0232C165.966 60.0232 162.959 58.4415 160.21 55.5418C155.398 50.621 152.649 43.9429 152.563 37.0011V31.641C152.477 22.7661 159.436 15.385 168.2 15.2092H169.575C178.253 15.2092 185.212 22.5904 185.212 31.7289V37.089C185.041 49.2151 175.847 60.0232 168.716 60.0232Z"
                            stroke="#5847CD" stroke-width="2"/>
                        <path opacity="0.15"
                            d="M168.928 60.6099C167.856 60.5157 166.784 60.2332 165.801 59.668C171.429 57.1248 177.951 48.0823 177.951 37.3444V31.5987C177.951 23.6865 172.502 16.9047 165.622 15.586C166.516 15.3976 167.409 15.2092 168.302 15.2092H169.732C177.862 15.2092 184.563 22.5562 184.563 31.5987V37.3444C184.473 50.2488 175.092 60.6099 168.928 60.6099Z"
                            fill="#5847CD"/>
                        <path d="M212.421 33.791C206.424 14.7789 188.714 1 167.799 1C141.953 1 121 22.0426 121 48C121 73.9574 141.953 95 167.799 95C193.645 95 214.598 73.9574 214.598 48C214.598 46.3389 214.512 44.698 214.344 43.0814"
                            stroke="#5847CD" stroke-width="2" stroke-linecap="round"/>
                        <path d="M199 111C210.598 111 220 101.598 220 90C220 78.402 210.598 69 199 69C187.402 69 178 78.402 178 90C178 101.598 187.402 111 199 111Z"
                            fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M199 69.9131C187.906 69.9131 178.913 78.9063 178.913 90C178.913 101.094 187.906 110.087 199 110.087C210.094 110.087 219.087 101.094 219.087 90C219.087 78.9063 210.094 69.9131 199 69.9131Z"
                            stroke="#5847CD" stroke-width="2"/>
                        <path opacity="0.15" fill-rule="evenodd" clip-rule="evenodd"
                            d="M199.183 110.008C198.639 110.008 198.108 109.969 197.571 109.923C202.407 109.511 205.716 106.553 209.004 102.862C212.291 99.171 213.291 94.0652 213.291 89.0472C213.291 84.0292 212.291 80.8289 209.004 77.138C205.716 73.447 201.931 70.8805 197.094 70.4688C197.632 70.423 198.639 69.9924 199.183 69.9924C201.724 69.9924 204.24 70.5099 206.587 71.5154C208.935 72.5209 211.068 73.9946 212.864 75.8525C214.661 77.7104 216.086 79.916 217.058 82.3434C218.031 84.7708 218.531 87.3725 218.531 90C218.531 92.6274 218.031 95.2291 217.058 97.6565C216.086 100.084 214.661 102.29 212.864 104.147C211.068 106.005 208.935 107.479 206.587 108.485C204.24 109.49 201.724 110.008 199.183 110.008Z"
                            fill="#5C4BD1"/>
                        <path d="M190.425 89.5235L198.047 96.6691L209.48 84.2834" stroke="#5847CD" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M259 44.7155V16.5221C259.024 13.9951 259.745 11.5243 261.083 9.38431C262.527 7.10966 264.603 5.30978 267.054 4.20686C269.504 3.10394 272.223 2.74627 274.873 3.178L296.944 6.63176C302.276 7.46482 307.704 7.46482 313.036 6.63176L335.116 3.178C337.765 2.74844 340.482 3.10717 342.93 4.20999C345.379 5.3128 347.453 7.11149 348.896 9.38431C350.234 11.5243 350.976 13.9637 351 16.4907V81.3796C350.995 83.9423 350.273 86.4519 348.917 88.6221C347.473 90.8912 345.4 92.6865 342.954 93.7873C340.507 94.8881 337.794 95.2464 335.148 94.8179L313.067 91.3641C307.735 90.5311 302.307 90.5311 296.975 91.3641L274.894 94.8179C272.241 95.255 269.519 94.9011 267.064 93.7999C264.61 92.6986 262.53 90.8985 261.083 88.6221C259.732 86.4609 259.011 83.963 259 81.411V56.5871"
                            stroke="#5847CD" stroke-width="2" stroke-linecap="round"/>
                        <path d="M330.709 32.7381C330.696 31.3647 330.298 30.0219 329.56 28.8589C328.764 27.6237 327.62 26.6461 326.27 26.0468C324.92 25.4474 323.422 25.2524 321.961 25.4859L309.783 27.3629C306.843 27.8157 303.849 27.8157 300.909 27.3629L288.737 25.4859C287.275 25.2513 285.776 25.4457 284.424 26.0451C283.073 26.6445 281.928 27.6227 281.132 28.8589C280.394 30.0219 279.996 31.3647 279.983 32.7381V32.7381V68.0039C279.989 69.3908 280.387 70.7484 281.132 71.9229C281.93 73.1601 283.077 74.1384 284.43 74.7369C285.784 75.3354 287.285 75.5278 288.748 75.2902L300.926 73.4132C303.866 72.9604 306.86 72.9604 309.801 73.4132L321.978 75.2902C323.437 75.5231 324.934 75.3284 326.283 74.7301C327.632 74.1318 328.775 73.1561 329.572 71.9229C330.32 70.7434 330.718 69.3795 330.721 67.9868V32.7211L330.709 32.7381Z"
                            fill="#5C4BD1"/>
                        <path d="M310.243 40.9915C309.423 40.9937 308.611 41.1381 307.842 41.4181C309.098 41.8531 310.216 42.6078 311.084 43.6062C311.952 44.6046 312.54 45.8116 312.787 47.1061C312.894 47.3903 312.95 47.6904 312.954 47.9934V58.9997C312.983 59.5516 313.224 60.0715 313.629 60.452C314.033 60.8326 314.57 61.0448 315.128 61.0448C315.686 61.0448 316.223 60.8326 316.628 60.452C317.032 60.0715 317.274 59.5516 317.302 58.9997V47.982C317.299 46.1289 316.555 44.3526 315.231 43.0423C313.908 41.7319 312.114 40.9945 310.243 40.9915Z"
                            fill="white"/>
                        <path d="M302.862 41.4122C301.797 41.0275 300.653 40.9033 299.529 41.0501C298.405 41.1969 297.333 41.6104 296.404 42.2554C295.476 42.9004 294.719 43.7579 294.197 44.7549C293.675 45.7519 293.404 46.8589 293.407 47.9819V58.9996C293.392 59.2916 293.437 59.5836 293.539 59.8579C293.642 60.1322 293.8 60.383 294.003 60.595C294.206 60.807 294.451 60.9758 294.722 61.0912C294.994 61.2065 295.286 61.266 295.581 61.266C295.877 61.266 296.169 61.2065 296.44 61.0912C296.712 60.9758 296.956 60.807 297.16 60.595C297.363 60.383 297.521 60.1322 297.623 59.8579C297.726 59.5836 297.771 59.2916 297.755 58.9996V47.9819C297.759 47.7151 297.804 47.4505 297.888 47.1969C298.122 45.8818 298.707 44.6524 299.581 43.6355C300.456 42.6187 301.588 41.8512 302.862 41.4122Z"
                            fill="white"/>
                        <path d="M307.842 41.418C306.914 41.7505 306.067 42.2717 305.355 42.9481C304.641 42.269 303.792 41.7458 302.862 41.4124C301.588 41.8513 300.455 42.6188 299.581 43.6357C298.707 44.6525 298.122 45.8819 297.887 47.1971C298.078 46.5849 298.484 46.0609 299.032 45.7199C299.58 45.379 300.233 45.2437 300.873 45.3386C301.513 45.4336 302.097 45.7524 302.52 46.2374C302.943 46.7224 303.176 47.3413 303.178 47.982V55.7917C303.206 56.3435 303.448 56.8634 303.852 57.244C304.257 57.6245 304.794 57.8367 305.352 57.8367C305.91 57.8367 306.446 57.6245 306.851 57.244C307.256 56.8634 307.497 56.3435 307.526 55.7917V47.982C307.524 47.3478 307.748 46.7334 308.161 46.248C308.573 45.7627 309.146 45.4379 309.777 45.3314C310.408 45.2249 311.057 45.3437 311.609 45.6666C312.16 45.9895 312.578 46.4955 312.787 47.0947C312.538 45.8023 311.949 44.5976 311.081 43.6013C310.213 42.6051 309.096 41.8521 307.842 41.418Z"
                            fill="#CBC4F3"/>
                        <path d="M229.834 34.9768H214.598C211.333 37.1629 209 39.0001 209 39.0001H229.134C231.855 39.0001 235.82 41.5349 235.82 44.2675C235.82 46.2879 239.449 48.3513 241 47.5001C241.547 47.2 241.262 46.5 241.262 45.3605C241.262 40.9884 236.146 34.9768 229.834 34.9768Z"
                            fill="#5847CD" fill-opacity="0.15"/>
                        <path d="M252.699 34.9767L238.5 34.5C235.753 36.1395 241.744 38.8197 243.901 38.9098C246.058 39 248.782 39 251.5 39C253.914 39 257.959 41.3679 258.831 44C259.064 44.7019 259.382 45.5 259.523 45C259.887 43.7085 260.308 41.2619 260.308 39.7808C260.308 37.1704 254.329 35.0821 252.699 34.9767Z"
                            fill="#5847CD" fill-opacity="0.15"/>
                        <path d="M230 46.5C230 52.8513 235.156 58 241.516 58H252.484C258.844 58 264 52.8513 264 46.5C264 40.1487 258.844 35 252.484 35H241.516C240.571 35 239.653 35.1136 238.774 35.328"
                            stroke="#5847CD" stroke-width="2" stroke-linecap="round"/>
                        <path d="M241 46.5C241 40.1487 235.844 35 229.484 35H218.516C212.156 35 207 40.1487 207 46.5C207 52.8513 212.156 58 218.516 58H229.484C230.429 58 231.347 57.8864 232.226 57.672"
                            stroke="#5847CD" stroke-width="2" stroke-linecap="round"/>
                        <path d="M347.783 113.043H338.043L336.826 106.782C335.087 106.087 333.522 105.217 332.13 104L325.87 106.261L321 97.9129L325.87 93.5651V90.7824C325.87 89.9129 325.87 88.8694 326.043 87.9998L321.174 83.8259L326.043 75.3042L332.13 77.3911C333.522 76.1737 335.261 75.3042 337 74.6085L338.391 68.3477H348.13L349.348 74.6085C351.087 75.3042 352.652 76.1737 354.043 77.3911L360.13 75.3042L365 83.652L360.13 87.9998C360.304 88.8694 360.304 89.9129 360.304 90.7824C360.304 91.652 360.304 92.6955 360.13 93.5651L365 97.739L360.13 106.261L354.043 104.174C352.652 105.391 350.913 106.261 349.174 106.956L347.783 113.043Z"
                            fill="white" stroke="#5847CD" stroke-width="2" stroke-linejoin="round"/>
                        <path opacity="0.15"
                            d="M360.13 87.6522C360.304 88.5217 360.304 89.5652 360.304 90.4348C360.304 91.3043 360.304 92.3478 360.13 93.2174L365 97.3913L360.13 105.913L354.044 103.826C352.652 105.043 350.913 105.913 349.174 106.609L347.783 112.87H338.044L337.174 108.348C347 108.348 357 101.435 357 90.4348C357 80.9348 346.5 72.3478 337.522 72.3478L338.391 68H348.13L349.348 74.2609C351.087 74.9565 352.652 75.8261 354.044 77.0435L360.13 74.9565L365 83.3043L360.13 87.6522Z"
                            fill="#5847CD"/>
                        <path d="M353 91C353 96.5228 348.523 101 343 101C339.404 101 336.039 99.1679 334.277 96.3191M333 91C333 85.4772 337.477 81 343 81C346.832 81 350.118 83.1277 351.723 86.1064M351.723 86.1064H347.894M351.723 86.1064V82.2766M334.277 96.3191H338.106M334.277 96.3191V100.149"
                            stroke="#5847CD" stroke-width="2" stroke-linecap="round"/>
                        <path d="M342.787 86.1064V92.0639L345.979 94.4043" stroke="#5847CD" stroke-width="2"
                            stroke-linecap="round"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M99 71C99 69.8954 98.1046 69 97 69H86C84.8954 69 84 69.8954 84 71V92C84 93.1046 84.8954 94 86 94H97C98.1046 94 99 93.1046 99 92V71Z"
                            fill="#F4F2FC"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M71 23C71 21.8954 70.1046 21 69 21L58 21C56.8954 21 56 21.8954 56 23V92C56 93.1046 56.8954 94 58 94H69C70.1046 94 71 93.1046 71 92V23Z"
                            fill="#F4F2FC"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15 65C15 63.8954 14.1046 63 13 63L2 63C0.89543 63 0 63.8954 0 65V92C0 93.1046 0.89543 94 2 94H13C14.1046 94 15 93.1046 15 92V65Z"
                            fill="#F4F2FC"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M43 50C43 48.8954 42.1046 48 41 48L30 48C28.8954 48 28 48.8954 28 50V92C28 93.1046 28.8954 94 30 94H41C42.1046 94 43 93.1046 43 92V50Z"
                            fill="#F4F2FC"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M387 71C387 69.8954 387.895 69 389 69H400C401.105 69 402 69.8954 402 71V92C402 93.1046 401.105 94 400 94H389C387.895 94 387 93.1046 387 92V71Z"
                            fill="#F4F2FC"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M415 23C415 21.8954 415.895 21 417 21L428 21C429.105 21 430 21.8954 430 23V92C430 93.1046 429.105 94 428 94H417C415.895 94 415 93.1046 415 92V23Z"
                            fill="#F4F2FC"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M471 65C471 63.8954 471.895 63 473 63L484 63C485.105 63 486 63.8954 486 65V92C486 93.1046 485.105 94 484 94H473C471.895 94 471 93.1046 471 92V65Z"
                            fill="#F4F2FC"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M443 50C443 48.8954 443.895 48 445 48L456 48C457.105 48 458 48.8954 458 50V92C458 93.1046 457.105 94 456 94H445C443.895 94 443 93.1046 443 92V50Z"
                            fill="#F4F2FC"/>
                    </svg>

                    <p class="lu-modal__desc">
                        Your account is now successfully connected, and data synchronization is underway. You will be able to access the dashboard <b>within the next 5 minutes,</b> while full data synchronization may take a few hours.
                    </p>
                </div>
                <div class="lu-modal__body">
                    <span class="alert alert--primary">
                        You can safely close this window now - everything is being taken care of in the background. You will be notified by email about further steps.
                    </span>
                    <button class="lu-modal__close-btn" data-dismiss="lu-modal">
                        <span class="btn-text">Close Window</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>