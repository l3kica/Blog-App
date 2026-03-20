<x-app-layout>
    <div class="max-w-4xl mx-auto py-6">
        <div class="border rounded p-6 mb-6">
            <h1 class="text-3xl font-bold">{{ $post->title }}</h1>

            <p class="text-sm text-gray-600 mt-2">
                By {{ $post->user->name }} • {{ $post->created_at->format('Y-m-d H:i') }}
            </p>

            <div class="mt-4 whitespace-pre-line">
                {{ $post->content }}
            </div>

            @auth
                @can('update', $post)
                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">
                            Edit
                        </a>

                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">
                                Delete
                            </button>
                        </form>
                    </div>
                @endcan
            @endauth
        </div>

        <div class="border rounded p-6 mb-6">
            <h2 class="text-xl font-bold mb-4">Add Comment</h2>

            <form action="{{ route('comments.store', $post) }}" method="POST">
                @csrf
                <textarea
                    name="comment"
                    rows="4"
                    class="border rounded w-full p-2"
                    required
                >{{ old('comment') }}</textarea>

                @error('comment')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror

                <button type="submit" class="mt-3 bg-blue-600 text-white px-4 py-2 rounded">
                    Submit Comment
                </button>
            </form>
        </div>

        <div class="border rounded p-6">
            <h2 class="text-xl font-bold mb-4">Comments</h2>

            @forelse($post->comments as $comment)
                <div class="border-b py-4">
                    <p>{{ $comment->comment }}</p>
                    <p class="text-sm text-gray-600 mt-2">
                        By {{ $comment->user?->name ?? 'Guest' }} • {{ $comment->created_at->format('Y-m-d H:i') }}
                    </p>

                    @auth
                        @can('delete', $comment)
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">
                                    Delete Comment
                                </button>
                            </form>
                        @endcan
                    @endauth
                </div>
            @empty
                <p>No comments yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>