@extends('admin.layouts.app')

@section('title', 'Login Admin')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-600 via-blue-500 to-indigo-600">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-2xl">
        <div>
            <h2 class="text-center text-4xl font-extrabold text-gray-900">
                🏋️ AURA GYM
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Pannello Amministrativo
            </p>
        </div>
        <form class="mt-8 space-y-6" action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="email" class="sr-only">Email</label>
                    <input id="email" name="email" type="email" required 
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm" 
                           placeholder="Email" value="{{ old('email') }}">
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" required 
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm" 
                           placeholder="Password">
                </div>
            </div>

            @if ($errors->any())
            <div class="rounded-md bg-red-50 p-4">
                <div class="flex">
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">
                            {{ $errors->first() }}
                        </h3>
                    </div>
                </div>
            </div>
            @endif

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" 
                           class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-900">
                        Ricordami
                    </label>
                </div>
            </div>

            <div>
                <button type="submit" 
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-purple-600 to-blue-500 hover:from-purple-700 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-lock"></i>
                    </span>
                    Accedi
                </button>
            </div>

            <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                <p class="text-xs text-gray-600 font-semibold mb-2">📋 Credenziali di accesso:</p>
                <p class="text-xs text-gray-600"><strong>Email:</strong> admin@auragym.com</p>
                <p class="text-xs text-gray-600"><strong>Password:</strong> Admin123!</p>
            </div>
        </form>
    </div>
</div>
@endsection

