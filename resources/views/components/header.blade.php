<header class="sticky top-0 z-10 w-full backdrop-blur-sm supports-backdrop-filter:bg-background/60 bg-background/95">
    <div class="lg:px-10 flex h-14 max-w-(--breakpoint-2xl) items-center">
        <div class="mr-4 hidden md:flex">
            <a href="{{route('home')}}"
                class="mr-6 flex no-underline items-center space-x-2 font-bold">{{config("app.name")}}</a>
            <nav class="flex items-center gap-4 text-sm lg:gap-6">
                <x-link href="{{'/docs/' . config('aui.latest-version')}}">Docs</x-link>
                <x-link href="{{'/docs/' . config('aui.latest-version').'/components/accordion'}}">Components</x-link>
            </nav>
        </div>
        <div x-data="{searchOpened: false}" class="flex flex-1 items-center justify-between space-x-2 md:justify-end">
            <april:sheet dismissable x-teleport="body">
                <slot:trigger>
                    <april:button aria-label="Open Menu" class="justify-center md:hidden" size="icon" variant="ghost">
                        <svg stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5">
                            <path d="M3 5H11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M3 12H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M3 19H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </april:button>
                </slot:trigger>
                <slot:content side="left" class="overflow-scroll beautify-scrollbar">
                    <a href="{{route('home')}}"
                        class="mr-6 flex no-underline items-center space-x-2 font-bold">{{config("app.name")}}</a>
                    <x-link class="block my-2 hover:no-underline"
                        href="{{'/docs/' . config('aui.latest-version')}}">Docs</x-link>
                    <x-link class="block hover:no-underline"
                        href="{{'/docs/' . config('aui.latest-version').'/components/accordion'}}">Components</x-link>
                    <x-menu />
                    <april:sheet-footer />
                </slot:content>
            </april:sheet>
            <april:command-dialog @keydown.window.cmd.k.prevent="searchOpened = true"
                @keydown.window.ctrl.k.prevent="searchOpened = true" x-teleport="body" x-model="searchOpened">
                <slot:group class="w-full flex-1 md:w-auto md:flex-none"></slot:group>
                <slot:trigger class="w-full">
                    <april:button aria-label="Open Search" size="sm" variant="outline"
                        class="text-muted-foreground bg-muted/50 w-full flex relative justify-between items-center">
                        <span>
                            Search<span class="hidden lg:inline"> Documentation</span>...
                        </span>
                        <kbd
                            class="pointer-events-none hidden h-5 select-none items-center gap-x-1 rounded border bg-muted px-1.5 font-mono text-[10px] font-medium opacity-100 sm:flex">
                            <span class="text-xs">⌘</span>K
                        </kbd>
                    </april:button>
                </slot:trigger>
                <april:command>
                    <slot:input placeholder="Type a command or search..."></slot:input>
                    <slot:empty>No results found.</slot:empty>
                    <slot:list>
                        <april:command-group heading="Menu">
                            @foreach ($links as $link)
                            @isset($link['href'])
                            <april:command-item @click="Alpine.navigate('{{$link['href']}}')">
                                <i class="fa-regular fa-file"></i>
                                <span>{{$link['text']}}</span>
                            </april:command-item>
                            @endisset
                            @endforeach
                        </april:command-group>
                        <april:command-group heading="Theme">
                            <april:command-item x-on:click="localStorage.theme = 'light'; determineColorMode()">
                                <i class="fa-regular fa-sun"></i>
                                <span>Light</span>
                            </april:command-item>
                            <april:command-item x-on:click="localStorage.theme = 'dark'; determineColorMode()">
                                <i class="fa-regular fa-moon"></i>
                                <span>Dark</span>
                            </april:command-item>
                            <april:command-item x-on:click="localStorage.removeItem('theme'); determineColorMode()">
                                <i class="fas fa-laptop"></i>
                                <span>System</span>
                            </april:command-item>
                        </april:command-group>
                    </slot:list>
                </april:command>
            </april:command-dialog>
            <nav class="flex items-center">
                <a target="_blank" rel="noreferrer" href="https://github.com/yungifez/april-ui">
                    <div
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-hidden focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 py-2 w-9 px-0">
                        <i class="fa-brands fa-github"></i>
                        <span class="sr-only">GitHub</span>
                    </div>
                </a>
                <a target="_blank" rel="noreferrer" href="http://x.com/yungifez">
                    <div
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-hidden focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 py-2 w-9 px-0">
                        <i class="fa-brands fa-x-twitter"></i>
                        <span class="sr-only">Twitter</span>
                    </div>
                </a>
                <april:dropdown-menu>
                    <slot:trigger>
                        <april:button aria-label="open theme selection" class="justify-center" size="icon"
                            variant="ghost" type="button">
                            <i class="dark:hidden fa fa-sun"></i>
                            <i class="hidden dark:block fas fa-moon"></i>
                        </april:button>
                    </slot:trigger>
                    <slot:content class="w-40">
                        <april:dropdown-menu-item aria-label="Select light theme" size="sm" type="button"
                            class="w-full focus-visible:outline-hidden"
                            x-on:click="localStorage.theme = 'light'; determineColorMode()">
                            <p class="text-sm">Light</p>
                        </april:dropdown-menu-item>
                        <april:dropdown-menu-item aria-label="Select dark theme" size="sm" type="button"
                            class="w-full focus-visible:outline-hidden"
                            x-on:click="localStorage.theme = 'dark'; determineColorMode()">
                            <p class="text-sm">Dark</p>
                        </april:dropdown-menu-item>
                        <april:dropdown-menu-item aria-label="Set theme based on system preference" size="sm"
                            type="button" class="w-full focus-visible:outline-hidden"
                            x-on:click="localStorage.removeItem('theme'); determineColorMode()">
                            <p class="text-sm">System</p>
                        </april:dropdown-menu-item>
                    </slot:content>
                </april:dropdown-menu>
            </nav>
        </div>
    </div>
</header>
