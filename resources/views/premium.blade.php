<x-master title="Go Premium">
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-indigo-50 py-12 px-4 sm:px-6 lg:px-8">
    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto text-center mb-16">
        <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent mb-4">
            Elevate Your Music Experience
        </h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Unlock premium features, higher quality audio, and exclusive content.
        </p>
        
        <!-- Animated badge -->
        <div class="mt-6 inline-block animate-bounce">
            <span class="bg-yellow-100 text-yellow-800 px-4 py-2 rounded-full text-sm font-medium flex items-center mx-auto w-max">
                <i class="fas fa-crown mr-2 text-yellow-500"></i>
                Most Popular: Premium+ 
            </span>
        </div>
    </div>

    <!-- Pricing Tiers -->
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
        <!-- Free Tier -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Free</h3>
                <p class="text-gray-600 mb-6">Basic features</p>
                <div class="mb-8">
                    <span class="text-4xl font-bold">$0</span>
                    <span class="text-gray-500">/forever</span>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center text-gray-600"><i class="fas fa-check text-green-500 mr-2"></i> 128kbps audio</li>
                    <li class="flex items-center text-gray-600"><i class="fas fa-check text-green-500 mr-2"></i> Basic playlists</li>
                    <li class="flex items-center text-gray-400"><i class="fas fa-times text-red-400 mr-2"></i> No offline listening</li>
                    <li class="flex items-center text-gray-400"><i class="fas fa-times text-red-400 mr-2"></i> Ads between songs</li>
                </ul>
            </div>
            <div class="bg-gray-50 px-6 py-4">
                <span class="text-gray-700">Your current plan</span>
            </div>
        </div>

        <!-- Premium Tier -->
        <div class="relative bg-white rounded-xl shadow-2xl overflow-hidden border-2 border-purple-500 transform scale-105 z-10">
            <!-- Popular badge -->
            <div class="absolute top-0 right-0 bg-purple-600 text-white px-3 py-1 text-xs font-bold transform translate-x-2 -translate-y-2">
                BEST VALUE
            </div>
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Premium</h3>
                <p class="text-gray-600 mb-6">For serious listeners</p>
                <div class="mb-8">
                    <span class="text-4xl font-bold">$9.99</span>
                    <span class="text-gray-500">/month</span>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center text-gray-800"><i class="fas fa-check text-purple-500 mr-2"></i> 320kbps HD audio</li>
                    <li class="flex items-center text-gray-800"><i class="fas fa-check text-purple-500 mr-2"></i> Unlimited playlists</li>
                    <li class="flex items-center text-gray-800"><i class="fas fa-check text-purple-500 mr-2"></i> Offline listening</li>
                    <li class="flex items-center text-gray-800"><i class="fas fa-check text-purple-500 mr-2"></i> No ads</li>
                    <li class="flex items-center text-gray-800"><i class="fas fa-check text-purple-500 mr-2"></i> Early access to new releases</li>
                </ul>
                <a href="{{ route('premium.pay', ['plan' => 'premium']) }}" 
   class="w-full bg-gradient-to-r from-purple-600 to-blue-600 text-white py-3 rounded-lg font-medium hover:shadow-lg transition-all block text-center">
   Start 7-Day Free Trial
</a>      
            </div>
        </div>

        <!-- Family Tier -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Family</h3>
                <p class="text-gray-600 mb-6">For music-loving households</p>
                <div class="mb-8">
                    <span class="text-4xl font-bold">$14.99</span>
                    <span class="text-gray-500">/month</span>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center text-gray-800"><i class="fas fa-check text-blue-500 mr-2"></i> All Premium features</li>
                    <li class="flex items-center text-gray-800"><i class="fas fa-check text-blue-500 mr-2"></i> 6 accounts</li>
                    <li class="flex items-center text-gray-800"><i class="fas fa-check text-blue-500 mr-2"></i> Family mix playlists</li>
                    <li class="flex items-center text-gray-800"><i class="fas fa-check text-blue-500 mr-2"></i> Parental controls</li>
                </ul>
                <a href="{{ route('premium.pay', ['plan' => 'family']) }}" 
   class="w-full bg-gradient-to-r from-blue-500 to-blue-700 text-white py-3 rounded-lg font-medium hover:shadow-lg transition-all block text-center">
   Choose Family Plan
</a>
            </div>
        </div>
    </div>

    <!-- Feature Showcase -->
    <div class="max-w-7xl mx-auto mb-20">
        <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Premium Perks</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow">
                <div class="text-purple-500 mb-4 text-4xl">
                    <i class="fas fa-headphones"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">HD Audio Quality</h3>
                <p class="text-gray-600">Experience studio-quality 320kbps audio with enhanced dynamic range.</p>
            </div>
            
            <!-- Feature 2 -->
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow">
                <div class="text-blue-500 mb-4 text-4xl">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Offline Listening</h3>
                <p class="text-gray-600">Download songs and playlists to listen anywhere, anytime.</p>
            </div>
            
            <!-- Feature 3 -->
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow">
                <div class="text-green-500 mb-4 text-4xl">
                    <i class="fas fa-star"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Exclusive Content</h3>
                <p class="text-gray-600">Early access to new releases, artist interviews, and behind-the-scenes content.</p>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-8 mb-20">
        <h2 class="text-2xl font-bold text-center mb-8">What Our Premium Members Say</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex items-start">
                <img src="https://randomuser.me/api/portraits/women/32.jpg" class="h-12 w-12 rounded-full mr-4">
                <div>
                    <div class="flex text-yellow-400 mb-1">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 mb-2">"The audio quality upgrade blew me away. It's like hearing my favorite songs for the first time!"</p>
                    <p class="text-sm text-gray-500">- Sarah J., Premium member since 2022</p>
                </div>
            </div>
            <div class="flex items-start">
                <img src="https://randomuser.me/api/portraits/men/75.jpg" class="h-12 w-12 rounded-full mr-4">
                <div>
                    <div class="flex text-yellow-400 mb-1">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 mb-2">"No more ads interrupting my workouts. Worth every penny for uninterrupted listening."</p>
                    <p class="text-sm text-gray-500">- Michael T., Family plan subscriber</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Final CTA -->
    <div class="max-w-3xl mx-auto text-center bg-gradient-to-r from-purple-600 to-blue-600 rounded-xl p-8 text-white shadow-xl">
        <h2 class="text-2xl md:text-3xl font-bold mb-4">Ready to Experience Music Like Never Before?</h2>
        <p class="text-lg mb-6 opacity-90">Join thousands of happy premium members today.</p>
        <button class="bg-white text-purple-600 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition-colors shadow-lg">
            Start Your Free Trial Now
        </button>
        <p class="text-sm mt-4 opacity-80">7-day free trial • Cancel anytime</p>
    </div>
</div>
<form action="{{ route('premium.process') }}" method="POST" id="paymentForm">
    @csrf
    
    
    <!-- Credit Card Inputs (remove readonly) -->
    <div class="mb-6">
        <label>Card Number</label>
        <input type="text" name="card_number" placeholder="4242 4242 4242 4242" required>
    </div>
    
    <!-- Expiry and CVC -->
    <div class="grid grid-cols-2 gap-4 mb-6">
        <div>
            <label>Expiry (MM/YY)</label>
            <input type="text" name="expiry" placeholder="12/24" required>
        </div>
        <div>
            <label>CVC</label>
            <input type="text" name="cvc" placeholder="123" required>
        </div>
    </div>
    
    <button type="submit" id="submitBtn">Submit Payment</button>
</form>

<!-- Add this JavaScript -->
<script>
document.getElementById('paymentForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const btn = document.getElementById('submitBtn');
    btn.disabled = true;
    btn.innerHTML = 'Processing...';
    
    // Simple validation
    const cardNumber = this.card_number.value.replace(/\s+/g, '');
    if (!/^\d{16}$/.test(cardNumber)) {
        alert('Please enter a valid 16-digit card number');
        btn.disabled = false;
        btn.innerHTML = 'Submit Payment';
        return;
    }
    
    this.submit(); // Submit the form if validation passes
});
</script>
</x-master>