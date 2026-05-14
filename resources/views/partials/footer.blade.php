{{-- Footer --}}
<footer class="bg-white border-t border-gray-200">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Newsletter --}}
        <div class="py-12 border-b border-gray-200">
            <div class="max-w-2xl mx-auto text-center">
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Stay in the loop</h3>
                <p class="text-gray-500 mb-6">Subscribe to our newsletter for exclusive offers, new arrivals, and style inspiration.</p>
                <div class="flex max-w-md mx-auto gap-2">
                    <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-2.5 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900">
                    <button class="bg-gray-900 text-white px-6 py-2.5 rounded-lg hover:bg-gray-800 transition-colors text-sm font-medium">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>

        {{-- Footer Links --}}
        <div class="py-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
            <div class="lg:col-span-2">
                <a href="{{ route('home') }}" class="text-2xl font-bold tracking-tight text-gray-900">
                    SHOE<span class="text-gray-900">STORE</span>
                </a>
                <p class="text-gray-500 mt-4 mb-6 max-w-sm">
                    Discover unique shoes that inspire your lifestyle. Quality craftsmanship meets modern design.
                </p>
                <div class="space-y-2 text-sm text-gray-500">
                    <p>📍 123 Fashion Street, Style City, SC 12345</p>
                    <p>📞 +1 (555) 123-4567</p>
                    <p>✉️ hello@shoestore.com</p>
                </div>
            </div>

            <div>
                <h4 class="text-sm font-semibold text-gray-900 mb-4 uppercase tracking-wider">Shop</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('products.index') }}" class="text-sm text-gray-500 hover:text-gray-900 transition-colors">All Products</a></li>
                    <li><a href="{{ route('products.index', ['sort' => 'newest']) }}" class="text-sm text-gray-500 hover:text-gray-900 transition-colors">New Arrivals</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-sm text-gray-500 hover:text-gray-900 transition-colors">Featured</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-semibold text-gray-900 mb-4 uppercase tracking-wider">Customer Care</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-sm text-gray-500 hover:text-gray-900 transition-colors">Contact Us</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-gray-900 transition-colors">Shipping Info</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-gray-900 transition-colors">Returns & Exchanges</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-semibold text-gray-900 mb-4 uppercase tracking-wider">Company</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-sm text-gray-500 hover:text-gray-900 transition-colors">About Us</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-gray-900 transition-colors">Privacy Policy</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-gray-900 transition-colors">Terms & Conditions</a></li>
                </ul>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="py-6 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-sm text-gray-500">© {{ date('Y') }} ShoeStore™. All Rights Reserved.</p>
            <div class="flex items-center gap-6 text-sm text-gray-500">
                <a href="#" class="hover:text-gray-900 transition-colors">Privacy</a>
                <a href="#" class="hover:text-gray-900 transition-colors">Terms</a>
                <a href="#" class="hover:text-gray-900 transition-colors">Cookies</a>
            </div>
        </div>
    </div>
</footer>
