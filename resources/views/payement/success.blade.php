<x-master title="Payment Successful">
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden p-6 text-center">
        <div class="text-green-500 text-6xl mb-4">
            <i class="fas fa-check-circle"></i>
        </div>
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Payment Successful!</h1>
        <p class="text-gray-600 mb-6">Your premium subscription is now active. Enjoy your music!</p>
        
        <div class="bg-gray-100 p-4 rounded-lg mb-6">
            <div class="flex justify-between items-center mb-2">
                <span class="font-medium">Plan:</span>
                <span class="font-bold">{{ ucfirst(session('plan', 'Premium')) }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-medium">Trial Ends:</span>
                <span class="font-bold">{{ now()->addDays(7)->format('M j, Y') }}</span>
            </div>
        </div>
        
        <a href="{{ route('home') }}" class="inline-block bg-gradient-to-r from-purple-600 to-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:shadow-lg transition-all">
            Start Listening
        </a>
    </div>
</div>
</x-master>