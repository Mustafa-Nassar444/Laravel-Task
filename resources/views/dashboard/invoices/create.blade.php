@extends('layouts.dashboard.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.invoices')</h1>
        </section>
        <section class="content">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-white">
                            <h4 class="mb-0">@lang('site.add_invoice')</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('invoices.store') }}" id="invoiceForm">
                                @csrf

                                <div class="form-group">
                                    <label for="client">@lang('site.client')</label>
                                    <select name="client_id" id="client" class="form-control">
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="items-container">
                                    <div class="item-row">
                                        <div class="form-group">
                                            <label for="item">@lang('site.item')</label>
                                            <select name="item_id[]" class="form-control item-select" onchange="updateItemDetails(this)">
                                                <option value="" disabled selected>@lang('site.select_item')</option>
                                                @foreach($items as $item)
                                                    <option value="{{ $item->id }}" data-price="{{ $item->price }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">@lang('site.price')</label>
                                            <input type="text" name="price[]" class="form-control item-price" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="quantity">@lang('site.quantity')</label>
                                            <input type="number" name="quantity[]" class="form-control item-quantity" value="1" min="1" onchange="updateTotalPrice(this)">
                                        </div>

                                        <div class="form-group">
                                            <label for="total_price">@lang('site.total_price')</label>
                                            <input type="text" name="total_price[]" class="form-control item-total-price" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date">@lang('site.invoice_date')</label>
                                    <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                                </div>

                                <button type="button" class="btn btn-success" id="add-item">@lang('site.add_item')</button>

                                <h4 class="mt-3">@lang('site.total_invoice_price') <span id="total-invoice-price">0.00</span></h4>

                                <button type="submit" class="btn btn-primary mt-3">@lang('site.add_invoice')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
