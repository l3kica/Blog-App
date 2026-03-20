<x-app-layout>
    <div class="max-w-3xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-6">Create Post</h1>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            @include('posts.partials.form')
        </form>
    </div>
</x-app-layout>