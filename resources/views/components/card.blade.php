<div
    class="mx-3 mt-6 flex flex-col rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 sm:shrink-0 sm:grow sm:basis-0">
    <a href="@yield('image')">
        <img
            class="rounded-t-lg"
            src="https://tecdn.b-cdn.net/img/new/standard/city/044.webp"
            alt="Skyscrapers" />
    </a>
    <div class="p-6">
        <h5
            class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
            @yield('name')
        </h5>
        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
            @yield('description')
        </p>
    </div>
    <div
        class="mt-auto border-t-2 border-neutral-100 px-6 py-3 text-center dark:border-neutral-600 dark:text-neutral-50">
        <form action="">
            <select name="" id="">
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
            <button type="submit">Reserve</button>
        </form>
    </div>
</div>
