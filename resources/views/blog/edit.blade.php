<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="text-center pt-20">
        <h1 class="text-3xl text-gray-700 mb-5">
            Edit: {{ $post->title }}
        </h1>
        <hr class="border border-1 border-gray-300 mb-10">
    </div>
    <div class="flex justify-center">
        <div class="m-auto">
            <div class="pb-8">
                @if ($errors->any())
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        Something went wrong
                    </div>
                    <ul class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                @endif
            </div>
            <form action="{{ route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div>
                    <div class="form-check mb-3">
                        <input {{ $post->is_published === true ? 'checked' : '' }}
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="checkbox" value="" id="flexCheckDefault" name="is_published">
                        <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                            <em class="font-semibold">Is published</em>
                        </label>
                    </div>

                    <div class="mb-3 xl:w-96">
                        <input type="text" value="{{ $post->title }}"
                            class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleFormControlInput3" placeholder="Tilte" name="title" />
                    </div>
                    <div class="mb-3 xl:w-96">
                        <input type="text" value="{{ $post->excerpt }}"
                            class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleFormControlInput3" placeholder="Excerpt" name="excerpt" />
                    </div>
                    <div class="mb-3 xl:w-96">
                        <input type="number" value="{{ $post->min_to_read }}"
                            class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleFormControlInput3" placeholder="minutes to read" name="min_to_read" />
                    </div>

                    <div class="mb-3 xl:w-96">
                        <textarea {{ $post->body }}
                            class="
                        form-control
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                    "
                            id="exampleFormControlTextarea1" rows="3" placeholder="Body" name="body">
                </textarea>
                    </div>
                    <div class="mb-3 xl:w-96">
                        <input
                            class="form-control
                    
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            type="file" id="formFile" name="image">
                    </div>
                    <button type="sumbit"
                        class="mt-5 w-full inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-normal uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Edit
                        Post</button>
                </div>
            </form>
        </div>
</body>

</html>
