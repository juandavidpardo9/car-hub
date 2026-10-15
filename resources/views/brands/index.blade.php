<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Brands</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 text-green-700 bg-green-100 p-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('brands.create') }}"
                   class="inline-block mb-4 px-4 py-2 bg-gray-800 text-white rounded">
                    + New Brand
                </a>

                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">Name</th>
                            <th class="py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brands as $brand)
                            <tr class="border-b">
                                <td class="py-2">{{ $brand->name }}</td>
                                <td class="py-2 flex gap-3">
                                    <a href="{{ route('brands.edit', $brand) }}" class="text-blue-600">Edit</a>
                                    <form method="POST" action="{{ route('brands.destroy', $brand) }}"
                                          onsubmit="return confirm('Delete this brand?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="py-4 text-gray-500">No brands registered.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">{{ $brands->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>