<div class="js-cookie-consent cookie-consent fixed hover:uppercase bottom-0 inset-x-0 pb-2">
    <div class="max-w-7xl mx-auto px-6">
        <div class="p-2 rounded-lg bg-indigo-100">
            <div class="flex flex-col sm:flex-row items-center justify-between flex-wrap">
                <div class="w-full sm:w-auto flex-1 items-center mb-2 sm:mb-0">
                    <p class="ml-3 text-black cookie-consent__message">
                        {!! trans('cookie-consent::texts.message') !!}
                    </p>
                </div>
                <div class="mt-2 flex-shrink-0 sm:mt-0 sm:ml-2 sm:order-last">
                    <button class="js-cookie-consent-agree cookie-consent__agree cursor-pointer flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium text-white hover:text-black bg-blue-800 hover:bg-blue-300">
                        {{ trans('cookie-consent::texts.agree') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>