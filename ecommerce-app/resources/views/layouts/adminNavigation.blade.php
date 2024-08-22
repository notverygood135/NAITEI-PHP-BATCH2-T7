<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <a href="{{ route('dashboard.index') }}" class="flex-shrink-0 text-xl font-bold text-gray-800">My Shop</a>
            </div>
            <div class="flex items-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="ml-4 text-gray-500 hover:text-gray-700">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>
