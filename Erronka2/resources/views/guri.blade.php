@extends('layout.plantilla')

@section('title', 'Index')

@section('content')

    <body>

        <div class="min-h-screen min-w-screen bg-cover bg-no-repeat bg-center flex items-center justify-center"
            style="background-image: url('storage/images/fondo16_9.png');">



            <section class="text-white w-4/5 px-10 py-8 rounded-lg ">
                <div class="mb-8">
                    <p class="text-xl font-semibold textwhite mb-4">Askotan egiten diren <span class="text-lime-500"> Galderak </span></p>
                </div>

                <div class="w-full">
                    <details
                        class=" rounded pt-3 pb-4 px-3 relative open:shadow-lg mb-2  bg-gray-400 bg-clip-padding backdrop-filter backdrop-blur-3xl bg-opacity-10 border border-gray-100">
                        <summary class="list-none font-semibold relative text-sm cursor-pointer pr-7 text-lime-500">Do I have
                            to allow
                            the use of cookies?
                            <div
                                class="absolute top-0 right-0 bg-slate-200 rounded-full px-1 py-0.5 cursor-pointer visible open:invisible">
                                <svg class="h-5 w-4 text-lime-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" strokeWidth="{1.5}" stroke="currentColor" className="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </div>
                        </summary>
                        <p class="text-xs pt-3 text-white">
                            Yes, in order to use My Page, you must allow the use of cookies in
                            your browser.<br /><br />
                            See also: What is a cookie and what does it do?
                        </p>
                    </details>
                    <details
                        class="rounded pt-3 pb-4 px-3 relative open:shadow-lg mb-2 bg-gray-400 bg-clip-padding backdrop-filter backdrop-blur-3xl bg-opacity-10 border border-gray-100">
                        <summary class="list-none font-semibold relative text-sm cursor-pointer pr-7 text-lime-500">How do I
                            change my
                            My Page Password?
                            <div
                                class="absolute top-0 right-0 bg-slate-200 rounded-full px-1 py-0.5 cursor-pointer visible open:invisible">
                                <svg class="h-5 w-4 text-lime-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" strokeWidth="{1.5}" stroke="currentColor" className="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </div>
                        </summary>
                        <p class="text-xs pt-3 text-white">
                            Yes, in order to use My Page, you must allow the use of cookies in
                            your browser.<br /><br />
                            See also: What is a cookie and what does it do?
                        </p>
                    </details>
                    <details
                        class=" rounded pt-3 pb-4 px-3 relative open:shadow-lg mb-2  bg-gray-400 bg-clip-padding backdrop-filter backdrop-blur-3xl bg-opacity-10 border border-gray-100">
                        <summary class="list-none font-semibold relative text-sm cursor-pointer pr-7 text-lime-500">What is
                            BankID?
                            <div
                                class="absolute top-0 right-0 bg-slate-200 rounded-full px-1 py-0.5 cursor-pointer visible open:invisible">
                                <svg class="h-5 w-4 text-lime-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" strokeWidth="{1.5}" stroke="currentColor" className="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </div>
                        </summary>
                        <p class="text-xs pt-3 text-white">
                            Yes, in order to use My Page, you must allow the use of cookies in
                            your browser.<br /><br />
                            See also: What is a cookie and what does it do?
                        </p>
                    </details>
                    <details
                        class="rounded pt-3 pb-4 px-3 relative open:shadow-lg mb-2  bg-gray-400 bg-clip-padding backdrop-filter backdrop-blur-3xl bg-opacity-10 border border-gray-100">
                        <summary class="list-none font-semibold relative text-sm cursor-pointer pr-7 text-lime-500">Whose
                            birth number
                            can I use?
                            <div
                                class="absolute top-0 right-0 bg-slate-200 rounded-full px-1 py-0.5 cursor-pointer visible open:invisible">
                                <svg class="h-5 w-4 text-lime-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" strokeWidth="{1.5}" stroke="currentColor" className="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </div>
                        </summary>
                        <p class="text-xs pt-3 text-white">
                            Yes, in order to use My Page, you must allow the use of cookies in
                            your browser.<br /><br />
                            See also: What is a cookie and what does it do?
                        </p>
                    </details>
                    <details
                        class="rounded pt-3 pb-4 px-3 relative open:shadow-lg mb-2  bg-gray-400 bg-clip-padding backdrop-filter backdrop-blur-3xl bg-opacity-10 border border-gray-100">
                        <summary class="list-none font-semibold relative text-sm cursor-pointer pr-7 text-lime-500">When do
                            I receive
                            a password ordered by letter?
                            <div
                                class="absolute top-0 right-0 bg-slate-200 rounded-full px-1 py-0.5 cursor-pointer visible open:invisible">
                                <svg class="h-5 w-4 text-lime-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" strokeWidth="{1.5}" stroke="currentColor" className="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </div>
                        </summary>
                        <p class="text-xs pt-3 text-white">
                            Yes, in order to use My Page, you must allow the use of cookies in
                            your browser.<br /><br />
                            See also: What is a cookie and what does it do?
                        </p>
                    </details>
                </div>
            </section>
            <!-- <div class="h-40 w-40 bg-pink-500"></div> -->
        </div>

    </body>
@endsection
