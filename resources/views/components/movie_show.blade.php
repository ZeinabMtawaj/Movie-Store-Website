
@props(['s'])

<div class="bg-gray-50 border border-gray-200 rounded p-6">
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{asset('images/no_image.jpg')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/listing/{{$s['id']}}">{{$s['title']}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">Acme Corp</div>
            {{-- <ul class="flex">
                <li
                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                    <a href="#">Laravel</a>
                </li>
                <li
                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                    <a href="#">API</a>
                </li>
                <li
                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                    <a href="#">Backend</a>
                </li>
                <li
                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                    <a href="#">Vue</a>
                </li>
            </ul> --}}
            <div class="star-widget">
                <label for="rate-5" class="fas fa-star"></label>
                <label for="rate-4" class="fas fa-star"></label>
                <label for="rate-3" class="fas fa-star"></label>
                <label for="rate-2" class="fas fa-star"></label>
                <label for="rate-1" class="fas fa-star"></label>
              </div>

            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> Boston,
                MA
            </div>
        </div>
    </div>
</div>

{{-- <script>
    const btn = document.querySelector("button");
    const post = document.querySelector(".post");
    const widget = document.querySelector(".star-widget");
    const editBtn = document.querySelector(".edit");
    btn.onclick = ()=>{
      widget.style.display = "none";
      post.style.display = "block";
      editBtn.onclick = ()=>{
        widget.style.display = "block";
        post.style.display = "none";
      }
      return false;
    }
  </script> --}}
