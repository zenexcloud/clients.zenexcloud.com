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
    }

    .lu-modal.lu-modal--connect.show {
        overflow: auto;
        opacity: 1;
        visibility: visible;
    }

    #modal-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0,0,0,0.5);
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.4s ease;
        z-index: 1040;
    }

    #modal-backdrop.show {
        opacity: 1;
        visibility: visible;
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
    }

    .lu-modal.lu-modal--connect .lu-modal__dialog {
        width: 720px;
        -webkit-transform: scale(0.5);
        transform: scale(0.5);
        transition: all 0.3s;
    }

    @media (max-width: 767px) {
        .lu-modal.lu-modal--connect .lu-modal__dialog {
            margin-inline: 24px;
            width: calc(100% - 48px);
        }
    }

    @media (max-width: 513px) {
        .lu-modal.lu-modal--connect .lu-modal__dialog {
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
        /* t�o */
        -webkit-text-fill-color: #29323a !important;
        /* kolor tekstu */
        transition: background-color 5000s ease-in-out 0s;
        /* wymuszenie koloru t�a */
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
        color: #5C4BD1 !important;
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
<div class="lu-modal lu-modal--connect" id="connect-account">
    <div class="lu-modal__container">
        <div class="lu-modal__dialog">
            <div class="lu-modal__content" form-content>
                <div class="lu-modal__top lu-top">
                    <svg class="lu-top__logo" width="191" height="36" viewBox="0 0 191 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_15140_4841)">
                        <path d="M36.5651 5.28771C36.5554 4.29872 36.2687 3.33174 35.7369 2.49421C35.1631 1.60471 34.3386 0.900759 33.3653 0.469154C32.3919 0.0375491 31.3121 -0.102849 30.259 0.0652683L21.4811 1.41696C19.3615 1.74299 17.2036 1.74299 15.084 1.41696L6.31017 0.0652683C5.25646 -0.103695 4.1758 0.0362855 3.20159 0.46793C2.22738 0.899575 1.40227 1.60399 0.828107 2.49421C0.296333 3.33174 0.00968222 4.29872 0 5.28771H0V30.6831C0.00430524 31.6818 0.291166 32.6595 0.828107 33.5053C1.4034 34.3962 2.2301 35.1007 3.20592 35.5317C4.18175 35.9626 5.26388 36.1012 6.31846 35.9301L15.0964 34.5784C17.216 34.2524 19.3739 34.2524 21.4935 34.5784L30.2714 35.9301C31.3235 36.0978 32.4021 35.9576 33.3746 35.5268C34.3471 35.0959 35.1711 34.3933 35.7452 33.5053C36.2844 32.6559 36.5714 31.6737 36.5733 30.6708V5.27542L36.5651 5.28771Z" fill="#5C4BD1"/>
                        <path d="M182.254 18.4889C182.255 18.8731 182.41 19.2413 182.684 19.513C182.959 19.7847 183.331 19.9378 183.719 19.9389H189.33C189.718 19.9378 190.091 19.7847 190.365 19.513C190.64 19.2413 190.795 18.8731 190.796 18.4889C190.796 17.1044 190.381 15.751 189.603 14.5998C188.826 13.4487 187.72 12.5514 186.427 12.0216C185.134 11.4918 183.712 11.3532 182.339 11.6233C180.966 11.8934 179.705 12.5601 178.716 13.5391C177.726 14.518 177.052 15.7653 176.779 17.1232C176.506 18.4811 176.646 19.8886 177.182 21.1677C177.718 22.4468 178.625 23.5401 179.788 24.3093C180.952 25.0784 182.32 25.489 183.719 25.489H189.33C189.719 25.489 190.093 25.336 190.368 25.0637C190.643 24.7914 190.798 24.4221 190.798 24.037C190.798 23.6519 190.643 23.2825 190.368 23.0102C190.093 22.7379 189.719 22.5849 189.33 22.5849H183.719C182.973 22.5853 182.24 22.386 181.599 22.0081C180.957 21.6301 180.431 21.0877 180.076 20.4381C179.72 19.7885 179.549 19.056 179.58 18.3181C179.612 17.5802 179.844 16.8643 180.253 16.2463C180.661 15.6283 181.231 15.1311 181.902 14.8073C182.573 14.4836 183.321 14.3454 184.064 14.4073C184.808 14.4692 185.522 14.7289 186.129 15.159C186.735 15.5891 187.214 16.1736 187.512 16.8505L187.603 17.0512H183.724C183.337 17.0512 182.965 17.2021 182.69 17.4713C182.415 17.7404 182.258 18.1061 182.254 18.4889Z" fill="#5C4BD1"/>
                        <path d="M151.084 25.6449C149.371 25.6428 147.728 24.9684 146.516 23.7698C145.305 22.5712 144.623 20.9461 144.621 19.251V12.722C144.61 12.5117 144.642 12.3014 144.716 12.1039C144.79 11.9063 144.904 11.7258 145.05 11.5731C145.197 11.4204 145.373 11.2988 145.569 11.2158C145.764 11.1327 145.975 11.0898 146.188 11.0898C146.401 11.0898 146.611 11.1327 146.807 11.2158C147.003 11.2988 147.179 11.4204 147.326 11.5731C147.472 11.7258 147.586 11.9063 147.66 12.1039C147.734 12.3014 147.766 12.5117 147.755 12.722V19.251C147.755 20.1244 148.106 20.9621 148.73 21.5797C149.354 22.1973 150.201 22.5442 151.084 22.5442C151.967 22.5442 152.814 22.1973 153.438 21.5797C154.062 20.9621 154.413 20.1244 154.413 19.251V12.722C154.402 12.5117 154.435 12.3014 154.508 12.1039C154.582 11.9063 154.696 11.7258 154.843 11.5731C154.989 11.4204 155.166 11.2988 155.361 11.2158C155.557 11.1327 155.767 11.0898 155.98 11.0898C156.193 11.0898 156.404 11.1327 156.599 11.2158C156.795 11.2988 156.971 11.4204 157.118 11.5731C157.265 11.7258 157.378 11.9063 157.452 12.1039C157.526 12.3014 157.558 12.5117 157.547 12.722V19.251C157.545 20.9461 156.864 22.5712 155.652 23.7698C154.44 24.9684 152.798 25.6428 151.084 25.6449Z" fill="#5C4BD1"/>
                        <path d="M137.018 25.7106C135.814 25.7115 134.628 25.4184 133.566 24.8574C132.503 24.2963 131.597 23.4846 130.927 22.4941C130.258 21.5037 129.846 20.3652 129.728 19.1795C129.61 17.9938 129.789 16.7976 130.25 15.6969C130.711 14.5962 131.439 13.625 132.37 12.8695C133.302 12.1139 134.407 11.5973 135.588 11.3655C136.77 11.1336 137.991 11.1937 139.143 11.5404C140.295 11.8871 141.343 12.5096 142.194 13.3529C142.491 13.644 142.658 14.0398 142.66 14.453C142.661 14.8663 142.497 15.2632 142.202 15.5566C141.908 15.8499 141.508 16.0155 141.09 16.017C140.672 16.0186 140.271 15.8559 139.975 15.5647C139.389 14.9852 138.644 14.5903 137.831 14.4302C137.019 14.27 136.177 14.3518 135.412 14.6651C134.647 14.9784 133.993 15.5091 133.533 16.1902C133.073 16.8713 132.827 17.6721 132.827 18.4914C132.827 19.3106 133.073 20.1114 133.533 20.7925C133.993 21.4736 134.647 22.0043 135.412 22.3176C136.177 22.6309 137.019 22.7127 137.831 22.5525C138.644 22.3924 139.389 21.9976 139.975 21.418C140.274 21.1558 140.663 21.0166 141.063 21.0286C141.462 21.0406 141.842 21.2029 142.125 21.4825C142.407 21.7621 142.571 22.1379 142.584 22.5331C142.596 22.9284 142.455 23.3133 142.19 23.6093C141.51 24.2786 140.703 24.8086 139.816 25.1692C138.928 25.5297 137.978 25.7137 137.018 25.7106Z" fill="#5C4BD1"/>
                        <path d="M57.011 11.231C55.6962 11.2307 54.4327 11.7359 53.4874 12.64C52.7689 11.9552 51.8625 11.4946 50.8812 11.3157C49.8999 11.1368 48.8871 11.2475 47.969 11.6339C47.0509 12.0204 46.2679 12.6655 45.7178 13.489C45.1677 14.3125 44.8746 15.2779 44.8751 16.265V24.199C44.8642 24.4093 44.8966 24.6196 44.9704 24.8171C45.0443 25.0146 45.1579 25.1952 45.3045 25.3479C45.4511 25.5005 45.6276 25.6221 45.8232 25.7052C46.0188 25.7883 46.2294 25.8311 46.4423 25.8311C46.6552 25.8311 46.8658 25.7883 47.0614 25.7052C47.257 25.6221 47.4335 25.5005 47.5801 25.3479C47.7267 25.1952 47.8404 25.0146 47.9142 24.8171C47.988 24.6196 48.0204 24.4093 48.0095 24.199V16.265C48.0095 15.7522 48.2154 15.2605 48.5819 14.8979C48.9484 14.5353 49.4455 14.3317 49.9638 14.3317C50.4822 14.3317 50.9792 14.5353 51.3458 14.8979C51.7123 15.2605 51.9182 15.7522 51.9182 16.265V21.8888C51.9072 22.0991 51.9397 22.3094 52.0135 22.5069C52.0873 22.7044 52.201 22.885 52.3476 23.0377C52.4942 23.1904 52.6707 23.3119 52.8663 23.395C53.0619 23.4781 53.2725 23.5209 53.4854 23.5209C53.6982 23.5209 53.9089 23.4781 54.1045 23.395C54.3001 23.3119 54.4765 23.1904 54.6231 23.0377C54.7697 22.885 54.8834 22.7044 54.9572 22.5069C55.031 22.3094 55.0635 22.0991 55.0526 21.8888V16.265C55.0526 15.7522 55.2585 15.2605 55.625 14.8979C55.9915 14.5353 56.4886 14.3317 57.0069 14.3317C57.5252 14.3317 58.0223 14.5353 58.3888 14.8979C58.7553 15.2605 58.9612 15.7522 58.9612 16.265V24.199C58.9819 24.5964 59.156 24.9708 59.4476 25.2448C59.7393 25.5189 60.1262 25.6717 60.5284 25.6717C60.9307 25.6717 61.3175 25.5189 61.6092 25.2448C61.9008 24.9708 62.0749 24.5964 62.0956 24.199V16.265C62.0934 14.9312 61.5572 13.6527 60.6042 12.7092C59.6512 11.7657 58.3592 11.2342 57.011 11.231Z" fill="#302F38"/>
                        <path d="M86.1023 22.5934H85.1624C84.9861 22.594 84.8114 22.5591 84.649 22.491C84.556 22.439 84.4812 22.3602 84.4346 22.265C84.388 22.1699 84.3718 22.063 84.3882 21.9585V14.7454H85.2949C85.694 14.701 86.0603 14.5057 86.3172 14.2004C86.5742 13.895 86.7019 13.5033 86.6737 13.107C86.6553 12.7456 86.5058 12.4029 86.2525 12.1418C85.9992 11.8807 85.6592 11.7188 85.2949 11.6857H84.4047V8.52765C84.4047 8.10942 84.2368 7.70831 83.9378 7.41257C83.6389 7.11683 83.2334 6.95068 82.8106 6.95068C82.3878 6.95068 81.9824 7.11683 81.6834 7.41257C81.3845 7.70831 81.2165 8.10942 81.2165 8.52765V11.7103H80.6286C80.2242 11.7625 79.8552 11.9653 79.5967 12.2773C79.3382 12.5894 79.2097 12.9871 79.2373 13.3896C79.2518 13.7598 79.4017 14.1122 79.6591 14.3811C79.9165 14.6501 80.264 14.8174 80.6368 14.8519H81.2165V22.0159C81.2165 22.0159 81.2165 22.0446 81.2165 22.0609C81.2165 22.0773 81.2165 22.0896 81.2165 22.106C81.2165 23.9779 82.322 25.4934 84.3633 25.4934H86.0195H86.123C86.516 25.4272 86.8669 25.211 87.1002 24.8913C87.2471 24.6898 87.3391 24.4543 87.3675 24.2075C87.396 23.9607 87.3598 23.7108 87.2626 23.4817C87.1653 23.2527 87.0102 23.0523 86.8121 22.8996C86.614 22.7469 86.3796 22.6471 86.1313 22.6098L86.1023 22.5934Z" fill="#302F38"/>
                        <path d="M95.692 10.9976H95.2779C94.5966 11.0028 93.9183 11.0881 93.2573 11.2515C92.55 11.4207 91.8804 11.7179 91.2823 12.1281C90.6623 12.5533 90.1494 13.1139 89.7834 13.7665C89.3893 14.5542 89.1893 15.423 89.1996 16.3019V23.9943C89.2205 24.3991 89.3977 24.7806 89.6948 25.0599C89.9918 25.3392 90.386 25.4949 90.7958 25.4949C91.2056 25.4949 91.5997 25.3392 91.8968 25.0599C92.1938 24.7806 92.3711 24.3991 92.392 23.9943V16.2978C92.3515 15.9069 92.4173 15.5124 92.5824 15.155C92.7454 14.8691 92.9754 14.626 93.2532 14.4464C93.5561 14.2809 93.8874 14.1726 94.2304 14.1269C94.572 14.055 94.9204 14.0193 95.2696 14.0204H95.6837C95.8832 14.0006 96.0768 13.9416 96.2529 13.8469C96.4291 13.7521 96.5844 13.6235 96.7098 13.4687C96.8351 13.3138 96.9279 13.1357 96.9828 12.9449C97.0377 12.7541 97.0535 12.5544 97.0294 12.3574C96.994 12.0148 96.8427 11.6941 96.5999 11.4473C96.3571 11.2004 96.0372 11.0419 95.692 10.9976Z" fill="#302F38"/>
                        <path d="M127.04 18.1901C126.402 17.7535 125.683 17.4472 124.924 17.289L123.206 16.8794C122.511 16.7435 121.834 16.5334 121.185 16.2527C121.055 16.1736 120.948 16.0601 120.879 15.9248C120.81 15.7896 120.779 15.6379 120.792 15.4867C120.789 15.3107 120.824 15.1361 120.896 14.9747C120.972 14.7934 121.088 14.6311 121.235 14.4996C121.666 14.1294 122.217 13.9257 122.788 13.9262C123.399 13.9443 123.993 14.1316 124.502 14.4668L124.945 14.8191C125.228 15.0662 125.597 15.1945 125.973 15.1767C126.35 15.159 126.705 14.9966 126.963 14.7241C127.221 14.4516 127.361 14.0904 127.353 13.7173C127.346 13.3442 127.192 12.9886 126.924 12.726L126.841 12.6523C126.741 12.5573 126.634 12.4684 126.523 12.386C125.464 11.6564 124.198 11.2778 122.908 11.3047C122.214 11.2856 121.522 11.3783 120.858 11.5791C119.977 11.8576 119.21 12.4089 118.671 13.1516C118.131 13.8944 117.847 14.7892 117.861 15.7038C117.826 16.2621 117.938 16.8198 118.186 17.3224C118.434 17.825 118.81 18.2552 119.277 18.5711C120.044 19.0224 120.885 19.3397 121.761 19.509L123.417 19.8859C123.624 19.9227 123.897 19.9965 124.167 20.0456H124.245C124.522 20.0821 124.78 20.2001 124.988 20.3842C125.195 20.5683 125.342 20.81 125.409 21.0778C125.433 21.2131 125.445 21.3501 125.446 21.4874C125.455 21.7438 125.378 21.9958 125.227 22.2042C125.005 22.4506 124.718 22.6308 124.398 22.7244C123.939 22.8721 123.457 22.9441 122.974 22.9374C121.732 22.9374 120.974 22.6179 120.564 22.0322L120.535 21.9912C120.299 21.7242 119.969 21.5567 119.612 21.5229C119.255 21.4892 118.899 21.5918 118.616 21.8098C118.333 22.0278 118.145 22.3445 118.091 22.6951C118.037 23.0457 118.12 23.4035 118.324 23.6952C118.364 23.7459 118.406 23.7938 118.453 23.8385C118.583 23.9822 118.721 24.1189 118.867 24.2481C119.373 24.6958 119.97 25.031 120.618 25.2312C121.402 25.4694 122.213 25.607 123.032 25.6408C124.285 25.6409 125.515 25.3115 126.597 24.6864C127.794 23.986 128.406 22.8186 128.423 21.2171C128.454 20.6399 128.345 20.0636 128.105 19.5368C127.864 19.0101 127.499 18.5482 127.04 18.1901Z" fill="#302F38"/>
                        <path d="M69.6771 18.4889C69.6782 18.8731 69.8329 19.2413 70.1076 19.513C70.3822 19.7847 70.7544 19.9378 71.1428 19.9389H76.7532C77.1416 19.9378 77.5138 19.7847 77.7885 19.513C78.0631 19.2413 78.2179 18.8731 78.219 18.4889C78.219 17.1044 77.804 15.751 77.0264 14.5998C76.2489 13.4487 75.1438 12.5514 73.8508 12.0216C72.5578 11.4918 71.135 11.3532 69.7623 11.6233C68.3897 11.8934 67.1288 12.5601 66.1392 13.5391C65.1496 14.518 64.4757 15.7653 64.2026 17.1232C63.9296 18.4811 64.0697 19.8886 64.6053 21.1677C65.1409 22.4468 66.0478 23.5401 67.2115 24.3093C68.3752 25.0784 69.7433 25.489 71.1428 25.489H76.7532C77.1425 25.489 77.5159 25.336 77.7912 25.0637C78.0664 24.7914 78.2211 24.4221 78.2211 24.037C78.2211 23.6519 78.0664 23.2825 77.7912 23.0102C77.5159 22.7379 77.1425 22.5849 76.7532 22.5849H71.1428C70.3962 22.5853 69.6634 22.386 69.022 22.0081C68.3805 21.6301 67.8543 21.0877 67.499 20.4381C67.1438 19.7885 66.9726 19.056 67.0038 18.3181C67.0349 17.5802 67.2671 16.8643 67.6759 16.2463C68.0847 15.6283 68.6547 15.1311 69.3258 14.8073C69.9968 14.4836 70.7438 14.3454 71.4878 14.4073C72.2318 14.4692 72.945 14.7289 73.5519 15.159C74.1588 15.5891 74.6369 16.1736 74.9356 16.8505L75.0266 17.0512H71.147C70.76 17.0512 70.3886 17.2021 70.1134 17.4713C69.8382 17.7404 69.6814 18.1061 69.6771 18.4889Z" fill="#302F38"/>
                        <path d="M100.056 11.231C99.6398 11.231 99.2406 11.3945 98.9463 11.6856C98.652 11.9768 98.4867 12.3716 98.4867 12.7834V24.199C98.4758 24.4093 98.5082 24.6196 98.582 24.8171C98.6558 25.0146 98.7695 25.1952 98.9161 25.3479C99.0627 25.5005 99.2392 25.6221 99.4348 25.7052C99.6304 25.7883 99.841 25.8311 100.054 25.8311C100.267 25.8311 100.477 25.7883 100.673 25.7052C100.869 25.6221 101.045 25.5005 101.192 25.3479C101.338 25.1952 101.452 25.0146 101.526 24.8171C101.6 24.6196 101.632 24.4093 101.621 24.199V12.7793C101.62 12.369 101.455 11.9758 101.161 11.6856C100.868 11.3955 100.471 11.232 100.056 11.231Z" fill="#302F38"/>
                        <path d="M113.612 15.5649C113.911 15.827 114.301 15.9663 114.7 15.9543C115.1 15.9423 115.479 15.7799 115.762 15.5003C116.045 15.2207 116.209 14.845 116.221 14.4497C116.233 14.0545 116.092 13.6696 115.827 13.3735C114.804 12.3619 113.5 11.6732 112.081 11.3945C110.662 11.1157 109.191 11.2594 107.855 11.8074C106.518 12.3554 105.376 13.2831 104.572 14.4732C103.769 15.6633 103.34 17.0623 103.34 18.4935C103.34 19.9248 103.769 21.3238 104.572 22.5139C105.376 23.704 106.518 24.6317 107.855 25.1797C109.191 25.7277 110.662 25.8714 112.081 25.5926C113.5 25.3139 114.804 24.6252 115.827 23.6136C116.092 23.3175 116.233 22.9326 116.221 22.5374C116.209 22.1421 116.045 21.7664 115.762 21.4868C115.479 21.2072 115.1 21.0448 114.7 21.0328C114.301 21.0208 113.911 21.1601 113.612 21.4222C113.027 22.0018 112.281 22.3966 111.469 22.5568C110.657 22.7169 109.815 22.6352 109.05 22.3219C108.284 22.0086 107.63 21.4778 107.17 20.7967C106.71 20.1156 106.464 19.3148 106.464 18.4956C106.464 17.6764 106.71 16.8756 107.17 16.1945C107.63 15.5134 108.284 14.9826 109.05 14.6693C109.815 14.356 110.657 14.2743 111.469 14.4344C112.281 14.5946 113.027 14.9894 113.612 15.569V15.5649Z" fill="#302F38"/>
                        <path d="M167.617 26.0668C165.62 26.0646 163.706 25.2789 162.294 23.8821C160.882 22.4853 160.088 20.5915 160.086 18.6161V7.17178C160.086 6.73073 160.263 6.30774 160.578 5.99587C160.893 5.684 161.321 5.50879 161.767 5.50879C162.213 5.50879 162.64 5.684 162.955 5.99587C163.271 6.30774 163.448 6.73073 163.448 7.17178V18.6161C163.448 19.4319 163.692 20.2293 164.151 20.9076C164.609 21.5859 165.26 22.1146 166.022 22.4268C166.784 22.739 167.622 22.8207 168.431 22.6615C169.24 22.5024 169.983 22.1095 170.566 21.5327C171.149 20.9558 171.546 20.2209 171.707 19.4208C171.868 18.6207 171.785 17.7913 171.469 17.0376C171.154 16.2839 170.619 15.6397 169.934 15.1865C169.248 14.7333 168.442 14.4914 167.617 14.4914H167.063C166.842 14.4914 166.623 14.4484 166.419 14.3648C166.215 14.2812 166.03 14.1587 165.874 14.0043C165.718 13.8499 165.594 13.6666 165.509 13.4648C165.425 13.263 165.381 13.0468 165.381 12.8284C165.381 12.61 165.425 12.3938 165.509 12.192C165.594 11.9902 165.718 11.8069 165.874 11.6525C166.03 11.4981 166.215 11.3756 166.419 11.292C166.623 11.2084 166.842 11.1654 167.063 11.1654H167.617C169.615 11.1654 171.531 11.9504 172.943 13.3477C174.355 14.7449 175.149 16.64 175.149 18.6161C175.149 20.5921 174.355 22.4872 172.943 23.8845C171.531 25.2818 169.615 26.0668 167.617 26.0668Z" fill="#5C4BD1"/>
                        <path d="M21.8123 11.231C21.2217 11.2326 20.6359 11.3365 20.0815 11.5382C20.9868 11.8515 21.7928 12.3949 22.4186 13.1139C23.0443 13.8328 23.4678 14.702 23.6465 15.6342C23.7231 15.8388 23.7637 16.055 23.7666 16.2732V24.199C23.7873 24.5964 23.9614 24.9708 24.253 25.2448C24.5447 25.5189 24.9316 25.6717 25.3338 25.6717C25.7361 25.6717 26.1229 25.5189 26.4146 25.2448C26.7062 24.9708 26.8804 24.5964 26.901 24.199V16.265C26.8988 14.9305 26.362 13.6514 25.4081 12.7078C24.4543 11.7642 23.1612 11.2331 21.8123 11.231Z" fill="white"/>
                        <path d="M16.492 11.5343C15.724 11.2573 14.8997 11.1679 14.0893 11.2736C13.2789 11.3793 12.5062 11.677 11.8371 12.1415C11.168 12.606 10.6221 13.2235 10.246 13.9414C9.86982 14.6594 9.67451 15.4566 9.67663 16.2653V24.1993C9.6657 24.4096 9.69813 24.6199 9.77196 24.8174C9.84578 25.0149 9.95945 25.1955 10.1061 25.3481C10.2527 25.5008 10.4291 25.6224 10.6247 25.7055C10.8203 25.7885 11.031 25.8314 11.2438 25.8314C11.4567 25.8314 11.6673 25.7885 11.8629 25.7055C12.0585 25.6224 12.235 25.5008 12.3816 25.3481C12.5282 25.1955 12.6419 25.0149 12.7157 24.8174C12.7895 24.6199 12.8219 24.4096 12.811 24.1993V16.2653C12.8138 16.0732 12.8459 15.8826 12.9062 15.7C13.0754 14.7529 13.4968 13.8676 14.1271 13.1354C14.7574 12.4031 15.5738 11.8505 16.492 11.5343Z" fill="white"/>
                        <path d="M20.0813 11.5383C19.4125 11.7777 18.8017 12.153 18.2885 12.6401C17.7743 12.1511 17.1621 11.7743 16.4915 11.5342C15.5733 11.8503 14.757 12.403 14.1267 13.1352C13.4964 13.8675 13.0749 14.7528 12.9058 15.6998C13.0435 15.259 13.3363 14.8816 13.7312 14.6361C14.126 14.3906 14.5968 14.2932 15.058 14.3615C15.5192 14.4299 15.9404 14.6595 16.2452 15.0088C16.55 15.358 16.7181 15.8037 16.7192 16.2651V21.8889C16.7399 22.2863 16.914 22.6607 17.2056 22.9348C17.4973 23.2088 17.8841 23.3616 18.2864 23.3616C18.6886 23.3616 19.0755 23.2088 19.3672 22.9348C19.6588 22.6607 19.8329 22.2863 19.8536 21.8889V16.2651C19.8519 15.8084 20.0141 15.3659 20.3112 15.0164C20.6084 14.6669 21.0212 14.433 21.4763 14.3563C21.9314 14.2797 22.3993 14.3652 22.7966 14.5977C23.194 14.8302 23.4951 15.1946 23.6463 15.6261C23.4663 14.6955 23.0422 13.8279 22.4165 13.1105C21.7908 12.3931 20.9855 11.8509 20.0813 11.5383Z" fill="#CBC4F3"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_15140_4841">
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
                    <h2 class="lu-modal__title">Connect your WHMCS to MetricsCube</h2>
                    <p class="lu-modal__desc">Unlock the full potential of your WHMCS and gain powerful insights into your
                        business and customers. Make informed decisions and grow your business with confidence.</p>
                </div>
                <div class="lu-modal__body">
                    <div class="lu-modal__labels">
                        <div class="lu-modal__labels-container">
                            <span class="label label--primary">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_13830_4626)">
                                    <mask id="path-1-inside-1_13830_4626" fill="white">
                                    <rect x="1.77783" y="7.11108" width="12.4444" height="8" rx="0.888889"/>
                                    </mask>
                                    <rect x="1.77783" y="7.11108" width="12.4444" height="8" rx="0.888889" stroke="#5C4BD1"
                                        stroke-width="2.4" mask="url(#path-1-inside-1_13830_4626)"/>
                                    <path d="M11.5556 3.55561C11.5556 2.57377 10.7596 1.77783 9.77779 1.77783H6.22224C5.2404 1.77783 4.44446 2.57377 4.44446 3.55561V7.55561"
                                        stroke="#5C4BD1" stroke-width="1.2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_13830_4626">
                                    <rect width="16" height="16" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                                No pre-payment required
                            </span>
                            <span class="label label--primary">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_13830_4626)">
                                    <mask id="path-1-inside-1_13830_4626" fill="white">
                                    <rect x="1.77783" y="7.11108" width="12.4444" height="8" rx="0.888889"/>
                                    </mask>
                                    <rect x="1.77783" y="7.11108" width="12.4444" height="8" rx="0.888889" stroke="#5C4BD1"
                                        stroke-width="2.4" mask="url(#path-1-inside-1_13830_4626)"/>
                                    <path d="M11.5556 3.55561C11.5556 2.57377 10.7596 1.77783 9.77779 1.77783H6.22224C5.2404 1.77783 4.44446 2.57377 4.44446 3.55561V7.55561"
                                        stroke="#5C4BD1" stroke-width="1.2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_13830_4626">
                                    <rect width="16" height="16" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                                Free trial for 14 days
                            </span>
                            <span class="label label--primary">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_13830_4626)">
                                    <mask id="path-1-inside-1_13830_4626" fill="white">
                                    <rect x="1.77783" y="7.11108" width="12.4444" height="8" rx="0.888889"/>
                                    </mask>
                                    <rect x="1.77783" y="7.11108" width="12.4444" height="8" rx="0.888889" stroke="#5C4BD1"
                                        stroke-width="2.4" mask="url(#path-1-inside-1_13830_4626)"/>
                                    <path d="M11.5556 3.55561C11.5556 2.57377 10.7596 1.77783 9.77779 1.77783H6.22224C5.2404 1.77783 4.44446 2.57377 4.44446 3.55561V7.55561"
                                        stroke="#5C4BD1" stroke-width="1.2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_13830_4626">
                                    <rect width="16" height="16" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                                2-minute configuration
                            </span>
                        </div>
                        {include file="adminarea/modals/connect-account/promo.tpl"}
                        <span id="invitation_alert" class="server-error-alert hidden">
                            
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.99984 18.3334C14.6022 18.3334 18.3332 14.6025 18.3332 10.0001C18.3332 5.39771 14.6022 1.66675 9.99984 1.66675C5.39746 1.66675 1.6665 5.39771 1.6665 10.0001C1.6665 14.6025 5.39746 18.3334 9.99984 18.3334Z" stroke="#D73C3C" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 10.3333V7" stroke="#D73C3C" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 12.6667H10.0088" stroke="#D73C3C" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="server-error-alert__text"></span>
                        </span>
                    </div>
                    <div class="lu-modal__login">
                        <form class="setup-form" id="setup-form">
                            <div>
                                <div class="input">
                                    <div class="input__container" input-email>
                                        <svg class="input__icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.41176 4H16.5882C17.451 4 18 4.58333 18 5.5V15.5C18 16.4167 17.451 17 16.5882 17H3.41176C2.54902 17 2 16.4167 2 15.5V5.5C2 4.58333 2.54902 4 3.41176 4Z"
                                                stroke="#8A8F99" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                            <path d="M18 6L10 13L2 6" stroke="#8A8F99" stroke-width="1.2"
                                                stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <input type="email" placeholder="Email Address" name="email" value="{$helper->getAdminEmail()}">
                                        <svg class="input__clear-field hidden" width="20" height="20" viewBox="0 0 20 20"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 4.05087L15.8767 15.9486M4.02124 16L16 4" stroke="#8A8F99"
                                                stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <span class="input__error-alert hidden"></span>
                                </div>
                                <div class="input">
                                    <div class="input__container" input-password>
                                        <svg class="input__icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <mask id="path-1-inside-1_13825_4656" fill="white">
                                                <rect x="2" y="9" width="16" height="10" rx="1"/>
                                            </mask>
                                            <rect x="2" y="9" width="16" height="10" rx="1" stroke="#8A8F99"
                                                stroke-width="2.4" mask="url(#path-1-inside-1_13825_4656)"/>
                                            <path d="M15.5557 4.15385V4C15.5557 2.89543 14.6602 2 13.5557 2H7.55566C6.45109 2 5.55566 2.89543 5.55566 4V9"
                                                stroke="#8A8F99" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        </svg>
                                        <input type="password" placeholder="Password" name="password" autocomplete="off">
                                        <div class="input__password-control">
                                            <svg class="input__password-hide hidden" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.1257 11.7829L12.4035 11.0125C12.5396 10.1677 12.3152 9.43647 11.7303 8.81866C11.1454 8.20085 10.4629 7.96451 9.68256 8.10965L8.96037 7.3392C9.11274 7.27228 9.27177 7.22204 9.43744 7.1885C9.60312 7.15511 9.79064 7.13842 10 7.13842C10.9244 7.13842 11.7078 7.48111 12.3502 8.1665C12.9927 8.85188 13.3139 9.68764 13.3139 10.6738C13.3139 10.8971 13.2982 11.1034 13.267 11.2926C13.2355 11.4817 13.1884 11.6452 13.1257 11.7829ZM15.9931 14.7563L15.3059 14.1088C15.8803 13.6411 16.3905 13.1291 16.8364 12.5727C17.2823 12.0163 17.664 11.3834 17.9815 10.6738C17.2256 9.045 16.141 7.39884 14.7277 6.4393C13.3143 5.47977 11.7384 5 10 5C9.56162 5 9.13081 5.03225 8.70755 5.09676C8.28429 5.16127 7.86859 5.25803 7.46045 5.38704L6.75232 4.63159C7.27912 4.41952 7.81515 4.26664 8.3604 4.17294C8.9058 4.07925 9.45233 4.0324 10 4.0324C11.9686 4.0324 13.7692 4.60957 15.4018 5.76392C17.0343 6.91811 18.2337 8.78939 19 10.6738C18.6756 11.4516 18.2649 12.1825 17.7679 12.8666C17.2707 13.5509 16.6791 14.1808 15.9931 14.7563ZM17.0046 20L13.4744 16.245C13.0732 16.4348 12.5753 16.602 11.9806 16.7464C11.3858 16.8909 10.7256 16.9632 10 16.9632C8.01975 16.9632 6.21916 16.386 4.59823 15.2317C2.9773 14.0775 1.77789 12.5582 1 10.6738C1.35221 9.81908 1.81674 9.01863 2.39358 8.27245C2.97027 7.52627 3.58596 6.90015 4.24065 6.3941L1.71153 3.68482L2.35345 3L17.6466 19.3152L17.0046 20ZM4.88257 7.07867C4.36272 7.47329 3.8313 7.99185 3.28832 8.63433C2.74534 9.27698 2.32208 9.9568 2.01854 10.6738C2.77436 12.3026 3.85896 13.5967 5.27235 14.5563C6.68573 15.5158 8.26161 15.9956 10 15.9956C10.5233 15.9956 11.0507 15.9413 11.582 15.8328C12.1133 15.7243 12.5128 15.6148 12.7804 15.5043L11.3011 13.9152C11.1581 14.0009 10.9587 14.0713 10.7029 14.1264C10.4471 14.1816 10.2128 14.2092 10 14.2092C9.07563 14.2092 8.29223 13.8665 7.64978 13.1811C7.00733 12.4957 6.68611 11.6599 6.68611 10.6738C6.68611 10.4591 6.71196 10.2185 6.76366 9.95172C6.81535 9.68515 6.88134 9.46316 6.9616 9.28577L4.88257 7.07867Z"
                                                    fill="#8A8F99"/>
                                            </svg>
                                            <svg class="input__password-show" width="20" height="20" viewBox="0 0 20 20"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.92706 14.0363C10.8487 14.0363 11.6307 13.7061 12.2732 13.0455C12.9156 12.385 13.2369 11.5829 13.2369 10.6393C13.2369 9.69575 12.9143 8.89508 12.2691 8.23734C11.6239 7.5796 10.8405 7.25073 9.91889 7.25073C8.99725 7.25073 8.2152 7.58099 7.57275 8.24152C6.93031 8.90205 6.60908 9.70411 6.60908 10.6477C6.60908 11.5913 6.93167 12.392 7.57683 13.0497C8.222 13.7074 9.00541 14.0363 9.92706 14.0363ZM9.92297 13.1507C9.24274 13.1507 8.66453 12.9069 8.18837 12.4194C7.7122 11.9319 7.47412 11.34 7.47412 10.6435C7.47412 9.94709 7.7122 9.35512 8.18837 8.86762C8.66453 8.38011 9.24274 8.13636 9.92297 8.13636C10.6032 8.13636 11.1814 8.38011 11.6576 8.86762C12.1337 9.35512 12.3718 9.94709 12.3718 10.6435C12.3718 11.34 12.1337 11.9319 11.6576 12.4194C11.1814 12.9069 10.6032 13.1507 9.92297 13.1507ZM9.92706 17.0771C7.96253 17.0771 6.17214 16.5298 4.5559 15.4352C2.93965 14.3405 1.72762 12.4781 0.922974 10.6435C1.72762 8.80896 2.94132 6.81377 4.5559 5.71913C6.17048 4.62449 7.96003 4.07717 9.92456 4.07717C11.8891 4.07717 13.6795 4.62449 15.2957 5.71913C16.912 6.81377 18.1183 8.80896 18.923 10.6435C18.1183 12.4781 16.9103 14.3405 15.2957 15.4352C13.6811 16.5298 11.8916 17.0771 9.92706 17.0771ZM9.92456 16.1486C11.6327 16.1486 13.201 15.6881 14.6295 14.7673C16.058 13.8465 17.1486 12.2066 17.9044 10.6435C17.1486 9.08041 16.0605 7.30785 14.632 6.38701C13.2035 5.46617 11.6352 5.00575 9.92706 5.00575C8.2189 5.00575 6.65058 5.46617 5.22208 6.38701C3.79358 7.30785 2.69734 9.08041 1.94152 10.6435C2.69734 12.2066 3.79108 13.8465 5.21958 14.7673C6.64808 15.6881 8.21641 16.1486 9.92456 16.1486Z"
                                                    fill="#8A8F99"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <span class="input__error-alert hidden"></span>
                                </div>
                            </div>

                            <div>
                                <div class="lu-form-check">
                                    <label>
                                        <input class="lu-form-checkbox" type="checkbox" name="terms-of-service" value="on"
                                            checked>
                                        <span class="lu-form-indicator">                                
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 6.5L4 9.5L11 2" stroke="white" stroke-width="1.3"
                                                    stroke-linecap="round"/>
                                            </svg>
                                        </span>
                                        <span class="lu-form-text">I have read and agree to the Terms of Service</span>
                                    </label>
                                </div>
                                <div class="lu-form-check">
                                    <label>
                                        <input class="lu-form-checkbox" type="checkbox" name="privacy-policy" value="on"
                                            checked>
                                        <span class="lu-form-indicator">                                  
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 6.5L4 9.5L11 2" stroke="white" stroke-width="1.3"
                                                    stroke-linecap="round"/>
                                            </svg>
                                        </span>
                                        <span class="lu-form-text">I have read and agree to the Privacy Policy</span>
                                    </label>
                                </div>
                            </div>

                            <button class="btn setup-form__submit" type="submit">
                                <span class="btn-text">Sign Up and Connect Now</span>
                                {literal}
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#paint0_angular_13600_1276_clip_path)"
                                        data-figma-skip-parse="true">
                                            <g transform="matrix(0.012 0 0 0.012 12 12)">
                                                <foreignObject x="-1083.33" y="-1083.33" width="2166.67" height="2166.67">
                                                    <div xmlns="http://www.w3.org/1999/xhtml"
                                                        style="background:conic-gradient(from 90deg,rgba(255, 255, 255, 0) 0deg,rgba(255, 255, 255, 0) 0.036deg,rgba(255, 255, 255, 1) 360deg);height:100%;width:100%;opacity:1"></div>
                                                </foreignObject>
                                            </g>
                                        </g>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                            data-figma-gradient-fill="{&#34;type&#34;:&#34;GRADIENT_ANGULAR&#34;,&#34;stops&#34;:[{&#34;color&#34;:{&#34;r&#34;:1.0,&#34;g&#34;:1.0,&#34;b&#34;:1.0,&#34;a&#34;:0.0},&#34;position&#34;:0.0},{&#34;color&#34;:{&#34;r&#34;:1.0,&#34;g&#34;:1.0,&#34;b&#34;:1.0,&#34;a&#34;:0.0},&#34;position&#34;:9.9999997473787516e-05},{&#34;color&#34;:{&#34;r&#34;:1.0,&#34;g&#34;:1.0,&#34;b&#34;:1.0,&#34;a&#34;:1.0},&#34;position&#34;:1.0}],&#34;stopsVar&#34;:[{&#34;color&#34;:{&#34;r&#34;:1.0,&#34;g&#34;:1.0,&#34;b&#34;:1.0,&#34;a&#34;:0.0},&#34;position&#34;:0.0},{&#34;color&#34;:{&#34;r&#34;:1.0,&#34;g&#34;:1.0,&#34;b&#34;:1.0,&#34;a&#34;:0.0},&#34;position&#34;:9.9999997473787516e-05},{&#34;color&#34;:{&#34;r&#34;:1.0,&#34;g&#34;:1.0,&#34;b&#34;:1.0,&#34;a&#34;:1.0},&#34;position&#34;:1.0}],&#34;transform&#34;:{&#34;m00&#34;:24.0,&#34;m01&#34;:2.2785857131234905e-14,&#34;m02&#34;:-2.1316282072803006e-14,&#34;m10&#34;:-1.2127716941866349e-14,&#34;m11&#34;:24.0,&#34;m12&#34;:-5.3290705182007514e-15},&#34;opacity&#34;:1.0,&#34;blendMode&#34;:&#34;NORMAL&#34;,&#34;visible&#34;:true}"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M22.7816 9.60062C23.3293 9.52995 23.8306 9.91669 23.9013 10.4644C23.967 10.9736 24 11.4865 24 11.9999C24 12.5522 23.5522 12.9999 23 12.9999C22.4477 12.9999 22 12.5522 22 11.9999C22 11.5721 21.9725 11.1447 21.9178 10.7204C21.8471 10.1726 22.2338 9.67128 22.7816 9.60062Z"
                                            fill="white"/>
                                        <defs>
                                            <clipPath id="paint0_angular_13600_1276_clip_path">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                {/literal}
                            </button>
                        </form>
                    </div>
                </div>
                <div class="lu-modal__actions">
                    <span>Already have an account?</span>
                    <a href="" class="lu-modal__actions-link">
                        Set up the connector here
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.0274 10.2277L14.0273 14.1667C14.0273 14.5203 13.8868 14.8594 13.6368 15.1095C13.3867 15.3595 13.0476 15.5 12.694 15.5H5.33333C4.97971 15.5 4.64057 15.3595 4.39052 15.1095C4.14048 14.8594 4 14.5203 4 14.1667L4.00011 6.83333C4.00011 6.47971 4.14058 6.14057 4.39063 5.89052C4.64068 5.64048 4.97982 5.5 5.33344 5.5H9.36073"
                                stroke="#5C4BD1" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 3.5H16V7.5" stroke="#5C4BD1" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8.5 11L15.5 4" stroke="#5C4BD1" stroke-width="1.2" stroke-linecap="round"
                                stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    const $modal = $('#connect-account');
    const $form = $('#setup-form');
    const $submitBtn = $('.setup-form__submit');

	function mc_registerAccount() {
        const $submitBtn = $('.setup-form__submit');
		$.post('addonmodules.php?module=MetricsCube', {
			module: "MetricsCube",
			mcAjax: 1,
			dataType: "json",
			moduleAction: "invitation_registerAccount",
			email: $('#setup-form input[name="email"]').val(),
			password: $('#setup-form input[name="password"]').val(),
			privacy: $('#setup-form input[name="privacy-policy"]').is(':checked')
		}).done(function (response) {
			if (response.status === 'success') {
				if (response.next_action) {
					if (typeof window[response.next_action] === 'function') {
						window[response.next_action]();
					} else {
						console.warn('Function not found:', response.next_action);
					}
				}
                MCNotiSuccess(response.message)
			} else if (response.status === 'error' || response.status === 'warning') {
				if (response.message) {
                    $('#invitation_alert').removeClass('hidden');
                    setTimeout(function() {
                        $('#invitation_alert').addClass('fade-in');
                    }, 100);
					$('#invitation_alert .server-error-alert__text').text(response.message);
                }

				for (let field in response.errors) {
					const $cont = $('.input__container[input-' + field + ']');
					$cont.addClass('error');
					$cont.closest('.input').find('.input__error-alert').text(response.errors[field][0] || 'Invalid field').removeClass('hidden');
				}

                const termsChecked = $('input[name="terms-of-service"]').is(':checked');
                const privacyChecked = $('input[name="privacy-policy"]').is(':checked');

                if (!termsChecked) {
                    $('input[name="terms-of-service"]').closest('.lu-form-check').addClass('error');
                }
                if (!privacyChecked) {
                    $('input[name="privacy-policy"]').closest('.lu-form-check').addClass('error');
                }
			} else {
                $('#invitation_alert').removeClass('hidden');
                setTimeout(function() {
                    $('#invitation_alert').addClass('fade-in');
                }, 100);
				$('#invitation_alert .server-error-alert__text').text('Unexpected server response.');
			}

            $submitBtn.removeClass('btn-loading');
		}).fail(function (jqXHR, textStatus, errorThrown) {
            $('#invitation_alert').removeClass('hidden');
            setTimeout(function() {
                $('#invitation_alert').addClass('fade-in');
            }, 100);
			$('#invitation_alert .server-error-alert__text').text('Connection error: ' + textStatus);
			console.error('AJAX error:', errorThrown);

            $submitBtn.removeClass('btn-loading');
		});
	}

	function mc_activateAddon() {
		$.post('addonmodules.php?module=MetricsCube', {
			module: "MetricsCube",
			mcAjax: 1,
			dataType: "json",
			moduleAction: "invitation_activateAddon"
		}).done(function (response) {
			if (response.status === 'success') {
				if (response.next_action) {
					if (typeof window[response.next_action] === 'function') {
						window[response.next_action]();
					} else {
						console.warn('Function not found:', response.next_action);
					}
				}
			} else if (response.status === 'error') {
                $('#invitation_alert').removeClass('hidden');
                setTimeout(function() {
                    $('#invitation_alert').addClass('fade-in');
                }, 100);
				$('#invitation_alert .server-error-alert__text').text(response.message);
			} else {
                $('#invitation_alert').removeClass('hidden');
                setTimeout(function() {
                    $('#invitation_alert').addClass('fade-in');
                }, 100);
				$('#invitation_alert .server-error-alert__text').text('Unexpected server response.');
			}
		}).fail(function (jqXHR, textStatus, errorThrown) {
            $('#invitation_alert').removeClass('hidden');
            setTimeout(function() {
                $('#invitation_alert').addClass('fade-in');
            }, 100);
			$('#invitation_alert .server-error-alert__text').text('Connection error: ' + textStatus);
			console.error('AJAX error:', errorThrown);
		});
	}

	function mc_redirectAndActivate() {
		window.location.href = "addonmodules.php?module=MetricsCube&autoActivate=1";
	}

    function showModal() {
        $modal.addClass('show');
        if ($('#modal-backdrop').length === 0) {
            $('body').append('<div id="modal-backdrop" class="modal-backdrop-dashboard"></div>');
            $('#modal-backdrop').addClass('show');
        }
        $modal.trigger('shown.bs.modal');
    }

    function hideModal() {
        const email = $('#setup-form input[name="email"]').val();
        const password = $('#setup-form input[name="password"]').val();
        const privacy = $('#setup-form input[name="privacy-policy"]').is(':checked');

        if (!email || !password || !privacy) {
            $.post('addonmodules.php?module=MetricsCube', {
                module: "MetricsCube",
                mcAjax: 1,
                dataType: "json",
                moduleAction: "invitation_modalClosedEmpty"
            }).done(function (response) {
                console.log('Modal closed without data — response:', response);
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.warn('AJAX error on modal close:', textStatus, errorThrown);
            });
        }

        $modal.removeClass('show');
        $('#modal-backdrop').removeClass('show').remove();
        $modal.trigger('hidden.bs.modal');
    }

	$(document).ready(function () {
        $('button[data-dismiss="lu-modal"]').on('click', function (e) {
			e.preventDefault();
			hideModal();
		});

		$form.on('submit', function (e) {
			e.preventDefault();
            $('#invitation_alert').removeClass('fade-in').addClass('hidden');
            $('#invitation_alert .server-error-alert__text').text('');
			$submitBtn.addClass('btn-loading');
			mc_activateAddon();
		});

		$('input').on('input', function () {
			const $container = $(this).closest('.input__container');
			const $error = $container.closest('.input').find('.input__error-alert');
			const $clear = $container.find('.input__clear-field');

			$container.removeClass('error');
			$error.addClass('hidden');

			if ($(this).val().length > 0) {
				$clear.removeClass('hidden');
			} else {
				$clear.addClass('hidden');
			}
		});

		$('.input__clear-field').on('click', function () {
			const $container = $(this).closest('.input__container');
			const $input = $container.find('input');
			const $error = $container.closest('.input').find('.input__error-alert');

			$input.val('');
			$(this).addClass('hidden');
			$container.removeClass('error');
			$error.addClass('hidden');
			$input.trigger('focus');
		});

		$('.input__password-control').on('click', function () {
			const $container = $(this).closest('.input__container');
			const $input = $container.find('input[name="password"]');
			const $showIcon = $container.find('.input__password-show');
			const $hideIcon = $container.find('.input__password-hide');

			if ($input.attr('type') === 'password') {
				$input.attr('type', 'text');
				$showIcon.addClass('hidden');
				$hideIcon.removeClass('hidden');
			} else {
				$input.attr('type', 'password');
				$hideIcon.addClass('hidden');
				$showIcon.removeClass('hidden');
			}
		});

		$('input[type="checkbox"]').on('change', function () {
			$(this).closest('.lu-form-check').removeClass('error');
		});

        if ($('a[data-auto-open]').length) {
            setTimeout(function() {
                showModal();
            }, 100);
        }
        
        $('a[data-registrationmodal]').on('click', function (e) {
            e.preventDefault();
            showModal();
        });
	});
</script>