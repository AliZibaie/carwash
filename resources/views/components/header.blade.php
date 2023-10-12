<!-- Main navigation container -->
<nav
    class="flex-no-wrap relative flex w-full items-center justify-between bg-[#FBFBFB] py-2 shadow-md shadow-black/5 dark:bg-neutral-600 dark:shadow-black/10 lg:flex-wrap lg:justify-start lg:py-4">
    <div class="flex w-full flex-wrap items-center justify-between px-3">
        <!-- Hamburger button for mobile view -->
        <button
            class="block border-0 bg-transparent px-2 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"
            type="button"
            data-te-collapse-init
            data-te-target="#navbarSupportedContent1"
            aria-controls="navbarSupportedContent1"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <!-- Hamburger icon -->
            <span class="[&>svg]:w-7">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="h-7 w-7">
          <path
              fill-rule="evenodd"
              d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
              clip-rule="evenodd" />
        </svg>
      </span>
        </button>

        <!-- Collapsible navigation container -->
        <div
            class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
            id="navbarSupportedContent1"
            data-te-collapse-item>
            <!-- Logo -->
            <a
                class="mb-4 ml-2 mr-5 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0"
                href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 5q-.625 0-1.063-.438T10.5 3.5q0-.45.2-.8t.925-1.225q.15-.2.375-.2t.375.2q.725.875.925 1.225t.2.8q0 .625-.438 1.063T12 5ZM7 5q-.625 0-1.063-.438T5.5 3.5q0-.45.2-.8t.925-1.225q.15-.2.375-.2t.375.2Q8.1 2.35 8.3 2.7t.2.8q0 .625-.438 1.063T7 5Zm10 0q-.625 0-1.063-.438T15.5 3.5q0-.45.2-.8t.925-1.225q.15-.2.375-.2t.375.2q.725.875.925 1.225t.2.8q0 .625-.438 1.063T17 5ZM6 21v.5q0 .625-.438 1.063T4.5 23q-.625 0-1.063-.438T3 21.5v-7.15q0-.175.025-.35t.075-.325L4.975 8.35q.2-.6.725-.975T6.875 7h10.25q.65 0 1.175.375t.725.975l1.875 5.325q.05.15.075.325t.025.35v7.15q0 .625-.438 1.063T19.5 23q-.625 0-1.063-.438T18 21.5V21H6Zm-.2-9h12.4l-1.05-3H6.85L5.8 12Zm1.7 6q.625 0 1.063-.438T9 16.5q0-.625-.438-1.063T7.5 15q-.625 0-1.063.438T6 16.5q0 .625.438 1.063T7.5 18Zm9 0q.625 0 1.063-.438T18 16.5q0-.625-.438-1.063T16.5 15q-.625 0-1.063.438T15 16.5q0 .625.438 1.063T16.5 18Z"/></svg>
            </a>
            <!-- Left navigation links -->
            <ul
                class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row"
                data-te-navbar-nav-ref>
                <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                    <!-- Dashboard link -->
                    <a
                        class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                        href=""
                        data-te-nav-link-ref
                    >
                        Services
                    </a
                    >
                </li>
                @auth
                <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                    <!-- Dashboard link -->
                    <a
                        class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                        href=""
                        data-te-nav-link-ref
                    >
                        My services
                    </a
                    >
                </li>
                @endauth
            </ul>
        </div>

        <!-- Right elements -->
        <div class="relative flex items-center">


            <!-- Container with two dropdown menus -->
            <ul
                class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row"
                data-te-navbar-nav-ref>
                @auth
                    <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                        <!-- Dashboard link -->
                        <a
                            class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                            href="{{route('dashboard')}}"
                            data-te-nav-link-ref
                        >
                            dashboard
                        </a
                        >
                    </li>
                @endauth
                @guest
                    <!-- Login link -->
                    <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                        <a
                            class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                            href="{{route('login')}}"
                            data-te-nav-link-ref
                        >Login</a
                        >
                    </li>
                    <!-- Register link -->
                    <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                        <a
                            class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                            href="{{route('register')}}"
                            data-te-nav-link-ref
                        >Register</a
                        >
                    </li>
                @endguest

            </ul>


        </div>
    </div>
</nav>
