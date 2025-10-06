@extends('layouts.app')

@section('template_title')
    {{ $generalWallet->name ?? __('Show') . " " . __('General Wallet') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} General Wallet</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('general-wallets.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Month:</strong>
                            {{ $generalWallet->month }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Year:</strong>
                            {{ $generalWallet->year }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Balance:</strong>
                            {{ $generalWallet->balance }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Userid:</strong>
                            {{ $generalWallet->userId }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
