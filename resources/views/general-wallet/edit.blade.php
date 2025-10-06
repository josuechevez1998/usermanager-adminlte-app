@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} General Wallet
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} General Wallet</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('general-wallets.update', $generalWallet->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('general-wallet.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
