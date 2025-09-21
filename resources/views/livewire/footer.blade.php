 <footer class="bg-gray-800 dark:bg-gray-900 text-gray-400 pt-16">
     <div class="w-full mx-auto px-8">
         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
             <div>
                 <h2 class="text-white text-xl font-semibold mb-6">GET IN TOUCH</h2>
                 <div class="flex items-start mb-4">
                     <i class="material-icons text-white mr-3 mt-1">location_on</i>
                     <p>Pekanbaru, Indonesia</p>
                 </div>
                 <div class="flex items-start mb-4">
                     <i class="material-icons text-white mr-3 mt-1">phone</i>
                     <p>+012 345 67890</p>
                 </div>
                 <div class="flex items-start mb-4">
                     <i class="material-icons text-white mr-3 mt-1">email</i>
                     <p>beritaterkini@gmail.com</p>
                 </div>
                 <h3 class="text-white text-lg font-semibold mt-8 mb-4">
                     FOLLOW US
                 </h3>
                 <div class="flex space-x-2">
                     <a class="w-10 h-10 bg-gray-700 dark:bg-gray-600 flex items-center justify-center rounded text-white hover:bg-primary hover:text-gray-900 transition-colors"
                         href="#">
                         <i class="fab fa-twitter"></i>
                     </a>
                     <a class="w-10 h-10 bg-gray-700 dark:bg-gray-600 flex items-center justify-center rounded text-white hover:bg-primary hover:text-gray-900 transition-colors"
                         href="#">
                         <i class="fab fa-facebook-f"></i>
                     </a>
                     <a class="w-10 h-10 bg-gray-700 dark:bg-gray-600 flex items-center justify-center rounded text-white hover:bg-primary hover:text-gray-900 transition-colors"
                         href="#">
                         <i class="fab fa-linkedin-in"></i>
                     </a>
                     <a class="w-10 h-10 bg-gray-700 dark:bg-gray-600 flex items-center justify-center rounded text-white hover:bg-primary hover:text-gray-900 transition-colors"
                         href="#">
                         <i class="fab fa-instagram"></i>
                     </a>
                     <a class="w-10 h-10 bg-gray-700 dark:bg-gray-600 flex items-center justify-center rounded text-white hover:bg-primary hover:text-gray-900 transition-colors"
                         href="#">
                         <i class="fab fa-youtube"></i>
                     </a>
                 </div>
             </div>
             <div>
                 <h2 class="text-white text-xl font-semibold mb-6">POPULAR NEWS</h2>
                 <div class="space-y-4">
                     @foreach ($posts_popular as $post)
                         <div class="flex flex-col">
                             <div class="flex items-center space-x-2 mb-1">
                                 <span
                                     class="bg-green-500 text-gray-900 text-xs font-bold px-2 py-1 rounded uppercase">{{ $post->category_name }}</span>
                                 <span class="text-sm">{{ $post->created_at }}</span>
                             </div>
                             <a class="text-gray-300 hover:text-white uppercase"
                                 href="{{ route('post.show', $post->slug) }}">{{ Str::limit($post->title, 50) }}</a>
                         </div>
                     @endforeach
                 </div>
             </div>
             <div>
                 <h2 class="text-white text-xl font-semibold mb-6">CATEGORIES</h2>
                 <div class="flex flex-wrap gap-2">
                     @foreach ($categories as $category)
                         <a class="bg-gray-700 dark:bg-gray-600 text-white px-3 py-1 rounded hover:bg-primary hover:text-gray-900 transition-colors"
                             href="{{ route('category.posts', $category->slug) }}">{{ $category->name }}</a>
                     @endforeach
                 </div>
             </div>
             <div>
                 <h2 class="text-white text-xl font-semibold mb-6">FLICKR PHOTOS</h2>
                 <div class="grid grid-cols-3 gap-2">
                     <a href="#"><img alt="Team meeting" class="rounded w-full h-auto"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuD66ot7YnQwir8cl4FRzQS_f5JUtzuh5c1-_YhPUtQ0zAa_0epIOMbPqYyeZexm9JrK-OJS5l7u0_0SRH1kIuwEbguq0rXdskT7WlRPy5Tje4Nj1AFbkw2f2Qzk-dyUI2ucLhebRDXS2GvC7UkSs9SOSP-DZoDuIYN-KesKZkjWyIAtPQY-hzV2i1A-9tp2nBns5dNq_uNYK2Qu9tXwT76HFseRriFqAvTaJbVATSsSLiWCq09pOcUw4L2jG1_kanjqpSOQ5tORDYc" /></a>
                     <a href="#"><img alt="Colleagues collaborating" class="rounded w-full h-auto"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuAxGxH-xD0ypqv_060NXJjyCI7zAKkGzKKY1Ja_qMlsDdmWHMMFRZYZbsjMqQrcZ8VsDKISbaQ8EvQpfjSWUSB9S5A_P7vhIidzttOA39l0VN8oe4dqVu5JfO-T0DdDsjAoBOkx0LFDBrWfcP2fFszk6J1VF1OyR6tFWZ6ePdSjkEVI_Nzg7LQSDpMKInA3CaZxu9qax5VjnZYVZ1NLr--HBx5-bbn__mQCGD2RFZVNymLR08GcLEufMOyAlJIU6VRElrlVmlFKk1M" /></a>
                     <a href="#"><img alt="Presentation in a meeting" class="rounded w-full h-auto"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuBkZNCae77B0WF5qiPvr7qCY8oMfb7vJ-hOPO5fyuGe_6TH0oshksWVLLiKcbsd5AFCX-7-TAn8Rnz8EQrU5WWoY-Mmmst7BCHuTdUXaelr4uZvbummKBAtuD85z_SMEFwnLAWMTnElKjWJdiRGcqr-smEFDUEZ4PwAynwiG4Z_L2-89bQvhw8GAhp9Vlb6ViBY4WDoqAg5kkkQSAL8K35FA3vNQ65L9R1aWF_7jr6tPZDguMyX9dUL7d7pBswjORYHW4g7xM6PKKA" /></a>
                     <a href="#"><img alt="Group discussion" class="rounded w-full h-auto"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuBeq3KEC2FcbE07gmzU6oYYJ5fTGpuLqTYe7OJwH48abAf4b-PNGUrN4WE45BAls0sitN01Z3vCicCsY-robRY3lzAfy5plzMzhbsN9H8rSc_UAel340F1S4OU2pyf7Ux5VUC2q4cTtQJ7kP6ydZ49Q5mBu9vOj3Tt9B9XucQh7_9FRpCa_7ygeO8kn3p6CLn_hF5bLDb2oIfBYdbYH2F2Gqc0MhflFP6WgwLniJLXTL93Gt0X3wTL7wGtnF9047v4L8QNuk4eY9C4" /></a>
                     <a href="#"><img alt="Team working on laptops" class="rounded w-full h-auto"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuDWMxGlKJ30SXCNwKPZLH2A_048Et-3EVbpTpk6rbQvDxjKEZU0MUYh7tOVTMmHmR0fJiM8zv9VzJiSI_XZJ6B8g0_ngKR0xK57gpZHlM8ZTnya9pVEPAg0lLWFo8676460IruhXj0gRUb5Yc2F9LApXZFcmpqWRjdqSyexxhMQjK5hA8k4cd1KnZeNIiOz96WG1_BwGYkvVHOfnoZcJ6_yhLTBTA9hXRHjQLYHFtWRgKTO91CvD7Zt8-kJf2WrIeUmVTZGIhJUsRE" /></a>
                     <a href="#"><img alt="Brainstorming session" class="rounded w-full h-auto"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuDuQnBN7ZoJfIgjNMkEe_tc9FK4lCGoxTpuGTWX9Erdqr59bUBDb9207KeMmbrYHPNPr-xOA7OYaDfJh1Xx8Q4HissrFgAmDQ8c60LR6646GBRVFhOJKjpbEcoTCIItSschTOAEApnF81o3wOez9Q54gqTX7UROnXD2BTCwKIr3_XfjmkK5p4pkzgizlSvCRPfouLiI-UCCdFTDSlZcqTiBDGDcc7J46gPEvc_V9gRZSiEehRpT0EdHvt4Ygf46Wyuq8gtctL8Kd0s" /></a>
                 </div>
             </div>
         </div>
         <div class="mt-12 py-6 border-t border-gray-700 dark:border-gray-600 text-center">
             <p class="text-sm text-gray-400">
                 © {{ date('Y') }}
                 <a class="text-primary hover:underline font-semibold" href="{{ url('/') }}">BERITA TERKINI</a>.
                 All Rights Reserved.
             </p>
         </div>

     </div>
 </footer>
