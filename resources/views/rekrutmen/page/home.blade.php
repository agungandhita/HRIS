@extends('rekrutmen.layouts.main')

@section('container')
<div class="bg-white text-black text-[15px]">
    <div class="px-4 sm:px-10 mt-1">
      @include('rekrutmen.page._jumbotron')
      <div class="mt-8 bg-gray-50 px-4 sm:px-10 py-12">
        <div class="max-w-7xl mx-auto">
          <div class="md:text-center max-w-2xl mx-auto">
            <h2 class="md:text-4xl text-3xl font-bold mb-6">Discover Our Exclusive Features</h2>
            <p>Unlock a world of possibilities with our exclusive features. Explore how our unique offerings can
              transform your hallo and empower you to achieve more.</p>
          </div>
          @include('rekrutmen.page._hero')
        </div>
      </div>

      <div class="mt-28">
        <div class="md:text-center max-w-2xl mx-auto">
          <h2 class="md:text-4xl text-3xl font-bold mb-6">Explore Our Unique Offerings</h2>
          <p>Discover a range of exclusive features designed to elevate your experience. Learn how our distinct
            offerings can redefine your journey and empower you to accomplish more.</p>
        </div>
        <div class="mt-14">
          <div class="grid md:grid-cols-2 items-center gap-16">
            <div>
              <img src="https://readymadeui.com/image-1.webp"
                class="w-full object-contain rounded-md shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]" />
            </div>
            <div class="max-w-lg">
              <h3 class="text-xl font-semibold mb-4">Tailored Customization</h3>
              <p>Experience unparalleled customization options tailored to suit your unique needs. Our platform provides
                a wide array of features, ensuring you have the flexibility to personalize your journey.</p>
              <button type="button"
                class="bg-yellow-400 hover:bg-yellow-600 text-white rounded-full px-5 py-2.5 mt-8 transition-all">
                Learn More
              </button>
            </div>
            <div class="max-md:order-1 max-w-lg">
              <h3 class="text-xl font-semibold mb-4">Optimized Performance</h3>
              <p>Unlock top-notch performance with our advanced optimization techniques. We prioritize speed,
                efficiency, and reliability to ensure a seamless experience, no matter the complexity of your tasks.</p>
              <button type="button"
                class="bg-yellow-400 hover:bg-yellow-600 text-white rounded-full px-5 py-2.5 mt-8 transition-all">
                Learn More
              </button>
            </div>
            <div>
              <img src="https://readymadeui.com/contact.webp"
                class="w-full object-contain rounded-md shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]" />
            </div>
          </div>
        </div>
      </div>

      <div class="mt-28 bg-gray-50 px-4 sm:px-10 py-12">
        <div class="max-w-7xl max-md:max-w-lg mx-auto">
          <h2 class="md:text-4xl text-3xl font-bold md:text-center mb-14">Our Latest Blogs</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-14">
            <div class="bg-white cursor-pointer rounded-md overflow-hidden group shadow-best">
              <div class="relative overflow-hidden">
                <img src="https://readymadeui.com/Imagination.webp" alt="Blog Post 1"
                  class="w-full h-60 object-cover group-hover:scale-125 transition-all duration-300" />
                <div class="px-4 py-2.5 text-white bg-yellow-400 absolute bottom-0 right-0 rounded-tl-2xl">June 10, 2023</div>
              </div>
              <div class="p-6">
                <h3 class="text-xl font-semibold line-clamp-1">A Guide to Igniting Your Imagination</h3>
                <button type="button"
                  class="bg-yellow-400 hover:bg-yellow-700 text-white rounded-xl px-5 py-2.5 mt-6 transition-all">Read
                  More</button>
              </div>
            </div>
            <div class="bg-white cursor-pointer rounded-md overflow-hidden group shadow-best">
              <div class="relative overflow-hidden">
                <img src="https://readymadeui.com/hacks-watch.webp" alt="Blog Post 2"
                  class="w-full h-60 object-cover group-hover:scale-125 transition-all duration-300" />
                <div class="px-4 py-2.5 text-white bg-yellow-400 absolute bottom-0 right-0 rounded-tl-2xl">April 20, 2023</div>
              </div>
              <div class="p-6">
                <h3 class="text-xl font-semibold line-clamp-1">Hacks to Supercharge Your Day</h3>
                <button type="button"
                  class="bg-yellow-400 hover:bg-yellow-700 text-white rounded-xl px-5 py-2.5 mt-6 transition-all">Read
                  More</button>
              </div>
            </div>
            <div class="bg-white cursor-pointer rounded-md overflow-hidden group shadow-best">
              <div class="relative overflow-hidden">
                <img src="https://readymadeui.com/prediction.webp" alt="Blog Post 3"
                  class="w-full h-60 object-cover group-hover:scale-125 transition-all duration-300" />
                <div class="px-4 py-2.5 text-white bg-yellow-400 absolute bottom-0 right-0 rounded-tl-2xl">August 16, 2023</div>
              </div>
              <div class="p-6">
                <h3 class="text-xl font-semibold line-clamp-1">Trends and Predictions</h3>
                <button type="button"
                  class="bg-yellow-400 hover:bg-yellow-700 text-white rounded-xl px-5 py-2.5 mt-6 transition-all">Read
                  More</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- <div class="mt-28">
        <div class="grid md:grid-cols-2 justify-center items-center gap-10">
          <div>
            <h2 class="md:text-4xl text-3xl font-bold mb-6">Unlock Premium Features</h2>
            <p>Veniam proident aute magna anim excepteur et ex consectetur velit ullamco veniam minim aute sit. Elit
              occaecat officia et laboris Lorem minim. Officia do aliqua adipisicing ullamco in.</p>
            <button type="button"
              class="bg-blue-600 hover:bg-blue-700 text-white rounded-full px-5 py-2.5 mt-6 transition-all">
              Upgrade Now
            </button>
          </div>
          <div class="text-center">
            <img src="https://readymadeui.com/login-image.webp" alt="Premium Benefits" class="w-full mx-auto" />
          </div>
        </div>
      </div> --}}

 

      <div class="mt-28 bg-gray-50 px-4 sm:px-10 py-12">
        <h1 class="text-center mb-8 font-semibold text-4xl ">
          Testimonial
        </h1>
        <div class="max-w-6xl mx-auto">
          <div class="grid md:grid-cols-2 items-center gap-8">
            <div class="space-y-6 bg-gray-100 rounded-md p-6 max-w-md max-md:order-1">
              <div class="flex sm:items-center max-sm:flex-col-reverse">
                <div class="mr-3">
                  <h4 class="text-base font-semibold">John Doe</h4>
                  <p class="mt-2">Veniam proident aute magna anim excepteur et ex consectetur velit ullamco veniam minim
                    aute sit.</p>
                </div>
                <img src='https://readymadeui.com/profile_2.webp' class="w-16 h-16 rounded-full max-sm:mb-2" />
              </div>
              <div
                class="flex sm:items-center max-sm:flex-col-reverse p-6 relative lg:left-12 bg-white shadow-[0_2px_20px_-4px_rgba(93,96,127,0.2)] rounded-md">
                <div class="mr-3">
                  <h4 class="text-base font-semibold">Mark Adair</h4>
                  <p class="mt-2">Veniam proident aute magna anim excepteur et ex consectetur velit ullamco veniam minim
                    aute sit.</p>
                </div>
                <img src='https://readymadeui.com/profile_3.webp' class="w-16 h-16 rounded-full max-sm:mb-2" />
              </div>
              <div class="flex sm:items-center max-sm:flex-col-reverse">
                <div class="mr-3">
                  <h4 class="text-base font-semibold">Simon Konecki</h4>
                  <p class="mt-2">Veniam proident aute magna anim excepteur et ex consectetur velit ullamco veniam minim
                    aute sit.</p>
                </div>
                <img src='https://readymadeui.com/profile_4.webp' class="w-16 h-16 rounded-full max-sm:mb-2" />
              </div>
            </div>
            <div>
              <h2 class="md:text-4xl text-3xl font-bold">We are loyal with our customer</h2>
              <div class="mt-4">
                <p>Veniam proident aute magna anim excepteur et ex consectetur velit ullamco veniam minim aute sit. Elit
                  occaecat officia et laboris Lorem minim. Officia do aliqua adipisicing ullamco in.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- <div class="mt-28">
        <h2 class="md:text-4xl text-3xl font-bold text-center mb-14">Application Metrics</h2>
        <div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-6 max-lg:gap-12">
          <div class="text-center">
            <h3 class="text-4xl font-semibold">5.4<span class="text-blue-600">M+</span></h3>
            <p class="text-base font-semibold mt-4">Total Users</p>
            <p class="mt-2">The total number of registered users on the platform.</p>
          </div>
          <div class="text-center">
            <h3 class="text-4xl font-semibold">$80<span class="text-blue-600">K</span></h3>
            <p class="text-base font-semibold mt-4">Revenue</p>
            <p class="mt-2">The total revenue generated by the application.</p>
          </div>
          <div class="text-center">
            <h3 class="text-4xl font-semibold">100<span class="text-blue-600">K</span></h3>
            <p class="text-base font-semibold mt-4">Engagement</p>
            <p class="mt-2">The level of user engagement with the application's content and features.</p>
          </div>
          <div class="text-center">
            <h3 class="text-4xl font-semibold">99.9<span class="text-blue-600">%</span></h3>
            <p class="text-base font-semibold mt-4">Server Uptime</p>
            <p class="mt-2">The percentage of time the server has been operational and available.</p>
          </div>
        </div>
      </div> --}}

      <div class="mt-28 bg-gray-50 px-4 sm:px-10 py-12 space-y-6">
        <div class="md:text-center max-w-2xl mx-auto mb-14">
          <h2 class="md:text-4xl text-3xl font-bold mb-6">Frequently Asked Questions</h2>
          <p>Explore common questions and find answers to help you make the most out of our services. If you don't see
            your question here, feel free to contact us for assistance.</p>
        </div>
        <div class="shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border-2 border-yellow-400 rounded-md transition-all"
          role="accordion">
          <button type="button" class="w-full font-semibold text-left py-5 px-6 flex items-center">
            <span class="text-base mr-4">Are there any special discounts or promotions available during the
              event.</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current ml-auto shrink-0 rotate-180"
              viewBox="0 0 24 24">
              <path fill-rule="evenodd"
                d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z"
                clip-rule="evenodd" data-original="#000000"></path>
            </svg>
          </button>
          <div class="pb-5 px-6">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor auctor arcu,
              at fermentum dui. Maecenas
              vestibulum a turpis in lacinia. Proin aliquam turpis at erat venenatis malesuada. Sed semper, justo vitae
              consequat fermentum, felis diam posuere ante, sed fermentum quam justo in dui. Nulla facilisi. Nulla
              aliquam
              auctor purus, vitae dictum dolor sollicitudin vitae. Sed bibendum purus in efficitur consequat. Fusce et
              tincidunt arcu. Curabitur ac lacus lectus. Morbi congue facilisis sapien, a semper orci facilisis in.
            </p>
          </div>
        </div>
        <div
          class="shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border-2 border-transparent hover:border-yellow-400 rounded-md transition-all"
          role="accordion">
          <button type="button" class="w-full font-semibold text-left py-5 px-6 flex items-center">
            <span class="text-base mr-4">What are the dates and locations for the product launch events?</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current ml-auto shrink-0 -rotate-90"
              viewBox="0 0 24 24">
              <path fill-rule="evenodd"
                d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z"
                clip-rule="evenodd" data-original="#000000"></path>
            </svg>
          </button>
          <div class="hidden pb-5 px-6">
            <p>Content</p>
          </div>
        </div>
        <div
          class="shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border-2 border-transparent hover:border-yellow-400 rounded-md transition-all"
          role="accordion">
          <button type="button" class="w-full font-semibold text-left py-5 px-6 flex items-center">
            <span class="text-base mr-4">Can I bring a guest with me to the product launch event?</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current ml-auto shrink-0 -rotate-90"
              viewBox="0 0 24 24">
              <path fill-rule="evenodd"
                d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z"
                clip-rule="evenodd" data-original="#000000"></path>
            </svg>
          </button>
          <div class="hidden pb-5 px-6">
            <p>Content</p>
          </div>
        </div>
        <div
          class="shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border-2 border-transparent hover:border-yellow-400 rounded-md transition-all"
          role="accordion">
          <button type="button" class="w-full font-semibold text-left py-5 px-6 flex items-center">
            <span class="text-base mr-4">How can I contact customer support?</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current ml-auto shrink-0 -rotate-90"
              viewBox="0 0 24 24">
              <path fill-rule="evenodd"
                d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z"
                clip-rule="evenodd" data-original="#000000"></path>
            </svg>
          </button>
          <div class="hidden pb-5 px-6">
            <p>Content</p>
          </div>
        </div>
        <div
          class="shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border-2 border-transparent hover:border-yellow-400 rounded-md transition-all"
          role="accordion">
          <button type="button" class="w-full font-semibold text-left py-5 px-6 flex items-center">
            <span class="text-base mr-4">What payment methods do you accept?</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current ml-auto shrink-0 -rotate-90"
              viewBox="0 0 24 24">
              <path fill-rule="evenodd"
                d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z"
                clip-rule="evenodd" data-original="#000000"></path>
            </svg>
          </button>
          <div class="hidden pb-5 px-6">
            <p>Content</p>
          </div>
        </div>
      </div>
    </div>

    <footer class="bg-gray-50 px-4 sm:px-10 py-12 mt-16">
      {{-- <div class="md:max-w-[50%] mx-auto text-center">
        <div class="bg-[#fff] border flex px-2 py-1 rounded-full text-left mt-4">
          <input type='email' placeholder='Enter your email' class="w-full outline-none bg-transparent pl-4" />
          <button type='button'
            class="bg-blue-600 hover:bg-blue-700 text-white rounded-full px-5 py-2.5 transition-all">Subscribe</button>
        </div>
      </div> --}}
      <div class="grid max-sm:grid-cols-1 max-xl:grid-cols-2 xl:grid-cols-5 gap-8 border-t border-gray-300 mt-10 pt-8">
        <div class="xl:col-span-2">
          <h4 class="text-xl font-semibold mb-6">Disclaimer</h4>
          <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean gravida,
            mi eu pulvinar cursus, sem elit interdum mauris.</p>
        </div>
        <div>
          <h4 class="text-xl font-semibold mb-6">Services</h4>
          <ul class="space-y-4">
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Web
                Development</a></li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Mobile App
                Development</a></li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">UI/UX
                Design</a></li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Digital Marketing</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-xl font-semibold mb-6">Resources</h4>
          <ul class="space-y-4">
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Webinars</a>
            </li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Ebooks</a>
            </li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Templates</a>
            </li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Tutorials</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-xl font-semibold mb-4">About Us</h4>
          <ul class="space-y-4">
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Our Story</a>
            </li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Mission and
                Values</a></li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Team</a></li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Testimonials</a></li>
          </ul>
        </div>
      </div>
      <p class='mt-10'>© 2024<a href='https://readymadeui.com/' target='_blank'
          class="hover:underline mx-1">Andhii</a>All Rights Reserved.</p>
    </footer>

  </div>

 

@endsection