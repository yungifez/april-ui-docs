<div class="flex min-h-[460px] items-center justify-center bg-muted/20 p-6">
    <april:card class="w-full max-w-lg">
        <slot:title>Payment details</slot:title>
        <slot:description>Enter your card information to continue.</slot:description>
        <slot:content class="space-y-5">
            <div class="space-y-2"><april:label for="payment-name">Name on card</april:label><april:input id="payment-name" value="Sofia Carter" class="w-full" /></div>
            <div class="space-y-2"><april:label for="payment-number">Card number</april:label><april:input id="payment-number" value="1234 1234 1234 1234" class="w-full" /></div>
            <div class="grid gap-4 sm:grid-cols-2"><div class="space-y-2"><april:label for="payment-expiry">Expires</april:label><april:input id="payment-expiry" placeholder="MM / YY" /></div><div class="space-y-2"><april:label for="payment-cvc">CVC</april:label><april:input id="payment-cvc" placeholder="CVC" /></div></div>
            <april:button type="button" class="w-full">Continue</april:button>
        </slot:content>
    </april:card>
</div>
