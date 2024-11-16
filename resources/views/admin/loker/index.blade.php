@extends('admin.layouts.main')

@section('container')
    @include('admin.dashboard._header')
    <div class="pt-20">
        <div
            class="p-4 bg-white block sm:flex items-center justify-between border-1px shadow-xl border-gray-300 rounded-xl border-[2px] lg:mt-1.5 lg:mb-7">
            <div class="w-full mb-1">
                <div class="mb-4">
                    <nav class="flex mb-5" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                            <a href="#" class="inline-flex items-center text-gray-700 hover:text-primary-600">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Home
                            </a>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <a href="#" class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2">Loker</a>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2 " aria-current="page">List</span>
                            </div>
                        </ol>
                    </nav>
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl capitalize">data loker</h1>
                </div>
                <div class="md:flex">
                    <div class="items-center mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0">
                        <form class="lg:pr-3" action="#" method="GET">
                            <label for="users-search" class="sr-only">Search</label>
                            <div class="flex flex-col sm:flex-row gap-2 md:gap-x-4">
                                <div class="relative mt-1 lg:w-64 xl:w-96">
                                    <input type="text" name="email" id="users-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                        placeholder="Cari Loker">
                                </div>
                                <div class="flex gap-2">
                                    <!-- Tombol Search -->
                                    <button type="submit" class="border-2 bg-blue-600 hover:bg-blue-800 rounded-lg">
                                        <h1 class="py-1 px-3 text-white font-semibold">
                                            Search
                                        </h1>
                                    </button>

                                    <!-- Tombol Undo -->
                                    <button type="submit" class="border-2 bg-red-600 hover:bg-red-800 rounded-lg">
                                        <h1 class="py-1 px-3 text-white font-semibold">
                                            Undo
                                        </h1>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                        <a href="/vacancy/add"
                            class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-semibold text-center text-white bg-blue-600 border border-gray-300 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-primary-300 sm:w-auto ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 mr-2 -ml-1"
                                fill="currentColor">
                                <path
                                    d="M15 4H5V20H19V8H15V4ZM3 2.9918C3 2.44405 3.44749 2 3.9985 2H16L20.9997 7L21 20.9925C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918ZM11 11V8H13V11H16V13H13V16H11V13H8V11H11Z">
                                </path>
                            </svg>
                            Tambah
                        </a>
                        <a href="#"
                            class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-semibold text-center text-white bg-green-600 border border-gray-300 rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-primary-300 sm:w-auto ">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Export
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-4 bg-white rounded-2xl shadow-xl">
            <div class="font-[sans-serif] overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100 whitespace-nowrap">
                        <tr>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                No
                            </th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Loker
                            </th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Lokasi
                            </th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Level
                            </th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                tanggal posting
                            </th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Job Desc dan Kualifikasi
                            </th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200 whitespace-nowrap">
                        @foreach ($data as $no => $item)
                            <tr>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    {{ $no + 1 }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800 capitalize">
                                    {{ $item->title }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800 capitalize">
                                    {{ $item->cabang }}, {{ $item->provinsi }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800 capitalize">
                                    {{ $item->level }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800 capitalize">
                                    {{ \Carbon\Carbon::parse($item->posting_date)->format('d M Y') }} sampai
                                    {{ \Carbon\Carbon::parse($item->closing_date)->format('d M Y') }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    <button type="button"
                                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                        aria-haspopup="dialog{{ $no }}" aria-expanded="false"
                                        aria-controls="hs-scroll-inside-body-modal{{ $no }}"
                                        data-hs-overlay="#hs-scroll-inside-body-modal{{ $no }}">
                                        Scroll inside body
                                    </button>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    <button class="text-blue-600 mr-4">Edit</button>
                                    <button class="text-red-600">Delete</button>
                                </td>
                            </tr>

                            @foreach ($data as $lihat => $semua)

                            @endforeach
                            <div id="hs-scroll-inside-body-modal{{ $lihat }}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scroll-inside-body-modal-label{{ $lihat }}">
                                <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 h-[calc(100%-3.5rem)] sm:mx-auto">
                                  <div class="max-h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                                    <div class="flex justify-between items-center py-3 px-4 border-b ">
                                      <h3 id="hs-scroll-inside-body-modal-label" class="font-bold text-gray-800 ">
                                        Lihat Job desc dan Kualifikasi
                                      </h3>
                                      <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none " aria-label="Close" data-hs-overlay="#hs-scroll-inside-body-modal">
                                        <span class="sr-only">Close</span>
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                          <path d="M18 6 6 18"></path>
                                          <path d="m6 6 12 12"></path>
                                        </svg>
                                      </button>
                                    </div>
                                    <div class="p-4 overflow-y-auto">
                                      <div class="space-y-4">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-800">Job Desc</h3>
                                            @foreach ($jobDescriptions as $description)
                                                <li class="mt-1 text-gray-800">{{ $description }}</li>
                                            @endforeach
                                        </div>

                                        <div>
                                          <h3 class="text-lg font-semibold text-gray-800 ">Be optimistic</h3>
                                          <p class="mt-1 text-gray-800 ">
                                            Focusing on the details gives people confidence in our products. Weave a consistent story across our fabric and be diligent about vocabulary across all messaging by being brand conscious across products to create a seamless flow across all the things. Let people know that they can jump in and start working expecting to find a dependable experience across all the things. Keep teams in the loop about what is happening by informing them of relevant features, products and opportunities for success. Be on the journey with them and highlight the key points that will help them the most - right now. Be in the moment by focusing attention on the important bits first.
                                          </p>
                                        </div>

                                        <div>
                                          <h3 class="text-lg font-semibold text-gray-800 ">Be practical, with a wink</h3>
                                          <p class="mt-1 text-gray-800 ">
                                            Keep our own story short and give teams just enough to get moving. Get to the point and be direct. Be concise - we tell the story of how we can help, but we do it directly and with purpose. Be on the lookout for opportunities and be quick to offer a helping hand. At the same time realize that nobody likes a nosy neighbor. Give the user just enough to know that something awesome is around the corner and then get out of the way. Write clear, accurate, and concise text that makes interfaces more usable and consistent - and builds trust. We strive to write text that is understandable by anyone, anywhere, regardless of their culture or language so that everyone feels they are part of the team.
                                          </p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                                      <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-scroll-inside-body-modal">
                                        Close
                                      </button>

                                    </div>
                                  </div>
                                </div>
                              </div>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection
