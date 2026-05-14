@extends('layouts.admin')

@section('page-title', 'Categories')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h2 class="text-lg font-semibold text-gray-900">All Categories</h2>
    <a href="{{ route('admin.categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors">
        + Add Category
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="bg-gray-50">
                <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">#</th>
                <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Name</th>
                <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Slug</th>
                <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Products</th>
                <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($categories as $category)
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 text-sm text-gray-500">{{ $category->id }}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900">{{ $category->name }}</td>
                    <td class="py-4 px-6 text-sm text-gray-500">{{ $category->slug }}</td>
                    <td class="py-4 px-6 text-sm text-gray-700">{{ $category->products_count }}</td>
                    <td class="py-4 px-6">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Delete this category?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-500">No categories found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">{{ $categories->links('partials._pagination') }}</div>
@endsection
