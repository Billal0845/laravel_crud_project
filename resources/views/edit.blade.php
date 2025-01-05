<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>

    <style type="text/tailwindcss">
        @layer utilities {
            .container {
                @apply max-w-lg mx-auto p-6 bg-white shadow-lg rounded-lg;
            }
            .btn-primary {
                @apply bg-blue-500 text-white font-semibold px-4 py-2 rounded hover:bg-blue-600;
            }
        }
    </style>

    <title>Edit Post</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="container">
       

        <form action="{{route('update', $postToUpdate->id)}}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
          @csrf
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input 
                    type="text" 
                    name="name"
                    id="name" 
                    placeholder="Enter Your Name" 
                    value="{{$postToUpdate->name}}"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            @error('name')
                <p class="text-red-700">{{$message}}</p>
            @enderror

            <div>
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <input 
                    type="text" 
                    id="description" 
                    name="description"
                    placeholder="Description Here.." 
                    value="{{$postToUpdate->description}}"

                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            @error('description')
            <p class="text-red-700">{{$message}}</p>
            @enderror

            <div>
                <label for="image" class="block text-gray-700 font-medium mb-2">Image</label>
                <input 
                    type="file" 
                    id="image" 
                    name="image"

                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

               @error('image')
                <p class="text-red-700">{{$message}}</p>
              @enderror

            <button 
                type="submit" 
                id="btn-submit" 
                class="btn-primary">
                Submit
            </button>
        </form>
    </div>
</body>
</html>
