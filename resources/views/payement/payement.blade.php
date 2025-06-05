<x-master title="Payment">
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden p-6">
        <h1 class="text-2xl font-bold text-center mb-6">Payment for {{ ucfirst($plan) }} Plan</h1>
        
        <form action="{{ route('premium.process') }}" method="POST" id="payment-form">
            @csrf
            <input type="hidden" name="plan" value="{{ $plan }}">
            
            <div class="mb-6">
                <div id="card-element" class="p-3 border border-gray-300 rounded-md"></div>
                <div id="card-errors" role="alert" class="text-red-500 text-sm mt-2"></div>
            </div>

            <button id="submit-button" class="w-full bg-purple-600 text-white py-3 rounded-lg font-medium">
                Pay ${{ number_format($price, 2) }}
            </button>
        </form>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const stripe = Stripe('{{ config('services.stripe.key') }}');
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        const submitButton = document.getElementById('submit-button');
        submitButton.disabled = true;
        submitButton.textContent = 'Processing...';

        const {error, paymentMethod} = await stripe.createPaymentMethod({
            type: 'card',
            card: card,
        });

        if (error) {
            document.getElementById('card-errors').textContent = error.message;
            submitButton.disabled = false;
            submitButton.textContent = 'Pay ${{ number_format($price, 2) }}';
        } else {
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'payment_method');
            hiddenInput.setAttribute('value', paymentMethod.id);
            form.appendChild(hiddenInput);
            form.submit();
        }
    });
});
</script>
</x-master>