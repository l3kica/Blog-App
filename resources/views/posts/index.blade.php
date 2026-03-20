<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Posts</h1>

            @auth
                <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Create Post
                </a>
            @endauth
        </div>

        @foreach($posts as $post)
            <div class="border rounded p-4 mb-4">
                <h2 class="text-xl font-semibold">
                    <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                </h2>
                <p class="text-sm text-gray-600">
                    By {{ $post->user->name }} • {{ $post->created_at->format('Y-m-d H:i') }}
                </p>
                <p class="mt-2">{{ \Illuminate\Support\Str::limit($post->content, 150) }}</p>
            </div>
        @endforeach

        {{ $posts->links() }}
    </div>
</x-app-layout>