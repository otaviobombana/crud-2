<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body class="min-h-screen flex bg-white dark:bg-zinc-800 text-zinc-900 dark:text-zinc-100">
        <!-- SIDEBAR -->
        <flux:sidebar 
            sticky 
            stashable 
            class="w-64 border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 flex-shrink-0">

            <!-- Toggle (mobile) -->
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <!-- LOGO -->
            <div class="p-4 border-b border-zinc-200 dark:border-zinc-700">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                    <x-app-logo />
                    <span class="text-lg font-semibold">Sistema</span>
                </a>
            </div>

            <!-- NAVIGATION -->
            <flux:navlist variant="outline" class="mt-4">
                <flux:navlist.group :heading="__('Menu Principal')" class="grid gap-1">

                    <flux:navlist.item 
                        icon="home" 
                        :href="route('dashboard')" 
                        :current="request()->routeIs('dashboard')" 
                        wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:navlist.item>

                    <flux:navlist.item 
                        icon="list-bullet" 
                        :href="route('categorias.index')" 
                        :current="request()->routeIs('categorias.*')" 
                        wire:navigate>
                        {{ __('Categorias') }}
                    </flux:navlist.item>

                    <flux:navlist.item 
                        icon="users" 
                        :href="route('clientes.index')" 
                        :current="request()->routeIs('clientes.*')" 
                        wire:navigate>
                        {{ __('Clientes') }}
                    </flux:navlist.item>

                    <flux:navlist.item 
                        icon="truck" 
                        :href="route('fornecedores.index')" 
                        :current="request()->routeIs('fornecedores.*')" 
                        wire:navigate>
                        {{ __('Fornecedores') }}
                    </flux:navlist.item>

                    <flux:navlist.item 
                        icon="banknotes" 
                        :href="route('vendas.index')" 
                        :current="request()->routeIs('vendas.*')" 
                        wire:navigate>
                        {{ __('Vendas') }}
                    </flux:navlist.item>

                    <flux:navlist.item 
                        icon="shopping-bag" 
                        :href="route('produtos.index')" 
                        :current="request()->routeIs('produtos.*')" 
                        wire:navigate>
                        {{ __('Produtos') }}
                    </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />
        </flux:sidebar>

        <!-- MAIN CONTENT -->
        <main class="flex-1 p-6 overflow-y-auto">
            {{ $slot }}
        </main>

        @fluxScripts
    </body>
</html>
