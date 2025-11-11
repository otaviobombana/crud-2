<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">

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
                        {{ __('CATEGORIAS') }}
                    </flux:navlist.item>

                    <flux:navlist.item 
                        icon="users" 
                        :href="route('clientes.index')" 
                        :current="request()->routeIs('clientes.*')" 
                        wire:navigate>
                        {{ __('CLIENTES') }}
                    </flux:navlist.item>

                    <flux:navlist.item 
                        icon="truck" 
                        :href="route('fornecedores.index')" 
                        :current="request()->routeIs('fornecedores.*')" 
                        wire:navigate>
                        {{ __('FORNECEDORES') }}
                    </flux:navlist.item>

                    <!-- ✅ NOVO ITEM DE MENU: VENDAS -->
                    <flux:navlist.item 
                        icon="banknotes" 
                        :href="route('vendas.index')" 
                        :current="request()->routeIs('vendas.*')" 
                        wire:navigate>
                        {{ __('VENDAS') }}
                    </flux:navlist.item>

                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />
        </flux:sidebar>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
