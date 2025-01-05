<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>

<style type="text/tailwindcss">
    @layer utilities {
    .contianer{
       @apply px-10 mx-auto;
    }

    .editbtn{
       @apply bg-green-600 text-white rounded py-2 px-4;
    }

    .deletebtn{
       @apply bg-red-600 text-white rounded py-2 px-4 ml-2;
    }
    }
  </style>
    <title>CRUD PROJECT</title>
</head>
<body>
   <div class="contianer">
    <div class="flex justify-between my-5">
        <h2 class="text-red-500">Home</h2>
        <a href="/create" class="editbtn">Add new post</a>
    </div>
   
   </div>

   @if (session('success'))
       <h2 class="font-bold text-green-500 text-2xl ml-3">{{session('success')}}</h2>
   @endif

   <div class="data">

    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
          <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-green-600 text-white">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">Id</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">Name</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">Description</th>
                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-white uppercase">Image</th>
                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-white uppercase">Action</th>
                  </tr>
                </thead>
                <tbody>

                @foreach ($posts as $post)

                <tr class="odd:bg-white even:bg-gray-100">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{$post->id}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$post->name}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$post->description}}</td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><img src="images/{{$post->image}}" width="60px" height="60px" alt=""></td>

                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                        <a href="{{route('edit', $post->id)}}" class="editbtn">Edit</a>
                        <a href="{{route('delete', $post->id)}}" class="deletebtn">Delete</a>
                    </td>
                  </tr>
                    
                @endforeach
                  
    
                </tbody>
              </table>

         
            </div>
          </div>
        </div>
      </div>
   </div>

   {{$posts->links()}}
    
</body>
</html>