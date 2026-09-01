@php($docsVersion = $currentDocsVersion ?? config('aui.latest-version'))

<header class="sticky top-0 z-10 w-full backdrop-blur-sm supports-backdrop-filter:bg-background/60 bg-background/95">
    <div class="px-2 lg:px-10 flex h-14 mx-auto items-center">
        <div class="mr-4 hidden md:flex">
            <a href="{{route('home')}}"
                class="mr-6 flex no-underline items-center gap-2 font-bold"><span class="flex size-7 items-center justify-center rounded-md bg-primary text-xs text-primary-foreground">A</span><span>April UI</span></a>
            <nav class="flex items-center gap-4 text-sm lg:gap-6">
                <x-link href="{{'/docs/' . $docsVersion}}">Docs</x-link>
                <x-link href="{{'/docs/' . $docsVersion.'/components/accordion'}}">Components</x-link>
                <x-link href="/examples">Examples</x-link>
                <x-link href="{{route('blocks')}}">Blocks</x-link>
                <x-link href="{{route('customize')}}">Customize</x-link>
            </nav>
        </div>
        <div x-data="{searchOpened: false}" class="flex flex-1 items-center justify-between space-x-2 md:justify-end">
            <april:sheet dismissable x-teleport="body">
                <slot:trigger>
                    <april:button aria-label="Open Menu" class="justify-center md:hidden" size="icon" variant="ghost">
                        <x-lucide-menu class="h-5 w-5" />
                    </april:button>
                </slot:trigger>
                <slot:content side="left" class="overflow-scroll beautify-scrollbar">
                    <a href="{{route('home')}}"
                        class="mr-6 flex no-underline items-center gap-2 font-bold"><span class="flex size-7 items-center justify-center rounded-md bg-primary text-xs text-primary-foreground">A</span><span>April UI</span></a>
                    <x-link class="block my-2 hover:no-underline"
                        href="{{'/docs/' . $docsVersion}}">Docs</x-link>
                    <x-link class="block hover:no-underline"
                        href="{{'/docs/' . $docsVersion.'/components/accordion'}}">Components</x-link>
                    <x-link class="block hover:no-underline" href="/examples">Examples</x-link>
                    <x-link class="block hover:no-underline" href="{{route('blocks')}}">Blocks</x-link>
                    <x-link class="block hover:no-underline" href="{{route('customize')}}">Customize</x-link>
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
                            @if (isset($link['href']) && !str_starts_with($link['href'], '/docs/'))
                            <april:command-item @click="Alpine.navigate('{{$link['href']}}')">
                                <x-lucide-file class="mr-2 h-4 w-4" />
                                <span>{{$link['text']}}</span>
                            </april:command-item>
                            @endif
                            @endforeach
                        </april:command-group>
                        <april:command-group heading="Documentation">
                            @foreach ($searchIndex as $page)
                                <april:command-item data-search="{{$page['search']}}" @click="Alpine.navigate('{{$page['url']}}')">
                                    <x-lucide-file-text class="mr-2 h-4 w-4 shrink-0" />
                                    <span class="min-w-0"><span class="block truncate">{{$page['title']}}</span><span class="block truncate text-xs text-muted-foreground">{{$page['description']}}</span></span>
                                </april:command-item>
                            @endforeach
                        </april:command-group>
                        <april:command-group heading="Theme">
                            <april:command-item x-on:click="setAprilTheme('light')">
                                <x-lucide-sun class="mr-2 h-4 w-4" />
                                <span>Light</span>
                            </april:command-item>
                            <april:command-item x-on:click="setAprilTheme('dark')">
                                <x-lucide-moon class="mr-2 h-4 w-4" />
                                <span>Dark</span>
                            </april:command-item>
                            <april:command-item x-on:click="setAprilTheme('system')">
                                <x-lucide-monitor class="mr-2 h-4 w-4" />
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
                        <x-lucide-github class="h-4 w-4" />
                        <span class="sr-only">GitHub</span>
                    </div>
                </a>
                <a target="_blank" rel="noreferrer" href="http://x.com/yungifez">
                    <div
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-hidden focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 py-2 w-9 px-0">
                        <x-lucide-at-sign class="h-4 w-4" />
                        <span class="sr-only">Twitter</span>
                    </div>
                </a>
                <april:dropdown-menu>
                    <slot:trigger>
                        <april:button aria-label="open theme selection" class="justify-center" size="icon"
                            variant="ghost" type="button">
                            <x-lucide-sun class="h-4 w-4 dark:hidden" />
                            <x-lucide-moon class="hidden h-4 w-4 dark:block" />
                        </april:button>
                    </slot:trigger>
                    <slot:content class="w-40">
                        <april:dropdown-menu-item aria-label="Select light theme" size="sm" type="button"
                            class="w-full justify-left focus-visible:outline-hidden" x-on:click="setAprilTheme('light')">
                            <x-lucide-sun class="mr-2 h-4 w-4" />
                            <p class="text-sm">Light</p>
                        </april:dropdown-menu-item>
                        <april:dropdown-menu-item aria-label="Select dark theme" size="sm" type="button"
                            class="w-full justify-left focus-visible:outline-hidden" x-on:click="setAprilTheme('dark')">
                            <x-lucide-moon class="mr-2 h-4 w-4" />
                            <p class="text-sm">Dark</p>
                        </april:dropdown-menu-item>
                        <april:dropdown-menu-item aria-label="Set theme based on system preference" size="sm"
                            type="button" class="w-full justify-left focus-visible:outline-hidden"
                            x-on:click="setAprilTheme('system')">
                            <x-lucide-monitor class="mr-2 h-4 w-4" />
                            <p class="text-sm">System</p>
                        </april:dropdown-menu-item>
                    </slot:content>
                </april:dropdown-menu>
            </nav>
        </div>
    </div>
</header>
