@extends('layouts.app')
@section('content')
    <div class="w-[1200px] m-auto mt-10">
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left ">
                <thead class="text-xs uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Product name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Quantity
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Price Per Item
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Total Price
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (session()->get('total_quantity') === 0 || !isset($cart) || !is_array($cart))
                        <tr>
                            <td colspan="5" class="text-center py-3">
                                <h1 class="text-2xl">Cart is empty</h1>
                            </td>
                        </tr>
                    @else
                        @foreach ($cart as $item)
                            <tr class="border-b border-gray-700 ">
                                <td class="py-3 px-6 font-semibold">
                                    {{ $item['title'] }}
                                </td>
                                <td class="py-3 px-6">
                                    {{ $item['quantity'] }}
                                </td>
                                <td class="py-3 px-6">
                                    ৳ {{ $item['price'] }}
                                </td>
                                <td class="py-3 px-6">
                                    ৳ {{ $item['total_price'] }}
                                </td>
                                <td class="py-3 px-6">
                                    <form action="{{ route('delete.cart', $item['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class=" font-semibold text-red-900 hover:text-red-600">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="bg-gray-100 p-4 mt-5">
            <div class="flex justify-end gap-28">
                @if (session('subs') == 1)
                    <div class=" text-sm">
                        Estimated Total : ৳ {{ $total_net_price }}
                    </div>
                    <div class="mr-auto text-sm">
                        <p>{{ $plan->planName }} Discount : {{ $plan->orderDiscount }}% </p>
                    </div>
                    <div class=" font-semibold">
                        Discount Price : ৳ {{ $total_net_price_disc }}
                    </div>
                @else
                    <div class=" font-semibold mr-16">
                        Total Price : ৳ {{ $total_net_price }}
                    </div>
                @endif
                @if (session()->get('total_quantity') > 0)
                    <div class="">
                        <a href="{{ route('checkout') }}"
                            class="bg-green-500 hover:bg-green-600  font-semibold py-2 px-4 rounded">Order</a>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
