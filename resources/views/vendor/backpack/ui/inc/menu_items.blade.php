{{-- This file is used for menu items by any Backpack v6 theme --}}
{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>
    {{ trans('backpack::base.dashboard') }}</a></li> --}}

{{-- <x-backpack::menu-item title="Home" icon="la la-home" :link="backpack_url('home')" /> --}}
<x-backpack::menu-item title="Dashboard" icon="la la-home nav-icon" :link="backpack_url('dashboard')" />
<x-backpack::menu-item title="Market" icon="la la-store-alt" :link="backpack_url('market')" />
<x-backpack::menu-item title="Activity" icon="la la-history" :link="backpack_url('activity')" />
<x-backpack::menu-item title="People" icon="la la-users" :link="backpack_url('people')" />

@php

    $count = 0;
    // $message_count = \App\Models\Message::where('receiver_id', backpack_user()->id)->where('is_read', 0)->count();
    $mycart_count = \App\Models\Cart::where('user_id', backpack_user()->id)
        ->where('is_checked_out', '0')->count();

    $myorder_count = \App\Models\Order::where('user_id', backpack_user()->id)
        ->where('is_delivered', '0')
        ->where('is_cancelled', '0')->count();
@endphp

{{-- Normal User --}}
@if (!backpack_user()->hasRole('Admin'))
    {{-- <x-backpack::menu-item title="Message" icon="la la-sms"  :link="backpack_url('message')" /> --}}
    {{-- <x-backpack::menu-item title="Chat" icon="la la-sms"  :link="backpack_url('chat')" /> --}}
    <x-backpack::menu-item title="My Cart" icon="la la-shopping-cart" :link="backpack_url('mycart')" badge="{{$count}}" />
    <x-backpack::menu-item title="My Order" icon="la la-shopping-bag"  :link="backpack_url('myorder')" />

    
    <x-backpack::menu-dropdown title="My Store" icon="la la-store">
        <x-backpack::menu-dropdown-item title="Products" icon="la la-tag" badge="3" :link="backpack_url('product')" />
        <x-backpack::menu-dropdown-item title="Customer Orders" icon="la la-shopping-bag" :link="backpack_url('customer-order')" />
        <x-backpack::menu-dropdown-item title="Payment histories" icon="la la-cash-register" :link="backpack_url('payment-history')" />
    </x-backpack::menu-dropdown>
@endif

@if (backpack_user()->hasRole('Admin'))
    <x-backpack::menu-dropdown title="Authentication" icon="la la-users">
        <x-backpack::menu-dropdown-header title="Authentication" />
        <x-backpack::menu-dropdown-item title="Users" icon="la la-user" :link="backpack_url('user')" />
        <x-backpack::menu-dropdown-item title="Roles" icon="la la-group" :link="backpack_url('role')" />
        <x-backpack::menu-dropdown-item title="Permissions" icon="la la-key" :link="backpack_url('permission')" />
    </x-backpack::menu-dropdown>
    <x-backpack::menu-dropdown title="Products" icon="la la-users">
        <x-backpack::menu-dropdown-header title="Products" />
        <x-backpack::menu-dropdown-item title="Product approvals" icon="la la-question" :link="backpack_url('product-approval')" />
        {{-- <x-backpack::menu-dropdown-item title="Users" icon="la la-user" :link="backpack_url('user')" /> --}}
        {{-- <x-backpack::menu-dropdown-item title="Roles" icon="la la-group" :link="backpack_url('role')" /> --}}
        {{-- <x-backpack::menu-dropdown-item title="Permissions" icon="la la-key" :link="backpack_url('permission')" /> --}}
    </x-backpack::menu-dropdown>
@endif
{{-- <x-backpack::menu-dropdown title="Authentication" icon="la la-users">
    <x-backpack::menu-dropdown-header title="Authentication" />
    <x-backpack::menu-dropdown-item title="Users" icon="la la-user" :link="backpack_url('user')" />
    <x-backpack::menu-dropdown-item title="Roles" icon="la la-group" :link="backpack_url('role')" />
    <x-backpack::menu-dropdown-item title="Permissions" icon="la la-key" :link="backpack_url('permission')" />
</x-backpack::menu-dropdown> --}}

{{-- <x-backpack::menu-item title="Chat" icon="la la-question" :link="backpack_url('chat')" /> --}}
{{-- <x-backpack::menu-item title="Productsearch" icon="la la-question" :link="backpack_url('productsearch')" /> --}}

{{-- <x-backpack::menu-item title="Products" icon="la la-question" :link="backpack_url('product')" /> --}}
{{-- <x-backpack::menu-item title="Search Product" icon="la la-question" :link="backpack_url('search_product')" /> --}}
{{-- <x-backpack::menu-item title="View Product" icon="la la-question" :link="backpack_url('view_product')" /> --}}

{{-- <x-backpack::menu-item title="Market" icon="la la-question" :link="backpack_url('market')" /> --}}
{{-- <x-backpack::menu-item title="Customer orders" icon="la la-question" :link="backpack_url('customer-order')" /> --}}
